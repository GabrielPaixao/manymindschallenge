<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Desafio ManyMinds</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  
	<!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url("/application/assets/adminlte/plugins/fontawesome-free/css/all.min.css"); ?>">
  
	<!-- IonIcons -->
  <link rel="stylesheet" href="<?php echo base_url("https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"); ?>">
	
	<!-- DataTables -->
	<link rel="stylesheet" href="<?php echo base_url("/application/assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css"); ?>">
  <link rel="stylesheet" href="<?php echo base_url("/application/assets/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css"); ?>">
  <link rel="stylesheet" href="<?php echo base_url("/application/assets/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css"); ?>">
	
	<!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url("/application/dist/css/adminlte.min.css"); ?>">
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Barra de navegação do topo -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <!-- Links do lado esquerdo -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo base_url('dashboard') ?>" class="nav-link">Home</a>
      </li>

    </ul>

    <!-- Aqui entraria os links do lado direito -->
    <ul class="navbar-nav ml-auto"></ul>
  </nav>
  <!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

<!-- Brand Logo -->
<a href="#" class="brand-link">
	<img src="<?php echo base_url('application/dist/img/AdminLTELogo.png'); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
	<span class="brand-text font-weight-light">Desafio ManyMinds</span>
</a>

<!-- Sidebar -->
<?php $this->load->view('templates/dashboard/sidebar'); ?>
<!-- /.sidebar -->

</aside>
