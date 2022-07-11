<?php

use yii\db\Connection;

return [
    'components' => [
        'db' => [
            'class' => Connection::class,
            'dsn' => 'mysql:host=' . ($_ENV['DB_HOST'] ?? 'localhost') . ';dbname=' . $_ENV['DB_NAME'],
            'username' => $_ENV['DB_USER'] ?? 'root',
            'password' => $_ENV['DB_PASS'] ?? '',
            'charset' => $_ENV['DB_CHARSET'] ?? 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swift-mailer\Mailer',
            'viewPath' => '@common/mail',
        ],
    ],
];
