<?php

class RestNotificationsController extends AppController {
    public $uses = array('Notification');
    public $helpers = array('Html', 'Form');
    public $components = array('RequestHandler');

    public function index() {
	$Notifications = $this->Notification->find('all');
	$this->set(array(
            'Notifications' => $Notifications,
            '_serialize' => array('Notifications')
        ));
    }

}