<?php

use yii\caching\FileCache;

return [
    'name' => 'My Application',
    'timeZone' => 'Asia/Tashkent',
    'language' => 'uz',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(__DIR__, 2) . '/vendor',
    'components' => [
        'cache' => [
            'class' => FileCache::class,
        ],
    ],
];
