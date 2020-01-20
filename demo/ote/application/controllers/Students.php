<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if(!isset($_SESSION['logged_in'])):
			redirect('auth');
		elseif($_SESSION['usertype'] != 'student'):
			exit('You dont have permission to access here.');
		endif;
	}

	public function index()
	{
    //load content
    $this->template->content->view('/students/contents/home');

    //add js file
    $this->template->javascript->add('/resources/js/admin-datatables.js');

    //publish
    $this->template->publish('layouts/students');
	}
  public function teachers(){
		$questionnaire = array();
		$q_category = $this->admin_model->browse(array('module' => 'questionnaire_category'));
		foreach($q_category as $key=>$val):
			$questions = $this->admin_model->browse(array('module' => 'questionnaire', 'conditions' => array('a.category'=>$val->id)));
			$category = array(
				'category' => $val->category,
				'questions' => $questions
			);
			array_push($questionnaire, $category);
		endforeach;
		$data = array(
			'teachers' => $this->admin_model->browse(array('module' => 'classes', 'student' => $_SESSION['userid'])),
			'questionnaire' => $questionnaire
		);
		//load content
    $this->template->content->view('/students/contents/teachers', $data);

    //add js file
		$this->template->javascript->add('/resources/js/admin-datatables.js');
		$this->template->javascript->add('/resources/js/students.js');

    //publish
    $this->template->publish('layouts/students');
  }
	public function changepassword(){
		
		//load content
		$this->template->content->view('/students/contents/changepassword');

		//add js file
		$this->template->javascript->add('/resources/js/students.js');

		//publish
		$this->template->publish('layouts/students');
	}
}
