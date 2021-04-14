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
echo form_open_multipart(base_url('admin/product/add'), 'class="form-horizontal"');
?>



<div class="form-group row">
<label for="inputEmail3" class="col-sm-2 col-form-label">Nama Produk</label>
<div class="col-sm-10">
<input type="text" class="form-control"  name="product_name" placeholder="Nama Produk" value="<?php echo set_value('product_name') ?>" required>
</div>
</div>

<div class="form-group row">
<label for="inputEmail3" class="col-sm-2 col-form-label">Kode Produk</label>
<div class="col-sm-10">
<input type="text" class="form-control"  name="product_code" placeholder="Kode Produk" value="<?php echo set_value('product_code') ?>" required>
</div>
</div>

<div class="form-group row">
<label for="inputEmail3" class="col-sm-2 col-form-label">Kategori Produk</label>
<div class="col-sm-10">
<select name="category_id" class="form-control">
<option value="NULL">-Pilih Salah Satu-</option>
<?php foreach ($kategori as $kat) { ?>
<option value="<?= $kat->category_id ?>">
<?= $kat->category_name ?>
</option>
<?php } ?>
</select>
</div>
</div>

<div class="form-group row">
<label for="inputEmail3" class="col-sm-2 col-form-label">Harga Produk</label>
<div class="col-sm-10">
<input type="number" class="form-control"  name="price" placeholder="Harga Produk" value="<?php echo set_value('price') ?>" required>
</div>
</div>

<div class="form-group row">
<label for="inputEmail3" class="col-sm-2 col-form-label">Stok Produk</label>
<div class="col-sm-10">
<input type="number" class="form-control"  name="stock" placeholder="Stok Produk" value="<?php echo set_value('stock') ?>" required>
</div>
</div>

<div class="form-group row">
<label for="inputEmail3" class="col-sm-2 col-form-label">Berat Produk</label>
<div class="col-sm-10">
<input type="text" class="form-control"  name="weight" placeholder="Berat Produk" value="<?php echo set_value('weight') ?>" required>
</div>
</div>

<div class="form-group row">
<label for="inputEmail3" class="col-sm-2 col-form-label">Ukuran Produk</label>
<div class="col-sm-10">
<input type="text" class="form-control"  name="size" placeholder="Ukuran Produk" value="<?php echo set_value('size') ?>" required>
</div>
</div>

<div class="form-group row">
<label for="inputEmail3" class="col-sm-2 col-form-label">Deskripsi Produk</label>
<div class="col-sm-10">
<textarea class="form-control" name="note" id="editor" placeholder="Deskripsi Produk"><?php echo set_value('note') ?></textarea>
</div>
</div>

<div class="form-group row">
<label for="inputEmail3" class="col-sm-2 col-form-label">Keyword Google</label>
<div class="col-sm-10">
<textarea class="form-control" name="keywords" placeholder="Keywords SEO Google"><?php echo set_value('keywords') ?></textarea>
</div>
</div>

<div class="form-group row">
<label for="inputEmail3" class="col-sm-2 col-form-label">Gambar Produk</label>
<div class="col-sm-10">
<input type="file" class="form-control" name="images" required="required">
</div>
</div>

<div class="form-group row">
<label for="inputEmail3" class="col-sm-2 col-form-label">Status Produk</label>
<div class="col-sm-10">
<select class="form-control" name="product_status">
<option value="NULL">-Pilih Salah Satu-</option>
<option value="Publish">Publikasikan</option>
<option value="Draft"> Simpan Sebagai Draft</option>
</select>
</div>
</div>







<!-- Button -->

<div class="form-group row">
<label for="inputPassword3" class="col-sm-2 col-form-label"></label>
<div class="col-sm-10">
<button class="btn btn-success" type="submit" name="submit"><li class="fa fa-save"></li>Save</button>
<a href="<?= base_url('admin/product/') ?>" class="btn btn-danger"><li class="fa fa-times"></li>Cancel</a>
</div>
</div>

<!-- End Button -->



<?php echo form_close(); ?>