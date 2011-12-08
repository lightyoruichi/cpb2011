<?php

namespace Fuel\Migrations;

class Create_signatures
{
	public function up()
	{
		\DBUtil::create_table('signatures', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'user_id' => array('constraint' => 30, 'type' => 'bigint'),
			'content' => array('type' => 'text'),
			'status' => array('constraint' => '"draft","publish","delete"', 'type' => 'enum'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('signatures');
	}
}