<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Author:
 */
class Students extends CI_Controller
{
  public function __construct(){
    parent::__construct();
    $this->template->title->set('SMS Based Online Bulletin Board System');
  }
  function index(){
    if($this->session->userdata('logged_in') || $this->session->userdata('role') == 'student'):
      redirect('/home');
    endif;

    $data = array(
      'slider' => $this->admin_model->browse(array('module' => 'slider')),
      'course_list' => $this->admin_model->browse(array('module' => 'course'))
    );
    //load content
    $this->template->content->view('/students/content/index', $data);

    //add js file
    $this->template->javascript->add('/resources/js/student.js');
    $this->template->javascript->add('/resources/js/auth.js');

    //publish
    $this->template->publish('layouts/app');
  }
  public function home(){
    if(!$this->session->userdata('logged_in') || $this->session->userdata('role') != 'student'):
      redirect('/');
    endif;

    $data = array(
      'activities' => $this->admin_model->browse(array('module' => 'activities', 'department' => 1)),
      'agriculture' => $this->admin_model->browse(array('module' => 'activities', 'department' => 2)),
      'criminology' => $this->admin_model->browse(array('module' => 'activities', 'department' => 3)),
      'education' => $this->admin_model->browse(array('module' => 'activities', 'department' => 4)),
      'infotech' => $this->admin_model->browse(array('module' => 'activities', 'department' => 5))
    );

    //load content
    $this->template->content->view('/students/content/home', $data);

      //add js file
    $this->template->javascript->add('/resources/js/student.js');

    $this->template->publish('layouts/app');
  }
  function events(){
    //redirect if user not logged in
    if(!$this->session->userdata('logged_in') || $this->session->userdata('role') != 'student'):
      redirect('/');
    endif;

    $data = array(
      'events' => $this->admin_model->browse(array('module' => 'events'))
    );
    //load content
    $this->template->content->view('/students/content/events', $data);

    //add js file
    $this->template->publish('layouts/app');
  }
  public function activities($department){
    if(!$this->session->userdata('logged_in') || $this->session->userdata('role') != 'student'):
      redirect('/');
    endif;

    $data = array(
       'activities' => $this->admin_model->browse(array('module' => 'activities', 'department' => $department)),
       'department' => $this->admin_model->read(array('module' => 'departments', 'conditions' => array('id' => $department)))
    );
    //load content
    $this->template->content->view('/students/content/activities', $data);

    $this->template->publish('layouts/app');
  }
  function account(){
    if(!$this->session->userdata('logged_in') || $this->session->userdata('role') != 'student'):
      redirect('/');
    endif;

      $data = array(
        'page_title' => 'My Account',
        'account' => $this->admin_model->read(array('module' => 'students', 'conditions' => array('username' => $this->session->userdata('username')))),
        'course' => $this->admin_model->browse(array('module' => 'course'))
      );
    //load content
    $this->template->content->view('/students/content/account', $data);

    //add js file
    $this->template->javascript->add('/resources/js/student.js');

    $this->template->publish('layouts/app');
  }

  function announcements(){
    if(!$this->session->userdata('logged_in') || $this->session->userdata('role') != 'student'):
      redirect('/');
    endif;

    $this->template->title->set('SMS Based Online Bulletin Board System');
    if(!$this->session->userdata('logged_in') || $this->session->userdata('role') != 'student'):
      //load content
      $this->template->content->view('/access_error');
    else:
    $data = array(
      'page_title' => 'Announcements',
      'announcements' => $this->admin_model->browse(array('module' => 'announcements'))
    );
    //load content
    $this->template->content->view('/students/content/announcements', $data);
    endif;
    //add js file
    $this->template->publish('layouts/app');
  }

  function about(){

    //load content
    $this->template->content->view('/students/content/about');

    //add js file
    $this->template->publish('layouts/app');
  }
}

 ?>
