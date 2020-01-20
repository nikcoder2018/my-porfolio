<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {
  function __construct()
   {
       parent::__construct();
       $this->load->library("Pdf");
   }
  public function data($filter_key = false, $filter_value = false, $filter_value2 = false){
    $condition = array();
    $results = array();
    if($filter_key != NULL):
      switch($filter_key):
        case 'student_id':
          $condition = array('c.username' => $filter_value);
          $results = $this->admin_model->browse(array('module'=>'evaluation_results', 'condition' => $condition));
        break;
        case 'student_name':
          $temp_array = $this->admin_model->browse(array('module'=>'evaluation_results'));
          foreach($temp_array as $key=>$value):
            if($value->student_name == $filter_value):
              array_push($results, $value);
            endif;
          endforeach;
        break;
        case 'teacher_name':
          $temp_array = $this->admin_model->browse(array('module'=>'evaluation_results'));
          foreach($temp_array as $key=>$value):
            if($value->teacher_name == $filter_value):
              array_push($results, $value);
            endif;
          endforeach;
        break;
        case 'total_score':
          $condition = array('a.total_score' => $filter_value);
          $results = $this->admin_model->browse(array('module'=>'evaluation_results', 'condition' => $condition));
        break;
        case 'total_rate':
          $condition = array('a.total_rate' => $filter_value);
          $results = $this->admin_model->browse(array('module'=>'evaluation_results', 'condition' => $condition));
        break;
        case 'remarks':
        $temp_array = $this->admin_model->browse(array('module'=>'evaluation_results'));
        foreach($temp_array as $key=>$value):
          switch(true):
              case in_array($value->total_rate, range(97, 100)):
                if($filter_value == "outstanding"):
                  array_push($results, $value);
                endif;
              break;
              case in_array($value->total_rate, range(92, 96)):
                if($filter_value == "verysatisfactory"):
                  array_push($results, $value);
                endif;
              break;
              case in_array($value->total_rate, range(86, 91)):
                if($filter_value == "satisfactory"):
                  array_push($results, $value);
                endif;
              break;
              case in_array($value->total_rate, range(80, 85)):
                if($filter_value == "fair"):
                  array_push($results, $value);
                endif;
              break;
              case in_array($value->total_rate, range(0, 79)):
                if($filter_value == "poor"):
                  array_push($results, $value);
                endif;
              break;
          endswitch;
        endforeach;
        break;
        case 'date':
          $temp_array = $this->admin_model->browse(array('module'=>'evaluation_results'));
          foreach($temp_array as $key=>$value):
            if(date("Y-m-d", strtotime($value->created_at)) >= $filter_value && date("Y-m-d", strtotime($value->created_at)) <= $filter_value2):
              array_push($results, $value);
            endif;
          endforeach;
        break;
      endswitch;
    endif;
    if($filter_value == NULL):
      $results = $this->admin_model->browse(array('module'=>'evaluation_results'));
    endif;

    return $results;
  }
  public function ajax_data(){
    $filter_key = $this->input->post('filter_key');
    $filter_value = $this->input->post('filter_value');

    if($filter_key == 'date'):
      $results = $this->data($filter_key, $filter_value, $this->input->post('filter_value2'));
    else:
      $results = $this->data($filter_key, $filter_value);
    endif;

    $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($results));
  }
	public function create_pdf()
	{
    $data = $this->data();
    if(isset($_GET['key']) && isset($_GET['value'])){
      if($_GET['key'] == 'date'):
        $data = $this->data($_GET['key'], $_GET['value'], $_GET['value2']);
      else:
        $data = $this->data($_GET['key'], $_GET['value']);
      endif;
    }

    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetTitle('Evaluation Reports-'.date("h-i-s"));

    // set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH);

    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
      require_once(dirname(__FILE__).'/lang/eng.php');
      $pdf->setLanguageArray($l);
    }

    // ---------------------------------------------------------

    // set font
    $pdf->SetFont('dejavusans', '', 10);

    // add a page
    $pdf->AddPage();

    // writeHTML($html, $ln=true, $fill=false, $reseth=false, $cell=false, $align='')
    // writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)

    // create some HTML content
    $counter = 1;
    $html = '
    <table>
      <thead>
        <tr>
          <th width="5%">#</th>
          <th>Student ID</th>
          <th width="15%">Student Name</th>
          <th>Teacher</th>
          <th>Total Score</th>
          <th>Total Rate</th>
          <th>Remarks</th>
          <th width="25%">Date</th>
        </tr>
      </thead>
      <tbody>';
      foreach($data as $key=>$val):
        $html = $html.'
        <tr>
          <td width="5%">'.$counter++.'</td>
          <td>'.$val->student_id.'</td>
          <td width="15%">'.$val->student_name.'</td>
          <td>'.$val->teacher_name.'</td>
          <td>'.$val->total_score.'</td>
          <td>'.$val->total_rate.'%</td>
          <td>'.$this->get_remarks($val->total_rate).'</td>
          <td width="25%">'.date('M d, Y',strtotime($val->created_at)).'</td>
        </tr>
        ';
      endforeach;
    $html = $html.'
      </tbody>
    </table>
    ';

    // output the HTML content
    $pdf->writeHTML($html, true, false, true, false, '');

    // ---------------------------------------------------------

    //Close and output PDF document
    $pdf->Output('evaluation_report-'.date("m-d-Y").'.pdf', 'D');

    //============================================================+
    // END OF FILE
    //============================================================+
	}
  function get_remarks($total_rate){
    switch(true):
        case in_array($total_rate, range(97, 100)):
          return 'Outstanding';
        break;
        case in_array($total_rate, range(92, 96)):
          return 'Very Satisfactory';
        break;
        case in_array($total_rate, range(86, 91)):
          return 'Satisfactory';
        break;
        case in_array($total_rate, range(80, 85)):
          return 'Fair';
        break;
        case in_array($total_rate, range(0, 79)):
          return 'Poor';
        break;
    endswitch;
  }
}
