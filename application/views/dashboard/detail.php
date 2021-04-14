	<div class="alert alert-warning text-dark">
		<h5><i><strong>Hai!! <?= $this->session->userdata('customer_name'); ?></strong></i></h5>
 	</div><!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
<div class="container">
	<div class="row">
		<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
			<div class="leftbar p-r-20 p-r-0-sm">
				<!-- Menu -->
				<?php include ('menu.php'); ?>
				</div>

		</div>
		<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
			
		<h6 class="m-text22 w-size19 w-full-sm"><?= $title ?></h6>
		<?php if 
		//Kalau ada transaksi tampilkan data
		($header) { ?>	

			<table class="table table-hover table-striped">
				<thead>
				<tr>
					<th> ID Transaksi</th>
					<th><?= $header->transaction_code ?></th>
				</tr>
				<tbody>
					<tr>
						<td>Tanggal</td>
						<td> <?= date('d-m-Y',strtotime($header->transaction_date))  ?></td>
						<td></td>
					</tr>
					<tr>
						<td>Total Belanja</td>
						<td>Rp. <?=number_format($header->transaction_value)?></td>
						<td></td>
					</tr>
					<tr>
						<td>Status Bayar</td>
						<td> <?=$header->payment_status?></td>
						<td></td>
					</tr>
				</tbody>		
				</thead>
			</table>

					<table class="table table-bordered">
					<thead>
					<tr>
					<th scope="col">#</th>
					<th scope="col">Nama Produk</th>
					<th scope="col">Jumlah</th>
					<th scope="col">Harga</th>
					<th scope="col">Sub Total</th>
					</tr>
					</thead>
					<tbody>
						<?php $i=1; foreach ($trans as $transaksi) { ?>
					<tr>
					<th scope="row"><?= $i ?></th>
					<td><?=$transaksi->product_name ?></td>
					<td><?= number_format($transaksi->value) ?></td>
					<td>Rp.<?= number_format($transaksi->price) ?></td>
					<td>Rp.<?= number_format($transaksi->total_price) ?></td>
					</tr>
					<?php $i++; } ?>
					</tbody>
					</table>

		<!-- kalau tak ada tampilkan notif-->
		<?php 
		}else{ ?>

			<p class="alert alert-info" role="alert">Kamu belum pernah belanja!</p>

		<?php } ?>

		
			<!-- Product -->
			<div class="row">
			
			</div>
		</div>
	</div>
</div>
</section>