<?php

class RestUsersController extends AppController {
    public $uses = array('User');
    public $helpers = array('Html', 'Form');
    public $components = array('RequestHandler');

    public function index() {
	$Users = $this->User->find('all');
	$this->set(array(
            'Users' => $Users,
            '_serialize' => array('Users')
        ));

    }

    public function add() {
        $this->User->create();
        if ($this->User->save($this->request->data)) {
             $message = 'Created';
        } else {
            $message = 'Error';
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
    }
     
    public function view($id) {
        $User = $this->User->findByUserId($id);
        $this->set(array(
            'User' => $User,
            '_serialize' => array('User')
        ));
    }
 
     
    public function edit($id) {
        $this->User->UserId = $id;
        if ($this->User->save($this->request->data)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
    }
     
    public function delete($id) {
        if ($this->User->deleteAll(array('User.User_id' => $id), false)) {
            $message = 'Deleted';
        } else {
            $message = 'Error';
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
    }
}