<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Author: Nikcoder
 */
class BREAD_Presidents extends CI_Controller
{
  public function browse(){}
  public function read(){
    $data['module'] = 'presidents';
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
}
?>
