<?php
/*
 * @copyright Copyright (c) 2013 SAVAGEBYTES
 */

class GoalsController extends AppController {
    public $helpers = array('Html', 'Form');
    public $components = array('Session');
    
    public function index() {
        $this->set('page_for_layout', 'goalspage');
        if (!$this->Auth->User('id')) {
            $this -> render('welcome');
        }
        else {
        $uid = $this->Auth->user('id');
        $this->set('goals', $this->Goal->query("SELECT * FROM goals WHERE user_id = $uid;"));
        }
    }
    
    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid goal'));
        }
        
        $goal = $this->Goal->findById($id);
        if (!$goal) {
            throw new NotFoundException(__('Invalid goal'));
        }
        $this->set('goal', $goal);
    }
    
 
    public function add() {
    if ($this->request->is('post')) {
        $this->request->data['Goal']['user_id'] = $this->Auth->user('id'); 
        if ($this->Goal->save($this->request->data)) {
            $this->Session->setFlash('Your goal has been saved.');
            $this->redirect(array('action' => 'index'));
        }
    }
}
    
    public function edit($id = null) {
    if (!$id) {
        throw new NotFoundException(__('Invalid goal'));
    }

    $goal = $this->Goal->findById($id);
    if (!$goal) {
        throw new NotFoundException(__('Invalid goal'));
    }

    if ($this->request->is('post') || $this->request->is('put')) {
        $this->Goal->id = $id;
        if ($this->Goal->save($this->request->data)) {
            $this->Session->setFlash('Your goal has been updated.');
            $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash('Unable to update your goal.');
        }
    }

    if (!$this->request->data) {
        $this->request->data = $goal;
    }
}
    public function delete($id) {
    if ($this->request->is('get')) {
        throw new MethodNotAllowedException();
    }

    if ($this->Goal->delete($id)) {
        $this->Session->setFlash('The goal with id: ' . $id . ' has been deleted.');
        $this->redirect(array('action' => 'index'));
    }
}
    public function isAuthorized($user) {
    // All registered users can add goals
    if ($this->action === 'add') {
        return true;
    }

    // The owner of a goal can edit and delete it
    if (in_array($this->action, array('edit', 'delete'))) {
        $goalId = $this->request->params['pass'][0];
        if ($this->Goal->isOwnedBy($goalId, $user['id'])) {
            return true;
        }
    }

    return parent::isAuthorized($user);
}

    public function friendsGoals(){
        $this->set('page_for_layout', 'friendspage');
        
    }
    
    public function settings(){
        $this->set('page_for_layout', 'settingspage');
        
    }
    
    public function about(){
        $this->set('page_for_layout', 'aboutpage');
        
    }
}