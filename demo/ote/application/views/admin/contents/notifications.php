<?php $this->load->view('admin/navigation'); ?>

<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Admin</a>
      </li>
      <li class="breadcrumb-item active" >Notifications</li>
    </ol>
    <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-body">
          <?php if(is_array($notifications)): ?>
            <?php foreach($notifications as $key=>$val): ?>
              <div class="alert alert-<?=$val->alert_type; ?>" role="alert">
                <h4 class="alert-heading"><?=$val->title; ?></h4>
                <p><?=$val->content; ?></p>
                <hr>
                <p class="mb-0"><?=date("M d, Y h:i:A", strtotime($val->created_at)); ?></p>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </div>
          <!-- /tables-->

  </div>
  <!-- /.container-fluid-->
</div>
<!-- /.container-wrapper-->
<?php $this->load->view('admin/footer'); ?>
<?php $this->load->view('admin/scrolltotup'); ?>
