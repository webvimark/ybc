<?php

namespace app\controllers;

use app\models\ContactForm;
use webvimark\components\BaseController;
use Yii;

class SiteController extends BaseController
{

	public function actions()
	{
		return [
			'error' => [
				'class' => 'yii\web\ErrorAction',
			],
		];
	}

	/**
	 * @param \yii\base\Action $action
	 *
	 * @return bool
	 */
	public function beforeAction($action)
	{
		if ( parent::beforeAction($action) )
		{
			if ( is_file(Yii::getAlias('@app/templates/default/layout.php')) )
			{
				$this->layout = '@app/templates/default/layout.php';
			}

			return true;
		}

		return false;
	}

	/**
	 * Main page (if not set another in content menu)
	 *
	 * @return string
	 */
	public function actionIndex()
	{
		return $this->render('index');
	}

	public function actionContact()
	{
		$model = new ContactForm();

		return $this->renderIsAjax('contact', compact('model'));
	}

	public function actionSitemapxml()
	{
		return $this->render('sitemapxml');
	}
}
