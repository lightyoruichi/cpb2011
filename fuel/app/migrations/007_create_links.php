<?php

namespace Fuel\Migrations;

class Create_links
{
	public function up()
	{
		\DBUtil::create_table('links', array(
			'id'          => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'user_id'     => array('constraint' => 30, 'type' => 'bigint'),
			'url'         => array('constraint' => 255, 'type' => 'varchar'),
			'title'       => array('constraint' => 255, 'type' => 'varchar'),
			'description' => array('type' => 'text'),
			'created_at'  => array('type' => 'datetime'),
			'updated_at'  => array('type' => 'datetime'),
		), array('id'));

		\DBUtil::create_index('links', array('user_id'), 'user_id_INDEX');
	}

	public function down()
	{
		\DBUtil::drop_table('links');
	}
}