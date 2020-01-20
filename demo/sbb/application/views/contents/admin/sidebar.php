<nav class="col-md-2 d-none d-md-block bg-light sidebar">
  <div class="sidebar-sticky">
    <ul class="nav flex-column mt-3">
      <li>
        <strong>Welcome back,</strong>
        <div class="profile-sidebar">
          <!-- SIDEBAR USERPIC -->
          <div class="profile-userpic">
            <div class="image_outer_container">
              <div class="image_inner_container">
                <img src="<?=base_url(); ?>uploads/profile/<?=$account->profile_pic; ?>">
              </div>
            </div>
            <!-- <img src="<?php base_url(); ?>/resources/images/avatar2_big.png" class="img-responsive" alt=""> -->
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
      </li>
      <?php if($this->uri->segment(2) != 'settings'): ?>
        <li class="nav-item mb-2">
          <a class="btn btn-success nav-link" href="<?php echo base_url(); ?>admin/dashboard">
            <span data-feather="grid"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item mb-2">
          <a class="btn btn-success nav-link" href="<?php echo base_url(); ?>admin/events">
            <span data-feather="award"></span>
            Events
          </a>
        </li>
        <li class="nav-item mb-2 dropdown">
          <a class="btn btn-success nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            <span data-feather="feather"></span>
            Dept. Activities
          </a>
          <div class="dropdown-menu">
            <?php foreach($departments as $val): ?>
              <a class="dropdown-item" href="<?=base_url(); ?>admin/activities/<?=$val->id; ?>"><?=$val->name; ?></a>
            <?php endforeach; ?>
          </div>
        </li>
        <li class="nav-item mb-2">
          <a class="btn btn-success nav-link" href="<?=base_url(); ?>admin/announcements">
            <span data-feather="send"></span>
            Announcements
          </a>
        </li>
        <li class="nav-item mb-2 mb-2">
          <a class="btn btn-success nav-link" href="<?php echo base_url(); ?>admin/student-list">
            <span data-feather="users"></span>
            Students List
          </a>
        </li>
        <li class="nav-item mb-2">
          <a class="btn btn-success nav-link" href="<?php echo base_url(); ?>admin/president-list">
            <span data-feather="users"></span>
            Presidents List
          </a>
        </li>
        <li class="nav-item mb-2">
          <a class="btn btn-success nav-link" href="<?php echo base_url(); ?>admin/settings/account">
            <span data-feather="settings"></span>
            Settings
          </a>
        </li>
        <li class="nav-item mb-2">
        <?php else: ?>
          <li class="nav-item mb-2">
            <a class="btn btn-danger nav-link" href="<?php echo base_url(); ?>admin">
              <span data-feather="arrow-left-circle"></span>
              Back to Main
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="btn btn-success nav-link" href="<?php echo base_url(); ?>admin/settings/account">
              <span data-feather="user"></span>
              My Account
            </a>
          </li>
          <?php if($this->session->userdata('position') == 'admin'): ?>
          <li class="nav-item mb-2">
            <a class="btn btn-success nav-link" href="<?php echo base_url(); ?>admin/settings/slider">
              <span data-feather="sliders"></span>
              Update Slider
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="btn btn-success nav-link" href="<?php echo base_url(); ?>admin/settings/students">
              <span data-feather="users"></span>
              Update Stud. List
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="btn btn-success nav-link" href="<?php echo base_url(); ?>admin/settings/presidents">
              <span data-feather="users"></span>
              Update Pres. List
            </a>
          </li>
          <li class="nav-item mb-2">
            <a class="btn btn-success nav-link" href="<?php echo base_url(); ?>admin/settings/sms">
              <span data-feather="message-circle"></span>
              SMS History
            </a>
          </li>
          <?php endif; ?>
        <?php endif; ?>
        <a class="btn btn-secondary nav-link" href="<?php echo base_url(); ?>auth/logout">
          <span data-feather="log-out"></span>
          Logout
        </a>
      </li>
    </ul>
  </div>
</nav>
