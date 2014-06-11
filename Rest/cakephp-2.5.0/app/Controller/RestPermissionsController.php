<?php

class RestPermissionsController extends AppController {
    public $uses = array('Permission');
    public $helpers = array('Html', 'Form');
    public $components = array('RequestHandler');

    public function add() {
        $this->Permission->create();
        if ($this->Permission->save($this->request->data)) {
             $message = 'Created';
        } else {
            $message = 'Error';
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
    }

}