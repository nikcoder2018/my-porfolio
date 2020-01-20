<?php $this->load->view('students/header'); ?>

<?php $this->load->view('students/topmenu'); ?>

<div class="container student">
  <?php $this->load->view('students/navbar'); ?>

  <main role="main" class="ml-sm-auto">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2"><?php echo $page_title; ?></h1>
      <!--TODO -->
    </div>
    <div class="profile-sidebar">
      <!-- SIDEBAR USERPIC -->
      <div class="profile-userpic">
        <div class="image_outer_container">
          <div class="image_inner_container">
            <img src="<?=base_url(); ?>uploads/profile/<?=$account->profile_pic; ?>">
          </div>

        </div>
      </div>
      <!-- END SIDEBAR USERPIC -->
      <!-- SIDEBAR USER TITLE -->
      <div class="profile-usertitle">
        <div class="profile-usertitle-name">
          <?=ucfirst($account->firstname).' '.ucfirst($account->lastname); ?>
        </div>
      </div>
    </div>
    <div class="card  text-center" style="width: 40rem; margin: 0 auto">
      <ul class="list-group list-group-flush">
        <li class="list-group-item">
          <div class="row">
            <div class="col">
              Lastname : <strong><?=ucfirst($account->lastname); ?></strong>
            </div>
            <div class="col">
              Firstname : <strong><?=ucfirst($account->firstname); ?></strong>
            </div>
            <div class="col">
              Middle Initial : <strong><?=ucfirst($account->middleinitial); ?></strong>
            </div>
          </div>
        </li>
        <li class="list-group-item">
          <div class="row">
            <div class="col">
              Course : <strong><?=$account->course; ?></strong>
            </div>
            <div class="col">
              Department : <strong><?=$account->department; ?></strong>
            </div>
          </div>
        </li>
        <li class="list-group-item">
          <div class="row">
            <div class="col">
              Student ID : <strong><?=$account->student_id; ?></strong>
            </div>
            <div class="col">
              Contact No : <strong><?=$account->contact_no; ?></strong>
            </div>
          </div>
        </li>
        <li class="list-group-item">Username : <strong><?=$account->username; ?></strong></li>
      </ul>
      <div class="card-body text-center">
        <button class="btn btn-secondary btn-sm" title="Change Password" onclick="changepassword_account(<?=$account->id; ?>)"><span data-feather="lock"></span></button>
        <button class="btn btn-info btn-sm" title="Edit Account" onclick="edit_account(<?=$account->id; ?>)"><span data-feather="edit"></span></button>
      </div>
    </div>
  </main>
</div>

<!--Update Student Modal -->
<div class="modal fade" id="editAccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Update Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form" action="api/students/edit" method="post">
        <input type="hidden" name="id">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="username" class="input-label">Username</label>
                <input type="text" name="username" class="form-control" required disabled="disabled">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="lastname" class="input-label">Lastname</label>
                <input type="text" name="lastname" class="form-control" required>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="firstname" class="input-label">Firstname</label>
                <input type="text" name="firstname" class="form-control" required>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="mi" class="input-label">MI</label>
                <input type="text" name="mi" class="form-control">
              </div>
            </div>
            <div class="col">
              <input type="file" class="form-control-file" name="avatar" style="display:none;">
              <div class="student-avatar">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">
                  <div class="avatar_outer_container">
                    <div class="avatar_inner_container">
                      <img src="<?=base_url(); ?>uploads\profile\avatar.png">
                      <div class="btn-group">
                        <button type="button" class="btn btn-link btn-sm"  onclick="changeAvatar()">
                          <span data-feather="camera"></span>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="course" class="input-label">Course</label>
                <select class="form-control" name="course">
                  <?php foreach($course as $item): ?>
                    <option value="<?=$item->id ?>"><?=$item->name; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="contact" class="input-label">Contact No.</label>
                <input type="text" name="contact" class="form-control">
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="idno" class="input-label">Student ID No.</label>
                <input type="text" name="student_id" class="form-control">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-outline-success btn-sm"><span data-feather="save"></span> Update</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Change Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form" action="api/account/changepassword" method="post">
        <input type="hidden" name="id">
        <div class="modal-body" >
          <div class="col-xs-12">
            <div class="form-group">
              <label for="password" class="input-label">Current Password</label>
              <input type="password" name="password" class="form-control" placeholder="Your current password" required>
            </div>
          </div>
          <div class="col-xs-12">
            <div class="form-group">
              <label for="password" class="input-label">New Password</label>
              <input type="password" name="newpassword" class="form-control" placeholder="Enter new password" required>
            </div>
          </div>
          <div class="col-xs-12">
            <div class="form-group">
              <label for="confirmnewpassword" class="input-label">Confirm New Password</label>
              <input type="password" name="confirmnewpassword" class="form-control" placeholder="Confirm new password" required>
            </div>
          </div>
          <div class="col-xs-12">
            <div class="alert alert-danger" role="alert" style="display: none">

            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-outline-success btn-sm"><span data-feather="save"></span> Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
