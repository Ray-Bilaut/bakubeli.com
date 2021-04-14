<p class="pull-right">
<div class="btn-group pull-left">
	<a href="<?=base_url('admin/transaksi/') ?>" title="Back" class="btn btn-md btn-outline-info"><i class="fa fa-backward"></i></a>	
</div>
<div class="btn-group pull-right">
	<a href="<?=base_url('admin/transaksi/cetak/'.$header->transaction_code) ?>" target ="_blank" title="Print" class="btn btn-md btn-outline-warning"><i class="fa fa-print"></i></a>

	<a href="<?=base_url('admin/transaksi/cetak/'.$header->transaction_code) ?>" title="Cek Status" class="btn btn-md btn-outline-secondary"><i class="fa fa-check"></i></a>
</div>
</p>
<div class="clearfix"></div><hr>
<table class="table table-hover table-striped" width="100%">
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
						<td> <?php if($header->payment_bill =="") {echo 'Belum Ada Bukti Bayar';}else{
						?>
						<img src="<?= base_url('assets/upload/image/'.$header->payment_bill)?>" class="img img-thumbnail" width="200">
						<?php } ?>
						</td>
						<td></td>
					</tr>
					<tr>
						<td>Tanggal Bayar</td>
						<td> <?=date('d-M-Y',strtotime($header->pay_date));?></td>
						<td></td>
					</tr>
					<tr>
						<td>Jumlah Bayar</td>
						<td>Rp. <?=number_format($header->payment_value,'0',',','.')?></td>
						<td></td>
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
						<td></td>
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
						<td></td>
					</tr>
				</tbody>		
				</thead>
			</table> <hr>

					<table class="table table-bordered" width="100%">
					<thead  class="table bg-warning">
					<tr>
					<th scope="col">#</th>
					<th scope="col">Produk</th>
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
					<th scope="row"><img src="<?= base_url('assets/upload/image/'.$transaksi->images)?>" class="img img-thumbnail" width="200"></th>
					<td><?=$transaksi->product_name ?></td>
					<td><?= number_format($transaksi->value) ?></td>
					<td>Rp.<?= number_format($transaksi->price) ?></td>
					<td>Rp.<?= number_format($transaksi->total_price) ?></td>
					</tr>
					<?php $i++; } ?>
					</tbody>
					</table>