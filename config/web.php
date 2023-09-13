<?php

use yii\symfonymailer\Mailer;

$config = [
    'id'         => 'basic',
    'modules' => [
        'site' => [
            'class' => 'app\modules\site\Module',
        ],
        'blog' => [
            'class' => 'app\modules\blog\Module',
        ],
        'cpanel' => [
            'class' => 'app\modules\cpanel\Module',
        ],
        'catalog' => [
            'class' => 'app\modules\catalog\Module',
        ],
    ],
    'components' => [
        'user'         => [
            'identityClass'   => 'app\modules\cpanel\models\User',
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
                '' => 'site/default/index',
                '<_a:(login|history|page)>' => 'site/default/<_a>',
            ],
            'showScriptName'  => false,
            'enablePrettyUrl' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/default/error',
        ],
    ],
    'controllerMap' => [
        'elfinder' => [
            'class' => 'mihaildev\elfinder\PathController',
            'access' => ['@'], // доступ для всех
            'root' => [
                'path' => 'img/upload', // директория внутри web
                'name' => 'Изображения'
            ],
        ]
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
