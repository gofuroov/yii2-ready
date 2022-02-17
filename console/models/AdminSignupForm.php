<?php

namespace console\models;

use common\models\User;

class AdminSignupForm extends \yii\base\Model
{
    public string $username = '';
    public string $first_name = '';
    public string $last_name = '';
    public string $phone = '';
    public string $password = '';

    public function rules()
    {
        return [
            [['username', 'first_name', 'last_name', 'phone', 'password'], 'required'],
            ['phone', 'match', 'pattern' => '/\+[9][9][8] [0-9][0-9] [0-9][0-9][0-9] [0-9][0-9] [0-9][0-9]/'],
            ['password', 'string', 'min' => 6],
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
            'type' => User::TYPE_ADMIN,
            'status' => User::STATUS_ACTIVE,
        ], '');
        $user->setPassword($this->password);
        $user->generateAuthKey();

        if (!$user->save()) {
            $this->addErrors($user->getErrors());
            return false;
        }
        return true;
    }
}