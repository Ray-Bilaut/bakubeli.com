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
			
						<!-- Product -->
			<div class="row">
				<?php if 
		//Kalau ada transaksi tampilkan data
		($header) { ?>	

					<table class="table table-hover table-responsive">
					<thead>
					<tr>
					<th scope="col">#</th>
					<th scope="col">ID Transaksi</th>
					<th scope="col">Tanggal</th>
					<th scope="col">Total</th>
					<th scope="col">Jumlah Item</th>
					<th scope="col">Status Bayar</th>
					<th scope="col">OPT</th>
					</tr>
					</thead>
					<tbody>
						<?php $i=1; foreach ($header as $header) { ?>
					<tr>
					<th scope="row"><?= $i ?></th>
					<td><?=$header->transaction_code ?></td>
					<td><?= date('d-m-Y',strtotime($header->transaction_date))?></td>
					<td>Rp.<?= number_format($header->transaction_value) ?></td>
					<td><?=$header->total_item ?></td>
					<td><?=$header->payment_status?></td>
					<td>
						<div class="button-group">
						<a href="<?= base_url('customer/dashboard/detail/'.$header->transaction_code)?>" class="btn btn-outline-dark btn-sm"><i class="fa fa-eye"></i></a>

						<a href="<?= base_url('customer/dashboard/confirm/'.$header->transaction_code)?>" class="btn btn-outline-danger btn-sm"><i class="fa fa-upload"></i></a>
						</div>
					</td>
					</tr>
					<?php $i++; } ?>
					</tbody>
					</table>

		<!-- kalau tak ada tampilkan notif-->
		<?php 
		}else{ ?>

			<p class="alert alert-warning" role="alert">Kamu belum pernah belanja</p>

		<?php } ?>
			</div>
		</div>
	</div>
</div>
</section>