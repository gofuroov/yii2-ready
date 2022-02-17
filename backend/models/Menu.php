<?php

namespace backend\models;

use common\widgets\AdminLteMenuWidget;
use Yii;

class Menu extends \yii\base\Model
{
    public static function getData(): string
    {
        return AdminLteMenuWidget::widget([
            'items' => [
                [
                    'label' => 'Bosh sahifa',
                    'icon' => 'home',
                    'url' => ['/site/index'],
                ],
                [
                    'label' => "Dispetcher",
                    'icon' => 'headset',
                    'url' => ['/site/socket'],
                ],
                [
                    'label' => "Xarita",
                    'icon' => 'earth-asia',
                    'url' => ['/site/map'],
                ],
                [
                    'label' => 'Buyurtmalar',
                    'icon' => 'list-check',
                    'url' => ['/order/index'],
                    'active' => in_array(Yii::$app->controller->getRoute(), [
                        'order/index',
                        'order/view',
                        'order/update',
                        'order/create',
                    ]),
                ],
                [
                    'label' => 'Manzillar',
                    'icon' => 'location-dot',
                    'url' => ['/address/index'],
                    'active' => in_array(Yii::$app->controller->getRoute(), [
                        'address/index',
                        'address/view',
                        'address/update',
                        'address/create',
                    ]),
                ],
                [
                    'label' => 'Moshina modellari',
                    'icon' => 'list',
                    'url' => ['/car-model/index'],
                    'active' => in_array(Yii::$app->controller->getRoute(), [
                        'car-model/index',
                        'car-model/view',
                        'car-model/update',
                        'car-model/create',
                    ]),
                ],
                [
                    'label' => 'Moshinalar',
                    'icon' => 'car',
                    'url' => ['/car/index'],
                    'active' => in_array(Yii::$app->controller->getRoute(), [
                        'car/index',
                        'car/view',
                        'car/update',
                        'car/create',
                    ]),
                ],
                [
                    'label' => 'Haydovchilar',
                    'icon' => 'users',
                    'url' => ['/driver/index'],
                    'active' => in_array(Yii::$app->controller->getRoute(), [
                        'driver/index',
                        'driver/view',
                        'driver/update',
                        'driver/create',
                    ]),
                ],
                [
                    'label' => "Ta'rif rejalar",
                    'icon' => 'file-invoice-dollar',
                    'url' => ['/cost/index'],
                    'active' => in_array(Yii::$app->controller->getRoute(), [
                        'cost/index',
                        'cost/view',
                        'cost/update',
                        'cost/create',
                    ]),
                ],
                [
                    'label' => 'Sozlamalar',
                    'icon' => 'gears',
                    'url' => ['/setting/index'],
                    'active' => in_array(Yii::$app->controller->getRoute(), [
                        'setting/index',
                        'setting/view',
                        'setting/update',
                        'setting/create',
                    ]),
                ],
                [
                    'label' => '',
                ],
                [
                    'label' => 'Online socket',
                    'icon' => 'plug',
                    'url' => ['/connection/index'],
                    'active' => in_array(Yii::$app->controller->getRoute(), [
                        'connection/index',
                        'connection/view',
                        'connection/update',
                        'connection/create',
                    ]),
                ],
                [
                    'label' => 'Location',
                    'icon' => 'location-arrow',
                    'url' => ['/location/index'],
                    'active' => in_array(Yii::$app->controller->getRoute(), [
                        'location/index',
                        'location/view',
                        'location/update',
                        'location/create',
                    ]),
                ],
            ]
        ]);
    }
}