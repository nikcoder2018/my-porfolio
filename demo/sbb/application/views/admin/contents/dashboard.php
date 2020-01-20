<div class="container-fluid" id="admin">
  <?php $this->load->view('contents/admin/navbar'); ?>
</div>
<div class="container-fluid pl-4">
  <div class="row">
    <?php $this->load->view('contents/admin/sidebar'); ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?php echo $page_title; ?></h1>
        <!--TODO -->
      </div>

      <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">Recent Announcements</h6>
        <?php if(is_array($recent_announcements)): ?>
          <?php foreach($recent_announcements as $key => $val): ?>
            <div class="media text-muted pt-3">
              <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <strong class="d-block text-gray-dark">@<?=$val->username; ?></strong>
                <?=$val->headline; ?>
              </p>
            </div>
          <?php endforeach; ?>
          <small class="d-block text-right mt-3">
            <a href="<?=base_url().'admin/announcements'; ?>">All announcements</a>
          </small>
        <?php else: ?>
          <div class="media text-muted pt-3">
            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
              No Announcements
            </p>
          </div>
        <?php endif; ?>

      </div>
      <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">Recent Events</h6>
        <?php if(is_array($recent_events)): ?>
          <?php foreach($recent_events as $key => $val): ?>
            <div class="media text-muted pt-3">
              <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <strong class="d-block text-gray-dark">@<?=$val->username; ?></strong>
                <?=$val->title; ?>
              </p>
            </div>
          <?php endforeach; ?>
          <small class="d-block text-right mt-3">
            <a href="<?=base_url().'admin/events'; ?>">All events</a>
          </small>
        <?php else: ?>
          <div class="media text-muted pt-3">
            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
              No Events
            </p>
          </div>
        <?php endif; ?>
      </div>
    </main>
  </div>
</div>
