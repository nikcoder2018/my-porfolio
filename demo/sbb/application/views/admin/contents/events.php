<div class="container-fluid" id="admin">
  <?php $this->load->view('contents/admin/navbar'); ?>
</div>
<div class="container-fluid pl-4">
  <div class="row">
    <?php $this->load->view('contents/admin/sidebar'); ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?php echo $page_title; ?></h1>
      </div>
      <?php if(is_array($events)): ?>
        <?php foreach($events as $key => $val): ?>
          <div class="row row-striped">
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
              <p>
                <a href="#" class="btn btn-outline-info btn-sm" role="button" onclick="update_event(<?=$val->id; ?>)"><span data-feather="edit"></span></a>
                <a href="#" class="btn btn-outline-danger btn-sm" role="button" onclick="delete_event(<?=$val->id; ?>)"><span data-feather="trash"></span></a>
              </p>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <h3>No Records Found!</h3>
      <?php endif; ?>
      <div class="btn-group">
        <a href="#" class="btn btn-success btn-fab" id="main" data-toggle="modal" data-target="#createEventModal">
          <span data-feather="plus"></span>
        </a>
      </div>
    </main>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="createEventModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Create Event</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form" action="api/events/add" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" placeholder="Title" required>
          </div>
          <div class="form-group">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4" cols="80" placeholder="Type your description here..."></textarea>
          </div>
          <div class="form-group">
            <label for="department" class="form-label">Department</label>
            <select name="department" class="form-control">
              <?php foreach($departments as $key => $val): ?>
                <option value="<?=$val->id; ?>"><?=$val->name; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="date" class="form-label">Date</label>
            <input type="date" name="date" class="form-control" placeholder="Date" required>
          </div>
          <div class="form-group">
            <label for="time" class="form-label">Time</label>
            <div class="row">
              <div class="col-md-6">
                <label for="start" class="form-label"><span style="font-size: 14px"><i>From</i></span></label>
                <input type="time" name="time_start" class="form-control" placeholder="Time">
              </div>
              <div class="col-md-6">
                <label for="end" class="form-label"><span style="font-size: 14px"><i>To</i></span></label>
                <input type="time" name="time_end" class="form-control" placeholder="Time">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="location" class="form-label">Location</label>
            <input type="text" name="location" class="form-control" placeholder="Location" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-outline-success btn-sm"><span data-feather="send"></span> Post</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="updateEventModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Update Event</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form" action="api/events/edit" method="post">
        <input type="hidden" name="id">
        <div class="modal-body">
          <div class="form-group">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" placeholder="Title" required>
          </div>
          <div class="form-group">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4" cols="80" placeholder="Type your description here..."></textarea>
          </div>
          <div class="form-group">
            <label for="department" class="form-label">Department</label>
            <select name="department" class="form-control">
              <?php foreach($departments as $key => $val): ?>
                <option value="<?=$val->id; ?>"><?=$val->name; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="date" class="form-label">Date</label>
            <input type="date" name="date" class="form-control" placeholder="Date" required>
          </div>
          <div class="form-group">
            <label for="time" class="form-label">Time</label>
            <div class="row">
              <div class="col-md-6">
                <label for="start" class="form-label"><span style="font-size: 14px"><i>From</i></span></label>
                <input type="time" name="time_start" class="form-control" placeholder="Time">
              </div>
              <div class="col-md-6">
                <label for="end" class="form-label"><span style="font-size: 14px"><i>To</i></span></label>
                <input type="time" name="time_end" class="form-control" placeholder="Time">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="location" class="form-label">Location</label>
            <input type="text" name="location" class="form-control" placeholder="Location" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-outline-success btn-sm"><span data-feather="send"></span> Post</button>
        </div>
      </form>
    </div>
  </div>
</div>
