<?php
App::uses('WorkRequest', 'Model');

/**
 * WorkRequest Test Case
 *
 */
class WorkRequestTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.work_request',
		'app.work_priority',
		'app.item',
		'app.vendor',
		'app.facility',
		'app.district',
		'app.zone',
		'app.category',
		'app.work_trade',
		'app.requestor'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->WorkRequest = ClassRegistry::init('WorkRequest');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->WorkRequest);

		parent::tearDown();
	}

}
