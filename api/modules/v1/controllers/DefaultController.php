<?php

namespace api\modules\v1\controllers;

use api\controllers\BaseController;
use Yii;
use yii\base\InvalidConfigException;

/**
 * Default controller for the `v1` module
 */
class DefaultController extends BaseController
{
    /**
     * Renders the index view for the module
     * @return array
     * @throws InvalidConfigException
     */
    public function actionIndex(): array
    {
        return [
            'app' => 'My application',
            'author' => [
                'name' => "Olimjon G'ofurov",
                'telegram' => 'https://telegram.org/gofuroov',
                'github' => 'https://github.com/gofuroov',
            ],
            'time' => Yii::$app->formatter->asDatetime(time())
        ];
    }
}
