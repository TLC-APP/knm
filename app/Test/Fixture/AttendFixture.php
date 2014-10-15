<?php
/**
 * AttendFixture
 *
 */
class AttendFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'pass' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4, 'unsigned' => false),
		'hoc_phi' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4, 'unsigned' => false),
		'ngay_thu' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'nguoi_thu' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'so_tien' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'so_phieu_thu' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'vang' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4, 'unsigned' => false),
		'buoi_vang' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'ly_do_vang' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'nguoi_xu_ly_vang' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'course_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'index'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'index'),
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_attends_courses1_idx' => array('column' => 'course_id', 'unique' => 0),
			'fk_attends_users1_idx' => array('column' => 'user_id', 'unique' => 0)
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
			'hoc_phi' => 1,
			'ngay_thu' => '2014-09-29 08:31:31',
			'nguoi_thu' => 1,
			'so_tien' => 1,
			'so_phieu_thu' => 'Lorem ipsum dolor sit amet',
			'vang' => 1,
			'buoi_vang' => 1,
			'ly_do_vang' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'nguoi_xu_ly_vang' => 1,
			'course_id' => 1,
			'user_id' => 1,
			'id' => 1
		),
	);

}
