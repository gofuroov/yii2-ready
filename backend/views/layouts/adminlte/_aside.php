<?php

/**
 * @var $this \yii\web\View
 */

use backend\assets\AdminLteAssets;
use backend\models\Menu;
use yii\helpers\Url;

?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= Url::home() ?>" class="brand-link">
        <img src="<?= $this->assetManager->bundles[AdminLteAssets::class]->baseUrl . '/adminlte/img/AdminLTELogo.png' ?>"
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
                <img src="<?= $this->assetManager->bundles[AdminLteAssets::class]->baseUrl . '/' . (Yii::$app->user->identity->photo ?? '') ?>"
                     class="img-circle elevation-2"
                     alt="User Image">
            </div>
            <div class="info">
                <a href="<?= Url::to(['admin/settings']) ?>" class="d-block"
                   style="text-transform: capitalize"><?= Yii::$app->user->identity->username ?? '' ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?= Menu::getData() ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>