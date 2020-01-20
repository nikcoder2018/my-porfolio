<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Author: Unknown
 */

 class Student_model extends CI_model
 {

   function r_list($request){
     switch($request['type']):
       case 'departments':
         $this->db->select('id, name');
         $this->db->from('departments');
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
       case 'students':
         $this->db->select('students.id as sId, student_id, firstname, middleinitial, lastname, course, contact_no, course.name as course_name, departments.name as department_name');
         $this->db->join('course', 'course.id = students.course');
         $this->db->join('departments', 'course.department = departments.id');
         $this->db->from('students');
         $this->db->order_by('created_at', 'DESC');
         $query = $this->db->get();
         if($query->num_rows() > 0):
           return $query->result();
         else:
           return false;
         endif;
       break;
       case 'presidents':
         $this->db->select('student_id, firstname, middleinitial, lastname, course, contact_no, course.name as course_name, departments.name as department_name');
         $this->db->join('course', 'course.id = students.course');
         $this->db->join('departments', 'course.department = departments.id');
         $this->db->where('position', 'president');
         $this->db->from('students');
         $this->db->order_by('created_at', 'DESC');
         $query = $this->db->get();
         if($query->num_rows() > 0):
           return $query->result();
         else:
           return false;
         endif;
       break;
       case 'course':
         $this->db->select('*');
         $this->db->from('course');
         $query = $this->db->get();
         if($query->num_rows() > 0):
           return $query->result();
         endif;
       break;
       case 'dept_courses':
         $this->db->select('id, name');
         if($request['department'] != 1):
           $this->db->where('department', $request['department']);
         endif;
         $this->db->from('course');
         $query = $this->db->get();
         if($query->num_rows() > 0):
           return $query->result();
         else:
           return false;
         endif;
       break;
       case 'dept_students':
         $this->db->select('student_id, firstname, lastname, course, contact_no');
         foreach($request['course'] as $course):
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
       case 'activities':
       $this->db->select('*');
       if($request['department'] != 1):
         $this->db->where('department', $request['department']);
       endif;
       $this->db->from('activities');
       $this->db->order_by('created_at', 'DESC');
       $query = $this->db->get();
       if($query->num_rows() > 0):
         return $query->result();
       else:
         return false;
       endif;
       break;
       case 'events':
       $this->db->select('*');
       $this->db->from('events');
       $this->db->order_by('date_created', 'DESC');
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
