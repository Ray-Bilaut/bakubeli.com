<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?= $title  ?></title>
	<style type="text/css" media="screen">
			body {

			font-family: Arial;
			font-size: 12px;
		}

		.cetak {
					width: 19cm;
					height: 27cm;
					padding: 1cm;

		}

		table {
				border: solid thin #000;
				border-collapse: collapse;

		}
		td, th {

			padding: 3mm 6mm;
			text-align: left;
			vertical-align: top; 
		}
		th {
			background-color: #f5f5f5;
			font-weight: bold;
		}

		h1 {
				text-align: center;
				font-size: 24px;
				text-transform: uppercase;

		}
	</style>
	<style type="text/css" media="print">

		body {

			font-family: Arial;
			font-size: 12px;
		}

		.cetak {
					width: 19cm;
					height: 27cm;
					padding: 1cm;

		}

		table {
				border: solid thin #000;
				border-collapse: collapse;

		}
		td, th {

			padding: 3mm 6mm;
			text-align: left;
			vertical-align: top; 
		}
		th {
			background-color: #f5f5f5;
			font-weight: bold;
		}

		h1 {
				text-align: center;
				font-size: 24px;
				text-transform: uppercase;

		}
		
	</style>
</head>
<body onload="print()">
	<div class="cetak">
	<h1>DETAIL TRANSAKSI <?= $site->webname?></h1>
<table class="table table-bordered" width="100%">
				<thead>
				<tr>
					<th> Customer</th>
					<th><?= $header->customer_name ?></th>
				</tr>
				<tr>
					<th> ID Transaksi</th>
					<th><?= $header->transaction_code ?></th>
				</tr>
				<tbody>
					<tr>
						<td>Tanggal</td>
						<td> <?= date('d-M-Y',strtotime($header->transaction_date))  ?></td>
						
					</tr>
					<tr>
						<td>Total Belanja</td>
						<td>Rp. <?=number_format($header->transaction_value)?></td>
						
					</tr>
					<tr>
						<td>Status Bayar</td>
						<td> <?=$header->payment_status?></td>
						
					</tr>
					<tr>
						<td>Bukti Bayar</td>
						<td> <?php if($header->payment_bill =="") {echo 'Belum Ada Bukti Bayar';}else{
						?>
						<img src="<?= base_url('assets/upload/image/'.$header->payment_bill)?>" class="img img-thumbnail" width="200">
						<?php } ?>
						</td>
						
					</tr>
					<tr>
						<td>Tanggal Bayar</td>
						<td> <?=date('d-M-Y',strtotime($header->pay_date));?></td>
						
					</tr>
					<tr>
						<td>Jumlah Bayar</td>
						<td>Rp. <?=number_format($header->payment_value,'0',',','.')?></td>
						
					</tr>
					<tr>
						<td>Rekening Customer</td>
						<td><?=$header->customer_number?>
						<small>
							<br>
							Bank : <?=$header->bank_name?>
							<br>
							No. rek : <?=$header->payment_number?>
						</small>
						</td>
						
					</tr>
					<tr>
						<td>Rekening Penerima</td>
						<td><?=$header->pemilik_rek?>
						<small>
							<br>
							Bank : <?=$header->bank?>
							<br>
							No. rek : <?=$header->rek_number?>
						</small>
						</td>
						
					</tr>
				</tbody>		
				</thead>
			</table> <hr>

					<table class="table table-bordered" width="100%">
					<thead  class="table bg-warning">
					<tr>
					<th scope="col">#</th>
					<!-- <th scope="col">Produk</th> -->
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
				<!-- 	<th scope="row"><img src="<?= base_url('assets/upload/image/'.$transaksi->images)?>" class="img img-thumbnail" width="200"></th> -->
					<td><?=$transaksi->product_name ?></td>
					<td><?= number_format($transaksi->value) ?></td>
					<td>Rp.<?= number_format($transaksi->price) ?></td>
					<td>Rp.<?= number_format($transaksi->total_price) ?></td>
					</tr>
					<?php $i++; } ?>
					</tbody>
					</table>
	</div>
	
</body>
</html>