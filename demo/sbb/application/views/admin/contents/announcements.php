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
      <?php if(is_array($announcements)): ?>
      <div id="announcements">
        <?php foreach($announcements as $key => $val): ?>
        <div class="card border-success mb-3">
          <div class="card-body">
            <h5 class="card-title"><?=$val->headline; ?></h5>
            <p class="card-text"><?=$val->message; ?></p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            <button class="btn btn-outline-success btn-sm" data-toggle="tooltip" data-placement="top" title="Update Announcement" onclick="update_announcement(<?=$val->id; ?>)"><span data-feather="edit"></span></button>
            <button class="btn btn-outline-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Send SMS" onclick="send_sms(<?=$val->id; ?>)"><span data-feather="message-square"></span></button>
              <?php if($val->visible == 1): ?>
                <button class="btn btn-outline-secondary btn-sm" id="btn-sh-<?=$val->id; ?>" onclick="showhide_announcement(<?=$val->id; ?>, <?=$val->visible; ?>)" data-toggle="tooltip" data-placement="top" title="Hide on Bulletin Board"><span data-feather="eye-off"></span></button>
              <?php else: ?>
                <button class="btn btn-outline-secondary btn-sm" id="btn-sh-<?=$val->id; ?>" onclick="showhide_announcement(<?=$val->id; ?>, <?=$val->visible; ?>)" data-toggle="tooltip" data-placement="top" title="Show on Bulletin Board"><span data-feather="eye"></span></button>
              <?php endif; ?>
            <button class="btn btn-outline-danger btn-sm" onclick="delete_announcement(<?=$val->id; ?>)" data-toggle="tooltip" data-placement="top" title="Delete Announcement"><span data-feather="trash"></span></button>
          </div>
        </div>
      <?php endforeach; ?>
      </div>
      <?php else: ?>
        <h3>No Records Found!</h3>
      <?php endif; ?>
      <div class="btn-group">
        <a href="#" class="btn btn-success btn-fab" id="main" data-toggle="modal" data-target="#newAnnouncements">
          <span data-feather="plus"></span>
        </a>
      </div>
    </main>
  </div>
</div>

<!--Create Announcement Modal -->
<div class="modal fade" id="newAnnouncements" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Create New Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form" action="api/announcements/add" method="post">
      <div class="modal-body">
          <div class="form-group">
            <label for="headline" class="form-label">Headline</label>
            <input type="text" class="form-control" name="headline" placeholder="Enter Headline">
          </div>
          <div class="form-group">
            <label for="message" class="form-label">Message</label>
            <textarea name="message" class="form-control" rows="6" cols="80" placeholder="Type your message here..."></textarea>
          </div>
          <div class="form-group">
            <label for="department" class="form-label">Department</label>
            <select name="department" class="form-control">
              <?php foreach($departments as $key => $val): ?>
                <option value="<?=$val->id; ?>"><?=$val->name; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="cb_sendsms" id="cb_sendsms" checked>
            <label class="form-check-label" for="cb_sendsms">
              Send an SMS after posting announcement
            </label>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-outline-success btn-sm"><span data-feather="send"></span> Post</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!--Update Announcement Modal -->
<div class="modal fade" id="editAnnouncements" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Update New Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form" action="api/announcements/edit" method="post">
      <input type="hidden" name="id">
      <div class="modal-body">
          <div class="form-group">
            <label for="headline" class="form-label">Headline</label>
            <input type="text" class="form-control" name="headline" placeholder="Enter Headline">
          </div>
          <div class="form-group">
            <label for="message" class="form-label">Message</label>
            <textarea name="message" class="form-control" rows="6" cols="80" placeholder="Type your message here..."></textarea>
          </div>
          <div class="form-group">
            <label for="department" class="form-label">Department</label>
            <select name="department" class="form-control">
              <?php foreach($departments as $key => $val): ?>
                <option value="<?=$val->id; ?>"><?=$val->name; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-outline-success btn-sm"><span data-feather="send"></span> Post</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Send SMS Modal -->
<div class="modal fade" id="sendSMSModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Send SMS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form" action="api/sms/add" method="post">
      <input type="hidden" name="id">
      <div class="modal-body">
          <div class="form-group">
            <label for="message" class="form-label">Message</label>
            <textarea name="message" class="form-control" rows="3" cols="80" placeholder="Type your message here..."></textarea>
          </div>
          <div class="form-group">
            <label for="department" class="form-label">Department</label>
            <select name="department" class="form-control">
              <?php foreach($departments as $key => $val): ?>
                <option value="<?=$val->id; ?>"><?=$val->name; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-outline-success btn-sm"><span data-feather="send"></span> Send</button>
      </div>
      </form>
    </div>
  </div>
</div>
