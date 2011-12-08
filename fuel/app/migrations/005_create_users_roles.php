<?php

namespace Fuel\Migrations;

class Create_users_roles
{
	public function up()
	{
		\DBUtil::create_table('users_roles', array(
			'id'         => array('constraint' => 30, 'type' => 'bigint', 'auto_increment' => true),
			'user_id'    => array('constraint' => 30, 'type' => 'bigint'),
			'role_id'    => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('type' => 'datetime'),
			'updated_at' => array('type' => 'datetime'),
		), array('id'), false, 'InnoDB');

		\DBUtil::create_index('users_roles', array('user_id'), 'user_id_INDEX');
		\DBUtil::create_index('users_roles', array('user_id', 'role_id'), 'users_roles_UNIQUE', 'UNIQUE');
	}

	public function down()
	{
		\DBUtil::drop_table('users_roles');
	}
}