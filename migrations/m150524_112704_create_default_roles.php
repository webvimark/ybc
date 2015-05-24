<?php

use webvimark\modules\UserManagement\models\rbacDB\Role;
use yii\db\Migration;

class m150524_112704_create_default_roles extends Migration
{
	public function safeUp()
	{
		Role::create('ContentManager', 'Content manager');
		Role::create('SeoManager', 'SEO manager');
	}

	public function safeDown()
	{
		Role::deleteAll([
			'name'=>['ContentManager', 'SeoManager'],
		]);
	}
}
