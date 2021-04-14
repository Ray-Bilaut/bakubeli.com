<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title> <?= $title ?></title>
	<style type="text/css" media="print">

		body {

			font-size: 12px;
			font-family: Arial;
			}

		table {

			border: solid thin #000;
			border-collapse: collapse;
			width: 100%;
			margin-bottom: 0.5cm;
			
			}

		td {

			padding: 6px 12px;
			border: solid thin #000;
			text-align: center;

		}

		.bg-warning {

			background-color: yellow;
			font-weight: bold;
			font-color: black;
			border: solid thin #000;
		}

	</style>
</head>
<body>


<br>
<br>
	<div style="width: 19cm; padding: 1cm; height: 27cm;">
		<h1 style="text-align: center; font-size: 18px; font-weight: bold;">PENGIRIMAN</h1>

		<table align="center">
		<tr>

		<td>

			<strong>PENGIRIM:</strong>
			<p>	<?= $site->webname?>
				<br><?=$site->address?>
				<br><?=$site->phone  ?>
			</p>
		</td>
		<td>
			<strong>PENERIMA:</strong>
			<p>	<?= $header->customer_name?>
				<br>Alamat : <?=$header->address?>
				<br>Telepon : <?=$header->phone?>
			</p>
			
		</td>

		</tr>
		</table>
					<!-- <h2 style="font-weight: bold; text-align: center;">DATA BELANJA</h2> -->
					<table class="table table-bordered" width="100%">
					<thead  >
					<tr class="bg-warning">
					<!-- <th scope="col">Produk</th> -->
					<th scope="col">Nama Barang</th>
					<th scope="col">QTY</th>
					<th scope="col">Harga</th>
					<th scope="col">Sub Total</th>
					</tr>
					</thead>
					<tbody>
						<?php $i=1; foreach ($trans as $transaksi) { ?>
					<tr>
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