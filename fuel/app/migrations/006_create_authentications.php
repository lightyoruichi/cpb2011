<?php

namespace Fuel\Migrations;

class Create_authentications
{
	public function up()
	{
		\DBUtil::create_table('authentications', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'user_id' => array('constraint' => 11, 'type' => 'int'),
			'provider' => array('constraint' => 50, 'type' => 'varchar'),
			'uid' => array('constraint' => 255, 'type' => 'varchar'),
			'access_token' => array('constraint' => 255, 'type' => 'varchar'),
			'expires' => array('constraint' => 12, 'type' => 'int'),
			'refresh_token' => array('constraint' => 255, 'type' => 'varchar'),
			'secret' => array('constraint' => 255, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('authentications');
	}
}