<div class="container-fluid" id="admin">
  <?php $this->load->view('contents/admin/navbar'); ?>
</div>
<div class="container-fluid pl-4">
  <div class="row">
    <?php $this->load->view('contents/admin/sidebar'); ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?php echo $page_title; ?></h1>
      </div>
      <?php if(is_array($presidents)): ?>
      <table id="tbl_presidents" class="table display">
      <thead class="thead-light">
        <tr>
          <th scope="col">Student ID</th>
          <th scope="col">Name</th>
          <th scope="col">Course</th>
          <th scope="col">Department</th>
          <th scope="col">Contact No.</th>
          <th scope="col">Date Registered</th>
          <?php if($this->uri->segment(2) == 'settings'): ?>
          <th></th>
          <?php endif; ?>
        </tr>
      </thead>
      <tbody>
        <?php if(is_array($presidents)): ?>
        <?php foreach($presidents as $val): ?>
        <tr>
          <th scope="row"><?php echo $val->student_id; ?></th>
          <td><?php echo $val->firstname. ' '.$val->middleinitial.'. '.$val->lastname; ?></td>
          <td><?php echo $val->course_name; ?></td>
          <td><?php echo $val->department_name; ?></td>
          <td><?php echo $val->contact_no; ?></td>
          <td><?=date("M d, Y h:i:A", strtotime($val->date_registered)); ?></td>
          <?php if($this->uri->segment(2) == 'settings'): ?>
          <td>
            <button onclick="settingsEditPresident(<?=$val->sId; ?>)" class="btn btn-outline-success btn-sm"><span data-feather="edit"></span></button>
            <button onclick="settingsDeletePresident(<?=$val->sId; ?>)" class="btn btn-outline-danger btn-sm"><span data-feather="trash"></span></button>
          </td>
          <?php endif; ?>
        </tr>
        <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
      </table>
      <?php else: ?>
        <h3>No Records Found..</h3>
      <?php endif; ?>
      <?php if($this->uri->segment(2) == 'settings'): ?>
        <div class="btn-group">
          <a href="#" class="btn btn-success btn-fab" id="main" data-toggle="modal" data-target="#addNewPresidentModal">
            <span data-feather="plus"></span>
          </a>
        </div>
      <?php endif; ?>
    </main>
  </div>
</div>


<div class="modal fade" id="addNewPresidentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Register New President</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form" action="api/presidents/add" method="post">
      <div class="modal-body">
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
                    <img src="<?=base_url(); ?>resources\images\avatar1_student.png">
                    <div class="btn-group">
                      <button type="button" class="btn btn-link btn-sm"  onclick="addPresidentAvatar()">
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
              <label for="username" class="input-label">Username</label>
              <input type="text" name="username" class="form-control" required>
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="password" class="input-label">Password</label>
              <input type="password" name="password" class="form-control" required>
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="password" class="input-label">Confirm Password</label>
              <input type="password" name="cpassword" class="form-control" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="form-group">
              <label for="course" class="input-label">Course</label>
              <select class="form-control" name="course">
                <?php foreach($course_list as $item): ?>
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
              <input type="text" name="studentid" class="form-control">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="message col"></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-outline-success btn-sm"><span data-feather="send"></span> Register</button>
      </div>
      </form>
    </div>
  </div>
</div>


<!--Update Student Modal -->
<div class="modal fade" id="updatePresidentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Update President Records</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form" action="api/presidents/edit" method="post">
      <input type="hidden" name="id">
      <div class="modal-body">
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
                    <img src="<?=base_url(); ?>resources\images\avatar1_student.png">
                    <div class="btn-group">
                      <button type="button" class="btn btn-link btn-sm"  onclick="changePresidentAvatar()">
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
                <?php foreach($course_list as $item): ?>
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
              <input type="text" name="studentid" class="form-control">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-outline-success btn-sm"><span data-feather="send"></span> Save</button>
      </div>
      </form>
    </div>
  </div>
</div>
