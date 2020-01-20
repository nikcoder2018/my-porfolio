<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Author: Nikcoder
 */
class BREAD_Users extends CI_Controller
{
  public function browse(){}
  public function read(){
    $result = array();
    $data['module'] = 'account';
    $data['conditions'] = array(
      'id' => $this->input->post('id')
    );
    $request = $this->admin_model->read($data);

    if($request):
      $result = array(
        'success' => true,
        'data' => $request
      );
    else:
      $result = array(
        'success' => false,
      );
    endif;
    $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($result));
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

  public function changepic(){
    $result = array();
    $config['upload_path']          = './uploads/profile';
    $config['allowed_types']        = 'gif|jpg|jpeg|png';
    $config['max_size']             = 5000;

    $this->load->library('upload', $config);

    if ( ! $this->upload->do_upload('file')):
      $message = array(
        'type' => 'fail',
        'text' => preg_replace('~\</?p\>~', '', $this->upload->display_errors())
      );
    else:
      $upload = array('image' => $this->upload->data());
      $data['table'] = "admin";
      $data["conditions"] = array(
        'username' => $this->session->userdata('username')
      );
      $data['fields'] = array(
        'profile_pic' => $upload['image']['file_name']
      );
      $request = $this->admin_model->edit($data);

      $result = $request;
    endif;

    $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($result));
  }
  public function changepassword(){
    $message = array(
          'success' => false,
          'message' => 'This function is temporarily unavailable.'
    );

    $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($message));
  }
}
?>
