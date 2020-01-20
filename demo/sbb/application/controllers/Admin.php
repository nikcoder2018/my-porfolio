<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Author: Unknown
*/
class Admin extends CI_Controller
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
  function index(){
    $data = array(
      'page_title' => 'Dashboard',
      'account' => $this->admin_model->read(array('module' => 'account', 'conditions' => array('username' => $this->username))),
      'departments' => $this->admin_model->browse(array('module' => 'departments')),
      'recent_announcements' => $this->admin_model->browse(array('module' => 'recent_announcements')),
      'recent_events' => $this->admin_model->browse(array('module' => 'recent_events'))
    );
    //load content
    $this->template->content->view('/admin/contents/dashboard', $data);

    //add js file
    $this->template->publish('layouts/admin');
  }
  function events(){
    $data = array(
      'page_title' => 'Events',
      'account' => $this->admin_model->read(array('module' => 'account', 'conditions' => array('username' => $this->username))),
      'departments' => $this->admin_model->browse(array('module' => 'departments')),
      'events' => $this->admin_model->browse(array('module' => 'events'))
    );

    //load content
    $this->template->content->view('/admin/contents/events', $data);

    //add js file
    $this->template->javascript->add('/resources/js/admin.js');

    $this->template->publish('layouts/admin');
  }
  function activities($dept){
    $data = array(
      'page_title' => 'Activities',
      'selected' => $this->admin_model->read(array('module' => 'departments', 'conditions' => array('id' => $dept))),
      'account' => $this->admin_model->read(array('module' => 'account', 'conditions' => array('username' => $this->username))),
      'departments' => $this->admin_model->browse(array('module' => 'departments')),
      'activities' => $this->admin_model->browse(array('module' => 'activities', 'department' => $dept))
    );

    //load content
    $this->template->content->view('/admin/contents/activities', $data);

    //add js file
    $this->template->javascript->add('/resources/js/admin.js');

    //publish
    $this->template->publish('layouts/admin');
  }
  function announcements(){
    $data = array(
      'page_title' => 'Announcements',
      'account' => $this->admin_model->read(array('module' => 'account', 'conditions' => array('username' => $this->username))),
      'departments' => $this->admin_model->browse(array('module' => 'departments')),
      'announcements' => $this->admin_model->browse(array('module' => 'announcements')),
    );

    //load content
    $this->template->content->view('/admin/contents/announcements', $data);

    //add js file
    $this->template->javascript->add('/resources/js/admin.js');

    $this->template->publish('layouts/admin');
  }
  function student_list(){
    $data = array(
      'page_title' => 'Student List',
      'account' => $this->admin_model->read(array('module' => 'account', 'conditions' => array('username' => $this->username))),
      'departments' => $this->admin_model->browse(array('module' => 'departments')),
      'students' => $this->admin_model->browse(array('module' => 'students'))
    );
    //load content
    $this->template->content->view('/admin/contents/list_students', $data);

    //add js file
    $this->template->javascript->add('/resources/js/admin.js');

    $this->template->publish('layouts/admin');
  }
  function president_list(){
    $data = array(
      'page_title' => 'President List',
      'account' => $this->admin_model->read(array('module' => 'account', 'conditions' => array('username' => $this->username))),
      'departments' => $this->admin_model->browse(array('module' => 'departments')),
      'presidents' => $this->admin_model->browse(array('module' => 'presidents'))
    );
    //load content
    $this->template->content->view('/admin/contents/list_presidents', $data);

    //add js file
    $this->template->javascript->add('/resources/js/admin.js');

    $this->template->publish('layouts/admin');
  }
}

?>
