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
      <?php if(is_array($slider)): ?>
      <table id="data-table" class="table display" style="width:100%">
        <thead class="thead-light">
          <tr>
            <th scope="col">Header</th>
            <th scope="col">Content</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($slider as $val): ?>
          <tr>
            <td><?=$val->header; ?></td>
            <td><?=$val->body; ?></td>
            <td>
              <button onclick="editSlider(<?=$val->id; ?>)" class="btn btn-outline-success btn-sm"><span data-feather="edit"></span></button>
              <button onclick="deleteSlider(<?=$val->id; ?>)" class="btn btn-outline-danger btn-sm"><span data-feather="trash"></span></button>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <?php else: ?>
        <h3>No Records Found..</h3>
      <?php endif; ?>

      <div class="btn-group">
        <a href="#" class="btn btn-success btn-fab" id="main" data-toggle="modal" data-target="#newSlider">
          <span data-feather="plus"></span>
        </a>
      </div>
    </main>
  </div>
</div>

<!--New Student Modal -->
<div class="modal fade" id="newSlider" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">New Slide</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form" action="api/students/add" method="post">
      <div class="modal-body">
        <div class="col-xs-12">
          <div class="form-group">
            <label for="lastname" class="input-label">Header</label>
            <input type="text" name="header" class="form-control" required>
          </div>
        </div>
        <div class="col-xs-12">
          <div class="form-group">
            <label for="body" class="input-label">Body</label>
            <textarea name="body" rows="8" cols="80" class="form-control" required></textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-outline-success btn-sm"><span data-feather="save"></span> Save</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="editSlider" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Edit Slide</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form" action="api/students/edit" method="post">
      <input type="hidden" name="id">
      <div class="modal-body">
        <div class="col-xs-12">
          <div class="form-group">
            <label for="lastname" class="input-label">Header</label>
            <input type="text" name="header" class="form-control" required>
          </div>
        </div>
        <div class="col-xs-12">
          <div class="form-group">
            <label for="body" class="input-label">Body</label>
            <textarea name="body" rows="8" cols="80" class="form-control" required></textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-outline-success btn-sm"><span data-feather="save"></span> Save</button>
      </div>
      </form>
    </div>
  </div>
</div>
