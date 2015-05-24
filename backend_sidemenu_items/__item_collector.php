<?php
use yii\helpers\ArrayHelper;
use yii\helpers\FileHelper;

$items = [];

$collections = FileHelper::findFiles(__DIR__, [
	'only'   => ['*.php'],
	'except' => ['__item_collector.php'],
]);


foreach ($collections as $collection)
{
	$items = ArrayHelper::merge($items, require_once($collection));
}

ksort($items);

return $items;
