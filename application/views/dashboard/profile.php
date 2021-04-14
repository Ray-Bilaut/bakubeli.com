	<div class="alert alert-warning text-dark">
		<h5><i><strong>Hai!! <?= $this->session->userdata('customer_name'); ?></strong></i></h5>
 	</div><!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
<div class="container">
	<div class="row">
		<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
			<div class="leftbar p-r-20 p-r-0-sm">
				<!-- Menu -->
				<?php include ('menu.php'); ?>
				</div>

		</div>
		<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
				<!--  -->
		
		<h6 class="m-text22 w-size19 w-full-sm"><?= $title ?></h6>
		
		
						<!-- Profile -->
						
						<?= form_open(base_url('customer/dashboard/profile'));?>



						
						<!-- Jika eror -->
						<small><?=validation_errors('<div class="alert alert-danger">','</div>');?></small>
						<small>
						<?php if ($this->session->flashdata('pesan')){
						echo '<div class="alert alert-info">';
						echo $this->session->flashdata('pesan');
						echo '</div>';
						}
						?></small>
	
						<table class="table table-hover tabel-striped">
							<thead>
							<tr>
							<th width="50%">Nama</th>
						
							
							<th><input type="text" name="customer_name" class="form-control" placeholder="Nama" value="<?= $customer->customer_name ?>"></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Email</td>
								
								
								<td><input type="email" name="email" placeholder="Email" class="form-control" value="<?= $customer->email?>" readonly>
								</td>
							</tr>
							<tr>
								<td>Telepon</td>
								
							
								<td><input type="text" name="phone" placeholder="Telepon" class="form-control" value="<?= $customer->phone ?>" required>
								</td>
							</tr>
							<tr>
								<td>Password</td>
								<td><input type="password" name="password1" placeholder="Password" class="form-control" value="<?= set_value('password1')?>">
								<small class="text-warning">Minimal 6 karakter. Atau biarkan kosong!</small>
								</td>
							</tr>
							<tr>
								<td>Konfirmasi Password</td>
								<td><input type="password" name="password2" placeholder="Konfirmasi Password" class="form-control" value="<?= set_value('password2') ?>">
								</td>
							</tr>
							<tr>
								<td>Alamat</td>
								<td><textarea class="form-control" name="address" placeholder="Alamat"><?=$customer->address?></textarea>
								</td>
							</tr>
						</tbody>
						</table>
		
						<div class="w-size25">
							<!-- Button -->
							<button class="btn btn-md btn-dark" type="submit">
								Simpan
							</button> 
							<button class="btn btn-md btn-dark" type="reset">
								Batal
							</button> 
						</div>
					<?= form_close(); ?>
			
		</div>
	</div>
</div>
</section>