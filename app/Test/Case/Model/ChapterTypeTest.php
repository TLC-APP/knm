<?php
App::uses('ChapterType', 'Model');

/**
 * ChapterType Test Case
 *
 */
class ChapterTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.chapter_type',
		'app.chapter'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ChapterType = ClassRegistry::init('ChapterType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ChapterType);

		parent::tearDown();
	}

}
