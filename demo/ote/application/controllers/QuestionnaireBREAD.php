<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class QuestionnaireBREAD extends CI_Controller {
    public function browse(){
      //search
    }
    public function read(){
      $data['module'] = 'questionnaire';
      $data['key'] = $this->input->post('id');
      $request = $this->admin_model->read($data);
      $this->output
          ->set_content_type('application/json')
          ->set_output(json_encode($request));
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
}
