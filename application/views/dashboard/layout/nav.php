<?php 
// AMBIL DATA MENU DARI KONFIGURASI
$product_nav = $this->model_config->product_nav();
$product_nav_mobile = $this->model_config->product_nav();
 ?>

<div class="wrap_header">
<!-- Logo -->
<a href="<?= base_url('customer/home') ?>" class="logo">
<img src="<?= base_url('assets/upload/image/'.$site->logo); ?>" alt="<?= $site->webname?>|<?= $site->tagline ?>">
</a>

<!-- Menu -->
<div class="wrap_menu">
<nav class="menu">
<ul class="main_menu">

<li>
<a href="<?= base_url('customer/home')?>"><i class="fa fa-home"></i></a>

</li>

<li>
<a class="text-dark" href="<?= base_url('customer/product')?>"><i class="fa fa-list"></i>  Kategori</a>
<ul class="sub_menu">
<?php foreach ($product_nav as $np) { ?>
<li><a href="<?= base_url('customer/product/category/'.$np->slug_category) ?>">
	<?= $np->category_name ?>
</a></li><?php } ?>
</ul>
</li>

<!-- MENU PRODUK -->
<li>
<a class="text-light" href="<?= base_url('customer/product')?>"></a>
		<!-- SEARCH FORM -->
	<form class="form-inline">
    <input class="form-control  mr-sm-2 bg-outline-warning" type="search" placeholder="Kamu mau beli apa?" aria-label="Search">
    <button class="btn btn-outline-warning my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
  </form>
</li>
</ul>
</nav>
</div>

<!-- Header Icon -->
<div class="header-icons ">

<?php if($this->session->userdata('email')) { ?>

<div class="header-icons">
<a href="<?= base_url('customer/dashboard') ?>" class="header-wrapicon1 dis-block">
<img src="<?=base_url('assets/templates')?>/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
</a> &nbsp;
 



<span class="linedivide1"></span>
<?php }else { ?>

<div class="header-icons">
<a href="<?= base_url('login')  ?>" class="header-wrapicon1 dis-block">
<img src="<?=base_url('assets/templates')?>/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
</a>

<span class="linedivide1"></span>
 <a class="btn btn-outline-warning my-2 my-sm-0" href="<?=base_url('register') ?>">Daftar</a>

<span class="linedivide1"></span>
<?php } ?>

<div class="header-wrapicon2">
<?php 
// Cek data belanja
$cart_cek = $this->cart->contents();


?>
<img src="<?= base_url(); ?>assets/templates/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
<span class="header-icons-noti"><?= count($cart_cek) ?></span>

<!-- Header cart noti -->
<div class="header-cart header-dropdown">
<ul class="header-cart-wrapitem">
<?php 
// kalau tak ada data belanja
if (empty($cart_cek)) { 

?>
<!-- Keranjang Kosong -->
<li class="header-cart-item">
	<img src="<?=base_url('assets/templates/images/kosong.png') ?>" class="img img-responsive text-center" width="80">
<p class="header-cart-wrapitem">Keranjangmu masih kosong nih ! Isi dulu yuk</p>
</li>

<?php 
// Kalau ada
}else{


// Total Belanja
// Tampilkan data belanja 
foreach ($cart_cek as $cc) {

		$product_id = $cc['id'];
		 //Ambil data produk 
		$the_prod 	=  $this->product_model->details($product_id);
?>

<li class="header-cart-item">
<div class="header-cart-item-img">
<img src="<?= base_url('assets/upload/image/thumbs/'.$the_prod->images); ?>" alt="<?= $cc['name'] ?>">
</div>
 
<div class="header-cart-item-txt">
<a href="<?= base_url('customer/produk/detail/'.$the_prod->slug_product) ?>" class="header-cart-item-name">
<?= $cc['name'] ?>
</a>

<span class="header-cart-item-info">
<?= $cc ['qty'] ?> x Rp <?= number_format($cc['price'],'0',',','.')?>: Rp <?= number_format($cc['subtotal'],'0',',','.')?> 
</span>
</div>
</li>

<?php 
 //tutup foreach cart_cek
} //tutup if
?>
</ul>

<div class="header-cart-total">
<?php 
$total_shop ='Rp. '.number_format($this->cart->total(),'0',',','.');
echo $total_shop;
 ?>
</div>

<div class="header-cart-buttons">
<div class="header-cart-wrapbtn">
<!-- Button -->
<a href="<?= base_url('customer/shop')?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
Lihat Semua
</a>
</div>

<div class="header-cart-wrapbtn">
<!-- Button -->
<a href="<?= base_url('customer/shop/checkout')?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
Bayar
</a>
</div>
<?php }  ?>
</div>
</div>
</div>
</div>
</div>
</div>

