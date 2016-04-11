<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    // start budyaga
    'modules' => [
        'admin' => [
            'class' => 'budyaga\users\Module',
            'userPhotoUrl' => 'http://msn.local.com/uploads/user/photo',
            'userPhotoPath' => '@app/web/uploads/user/photo'
        ],
    ],

    // end budyaga
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'k93NJ_87FCAaE4AXXbbXtMw_Ga3xda-z',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],

        // start budyaga
        'user' => [
            'identityClass' => 'budyaga\users\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => ['/login'],
        ],
        'authClientCollection' => [
            'class' => 'yii\authclient\Collection',
            'clients' => [
                'google' => [
                    'class' => 'budyaga\users\components\oauth\Google',
                    'clientId' => '552729459762-kq5aqtmdjv1odqubjdv9gt1b477sbe4m.apps.googleusercontent.com',
                    'clientSecret' => 'FzgY4lfx3Wu5yUO2iRS87lVG',
                ],
                'facebook' => [
                    'class' => 'budyaga\users\components\oauth\Facebook',
                    'clientId' => '942220362522810',
                    'clientSecret' => 'eec6149a5839c797fff3c6f40392079e',
                ],
            ],
        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'showScriptName' => false,
            'enablePrettyUrl' => true,
            'rules' => [
                '/signup' => '/admin/account/signup',
                '/login' => '/admin/account/login',
                '/logout' => '/admin/account/logout',
                '/requestPasswordReset' => '/admin/account/request-password-reset',
                '/resetPassword' => '/admin/account/reset-password',
                '/profile' => '/admin/account/profile',
                '/retryConfirmEmail' => '/admin/account/retry-confirm-email',
                '/confirmEmail' => '/admin/account/confirm-email',
                '/unbind/<id:[\w\-]+>' => '/admin/auth/unbind',
                '/oauth/<authclient:[\w\-]+>' => '/admin/auth/index',
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ],
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],

        // end budyaga

        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
//            'useFileTransport' => true,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'msn.air.uet@gmail.com',
                'password' => 'chientamhoang',
                'port' => '587',
                'encryption' => 'tls',
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
