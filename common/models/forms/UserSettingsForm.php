<?php
/**
 * @author Olimjon G'ofurov <gofuroov@gmail.com>
 * Date: 09/01/22
 * Time: 15:16
 */

namespace common\models\forms;

use backend\models\Admin;
use common\models\User;
use Imagine\Gd\Imagine;
use Imagine\Image\Box;
use Imagine\Image\Point;
use Yii;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

class UserSettingsForm extends \yii\base\Model
{
    public const SCENARIO_MAIN = 'main';
    public const SCENARIO_AVATAR = 'avatar';
    public const SCENARIO_PASSWORD = 'password';

    private ?User $user;
    public string $username;
    public string $first_name;
    public string $last_name;
    public string $phone;
    /**
     * @var UploadedFile
     */
    public $photo;
    public string $password_old = '';
    public string $password = '';
    public string $password_repeat = '';

    public function init()
    {
        $identity = \Yii::$app->user->identity;

        $this->loadUser();
        $this->username = $identity->username;
        $this->first_name = $identity->first_name;
        $this->last_name = $identity->last_name;
        $this->phone = $identity->phone;
    }

    public function scenarios(): array
    {
        return [
            self::SCENARIO_MAIN => ['username', 'first_name', 'last_name', 'phone'],
            self::SCENARIO_AVATAR => ['photo'],
            self::SCENARIO_PASSWORD => ['password_old', 'password', 'password_repeat'],
        ];
    }

    public function rules(): array
    {
        return [
            [['username', 'first_name', 'last_name', 'phone'], 'required', 'on' => self::SCENARIO_MAIN],
            [['username', 'first_name', 'last_name', 'phone'], 'string', 'on' => self::SCENARIO_MAIN],
            [['username'], 'unique', 'targetClass' => Admin::class, 'when' => function () {
                return strcasecmp($this->username, $this->user->username) !== 0;
            }, 'on' => self::SCENARIO_MAIN],
            [['phone'], 'unique', 'targetClass' => Admin::class, 'when' => function () {
                return strcasecmp($this->phone, $this->user->phone) !== 0;
            }, 'on' => self::SCENARIO_MAIN],
            ['phone', 'match', 'pattern' => '/\+[9][9][8] [0-9][0-9] [0-9][0-9][0-9] [0-9][0-9] [0-9][0-9]/', 'message' => "Telefon raqami «+998 99 999 99 99» kabi bo'lishi kerak.", 'on' => self::SCENARIO_MAIN],

            [['photo'], 'required', 'on' => self::SCENARIO_AVATAR],
            //limit 1MB
            [['photo'], 'file', 'extensions' => ['png', 'jpg', 'svg'], 'maxSize' => 1024 * 1024, 'on' => self::SCENARIO_AVATAR],

            [['password_old', 'password', 'password_repeat'], 'required', 'on' => self::SCENARIO_PASSWORD],
            [['password_old', 'password', 'password_repeat'], 'string', 'min' => 6, 'on' => self::SCENARIO_PASSWORD],
            [['password_old'], 'validatePassword', 'on' => self::SCENARIO_PASSWORD],
            [['password_repeat'], 'compare', 'compareAttribute' => 'password', 'on' => self::SCENARIO_PASSWORD],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword(string $attribute, $params): void
    {
        if (!$this->hasErrors()) {
            if (!$this->user || !$this->user->validatePassword($this->password_old)) {
                $this->addError($attribute, "Oldingi parol bn mos kelmadi.");
                $this->password = '';
                $this->password_repeat = '';
            }
        }
    }

    public function save(): bool
    {
        if (!$this->validate()) {
            return false;
        }

        if ($this->scenario === self::SCENARIO_MAIN) {
            $this->user->first_name = $this->first_name;
            $this->user->last_name = $this->last_name;
            $this->user->username = $this->username;
            $this->user->phone = $this->phone;

            return $this->user->save();
        }

        if ($this->scenario === self::SCENARIO_PASSWORD) {
            $this->user->setPassword($this->password);
            $this->user->generateAuthKey();
            Yii::$app->user->login($this->user, 3600 * 24 * 30);
            return $this->user->save();
        }

        return false;
    }

    public function upload(): bool
    {
        if (!$this->validate()) {
            return false;
        }

        $photoName = \Yii::$app->security->generateRandomString(16) . "." . $this->photo->extension;

        if (FileHelper::createDirectory(\Yii::getAlias("@uploads")) && $this->photo->saveAs("@uploads/" . $photoName)) {

            //Delete old image if exists
            $oldImagePath = \Yii::getAlias("@uploads") . '/' . pathinfo($this->user->photo)['basename'];
            if (is_file($oldImagePath) && file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
            if ($this->photo->extension !== 'svg') {
                [$width, $height] = getimagesize(\Yii::getAlias("@uploads") . '/' . $photoName);
                $minValue = min($width, $height);

                $imagine = new Imagine();
                $photo = $imagine->open(\Yii::getAlias("@uploads") . '/' . $photoName);
                $photo->crop(new Point(0, 0), new Box($minValue, $minValue))->resize(new Box(500, 500))->save(\Yii::getAlias("@uploads") . '/' . $photoName, [
                    'jpeg_quality' => 50
                ]);
            }
            $this->user->photo = $photoName;
            return $this->user->save();
        }

        return false;
    }

    public function resetAvatar(): bool
    {
        $oldImagePath = \Yii::getAlias("@uploads") . '/' . pathinfo($this->user->photo)['basename'];

        if (file_exists($oldImagePath)) {
            unlink($oldImagePath);
        }

        $this->user->photo = '';
        return $this->user->save();
    }

    private function loadUser(): void
    {
        $this->user = User::findOne(\Yii::$app->user->identity->id);
    }
}