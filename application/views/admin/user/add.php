<?php 
// notif error
echo validation_errors('<div class="alert alert-warning" role="alert">','</div>');
// form open
echo form_open(base_url('admin/user/add'), 'class="form-horizontal"');
?>

     
               
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Fullname</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control"  name="name" placeholder="Fullname" value="<?php echo set_value('name') ?>" required>
                    </div>
                  </div>

                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control"  name="email" placeholder="Email" value="<?php echo set_value('email') ?>" required>
                    </div>
                  </div>

                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo set_value('username') ?>" required>
                    </div>
                  </div>

                
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="inputPassword3" name="password" placeholder="Password" required>
                    </div>
                  </div>

                    <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Access Level</label>
                    <div class="col-sm-10">
                     <select name="access_level" class="form-control">
                     	<option value="-">Nothing Selected</option>
                     	<option value="Admin">Admin</option>
                     	<option value="User">User</option>
                    </select>
                    </div>
                  </div>

               <!-- Button -->

                 <div class="form-group row">
                 	<label for="inputPassword3" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                     <button class="btn btn-success" type="submit" name="submit"><li class="fa fa-save"></li>Save</button>
                     <a href="<?= base_url('admin/user') ?>" class="btn btn-danger"><li class="fa fa-times"></li>Cancel</a>
                    </div>
                  </div>

             <!-- End Button -->
               


<?php echo form_close(); ?>