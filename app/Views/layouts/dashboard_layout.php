<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
  <title>Admin Dashboard</title>
  <meta content="Admin Dashboard" name="description">
  <meta content="HariK" name="author">
  <script src="<?=base_url('assets1/js/jquery-3.6.0.js')?>"></script>
  <link rel="shortcut icon" href="<?=base_url('assets1/images/favicon.ico')?>">
  <link rel="stylesheet" href="<?=base_url('plugins/morris/morris.css')?>">
  <link href="<?=base_url('assets1/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css">
  <link href="<?=base_url('assets1/css/metismenu.min.css')?>" rel="stylesheet" type="text/css">
  <link href="<?=base_url('assets1/css/icons.css')?>" rel="stylesheet" type="text/css">
  <link href="<?=base_url('assets1/css/style.css')?>" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>


<body>

  <?= $this->include('templates/dashboardheader')?>
  <?= $this->rendersection('content'); ?>
  <?= $this->include('templates/dashboardfooter') ?>



  <!-- jQuery  -->
  <script src="<?=base_url('assets1/js/jquery.min.js')?>"></script>
  <script src="<?=base_url('assets1/js/bootstrap.bundle.min.js')?>"></script>
  <script src="<?=base_url('assets1/js/metisMenu.min.js')?>"></script>
  <script src="<?=base_url('assets1/js/jquery.slimscroll.js')?>"></script>
  <script src="<?=base_url('assets1/js/waves.min.js')?>"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.2/axios.min.js" integrity="sha512-SRGf0XYPMWMGCYQg7sQsW2/FMWq0L/mYhwxDraoUOeZ9sWO2/+R48bcXZaWOpwjCQbyRWP24zsbtqQxJXU1W2w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="<?=base_url('plugins/jquery-sparkline/jquery.sparkline.min.js')?>"></script>
  <script type="text/javascript" src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <!--Morris Chart-->

  <script src="assets1/js/app.js"></script>
  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
  <?= $this->renderSection('scripts') ?>
</body>

</html>