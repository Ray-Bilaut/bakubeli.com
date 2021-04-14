		<section class="cart bgwhite p-t-70 p-b-100">
	<div class="container">
		<div class="wrap-table-shopping-cart bgwhite">
		<h6 class="m-text22 w-size19 w-full-sm"> Ringkasan Belanja Kamu</h6><hr>


		
			<table class="table-shopping-cart table-responsive">
		<!-- Keranjang kosong -->
		<?php 
		if (empty($shop)) {

		?>

		<div class="alert alert-warning" role="alert">Wah! keranjangmu Kosong!</div>

	
		<!-- LOOPING KERANJANG -->
		<?php 
		}else{	



		foreach ($shop as $shop) { 
		//Ambil data produk
		$product_id 	= $shop['id'];
		$prod 			= $this->product_model->details($product_id);
		//Form update cart
		echo form_open(base_url('shop/update_cart/'.$shop['rowid']));
		//hidden input
		// echo form_hidden('cart['.$shop['id'].']', $shop['id']);
		// echo form_hidden('cart['.$shop['id'].']', $shop['rowid']);
		// echo form_hidden('cart['.$shop['id'].']', $shop['name']);
		// echo form_hidden('cart['.$shop['id'].']', $shop['price']);
		// echo form_hidden('cart['.$shop['id'].']', $shop['qty']);
		?>
				
				
			 <tbody>
			    <tr>
			    <td class="column-1">
			      <div class="cart-img-product b-rad-4 o-f-hidden">
				<img src="<?= base_url('assets/upload/image/thumbs/'.$prod->images); ?>" alt="<?= $shop['name'] ?>">
				</div>
				</td>

			  <td  class="column-2"><a href="<?= base_url('product/detail/'.$prod->slug_product) ?>"><?= $shop['name']?></a></td>
			    
			    <td class="column-3"><strong>Rp.<?= number_format($shop['price'],'0',',','.')  ?></strong></td>
			     
			    <td class="column-4">
								<div class="flex-w bo5 of-hidden w-size17">
									<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
										<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
									</button>

									<input class="size8 m-text18 t-center num-product" type="number" name="qty" value="<?= $shop['qty'] ?>">

									<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
										<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
									</button>
								</div>
							</td>

		<td class="column-4"><strong>Rp.<?php $subtotal = $shop['price']*$shop['qty'];echo number_format($subtotal,'0',',','.');?></strong>
		</td>

	     <td class="column-4">
	     	<!-- EDIT -->
	     	<button class="btn btn-outline-success mr-2" type="submit" name="update"><i class="fa fa-refresh" aria-hidden="true"></i></button>
	     	<!-- Delete -->
			<a href="<?= base_url('shop/delete/'.$shop['rowid'])?>" class="btn btn-outline-danger mr-2" name="delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
		</td>
	</tr>

<?php
 //form close
 echo form_close();
}//END LOOPING
?>
</tbody>

<!-- END CEK CART KOSONG -->
<?php } ?> 

</table>

<!-- TUTUP CONTAINER DAN SECTION -->
</div>	

<hr>



		<!-- FORM -->
		<?= form_open(base_url('shop/checkout')); 
		$transaction_code	= date('dmY').strtoupper(random_string('alnum',8));
		?>

		<input type="hidden" name="customer_id" value="<?= $customer->customer_id?>">
		<input type="hidden" name="transaction_code" value="<?= $transaction_code ?>">
		<input type="hidden" name="transaction_value" value="<?= $this->cart->total()?>">
		<input type="hidden" name="transaction_date" value="<?=date('Y-m-d')?>">

		<div class="container">
		<div class="flex-w flex-sb-m p-b-12">
		<span class="s-text18 w-size19 w-full-sm pull-right text-bold">
		ID transaksi:
		</span>

		<span class="m-text21 w-size20 w-full-sm">
			<?= $transaction_code ?>
		</span>

		<span class="s-text18 w-size19 w-full-sm">
		Subtotal:
		</span>

		<span class="m-text21 w-size20 w-full-sm text-danger">
		Rp.<?= number_format($this->cart->total(),'0',',','.') ?>
		</span>
		</div>

		<div class="flex-w flex-sb bo10 p-t-15 p-b-20">
		<span class="s-text18 w-size19 w-full-sm">
		Pengiriman:
		</span>

		<div class="w-size20 w-full-sm">

		<span class="s-text13 w-size10 w-full-sm">Penerima</span>
		<br>
		<div class="size13 bo4 m-b-12">
		<input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="customer_name" placeholder="Penerima" value="<?=$customer->customer_name?>" required="required">
		</div>

		<span class="s-text13 w-size10 w-full-sm">Email</span>
		<div class="size13 bo4 m-b-12">
		<input class="sizefull s-text7 p-l-15 p-r-15" type="email" name="email" placeholder="Email" value="<?= $customer->email?>" required="required">
		</div>

		<span class="s-text13 w-size10 w-full-sm">Telepon</span>
		<div class="size13 bo4 m-b-12">
		<input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="phone" placeholder="Telepon" value="<?= $customer->phone?>" required="required">
		</div>

		<span class="s-text13 w-size10 w-full-sm">Alamat</span>
		<div class="size13 bo4 m-b-12">
		<input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="address" placeholder="Alamat" value="<?= $customer->address?>" required="required">
		</div>
		</div>
		</div>

		<!--  -->
		<div class="flex-w flex-sb-m p-t-26 p-b-30">
		<span class="m-text22 w-size19 w-full-sm">
		Total:
		</span>

		<span class="m-text21 w-size20 w-full-sm">
		$39.00
		</span>
		</div>

		<div class="size15 trans-0-4">
		<!-- Button -->
		<button class="btn btn-md btn-dark" type="submit">
		Proses pembayaran
		</button>
		</div>
		</div>
		<?= form_close(); ?>

		</div>
		</section>
