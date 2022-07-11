<?php

/* @var $this View */

/* @var $content string */

use backend\assets\AdminLteAsset;
use common\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

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
    <body class="hold-transition sidebar-mini layout-fixed sidebar-collapse">
    <?php $this->beginBody() ?>
    <div class="wrapper" id="app">

        <!-- Preloader -->
        <?= $this->render("adminlte/_preloader") ?>

        <!-- Navbar -->
        <?= $this->render("adminlte/_navbar") ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?= $this->render("adminlte/_aside") ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2 justify-content-between">
                        <div class="col-auto">
                            <h4 class="mr-2 d-inline"><?= $this->params['create'] ?? "" ?></h4>
                            <h4 class="mr-2 d-inline"><?= Html::encode($this->title) ?></h4>
                            <h4 class="mr-2 d-inline"><?= $this->params['update'] ?? "" ?></h4>
                            <h4 class="mr-2 d-inline"><?= $this->params['delete'] ?? "" ?></h4>
                            <h4 class="mr-2 d-inline"><?= $this->params['other'] ?? "" ?></h4>
                        </div><!-- /.col -->
                        <div class="col-auto">
                            <?= Breadcrumbs::widget([
                                'links' => $this->params['breadcrumbs'] ?? [],
                                'homeLink' => ['label' => "<i class='fa fa-home'></i> Bosh sahifa", 'url' => Url::home(), 'encode' => false],
                                'options' => [
                                    'class' => 'breadcrumb text-sm float-sm-right'
                                ]

                            ]) ?>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <?= Alert::widget() ?>
                    <?= $content ?>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?= $this->render("adminlte/_footer") ?>

        <!-- Control Sidebar -->
        <?= $this->render("adminlte/_control_sidebar") ?>
        <!-- /.control-sidebar -->

        <!-- Modal oyna-->
        <?= $this->render("adminlte/_modal") ?>
    </div>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage();
