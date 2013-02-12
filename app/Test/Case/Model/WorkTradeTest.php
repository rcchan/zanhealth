<?php
App::uses('WorkTrade', 'Model');

/**
 * WorkTrade Test Case
 *
 */
class WorkTradeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.work_trade'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->WorkTrade = ClassRegistry::init('WorkTrade');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->WorkTrade);

		parent::tearDown();
	}

}
