<?php
/**
 * LocationFixture
 *
 */
class LocationFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'location';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'facility_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'floor' => array('type' => 'integer', 'null' => false, 'default' => null),
		'room' => array('type' => 'integer', 'null' => false, 'default' => null),
		'building' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);;

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'facility_id' => 1,
			'floor' => 1,
			'room' => 1,
			'building' => 'Lorem ipsum dolor sit amet'
		),
	);

}
