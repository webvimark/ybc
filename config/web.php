<?php

use yii\helpers\ArrayHelper;
use yii\helpers\FileHelper;

$config = [
	'id'         => 'ybc',
	'name'       => 'ybc',
	'basePath'   => dirname(__DIR__),
	'bootstrap'  => ['log'],
	'modules'    => require( __DIR__ . '/_modules.php' ),
	'components' => require( __DIR__ . '/_components.php' ),
	'params'     => require( __DIR__ . '/_params.php' ),
];

// ================= Collect all 3-d party configs =================
$externalConfigs = FileHelper::findFiles(__DIR__ . '/_external', [
	'only' => ['*.php'],
]);

foreach ($externalConfigs as $externalConfig)
{
	$config = ArrayHelper::merge($config, $externalConfig);
}

// ================= Get config based on environment (development or production) =================
$config = ArrayHelper::merge($config, require_once( __DIR__ . '/' . YII_ENV . '/web.php' ));

return $config;