<!-- Header Mobile -->
<div class="wrap_header_mobile bg-warning">
<!-- Logo moblie -->
<a href="index.html" class="logo-mobile">
<img src="<?= base_url('assets/upload/image/'.$site->logo); ?>" alt="IMG-LOGO">
</a>

<a class="text-dark" href="<?=base_url('login') ?>"><i class="fa fa-hand"></i>Masuk</a>

<!-- Button show menu -->
<div class="btn-show-menu">

<!-- Header Icon mobile -->
<div class="header-icons-mobile">
<a href="#" class="btn btn-outline-light">
Daftar
</a>

<span class="linedivide2"></span>

<div class="header-wrapicon2">

<?php 
// Cek data belanja
$cart_cek_mobile = $this->cart->contents();

?>

<img src="<?= base_url(); ?>assets/templates/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
<span class="header-icons-noti"><?= count($cart_cek_mobile) ?></span>

<!-- Header cart noti -->
<div class="header-cart header-dropdown">
<ul class="header-cart-wrapitem">

<?php 
// kalau tak ada data belanja
if (empty($cart_cek_mobile)) { ?>

<li class="header-cart-item">

<p class="alert alert-success">Keranjangmu Masih Kosong!</p>

</li>

<?php 
// Kalau ada
}else{
// Total Belanja
$total_shop_mobile ='Rp.'.number_format($this->cart->total(),'0',',','.');
// Tampilkan data belanja
foreach ($cart_cek_mobile as $cc_mobile) {

	$product_id_mobile 	= $cc_mobile['id'];
	$prod_mobile 		= $this->product_model->details($product_id_mobile);

 ?>


<li class="header-cart-item">
<div class="header-cart-item-img">
<img src="<?= base_url('assets/upload/image/thumbs/'.$prod_mobile->images); ?>" alt="<?= $cc['name'] ?>">
</div>

<div class="header-cart-item-txt">
<a href="#" class="header-cart-item-name">
<?= $cc_mobile['name'] ?>
</a>

<span class="header-cart-item-info">
<?= $cc_mobile['qty'] ?> x Rp <?=number_format($cc_mobile['price'],'0',',','.')?>
</span>
</div>
</li>


<?php } //closing foreach

} // closing if
?> 
</ul>

<div class="header-cart-total">
<?php 
$total_shop_m ='Rp. '.number_format($this->cart->total(),'0',',','.');
echo $total_shop_m;
 ?>
</div>

<div class="header-cart-buttons">
<div class="header-cart-wrapbtn">
<!-- Button -->
<a href="<?= base_url('shop')  ?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
View Cart
</a>
</div>

<div class="header-cart-wrapbtn">
<!-- Button -->
<a href="<?= base_url('shop/checkout')  ?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
Check Out
</a>
</div>
</div>
</div>
</div>
</div>

<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
<span class="hamburger-box">
<span class="hamburger-inner"></span>
</span>
</div>
</div>
</div>

<!-- Menu Mobile -->
<div class="wrap-side-menu" >
<nav class="side-menu">
<ul class="main-menu">
<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
<span class="topbar-child1">
<?= $site->address ?>
</span>
</li>

<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
<div class="topbar-child2-mobile">
<span class="topbar-email">
<?= $site->email ?>
</span>

<div class="topbar-language rs1-select2">
<select class="selection-1" name="time">
<option><?= $site->phone ?></option>
<option><?= $site->email ?></option>
</select>
</div>
</div>
</li>

<li class="item-topbar-mobile p-l-10">
<div class="topbar-social-mobile">
<a href="<?= $site->facebook ?>" class="topbar-social-item fa fa-facebook"></a>
<a href="<?= $site->instagram ?>" class="topbar-social-item fa fa-instagram"></a>
</div>
</li>


<li class="item-menu-mobile">
<a href="<?= base_url() ?>">Beranda</a>

<!-- MENU MOBILE -->
<ul class="sub-menu">
<?php foreach ($product_nav_mobile as $npm) { ?>
<li><a href="<?= base_url('product/category/'.$npm->slug_category) ?>">
	<?= $npm->category_name ?>
</a></li>
<?php } ?>
</ul>
<i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
</li>

<!-- kontak mobile -->
<li class="item-menu-mobile">
<a href="<?= base_url('contact') ?>">Contact</a>
</li>
</ul>
</nav>
</div>
</header>