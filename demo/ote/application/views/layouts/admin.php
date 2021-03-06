<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title><?php echo $this->template->title->default("Teacher Evaluation Admin"); ?></title>
  <!-- Favicons-->
  <!-- <link rel="shortcut icon" href="<?php echo base_url(); ?>resources/img/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" type="image/x-icon" href="<?php echo base_url(); ?>resources/img/apple-touch-icon-57x57-precomposed.png">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="<?php echo base_url(); ?>resources/img/apple-touch-icon-72x72-precomposed.png">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="<?php echo base_url(); ?>resources/img/apple-touch-icon-114x114-precomposed.png">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="<?php echo base_url(); ?>resources/img/apple-touch-icon-144x144-precomposed.png"> -->

  <!-- Bootstrap core CSS-->
  <link href="<?php echo base_url(); ?>resources/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />

  <!-- Main styles -->
  <link href="<?php echo base_url(); ?>resources/css/admin.css" rel="stylesheet">
  <!-- Icon fonts-->
  <link href="<?php echo base_url(); ?>resources/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Plugin styles -->
  <link href="<?php echo base_url(); ?>resources/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Your custom styles -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>node_modules/sweetalert2/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>node_modules/select2/dist/js/select2.min.js">
  <link href="<?php echo base_url(); ?>resources/css/custom.css" rel="stylesheet">

  <?php echo $this->template->stylesheet; ?>
  <script>
  var base_url = "<?php echo base_url(); ?>";
  </script>
</head>
<body class="fixed-nav sticky-footer body-bg" id="page-top">
  <?php echo $this->template->content; ?>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url(); ?>resources/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>resources/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url(); ?>resources/vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Page level plugin JavaScript-->
  <script src="<?php echo base_url(); ?>resources/vendor/datatables/jquery.dataTables.js"></script>
  <script src="<?php echo base_url(); ?>resources/vendor/datatables/dataTables.bootstrap4.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url(); ?>resources/js/admin.js"></script>
  <!-- Custom scripts for this page-->
  <script src="<?php echo base_url(); ?>/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
  <script>
    $('#student-selectpicker').selectpicker();
  </script>
  <?php echo $this->template->javascript; ?>
</body>

</html>
