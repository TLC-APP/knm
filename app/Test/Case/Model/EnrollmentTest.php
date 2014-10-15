<?php
App::uses('Enrollment', 'Model');

/**
 * Enrollment Test Case
 *
 */
class EnrollmentTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.enrollment',
		'app.fee_hangling',
		'app.absence_session',
		'app.absence_handling',
		'app.course',
		'app.student'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Enrollment = ClassRegistry::init('Enrollment');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Enrollment);

		parent::tearDown();
	}

}
