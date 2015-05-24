<?php

use yii\helpers\ArrayHelper;

Yii::setAlias('@tests', dirname(__DIR__) . '/tests');

$params = require(__DIR__ . '/_params.php');

$config = [
    'id' => 'basic-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'app\commands',
    'controllerMap'=>[
	    'migrate'=>[
		    'class'=>'webvimark\modules\migrations\components\MigrateController',
	    ],
    ],
    'modules' => require_once(__DIR__ . '/_modules.php'),
    'components' => [
        'cache' => [
            'class' => 'yii\caching\ApcCache',
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
    ],
    'params' => $params,
];

$config = ArrayHelper::merge($config, require_once( __DIR__ . '/' . YII_ENV . '/console.php' ));

return $config;