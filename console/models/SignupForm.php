<?php

namespace console\models;

use common\models\User;

class SignupForm extends \yii\base\Model
{
    public string $username = '';
    public string $first_name = '';
    public string $last_name = '';
    public string $phone = '';
    public string $password = '';
    public int $type = User::TYPE_ADMIN;

    public function rules()
    {
        return [
            [['username', 'first_name', 'last_name', 'phone', 'password'], 'required'],
            ['phone', 'match', 'pattern' => '/\+[9][9][8] [0-9][0-9] [0-9][0-9][0-9] [0-9][0-9] [0-9][0-9]/'],
            ['password', 'string', 'min' => 6],
            ['type', 'in', 'range' => [User::TYPE_PASSENGER, User::TYPE_DRIVER, User::TYPE_ADMIN]],
            ['type', 'default', 'value' => User::TYPE_ADMIN],
        ];
    }

    /**
     * @throws \yii\base\Exception
     */
    public function save():bool
    {
        if (!$this->validate()) {
            return false;
        }

        $user = new User();
        $user->load([
            'username' => $this->username,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'phone' => $this->phone,
            'type' => $this->type,
            'status' => User::STATUS_ACTIVE,
            'sex' => User::SEX_MAN
        ], '');
        $user->setPassword($this->password);
        $user->generateAuthKey();

        if (!$user->save()) {
            var_dump($user->getErrors());
        }
        return $user->save();
    }
}