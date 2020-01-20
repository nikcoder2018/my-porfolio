<?php $this->load->view('admin/navigation'); ?>

<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Admin</a>
      </li>
      <li class="breadcrumb-item active"><?=ucfirst($remark); ?></li>
    </ol>

    <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> <?=ucfirst($remark); ?> Teachers</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Full name</th>
                  <th>Performance</th>
                </tr>
              </thead>
              <tbody>
              <?php if(is_array($teachers)): ?>
                <?php $counter = 1; ?>
                <?php foreach($teachers as $key=>$val): ?>
                  <tr>
                    <td><?=$counter++; ?></td>
                    <td><?=$val->teacher; ?></td>
                    <td>
                    <?php
                      $rate = floor(($val->total_rate)/($val->number_of_students*100)*100);
                      switch(true):
                          case in_array($rate, range(97, 100)):
                            echo 'Outstanding';
                          break;
                          case in_array($rate, range(92, 96)):
                            echo 'Very Satisfactory';
                          break;
                          case in_array($rate, range(86, 91)):
                            echo 'Satisfactory';
                          break;
                          case in_array($rate, range(80, 85)):
                            echo 'Fair';
                          break;
                          case in_array($rate, range(75, 79)):
                            echo 'Poor';
                          break;
                          default:
                          echo 'Poor';
                      endswitch;
                    ?>
                    </td>
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
