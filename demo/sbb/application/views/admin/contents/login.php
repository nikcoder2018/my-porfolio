<section>
  <div class="col-md-12 admin-auth">
    <div class="container">
      <div class="row">
        <div class="col-md-3 mx-auto mt-5 login-box">
          <img src="<?php echo base_url(); ?>/resources/images/avatar2_big.png" class="d-block mx-auto avatar">
          <p>Login as <strong>Administrator</strong></p>
          <hr class="my-3">
          <form action="/auth/admin_validation" id="form-login" class="form-horizontal" method="POST">
            <div class="form-group">
              <label for="username" class="input-label">Username</label>
              <input type="text" name="username" class="form-control" placeholder="Enter Username" value="admin" required>
            </div>
            <div class="form-group">
              <label for="password" class="input-label">Password</label>
              <input type="password" name="password" class="form-control" placeholder="Enter Password" value="admin" required>
            </div>
            <div class="message col"></div>
            <button type="submit" class="btn btn-success btn-block">Login</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
