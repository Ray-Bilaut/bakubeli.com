<!-- content page -->
	
	<section class="bgred p-t-66 p-b-60">
	
		<div class="container">
			<div class="row">
				<div class="col-md-6 p-b-30">
					<div class="p-r-20 p-r-0-lg">
						<img src="<?= base_url('assets/templates/images/bg.jpg') ?>" class="img img-responsive" width="350" ALT="icon-bakubeli">
					</div>
				</div>
			
				<div class="col-md-6 p-b-30">
						<?php if ($this->session->flashdata('pesan')){
						echo $this->session->flashdata('pesan');
					}
					?>
				<h5 class="m-text26 p-b-36 p-t-15">
					Daftar Akunmu<hr>	<!-- Jika berhasil -->
					
				</h5>
				
					
					<?= form_open(base_url('register'));?>
						
						<!-- Jika eror -->
						<small><?=validation_errors('<div class="alert alert-danger">','</div>');?></small>
						
						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="customer_name" placeholder="Nama Lengkap" value="<?= set_value('customer_name')?>" required="required">
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="phone" placeholder="Telepon" value="<?= set_value('phone')?>" required="required"><li class="fa fa-phone"></li>
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="email" name="email" placeholder="Email" value="<?= set_value('email')?>" required="required"> <li class="fa fa-envelope"></li>
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="password" name="password1" placeholder="Password" value="<?= set_value('password1')?>" required="required">
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="password" name="password2" placeholder="Konfirmasi Password" value="<?= set_value('password2')?>" required="required">
						</div>
		 
				<!-- 	<textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" name="address" placeholder="Alamat"></textarea> -->
				
						<div class="w-size25">
							<!-- Button -->
							<button class="btn btn-md btn-dark" type="submit">
								Daftar
							</button> 
						</div>
					<?= form_close(); ?>
				
                              <div class="text-center">
                              Lupa    <a class="text-center" href="<?= base_url('login/forgotpassword'); ?>"> Password?</a>
                              </div>
                              <div class="text-center">
                                 Sudah punya akun? <a class="btn btn-sm btn-dark" href="<?= base_url('login'); ?>"> Login</a>
                      </div>
				</div>
			</div>
		</div>
	</section>




