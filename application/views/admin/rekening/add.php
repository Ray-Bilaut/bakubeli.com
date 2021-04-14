<?php 
// notif error
echo validation_errors('<div class="alert alert-warning" role="alert">','</div>');
// form open
echo form_open(base_url('admin/rekening/add'), 'class="form-horizontal"');
?>

     
               
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Bank</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control"  name="bank_name" placeholder="Nama Bank" value="<?php echo set_value('bank_name') ?>" required>
                    </div>
                  </div>

                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nomor Rekening</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control"  name="rek_number" placeholder="Nomor Rekening" value="<?php echo set_value('rek_number') ?>" required>
                    </div>
                  </div>

                    <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Pemilik Rekening</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control"  name="pemilik_rek" placeholder="Pemilik Rekening" value="<?php echo set_value('pemilik_rek') ?>" required>
                    </div>
                  </div>

               <!-- Button -->

                 <div class="form-group row">
                 	<label for="inputPassword3" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                     <button class="btn btn-success" type="submit" name="submit"><li class="fa fa-save"></li>Save</button>
                       <a href="<?= base_url('admin/rekening/') ?>" class="btn btn-danger"><li class="fa fa-times"></li>Cancel</a>
                    </div>
                  </div>

             <!-- End Button -->
               


<?php echo form_close(); ?>