<?php

class RestProjectsController extends AppController {
    public $uses = array('Project');
    public $helpers = array('Html', 'Form');
    public $components = array('RequestHandler');

    public function index() {
	$Projects = $this->Project->find('all');
	$this->set(array(
            'Projects' => $Projects,
            '_serialize' => array('Projects')
        ));

    }

    public function indexByUser($id) {
        $Projects = $this->Project->query("select 
		projects.project_id,
		projects.project_name,
		projects.is_completed,
		projects.client,
		projects.manager,
		projects.steps,
		projects.description,
		projects.start_date,
		projects.end_date,
		concat('http://ec2-54-201-175-230.us-west-2.compute.amazonaws.com/admin/',projects.report_url) as report_url
		from projects , permissions where projects.project_id = permissions.project_id and $id = permissions.user_id");
	$this->set(array(
            'Projects' => $Projects,
            '_serialize' => array('Projects')
        ));

    }

    public function trackingInfoByProject($id) {
        $Projects = $this->Project->query("select 
	project_id,
	project_stage,
	project_status,
	start_date,
	end_date,
	concat('http://ec2-54-201-175-230.us-west-2.compute.amazonaws.com/admin/',report_url) as report_url
	from project_stage where project_id = '$id'");
	$this->set(array(
            'Projects' => $Projects,
            '_serialize' => array('Projects')
        ));

    }

    public function add() {
        $this->Project->create();
        if ($this->Project->save($this->request->data)) {
             $message = 'Created';
        } else {
            $message = 'Error';
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
    }
     
    public function view($id) {
        $Project = $this->Project->findByProjectId($id);
        $this->set(array(
            'Project' => $Project,
            '_serialize' => array('Project')
        ));
    }
 
     
    public function edit($id) {
        $this->Project->ProjectId = $id;
        if ($this->Project->save($this->request->data)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
    }
     
    public function delete($id) {
        if ($this->Project->deleteAll(array('Project.project_id' => $id), false)) {
            $message = 'Deleted';
        } else {
            $message = 'Error';
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
    }
}