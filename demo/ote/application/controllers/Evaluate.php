<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evaluate extends CI_Controller {
	public function index(){
    $result = array();
    $questions = $this->input->post('question');
    $evaluator = $this->input->post('evaluator');
    $teacher = $this->input->post('teacher');

    $total_score = 0;
    $total_rate = 0;
		$total_scale = 0;
    foreach($questions as $key=>$val):
      $data['table'] = 'evaluation';
      $data['fields'] = array(
        'evaluator' => $evaluator,
        'teacher' => $teacher,
        'question' => $key,
        'rate' => $val
      );
      $request = $this->admin_model->add($data);
      $total_score += $val;
    endforeach;

		$hps = $this->admin_model->count(array('module' => 'questionnaire')) * 5;

    $total_rate = ($total_score/$hps)*100;
		$total_scale = $this->admin_model->get_scale($total_rate);

    $data['table'] = 'evaluation_results';
    $data['fields'] = array(
      'teacher' => $teacher,
      'student' => $evaluator,
			'total_score' => $total_score,
      'total_rate' => $total_rate,
			'total_scale' => $total_scale
    );
    $request = $this->admin_model->add($data);

    if($request):
			//add notification
			$student = $this->admin_model->read(array('module' => 'users', 'id' => $evaluator));
			$student_name = $student[0]->firstname. " ".$student[0]->lastname;
			$adviser = $this->admin_model->read(array('module' => 'teachers', 'id' => $teacher));
			$adviser_name = $adviser[0]->firstname. " ".$adviser[0]->lastname;
			$this->admin_model->create_notifications(array('title' => 'New Evaluation Received', 'content' => $student_name.' has just finished to submit evaluation for '.$adviser_name, 'alert_type'=>'success'));
      $result = array(
        'success' => true
      );
    endif;
    $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($result));
  }
}
