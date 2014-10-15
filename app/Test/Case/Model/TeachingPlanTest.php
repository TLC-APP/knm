<?php
App::uses('TeachingPlan', 'Model');

/**
 * TeachingPlan Test Case
 *
 */
class TeachingPlanTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.teaching_plan',
		'app.teacher'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TeachingPlan = ClassRegistry::init('TeachingPlan');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TeachingPlan);

		parent::tearDown();
	}

}
