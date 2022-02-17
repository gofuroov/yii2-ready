<?php

namespace backend\models;

use common\models\User;
use Yii;

/**
 *
 * @property-read string $photoUrl
 */
class Admin extends User
{
    public function getPhotoUrl(): string
    {
        if (!$this->photo) {
            return "/admin/images/defaultAvatar.png";
        }
        return 'url'.$this->photo;
    }
}