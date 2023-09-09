<?php

use yii\helpers\ArrayHelper;


$params = ArrayHelper::merge(
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php',
);

return [
    'params'     => $params,
    'aliases'    => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'basePath'   => dirname(__DIR__),
    'language'   => 'ru-RU',
    'bootstrap'  => ['log'],
    'components' => [
        'db'          => [
            'class'   => 'yii\db\Connection',
            'charset' => 'utf8mb4',
        ],
        'cache'       => [
            'class' => 'yii\caching\FileCache',
        ],
        'log'         => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets'    => [
                [
                    'class'  => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
    ],
];
