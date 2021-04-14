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
					<tr>
						<td>Bukti Bayar</td>
						<td><?php if ($header->payment_bill !="") { ?> <img src="<?= base_url('assets/upload/image/'.$header->payment_bill)  ?>" class="img img-thumbnail" width="200">
						<?php } else {echo 'Belum Ada Bukti Bayar';} ?>
						</td>
						<td></td>
					</tr>
				</tbody>		
				</thead>
			</table>

			<?php 
			//error upload
			if (isset($error)) {
				
				echo '<p class="alert alert-warning">'.$error.'</p>';
			}
				//Notif error
			echo validation_errors('<p class="alert alert-info">','</p>');

			echo form_open_multipart(base_url('customer/dashboard/confirm/'.$header->transaction_code));

			 ?>

			 <table class="table table-responsive table-striped">
			 	<tbody>
			 		<tr>
			 			<td>Pembayaran ke Rekening</td>
			 			<td><select name="id_rekening" class="form-control">
			 				<option value="-">Pilih Bank</option>
			 				<?php foreach ($rek as $rek) { ?>
			 				<option value="<?= $rek->id_rekening ?>"<?php if($header->id_rekening==$rek->id_rekening){echo "selected";} ?>>
			 				<?= $rek->bank_name ?> | 
			 				(No. Rek: <?=$rek->rek_number?> a.n <?= $rek->pemilik_rek?>)
			 				</option>
			 			<?php } ?>
			 			</select></td>
			 		</tr>
			 	</tbody>

			 	<tbody>
			 		<tr>
			 			<td>Tanggal Bayar</td>
			 			<td>
			 			<input type="text" name="pay_date" class="form-control" placeholder="dd-mm-yyyy" value="<?php if (isset($_POST['pay_date'])) { echo set_value('pay_date');}else if($header->transaction_date!=""){echo date('d-m-Y',strtotime($header->transaction_date));}else{ echo date('d-m-Y');}?>">
			 			</td>
			 		</tr>
			 		<tr>
			 			<td>Jumlah Bayar</td>
			 			<td>
			 			<input type="number" name="payment_value" class="form-control" 
			 			placeholder="Jumlah Bayar" 
			 			value="<?php if (isset($_POST['payment_value'])) {echo set_value('payment_value'); }else{ echo $header->transaction_value;} ?>">
			 			</td>
			 		</tr>
			 		<tr>
			 			<td>Dari Bank</td>
			 			<td><input type="text" name="bank_name" class="form-control" value="<?=$header->bank_name?>" placeholder="Nama Bank">
			 			</td>
			 		</tr>
			 		<tr>
			 			<td>Dari Rekening</td>
			 			<td><input type="number" name="payment_number" class="form-control" value="<?=$header->payment_number?>" placeholder="Nomor Rekening">
			 			</td>
			 		</tr>
			 		<tr>
			 			<td>Nama Pemilik Rekening</td>
			 			<td><input type="text" name="customer_number" class="form-control" value="<?=$header->customer_number?>" placeholder="Nama Pemilik Rekening">
			 			</td>
			 		</tr>
			 		<tr>
			 			<td>Upload Bukti Bayar</td>
			 			<td><input type="file" name="payment_bill" class="form-control" placeholder="Upload Bukti Pembayaran">
			 			</td>
			 		</tr>
			 		<tr>
			 			<td></td>
			 			<td>
			 				<div class="btn-group">
			 					<button class="btn btn-md btn-outline-dark"><i class="fa fa-upload" type="submit"></i>Kirim</button>

			 					<button class="btn btn-md btn-outline-warning"><i class="fa fa-times" type="reset"></i>Batal</button>
			 				</div>
			 			</td>
			 		</tr>
			 	</tbody>
			 </table>

			 <!-- tutup form -->
			 <?= form_close(); ?>
					

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