<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Admin</a>
      </li>
      <li class="breadcrumb-item active">Home</li>
    </ol>


    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i> Steps on how to evaluate teachers:</div>
        <div class="card-body">
          <ul class="list-group">
            <li class="list-group-item d-flex align-items-center">
              <span class="badge badge-primary badge-pill">1</span>
              Select teachers to be evaluated.
            </li>
            <li class="list-group-item d-flex align-items-center">
              <span class="badge badge-primary badge-pill">2</span>
              Answer the following questions religiously.
            </li>
            <li class="list-group-item d-flex align-items-center">
              <span class="badge badge-primary badge-pill">3</span>
              Submit your comment.
            </li>
          </ul>
        </div>
      </div>
      <a href="<?=base_url() ?>students/teachers" class="btn_1 blue approve"><i class="fa fa-fw fa-check-circle-o"></i> Evaluate your teachers now!</a>
    </div>
    <!-- /.container-fluid-->
  </div>
  <!-- /.container-wrapper-->

  <?php $this->load->view('admin/footer'); ?>
  <?php $this->load->view('admin/scrolltotup'); ?>
