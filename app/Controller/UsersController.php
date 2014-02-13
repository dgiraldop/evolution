<?php
class UsersController extends AppController{
    
    //Still some issues with the Auth component
    
    /*function login() 
    {
        if($this->request->is('post')){
        {
            //exit($this->request->data['User']);
              debug(AuthComponent::password($this->request->data['User']['password']));
              if(!empty($this->request->data['User']) && $this->Auth->login()){
                  $this->loginUser = AuthComponent::user();  // Here $this->loginUser is defined so we can get the user values here. 
                  return $this->redirect($this->Auth->redirect());
              }else{
                  $this->Session->setFlash('Username or password is incorrect', 'default', array(), 'auth');
              }
          }   
         
        }
    }

    function logout() {
        $this->redirect($this->Auth->logout());
    }*/
    
    public function index() {
        $this->set('users', $this->User->find('all'));
    }
    
    public function add(){

        if ($this->request->is('post')){
            if ($this->User->save($this->request->data)){
                $this->Session->setFlash('User was added.');
                $this->redirect(array( 'controller' => 'users', 'action' => 'index'));
            }else{
                $this->Session->setFlash('Unable to add user. Please, try again.');
            }
        }
    }
    
    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->User->delete($id)) {
            $this->Session->setFlash(__('The user having id: %s has been deleted.', $id));
            $this->redirect(array('action' => 'index'));
        }
    }
    
    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid user'));
        }

        $user = $this->User->findById($id);
        if (!$user) {
            throw new NotFoundException(__('Invalid user'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            $this->User->id = $id;
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('User has been updated.'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Unable to update User.'));
            }
        }

        if (!$this->request->data) {
            $this->request->data = $user;
        }
    }
}

?>
