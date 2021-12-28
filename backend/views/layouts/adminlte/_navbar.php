<?php

use backend\assets\AdminLteAssets;
use yii\helpers\Html;
use yii\helpers\Url;

?>
<nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" data-baseurl="<?= Url::base() ?>" href="#" role="button">
                <i class="fas fa-bars"></i>
            </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a class="nav-link"> Administrator</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search"
                               aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                    <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 friend requests
                    <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>

        <!--    User    -->
        <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                <i class="fas fa-user mr-2"></i>
                <span class="hidden-xs "> <?= Yii::$app->user->identity->username ?? '' ?></span>
                <i class="fas fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu">
                <li class="user-header bg-gray-light">
                    <img src="<?= $this->assetManager->bundles[AdminLteAssets::class]->baseUrl . '/' . (Yii::$app->user->identity->photo ?? '') ?>"
                         class="img-circle" alt="User Image"/>
                    <p>
                        <?= Yii::$app->user->identity->fullname ?? '' ?>
                    </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                    <div class="d-flex justify-content-between">
                        <?= Html::a("<span class='fas fa-user-cog'></span> Profil", ['/admin/settings'], [
                                'class' => 'btn btn-default btn-flat'
                            ]
                        ) ?>
                        <?= Html::a("<i class='fa fa-sign-out-alt'></i> Logout", ['/site/logout'], [
                                'data-method' => 'post',
                                'class' => 'btn btn-default btn-flat'
                            ]
                        ) ?>
                    </div>
                </li>
            </ul>
        </li>
    </ul>
</nav>