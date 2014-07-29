<?php

class RestProductsController extends AppController {
    public $uses = array('Product');
    public $helpers = array('Html', 'Form');
    public $components = array('RequestHandler');

    public function index($id) {
	$Products = $this->Product->query("select * from products where client_name in ('-1', '$id')");
	$this->set(array(
            'Products' => $Products,
            '_serialize' => array('Products')
        ));
    }

}