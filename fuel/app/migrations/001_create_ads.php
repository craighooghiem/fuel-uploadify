<?php

namespace Fuel\Migrations;

class Create_ads {

	function up()
	{
		\DBUtil::create_table('ads', array(
			'id' => array('type' => 'int', 'auto_increment' => true),
			'user_id' => array('type' => 'int', 'constraint' => 11),
			'title' => array('type' => 'varchar', 'constraint' => 100),
			'body' => array('type' => 'text'),

		), array('id'));
	}

	function down()
	{
		\DBUtil::drop_table('ads');
	}
}