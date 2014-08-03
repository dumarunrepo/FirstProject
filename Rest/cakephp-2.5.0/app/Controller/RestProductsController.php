<?php

class RestProductsController extends AppController {
    public $uses = array('Product');
    public $helpers = array('Html', 'Form');
    public $components = array('RequestHandler');

    public function index($id) {
	$Products = $this->Product->query("select * from products where client_name in ('-1') or client_name=(select user_clientname from users where user_id='$id')");
	$this->set(array(
            'Products' => $Products,
            '_serialize' => array('Products')
        ));
    }

}