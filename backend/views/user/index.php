<?php

/**
 * @author Olimjon G'ofurov <gofuroov@gmail.com>
 * Date: 09/01/22
 * Time: 14:04
 */

/**
 * @var $this \yii\web\View
 * @var $settings \backend\models\forms\UserSettingsForm
 */

$this->title = "Foydalanuvchi";

$this->params['breadcrumbs'][] = $this->title

?>

<div class="row">
    <div class="col-12 col-sm-6 col-md-4">
        <?= $this->render('_user') ?>
    </div>
    <div class="col">
        <div class="row">
            <div class="col">
                <?= $this->render('_menu') ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?= $this->render('settings/_main_setting', [
                    'settings' => $settings
                ]) ?>
            </div>
        </div>
    </div>
</div>