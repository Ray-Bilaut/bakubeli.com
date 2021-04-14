<!-- breadcrumb -->
<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
<a href="<?= base_url() ?>" class="s-text16">
	Home
	<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
</a>

<a href="<?= base_url('product') ?>" class="s-text16">
	Produk
	<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i> 

</a>


<span class="s-text17">
	<?= $title ?>
</span>
</div>
<!-- form proses belanja -->
<?= form_open(base_url('shop/add'));
// elemen yang dibawa
echo form_hidden('id', $product->product_id);
// echo form_hidden('qty', 1);
echo form_hidden('price', $product->price);
echo form_hidden('name', $product->product_name);
// elemen redirect
echo form_hidden('redirect_page', str_replace('index.php/','',current_url()));
?>
<!-- Product Detail -->
<div class="container bgwhite p-t-35 p-b-80">
<div class="flex-w flex-sb">
	<div class="w-size13 p-t-30 respon5">
		<div class="wrap-slick3 flex-sb flex-w">
			<div class="wrap-slick3-dots"></div>

			<div class="slick3">
				<div class="item-slick3" data-thumb="<?= base_url('assets/upload/image/thumbs/'.$product->images) ?>">
					<div class="wrap-pic-w">
						<img src="<?= base_url('assets/upload/image/'.$product->images) ?>" alt="<?= $product->product_name ?>">
					</div>
				</div>
				<?php
				if($images) {
				 foreach ($images as $img) { ?>
				

				<div class="item-slick3" data-thumb="<?= base_url('assets/upload/image/thumbs/'.$img->images) ?>">
					<div class="wrap-pic-w">
						<img src="<?= base_url('assets/upload/image/'.$img->images) ?>" alt="<?= $img->images_title ?>">
					</div>
				</div>
		<?php 
			}
			}
		 ?>
			</div>
		</div>
	</div>

	<div class="w-size14 p-t-30 respon5">
		<h4 class="product-detail-name m-text16 p-b-13">
			<?= $title ?>
		</h4>

		<span class="m-text15">
			Rp. <?=number_format($product->price,'0',',','.') ?>
		</span>

		

		<!--  -->
		<div class="p-t-33 p-b-60">
		
			<div class="flex-r-m flex-w p-t-10">
				<div class="w-size16 flex-m flex-w">
					<div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
						<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
							<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
						</button>

						<input class="size8 m-text18 t-center num-product" type="number" name="qty" value="1">

						<button type="submit" name="submit" class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
							<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
						</button>
					</div>

					<div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
						<!-- Button -->
						<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
							Keranjangkan
						</button>
					</div>
					<div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
						<!-- Button -->
						<a href="<?= base_url('shop/checkout') ?>" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
							Beli
						</a>
					</div>
				</div>
			</div>
		</div>

	

		<!--  -->
		<div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
			<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
				Deskripsi 
				<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
				<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
			</h5>

			<div class="dropdown-content dis-none p-t-15 p-b-23">
			<p class="s-text8">

			<?= $product->note ?>

			</p>
			</div>
			</div>

		<div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
			<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
			Spesifikasi
				<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
				<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
			</h5>

			<div class="dropdown-content dis-none p-t-15 p-b-23">
				<p class="s-text8">
					Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat
				</p>
			</div>
		</div>

		<div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
			<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
				Catatan 
				<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
				<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
			</h5>

			<div class="dropdown-content dis-none p-t-15 p-b-23">
				<p class="s-text8">
					Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat
				</p>
			</div>
		</div>
	</div>
</div>
</div>

<?= form_close(); ?>
<!-- Relate Product -->
<section class="relateproduct bgwhite p-t-45 p-b-138">
<div class="container">
	<div class="sec-title p-b-60">
		<h3 class="m-text5 t-center">
			Produk Terkait
		</h3>
	</div>
	<!-- Slide2 -->
	<div class="wrap-slick2">
		<div class="slick2">
			
<?php foreach ($prod_rel as $prel) {?>
	<div class="item-slick2 p-l-15 p-r-15">
			<!-- form proses belanja -->
<?= form_open(base_url('shop/add'));
// elemen yang dibawa
echo form_hidden('id', $prel->product_id);
echo form_hidden('qty', 1);
echo form_hidden('price', $prel->price);
echo form_hidden('name', $prel->product_name);
// elemen redirect
echo form_hidden('redirect_page', str_replace('index.php/','',current_url()));
?>

<!-- Block2 -->
<div class="block2">
<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
<img src="<?= base_url('assets/upload/image/'.$prel->images)?>" alt="<?= $prel->product_name?>">

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
<a href="<?= base_url('product/detail/'.$prel->slug_product) ?>" class="block2-name dis-block s-text3 p-b-5">
<?=$prel->product_name ?>
</a>

<span class="block2-price m-text6 p-r-5">
	Rp <?= number_format($prel->price,'0',',','.') ?>
</span>
</div>
</div>
<?= form_close();?>
		</div>
	<?php } ?>
	</div>
</div>
</div>
</section>