<!-- Title Page -->
<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(<?= base_url() ?>assets/templates/images/heading-pages-02.jpg);">
<h2 class="l-text2 t-center">
	PROMO
</h2>
<p class="m-text13 t-center">
	<?= $site->webname ?> | <?= $site->tagline ?>
</p>
</section>


<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
<div class="container">
	<div class="row">
		<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
			<div class="leftbar p-r-20 p-r-0-sm">
				<!--  -->
				<h4 class="m-text14 p-b-7">
					Kategori
				</h4>

				<ul class="p-b-54">
					<?php foreach ($list_cat as $lc) { ?>
					<li class="p-t-4">
						<a href="<?= base_url('customer/product/category/'.$lc->slug_category) ?>" class="s-text13 active1">
							<?= $lc->category_name ?>
						</a>
					</li>
				<?php } ?>

				</ul>

				
			</div>
		</div>

		<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
			<!--  -->
			<div class="flex-sb-m flex-w p-b-35">
				<label class=""> </label>
				<div class="flex-w">
					<div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
						<select class="form-control" name="sorting">
							<option>Urutkan</option>
							<option>Popularitas</option>
							<option>Harga rendah ke tinggi</option>
							<option>Harga tinggi ke rendah</option>
						</select>
					</div>

				
				</div>

			
			</div>

			<!-- Product -->
			<div class="row">
				<?php foreach ($product as $product) { ?>
				<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
<!-- form proses belanja -->
<?= form_open(base_url('customer/shop/add'));
// elemen yang dibawa
echo form_hidden('id', $product->product_id);
echo form_hidden('qty', 1);
echo form_hidden('price', $product->price);
echo form_hidden('name', $product->product_name);
// elemen redirect
echo form_hidden('redirect_page', str_replace('index.php/','',current_url()));
?>
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
							<img src="<?= base_url('assets/upload/image/thumbs/'.$product->images) ?>" alt="<?= $product->product_name ?>">

							<div class="block2-overlay trans-0-4">
								<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
									<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
									<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
								</a>

								<div class="block2-btn-addcart w-size1 trans-0-4">
									<!-- Button -->
									<button type="submit" value="submit" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
									Keranjangkan yuk!
								</button>
								</div>
							</div>
						</div>

						<div class="block2-txt p-t-20">
							<a href="<?= base_url('customer/product/detail/'.$product->slug_product) ?>" class="block2-name dis-block s-text3 p-b-5">
							<?=$product->product_name ?>
							</a>

							<span class="block2-price m-text6 p-r-5">
								Rp. <?=number_format($product->price,'0',',','.') ?>
							</span>
						</div>
					</div>
					<?= form_close();?>

				</div>
			<?php } ?>
			</div>

			<!-- Pagination -->
			<div class="pagination flex-m flex-w p-t-26">
				<?php echo $pagin ?>
			</div>
		</div>
	</div>
</div>
</section>