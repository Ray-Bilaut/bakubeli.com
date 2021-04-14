	<!-- Navbar -->
	<nav class="main-header navbar navbar-expand navbar-white navbar-light">
	<!-- Left navbar links -->
	<ul class="navbar-nav">
	<li class="nav-item">
	<a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
	</li>
	<li class="nav-item d-none d-sm-inline-block">
	<a href="<?= base_url('admin/dashboard')?>" class="nav-link">Home</a>
	</li>
	<li class="nav-item d-none d-sm-inline-block">
	<a href="#" class="nav-link">Contact</a>
	</li>
	</ul>

	<!-- SEARCH FORM -->
	<form class="form-inline ml-3">
	<div class="input-group input-group-sm">
	<input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
	<div class="input-group-append">
	<button class="btn btn-navbar" type="submit">
	<i class="fas fa-search"></i>
	</button>
	</div>
	</div>
	</form>

	<li class="dropdown user user-menu mt-2 pb-2 ml-auto d-flex">
	<a href="#" class="dropdown-toggle text-gray-400" data-toggle="dropdown">
	<img src="<?php echo base_url() ?>assets/admin/dist/img/ceo.jpg" class="img-circle elevation2 " alt="User Image" height="50">
	<span class="hidden-xs"><?= $this->session->userdata('name');?> </span>
	</a>

	<ul class="dropdown-menu justify-content-center text-center">

	
	<div class="card-header bg-transparent border-info"><?= $this->session->userdata('access_level');?></div>
	<div class="card-body  text-gray-400">
	<img src="<?php echo base_url() ?>assets/admin/dist/img/ceo.jpg" class="img-circle elevation2" alt="User Image" height="80" align="center">
	<p class="card-text"><?= $this->session->userdata('name');?></p>
	<small><?= date('d M Y')?></small>
	</div>

	
	<li class="user-footer">
		<div class="pull-left ml-2">
			<a href="" class="btn btn-default btn-flat">Profil</a>
		</div>
		<div class="pull-right mr-2">
			<a href="<?= base_url('auth/logout') ?>" class="btn btn-default btn-flat">Sign Out</a>
		</div>
		
	</li>
	
	</ul>
	</li>


	</nav>
	<!-- /.navbar -->
	

