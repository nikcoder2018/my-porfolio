<?php $this->load->view('students/header'); ?>

<?php $this->load->view('students/topmenu'); ?>

<div class="container student">
  <?php $this->load->view('students/navbar'); ?>

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><?=$department->name; ?></h1>
  </div>
  <div class="row">
    <?php if(is_array($activities)): ?>
      <?php foreach($activities as $key=>$val): ?>
        <div class="col-md-3">
          <div class="card">
            <img class="card-img-top" src="<?=base_url(); ?>uploads/activities/<?=$val->image_name; ?>">
            <div class="card-body">
              <h5 class="card-title"><?=$val->title; ?></h5>
              <p class="card-text"><?=$val->description; ?></p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <div class="col">
        <h5>No picture to show</h5>
      </div>
    <?php endif; ?>
  </div>

  <div class="btn-group">
    <a href="<?=base_url(); ?>home" class="btn btn-success btn-fab" id="main">
      <span data-feather="arrow-left"></span>
    </a>
  </div>
</div>
