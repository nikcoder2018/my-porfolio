<section>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <?php if($this->session->userdata('logged_in') || $this->session->userdata('role') == 'student'): ?>
      <div class="container">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item" style="color: white; font-weight: bold;">
            Welcome back, <?=$this->session->userdata('username'); ?>
          </li>
        </ul>
      </div>
    <?php endif; ?>
  </nav>
</section>
