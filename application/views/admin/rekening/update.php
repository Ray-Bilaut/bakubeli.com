<?php 
// notif error
echo validation_errors('<div class="alert alert-warning" role="alert">','</div>');
// form open
echo form_open(base_url('admin/rekening/update/'.$rekening->id_rekening), 'class="form-horizontal"');
?>

                    <input type="hidden" class="form-control"  name="id_rekening" value="<?= $rekening->id_rekening ?>">
               
                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Bank</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control"  name="bank_name" placeholder="Rekening" value="<?= $rekening->bank_name ?>" required>
                    </div>
                  </div>

                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nomor Rekening
                    </label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control"  name="rek_number" placeholder="Nomor Rekening" value="<?= $rekening->rek_number ?>" required>
                    </div>
                  </div>

                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Pemilik Rekening
                    </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control"  name="pemilik_rek" placeholder="Nama Pemilik" value="<?= $rekening->pemilik_rek ?>" required>
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