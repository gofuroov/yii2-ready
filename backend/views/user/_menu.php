<?php
/**
 * @author Olimjon G'ofurov <gofuroov@gmail.com>
 * Date: 09/01/22
 * Time: 14:38
 */

?>
<div class="card card-tabs card-primary card-outline">
    <div class="card-header p-0">
        <div class="row d-flex justify-content-center">
            <div class="col-auto">
                <?= \yii\widgets\Menu::widget([
                    'options' => [
                        'class' => 'nav nav-pills ml-auto p-2',
                        'id' => 'user-menu',
                    ],
                    'encodeLabels' => false,
                    'items' => [
                        [
                            'label' => "<i class='fa fa-gears'></i> Umumiy",
                            'url' => ['user/index'],
                        ],
                        [
                            'label' => "<i class='fa fa-image'></i> Avatar",
                            'url' => ['user/avatar'],
                        ],
                        [
                            'label' => "<i class='fa fa-lock'></i> Parol",
                            'url' => ['user/password'],
                        ],
                    ],
                    'itemOptions' => [
                        'class' => "nav-item"
                    ],
                    'linkTemplate' => '<a href="{url}" class="nav-link">{label}</a>'
                ]) ?>
            </div>
        </div>
    </div>
</div>