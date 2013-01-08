<?php
App::uses('AppModel', 'Model');
/**
 * Item Model
 *
 * @property Facility $Facility
 */
class Item extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Facility' => array(
			'className' => 'Facility',
			'foreignKey' => 'facility_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
