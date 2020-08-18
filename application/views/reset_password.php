<html>
	<head>
		<title>Form Reset Password</title>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
		integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	</head>
	<body>
	<div class="container">
		<div class="card">
			<div class="card-header">
				<strong>Form Reset Password</strong>
			</div>
			<div class="card-body">
				<?php 
				if($this->session->flashdata('pass_change_error') !='')
				{
					echo '<div class="alert alert-danger" role="alert">';
					echo $this->session->flashdata('pass_change_error');
					echo '</div>';
				}
				?>
 
				<form method="post" action="<?php echo base_url(); ?>forgot_pass/change_password_validation">
                    <div class="form-group">
						<label for="reset_key">Reset Key</label>
                        <input type="text" class="form-control" name="reset_key" id="reset_key" placeholder="Masukkan reset key">
                        <?php echo form_error('reset_key', "<span>", "</span>"); ?>
					</div>
                    <div class="form-group">
						<label for="password">Password Baru</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan password Baru">
                        <?php echo form_error('password', "<span>", "</span>"); ?>
					</div>
                    <div class="form-group">
						<label for="retype_password">Konfirmasi Password</label>
						<input type="password" class="form-control" name="retype_password" id="retype_password" placeholder="Ketik ulang password baru">
                        <?php echo form_error('retype_password', "<span>", "</span>"); ?>
                    </div>
					<button type="submit" class="btn btn-primary">Save Password</button>
				</form>
			</div>
		</div>
	</div>
	<footer>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
	
	<script>
  		$(function() {
    	$('#password').password();
		$('#retype_password').password();
  		})
	</script>
	</footer>	
	</body>
</html>