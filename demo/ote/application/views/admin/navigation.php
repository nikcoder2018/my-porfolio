<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-default fixed-top" id="mainNav">
  <a class="navbar-brand" href="<?=base_url();?>/"><img src="<?php echo base_url(); ?>resources/img/logo-login2.png" data-retina="true" alt="" width="326" height="36"></a>
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
        <a class="nav-link" href="<?=base_url();?>admin/">
          <i class="fa fa-fw fa-dashboard"></i>
          <span class="nav-link-text">Home</span>
        </a>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Messages">
        <a class="nav-link" href="<?=base_url();?>admin/students">
          <i class="fa fa-fw fa-graduation-cap"></i>
          <span class="nav-link-text">Students</span>
        </a>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="" data-original-title="Bookings">
        <a class="nav-link" href="<?=base_url();?>admin/teachers">
          <i class="fa fa-fw fa-user"></i>
          <span class="nav-link-text">Teachers</span>
        </a>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="" data-original-title="Bookings">
        <a class="nav-link  nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMylistings1" data-parent="#mylistings">
          <i class="fa fa-fw fa-users"></i>
          <span class="nav-link-text">Classes</span>
        </a>
        <ul class="sidenav-second-level collapse" id="collapseMylistings1">
          <li>
            <a href="<?=base_url();?>admin/classes">Class</a>
          </li>
          <li>
            <a href="<?=base_url();?>admin/subjects">Subjects</a>
          </li>
          <li>
            <a href="<?=base_url();?>admin/departments">Departments</a>
          </li>
        </ul>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="" data-original-title="Bookings">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMylistings2" data-parent="#mylistings">
          <i class="fa fa-fw fa-question"></i>
          <span class="nav-link-text">Questionnaires</span>
        </a>
        <ul class="sidenav-second-level collapse" id="collapseMylistings2">
          <li>
            <a href="<?=base_url();?>admin/questionnaire">Questions</a>
          </li>
          <li>
            <a href="<?=base_url();?>admin/category">Category</a>
          </li>
        </ul>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="My listings">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMylistings" data-parent="#mylistings">
          <i class="fa fa-fw fa-table"></i>
          <span class="nav-link-text">Results</span>
        </a>
        <ul class="sidenav-second-level collapse" id="collapseMylistings">
          <li>
            <a href="<?=base_url();?>admin/results/outstanding">Outstanding <span class="badge badge-success"><?=$this->admin_model->count(array('module' => 'outstanding')); ?></span></a>
          </li>
          <li>
            <a href="<?=base_url();?>admin/results/verysatisfactory">Very Satisfactory <span class="badge badge-primary"><?=$this->admin_model->count(array('module' => 'verysatisfactory')); ?></span></a>
          </li>
          <li>
            <a href="<?=base_url();?>admin/results/satisfactory">Satisfactory <span class="badge badge-warning"><?=$this->admin_model->count(array('module' => 'satisfactory')); ?></span></a>
          </li>
          <li>
            <a href="<?=base_url();?>admin/results/fair">Fair <span class="badge badge-danger"><?=$this->admin_model->count(array('module' => 'fair')); ?></span></a>
          </li>
          <li>
            <a href="<?=base_url();?>admin/results/poor">Poor <span class="badge badge-secondary"><?=$this->admin_model->count(array('module' => 'poor')); ?></span></a>
          </li>
        </ul>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Reviews">
        <a class="nav-link" href="<?=base_url();?>admin/reports">
          <i class="fa fa-fw fa-list-alt"></i>
          <span class="nav-link-text">Reports</span>
        </a>
      </li>
    </ul>
    <ul class="navbar-nav sidenav-toggler">
      <li class="nav-item">
        <a class="nav-link text-center" id="sidenavToggler">
          <i class="fa fa-fw fa-angle-left"></i>
        </a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-fw fa-bell"></i>
          <span class="indicator text-warning d-none d-lg-block">
            <?php $count_notification = $this->admin_model->count(array('module' => 'unread_notifications')); ?>
            <?php if($count_notification != 0): ?>
              <span class="badge badge-pill badge-danger"><?=$count_notification; ?></span>
            <?php endif;?>
          </span>
        </a>
        <div class="dropdown-menu" style="right: 0; left: auto;" aria-labelledby="alertsDropdown">
          <?php $notifications = $this->admin_model->browse(array('module' => 'notifications', 'conditions' => array('status' => 'unread'))); ?>
          <?php if(is_array($notifications)): ?>
          <h6 class="dropdown-header">Notifications:</h6>
          <div class="dropdown-divider"></div>
          <?php foreach($notifications as $key=>$val):?>
            <a class="dropdown-item" href="<?=base_url(); ?>admin/notifications/<?=$val->id; ?>">
              <span class="text-success">
                <strong>
                  <?=$val->title; ?></strong>
              </span>
              <span class="small float-right text-muted"><?=date("M d, Y h:i:A", strtotime($val->created_at)); ?></span>
              <div class="dropdown-message small"><?=$val->content; ?></div>
            </a>
          <?php endforeach; ?>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item small" href="<?=base_url(); ?>admin/notifications">Read all notifications</a>
          <?php else: ?>
            <h6 class="dropdown-header">No new notifications</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="<?=base_url(); ?>admin/notifications">Read all notifications</a>
          <?php endif; ?>
        </div>
      </li>
      <li class="nav-item"><a href="" class="nav-link">Login as <?=ucfirst($_SESSION['usertype']); ?></a></li>
      <li class="nav-item">
        <div class="dropdown">
          <button class="btn btn-link dropdown-toggle" style="color: white" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="fa fa-user"></span>
          </button>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="<?=base_url();?>admin/changepassword"><i class="fa fa-fw fa-lock"></i>Change Password</a>
            <a class="dropdown-item" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-fw fa-sign-out"></i>Logout</a>
          </div>
        </div>
      </ul>
    </div>
  </nav>
  <!-- /Navigation-->

  <!-- Logout Modal-->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?=base_url(); ?>auth/logout">Logout</a>
        </div>
      </div>
    </div>
  </div>
