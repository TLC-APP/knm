<?php
App::uses('Classroom', 'Model');

/**
 * Classroom Test Case
 *
 */
class ClassroomTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.classroom',
		'app.department',
		'app.user',
		'app.chapter',
		'app.chapter_type',
		'app.course',
		'app.enrollment',
		'app.period',
		'app.room',
		'app.departments_chapter',
		'app.users_chapter'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Classroom = ClassRegistry::init('Classroom');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Classroom);

		parent::tearDown();
	}

}
