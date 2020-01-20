<div class="container-fluid" id="admin">
  <?php $this->load->view('contents/admin/navbar'); ?>
</div>
<div class="container-fluid pl-4">
  <div class="row">
    <?php $this->load->view('contents/admin/sidebar'); ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
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
              <div class="btn-group">
                <a href="#" class="btn btn-link btn-sm" id="changeProfile" onclick="changeProfile()">
                  <span data-feather="camera"></span>
                </a>
              </div>
            </div>

          </div>
        </div>
        <!-- END SIDEBAR USERPIC -->
        <!-- SIDEBAR USER TITLE -->
        <div class="profile-usertitle">
          <div class="profile-usertitle-name">
            <?=ucfirst($account->firstname).' '.ucfirst($account->lastname); ?>
          </div>
          <div class="profile-usertitle-job">
            <?=ucfirst($account->position); ?>
          </div>
        </div>
      </div>
      <div class="card  text-center" style="width: 35rem; margin: 0 auto">
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Position : <strong><?=ucfirst($account->position); ?></strong></li>
          <li class="list-group-item">Contact Number. : <strong><?=$account->contact_no; ?></strong></li>
          <li class="list-group-item">Username : <strong><?=$account->username; ?></strong></li>
        </ul>
        <div class="card-body text-center">
          <button class="btn btn-secondary btn-sm" title="Change Password" onclick="changepassword_account(<?=$account->id; ?>)"><span data-feather="lock"></span></button>
          <button class="btn btn-info btn-sm" title="Edit Account" onclick="edit_account(<?=$account->id; ?>)"><span data-feather="edit"></span></button>
          <button class="btn btn-danger btn-sm" title="Delete Account" onclick="delete_account(<?=$account->id; ?>)"><span data-feather="trash"></span></button>
        </div>
      </div>
    </main>
  </div>
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
      <form class="form" action="api/account/edit" method="post">
        <input type="hidden" name="id">
        <div class="modal-body" >
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="username" class="input-label">Username/Student ID.</label>
                  <input type="text" name="username" class="form-control" readonly>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="firstname" class="input-label">Firstname</label>
                  <input type="text" name="firstname" class="form-control" placeholder="Firstname" required>
                </div>
              </div>
              <div class="col-2">
                <div class="form-group">
                  <label for="mi" class="input-label">M.I.</label>
                  <input type="text" name="mi" class="form-control" placeholder="M.I.">
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="lastname" class="input-label">Lastname</label>
                  <input type="text" name="lastname" class="form-control" placeholder="Last name" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="course" class="input-label">Course</label>
                  <select class="form-control" name="course">
                    <?php foreach($course_list as $list): ?>
                      <option value="<?=$list->id; ?>"><?=$list->name; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="contact" class="input-label">Contact No.</label>
                  <input type="text" name="contact" class="form-control" placeholder="Contact number">
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

<form action="/api/account/changepic" id="changeProfileForm" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <input type="file" class="form-control-file" name="file" style="display:none;">
  </div>
  <button type="submit" name="submit" style="display:none"></button>
</form>
<style>
#changeProfile{
  position: relative;
  bottom: 40px;
  left: 80px;
}
</style>
