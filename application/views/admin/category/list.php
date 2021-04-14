<p>
	<a href="<?= base_url('admin/category/add') ?>" class="btn btn-info btn-md">
	<i class="fa fa-plus"> Add New Category</i>
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
			<th>NAMA KATEGORI</th>
			<th>SLUG KATEGORI</th>
			<th>URUTAN</th>
			<th>OPT</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach ($category as $cat) { ?>
		<tr>
			<td><?= $no  ?></td>
			<td><?= $cat->category_name ?></td>
			<td><?= $cat->slug_category ?></td>
			<td><?= $cat->position ?></td>
			<td>
				<a href="<?= base_url('admin/category/update/'.$cat->category_id) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i>Edit</a>

				<a href="<?= base_url('admin/category/delete/'.$cat->category_id) ?>" class="btn btn-danger btn-xs" onclick ="return confirm('Yakin Hapus Data Ini?')"><i class="fa fa-trash-o o"></i>Delete</a>

			</td>
			
		</tr>
	 <?php $no++;?>
        <?php } ?>
	</tbody>
</table>