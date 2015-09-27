<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id'             => 'basic',
    'name'           => 'user-signup',
    'language'       => 'ru-RU',
    'sourceLanguage' => 'ru',
    'timezone'       => 'UTC',
    'basePath'       => dirname(__DIR__),
    'bootstrap'      => ['log'],
    'components'     => [
        'request'      => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '2txucpmsQyr8dWLz2O0uFv6NZu-PS6Rj',
        ],
        'cache'        => [
            'class' => 'yii\caching\FileCache',
        ],
        'i18n'         => [
            'translations' => [
                '*' => [
                    'class'          => 'yii\i18n\PhpMessageSource',
                    'basePath'       => '@app/messages',
                    'sourceLanguage' => 'ru',
                    'fileMap'        => [
                        //'main' => 'main.php',
                    ],
                ],
            ],
        ],
        'user'         => [
            'identityClass'   => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'authManager' => [
            'class'        => 'yii\rbac\DbManager',
            'defaultRoles' => [
                'user',
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer'       => [
            'class'            => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log'          => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets'    => [
                [
                    'class'  => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db'           => require(__DIR__ . '/db.php'),
        'urlManager'   => [
            'enablePrettyUrl' => true,
            'showScriptName'  => false,
            'rules'           => [
                '/'                                               => 'site/index',
                '<_a:error>'                                      => 'site/<_a>',
                '<_a:[\w\-]+>'                                    => 'site/<_a>',
                '<_m:[\w\-]+>/<_a:[\w\-]+>/<id:\d+>'              => '<_m>/default/<_a>',
                '<_m:[\w\-]+>/<_a:[\w\-]+>'                       => '<_m>/default/<_a>',
                '<_m:[\w\-]+>'                                    => '<_m>/default/index',
                '<_m:[\w\-]+>/<_c:[\w\-]+>'                       => '<_m>/<_c>/index',
                '<_m:[\w\-]+>/<_c:[\w\-]+>/<_a:[\w\-]+>/<id:\d+>' => '<_m>/<_c>/<_a>',
                '<_m:[\w\-]+>/<_c:[\w\-]+>/<_a:[\w\-]+>'          => '<_m>/<_c>/<_a>',
                '<_m:[\w\-]+>/<_c:[\w\-]+>/<id:\d+>'              => '<_m>/<_c>/view',
                '<_m:[\w\-]+>/<_c:[\w\-]+>/<alias>'               => '<_m>/<_c>/view',
            ],
        ],

    ],
    'params'         => $params,
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
