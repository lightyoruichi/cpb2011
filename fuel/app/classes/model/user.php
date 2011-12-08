<?php

class Model_User extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'user_name',
		'full_name',
		'email',
		'status',
		'created_at',
		'updated_at'
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => true,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => true,
		),
	);
}
