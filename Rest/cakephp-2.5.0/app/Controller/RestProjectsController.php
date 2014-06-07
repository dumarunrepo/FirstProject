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
        $Projects = $this->Project->query("select projects.* from projects , permission where projects.project_id = permission.project_id and $id = permission.user_id");
	$this->set(array(
            'Projects' => $Projects,
            '_serialize' => array('Projects')
        ));

    }

    public function trackingInfoByProject($id) {
        $Projects = $this->Project->query("select * from project_stage where project_id = '$id'");
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