<?php
$config = array(
  'login'  => array(
    array(
      'field' => 'username',
      'label' => 'Username',
      'rules' => 'required|trim|max_length[30]'
    ),
    array(
      'field' => 'password',
      'label' => 'Password',
      'rules' => 'required|trim|max_length[50]'
    )
  ),
  'signup' => array(
    array(
      'field' => 'lastname',
      'label' => 'Lastname',
      'rules' => 'required|max_length[30]|trim'
    ),
    array(
      'field' => 'firstname',
      'label' => 'Firstname',
      'rules' => 'required|max_length[30]|trim'
    ),
    array(
      'field' => 'mi',
      'label' => 'MI',
      'rules' => 'max_length[2]|trim'
    ),
    array(
      'field' => 'username',
      'label' => 'Username',
      'rules' => 'required|max_length[30]|trim|is_unique[students.username]'
    ),
    array(
      'field' => 'password',
      'label' => 'Password',
      'rules' => 'required|max_length[50]'
    ),
    array(
      'field' => 'cpassword',
      'label' => 'Confirm Password',
      'rules' => 'required|max_length[50]|matches[password]'
    ),
    array(
      'field' => 'contact',
      'label' => 'Contact number',
      'rules' => 'required|alpha_dash|max_length[12]'
    ),
    array(
      'field' => 'studentid',
      'label' => 'Student ID',
      'rules' => 'required'
    ),
  ),
);
 ?>
