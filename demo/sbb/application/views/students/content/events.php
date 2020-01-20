<?php $this->load->view('students/header'); ?>

<?php $this->load->view('students/topmenu'); ?>

<div class="container student">
  <?php $this->load->view('students/navbar'); ?>

  <?php if(is_array($events)): ?>
    <?php foreach($events as $key => $val): ?>
      <div class="row row-striped mx-0">
        <div class="col-2 text-right">
          <h1 class="display-4"><span class="badge badge-secondary"><?=date("d", strtotime($val->event_date)); ?></span></h1>
          <h2><?=date("M", strtotime($val->event_date)); ?></h2>
        </div>
        <div class="col-10">
          <h3 class="text-uppercase"><strong><?=$val->title; ?></strong></h3>
          <ul class="list-inline">
            <li class="list-inline-item"><span data-feather="calendar"></span><?=date("M d, Y", strtotime($val->event_date)); ?></li>
            <li class="list-inline-item"><span data-feather="clock"></span> <?=date('h:iA ', strtotime($val->event_time_start)); ?> - <?=date('h:iA ', strtotime($val->event_time_end)); ?> </li>
            <li class="list-inline-item"><span data-feather="navigation"></span> <?=$val->location; ?></li>
            <li class="list-inline-item"><span data-feather="feather"></span> <?=$val->department; ?></li>
          </ul>
          <p><?=$val->description; ?></p>
        </div>
      </div>
    <?php endforeach; ?>
  <?php else: ?>
    <h3>No Records Found!</h3>
  <?php endif; ?>
</div>
