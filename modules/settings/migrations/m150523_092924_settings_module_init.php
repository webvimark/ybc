<?php

use yii\db\Migration;

class m150523_092924_settings_module_init extends Migration
{
	public function safeUp()
	{
		$tableOptions = null;
		if ( $this->db->driverName === 'mysql' )
		{
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
		}

		$this->createTable('{{%settings}}', array(
			'id'                  => 'pk',
			'logo'                => 'string',
			'contact_email'       => 'string not null',
			'enable_seo_tracking' => 'smallint(1) not null default 0',
			'seo_tracking_script' => 'text',
			'seo_meta_tags'       => 'text',
			'created_at'          => 'int not null',
			'updated_at'          => 'int not null',
		), $tableOptions);


	}

	public function safeDown()
	{
		$this->dropTable('{{%settings}}');

	}
}
