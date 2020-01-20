<?php $this->load->view('admin/navigation'); ?>

<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Admin</a>
      </li>
      <li class="breadcrumb-item active" >Departments</li>
    </ol>
    <div>
      <button class="btn btn-primary" data-toggle="modal" data-target="#newDepartment">New Department</button>
    </div>
    <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Departments</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                </tr>
              </thead>
              <tbody>
                <?php if(is_array($departments)): ?>
                <?php $counter = 1; ?>
                <?php foreach($departments as $key=>$val): ?>
                <tr>
                  <td><?=$counter++; ?></td>
                  <td><?=ucfirst($val->name); ?></td>
                  <td>
                    <button class="btn btn-primary btn-sm" onclick="editdepartment(<?=$val->id; ?>)">Edit</button>
                    <button class="btn btn-danger btn-sm" onclick="deletedepartment(<?=$val->id; ?>)">Delete</button>
                  </td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
	  <!-- /tables-->

  </div>
  <!-- /.container-fluid-->
</div>
<!-- /.container-wrapper-->
<div class="modal fade" id="newDepartment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add new department</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="departments/add">
      <div class="modal-body">
          <div class="form-group">
            <label for="title">Department Name:</label>
            <input type="text" name="name" class="form-control" placeholder="name" required>
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
<div class="modal fade" id="editDepartment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit subject</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="departments/edit">
      <input type="hidden" name="id">
      <div class="modal-body">
          <div class="form-group">
            <label for="title">Department Name:</label>
            <input type="text" name="name" class="form-control" placeholder="name" required>
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
