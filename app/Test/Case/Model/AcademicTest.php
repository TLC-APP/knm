<?php
App::uses('Academic', 'Model');

/**
 * Academic Test Case
 *
 */
class AcademicTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.academic',
		'app.user',
		'app.degree',
		'app.department',
		'app.class_room',
		'app.chapter',
		'app.chapter_type',
		'app.course',
		'app.enrollment',
		'app.period',
		'app.room',
		'app.departments_chapter',
		'app.users_chapter',
		'app.attend',
		'app.teaching_plan',
		'app.group',
		'app.users_group'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Academic = ClassRegistry::init('Academic');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Academic);

		parent::tearDown();
	}

}
