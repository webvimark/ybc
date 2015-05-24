<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class BackendAsset extends AssetBundle
{
	public $basePath = '@webroot';
	public $baseUrl = '@web';
	public $css = [
		'css/font-awesome-4.3.0/css/font-awesome.min.css',
		'css/default.css',
		'css/back.less',
		'css/AdminLTE.css'
	];
	public $js = [
		'js/AdminLTE.js'
	];
	public $jsOptions = [
//		'position'=>View::POS_HEAD,
	];
	public $depends = [
		'yii\web\YiiAsset',
		'yii\bootstrap\BootstrapPluginAsset',
	];
}
