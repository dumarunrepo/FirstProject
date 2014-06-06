<?php

class RestFeedbacksController extends AppController {
    public $uses = array('Feedback');
    public $helpers = array('Html', 'Form');
    public $components = array('RequestHandler');

    public function index() {
	$Feedbacks = $this->Feedback->find('all');
	$this->set(array(
            'Feedbacks' => $Feedbacks,
            '_serialize' => array('Feedbacks')
        ));
    }

    public function add() {
        $this->Feedback->create();
        if ($this->Feedback->save($this->request->data)) {
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