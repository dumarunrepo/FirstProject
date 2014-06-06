<?php

class RestSupportsController extends AppController {
    public $uses = array('Support');
    public $helpers = array('Html', 'Form');
    public $components = array('RequestHandler');

    public function index() {
	$Supports = $this->Support->find('all');
	$this->set(array(
            'Supports' => $Supports,
            '_serialize' => array('Supports')
        ));
    }
}