<?php
App::uses('WorkPriority', 'Model');

/**
 * WorkPriority Test Case
 *
 */
class WorkPriorityTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.work_priority'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->WorkPriority = ClassRegistry::init('WorkPriority');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->WorkPriority);

		parent::tearDown();
	}

}
