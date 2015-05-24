<?php

$config = [
    'bootstrap' => ['log', 'debug'],
    'modules'=>[
	    'debug'=>[
		    'class'=>'yii\debug\Module',
	    ],
	    'gii'=>[
		    'class'=>'yii\gii\Module',
		    'generators' => [
			    'ybc-model'     => 'webvimark\generators\model\Generator',
			    'ybc-crud'      => 'webvimark\generators\crud\Generator',
			    'ybc-module'    => 'webvimark\generators\module\Generator',
			    'ybc-extension' => 'webvimark\generators\extension\Generator',
		    ]
	    ],
	    'migrations'=>[
		    'executableYii' => '@app/yii',
	    ],
    ],
    'components' => [
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
    'params' => [],
];

return $config;
