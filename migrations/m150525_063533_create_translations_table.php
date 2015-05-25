<?php

use yii\db\Migration;

class m150525_063533_create_translations_table extends Migration
{
	public function safeUp()
	{
		$tableOptions = null;
		if ( $this->db->driverName === 'mysql' )
		{
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
		}

		$this->createTable('ml_translations', array(
			'id'         => 'pk',
			'table_name' => 'varchar(100) not null',
			'lang'       => 'varchar(6) not null',
			'model_id'   => 'int(11) not null',
			'attribute'  => 'varchar(100) not null',
			'value'      => 'mediumtext',
			'KEY tblname_lang_model_id_idx (table_name, lang, model_id)'
		), $tableOptions);

	}

	public function safeDown()
	{
		$this->dropTable('ml_translations');
	}
}
