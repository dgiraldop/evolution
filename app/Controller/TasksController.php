<?php

class TasksController extends AppController{


  function index(){
  }

  function json_tasks(){
    $this->autoRender = false;
    return json_encode($this->Task->find('all'));
  }

  function create()
  {
    if($this->request->is('post'))
    {
      if($this->Task->save($this->request->input('json_decode')))
      {
        $this->Session->setFlash('Task was added.');
        $this->redirect(array('action' => 'index'));
      }
      else
      {
        $this->Session->setFlash('Unable to add task.');
      }
    }
  }

  function delete($id)
  {
    if(!$this->request->is('post'))
    {
      throw new MethodNotAllowedException();
    }
    if($this->Task->delete($id))
    {
      $this->Session->setFlash('the user have been deleted');
      $this->redirect(array('action' => 'index'));
    }
  }
}
