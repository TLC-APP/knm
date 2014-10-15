<?php
App::uses('DepartmentType', 'Model');

/**
 * DepartmentType Test Case
 *
 */
class DepartmentTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.department_type',
		'app.department',
		'app.classroom',
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
		$this->DepartmentType = ClassRegistry::init('DepartmentType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DepartmentType);

		parent::tearDown();
	}

}
