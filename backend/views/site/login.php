<?php

/**
 * @var $this yii\web\View
 * @var $model backend\models\LoginForm
 */

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

$this->title = 'Admin';
?>
<div class="card card-gray-dark shadow">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-fan fa-spin mr-2"></i>
        </h3>
    </div>
    <div class="card-body login-card-body">
        <p class="login-box-msg text-muted">
            Tizimga kirish
        </p>
        <?php $form = ActiveForm::begin(['id' => 'login-form']) ?>
        <?= $form->field($model, 'username', [
            'options' => ['class' => 'form-group has-feedback'],
            'inputTemplate' => '{input}<div class="input-group-append"><div class="input-group-text"><span class="fas fa-user-lock"></span></div></div>',
            'template' => '{beginWrapper}{input}{error}{endWrapper}',
            'wrapperOptions' => ['class' => 'input-group mb-3']
        ])
            ->label(false)
            ->textInput([
                'placeholder' => $model->getAttributeLabel('username'),
                'autocomplete' => false
            ]) ?>

        <?= $form->field($model, 'password', [
            'options' => ['class' => 'form-group has-feedback'],
            'inputTemplate' => '{input}<div class="input-group-append"><div class="input-group-text"><span class="fas fa-lock"></span></div></div>',
            'template' => '{beginWrapper}{input}{error}{endWrapper}',
            'wrapperOptions' => ['class' => 'input-group mb-3']
        ])
            ->label(false)
            ->passwordInput([
                'placeholder' => $model->getAttributeLabel('password'),
                'autocomplete' => false
            ]) ?>

        <div class="row">
            <div class="col-8">
                <?= $form->field($model, 'rememberMe')->checkbox([
                    'template' => '<div class="icheck-primary">{input}{label}</div>',
                    'labelOptions' => [
                        'class' => ''
                    ],
                    'uncheck' => false
                ]) ?>
            </div>
            <div class="col-4">
                <?= Html::submitButton('Kirish', ['class' => 'btn btn-primary btn-block']) ?>
            </div>
        </div>
        <?php \yii\bootstrap4\ActiveForm::end(); ?>
    </div>
    <!-- /.login-card-body -->
</div>