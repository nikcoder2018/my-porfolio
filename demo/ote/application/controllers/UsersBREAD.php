<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsersBREAD extends CI_Controller {
    public function browse(){
      //search
    }
    public function read(){
      //get more information about students
      $result = array();
      $data['module'] = 'users';
      $data['id'] = $this->input->post('id');
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
    public function add(){
      $result = array(
          'success' => false,
          'message' => 'This feature is not available!'
        );

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
    public function delete(){
      $result = array(
          'success' => false,
          'message' => 'This feature is not available!'
        );
      $this->output
          ->set_content_type('application/json')
          ->set_output(json_encode($result));
    }
    public function changepassword(){
      $result = array(
          'success' => false,
          'message' => 'This feature is not available!'
        );

      $this->output
          ->set_content_type('application/json')
          ->set_output(json_encode($result));
    }
}
