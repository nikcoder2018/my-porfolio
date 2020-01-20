<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Admin</a>
      </li>
      <li class="breadcrumb-item active">Password</li>
    </ol>


    <div class="card mb-3">
      <div class="card-header">Update your password</div>
        <div class="card-body">
          <form action="users/changepassword" id="changepassword-form">
            <div class="form-group">
              <div class="col-md-6">
                <label for="oldpassword">Old Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter your current password" required>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-6">
                <label for="newpassword">New Password</label>
                <input type="password" name="newpassword" class="form-control" placeholder="Enter your new password" required>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-6">
                <label for="confirmnewpassword">Confirm New Password</label>
                <input type="password" name="confirmnewpassword" class="form-control" placeholder="Re-enter your current password" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="alert alert-danger" role="alert" style="display: none">
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-6">
                <button type="submit" class="btn_1 blue approve"><i class="fa fa-fw fa-check-circle-o"></i> Change Password</button>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
  </div>
  <!-- /.container-wrapper-->

  <?php $this->load->view('admin/footer'); ?>
  <?php $this->load->view('admin/scrolltotup'); ?>
