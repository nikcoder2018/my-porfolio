<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index()
	{
		if(isset($_SESSION['logged_in']) && isset($_SESSION['usertype'])):
			if($_SESSION['usertype'] == 'admin'):
				redirect('admin');
			elseif($_SESSION['usertype'] == 'student'):
				redirect('students');
			endif;
		endif;

    //load content
    $this->template->content->view('/auth/contents/login');

		//add js file
    $this->template->javascript->add('/resources/js/login.js');

    //publish
    $this->template->publish('layouts/auth');
	}
	public function login(){
		if(isset($_SESSION['logged_in']) && isset($_SESSION['usertype'])):
			if($_SESSION['usertype'] == 'admin'):
				redirect('admin');
			elseif($_SESSION['usertype'] == 'student'):
				redirect('students');
			endif;
		endif;

		$result = array();
    if($this->form_validation->run('login') == FALSE):
      $result = array(
        'type' => 'validation',
        'message'  => $this->form_validation->error_array()
      );
    else:
      $data = array(
        'module'  => 'validate_user',
        'fields'=> array('username' => $this->input->post('username'))
      );
      $request = $this->auth_model->login($data);
      if($request):
        if(password_verify($this->input->post('password'), $request['password_hash'])):
          $session = array(
						'userid' => $request['userid'],
            'username'  => $this->input->post('username'),
            'usertype'  => $request['usertype'],
            'logged_in' => TRUE
          );
          //redirect after session is created
          $this->session->set_userdata($session);

          if($this->session->userdata('logged_in')):
						switch($request['usertype']):
							case 'student':
							$result = array(
								'type'    => 'success',
								'message' => 'User successfully logged.',
								'redirect'=> 'students'
							);
							break;
							case 'admin':
							$result = array(
	              'type'    => 'success',
	              'message' => 'User successfully logged.',
	              'redirect'=> 'admin'
	            );
							break;
						endswitch;
          endif;
        else:
          $result = array('type' => 'fail','message' => 'Wrong Password');
        endif;
      else:
          $result = array('type' => 'fail','message' => 'User not found');
      endif;
    endif;

    $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($result));
	}
	function logout(){
    //unset
    $this->session->unset_userdata('username');
    $this->session->unset_userdata('logged_in');
    $this->session->unset_userdata('usertype');
    //destroy
    $this->session->sess_destroy();

    redirect('auth', 'refresh');
  }
}
