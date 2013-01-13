<?php

App::uses('AppController', 'Controller');

class ItemsController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Items';

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();
  
  public function index(){
    $this->set('data', $this->Item->find('all'));
  }
}
?>