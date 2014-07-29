<?php

class RestProductsController extends AppController {
    public $uses = array('Product');
    public $helpers = array('Html', 'Form');
    public $components = array('RequestHandler');

    public function index() {
	$Products = $this->Product->find('all');
	$this->set(array(
            'Products' => $Products,
            '_serialize' => array('Products')
        ));
    }

}