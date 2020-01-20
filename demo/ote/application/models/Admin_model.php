<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Author: Unknown
*/
class Admin_model extends CI_model{
  public function browse($data){
    switch($data['module']){
      case 'users':
      $this->db->select('*');
      $this->db->from('users');
      $this->db->where($data['conditions']);
      $query = $this->db->get();
      if($query->num_rows() > 0):
        return $query->result();
      else:
        return false;
      endif;
      break;
      case 'students':
        $this->db->select('a.id as id, a.username as username, a.lastname as lastname, a.middleinitial as middleinitial, a.firstname as firstname, b.name as course');
        $this->db->from('users a');
        $this->db->where('usertype', 'student');
        $this->db->join('course b', 'b.id = a.course');
        $query = $this->db->get();
        if($query->num_rows() > 0):
          return $query->result();
        else:
          return false;
        endif;
      break;
      case 'teachers':
      $this->db->select('a.id as teacher_id, a.lastname as lastname, a.middleinitial as middleinitial, a.firstname as firstname, b.title as position');
      $this->db->from('teachers a');
      $this->db->join('positions b', 'b.id = a.position');
      $query = $this->db->get();
      if($query->num_rows() > 0):
        return $query->result();
      else:
        return false;
      endif;
      break;
      case 'positions':
      $this->db->select('*');
      $this->db->from('positions');
      $query = $this->db->get();
      if($query->num_rows() > 0):
        return $query->result();
      else:
        return false;
      endif;
      break;
      case 'classes':
      $this->db->select("a.id as class_id, c.title as subject, c.code as code, CONCAT(b.firstname,' ',b.middleinitial,'. ',b.lastname) as adviser, b.firstname as firstname, b.middleinitial as middleinitial, b.lastname as lastname, b.id as adviser_id, a.student as student_id, c.id as subject_id, COUNT(a.student) as numberofstudents");
      $this->db->from('classes a');
      if(isset($data['student'])):
        $this->db->where('a.student', $data['student']);
      endif;
      $this->db->join('teachers b','b.id = a.adviser');
      $this->db->join('subjects c','c.id = a.subject');
      if(!isset($data['student'])):
        $this->db->group_by('a.adviser');
        $this->db->group_by('a.subject');
      else:
        $this->db->group_by('a.adviser');
      endif;
      $query = $this->db->get();
      if($query->num_rows() > 0):
        $result = $query->result();
        if($result[0]->class_id != null):
          return $result;
        endif;
      else:
        return false;
      endif;
      break;
      case 'subjects':
      $this->db->select('*');
      $this->db->from('subjects');
      $query = $this->db->get();
      if($query->num_rows() > 0):
        return $query->result();
      else:
        return false;
      endif;
      break;
      case 'questionnaire':
      $this->db->select('*, a.id as id');
      $this->db->from('questionnaire a');
      $this->db->join('questionnaire_category b','b.id=a.category');
      if(isset($data['conditions'])):
        $this->db->where($data['conditions']);
      endif;
      $query = $this->db->get();
      if($query->num_rows() > 0):
        return $query->result();
      else:
        return false;
      endif;
      break;
      case 'questionnaire_category':
      $this->db->select('*');
      $this->db->from('questionnaire_category');
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
      case 'courses':
      $this->db->select('*');
      $this->db->from('course');
      $query = $this->db->get();
      if($query->num_rows() > 0):
        return $query->result();
      else:
        return false;
      endif;
      break;
      case 'topteacher':
      $this->db->select("CONCAT(b.firstname, ' ', b.middleinitial, '. ',b.lastname) as teacher, SUM(a.total_score) as total_score, SUM(a.total_rate) as total_rate, ROUND((SUM(a.total_rate)/(COUNT(a.student)*100))*100) as total_rate_p, ROUND((SUM(a.total_scale)/COUNT(a.student))) as total_scale, COUNT(a.student) as number_of_students");
      $this->db->from('evaluation_results a');
      $this->db->join('teachers b', 'b.id = a.teacher');
      $this->db->join('users c', 'c.id = a.student');
      $this->db->group_by('a.teacher');
      $this->db->order_by('total_rate_p', 'DESC');
      $query = $this->db->get();
      if($query->num_rows() > 0):
        return $query->result();
      else:
        return false;
      endif;
      break;
      case 'topteacher2':
      $this->db->select('a.id as id, c.username as student_id, a.total_score as total_score, a.total_rate as total_rate, a.created_at as created_at, CONCAT(c.firstname," ",c.lastname) as student_name,CONCAT(b.firstname," ",b.lastname) as teacher_name, a.total_scale');
      $this->db->from('evaluation_results a');
      $this->db->join('teachers b', 'b.id = a.teacher');
      $this->db->join('users c', 'c.id = a.student');
      if(isset($data['condition'])):
        $this->db->where($data['condition']);
      endif;
      $query = $this->db->get();
      if($query->num_rows() > 0):
        $temp_array = array();
        foreach($query->result() as $key=>$value):

          array_push($temp_array, $value);
        endforeach;
        return $temp_array;
      else:
        return false;
      endif;
      break;
      case 'evaluation_results':
        $this->db->select('a.id as id, c.username as student_id, a.total_score as total_score, a.total_rate as total_rate, a.created_at as created_at, CONCAT(c.firstname," ",c.lastname) as student_name,CONCAT(b.firstname," ",b.lastname) as teacher_name');
        $this->db->from('evaluation_results a');
        $this->db->join('teachers b', 'b.id = a.teacher');
        $this->db->join('users c', 'c.id = a.student');
        if(isset($data['condition'])):
          $this->db->where($data['condition']);
        endif;
        $query = $this->db->get();
        if($query->num_rows() > 0):
          return $query->result();
        else:
          return false;
        endif;
      break;
      case 'notifications':
        $this->db->select('*');
        $this->db->from('notifications');
        if(isset($data['conditions'])):
        $this->db->where($data['conditions']);
        endif;
        $this->db->order_by('created_at', 'DESC');
        $query = $this->db->get();
        if($query->num_rows() > 0):
          return $query->result();
        else:
          return false;
        endif;
      break;
    }
  }
  public function read($data){
    switch($data['module']){
      case 'users':
        if(isset($data['select'])):
          $this->db->select($data['select']);
        else:
          $this->db->select('id, username, email, firstname, middleinitial, lastname, course, usertype');
        endif;
        $this->db->from('users');
        $this->db->where('id', $data['id']);
        $query = $this->db->get();
        if($query->num_rows() > 0):
          return $query->result();
        else:
          return false;
        endif;
      break;
      case 'teachers':
        $this->db->select('id, email, firstname, middleinitial, lastname, position');
        $this->db->from('teachers');
        $this->db->where('id', $data['id']);
        $query = $this->db->get();
        if($query->num_rows() > 0):
          return $query->result();
        else:
          return false;
        endif;
      break;
      case 'questionnaire':
      $this->db->select('*');
      $this->db->from('questionnaire');
      $this->db->where('id', $data['key']);
      $query = $this->db->get();
      if($query->num_rows() > 0):
        return $query->result();
      else:
        return false;
      endif;
      break;
      case 'subjects':
      $this->db->select('*');
      $this->db->from('subjects');
      $this->db->where('id', $data['id']);
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
      $this->db->where($data['condition']);
      $query = $this->db->get();
      if($query->num_rows() > 0):
        return $query->result();
      else:
        return false;
      endif;
      break;
      case 'category':
      $this->db->select('*');
      $this->db->from('questionnaire_category');
      $this->db->where($data['condition']);
      $query = $this->db->get();
      if($query->num_rows() > 0):
        return $query->result();
      else:
        return false;
      endif;
      break;
      case 'classes':
      $this->db->select('a.id as class_id, b.firstname as firstname, b.middleinitial as middleinitial, b.lastname as lastname, c.name as course');
      $this->db->from('classes a');
      $this->db->join('users b', 'b.id = a.student');
      $this->db->join('course c', 'c.id = b.course');
      $this->db->where('a.adviser', $data['adviser']);
      $this->db->where('a.subject', $data['subject']);
      $query = $this->db->get();
      if($query->num_rows() > 0):
        return $query->result();
      else:
        return false;
      endif;
      break;
    }
  }
  public function edit($data){
    $this->db->set($data['fields']);
    $this->db->where($data['condition']);
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
      $this->db->where($data['condition']);
      $query = $this->db->delete($data['table']);
      if($query):
        return true;
      else:
        return false;
      endif;
  }
  public function isExists($data){
    switch($data['module']):
      case 'users':
      $this->db->select('*');
      $this->db->from('users');
      $this->db->where('username', $data['username']);
      $query = $this->db->get();
      if($query->num_rows() > 0):
        return true;
      else:
        return false;
      endif;
      break;
      case 'teachers':
      $this->db->select('*');
      $this->db->from('teachers');
      $this->db->where('email', $data['email']);
      $query = $this->db->get();
      if($query->num_rows() > 0):
        return true;
      else:
        return false;
      endif;
      break;
      case 'evaluated':
      $this->db->select('*');
      $this->db->from('evaluation_results');
      $this->db->where('teacher', $data['teacher']);
      $this->db->where('student', $data['student']);
      $query = $this->db->get();
      if($query->num_rows() > 0):
        return true;
      else:
        return false;
      endif;
      break;
    endswitch;
  }
  public function count($data){
    switch($data['module']):
      case 'questionnaire':
        $this->db->select('*');
        $this->db->from('questionnaire');
        return $this->db->count_all_results();
      break;
      case 'class_students':
        $this->db->select('*');
        $this->db->from('classes');
        $this->db->where('adviser', $data['adviser']);
        $this->db->where('subject', $data['subject']);
        return $this->db->count_all_results();
      break;
      case 'unread_notifications':
        $this->db->select('*');
        $this->db->from('notifications');
        $this->db->where('status', 'unread');
        return $this->db->count_all_results();
      break;
      case 'outstanding':
        $this->db->select("CONCAT(b.firstname, ' ', b.middleinitial, '. ',b.lastname) as teacher, SUM(a.total_score) as total_score, SUM(a.total_rate) as total_rate, COUNT(a.student) as number_of_students");
        $this->db->from('evaluation_results a');
        $this->db->join('teachers b', 'b.id = a.teacher');
        $this->db->join('users c', 'c.id = a.student');
        $this->db->group_by('a.teacher');
        $this->db->order_by('total_rate', 'DESC');

        $counter = 0;
        $query = $this->db->get();
        if($query->num_rows() > 0):
          foreach($query->result() as $key=>$val):
            $rate = floor(($val->total_rate)/($val->number_of_students*100)*100);
						switch(true):
								case in_array($rate, range(97, 100)):
									$counter++;
								break;
						endswitch;
          endforeach;
          return $counter;
        endif;
      break;
      case 'verysatisfactory':
        $this->db->select("CONCAT(b.firstname, ' ', b.middleinitial, '. ',b.lastname) as teacher, SUM(a.total_score) as total_score, SUM(a.total_rate) as total_rate, COUNT(a.student) as number_of_students");
        $this->db->from('evaluation_results a');
        $this->db->join('teachers b', 'b.id = a.teacher');
        $this->db->join('users c', 'c.id = a.student');
        $this->db->group_by('a.teacher');
        $this->db->order_by('total_rate', 'DESC');

        $counter = 0;
        $query = $this->db->get();
        if($query->num_rows() > 0):
          foreach($query->result() as $key=>$val):
            $rate = floor(($val->total_rate)/($val->number_of_students*100)*100);
            switch(true):
              	case in_array($rate, range(92, 96)):
                  $counter++;
                break;
            endswitch;
          endforeach;
          return $counter;
        endif;
      break;
      case 'satisfactory':
        $this->db->select("CONCAT(b.firstname, ' ', b.middleinitial, '. ',b.lastname) as teacher, SUM(a.total_score) as total_score, SUM(a.total_rate) as total_rate, COUNT(a.student) as number_of_students");
        $this->db->from('evaluation_results a');
        $this->db->join('teachers b', 'b.id = a.teacher');
        $this->db->join('users c', 'c.id = a.student');
        $this->db->group_by('a.teacher');
        $this->db->order_by('total_rate', 'DESC');

        $counter = 0;
        $query = $this->db->get();
        if($query->num_rows() > 0):
          foreach($query->result() as $key=>$val):
            $rate = floor(($val->total_rate)/($val->number_of_students*100)*100);
            switch(true):
                case in_array($rate, range(86, 91)):
                  $counter++;
                break;
            endswitch;
          endforeach;
          return $counter;
        endif;
      break;
      case 'fair':
        $this->db->select("CONCAT(b.firstname, ' ', b.middleinitial, '. ',b.lastname) as teacher, SUM(a.total_score) as total_score, SUM(a.total_rate) as total_rate, COUNT(a.student) as number_of_students");
        $this->db->from('evaluation_results a');
        $this->db->join('teachers b', 'b.id = a.teacher');
        $this->db->join('users c', 'c.id = a.student');
        $this->db->group_by('a.teacher');
        $this->db->order_by('total_rate', 'DESC');

        $counter = 0;
        $query = $this->db->get();
        if($query->num_rows() > 0):
          foreach($query->result() as $key=>$val):
            $rate = floor(($val->total_rate)/($val->number_of_students*100)*100);
            switch(true):
                case in_array($rate, range(80, 85)):
                  $counter++;
                break;
            endswitch;
          endforeach;
          return $counter;
        endif;
      break;
      case 'poor':
        $this->db->select("CONCAT(b.firstname, ' ', b.middleinitial, '. ',b.lastname) as teacher, SUM(a.total_score) as total_score, SUM(a.total_rate) as total_rate, COUNT(a.student) as number_of_students");
        $this->db->from('evaluation_results a');
        $this->db->join('teachers b', 'b.id = a.teacher');
        $this->db->join('users c', 'c.id = a.student');
        $this->db->group_by('a.teacher');
        $this->db->order_by('total_rate', 'DESC');

        $counter = 0;
        $query = $this->db->get();
        if($query->num_rows() > 0):
          foreach($query->result() as $key=>$val):
            $rate = floor(($val->total_rate)/($val->number_of_students*100)*100);
            switch(true):
                case in_array($rate, range(0, 79)):
                  $counter++;
                break;
            endswitch;
          endforeach;
          return $counter;
        endif;
      break;
    endswitch;
  }
  public function create_notifications($data){
    $fields = array(
      'user_id' => $this->session->userdata('userid'),
      'title' => $data['title'],
      'content' => $data['content'],
      'alert_type' => $data['alert_type']
    );
    $query = $this->db->insert('notifications', $fields);
    if($query):
      return true;
    else:
      return false;
    endif;
  }

  public function get_remarks($rate){
    switch(true):
        case in_array($rate, range(97, 100)):
          return 'Outstanding';
        break;
        case in_array($rate, range(92, 96)):
          return 'Very Satisfactory';
        break;
        case in_array($rate, range(86, 91)):
          return 'Satisfactory';
        break;
        case in_array($rate, range(80, 85)):
          return 'Fair';
        break;
        case in_array($rate, range(0, 79)):
          return 'Poor';
        break;
    endswitch;
  }
  public function get_remarks2($scale){
    switch($scale):
        case 5:
          return 'Outstanding';
        break;
        case 4:
          return 'Very Satisfactory';
        break;
        case 3:
          return 'Satisfactory';
        break;
        case 2:
          return 'Fair';
        break;
        case 1:
          return 'Poor';
        break;
    endswitch;
  }
  public function get_scale($rate){
    switch(true):
        case in_array($rate, range(97, 100)):
          return 5;
        break;
        case in_array($rate, range(92, 96)):
          return 4;
        break;
        case in_array($rate, range(86, 91)):
          return 3;
        break;
        case in_array($rate, range(80, 85)):
          return 2;
        break;
        case in_array($rate, range(0, 79)):
          return 1;
        break;
    endswitch;
  }
}
