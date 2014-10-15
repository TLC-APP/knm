<?php
App::uses('Course', 'Model');

/**
 * Course Test Case
 *
 */
class CourseTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.course',
		'app.chapter',
		'app.chapter_type',
		'app.department',
		'app.class_room',
		'app.user',
		'app.hoc_ham',
		'app.hoc_vi',
		'app.attend',
		'app.users_chapter',
		'app.group',
		'app.users_group',
		'app.departments_chapter',
		'app.teacher',
		'app.enrollment',
		'app.period',
		'app.room'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Course = ClassRegistry::init('Course');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Course);

		parent::tearDown();
	}

}
