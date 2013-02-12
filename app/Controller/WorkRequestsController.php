<?php

App::uses('AppController', 'Controller');

class WorkRequestsController extends AppController {
  public function index($status = null){
    $this->set('data', $this->WorkRequest->findAllByStatus($status));
  }
  
  public function create(){
    if ($this->request->is('post')) {
      $this->WorkRequest->create();
      if ($this->WorkRequest->save($this->request->data)) {
        $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The work request could not be saved. Please, try again.'));
      }
    }
    
  }
}
?>