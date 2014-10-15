<?php
/**
 * EnrollmentFixture
 *
 */
class EnrollmentFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'pass' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4, 'unsigned' => false),
		'fee' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4, 'unsigned' => false),
		'fee_date' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'fee_hangling_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'fee_amount' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'fee_paper_no' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'absence' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4, 'unsigned' => false),
		'absence_session_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'absence_reason' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'absence_handling_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'course_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'index'),
		'student_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'index'),
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_attends_courses1_idx' => array('column' => 'course_id', 'unique' => 0),
			'fk_attends_users1_idx' => array('column' => 'student_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'pass' => 1,
			'fee' => 1,
			'fee_date' => '2014-10-06 06:35:25',
			'fee_hangling_id' => 1,
			'fee_amount' => 1,
			'fee_paper_no' => 'Lorem ipsum dolor sit amet',
			'absence' => 1,
			'absence_session_id' => 1,
			'absence_reason' => 'Lorem ipsum dolor sit amet',
			'absence_handling_id' => 1,
			'course_id' => 1,
			'student_id' => 1,
			'id' => 1
		),
	);

}
