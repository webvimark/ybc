<?php

use webvimark\ybc\content\models\ContentMenu;
use webvimark\ybc\content\models\ContentPage;
use webvimark\ybc\content\models\ContentTemplate;
use webvimark\ybc\content\models\ContentTemplateWidget;
use yii\db\Migration;

class m150530_093510_create_default_content extends Migration
{
	protected $_curl;

	/**
	 * @param int $numberOfParagraphs
	 *
	 * @return mixed
	 */
	protected function getLoremText($numberOfParagraphs = null)
	{
		if ( !$this->_curl )
			$this->_curl = curl_init();

		if ( !$numberOfParagraphs )
			$numberOfParagraphs = rand(4, 15);

		curl_setopt($this->_curl, CURLOPT_URL, 'http://loripsum.net/api/ul/ol/headers/links/' . $numberOfParagraphs);
		curl_setopt($this->_curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($this->_curl, CURLOPT_CONNECTTIMEOUT, 10);
		return curl_exec($this->_curl);
	}

	public function safeUp()
	{
		$topMenu = new ContentMenu();
		$topMenu->name = 'Top menu';
		$topMenu->code = 'topMenu';
		$topMenu->save(false);

		$sideMenu = new ContentMenu();
		$sideMenu->name = 'Side menu';
		$sideMenu->code = 'sideMenu';
		$sideMenu->position = '|left|right|';
		$sideMenu->save(false);

		$template = new ContentTemplate();
		$template->name = 'Default';
		$template->layout = 'default';
		$template->save(false);

		$pagesList = [
			'topMenu'=>[
				'Main',
				'About us',
				'Services',
				'Prices',
				'Company history',
				'Our goal',
				'Portfolio',
				'Contact',
			],
			'sideMenu'=>[
				'Recent activities',
				'Random text',
				'Funny stories',
				'News',
				'Dependencies',
				'Our templates',
				'These days',
				'Keep fresh',
			],
		];

		foreach ($pagesList as $menu => $pages)
		{
			$menu = $menu == 'topMenu' ? $topMenu : $sideMenu;

			foreach ($pages as $page)
			{
				(new ContentPage([
					'name'=>$page,
					'content_template_id'=>$template->id,
					'content_menu_id'=>$menu->id,
					'type'=>ContentPage::TYPE_TEXT,
					'body'=>$this->getLoremText(),
				]))->save(false);
			}
		}

		Yii::$app->cache->flush();
	}

	public function safeDown()
	{
		ContentPage::deleteAll();
		ContentTemplateWidget::deleteAll([
			'name'=>['Side menu', 'Top menu']
		]);

		ContentTemplate::deleteIfExists(['name'=>'Default']);

		ContentMenu::deleteAll([
			'code'=>['topMenu', 'sideMenu'],
		]);

		Yii::$app->cache->flush();

	}
}
