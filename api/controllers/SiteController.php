<?php

namespace api\controllers;

use app\config\Cors;
use Yii;
use yii\rest\Controller;

/**
 * Site controller
 */
class SiteController extends BaseController
{
    /**
     * Displays homepage.
     *
     * @return array
     * @throws \yii\base\InvalidConfigException
     */
    public function actionIndex()
    {
        return [
            'app' => 'Evr taxi',
            'author' => [
                'name' => "Olimjon G'ofurov",
                'telegram' => 'https://telegram.org/gofuroov',
                'github' => 'https://github.com/gofuroov',
                'phone' => '+998 99 999 59 98',
            ],
            'time' => Yii::$app->formatter->asDatetime(time())
        ];
    }
}
