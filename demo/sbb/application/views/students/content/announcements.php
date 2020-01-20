<?php $this->load->view('students/header'); ?>

<?php $this->load->view('students/topmenu'); ?>

<div class="container student">
  <?php $this->load->view('students/navbar'); ?>

  <div class="ml-sm-auto">
  <div id="announcements" >
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Announcements</h1>
    </div>
    <?php if(is_array($announcements)): ?>
        <?php foreach($announcements as $key => $val): ?>
        <?php if($val->visible == 1): ?>
          <div class="card border-success mb-3 mt-3">
            <div class="card-body">
              <h5 class="card-title"><?=$val->headline; ?></h5>
              <p class="card-text"><?=$val->message; ?></p>
              <p class="card-text"><small class="text-muted">Last updated <?=date ("F d Y H:i A", strtotime($val->date_posted)); ?></small></p>
            </div>
          </div>
        <?php endif; ?>
        <?php endforeach; ?>
    <?php else: ?>
      <h3>No Records Found!</h3>
    <?php endif; ?>
    </div>
  </div>
</div>
