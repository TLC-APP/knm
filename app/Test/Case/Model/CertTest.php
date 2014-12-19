<?php
App::uses('Cert', 'Model');

/**
 * Cert Test Case
 *
 */
class CertTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.cert',
		'app.student'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Cert = ClassRegistry::init('Cert');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Cert);

		parent::tearDown();
	}

}
