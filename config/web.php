<?php

$params = array_merge(
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/web-local.php')
);

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
	//'language' => 'zh-CN',
	
    'aliases' => [
        '@config_lite' => '@vendor/config_lite/config_lite',
    ],
	
    'components' => [
		
		'i18n' => [
			'translations' => [
				'*' => [
					'class' => 'yii\i18n\PhpMessageSource',
					'basePath' => '@app/messages',
					//'sourceLanguage' => 'en-US',
					/*
					'fileMap' => [
						'app' => 'app.php',
						'app/error' => 'error.php',
					],
					*/
				],
			],
    	],
		'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => true,
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'bmde4zPXXrl5S2gP9Zx8wZ2hJlsQI6ry',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\Users',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
		
    ],
    'params' => $params,
	
	/*
	 * equal to follow YII_ENV_DEV setting
	 *
	'bootstrap' => ['gii'],
     'modules' => [
        'gii' => ['class' => 'yii\gii\Module',
		'allowedIPs' => ['99.245.0.63', '::1'] 
		],
    ],
	*/
	
 
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
		'class' => 'yii\gii\Module',
		'allowedIPs' => ['99.245.0.63', '::1', '99.237.99.224'],
	];
}

return $config;
