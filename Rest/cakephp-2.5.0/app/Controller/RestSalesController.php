<?php

class RestSalesController extends AppController {
    public $uses = array('Sale');
    public $helpers = array('Html', 'Form');
    public $components = array('RequestHandler');

    public function index() {
	$Sales = $this->Sale->find('all');
	$this->set(array(
            'Sales' => $Sales,
            '_serialize' => array('Sales')
        ));
    }
}