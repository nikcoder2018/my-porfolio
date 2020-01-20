<?php $this->load->view('contents/header');?>
<section>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="ml-auto">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="<?php base_url(); ?>register">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php base_url(); ?>login">Login</a>
        </li>
      </ul>
    </div>
  </nav>
</section>
<section>
  <div class="col-md-12 front-main-page">
    <div class="container">
      <div class="row">
        <div class="col-md-10 mx-auto mt-5 signup-box">
          <form action="register" method="POST" id="form-signup" class="form-horizontal">
          <div class="row">
            <div class="col-md-10">
              <p>Sign up</p>
              <hr class="my-3">
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
                <div class="col">
                  <div class="form-group">
                    <label for="mi" class="input-label">MI</label>
                    <input type="text" name="mi" class="form-control">
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
                    <input type="text" name="studentid" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="message col"></div>
              </div>
            </div>
            <div class="col-md-2">
              <img src="<?php base_url(); ?>resources/images/avatar1_student.png" class="d-block mx-auto">
              <a href="#">Upload</a>
            </div>
          </div>
          <hr class="my-3">
          <div class="row">
            <div class="col-md-4 d-block ml-auto">
              <button type="submit" class="btn btn-success btn-block">Sign up</button>
            </div>
          </div>
          </form>
        </div>
      </div>
    </div>
    <?php $this->load->view('contents/footer'); ?>
  </div>
</section>
