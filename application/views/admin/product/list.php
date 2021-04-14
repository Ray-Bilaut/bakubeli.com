<p>
	<a href="<?= base_url('admin/product/add') ?>" class="btn btn-info btn-md">
	<i class="fa fa-plus"> Add New Product</i>
	</a>
</p>

<?php 
// Notification
if($this->session->flashdata('Sukses')){

	echo '<p class="alert alert-info">';
	echo $this->session->flashdata('Sukses');
	echo '</div>';

}
?>

<table id="example1" class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>NO</th>
			<th>GAMBAR</th>
			<th>NAMA</th>
			<th>KATEGORI</th>
			<th>HARGA</th>
			<th>STOK</th>
			<th>STATUS</th>
			<th>OPT</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach ($product as $prod) { ?>
		<tr>
			<td><?= $no  ?></td>
			<td>
				<img src="<?= base_url('/assets/upload/image/thumbs/'.$prod->images) ?>" class="img img-responsive img-thumbnail" width="60">
			</td>
			<td><?= $prod->product_name ?></td>
			<td><?= $prod->category_name ?></td>
			<td><?= number_format($prod->price,'0',',','.') ?></td>
			<td><?= $prod->stock ?></td>
			<td><?= $prod->product_status ?></td>
			<td>

				<a href="<?= base_url('admin/product/images/'.$prod->product_id) ?>" class="btn btn-info btn-xs"><i class="fa fa-image"></i>Gambar (<?= $prod->total_images ?>)</a>

				<a href="<?= base_url('admin/product/update/'.$prod->product_id) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i>Edit</a>

				<?php include('delete.php') ?>
			</td>
			
		</tr>
	 <?php $no++;?>
        <?php } ?>
	</tbody>
</table>