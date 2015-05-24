<?php

Yii::setAlias('@tests', dirname(__DIR__) . '/tests');

return [
    'components' => [
        'db' => require(__DIR__ . '/db.php'),
    ],
    'params' => [],
];
