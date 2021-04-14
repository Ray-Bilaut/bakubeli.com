	<!-- Header -->
	<header class="header1">
		<!-- Header desktop -->
		<div class="container-menu-header">
			<div class="topbar bg-warning">
				<div class="topbar-social">
					<a href="<?= $site->facebook?>" class="topbar-social-item fa fa-facebook"></a>
					<a href="<?= $site->instagram?>" class="topbar-social-item fa fa-instagram"></a>
					
					</div>

				<span class="topbar-child1 text-light">
					<img src="<?= base_url('assets/upload/image/'.$site->logo); ?>" alt="<?= $site->webname?>|<?= $site->tagline ?>" width="90">

				</span>

				<div class="topbar-child2">
					<span class="topbar-email">
					<i class="fa fa-envelope"></i><?=$site->email?>
					</span>

					<div class="topbar-language rs1-select2">
						<select class="selection-1" name="time">
							<i class="fa fa-phone"></i><option><?=$site->phone?></option>
							<option><?=$site->email?></option>
						</select>
					</div>
				</div>
			</div>