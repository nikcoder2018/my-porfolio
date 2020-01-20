<nav id="menu" class="fake_menu"></nav>

<div id="login">
  <aside>
    <figure>
      <a href="<?php echo base_url() ?>"><img src="<?php echo base_url() ?>resources/img/logo-login.png" width="326" height="45" alt="" class="logo_sticky"></a>
    </figure>
      <form method="post" action="auth/login" id="login-form">
      <div class="form-group">
        <label>User</label>
        <input type="text" class="form-control" name="username" id="username" required>
        <i class="icon-user"></i>
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" name="password" id="password" value="" required>
        <i class="icon_lock_alt"></i>
      </div>
      <div class="alert alert-danger" role="alert" style="display: none">

      </div>
      <button class="btn_1 rounded full-width" type="submit">Login Now</button>
    </form>
    <div class="copy">© 2019 <?php echo $this->config->item('title'); ?></div>
  </aside>
</div>
<!-- /login -->
