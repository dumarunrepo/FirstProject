<?php

class RestStatisticsController extends AppController {
    public $uses = array('Statistic');
    public $helpers = array('Html', 'Form');
    public $components = array('RequestHandler');

    public function index() {
	$Statistics = $this->Statistic->query('select count(1) as `statistics` from projects p union select  count(1) from clients union select count(1) from feedbacks;');
	$this->set(array(
            'Statistics' => $Statistics,
            '_serialize' => array('Statistics')
        ));
    }

}