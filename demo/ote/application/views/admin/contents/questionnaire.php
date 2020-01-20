<?php $this->load->view('admin/navigation'); ?>

<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Admin</a>
      </li>
      <li class="breadcrumb-item active">Questionnaire</li>
    </ol>
    <div>
      <button class="btn btn-primary" data-toggle="modal" data-target="#newQuestion">New</button>
    </div>
    <!-- Example DataTables Card-->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i> Questionnaire</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Qestion</th>
                  <th>Category</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php if(is_array($questionnaire)): ?>
                <?php $counter = 1; ?>
                <?php foreach($questionnaire as $key=>$val): ?>
                <tr>
                  <td><?=$counter++; ?></td>
                  <td><?=$val->question; ?></td>
                  <td><?=$val->category; ?></td>
                  <td>
                    <button class="btn btn-primary btn-sm" onclick="editquestion(<?=$val->id; ?>)">Edit</button>
                    <button class="btn btn-danger btn-sm" onclick="deletequestion(<?=$val->id; ?>)">Delete</button>
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

  <!-- Button trigger modal -->
  <!-- Modal -->
  <div class="modal fade" id="newQuestion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add new question.</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" action="/admin/questionnaire/add" id="questionnaire-form">
        <div class="modal-body">
            <div class="form-group">
              <label for="question">Question</label>
              <textarea name="question" rows="6" cols="80" class="form-control" placeholder="Enter question here.."></textarea>
            </div>
            <div class="form-group">
              <label for="category">Category:</label>
              <select name="category" class="form-control" required>
                <?php foreach($questionnaire_category as $key=>$val):?>
                  <option value="<?=$val->id; ?>"><?=ucfirst($val->category); ?></option>
                <?php endforeach; ?>
              </select>
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
  <div class="modal fade" id="editQuestion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add new question.</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" action="/admin/questionnaire/edit" id="questionnaire-form-update">
        <input type="hidden" name="id">
        <div class="modal-body">
            <div class="form-group">
              <label for="question">Question</label>
              <textarea name="question" rows="6" cols="80" class="form-control" placeholder="Enter question here.."></textarea>
            </div>
            <div class="form-group">
              <label for="category">Category:</label>
              <select name="category" class="form-control" required>
                <?php foreach($questionnaire_category as $key=>$val):?>
                  <option value="<?=$val->id; ?>"><?=ucfirst($val->category); ?></option>
                <?php endforeach; ?>
              </select>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <?php $this->load->view('admin/footer'); ?>
  <?php $this->load->view('admin/scrolltotup'); ?>
