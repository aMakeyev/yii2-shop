<?php

$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
	'language' => 'ru-RU',
	'layout' => 'admin',
	'defaultRoute' => 'order/index',
    'modules' => [
		'permit' => [
			'class' => 'developeruz\db_rbac\Yii2DbRbac',
			'params' => [
				'userClass' => 'common\models\User',
				'accessRoles' => ['MegaAdmin']
			]
		],
	],
    'components' => [
        'request' => [
			'baseUrl' => '/admin',
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
				/*'' => 'site/index',
				'<controller:\w+>/<action:\w+>/' => '<controller>/<action>',*/
				'<module:\w+>/<controller:\w+>/<action:(\w|-)+>' => '<module>/<controller>/<action>',
				'<module:\w+>/<controller:\w+>/<action:(\w|-)+>/<id:\d+>' => '<module>/<controller>/<action>',
				],
        ],

    ],
	/*'as AccessBehavior' => [
		'class' => \developeruz\db_rbac\behaviors\AccessBehavior::className(),
		'redirect_url' => '/forbidden',
		'login_url' => Yii::$app->user->loginUrl,
		'protect' => ['admin', 'user', 'site/about'],
		'rules' => [
			'user' => [['actions' => ['login'], 'allow' => true ],
				['actions' => ['logout'], 'roles' => ['@'], 'allow' => true ]]
		],
	],*/
	'as access' => [
		'class' => 'yii\filters\AccessControl',
		'except' => ['site/login', 'site/logout', 'site/error'],
		'rules' => [
			/*[
				'controllers' => ['permit'],
				'actions' => ['permit'],
				'allow' => true,
				'roles' => ['MegaAdmin'],
			],*/
			[
				'allow' => true,
				'roles' => ['MegaAdmin', 'admin'],
			],
		],
	],
    'params' => $params,
];
