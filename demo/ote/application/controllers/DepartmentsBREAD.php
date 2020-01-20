<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DepartmentsBREAD extends CI_Controller {
  public function browse(){

  }
  public function read(){
    $result = array();
    $data['module'] = 'departments';
    $data['condition'] = array(
      'id' => $this->input->post('id')
    );
    $request = $this->admin_model->read($data);
    if($request):
      $result = array(
        'request_success' => true,
        'request_data' => $request
      );
    else:
      $result = array(
        'request_success' => false,
      );
    endif;
    $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($result));
  }
  public function edit(){
    $result = array(
          'success' => false,
          'message' => 'This feature is not available!'
        );

    $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($result));
  }
  public function add(){
    $result = array(
          'success' => false,
          'message' => 'This feature is not available!'
        );

    $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($result));
  }
  public function delete(){
    $result = array(
          'success' => false,
          'message' => 'This feature is not available!'
        );
    $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($result));
  }
}
