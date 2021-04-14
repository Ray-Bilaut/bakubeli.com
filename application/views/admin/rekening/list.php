<p>
	<a href="<?= base_url('admin/rekening/add') ?>" class="btn btn-info btn-md">
	<i class="fa fa-plus"> Add New Rekening</i>
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
			<th>NAMA BANK</th>
			<th>NOMOR REKENING</th>
			<th>PEMILIK REKENING</th>
			<th>OPT</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach ($rekening as $rekening) { ?>
		<tr>
			<td><?= $no  ?></td>
			<td><?= $rekening->bank_name ?></td>
			<td><?= $rekening->rek_number ?></td>
			<td><?= $rekening->pemilik_rek ?></td>
			<td>
				<a href="<?= base_url('admin/rekening/update/'.$rekening->id_rekening) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i>Edit</a>

				<a href="<?= base_url('admin/rekening/delete/'.$rekening->id_rekening) ?>" class="btn btn-danger btn-xs" onclick ="return confirm('Yakin Hapus Data Ini?')"><i class="fa fa-trash-o o"></i>Delete</a>

			</td>
			
		</tr>
	 <?php $no++;?>
        <?php } ?>
	</tbody>
</table>