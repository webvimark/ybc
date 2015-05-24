<?php

use webvimark\modules\UserManagement\components\AuthHelper;
use webvimark\modules\UserManagement\models\rbacDB\AuthItemGroup;
use webvimark\modules\UserManagement\models\rbacDB\Permission;
use webvimark\modules\UserManagement\models\rbacDB\Role;
use webvimark\modules\UserManagement\models\rbacDB\Route;
use yii\db\Migration;

class m150524_113140_create_default_permissions_and_assign_them_to_roles extends Migration
{
	public function safeUp()
	{
		Route::refreshRoutes();

		(new AuthItemGroup([
			'name'=>'Settings',
			'code'=>'settings',
		]))->save();

		Role::assignRoutesViaPermission('Admin', 'fullAccessToSettings', ['settings/manage/*'], null, 'settings');

		Role::assignRoutesViaPermission('SeoManager', 'accessToSeoSettings', ['settings/manage/seo'], 'Access to SEO settings', 'settings');

		AuthHelper::invalidatePermissions();
	}

	public function safeDown()
	{
		AuthItemGroup::deleteAll([
			'code'=>'settings',
		]);

		Permission::deleteAll([
			'name'=>['fullAccessToSettings', 'accessToSeoSettings']
		]);

		AuthHelper::invalidatePermissions();
	}
}
