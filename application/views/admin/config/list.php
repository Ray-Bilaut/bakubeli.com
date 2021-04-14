<?php 
if (isset($error)) {
  echo '<p class="alert alert-warning">';
  echo $error;
  echo '</p>';
}
?>
<?php 
// Notification
if($this->session->flashdata('Sukses')){

  echo '<p class="alert alert-info">';
  echo $this->session->flashdata('Sukses');
  echo '</div>';

}
?>
<?php 
// notif error
echo validation_errors('<div class="alert alert-warning" role="alert">','</div>');
// form open
echo form_open_multipart(base_url('admin/config'), 'class="form-horizontal"');
?>


     
               
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Website</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control"  name="web_name" placeholder="Nama Website" value="<?= $config->webname ?>" required>
                    </div>
                  </div>

                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Tagline</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control"  name="tagline" placeholder="Tagline" value="<?= $config->tagline ?>" required>
                    </div>
                  </div>

                    <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control"  name="email" placeholder="Email" value="<?= $config->email ?>" required>
                    </div>
                  </div>

                    <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Website</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control"  name="website" placeholder="Website" value="<?= $config->website ?>" required>
                    </div>
                  </div>

                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Facebook</label>
                    <div class="col-sm-10">
                      <input type="url" class="form-control"  name="facebook" placeholder="Facebook" value="<?= $config->facebook ?>" required>
                    </div>
                  </div>

                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Instagram</label>
                    <div class="col-sm-10">
                      <input type="url" class="form-control"  name="instagram" placeholder="Instagram" value="<?= $config->instagram ?>" required>
                    </div>
                  </div>

                    <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Telepon/HP</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control"  name="phone" placeholder="Telepon/HP" value="<?= $config->phone ?>" required>
                    </div>
                  </div>

                <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Alamat Kantor</label>
                <div class="col-sm-10">
                <textarea class="form-control" name="address" placeholder="Alamat Kantor"><?= $config->address ?></textarea>
                </div>
                </div>
                    
                <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Keyword Google</label>
                <div class="col-sm-10">
                <textarea class="form-control" name="keywords" placeholder="Keywords SEO Google"><?= $config->keywords ?></textarea>
                </div>
                </div>

                  <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Metatext</label>
                <div class="col-sm-10">
                <textarea class="form-control" name="metatext" placeholder="Metatext"><?= $config->metatext ?></textarea>
                </div>
                </div>

                  <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Deskripsi</label>
                <div class="col-sm-10">
                <textarea class="form-control" name="description" placeholder="Deskripsi"><?= $config->description ?></textarea>
                </div>
                </div>

                  <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Rekening Pembayaran</label>
                <div class="col-sm-10">
                <textarea class="form-control" name="payment_number" placeholder="Rekening Pembayaran"><?= $config->payment_number ?></textarea>
                </div>
                </div>



               



                  
                  

               <!-- Button -->

                 <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                     <button class="btn btn-success" type="submit" name="submit"><li class="fa fa-save"></li>Kirim</button>
                       <a href="<?= base_url('admin/dashboard')  ?>" class="btn btn-danger"><li class="fa fa-times"></li>Batal</a>
                    </div>
                  </div>

             <!-- End Button -->
               


<?php echo form_close(); ?>