<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Author: Unknown
*/
class Admin_model extends CI_model
{
  public function browse($data){
    switch($data['module']):
        case 'presidents':
          $this->db->select('admin.id as sId,student_id, date_registered, firstname, middleinitial, lastname, course, contact_no, course.name as course_name, departments.name as department_name');
          $this->db->join('course', 'course.id = admin.course');
          $this->db->join('departments', 'course.department = departments.id');
          $this->db->where('position', 'president');
          $this->db->from('admin');
          $this->db->order_by('date_registered', 'DESC');
          $query = $this->db->get();
          if($query->num_rows() > 0):
            return $query->result();
          else:
            return false;
          endif;
        break;
        case 'students':
          $this->db->select('students.id as sId, student_id, firstname, middleinitial, lastname, course, contact_no, course.name as course_name, departments.name as department_name, students.created_at as date_registered');
          $this->db->from('students');
          $this->db->join('course', 'course.id = students.course');
          $this->db->join('departments', 'course.department = departments.id');
          $this->db->where('position', 'student');
          $this->db->order_by('students.created_at', 'DESC');
          $query = $this->db->get();
          if($query->num_rows() > 0):
            return $query->result();
          else:
            return false;
          endif;
        break;
        case 'dept_students':
        $this->db->select('student_id, firstname, lastname, course, contact_no');
        foreach($data['course'] as $course):
          $this->db->or_where('course', $course->id);
        endforeach;
        $this->db->from('students');
        $this->db->order_by('created_at', 'DESC');
        $query = $this->db->get();
        if($query->num_rows() > 0):
          return $query->result();
        else:
          return false;
        endif;
      break;
      case 'announcements':
        $this->db->select('id, userid, headline, message, department, date_posted, visible');
        $this->db->from('announcements');
        $this->db->order_by('date_posted', 'DESC');
        $query = $this->db->get();
        if($query->num_rows() > 0):
          return $query->result();
        else:
          return false;
        endif;
      break;
      case 'activities':
        $this->db->select('a.id as activity_id, b.name as department, title, description, image_name, addon_mainslide, active');
        if($data['department'] != 1):
          $this->db->where('department', $data['department']);
        endif;
        $this->db->from('activities a');
        $this->db->join('departments b', 'b.id = a.department', 'left');
        if($this->session->userdata('role') == 'admin'):
        $this->db->where('username', $this->session->userdata('username'));
        endif;
        $this->db->order_by('created_at', 'DESC');
        $query = $this->db->get();
        if($query->num_rows() > 0):
          return $query->result();
        else:
          return false;
        endif;
      break;
      case 'events':
        $this->db->select('*, b.name as department, a.id as id');
        $this->db->from('events a');
        $this->db->join('departments b', 'b.id = a.department');
        $this->db->order_by('a.date_created', 'DESC');
        $query = $this->db->get();
        if($query->num_rows() > 0):
          return $query->result();
        else:
          return false;
        endif;
      break;
      case 'recent_announcements':
        $this->db->select('*');
        $this->db->from('announcements');
        $this->db->join('admin', 'admin.id = announcements.userid');
        $this->db->order_by('date_posted', 'DESC');
        $this->db->limit(5);
        $query = $this->db->get();
        if($query->num_rows() > 0):
          return $query->result();
        else:
          return false;
        endif;
      break;
      case 'recent_events':
        $this->db->select('*');
        $this->db->from('events');
        $this->db->join('admin', 'admin.id = events.postedby');
        $this->db->order_by('date_created', 'DESC');
        $this->db->limit(5);
        $query = $this->db->get();
        if($query->num_rows() > 0):
          return $query->result();
        else:
          return false;
        endif;
      break;
      case 'departments':
        $this->db->select('*');
        $this->db->from('departments');
        $query = $this->db->get();
        if($query->num_rows() > 0):
          return $query->result();
        else:
          return false;
        endif;
      break;
      case 'course':
        $this->db->select('*');
        if(isset($data['conditions']['department'])):
          if($data['conditions']['department'] != 1):
            $this->db->where($data['conditions']);
          endif;
        endif;
        $this->db->from('course');
        $query = $this->db->get();
        if($query->num_rows() > 0):
          return $query->result();
        else:
          return false;
        endif;
      break;
      case 'SMS':
      $this->db->select('*');
      $this->db->from('sms_history');
      $this->db->where($data['conditions']);
      $query = $this->db->get();
      if($query->num_rows() > 0):
        return $query->result();
      else:
        return false;
      endif;
      break;
      case 'slider':
      $this->db->select('*');
      $this->db->from('slider');
      $query = $this->db->get();
      if($query->num_rows() > 0):
        return $query->result();
      else:
        return false;
      endif;
      break;
    endswitch;
  }
  public function read($data){
    switch($data['module']):
      case 'students':
        if(isset($data['select'])):
          $this->db->select($data['select']);
        else:
          $this->db->select('a.id as id, a.student_id as student_id, a.username as username, a.firstname as firstname, a.middleinitial as middleinitial, a.lastname as lastname, a.profile_pic as profile_pic, a.contact_no as contact_no, b.name as course, c.name as department');
        endif;
        $this->db->where($data['conditions']);
        $this->db->from('students a');
        $this->db->join('course b', 'b.id = a.course');
        $this->db->join('departments c', 'c.id = b.department');

        $query = $this->db->get();
        if($query->num_rows() > 0):
          return $query->row();
        else:
          return false;
        endif;
      break;
      case 'presidents':
        $this->db->select('id, student_id, firstname, middleinitial, lastname, email, course, contact_no, position, profile_pic, date_registered');
        $this->db->where($data['conditions']);
        $this->db->from('admin');
        $query = $this->db->get();
        if($query->num_rows() > 0):
          return $query->row();
        else:
          return false;
        endif;
      break;
      case 'account':
        if(isset($data['select'])):
          $this->db->select($data['select']);
        else:
          $this->db->select('id, username, firstname, middleinitial, lastname, position, course, contact_no, profile_pic');
        endif;
        $this->db->where($data['conditions']);
        $this->db->limit(1);
        $query = $this->db->get('admin');

        if($query->num_rows() == 1):
          return $query->row();
        else:
          return false;
        endif;
      break;
      case 'announcements':
        $this->db->select('*');
        $this->db->where($data['conditions']);
        $this->db->from('announcements');
        $query = $this->db->get();
        if($query->num_rows() > 0):
          return $query->row();
        else:
          return false;
        endif;
      break;
      case 'events':
        $this->db->select('*');
        $this->db->where($data['conditions']);
        $this->db->from('events');
        $query = $this->db->get();
        if($query->num_rows() > 0):
          return $query->result();
        else:
          return false;
        endif;
      break;
      case 'departments':
        $this->db->select('*');
        $this->db->where($data['conditions']);
        $this->db->from('departments');
        $query = $this->db->get();
        if($query->num_rows() > 0):
          return $query->row();
        else:
          return false;
        endif;
      break;
      case 'course':
        $this->db->select('*');
        $this->db->where($data['conditions']);
        $this->db->from('course');
        $query = $this->db->get();
        if($query->num_rows() > 0):
          return $query->row();
        else:
          return false;
        endif;
      break;
      case 'SMS':
      $this->db->select('*');
      $this->db->from('sms_history');
      $this->db->where($data['conditions']);
      $query = $this->db->get();
      if($query->num_rows() > 0):
        return $query->result();
      else:
        return false;
      endif;
      break;
      case 'slider':
      $this->db->select('*');
      $this->db->from('slider');
      $this->db->where($data['conditions']);
      $query = $this->db->get();
      if($query->num_rows() > 0):
        return $query->row();
      else:
        return false;
      endif;
      break;
    endswitch;
  }
  public function edit($data){
    $this->db->set($data['fields']);
    $this->db->where($data['conditions']);
    $this->db->update($data['table']);
    if($this->db->affected_rows() > 0):
      return true;
    else:
      return false;
    endif;
  }
  public function add($data){
    $query = $this->db->insert($data['table'], $data['fields']);
    if($query):
      return true;
    else:
      return false;
    endif;
  }
  public function delete($data){
    $this->db->where($data['conditions']);
    $query = $this->db->delete($data['table']);
    if($query):
      return true;
    else:
      return false;
    endif;
  }
  public function check($data){
    $this->db->select('*');
    $this->db->where($data['conditions']);
    $this->db->from($data['table']);
    $this->db->limit(1);
    $query = $this->db->get();
    if($query->num_rows() > 0):
      return true;
    else:
      return false;
    endif;
  }
}
?>
