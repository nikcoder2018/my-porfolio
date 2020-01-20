<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-default fixed-top" id="mainNav">
  <a class="navbar-brand" href="index.html"><img src="<?php echo base_url(); ?>resources/img/logo-login2.png" data-retina="true" alt="" width="326" height="36"></a>
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
        <a class="nav-link" href="<?=base_url(); ?>students/">
          <i class="fa fa-fw fa-dashboard"></i>
          <span class="nav-link-text">Home</span>
        </a>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Teachers">
        <a class="nav-link" href="<?=base_url(); ?>students/teachers">
          <i class="fa fa-fw fa-list-alt"></i>
          <span class="nav-link-text">List of Teachers</span>
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
      <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle ml-lg-5" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-fw fa-bell"></i>
          <span class="d-lg-none">Alerts
            <span class="badge badge-pill badge-warning">6 New</span>
          </span>
          <span class="indicator text-warning d-none d-lg-block">
            <i class="fa fa-fw fa-circle"></i>
          </span>
        </a>
        <div class="dropdown-menu" aria-labelledby="alertsDropdown">
          <h6 class="dropdown-header">New Alerts:</h6>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">
            <span class="text-success">
              <strong><i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
            </span>
            <span class="small float-right text-muted">11:21 AM</span>
            <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">
            <span class="text-danger">
              <strong><i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>
            </span>
            <span class="small float-right text-muted">11:21 AM</span>
            <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">
            <span class="text-success">
              <strong><i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
            </span>
            <span class="small float-right text-muted">11:21 AM</span>
            <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item small" href="#">View all alerts</a>
        </div>
      </li> -->
      <li class="nav-item"><a href="" class="nav-link">Login as <?=ucfirst($_SESSION['usertype']); ?></a></li>
      <li class="nav-item">
        <div class="dropdown">
          <button class="btn btn-link dropdown-toggle" style="color: white" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="fa fa-user"></span>
          </button>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="<?=base_url(); ?>students/changepassword"><i class="fa fa-fw fa-lock"></i>Change Password</a>
            <a class="dropdown-item" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-fw fa-sign-out"></i>Logout</a>
          </div>
        </div>
      </li>
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
