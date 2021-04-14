<!-- New Product -->
<section class="newproduct bgwhite p-t-45 p-b-105">
<div class="container">
<div class="sec-title p-b-60">
<h3 class="m-text5 t-center">
Ada yang baru nih!
</h3>
</div>

<!-- Slide2 -->
<div class="wrap-slick2">
<div class="slick2">

<?php foreach ($product as $pr) {
	?>

<div class="item-slick2 p-l-15 p-r-15">
<!-- form proses belanja -->
<?=form_open(base_url('customer/shop/add'));
// elemen yang dibawa
	echo form_hidden('id', $pr->product_id);
	echo form_hidden('qty', 1);
	echo form_hidden('price', $pr->price);
	echo form_hidden('name', $pr->product_name);
// elemen redirect
	echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
	?>

<!-- Block2 -->
<div class="block2">
<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
<img src="<?=base_url('assets/upload/image/' . $pr->images)?>" alt="<?=$pr->product_name?>" class="img img-responsive" width="200">

<div class="block2-overlay trans-0-4">
<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
</a>

<div class="block2-btn-addcart w-size1 trans-0-4">
<!-- Button belanja -->
<button type="submit" value="submit" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
Keranjangkan yuk!
</button>
</div>
</div>
</div>

<div class="block2-txt p-t-20">
<a href="<?=base_url('product/detail/' . $pr->slug_product)?>" class="block2-name dis-block s-text3 p-b-5">
<?=$pr->product_name?>
</a>

<span class="block2-price m-text6 p-r-5">
	Rp <?=number_format($pr->price, '0', ',', '.')?>
</span>
</div>
</div>
<?=form_close();?>
</div>

<?php }?>
</div>
</div>
</div>
</section>