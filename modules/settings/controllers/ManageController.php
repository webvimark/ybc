<?php

namespace app\modules\settings\controllers;

use app\modules\settings\models\Settings;
use webvimark\components\BaseController;
use Yii;
use yii\web\HttpException;

class ManageController extends BaseController
{
	public $layout = '//backend';

	/**
	 * General settings
	 *
	 * @return string|\yii\web\Response
	 */
	public function actionIndex()
	{
		$model = $this->getSettingsModel('general');

		if ( $model->load(Yii::$app->request->post()) && $model->save() )
		{
			Yii::$app->session->setFlash('success', Yii::t('app', 'Saved'));

			return $this->refresh();
		}

		return $this->renderIsAjax('index', compact('model'));
	}

	/**
	 * SEO settings
	 *
	 * @throws \yii\web\HttpException
	 * @return string|\yii\web\Response
	 */
	public function actionSeo()
	{
		$robotsTxt = Yii::getAlias('@webroot/robots.txt');

		if ( !is_file($robotsTxt) )
		{
			file_put_contents($robotsTxt, '');
			chmod($robotsTxt, 0766);
		}
		elseif ( is_file($robotsTxt) && !is_writable($robotsTxt) )
		{
			throw new HttpException(403, 'Robots.txt is not writable');
		}

		$model = $this->getSettingsModel('seo');

		if ( isset( $_POST['robots']) )
		{
			file_put_contents($robotsTxt, $_POST['robots']);
		}

		if ( $model->load(Yii::$app->request->post()) && $model->save() )
		{
			Yii::$app->session->setFlash('success', Yii::t('app', 'Saved'));

			return $this->refresh();
		}

		$robotsTxtVal = file_get_contents($robotsTxt);

		return $this->renderIsAjax('seo', compact('model', 'robotsTxtVal'));
	}

	/**
	 * @param string $scenario
	 *
	 * @return Settings
	 */
	protected function getSettingsModel($scenario)
	{
		$model = Settings::getModel();
		$model->scenario = $scenario;

		return $model;
	}
}
