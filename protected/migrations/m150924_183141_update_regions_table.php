<?php

class m150924_183141_update_regions_table extends CDbMigration
{
	public function up()
	{
		$this->addColumn('regions', 'position', 'string');
	}

	public function down()
	{
		echo "m150924_183141_update_regions_table does not support migration down.\n";
		return false;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}