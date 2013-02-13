<?
/**************************************************************************\
* Copyright 2013 Ryan Chan <ryan@rcchan.com>                               *
*                                                                          *
* This program is free software: you can redistribute it and/or modify     *
* it under the terms of the GNU Affero General Public License as           *
* published by the Free Software Foundation, either version 3 of the       *
* License, or (at your option) any later version.                          *
*                                                                          *
* This program is distributed in the hope that it will be useful,          *
* but WITHOUT ANY WARRANTY; without even the implied warranty of           *
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            *
* GNU Affero General Public License for more details.                      *
*                                                                          *
* You should have received a copy of the GNU Affero General Public License *
* along with this program.  If not, see <http://www.gnu.org/licenses/>.    *
*                                                                          *
*                                                                          *
* Additional permission under the GNU Affero GPL version 3 section 7:      *
*                                                                          *
* If you modify this Program, or any covered work, by linking or           *
* combining it with other code, such other code is not for that reason     *
* alone subject to any of the requirements of the GNU Affero GPL           *
* version 3.                                                               *
\**************************************************************************/
?>
<?php

App::uses('AppController', 'Controller');

class WorkRequestsController extends AppController {
  public function index($prop = 'Status', $value = 'Open'){
    $this->set('title_for_layout', 'View Work Requests');
    switch($prop){
      case 'facility':
        $this->set('data', $this->WorkRequest->find('all', array(
          'conditions' => array( 'Item.facility_id' => $value ),
          'contain' => 'Item.facility_id'
        )));
        break;
      case 'requestor':
        $prop .= '_id';
        //fall through
      default:
        $this->set('data', $this->WorkRequest->{'findAllBy'.$prop}($value));
    }
  }
  
  public function requestor(){
    $this->set('title_for_layout', 'View Work Requests');
    if ($this->request->is('post')) $this->redirect(array('..', 'requestor', $_POST['data']['WorkRequest']['requestor']));
    $this->set('requestors', $this->WorkRequest->Requestor->find('list'));
  }
  
  public function facility(){
    $this->set('title_for_layout', 'View Work Requests');
    if ($this->request->is('post')) $this->redirect(array('..', 'facility', $_POST['data']['Facility']['facility']));
    $this->set('facilities', $this->WorkRequest->Item->Facility->find('list'));
  }
  
  public function upsert($id = null){
    $this->set('title_for_layout', 'Create Work Request');
    if ($this->request->is('post') || $this->request->is('put')) {
      $this->WorkRequest->create();
      if ($this->WorkRequest->save($this->request->data)) {
        $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The work request could not be saved. Please, try again.'));
      }
    }
    $this->set('workPriorities', $this->WorkRequest->WorkPriority->find('list'));
    $this->set('workTrades', $this->WorkRequest->WorkTrade->find('list'));
    $this->set('requestors', $this->WorkRequest->Requestor->find('list'));
    $this->set('items', $this->WorkRequest->Item->find('list'));
    
    if ($id) $this->request->data = $this->WorkRequest->findById($id);
  }
}
?>