<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *Author:
 */
class Auth_model extends CI_model
{
  function login($request){
    if($request['portal'] == 'student'):
      switch($request['type']):
        case 'validate_user':
          $this->db->select('id, username, password');
          $this->db->from('students');
          $this->db->where('username', $request['fields']['user_name']);
          $query = $this->db->get();
          if($query->num_rows() > 0):
            return $query->row();
          else:
            return false;
          endif;
        break;
      endswitch;
    endif;
    if($request['portal'] == 'admin'):
      switch($request['type']):
        case 'validate_user':
          $this->db->select('id, username, password, position');
          $this->db->from('admin');
          $this->db->where('username', $request['fields']['user_name']);
          $query = $this->db->get();

          if($query->num_rows() > 0):
            return $query->row();
          else:
            return false;
          endif;
        break;
      endswitch;
    endif;
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
