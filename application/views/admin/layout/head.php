<?php 
// Loading Config Web
$site = $this->model_config->countRow();
$icon = $this->model_config->listing();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?= $title ?></title>
<!-- Tell the browser to be responsive to screen width -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?= base_url()?>assets/admin/plugins/fontawesome-free/css/all.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url()?>assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?= base_url()?>assets/admin/dist/css/adminlte.min.css">
<!-- favicon -->
<link rel="icon" type="image/png" href="<?= base_url('assets/upload/image/'.$icon->icon); ?>" width="100%"/>

<!-- ckeditor -->
<script src="<?= base_url()?>/assets/js/ckeditor/ckeditor.js" type="text/javascript"></script>

<!-- Google Font: Source Sans Pro -->

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">