<?php
/**
 * CourseFixture
 *
 */
class CourseFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'ma_so' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'key' => 'unique', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'si_so' => array('type' => 'integer', 'null' => false, 'default' => '25', 'unsigned' => false),
		'trang_thai' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'comment' => 'dangky, huy ko du si so, huy do sv vang, huy do gv ban'),
		'chapter_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'index'),
		'teacher_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'index'),
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'ma_so_UNIQUE' => array('column' => 'ma_so', 'unique' => 1),
			'fk_courses_chapters1_idx' => array('column' => 'chapter_id', 'unique' => 0),
			'fk_courses_users1_idx' => array('column' => 'teacher_id', 'unique' => 0)
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
			'name' => 'Lorem ipsum dolor sit amet',
			'ma_so' => 'Lorem ipsum dolor sit amet',
			'si_so' => 1,
			'trang_thai' => 1,
			'chapter_id' => 1,
			'teacher_id' => 1,
			'id' => 1
		),
	);

}
