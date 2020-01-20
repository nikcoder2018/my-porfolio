<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Admin</a>
      </li>
      <li class="breadcrumb-item active">Teachers</li>
    </ol>
    <!-- Example DataTables Card-->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i> Teachers</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Last Name</th>
                  <th>Middle Name</th>
                  <th>First Name</th>
                  <th>Subject</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php if(is_array($teachers)): ?>
                  <?php $counter = 1; ?>
                  <?php foreach($teachers as $key=>$val): ?>
                    <tr>
                      <td><?=ucfirst($val->lastname); ?></td>
                      <td><?=ucfirst($val->middleinitial); ?></td>
                      <td><?=ucfirst($val->firstname); ?></td>
                      <td><?=$val->subject; ?></td>
                      <td>
                          <?php if(!$this->admin_model->isExists(array('module' => 'evaluated', 'teacher' => $val->adviser_id, 'student' => $val->student_id))): ?>
                          <button class="btn btn-success" onclick="evaluateTeacher(<?=$val->adviser_id; ?>)">Evaluate</button>
                          <?php else: ?>
                          <button class="btn btn-secondary" disabled>Evaluated</button>
                          <?php endif; ?>
                      </td>
                      <td></td>
                    </tr>
                  <?php endforeach; ?>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
      <!-- /tables-->

    </div>
    <!-- /.container-fluid-->
  </div>
  <!-- /.container-wrapper-->
  <div class="modal fade" id="evaluateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Questionnaire</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-12">
              <h5><b>Instruction:</b> Please evaluate the faculty using the scale below. Select your rating on each question.</h5>
              <table class="table">
                <thead>
                  <tr>
                    <th>Scale</th>
                    <th>Descriptive Rating</th>
                    <th>Qualitative Description</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>5</td>
                    <td>Outstanding</td>
                    <td>The performance almost always exceeds the job requirements. The Faculty is an exceptional role model.</td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>Very Satisfactory</td>
                    <td>The performance meets and often exceeds the job requirements</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Satisfactory</td>
                    <td>The performance meets job requirements</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Fair</td>
                    <td>The performance needs some development to meet job requirements</td>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>Poor</td>
                    <td>The faculty fails to meet job requirements</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <form method="post" action="evaluate" id="evalualion-form">
            <input type="hidden" name="evaluator" value="<?=$_SESSION['userid']; ?>">
            <input type="hidden" name="teacher" value="">

            <div class="accordion" id="accordionExample">
              <?php $i = 1; ?>
              <?php $j = 1; ?>
              <?php if(is_array($questionnaire)): ?>
                <?php $a = 'A'; ?>
                <?php foreach($questionnaire as $key=>$val): ?>
                  <?php $i++; ?>
                  <div class="card">
                    <div class="card-header" id="headingOne">
                      <h5 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#category<?=$i;?>" aria-expanded="true" aria-controls="collapseOne">
                          <?=$a++. '. '. $val['category']; ?>
                        </button>
                      </h5>
                    </div>
                    <div id="category<?=$i;?>" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                      <div class="card-body">
                        <?php if(is_array($val['questions'])): ?>
                          <?php $counter = 1; ?>
                          <?php foreach($val['questions'] as $key=>$val): ?>
                            <?php $j++; ?>

                            <li class="list-group-item">
                              <h5> <?=$counter++. '. '.$val->question; ?></h5>
                              <div class="questionnaire_radio">
                                <input type="radio" id="radio<?=$j;?>-1" value="5" name="question[<?=$val->id;?>]">
                                <label for="radio<?=$j;?>-1">Outstanding</label>
                                <input type="radio" id="radio<?=$j;?>-2" value="4" name="question[<?=$val->id;?>]">
                                <label for="radio<?=$j;?>-2">Very Satisfactory</label>
                                <input type="radio" id="radio<?=$j;?>-3" value="3" name="question[<?=$val->id;?>]">
                                <label for="radio<?=$j;?>-3">Satisfactory</label>
                                <input type="radio" id="radio<?=$j;?>-4" value="2" name="question[<?=$val->id;?>]">
                                <label for="radio<?=$j;?>-4">Fair</label>
                                <input type="radio" id="radio<?=$j;?>-5" value="1" name="question[<?=$val->id;?>]">
                                <label for="radio<?=$j;?>-5">Poor</label>
                              </div>
                            </li>
                          <?php endforeach; ?>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              <?php endif; ?>
            </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>
</div>
</div>

<style>
.questionnaire_radio input {
	display: none;
}

.questionnaire_radio label {
	cursor: pointer;
	margin: 10px 10px;
}

.questionnaire_radio label:before {
	content: '';
	display: inline-block;
	height: 30px;
	width: 30px;
	background: #59CA59;
	border-radius: 50%;
	z-index: 2;
	transition: box-shadow .4s ease,
					background .3s ease;
}

.questionnaire_radio input:checked + label:before {
	box-shadow: inset 0px 3px 0 2px rgba(89,202,89,1);
	background: #fff;
}
</style>
<?php $this->load->view('admin/footer'); ?>
<?php $this->load->view('admin/scrolltotup'); ?>
