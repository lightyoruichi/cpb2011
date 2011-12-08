<?php

namespace Fuel\Migrations;

class Create_roles
{
	public function up()
	{
		\DBUtil::create_table('roles', array(
			'id'         => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'name'       => array('constraint' => 255, 'type' => 'varchar'),
			'active'     => array('constraint' => 1, 'type' => 'tinyint'),
			'created_at' => array('type' => 'datetime'),
			'updated_at' => array('type' => 'datetime'),
		), array('id'), false, 'InnoDB');

		\DBUtil::create_index('roles', array('active'), 'active_INDEX');
	}

	public function down()
	{
		\DBUtil::drop_table('roles');
	}
}