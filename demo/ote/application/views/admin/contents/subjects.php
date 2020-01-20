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
      <button class="btn btn-primary" data-toggle="modal" data-target="#newSubject">New Subject</button>
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
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php if(is_array($subjects)): ?>
                <?php $counter = 1; ?>
                <?php foreach($subjects as $key=>$val): ?>
                <tr>
                  <td><?=$counter++; ?></td>
                  <td><?=ucfirst($val->title); ?></td>
                  <td><?=$val->code; ?></td>
                  <td>
                    <button class="btn btn-primary btn-sm" onclick="editsubject(<?=$val->id; ?>)">Edit</button>
                    <button class="btn btn-danger btn-sm" onclick="deletesubject(<?=$val->id; ?>)">Delete</button>
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
<div class="modal fade" id="newSubject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add new subject</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="subjects/add" id="subject-form">
      <div class="modal-body">
          <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" class="form-control" placeholder="Title" required>
          </div>
          <div class="form-group">
            <label for="code">Code:</label>
            <input type="text" name="code" class="form-control" placeholder="Code" required>
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
<div class="modal fade" id="editSubject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit subject</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="subjects/edit">
      <input type="hidden" name="id">
      <div class="modal-body">
          <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" class="form-control" placeholder="Title" required>
          </div>
          <div class="form-group">
            <label for="code">Code:</label>
            <input type="text" name="code" class="form-control" placeholder="Code" required>
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
