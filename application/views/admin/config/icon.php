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
echo form_open_multipart(base_url('admin/config/icon'), 'class="form-horizontal"');
?>


     
               
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Website</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control"  name="webname" placeholder="Nama Website" value="<?= $config->webname ?>" required>
                    </div>
                  </div>

                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Upload Icon Baru</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-control"  name="icon" placeholder="Upload Icon Baru" value="<?= $config->icon ?>" required>
                     
                      Icon Lama: <br><img src="<?= base_url('assets/upload/image/'.$config->icon) ?>" class="img img-responsive img-thumbnail" width="200">
                    </div>
                  </div>

                            
                             

               <!-- Button -->

                 <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                     <button class="btn btn-success" type="submit" name="submit"><li class="fa fa-save"></li>Save</button>
                       <button class="btn btn-danger" type="reset"><li class="fa fa-times"></li>Cancel</button>
                    </div>
                  </div>

             <!-- End Button -->
               


<?php echo form_close(); ?>