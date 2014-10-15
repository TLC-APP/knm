<?php
App::uses('Attend', 'Model');

/**
 * Attend Test Case
 *
 */
class AttendTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.attend',
		'app.course',
		'app.chapter',
		'app.chapter_type',
		'app.department',
		'app.class_room',
		'app.user',
		'app.hoc_ham',
		'app.hoc_vi',
		'app.users_chapter',
		'app.group',
		'app.users_group',
		'app.departments_chapter',
		'app.session'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Attend = ClassRegistry::init('Attend');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Attend);

		parent::tearDown();
	}

}
