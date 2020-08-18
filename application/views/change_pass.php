<html>
	<head>
		<title>Form Login</title>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
	</head>
	<body>
	<div class="container">
		<div class="card">
			<div class="card-header">
				Form Ganti Password
			</div>
			<div class="card-body">
				<?php 
				if($this->session->flashdata('pass_error') !='')
				{
					echo '<div class="alert alert-danger" role="alert">';
					echo $this->session->flashdata('pass_error');
					echo '</div>';
				}
				?>
 
				<form method="post" action="<?php echo base_url(); ?>pass_change/proses">
					<div class="form-group">
						<label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Enter Username">
                        <?php echo form_error('username', "<span>", "</span>"); ?>
					</div>
					<div class="form-group">
						<label for="old-password">Password Lama</label>
                        <input type="password" class="form-control" name="old-password" id="password" placeholder="Password Lama">
                        <?php echo form_error('old-password', "<span>", "</span>"); ?>
					</div>
                    <div class="form-group">
						<label for="nwe-password">Password Baru</label>
                        <input type="password" class="form-control" name="new-password" id="password" placeholder="Password Baru">
                        <?php echo form_error('new-password', "<span>", "</span>"); ?>
					</div>
                    <div class="form-group">
						<label for="conf-password">Konfirmasi Password</label>
						<input type="password" class="form-control" name="conf-password" id="password" placeholder="Konfirmasi Password">
                        <?php echo form_error('conf-password', "<span>", "</span>"); ?>
                    </div>
					<button type="submit" class="btn btn-primary">Save Password</button>
				</form>
			</div>
		</div>
	</div>		
	</body>
</html>