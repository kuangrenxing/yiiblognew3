<?php

class m110929_104104_init extends CDbMigration
{
	public function up()
	{
	    $sql = "";
	    return Yii::app()->db->createCommand($sql)->execute();
	}

	public function down()
	{
		return true;
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