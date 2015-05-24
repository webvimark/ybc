<?php

use webvimark\behaviors\multilanguage\MultiLanguageUrlManager;

return [
	'assetManager' => [
		'linkAssets' => true,
		'appendTimestamp'=>true,
	],
	'request'      => [
		// !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
		'cookieValidationKey' => '719Lmt4JM40EVhTj3g3Dd_e4Kvdqpj-M',
	],
	'cache'        => [
		'class' => 'yii\caching\ApcCache',
	],
	'user' => [
		'class' => 'webvimark\modules\UserManagement\components\UserConfig',

		// Comment this if you don't want to record user logins
		'on afterLogin' => function($event) {
				\webvimark\modules\UserManagement\models\UserVisitLog::newVisitor($event->identity->id);
			}
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
				'levels' => [
					'error',
					'warning'
				],
			],
		],
	],
	'urlManager'   => [
		'class'=>MultiLanguageUrlManager::className(),
		'enablePrettyUrl' => true,
		'showScriptName'=>false,
		'rules'=>[
			[
				'class' => 'webvimark\ybc\content\components\ContentUrlRule',
				'pattern'=>'',
				'route'=>'',
				'connectionID' => 'db',
			],

			'<_c:[\w \-]+>/<id:\d+>'=>'<_c>/view',
			'<_c:[\w \-]+>/<_a:[\w \-]+>/<id:\d+>'=>'<_c>/<_a>',
			'<_c:[\w \-]+>/<_a:[\w \-]+>'=>'<_c>/<_a>',

			'<_m:[\w \-]+>/<_c:[\w \-]+>/<_a:[\w \-]+>'=>'<_m>/<_c>/<_a>',
			'<_m:[\w \-]+>/<_c:[\w \-]+>/<_a:[\w \-]+>/<id:\d+>'=>'<_m>/<_c>/<_a>',

		],
	],
];
