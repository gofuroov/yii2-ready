<?php
/**
 * @author Olimjon G'ofurov <gofuroov@gmail.com>
 * Date: 09/01/22
 * Time: 17:17
 *
 * @var $settings \common\models\forms\UserSettingsForm
 */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

?>

<div class="card">
    <div class="card-body">
        <?php $form = ActiveForm::begin(); ?>

        <div class="row">
            <div class="col">
                <?= $form->field($settings, 'first_name')->textInput() ?>
            </div>
            <div class="col">
                <?= $form->field($settings, 'last_name')->textInput() ?>
            </div>
        </div>

        <?= $form->field($settings, 'username')->textInput() ?>

        <?= $form->field($settings, 'phone')->widget(\yii\widgets\MaskedInput::class, [
            'mask' => '\+\9\9\8 99 999 99 99',
            'options' => [
                'minlength' => 17,
            ]
        ]) ?>

        <div class="row">
            <div class="col d-flex justify-content-end">
                <?= Html::submitButton('Saqlash', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>

