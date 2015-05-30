<?php
/**
 * @link      http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license   http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since  2.0
 */
class FrontendAsset extends AssetBundle
{
	public $basePath = '@webroot';
	public $baseUrl = '@web';
	public $css = [
		'http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css',
		'http://themes.bootstrappage.com/voice/assets/css/custom.css',
//		'http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css',
	];
	public $js = [
//		'http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js',
	];
	public $depends = [
		'yii\web\YiiAsset',
		'yii\bootstrap\BootstrapAsset',
	];
}
