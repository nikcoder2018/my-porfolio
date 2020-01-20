<?php $this->load->view('students/header'); ?>

<?php $this->load->view('students/topmenu'); ?>

<section>
  <div class="front-main-page">
    <div class="row">
      <div class="col-md-8 front-slider">
        <div id="carousel">

          <div id="slides">
            <ul>
              <?php if(is_array($slider)): ?>
                <?php foreach($slider as $key=>$val): ?>
                  <li class="slide">
                    <div class="authorContainer">
                      <p class="quote-author"><?=$val->header; ?></p>
                    </div>
                    <div class="quoteContainer">
                      <p class="quote-phrase"><span class="quote-marks">"</span><?=$val->body; ?><class="quote-marks">"</span>

                      </p>
                    </div>

                  </li>
                <?php endforeach; ?>
              <?php endif; ?>
            </ul>
          </div>
          <div class="btn-bar">
            <div id="buttons"><a id="prev" href="#"><</a><a id="next" href="#">></a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 ml-auto mt-5 mr-5 login-box">
        <img src="<?php echo base_url(); ?>/resources/images/avatar1_student.png" class="d-block mx-auto">
        <p>Students Account</p>
        <hr class="my-3">
        <form action="auth/student_validation" id="student-login" class="form-horizontal" method="POST">
          <div class="form-group">
            <label for="" class="input-label">Username</label>
            <input type="text" name="username" class="form-control" placeholder="Enter Username" value="student" required>
          </div>
          <div class="form-group">
            <label for="" class="input-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Enter Password" value="student" required>
          </div>
          <div class="message col"></div>
          <button type="submit" class="btn btn-success btn-block">Login</button>
          <a href="#" data-toggle="modal" data-target="#registerStudentModal">Create Account</a>
        </form>
      </div>
    </div>
    <?php $this->load->view('contents/footer'); ?>
  </div>
</section>

<!--New Student Modal -->
<div class="modal fade" id="registerStudentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Register New Student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form" action="auth/register" method="post" enctype="multipart/form-data">
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
<div class="modal fade" id="updateStudentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Update Student Records</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form" action="api/students/edit" method="post">
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
                      <button type="button" class="btn btn-link btn-sm"  onclick="changeAvatar()">
                        <span data-feather="camera"></span>
                      </button>
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
