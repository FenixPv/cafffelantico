<?php

use yii\symfonymailer\Mailer;

$config = [
    'id'         => 'basic',

    'components' => [
        'user'         => [
            'identityClass'   => 'app\modules\user\models\User',
            'enableAutoLogin' => true,
            'loginUrl'        => ['login'],
        ],
        'mailer'       => [
            'class'            => Mailer::class,
            'viewPath'         => '@app/mail',
            'useFileTransport' => true,
        ],
        'request'      => [
            'cookieValidationKey' => 'NKBUkUUEuNccc_PS4vKtJxyIkEB_ovr7',
        ],
        'urlManager'   => [
            'rules'           => [
            ],
            'showScriptName'  => false,
            'enablePrettyUrl' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/default/error',
        ],
    ],
];

if (YII_ENV_DEV) {
    $config['bootstrap'][]      = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][]    = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
