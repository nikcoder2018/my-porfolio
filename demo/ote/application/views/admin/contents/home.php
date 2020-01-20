<?php $this->load->view('admin/navigation'); ?>

<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Admin</a>
      </li>
      <li class="breadcrumb-item active">Home</li>
    </ol>
    <div class="row">
      <div class="col-xl-3 col-sm-4 mb-2">
        <div class="card dashboard text-white bg-success o-hidden">
          <div class="card-body">
            <div class="mr-5"><h5><?=$this->admin_model->count(array('module' => 'outstanding')); ?> Outstanding</h5></div>
          </div>
          <a class="card-footer text-white clearfix small z-1" href="<?=base_url(); ?>admin/results/outstanding">
            <span class="float-left">View</span>
            <span class="float-right">
              <i class="fa fa-angle-right"></i>
            </span>
          </a>
        </div>
      </div>
      <div class="col-xl-3 col-sm-4 mb-2">
        <div class="card dashboard text-white bg-primary o-hidden">
          <div class="card-body">
             <div class="mr-5"><h5><?=$this->admin_model->count(array('module' => 'verysatisfactory')); ?> Very Satisfactory</h5></div>
          </div>
          <a class="card-footer text-white clearfix small z-1" href="<?=base_url(); ?>admin/results/verysatisfactory">
            <span class="float-left">View</span>
            <span class="float-right">
              <i class="fa fa-angle-right"></i>
            </span>
          </a>
        </div>
      </div>
      <div class="col-xl-3 col-sm-4 mb-2">
        <div class="card dashboard text-white bg-warning o-hidden">
          <div class="card-body">
            <div class="mr-5"><h5><?=$this->admin_model->count(array('module' => 'satisfactory')); ?> Satisfactory</h5></div>
          </div>
          <a class="card-footer text-white clearfix small z-1" href="<?=base_url(); ?>admin/results/satisfactory">
            <span class="float-left">View</span>
            <span class="float-right">
              <i class="fa fa-angle-right"></i>
            </span>
          </a>
        </div>
      </div>
      <div class="col-xl-3 col-sm-4 mb-2">
        <div class="card dashboard text-white bg-danger o-hidden">
          <div class="card-body">
            <div class="mr-5"><h5><?=$this->admin_model->count(array('module' => 'fair')); ?> Fair</h5></div>
          </div>
          <a class="card-footer text-white clearfix small z-1" href="<?=base_url(); ?>admin/results/fair">
            <span class="float-left">View</span>
            <span class="float-right">
              <i class="fa fa-angle-right"></i>
            </span>
          </a>
        </div>
      </div>
      <div class="col-xl-3 col-sm-4 mb-2">
        <div class="card dashboard text-white bg-secondary o-hidden">
          <div class="card-body">
            <div class="mr-5"><h5><?=$this->admin_model->count(array('module' => 'poor')); ?> Poor</h5></div>
          </div>
          <a class="card-footer text-white clearfix small z-1" href="<?=base_url(); ?>admin/results/poor">
            <span class="float-left">View</span>
            <span class="float-right">
              <i class="fa fa-angle-right"></i>
            </span>
          </a>
        </div>
      </div>
    </div>
    <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Top Teacher</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Teacher</th>
                  <th>No. of Students</th>
                  <th>Total Rate</th>
                  <th>Performance</th>
                </tr>
              </thead>
              <tbody>
                <?php if(is_array($topteacher)): ?>
                  <?php $counter = 1; ?>
                  <?php foreach($topteacher as $key=>$val): ?>
                    <tr>
                      <td><?=$counter++; ?></td>
                      <td><?=$val->teacher; ?></td>
                      <td><?=$val->number_of_students; ?></td>
                      <td><?=$val->total_scale; ?></td>
                      <td><?=$this->admin_model->get_remarks2($val->total_scale); ?></td>
                    </tr>
                  <?php endforeach; ?>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
	  <!-- /tables-->

  </div>
  <!-- /.container-fluid-->
</div>
<!-- /.container-wrapper-->

<?php $this->load->view('admin/footer'); ?>
<?php $this->load->view('admin/scrolltotup'); ?>
