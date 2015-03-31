<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'jIlneTOTGNyCYfQ19_Fr758YRUIsm_5z',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\PhpManager'
        ],
        'urlManager' => [
            'class'           => 'yii\web\UrlManager',
            // Disable index.php
            'showScriptName'  => false,
            // Disable r      = routes
            'enablePrettyUrl' => true,
            'rules' => array(
                'checklists/download/<id:\d+>/<belong_to:\d+>/<cowid:\d+>' => 'checklists/download',
                'activities/more/<page:\d+>'                               => 'activities/more',
                'notes/more/<page:\d+>'                                    => 'notes/more',
                '<controller:\w+>/<id:\d+>'                                => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>'                   => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>'                            => '<controller>/<action>',
            ),
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => false,
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'asmtp.mail.hostpoint.ch',  // e.g. smtp.mandrillapp.com or smtp.gmail.com
                'username' => 'panel@berginformatik.ch',
                'password' => 'SmVk3ERT',
                'port' => '587', // Port 25 is a very common port too
                'encryption' => 'tls', // It is often used, check your provider or mail server specs
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
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages', // if advanced application, set @frontend/messages
                    'sourceLanguage' => 'en',
                    'fileMap' => [
                        //'main' => 'main.php',
                    ],
                ],
            ],
        ],
        // 'view' => [
        //     'theme' => [
        //         'pathMap' => [
        //             '@app/modules/admin/views' => '@app/views/yii2-admin', 
        //         ],
        //     ],
        // ],
        // 'assetManager' => [
        //     'bundles' => [
        //         'yii\web\JqueryAsset' => [
        //             'js'=>[]
        //         ],
        //         'yii\bootstrap\BootstrapPluginAsset' => [
        //             'js'=>[]
        //         ],
        //         'yii\bootstrap\BootstrapAsset' => [
        //             'css' => [],
        //         ],

        //     ],
        // ],
    ],
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
            'layout' => '@app/views/layouts/main_backend', // avaliable value 'left-menu', 'right-menu' and 'top-menu'
            // 'layout' => 'left-menu', // avaliable value 'left-menu', 'right-menu' and 'top-menu'
            'controllerMap' => [
                 'assignment' => [
                    'class'         => 'app\modules\admin\controllers\AssignmentController',
                    'userClassName' => 'app\models\User',
                    'idField'       => 'id'
                ]
            ],
            'menus' => [
                'assignment' => [
                    'label' => 'Grand Access' // change label
                ],
                'route' => [
                    'label' => 'Route'
                ], // disable menu
            ],
        ],
        'gii' => 'yii\gii\Module',
        'gridview' =>  [
            'class' => '\kartik\grid\Module'
            // enter optional module parameters below - only if you need to  
            // use your own export download action or custom translation 
            // message source
            // 'downloadAction' => 'gridview/export/download',
            // 'i18n' => []
        ]
    ],
    'as access' => [
        'class' => 'app\modules\admin\components\AccessControl',
        'allowActions' => [
            // 'admin/*', // add or remove allowed actions to this list
            'site/index',
            'site/error',
            'site/about',
            'site/login',
            'site/contact',
            'admin/auth/login',
            'gii/*',
            'debug/*'
        ]
    ],
    'params' => $params,
    'defaultRoute' => 'site/login',
    'aliases' => [
        '@widget' => '@app/components/widgets',
        '@web'    => '@app/web',
        '@views'  => '@app/views'
    ],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
