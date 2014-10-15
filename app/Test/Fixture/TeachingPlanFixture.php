<?php
/**
 * TeachingPlanFixture
 *
 */
class TeachingPlanFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'date' => array('type' => 'date', 'null' => false, 'default' => null),
		'session' => array('type' => 'string', 'null' => false, 'default' => 'S', 'length' => 1, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'teacher_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'teacher_fk_idx' => array('column' => 'teacher_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'date' => '2014-10-07',
			'session' => 'Lorem ipsum dolor sit ame',
			'teacher_id' => 1
		),
	);

}
