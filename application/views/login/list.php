<!-- content page -->
<section class="bgred p-t-66 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 p-b-30">
					<div class="p-r-20 p-r-0-lg">
						<img src="<?= base_url('assets/upload/image/'.$site->icon) ?>" class="img img-responsive" width="350" ALT="icon-bakubeli">
					</div>
				</div>
				<small><?=validation_errors('<div class="alert alert-danger">','</div>');?></small>
				<div class="col-md-6 p-b-30">
					<!-- Validasi eror -->
					<small>
					<?php 
					//display notif error
					if ($this->session->flashdata('wrong')){ 
					
					echo $this->session->flashdata('wrong');
					
					}

					//display notif sukses logout
					if ($this->session->flashdata('not')){ 
					echo $this->session->flashdata('not');
					}

					if ($this->session->flashdata('logout')){ 
					
					echo $this->session->flashdata('logout');
					
					}

					if ($this->session->flashdata('notif')){ 

					echo '<div class="alert alert-info">';				
					echo $this->session->flashdata('notif');
					echo '</div>';
					}
					?></small>

				<h5 class="m-text26 p-b-36 p-t-15">
					Masuk Akunmu<hr>	
							
				</h5>
					
				<?= form_open(base_url('login')); ?>
						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="email" name="email" placeholder="Email" value="<?= set_value('email')?>" required="required"> <i class="fa fa-envelope"></i>
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="password" name="password" placeholder="Password" value="<?= set_value('password')?>" required="required">
						</div>
		 
						<div class="w-size25">
							<!-- Button -->
							<button class="btn btn-md btn-dark" type="submit">
							Login
						</button> 
						</div>
			<?= form_close(); ?>
					
                              <div class="text-center">
                              Lupa    <a class="text-center" href="<?= base_url('login/forgotpassword'); ?>"> Password?</a>
                              </div>
                              <div class="text-center">
                                 Belum punya akun? <a class="btn btn-sm btn-dark" href="<?= base_url('register'); ?>"> Daftar</a>
                      </div>
				</div>
			</div>
		</div>
		
	</section>




