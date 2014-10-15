<?php
App::uses('DepartmentsController', 'Controller');

/**
 * DepartmentsController Test Case
 *
 */
class DepartmentsControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.department',
		'app.department_type',
		'app.classroom',
		'app.user',
		'app.province',
		'app.user_group',
		'app.user_group_permission',
		'app.login_token',
		'app.enrollment',
		'app.period',
		'app.course',
		'app.chapter',
		'app.chapter_type',
		'app.departments_chapter',
		'app.users_chapter',
		'app.room',
		'app.teaching_plan'
	);

/**
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {
		$this->markTestIncomplete('testIndex not implemented.');
	}

/**
 * testView method
 *
 * @return void
 */
	public function testView() {
		$this->markTestIncomplete('testView not implemented.');
	}

/**
 * testAdd method
 *
 * @return void
 */
	public function testAdd() {
		$this->markTestIncomplete('testAdd not implemented.');
	}

/**
 * testEdit method
 *
 * @return void
 */
	public function testEdit() {
		$this->markTestIncomplete('testEdit not implemented.');
	}

/**
 * testDelete method
 *
 * @return void
 */
	public function testDelete() {
		$this->markTestIncomplete('testDelete not implemented.');
	}

}
