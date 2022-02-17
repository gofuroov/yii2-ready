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

        <?= $form->field($settings, 'password_old')->passwordInput() ?>

        <?= $form->field($settings, 'password')->passwordInput() ?>

        <?= $form->field($settings, 'password_repeat')->passwordInput() ?>

        <div class="row">
            <div class="col d-flex justify-content-end">
                <?= Html::submitButton('Saqlash', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>

