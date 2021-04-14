<section class="cart bgwhite p-t-70 p-b-100">
	<div class="container">
		<div class="wrap-table-shopping-cart bgwhite">
		<h6 class="m-text22 w-size19 w-full-sm"> List Belanja Kamu</h6><hr>


		
			<table class="table-shopping-cart">
		<!-- Keranjang kosong -->
		<?php 
		if (empty($shop)) {

		?>

		<div class="alert alert-light" role="alert">Wah! keranjangmu Kosong!<i class="fa fa-shopping-basket"></i></div>

	
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
<tr>
<td class="column-1" colspan="4"><strong>Total Belanja</strong></td>

<td class="column-4" colspan="2"><strong>Rp.<?= number_format($this->cart->total(),'0',',','.')   ?></strong>

	<div class="row pull-right">
	<div class="mr-2">
		<a href="<?=base_url('shop/delete') ?>" class="btn btn-md btn-dark">Bersihkan<i class="fa fa-trash-o" aria-hidden="true"></i></a>
	</div>
	<div>
		<a href="<?= base_url('shop/checkout') ?>" class="btn btn-md btn-dark">Bayar<i class="fa fa-money" aria-hidden="true"></i></a>
	</div>
	</div>

</td>
</tr>
<tr>
<td class="column-2" colspan="4">  
				<div class="flex-w flex-m w-full-sm">
					<div class="size11 bo4 m-r-10">
						<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="coupon-code" placeholder="Coupon Code">
					</div>

					<div><button class="btn btn-md btn-dark">Punya Kupon?</button></div>

			</div>
</td>

<td class="pull-right">
	
</td>
</tr>
</tbody>

<!-- END CEK CART KOSONG -->
<?php } ?> 

</table>

<!-- TUTUP CONTAINER DAN SECTION -->
</div>	
</div>
</section>


