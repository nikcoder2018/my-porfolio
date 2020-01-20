<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *www.jhbulletin.com
 */
class Auth extends CI_Controller
{
  public function __construct(){
      parent::__construct();
      $this->template->title->set('SMS Based Online Bulletin Board System');
      if(isset($_SESSION['logged_in']) && $this->uri->segment(2) != 'logout'):
        switch($this->session->userdata('role')):
          case 'admin':
            redirect('admin/dashboard');
          break;
          case 'student':
            redirect('student/home');
          break;
        endswitch;
  		endif;
  }
  function admin(){
    $data = array(
      'page_title' => 'Admin Login'
    );
    //load content
    $this->template->content->view('/admin/contents/login', $data);

    //add js file
    $this->template->javascript->add('/resources/js/auth.js');

    //publish
    $this->template->publish('layouts/app');
  }
  function student(){
    if($this->session->userdata('logged_in') && $this->session->userdata('role') == 'student'):
        redirect('/');
    endif;

    $this->template->title->set('SMS Based Online Bulletin Board System');

    //load content
    $this->template->content->view('/contents/login');

    //add js file
    $this->template->javascript->add('/resources/js/auth.js');
    $this->template->javascript->add('/node_modules/jquery-validation/dist/jquery.validate.min.js');
    $this->template->publish('layouts/app');
  }

  function signup(){
    //redirect if user already logged in
    if($this->session->userdata('logged_in') && $this->session->userdata('role') == 'student'):
        redirect('/');
    endif;

    $this->template->title->set('SMS Based Online Bulletin Board System');

    $list_course = $this->auth_model->r_list(array('type' => 'course'));

    $data = array(
      'course' => $list_course
    );
    //load content
    $this->template->content->view('/contents/register', $data);
    //add js file
    $this->template->javascript->add('/resources/js/auth.js');
    $this->template->publish('layouts/app');
  }
  function student_validation(){
    $message = array();
    if($this->form_validation->run('login') == FALSE):
      $message = array(
        'type' => 'validation',
        'message'  => $this->form_validation->error_array()
      );
    else:
      $request = array(
        'type'  => 'validate_user',
        'fields'=> array('user_name' => $this->input->post('username')),
        'portal'=> 'student'
      );
      $result = $this->auth_model->login($request);
      if($result):
        if(password_verify($this->input->post('password'), $result->password)):
          $session = array(
            'userid' => $result->id,
            'username'  => $result->username,
            'role'  => 'student',
            'logged_in' => TRUE
          );
          //redirect after session is created
          $this->session->set_userdata($session);

          if($this->session->userdata('logged_in')):
            $message = array(
              'type'    => 'success',
              'message' => 'User successfully logged.',
              'redirect'=> 'home'
            );
          endif;
        else:
          $message = array('type' => 'fail','message' => 'Wrong Password');
        endif;
      else:
          $message = array('type' => 'fail','message' => 'User not found');
      endif;
    endif;

    $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($message));
  }
  function admin_validation(){
    $message = array();
    if($this->form_validation->run('login') == FALSE):
      $message = array(
        'type' => 'validation',
        'message'  => $this->form_validation->error_array()
      );
    else:
      $request = array(
        'type'  => 'validate_user',
        'fields'=> array('user_name' => $this->input->post('username')),
        'portal'=> 'admin'
      );
      $result = $this->auth_model->login($request);
      if($result):
        if(password_verify($this->input->post('password'), $result->password)):
          $session = array(
            'userid' => $result->id,
            'username'  => $result->username,
            'role'  => 'admin',
            'position' => $result->position,
            'logged_in' => TRUE
          );
          //redirect after session is created
          $this->session->set_userdata($session);

          if($this->session->userdata('logged_in')):
            $message = array(
              'type'    => 'success',
              'message' => 'User successfully logged.',
              'redirect'=> 'admin/dashboard'
            );
          endif;
        else:
          $message = array('type' => 'fail','message' => 'Wrong Password');
        endif;
      else:
        $message = array('type' => 'fail','message' => 'User not found');
      endif;
    endif;

    $this->output
    ->set_content_type('application/json')
    ->set_output(json_encode($message));
  }

  function register(){
    $message = array(
          'type' => 'fail',
          'message' => 'This function is temporarily unavailable.'
    );
    $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($message));
  }
  function logout(){
    //unset
    $this->session->unset_userdata('username');
    $this->session->unset_userdata('logged_in');
    $this->session->unset_userdata('role');
    //destroy
    $this->session->sess_destroy();

    redirect('/', 'refresh');
  }
}

 ?>
