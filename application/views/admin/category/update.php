<?php 
// notif error
echo validation_errors('<div class="alert alert-warning" role="alert">','</div>');
// form open
echo form_open(base_url('admin/category/update/'.$category->category_id), 'class="form-horizontal"');
?>

                    <input type="hidden" class="form-control"  name="category_id" value="<?= $category->category_id ?>">
               
                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Kategori</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control"  name="name" placeholder="Kategori" value="<?= $category->category_name ?>" required>
                    </div>
                  </div>

                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Urutan</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control"  name="urutan" placeholder="Urutan" value="<?= $category->position ?>" required>
                    </div>
                  </div>

               <!-- Button -->

                 <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                     <button class="btn btn-success" type="submit" name="submit"><li class="fa fa-save"></li>Save</button>
                      <a href="<?= base_url('admin/category/') ?>" class="btn btn-danger"><li class="fa fa-times"></li>Cancel</a>
                    </div>
                  </div>

              <!-- End Button -->
               


<?php echo form_close(); ?>