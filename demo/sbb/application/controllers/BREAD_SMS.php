<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Author: Nikcoder
 */
class BREAD_SMS extends CI_Controller
{
  public function browse(){
    $data['module'] = 'SMS';
    $data['conditions'] = array(
      'operator' => $this->input->post('username')
    );
    $request = $this->admin_model->read($data);

    $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($request));
  }
  public function read(){}
  public function edit(){}
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
    
  }
  public function direct(){
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
