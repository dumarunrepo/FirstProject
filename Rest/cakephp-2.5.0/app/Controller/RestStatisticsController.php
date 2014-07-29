<?php

class RestStatisticsController extends AppController {
    public $uses = array('Statistic');
    public $helpers = array('Html', 'Form');
    public $components = array('RequestHandler');

    public function index() {
	$Statistics = $this->Statistic->query('select (select count(1) from projects) as projects,(select count(1) from clients) as clients,(select count(1) from feedbacks) as feedbacks;');
	$this->set(array(
            'Statistics' => $Statistics,
            '_serialize' => array('Statistics')
        ));
    }

}