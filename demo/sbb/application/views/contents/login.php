<?php $this->load->view('contents/header'); ?>
<section>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="ml-auto">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?php base_url(); ?>signup">Register</a>
        </li>
        <li class="nav-item active">
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
        <div class="col-md-4 mx-auto mt-5 login-box">
          <img src="<?php base_url(); ?>/resources/images/avatar1_student.png" class="d-block mx-auto">
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
            <a href="<?php base_url(); ?>/signup">Create Account</a>
          </form>
        </div>
      </div>
    </div>
    <?php $this->load->view('contents/footer'); ?>
  </div>
</section>
