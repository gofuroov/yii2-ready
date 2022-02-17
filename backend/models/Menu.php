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
                    'label' => "Menu item",
                    'icon' => 'headset',
                    'url' => '#',
                ],
                [
                    'label' => "Menu item",
                    'icon' => 'earth-asia',
                    'url' => '#',
                ],
                [
                    'label' => 'Menu item',
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
                    'label' => 'Parent menu',
                    'icon' => 'user',
                    'url' => '#',
                    'items' => [
                        [
                            'label' => 'Child menu item',
                            'icon' => 'user-times',
                            'url' => ['/student/index'],
                            'active' => in_array(Yii::$app->controller->getRoute(), [
                                'student/index',
                                'student/view',
                            ]),
                        ],
                        [
                            'label' => 'Child menu item',
                            'icon' => 'user-graduate',
                            'url' => ['/student/studying'],
                            'active' => Yii::$app->controller->getRoute() === 'student/studying',
                        ],
                    ]
                ],
            ]
        ]);
    }
}