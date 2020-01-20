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

  <!-- GOOGLE WEB FONT -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- BASE CSS -->
  <link href="<?php echo base_url(); ?>resources/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>resources/css/style.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>resources/css/vendors.css" rel="stylesheet">

  <link rel="stylesheet" href="<?php echo base_url(); ?>node_modules/sweetalert2/dist/sweetalert2.min.css">

  <!-- YOUR CUSTOM CSS -->
  <link href="<?php echo base_url(); ?>resources/css/custom2.css" rel="stylesheet">

</head>
<?php echo $this->template->stylesheet; ?>
<script>
var base_url = "<?php echo base_url(); ?>";
</script>
</head>
<body id="login_bg">
  <?php echo $this->template->content; ?>

  <!-- COMMON SCRIPTS -->
  <script src="<?php echo base_url(); ?>resources/js/common_scripts.js"></script>
  <script src="<?php echo base_url(); ?>resources/js/functions.js"></script>
  <script src="<?php echo base_url(); ?>resources/assets/validate.js"></script>
  <script src="<?php echo base_url(); ?>/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
  <?php echo $this->template->javascript; ?>
</body>

</html>
