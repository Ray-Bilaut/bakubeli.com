<?php 
if (isset($error)) {
  echo '<p class="alert alert-warning">';
  echo $error;
  echo '</p>';
}
?>
<?php 
// notif error
echo validation_errors('<div class="alert alert-warning" role="alert">','</div>');
// form open
echo form_open_multipart(base_url('admin/product/images/'.$product->product_id), 'class="form-horizontal"');
?>

     
               
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Judul Gambar</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control"  name="images_title" placeholder="Judul Gambar" value="<?php echo set_value('images_title') ?>" required>
                    </div>
                  </div>

                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Upload Gambar</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-control"  name="images" placeholder="Gambar" value="<?php echo set_value('images') ?>" required>
                    </div>
                  </div>

                  <div class="form-group row">
                 	<label for="inputPassword3" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                     <button class="btn btn-success" type="submit" name="submit"><li class="fa fa-save"></li>Upload Gambar</button>
                       <button class="btn btn-danger" type="reset"><li class="fa fa-times"></li>Cancel</button>
                    </div>
                  </div>

<?= form_close(); ?>   

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
			<th>JUDUL</th>
			<th>OPT</th>
		</tr>
	</thead>
	<tbody>
		
		<tr>
			<td>1</td>
			<td>
				<img src="<?= base_url('/assets/upload/image/thumbs/'.$product->images) ?>" class="img img-responsive img-thumbnail" width="60">
			</td>
			<td><?= $product->product_name ?></td>
			
			
			<td>
  		</td>
			
		</tr>

		<?php $no=2; foreach ($images as $img) { ?>
		<tr>
			<td><?= $no  ?></td>
			<td>
				<img src="<?= base_url('/assets/upload/image/thumbs/'.$img->images) ?>" class="img img-responsive img-thumbnail" width="60">
			</td>
			<td><?= $img->images_title ?></td>
			
			
			<td>

			
				<a href="<?= base_url('admin/product/delete_img/'.$img->product_id).'/'.$img->images_id ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Ingin Hapus Gambar Ini?')><i class="fa fa-trash-o"></i>Hapus</a>

				
			</td>
			
		</tr>
	 <?php $no++;?>
        <?php } ?>
	</tbody>
</table>        