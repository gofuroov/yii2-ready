<?php

/**
 * @var $this \yii\web\View
 */

use backend\models\Menu;
use yii\helpers\Url;

?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= Url::home() ?>" class="brand-link">
        <img src="<?= Url::base() . '/adminlte/img/AdminLTELogo.png' ?>"
             alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Administrator</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= Yii::$app->user->identity->photoUrl ?>"
                     class="img-circle elevation-2"
                     alt="User Image">
            </div>
            <div class="info">
                <a href="<?= Url::to(['user/index']) ?>" class="d-block"
                   style="text-transform: capitalize"><?= Yii::$app->user->identity->fullname ?? '' ?></a>
            </div>
        </div>

        <nav class="mt-2">
            <?= Menu::getData() ?>
        </nav>
    </div>
</aside>