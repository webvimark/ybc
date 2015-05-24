<?php

namespace app\modules\settings;

use Yii;

class SettingsModule extends \yii\base\Module
{
	public $controllerNamespace = 'app\modules\settings\controllers';

	/**
	* I18N helper
	*
	* @param string      $category
	* @param string      $message
	* @param array       $params
	* @param null|string $language
	*
	* @return string
	*/
	public static function t($category, $message, $params = [], $language = null)
	{
		if ( !isset(Yii::$app->i18n->translations['modules/settings/*']) )
		{
			Yii::$app->i18n->translations['modules/settings/*'] = [
				'class'          => 'yii\i18n\PhpMessageSource',
				//'sourceLanguage' => 'en',
				'basePath'       => '@app/modules/settings/messages',
				'fileMap'        => [
					'modules/settings/app' => 'app.php',
				],
			];
		}

		return Yii::t('modules/settings/' . $category, $message, $params, $language);
	}
}
