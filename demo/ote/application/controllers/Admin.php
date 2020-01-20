<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if(!isset($_SESSION['logged_in'])):
			redirect('auth');
		elseif($_SESSION['usertype'] != 'admin'):
			exit('You dont have permission to access here.');
		endif;
	}

	public function index()
	{
		$data = array(
			'teachers' => $this->admin_model->browse(array('module' => 'teachers')),
			'topteacher' => $this->admin_model->browse(array('module' => 'topteacher')),
		);
    //load content
    $this->template->content->view('/admin/contents/home', $data);

    //add js file
    $this->template->javascript->add('/resources/js/admin-datatables.js');

    //publish
    $this->template->publish('layouts/admin');
	}

  public function students(){
		$data = array(
			'students' => $this->admin_model->browse(array('module' => 'students')),
			'courses' => $this->admin_model->browse(array('module' => 'courses'))
		);
    //load content
    $this->template->content->view('/admin/contents/students', $data);

    //add js file
    $this->template->javascript->add('/resources/js/admin-datatables.js');
	$this->template->javascript->add('/resources/js/admin-functions.js');

    //publish
    $this->template->publish('layouts/admin');
  }

  public function teachers(){
		$data = array(
			'teachers' => $this->admin_model->browse(array('module' => 'teachers')),
			'positions' => $this->admin_model->browse(array('module' => 'positions'))
		);

    //load content
    $this->template->content->view('/admin/contents/teachers', $data);

    //add js file
    $this->template->javascript->add('/resources/js/admin-datatables.js');
		$this->template->javascript->add('/resources/js/admin-functions.js');
    //publish
    $this->template->publish('layouts/admin');
  }
	public function classes(){
		$data = array(
			'classes' => $this->admin_model->browse(array('module' => 'classes')),
			'subjects' => $this->admin_model->browse(array('module' => 'subjects')),
			'students' => $this->admin_model->browse(array('module' => 'students')),
			'teachers' => $this->admin_model->browse(array('module' => 'teachers')),
		);
		//load content
    $this->template->content->view('/admin/contents/classes', $data);

    //add js file
    $this->template->javascript->add('/resources/js/admin-datatables.js');
		$this->template->javascript->add('/resources/js/admin-functions.js');
    //publish
    $this->template->publish('layouts/admin');
	}
	public function subjects(){
		$data = array(
			'subjects' => $this->admin_model->browse(array('module' => 'subjects'))
		);
		//load content
		$this->template->content->view('/admin/contents/subjects', $data);

		//add js file
		$this->template->javascript->add('/resources/js/admin-datatables.js');
		$this->template->javascript->add('/resources/js/admin-functions.js');
		//publish
		$this->template->publish('layouts/admin');
	}
	public function departments(){
		$data = array(
			'departments' => $this->admin_model->browse(array('module' => 'departments'))
		);
		//load content
		$this->template->content->view('/admin/contents/departments', $data);

		//add js file
		$this->template->javascript->add('/resources/js/admin-datatables.js');
		$this->template->javascript->add('/resources/js/admin-functions.js');
		//publish
		$this->template->publish('layouts/admin');
	}
	public function questionnaire(){

		$data = array(
			'questionnaire' => $this->admin_model->browse(array('module' => 'questionnaire')),
			'questionnaire_category' => $this->admin_model->browse(array('module' => 'questionnaire_category'))
		);
		//load content
    $this->template->content->view('/admin/contents/questionnaire', $data);

    //add js file
    $this->template->javascript->add('/resources/js/admin-datatables.js');
		$this->template->javascript->add('/resources/js/questionnaire.js');

    //publish
    $this->template->publish('layouts/admin');
	}
	public function category(){

	$data = array(
		'questionnaire_category' => $this->admin_model->browse(array('module' => 'questionnaire_category'))
	);
		//load content
    $this->template->content->view('/admin/contents/category', $data);

    //add js file
    $this->template->javascript->add('/resources/js/admin-datatables.js');
	$this->template->javascript->add('/resources/js/admin-functions.js');

    //publish
    $this->template->publish('layouts/admin');
	}
  public function results($param){
		$data['remark'] = $param;
		$data['teachers'] = array();

		$teachers = $this->admin_model->browse(array('module' => 'topteacher'));
		switch($param):
			case 'outstanding':
				if(is_array($teachers)):
					foreach($teachers as $key=>$val):
						$rate = floor(($val->total_rate)/($val->number_of_students*100)*100);
						switch(true):
								case in_array($rate, range(97, 100)):
									array_push($data['teachers'], $val);
								break;
						endswitch;
					endforeach;
				endif;
			break;
			case 'verysatisfactory':
				if(is_array($teachers)):
					foreach($teachers as $key=>$val):
						$rate = floor(($val->total_rate)/($val->number_of_students*100)*100);
						switch(true):
								case in_array($rate, range(92, 96)):
									array_push($data['teachers'], $val);
								break;
						endswitch;
					endforeach;
				endif;
			break;
			case 'satisfactory':
				if(is_array($teachers)):
					foreach($teachers as $key=>$val):
						$rate = floor(($val->total_rate)/($val->number_of_students*100)*100);
						switch(true):
								case in_array($rate, range(86, 91)):
									array_push($data['teachers'], $val);
								break;
						endswitch;
					endforeach;
				endif;
			break;
			case 'fair':
				if(is_array($teachers)):
					foreach($teachers as $key=>$val):
						$rate = floor(($val->total_rate)/($val->number_of_students*100)*100);
						switch(true):
								case in_array($rate, range(80, 85)):
									array_push($data['teachers'], $val);
								break;
						endswitch;
					endforeach;
				endif;
			break;
			case 'poor':
				if(is_array($teachers)):
					foreach($teachers as $key=>$val):
						$rate = floor(($val->total_rate)/($val->number_of_students*100)*100);
						switch(true):
								case in_array($rate, range(0, 79)):
									array_push($data['teachers'], $val);
								break;
						endswitch;
					endforeach;
				endif;
			break;
		endswitch;

		//load content
    $this->template->content->view('/admin/contents/results', $data);

		//add js file
    $this->template->javascript->add('/resources/js/admin-datatables.js');

		//publish
    $this->template->publish('layouts/admin');
  }

  public function reports(){
		$data = array(
			'evaluation_results' => $this->admin_model->browse(array('module' => 'evaluation_results'))
		);

		//load content
		$this->template->content->view('/admin/contents/reports', $data);

		//add js file
		$this->template->javascript->add('/resources/js/admin-datatables.js');
		$this->template->javascript->add('/resources/dist/jspdf.debug.js');
		$this->template->javascript->add('/resources/js/admin-functions.js');

		//publish
		$this->template->publish('layouts/admin');
  }

  public function notifications($id = false){
		if($id != false):
			$this->admin_model->edit(array('table' => 'notifications', 'fields' => array('status' => 'read'), 'condition' => array('id' => $id)));
		else:
			$this->admin_model->edit(array('table' => 'notifications', 'fields' => array('status' => 'read'), 'condition' => array('status' => 'unread')));
		endif;
		$data = array();
		if($id != false):
			$data = array(
				'notifications' => $this->admin_model->browse(array('module' => 'notifications', 'conditions'=>array('id'=>$id)))
			);
		else:
			$data = array(
				'notifications' => $this->admin_model->browse(array('module' => 'notifications'))
			);		endif;
		//load content
		$this->template->content->view('/admin/contents/notifications', $data);

		//add js file
		$this->template->javascript->add('/resources/js/admin-datatables.js');

		//publish
		$this->template->publish('layouts/admin');
  }

	public function changepassword(){
		//load content
		$this->template->content->view('/admin/contents/changepassword');

		//add js file
		$this->template->javascript->add('/resources/js/admin-functions.js');

		//publish
		$this->template->publish('layouts/admin');
	}
}
