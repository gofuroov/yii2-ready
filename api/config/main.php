<?php

use yii\web\JsonResponseFormatter;
use api\modules\v1\Module;
use common\models\User;
use yii\log\FileTarget;
use yii\web\JsonParser;
use yii\web\MultipartFormDataParser;

$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-api',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'api\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'v1' => [
            'class' => Module::class,
        ],
    ],
    'components' => [
        'request' => [
            'baseUrl' => '/api',
            'csrfParam' => '_csrf-api',
            'parsers' => [
                'application/json' => JsonParser::class,
                'multipart/form-data' => MultipartFormDataParser::class
            ],
        ],
        'response' => [
            'formatters' => [
                \yii\web\Response::FORMAT_JSON => [
                    'class' => JsonResponseFormatter::class,
                    'prettyPrint' => YII_DEBUG, // use "pretty" output in debug mode
                    'encodeOptions' => JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE,
                ],
            ],
            'format' => yii\web\Response::FORMAT_JSON,
            'charset' => 'UTF-8',
        ],
        'user' => [
            'identityClass' => User::class,
            'enableSession' => false,
            'enableAutoLogin' => false,
            'loginUrl' => null,
            'identityCookie' => ['name' => '_identity-api', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the api
            'name' => 'advanced-api',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
    ],
    'on beforeRequest' => static function ($event) {
        $languages = ['en', 'ru', 'uz'];
        $language = Yii::$app->request->headers['accept-language'];
        Yii::$app->language = in_array($language, $languages, true) ? $language : 'uz';
    },
    'params' => $params,
];
