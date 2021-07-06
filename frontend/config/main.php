<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'layout' => 'main',
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'baseUrl' => '',
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
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => false,
            'transport' => [
                            'class' => 'Swift_SmtpTransport',
                            'host' => 'smtp.beget.ru',
                            'username' => 'si@shop-improver.ru',
                            'password' => 'Kbyecz060696',
                            'port' => '465',
                            'encryption' => 'ssl',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => true,  
            'rules' => [
                '' => 'site/index',                                
                '<controller:\w+>/<action:\w+>/' => '<controller>/<action>',
                
                'afisha' => 'page/afisha',
                'blog' => 'page/blog',
                'blogsingle' => 'page/blogsingle',
                'contact' => 'page/contact',
                'add' => 'page/add',
                'delitem' => 'page/delitem',
                'clear' => 'page/clear',
                'checkout' => 'page/checkout',
                'menu' => 'page/menu',
                'menu_drinks' => 'page/menu_drinks',
                'menu_kids' => 'page/menu_kids',
                'menu_deserts' => 'page/menu_deserts',
                'menu_vegans' => 'page/menu_vegans',
                'menu_breakfasts' => 'page/menu_breakfasts',
                'menu_dinners' => 'page/menu_dinners',
                'menu_product' => 'page/menu_product',
                'afisha_product' => 'page/afisha_product',
                'signup' => 'site/signup',
                'login' => 'site/login',

            ],
        ],
    ],
    'params' => $params,
];
