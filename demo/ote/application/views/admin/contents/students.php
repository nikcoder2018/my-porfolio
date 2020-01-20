<?php $this->load->view('admin/navigation'); ?>

<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Admin</a>
      </li>
      <li class="breadcrumb-item active" >Students</li>
    </ol>
    <div>
      <button class="btn btn-primary" data-toggle="modal" data-target="#newStudent">New</button>
    </div>
    <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Students</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Student ID</th>
                  <th>Last Name</th>
                  <th>Middle Name</th>
                  <th>First Name</th>
                  <th>Course</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php if(is_array($students)): ?>
                <?php $counter = 1; ?>
                <?php foreach($students as $key=>$val): ?>
                <tr>
                  <td><?=$val->username; ?></td>
                  <td><?=ucfirst($val->lastname); ?></td>
                  <td><?=ucfirst($val->middleinitial); ?></td>
                  <td><?=ucfirst($val->firstname); ?></td>
                  <td><?=$val->course; ?></td>
                  <td>
                    <button class="btn btn-primary btn-sm" onclick="editstudent(<?=$val->id; ?>)">Edit</button>
                    <button class="btn btn-danger btn-sm" onclick="deletestudent(<?=$val->id; ?>)">Delete</button>
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
<div class="modal fade" id="newStudent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add new student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="users/add">
      <div class="modal-body">
          <div class="form-group">
            <label for="username">Username/Student ID:</label>
            <input type="text" name="username" class="form-control" placeholder="Username/Student ID" required>
          </div>
          <div class="form-group">
            <label for="lastname">Password:</label>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
          </div>
          <div class="form-group">
            <label for="firstname">Firstname:</label>
            <input type="text" name="firstname" class="form-control" placeholder="Firstname" required>
          </div>
          <div class="form-group">
            <label for="middleinitial">MiddleInitial:</label>
            <input type="text" name="middleinitial" class="form-control" placeholder="Middle Initial" maxlength="2">
          </div>
          <div class="form-group">
            <label for="lastname">Lastname:</label>
            <input type="text" name="lastname" class="form-control" placeholder="Lastname" required>
          </div>
          <div class="form-group">
            <label for="lastname">Course:</label>
            <select name="course" class="form-control" required>
              <?php foreach($courses as $key=>$val):?>
                <option value="<?=$val->id; ?>"><?=ucfirst($val->name); ?></option>
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
<div class="modal fade" id="editStudent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="users/edit">
      <input type="hidden" name="id">
      <div class="modal-body">
          <div class="form-group">
            <label for="username">Username/Student ID:</label>
            <input type="text" name="username" class="form-control" placeholder="Username/Student ID" required>
          </div>
          <div class="form-group">
            <label for="firstname">Firstname:</label>
            <input type="text" name="firstname" class="form-control" placeholder="Firstname" required>
          </div>
          <div class="form-group">
            <label for="middleinitial">MiddleInitial:</label>
            <input type="text" name="middleinitial" class="form-control" placeholder="Middle Initial" maxlength="2">
          </div>
          <div class="form-group">
            <label for="lastname">Lastname:</label>
            <input type="text" name="lastname" class="form-control" placeholder="Lastname" required>
          </div>

          <div class="form-group">
            <label for="lastname">Course:</label>
            <select name="course" class="form-control" required>
              <?php foreach($courses as $key=>$val):?>
                <option value="<?=$val->id; ?>"><?=ucfirst($val->name); ?></option>
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
