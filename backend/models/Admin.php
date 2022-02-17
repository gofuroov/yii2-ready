<?php

namespace backend\models;

use common\models\User;
use yii\helpers\Url;

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
        return Url::base() . '/uploads/' . $this->photo;
    }
}