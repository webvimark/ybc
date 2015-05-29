<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class SiteController extends Controller
{
//	/**
//	 * @return array
//	 */
//	public function behaviors()
//	{
//		return [
//			'class' => 'yii\filters\PageCache',
//			'duration' => 3600,
//			'only'=>['sitemapxml'],
//		];
//	}

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

	public function actionIndex()
	{
		return $this->render('index');
	}

	public function actionSitemapxml()
	{
		return $this->render('sitemapxml');
	}
}
