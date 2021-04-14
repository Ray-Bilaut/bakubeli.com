<?php 

$site  = $this->model_config->listing();

 ?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
<!-- Brand Logo -->
<a href="<?= base_url('admin/dashboard')?>" class="brand-link">
<img src="<?= base_url('assets/upload/image/'.$site->logo)?>" alt="bakubeli-Logo" class="brand-image img-rounded elevation-3" style="opacity: .8;">
<span class="brand-text font-weight-bold">&nbsp</span>
</a>

<div class="sidebar">
<!-- Sidebar user panel (optional) -->


<!-- Sidebar Menu -->
<nav class="mt-2">
<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

<!-- MENU DASHBOARD -->

<li class="nav-item">
<a href="<?= base_url('admin/dashboard')?>" class="nav-link">
<i class="nav-icon fa fa-tachometer text-warning"></i>
<p>Dashboard</p>
</a>
</li>

<!-- MENU TRANSAKSI -->

<li class="nav-item">
<a href="<?= base_url('admin/transaksi')?>" class="nav-link">
<i class="nav-icon fa fa-check"></i>
<p>Transaksi</p>
</a>
</li>


<!-- MENU PRODUK -->
<li class="nav-item has-treeview">
<a href="#" class="nav-link">
<i class="fas fa-shopping-cart"></i>
<p>
Manajemen Produk
<i class="right fas fa-angle-left"></i>
</p>
</a>
<ul class="nav nav-treeview">
<li class="nav-item">
<a href="<?= base_url('admin/product')?>" class="nav-link">
<i class="fa fa-table nav-icon"></i>
<p>Data Produk</p>
</a>
</li>
<li class="nav-item">
<a href="<?= base_url('admin/product/add')?>" class="nav-link">
<i class="fa fa-plus nav-icon"></i>
<p>Tambah Produk</p>
</a>
</li>
<li class="nav-item">
<a href="<?= base_url('admin/category')?>" class="nav-link">
<i class="fa fa-tags nav-icon"></i>
<p>Kategori Produk</p>
</a>
</li>
</ul>
</li> 
<!-- END MENU PRODUK -->

<!-- MENU USER -->
<li class="nav-item has-treeview">
<a href="#" class="nav-link">
<i class="fas fa-users"></i>
<p>
Manajemen User
<i class="right fas fa-angle-left"></i>
</p>
</a>
<ul class="nav nav-treeview">
<li class="nav-item">
<a href="<?= base_url('admin/user')?>" class="nav-link">
<i class="fa fa-table nav-icon"></i>
<p>Data User</p>
</a>
</li>
<li class="nav-item">
<a href="<?= base_url('admin/user/add')?>" class="nav-link">
<i class="fa fa-plus nav-icon"></i>
<p>Tambah User</p>
</a>
</li>
</ul>
</li>

<!-- REKENING -->
<li class="nav-item has-treeview">
<a href="<?= base_url('admin/rekening') ?>" class="nav-link">
<i class="fas fa-dollar"></i>
<p>
Kelola Rekening
</p>
</a>
</li>

<!-- CONFIG -->
<li class="nav-item has-treeview">
<a href="#" class="nav-link">
<i class="fas fa-wrench"></i>
<p>
Konfigurasi
<i class="right fas fa-angle-left"></i>
</p>
</a>
<ul class="nav nav-treeview">
<li class="nav-item">
<a href="<?= base_url('admin/config')?>" class="nav-link">
<i class="fa fa-home nav-icon"></i>
<p>Konfigurasi Umum</p>
</a>
</li>
<li class="nav-item">
<a href="<?= base_url('admin/config/logo')?>" class="nav-link">
<i class="fa fa-image nav-icon"></i>
<p>Konfigurasi Logo</p>
</a>
</li>
<li class="nav-item">
<a href="<?= base_url('admin/config/icon')?>" class="nav-link">
<i class="fa fa-home nav-icon"></i>
<p>Konfigurasi Icon</p>
</a>
</li>
</ul>
</li>  


<!-- END MENU USER -->

</ul>
</nav>
<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">

</div>
<div class="container-fluid">
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header text-dark"
                   style="background: url('<?php echo base_url() ?>assets/admin/dist/img/photo4.jpg" alt="User Avatar') center center;">
                <h3 class="widget-user-username text-right"><?= $this->session->userdata('name');?></h3><br>
                <a class="widget-user-desc pull-right">Founder & CEO &nbsp<span class="pull-right"><img src="<?= base_url('assets/upload/image/'.$site->logo)?>" alt="bakubeli-Logo" class="img img-responsive" style="opacity: .8; width: 150px;"></span></a><br><br>
             	<h6 class="widget-user-desc text-right"><?= date('d M Y')?></h6>
              </div>
              <div class="widget-user-image">
                <img class="img-circle" src="<?php echo base_url() ?>assets/admin/dist/img/ceo.jpg" alt="User Avatar">
             </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">3,200</h5>
                      <span class="description-text">SALES</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">13,000</h5>
                      <span class="description-text">PROFILE</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                    <div class="description-block">
                       <?php foreach ($total as $row) {?>
<h5 class="description-header"><?=$row->tot_prod?></h5>
                    <?php } ?>
                      <span class="description-text">PRODUCTS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.widget-user -->
          </div>
          <!-- /.col -->


</div>
</div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-header">
<a class="card-title"><span><img src="<?= base_url('assets/upload/image/'.$site->logo)?>" alt="bakubeli-Logo" class="brand-image img-rounded elevation-3" style="opacity: .8; width: 180px;"></span>&nbsp&nbsp<h2 style="font-weight: bold; text-transform: uppercase;"><?= $title?> </a></h2>
</div>
<!-- /.card-header -->
<div class="card-body">