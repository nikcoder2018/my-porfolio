<div class="container-fluid" id="admin">
  <?php $this->load->view('contents/admin/navbar'); ?>
</div>
<div class="container-fluid pl-4">
  <div class="row">
    <?php $this->load->view('contents/admin/sidebar'); ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?=$selected->name; ?></h1>
      </div>
      <div class="row">
        <?php if(is_array($activities)): ?>
          <?php foreach($activities as $key=>$val): ?>
            <div class="col-xs-18 col-sm-6 col-md-3 mr-5">
              <div class="card" style="width: 18rem;">
                <div class="card-header">
                  <?=$val->department; ?>
                </div>
                <img class="card-img-top" id="activity_img" onclick="viewThumbnail('<?php echo base_url(); ?>uploads/<?=$val->image_name; ?>')"  src="<?php echo base_url(); ?>uploads/<?=$val->image_name; ?>" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text"><?=$val->description ?></p>
                  <a href="#" class="btn btn-outline-danger btn-sm" role="button" onclick="deleteActivity(<?=$val->activity_id; ?>)"><span data-feather="trash"></span></a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>

      <div class="btn-group">
        <a href="#" class="btn btn-success btn-fab" id="main" data-toggle="modal" data-target="#createActivityModal">
          <span data-feather="plus"></span>
        </a>
      </div>
    </main>
  </div>
</div>

<div class="modal fade" id="viewImageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <img id="image-gallery-image" class="img-responsive col px-0">
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="createActivityModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Upload Activity</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form" action="api/activities/add" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label for="message" class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4" cols="80" placeholder="Type your message here..." required></textarea>
          </div>
          <div class="form-group">
            <label for="image" class="form-label">Photo</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
              </div>
              <div class="custom-file">
                <input type="file" name="activity_img" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
              </div>
            </div>
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
