<?php
use webvimark\modules\UserManagement\UserManagementModule;
use webvimark\ybc\content\ContentModule;

//You can user float numbers as array keys for menu elements
//Like '27.5'=> ['some element']

return [
	'0' => ['label' => '<i class="fa fa-dashboard"></i> Dashboard', 'url' => ['/dashboard/index']],


	'10'=> [
		'label' => '<i class="fa fa-book"></i> '. Yii::t('app', 'Content') .' <i class="fa pull-right fa-angle-left"></i>',
		'options'=>['class'=>'treeview'],
		'url'=>'#',
		'items'=>ContentModule::getSideMenuItems(),

	],

	'20'=>[
		'label' => '<i class="fa fa-users"></i> '.Yii::t('app', "Users").' <i class="fa pull-right fa-angle-left"></i>',
		'options'=>['class'=>'treeview'],
		'url'=>'#',
		'items'=>UserManagementModule::menuItems()
	],


	'30'=>[
		'label' => '<i class="fa fa-cogs"></i> '.Yii::t('app', "Settings").' <i class="fa pull-right fa-angle-left"></i>',
		'options'=>['class'=>'treeview'],
		'url'=>'#',
		'items'=>[
			'31' => [
				'label' => '<i class="fa fa-pagelines"></i> ' . Yii::t('app', 'General'),
				'url'   => ['/settings/manage/index']
			],
			'32' => [
				'label' => '<i class="fa fa-line-chart"></i> SEO',
				'url'   => ['/settings/manage/seo']
			],
		],
	],


	'40'=> [
		'label' => '<i class="fa fa-code"></i> Modules <i class="fa pull-right fa-angle-left"></i>',
		'options'=>['class'=>'treeview'],
		'url'=>'#',
		'items'=>[
		],

	],


	'999999'=>[
		'label' => '<i class="fa fa-wrench"></i> '.Yii::t('app', 'Dev junk').' <i class="fa pull-right fa-angle-left"></i>',
		'options'=>['class'=>'treeview'],
		'url'=>'#',
		'items'=>[
			['label' => '<i class="fa fa-random"></i> Migrations', 'url' => ['/migrations/default/index']],
			['label' => '<i class="fa fa-gears"></i> Gii', 'url' => ['/gii/default/index'], 'visible'=>YII_ENV_DEV && Yii::$app->user->isSuperadmin],
		],
	],
];