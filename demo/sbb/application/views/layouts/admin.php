<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title><?php echo $this->template->title->default("Default title"); ?></title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/app.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css"/>
  <link rel="stylesheet" href="<?php echo base_url(); ?>node_modules/sweetalert2/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/carousel.css">
  <script src="https://unpkg.com/feather-icons"></script>
  <?php echo $this->template->stylesheet; ?>
  <script>
    var base_url = "<?php echo base_url(); ?>";
  </script>
</head>
  <body>
    <?php echo $this->template->content; ?>

    <script src="<?php echo base_url(); ?>/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="<?php echo base_url(); ?>/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>
    <script src="<?php echo base_url(); ?>/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <?php echo $this->template->javascript; ?>
    <script>
      feather.replace()
      $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      })
    </script>
  </body>

</html>
