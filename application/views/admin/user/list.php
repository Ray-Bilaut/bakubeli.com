<p>
	<a href="<?= base_url('admin/user/add') ?>" class="btn btn-info btn-md">
	<i class="fa fa-plus"> Add New User</i>
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
			<th>NAMA</th>
			<th>EMAIL</th>
			<th>USERNAME</th>
			<th>PASSWORD</th>
			<th>LEVEL</th>
			<th>OPT</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach ($user as $us) { ?>
		<tr>
			<td><?= $no  ?></td>
			<td><?= $us->name ?></td>
			<td><?= $us->email ?></td>
			<td><?= $us->username ?></td>
			<td><?= $us->password ?></td>
			<td><?= $us->access_level ?></td>
			<td>
				<a href="<?= base_url('admin/user/update/'.$us->user_id) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i>Edit</a>

				<a href="<?= base_url('admin/user/delete/'.$us->user_id) ?>" class="btn btn-danger btn-xs" onclick ="return confirm('Yakin Hapus Data Ini?')"><i class="fa fa-trash-o o"></i>Delete</a>

			</td>
			
		</tr>
	 <?php $no++;?>
        <?php } ?>
	</tbody>
</table>