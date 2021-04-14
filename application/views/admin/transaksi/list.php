<table class="table table-hover table-responsive">
				<thead  class="table bg-warning">
				<tr>
				<th scope="col">#</th>
				<th>CUSTOMER</th>
				<th scope="col">ID TRANSAKSI</th>
				<th scope="col">TANGGAL</th>
				<th scope="col">TOTAL</th>
				<th scope="col">QTY</th>
				<th scope="col">STATUS BAYAR</th>
				<th scope="col">Option</th>
				</tr>
				</thead>
				<tbody>
					<?php $i=1; foreach ($header as $header) { ?>
				<tr>
				<th scope="row"><?= $i ?></th>
				<td class="strong" style="font-weight: bold;"><?=$header->customer_name ?>
					<br>
					<small>
						Telepon : <?=$header->phone?>
						<br>
						Email	: <?=$header->email ?>
						<br>
						Alamat	: <br><?=nl2br($header->address)?>
					</small>
				</td>
				<td><?=$header->transaction_code ?></td>
				<td><?= date('d-m-Y',strtotime($header->transaction_date))?></td>
				<td>Rp.<?= number_format($header->transaction_value) ?></td>
				<td><?=$header->total_item ?></td>
				<td><?=$header->payment_status?></td>
				<td>
					<div class="button-group">
					<a href="<?= base_url('admin/transaksi/detail/'.$header->transaction_code)?>" title="Detail" class="btn btn-outline-dark btn-sm"><i class="fa fa-eye"></i></a>

					<a href="<?= base_url('admin/transaksi/cetak/'.$header->transaction_code)?>" target="_blank" title="Cetak" class="btn btn-outline-success btn-sm"><i class="fa fa-print"></i></a>

					<a href="<?= base_url('admin/transaksi/status/'.$header->transaction_code)?>" class="btn btn-outline-secondary btn-sm" title="Cek Status"><i class="fa fa-check"></i></a>

					</div>
					<div class="clearfix"></div>
					<br>

					<div class="button-group">
					<a href="<?= base_url('admin/transaksi/pdf/'.$header->transaction_code)?>" title="Unduh PDF" class="btn btn-outline-dark btn-sm"><i class="fa fa-file-pdf-o"></i></a>

					<a href="<?= base_url('admin/transaksi/kirim/'.$header->transaction_code)?>" target="_blank" title="Cetak Kirim" class="btn btn-outline-success btn-sm"><i class="fa fa-print"></i></a>

					<a href="<?= base_url('admin/transaksi/word/'.$header->transaction_code)?>" class="btn btn-outline-secondary btn-sm" title="Unduh Word"><i class="fa fa-file-word-o"></i></a>

					</div>



				</td>
				</tr>
				<?php $i++; } ?>
				</tbody>
</table>