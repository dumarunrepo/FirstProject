<?php

class RestNotificationsController extends AppController {
    public $uses = array('Notification');
    public $helpers = array('Html', 'Form');
    public $components = array('RequestHandler');

    public function index($id) {
	$Notifications = $this->Notification->query("select * from notifications where client_name ='-1' or client_name=(select user_clientname from users where user_id=$id)");
	$this->set(array(
            'Notifications' => $Notifications,
            '_serialize' => array('Notifications')
        ));
    }

}