<?php
/**
 * @author Olimjon G'ofurov <gofuroov@gmail.com>
 * Date: 10/01/22
 * Time: 10:20
 *
 * @var $settings \common\models\forms\UserSettingsForm
 */

use kartik\file\FileInput;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\helpers\Url;

?>

<div class="card">
    <div class="card-body">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($settings, 'photo')->widget(FileInput::class, [
            'options' => ['accept' => 'image/*'],
            'pluginOptions' => [
                'showCaption' => false,
                'showRemove' => false,
                'showUpload' => false,
                'showCancel' => false,
                'browseClass' => 'btn btn-primary btn-block',
                'browseIcon' => '<i class="fas fa-camera"></i> ',
                'browseLabel' => 'Avatarni tanlang'
            ],
        ])->label(false) ?>

        <div class="row">
            <div class="col">
                <a href="<?= Url::to(['user/reset-avatar']) ?>" class="btn btn-outline-danger btn-block">
                    <i class="fa fa-times"></i>
                    <b>Joriy rasmni o'chirish</b>
                </a>
            </div>
            <div class="col">
                <?= Html::submitButton("<i class='fa fa-upload'></i> Yuklash va saqlash", ['class' => 'btn btn-outline-primary btn-block']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>