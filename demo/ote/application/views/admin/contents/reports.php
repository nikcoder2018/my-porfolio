<?php $this->load->view('admin/navigation'); ?>

<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Admin</a>
      </li>
      <li class="breadcrumb-item active">Reports</li>
    </ol>

    <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Reports</div>
        <div class="card-body">
          <ul class="nav nav-tabs" id="tab-reports" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="evalreports-tab" data-toggle="tab" href="#evaluation" role="tab" aria-controls="evaluation" aria-selected="true">Evaluation</a>
            </li>
          </ul>
          <div class="tab-content" id="tab-reports-contents">
            <div class="tab-pane fade show active" id="evaluation" role="tabpanel" aria-labelledby="evalreports-tab">
              <div class="row mt-3">
                <div class="col-md-2">
                    <div class="btn-group" role="group" aria-label="Basic example">
                    <button class="btn btn-outline-primary" title="Print Report" onclick="print_report()"><span class="fa fa-print"></span></button>
                    <button class="btn btn-outline-primary" title="Download PDF" onclick="download_pdf()"><span class="fa fa-download"></span></button>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-8">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Filter by:</span>
                        </div>
                        <select name="filter_key" id="" class="form-control col-md-4">
                          <option value="-">Select</option>
                          <option value="student_id">Student ID</option>
                          <option value="student_name">Student Name</option>
                          <option value="teacher_name">Teacher Name</option>
                          <option value="total_score">Total Score</option>
                          <option value="total_rate">Total Rate</option>
                          <option value="remarks">Remarks</option>
                          <option value="date">Date</option>
                        </select>
                        <input type="text" name="filter_value" id="input_value" class="form-control">
                        <select name="filter_value" id="select_value" class="form-control" style="display: none">
                          <option value="outstanding">Outstanding</option>
                          <option value="verysatisfactory">Very Satisfactory</option>
                          <option value="satisfactory">Satisfactory</option>
                          <option value="fair">Fair</option>
                          <option value="poor">Poor</option>
                        </select>
                        <div class="input-group" id="date_value" style="display: none">
                          <div class="input-group-prepend">
                            <span class="input-group-text">From:</span>
                          </div>
                          <input type="date" name="filter_value"  class="form-control">
                        </div>
                        <div class="input-group" id="date_value2" style="display: none">
                          <div class="input-group-prepend">
                            <span class="input-group-text">To:</span>
                          </div>
                          <input type="date" name="filter_value2"  class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="btn btn-success" title="Run Filter" onclick="reloadReportsTable()"><i class="fa fa-filter"></i></div>
                      <div class="btn btn-success" title="Reload Table" onclick="initReports()"><i class="fa fa-refresh"></i></div>
                    </div>
                  </div>
                  <div class="table-responsive mt-3" id="report-table">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Student ID</th>
                          <th>Student Name</th>
                          <th>Teacher</th>
                          <th>Rate</th>
                          <th>Remarks</th>
                          <th>Date</th>
                        </tr>
                      </thead>
                      <tbody>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>
        </div>
      </div>
	  <!-- /tables-->

  </div>
  <!-- /.container-fluid-->
</div>
<!-- /.container-wrapper-->

<div class="modal fade" id="filterDialog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Filter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="reports/filter">
      <div class="modal-body">
        <div class="row p-3">
          <div class="col-xs-12 col-md-12">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
              <label for="defaultCheck1">
                Date
              </label>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>

<?php $this->load->view('admin/footer'); ?>
<?php $this->load->view('admin/scrolltotup'); ?>
