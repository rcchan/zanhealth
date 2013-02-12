<?php
App::uses('AppController', 'Controller');

class ConfigController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Config';  public $uses = array('Zone', 'District', 'Facility', 'User', 'Vendor', 'Category', 'WorkPriority', 'WorkTrade');

  public function index($key = NULL){
    if ($key){      $model = Inflector::classify($key);      $this->set('key', $key);      $this->set('model', $model);            $typemap = array(        'string' => 'text',        'datetime' => 'date',        'integer' => 'text'      );            $fields = $this->{$model}->getColumnTypes();      foreach($fields as $k => &$v){        $fields[$k] = array('title' => $k, 'type' => $typemap[$v], 'key' => $k == 'id');      }      $this->set('fields', $fields);    }
  }    public function find($key = NULL){    $this->autoRender = false;    if($key){      $model = Inflector::classify($key);      $data = $this->{$model}->find('all', array('recursive'=>false));      foreach($data as &$d){        foreach($d as $k => &$f){          if (isset($f['password'])) $f['password'] = '[password encrypted]';          if ($k != $model){            $d[$model][strtolower($k) . '_id'] = $d[$k]['name'];            unset($d[$k]);          }        }        $d = $d[$model];      }      echo json_encode(array(        'Result' => 'OK',        'Records' => $data      ));    } else echo json_encode(array('Result' => 'ERROR', 'Message' => 'No key provided'));  }    public function create($key = NULL){    $this->autoRender = false;    if($key){      $model = Inflector::classify($key);      $d = $this->{$model}->save($_POST);      foreach($d as $k => &$f){        if ($k != $model){          $d[$model][strtolower($k) . '_id'] = $d[$k]['name'];          unset($d[$k]);        }      }      $d = $d[$model];            echo json_encode($d ? array(        'Result' => 'OK',        'Record' => $d      ) : array(        'Result' => 'ERROR',        'Message' => 'Could not save data'      ));    } else echo json_encode(array('Result' => 'ERROR', 'Message' => 'No key provided'));  }    public function apply($key = NULL){    echo 'POST '.$key;  }
}
