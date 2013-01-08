<?php
App::uses('Facility', 'Model');

/**
 * Facility Test Case
 *
 */
class FacilityTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.facility'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Facility = ClassRegistry::init('Facility');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Facility);

		parent::tearDown();
	}

}
