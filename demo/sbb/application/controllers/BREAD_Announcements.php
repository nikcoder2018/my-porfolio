<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Author: Nikcoder
 */
class BREAD_Announcements extends CI_Controller
{
  public function browse(){}
  public function read(){
    $data['module'] = 'announcements';

    $data['conditions'] = array(
      'id' => $this->input->post('id')
    );

    $request = $this->admin_model->read($data);

    $this->output
    ->set_content_type('application/json')
    ->set_output(json_encode($request));

  }
  public function edit(){
    $message = array(
          'type' => 'fail',
          'text' => 'This function is temporarily unavailable.'
    );

    $this->output
    ->set_content_type('application/json')
    ->set_output(json_encode($message));
  }
  public function add(){
    $message = array(
          'type' => 'fail',
          'text' => 'This function is temporarily unavailable.'
    );

    $this->output
    ->set_content_type('application/json')
    ->set_output(json_encode($message));
  }
  public function delete(){
    $message = array(
          'type' => 'fail',
          'text' => 'This function is temporarily unavailable.'
    );

    $this->output
    ->set_content_type('application/json')
    ->set_output(json_encode($message));
  }
  public function showhide(){
    $message = array();
    $data['table'] = 'announcements';
    $data['conditions'] = array(
      'id' => $this->input->post('id')
    );
    $data['fields'] = array(
      'visible' => $this->input->post('visible')
    );
    $request = $this->admin_model->edit($data);
    if($request):
      $message = array(
        'type' => 'success',
        'text' => 'Announcement Updated',
      );
    else:
      $message = array(
        'type' => 'error',
        'text' => 'Something went wrong.'
      );
    endif;
    $this->output
    ->set_content_type('application/json')
    ->set_output(json_encode($message));
  }
}
?>
