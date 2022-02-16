<?php

/* @var $this \yii\web\View */

/* @var $content string */

use backend\assets\AdminLteAsset;
use common\widgets\Alert;
use yii\helpers\Html;

AdminLteAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <link rel="icon" type="image/svg+xml" href="/favicon.svg">
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet"
              href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <?php $this->head() ?>
    </head>
    <body class="hold-transition login-page">
    <?php $this->beginBody() ?>
    <div class="login-box">
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
    <!-- /.login-box -->

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>