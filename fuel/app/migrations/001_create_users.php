<?php

namespace Fuel\Migrations;

class Create_users
{
	public function up()
	{
		\DBUtil::create_table('users', array(
			'id'         => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'user_name'  => array('constraint' => 100, 'type' => 'varchar'),
			'full_name'  => array('constraint' => 200, 'type' => 'varchar'),
			'email'      => array('constraint' => 150, 'type' => 'varchar'),
			'status'     => array('constraint' => '"unverified","verified","banned","deleted"', 'type' => 'enum', 'default' => 'unverified'),
			'created_at' => array('type' => 'datetime'),
			'updated_at' => array('type' => 'datetime'),
		), array('id'), false, 'InnoDB');

		\DBUtil::create_index('users', array('email'), 'email_UNIQUE', 'UNIQUE');
		\DBUtil::create_index('users', array('user_name'), 'user_name_UNIQUE', 'UNIQUE');
		\DBUtil::create_index('users', array('status'), 'status_INDEX');
	}

	public function down()
	{
		\DBUtil::drop_table('users');
	}
}