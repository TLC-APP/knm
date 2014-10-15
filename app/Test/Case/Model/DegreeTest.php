<?php
App::uses('Degree', 'Model');

/**
 * Degree Test Case
 *
 */
class DegreeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.degree',
		'app.user',
		'app.academic',
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
		$this->Degree = ClassRegistry::init('Degree');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Degree);

		parent::tearDown();
	}

}
