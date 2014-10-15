<?php
App::uses('Room', 'Model');

/**
 * Room Test Case
 *
 */
class RoomTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.room',
		'app.period',
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
		'app.enrollment'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Room = ClassRegistry::init('Room');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Room);

		parent::tearDown();
	}

}
