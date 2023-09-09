<?php

$params = require __DIR__ . '/params.php';

$config = [
    'id'                  => 'basic-console',
    'params'              => $params,
    'controllerNamespace' => 'app\commands',
];

if (YII_ENV_DEV) {
    $config['bootstrap'][]      = 'gii';
    $config['modules']['gii']   = [
        'class' => 'yii\gii\Module',
    ];
    $config['bootstrap'][]      = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];
}

return $config;
