<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Author: Nikcoder
 */
class BREAD_Activities extends CI_Controller
{
  public function browse(){}
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
