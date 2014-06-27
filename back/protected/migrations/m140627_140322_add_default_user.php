<?php

class m140627_140322_add_default_user extends CDbMigration
{
	public function up()
	{
	  $new_identity = new Identity;
	  $new_identity->name = "Arturo";
	  $new_identity->last_name = "Aguirre Torres";
	  $new_identity->username = "arturo";
	  $new_identity->mail  = "aguirret@mit.edu";
	  $new_identity->password = "hola";
	  $new_identity->created_at = date('Y-m-d H:i:s.u');
	  $new_identity->updated_at = date('Y-m-d H:i:s.u');
	  $new_identity->save();
	  
	  //
	  insert into identity (name, last_name, username, mail, password, created_at, updated_at) values ('Arturo', 'Aguirre Torres', 'arturo', 'aguirret@mit.edu', 'hola', '2012-10-10 10:10:10', '2010-10-10 10:10:10');
	}

	public function down()
	{
		echo "m140627_140322_add_default_user does not support migration down.\n";
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