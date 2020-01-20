<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *
 */
class Settings extends CI_Controller
{
  private $logged_in;
  private $role;
  private $username;
  public function __construct(){
    parent::__construct();
    $this->logged_in = $this->session->userdata('logged_in');
    $this->role = $this->session->userdata('role');
    $this->username = $this->session->userdata('username');

    $this->template->title->set('SMS Based Online Bulletin Board System');

    if(!isset($this->logged_in)):
			redirect('auth/admin');
		elseif($this->role != 'admin'):
			exit('You dont have permission to access here.');
		endif;
  }
  function account(){
    $data = array(
      'page_title' => 'Settings | My Account',
      'account' => $this->admin_model->read(array('module' => 'account', 'conditions' => array('username' => $this->username))),
      'course_list' => $this->admin_model->browse(array('module' => 'course'))
    );
    //load content
    $this->template->content->view('/admin/contents/account', $data);

    //add js file
    $this->template->javascript->add('/resources/js/admin.js');

    $this->template->publish('layouts/admin');
  }
  function slider(){
    $data = array(
      'page_title' => 'Settings | Slider',
      'account' => $this->admin_model->read(array('module' => 'account', 'conditions' => array('username' => $this->username))),
      'slider' => $this->admin_model->browse(array('module' => 'slider'))
    );
    //load content
    $this->template->content->view('/admin/contents/slider', $data);

    //add js file
    $this->template->javascript->add('/resources/js/admin.js');

    $this->template->publish('layouts/admin');
  }
  function students(){
    $data = array(
      'page_title' => 'Settings | Students',
      'account' => $this->admin_model->read(array('module' => 'account', 'conditions' => array('username' => $this->username))),
      'students' => $this->admin_model->browse(array('module' => 'students')),
      'course_list' => $this->admin_model->browse(array('module' => 'course'))
    );
    //load content
    $this->template->content->view('admin/contents/list_students', $data);

    //add js file
    $this->template->javascript->add('/resources/js/admin.js');

    $this->template->publish('layouts/admin');
  }

  function presidents(){

    $data = array(
      'page_title' => 'Settings | Presidents',
      'account' => $this->admin_model->read(array('module' => 'account', 'conditions' => array('username' => $this->username))),
      'presidents' => $this->admin_model->browse(array('module' => 'presidents')),
      'course_list' => $this->admin_model->browse(array('module' => 'course'))
    );
    //load content
    $this->template->content->view('/admin/contents/list_presidents', $data);

    //add js file
    $this->template->javascript->add('/resources/js/admin.js');

    $this->template->publish('layouts/admin');
  }

  function sms(){
    $username = $this->session->userdata('username');
    $data = array(
      'page_title' => 'SMS History',
      'account' => $this->admin_model->read(array('module' => 'account', 'conditions' => array('username' => $username))),
      'sms_history' => $this->admin_model->browse(array('module' => 'SMS', 'conditions' => array('operator' => $username)))
    );
    //load content
    $this->template->content->view('/admin/contents/sms', $data);

    //add js file
    $this->template->javascript->add('/resources/js/admin.js');

    $this->template->publish('layouts/admin');
  }
}

 ?>
