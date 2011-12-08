<?php

namespace Fuel\Migrations;

class Create_authentications
{
	public function up()
	{
		\DBUtil::create_table('authentications', array(
			'id'            => array('constraint' => 30, 'type' => 'bigint', 'auto_increment' => true),
			'user_id'       => array('constraint' => 30, 'type' => 'bigint'),
			'provider'      => array('constraint' => 50, 'type' => 'varchar'),
			'uid'           => array('constraint' => 255, 'type' => 'varchar'),
			'access_token'  => array('constraint' => 255, 'type' => 'varchar'),
			'expires'       => array('constraint' => 12, 'type' => 'int'),
			'refresh_token' => array('constraint' => 255, 'type' => 'varchar'),
			'secret'        => array('constraint' => 255, 'type' => 'varchar'),
			'created_at'    => array('type' => 'datetime'),
			'updated_at'    => array('type' => 'datetime'),
		), array('id'), false, 'InnoDB');

		\DBUtil::create_index('authentications', array('user_id'), 'user_id_INDEX');
	}

	public function down()
	{
		\DBUtil::drop_table('authentications');
	}
}