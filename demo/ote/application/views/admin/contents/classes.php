<?php $this->load->view('admin/navigation'); ?>

<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Admin</a>
      </li>
      <li class="breadcrumb-item active" >Classes</li>
    </ol>
    <div>
      <button class="btn btn-primary" data-toggle="modal" data-target="#newClass">Add</button>
    </div>
    <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Classes</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Subject</th>
                  <th>Code</th>
                  <th>Adviser</th>
                  <th># of students</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php if(is_array($classes)): ?>
                <?php $counter = 1; ?>
                <?php foreach($classes as $key=>$val): ?>
                <tr>
                  <td><?=$counter++; ?></td>
                  <td><?=ucfirst($val->subject); ?></td>
                  <td><?=$val->code; ?></td>
                  <td><?=ucfirst($val->adviser); ?></td>
                  <td><?=$this->admin_model->count(array('module'=>'class_students', 'adviser'=>$val->adviser_id,'subject'=>$val->subject_id)); ?></td>
                  <td>
                    <button class="btn btn-primary btn-sm" onclick="viewclassstudents(<?=$val->subject_id; ?>,<?=$val->adviser_id; ?>)">View</button>
                    <button class="btn btn-danger btn-sm" onclick="deleteClass(<?=$val->subject_id; ?>,<?=$val->adviser_id; ?>)">Delete</button>
                  </td>
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
<div class="modal fade" id="newClass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add student to class</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="classes/add" id="classes-form">
      <div class="modal-body">
          <div class="form-group">
            <label for="middleinitial">Subject:</label>
            <select name="subject" class="form-control selectpicker" data-show-subtext="true" data-live-search="true"  id="student-selectpicker">
              <option value="-">Select</option>
              <?php foreach($subjects as $key=>$val):?>
                <option value="<?=$val->id; ?>"><?=ucfirst($val->title); ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-12">
                <label for="student">Students:</label>
              </div>
              <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-10">
                      <select name="student" class="form-control selectpicker" data-show-subtext="true" data-live-search="true" id="student-selectpicker">
                        <option value="-">Select</option>
                        <?php foreach($students as $key=>$val):?>
                          <option value="<?=$val->id; ?>"><?=ucfirst($val->firstname).' '.ucfirst($val->lastname).'-'.$val->username; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="col-md-2">
                      <button type="button" class="btn btn-outline-primary" id="addStudentBtn">Add</button>
                    </div>
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 mt-2">
                <ul class="list-group" id="student-list">
                </ul>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="adviser">Adviser:</label>
            <select name="adviser" class="form-control selectpicker" data-show-subtext="true" data-live-search="true" id="student-selectpicker">
              <option value="-">Select</option>
              <?php foreach($teachers as $key=>$val):?>
                <option value="<?=$val->teacher_id; ?>"><?=ucfirst($val->firstname).' '.ucfirst($val->lastname).'-'.ucfirst($val->position); ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="alert alert-danger" role="alert" style="display: none">

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
<div class="modal fade" id="viewClassStudents" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Students</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>#</th>
                <th>Firstname</th>
                <th>Middle Initial</th>
                <th>Lastname</th>
                <th>Course</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('admin/footer'); ?>
<?php $this->load->view('admin/scrolltotup'); ?>
