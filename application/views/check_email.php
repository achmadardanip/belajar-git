<html>
	<head>
		<title>Form Pencarian Akun</title>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
	</head>
	<body>
	<div class="container">
		<div class="card">
			<div class="card-header">
				<strong>Form Pencarian Akun</strong>
			</div>
			<div class="card-body">
				<?php 
				if($this->session->flashdata('email_send') !='')
				{
					echo '<div class="alert alert-danger" role="alert">';
					echo $this->session->flashdata('email_send');
					echo '</div>';
				}
				?>
				<?php 
				if($this->session->flashdata('email_send_error') !='')
				{
					echo '<div class="alert alert-danger" role="alert">';
					echo $this->session->flashdata('email_send');
					echo '</div>';
				}
				?>
				<?php 
				if($this->session->flashdata('email_none') !='')
				{
					echo '<div class="alert alert-danger" role="alert">';
					echo $this->session->flashdata('email_none');
					echo '</div>';
				}
				?>
 
				<form method="post" action="<?php echo base_url(); ?>forgot_pass/reset_password_validation">
					<div class="form-group">
						<label for="username">Username</label>
                        <input type="username" class="form-control" name="username" id="username" placeholder="Enter Username">
                        <!-- <//?php echo form_error('email', "<span>", "</span>"); ?> -->
					</div>
					<div class="form-group">
						<label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email">
                        <?php echo form_error('email', "<span>", "</span>"); ?>
					</div>
					<button type="submit" class="btn btn-primary">Cari</button>
				</form>
			</div>
		</div>
	</div>		
	</body>
</html>