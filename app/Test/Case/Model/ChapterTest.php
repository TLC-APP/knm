<?php
App::uses('Chapter', 'Model');

/**
 * Chapter Test Case
 *
 */
class ChapterTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.chapter',
		'app.chapter_type',
		'app.course',
		'app.user',
		'app.hoc_ham',
		'app.hoc_vi',
		'app.department',
		'app.class_room',
		'app.departments_chapter',
		'app.attend',
		'app.users_chapter',
		'app.group',
		'app.users_group',
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
		$this->Chapter = ClassRegistry::init('Chapter');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Chapter);

		parent::tearDown();
	}

}
