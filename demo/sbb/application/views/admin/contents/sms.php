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
      <?php if(is_array($sms_history)): ?>
      <table id="data-table" class="table display" style="width:100%">
        <thead class="thead-light">
          <tr>
            <th scope="col">Receiver</th>
            <th scope="col">Sender</th>
            <th scope="col">Text</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($sms_history as $val): ?>
          <tr>
            <td><?php echo $val->reciever; ?></td>
            <td><?php echo $val->operator; ?></td>
            <td><?php echo $val->text; ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <?php else: ?>
        <h3>No Records Found..</h3>
      <?php endif; ?>
    </main>
  </div>
</div>
