<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */

/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="card shadow card-danger card-outline">
    <div class="card-body m-1">
        <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

        <div class="alert alert-danger text-center">
            <?= nl2br(Html::encode($message)) ?>
        </div>

        <p class="text-justify">
            The above error occurred while the Web server was processing your request.
            Please contact us if you think this is a server error. Thank you.
        </p>

        <div class="row">
            <div class="col">
                <?= Html::a('<i class="fa fa-home"></i> Bosh sahifa', ['site/index'], [
                    'class' => 'btn btn-link btn-block',
                ]) ?>
            </div>
            <div class="col">
                <?= Html::a('<i class="fa fa-arrow-left"></i> Orqaga qaytish', ['site/index'], [
                    'class' => 'btn btn-link btn-block',
                    'onclick' => 'window.history.back(); return false;',
                ]) ?>
            </div>
        </div>
    </div>
</div>
