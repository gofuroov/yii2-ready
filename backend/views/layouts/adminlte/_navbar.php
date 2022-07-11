<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>
<nav class="main-header navbar navbar-expand navbar-dark">
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

    <ul class="navbar-nav ml-auto">
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

        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                <i class="fas fa-user mr-2"></i>
                <span class="hidden-xs "> <?= Yii::$app->user->identity->username ?? '' ?></span>
                <i class="fas fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu">
                <li class="user-header bg-light">
                    <img src="<?= Yii::$app->user->identity->photoUrl ?>" class="img-circle" alt="User Image"/>
                    <p>
                        <?= Yii::$app->user->identity->fullname ?? '' ?>
                        <small class="text-muted">
                            <?= Yii::$app->user->identity->typeName ?? '' ?>
                        </small>
                    </p>
                </li>
                <li class="user-footer">
                    <div class="d-flex justify-content-between">
                        <?= Html::a("<span class='fas fa-user-cog'></span> Profil", ['/user/index'], [
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