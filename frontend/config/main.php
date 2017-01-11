<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                //
                "http://partner.daoapp.io/<language:en-us|zh-cn|fa-ke>/<module:\w+>/<controller:(\w|-)+>/<action:(\w|-)+>" => '<module>/<controller>/<action>',
                "http://partner.daoapp.io/<module:\w+>/<controller:(\w|-)+>/<action:(\w|-)+>" => '<module>/<controller>/<action>',
            ],
        ],

    ],
    'modules' => [
        'git' => [
            'class' => 'frontend\modules\git\Module',
            // 'errorHandler' => [
            //     'errorAction' => 'www/site/eror',
            // ],
        ],
        'shop' => [
            'class' => 'frontend\modules\shop\Module',
        ],
    ],
    'params' => $params,
];
