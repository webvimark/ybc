<?php

return [
	'migrations'=>[
		'class'=>'webvimark\modules\migrations\MigrationModule',
		'layout'=>'//backend',
	],
	'user-management' => [
		'class' => 'webvimark\modules\UserManagement\UserManagementModule',

//		'on beforeAction'=>['webvimark\modules\UserManagement\components\AuthHelper', 'layoutHandler'],

		// Here you can set your handler to change layout for any controller or action
		// Tip: you can use this event in any module
		'on beforeAction'=>function(yii\base\ActionEvent $event) {
				$event->action->controller->layout = '//backend.php';

				if ( $event->action->uniqueId == 'user-management/auth/login' )
				{
					$event->action->controller->layout = 'loginLayout.php';
				};
			},
	],
	'content' => [
		'class' => 'webvimark\ybc\content\ContentModule',
//		'enablePageCache'=>true,
//		'enableTemplates'=>false,
		'functionalPages'=>[
			'news/default/index' => Yii::t('app', 'News'),
			'site/contact' => 'Contacts',
		],
	],
	'settings' => [
		'class' => 'app\modules\settings\SettingsModule',
	],
];
