<?php
App::uses('DepartmentsChapter', 'Model');

/**
 * DepartmentsChapter Test Case
 *
 */
class DepartmentsChapterTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.departments_chapter',
		'app.chapter',
		'app.chapter_type',
		'app.course',
		'app.user',
		'app.hoc_ham',
		'app.hoc_vi',
		'app.department',
		'app.class_room',
		'app.attend',
		'app.users_chapter',
		'app.group',
		'app.users_group',
		'app.session'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->DepartmentsChapter = ClassRegistry::init('DepartmentsChapter');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DepartmentsChapter);

		parent::tearDown();
	}

}
