<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *Author:
 */
class Auth_model extends CI_model
{
  function login($data){
      switch($data['module']):
        case 'validate_user':
          $this->db->select('id, username, password, usertype');
          $this->db->from('users');
          $this->db->where('username', $data['fields']['username']);
          $query = $this->db->get();

          if($query->num_rows() > 0):
            return array('password_hash' => $query->row()->password, 'usertype' => $query->row()->usertype, 'userid' => $query->row()->id);
          else:
            return false;
          endif;
        break;
      endswitch;
  }
  function students($request){
    switch($request['type']):
      case 'register':
        $query = $this->db->insert('students', $request['fields']);
        if($query):
          return true;
        else:
          return false;
        endif;
      break;
    endswitch;
  }
  function r_list($request){
    switch($request['type']):
      case 'course':
        $this->db->select('id, name');
        $this->db->from('course');
        $query = $this->db->get();
        if($query->num_rows() > 0):
          return $query->result();
        else:
          return false;
        endif;
      break;
    endswitch;
  }
}

 ?>
