<?php

$config = [
	'modules'=>[
		'migrations'=>[
			'executableYii' => '@app/yii_production',
		],
	],
	'components' => [
		'mailer' => [
			'class'            => 'yii\swiftmailer\Mailer',
			// send all mails to a file by default. You have to set
			// 'useFileTransport' to false and configure a transport
			// for the mailer to send real emails.
			'useFileTransport' => false,
		],
		'db'     => require( __DIR__ . '/db.php' ),
	],
	'params'     => [],
];

return $config;
