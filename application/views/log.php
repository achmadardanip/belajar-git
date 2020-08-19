<html>
	<head>
		<title>Form Login</title>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
		integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	</head>
	<body>
	<div class="container">
		<div class="card">
			<div class="card-header">
				<strong>Form Login</strong>
			</div>
			<div class="card-body">
				<?php 
				if($this->session->flashdata('error') !='')
				{
					// echo '<div class="alert alert-danger" role="alert">';
					echo $this->session->flashdata('error');
					// echo '</div>';
				}
				?>
 
				<?php 
				if($this->session->flashdata('success_register') !='')
				{
					echo '<div class="alert alert-info" role="alert">';
					echo $this->session->flashdata('success_register');
					echo '</div>';
				}
				?>
				<?php 
				if($this->session->flashdata('pass_successful') !='')
				{
					echo '<div class="alert alert-info" role="alert">';
					echo $this->session->flashdata('pass_successful');
					echo '</div>';
					$this->session->sess_destroy();
				}
				?>

				<?php 
				if($this->session->flashdata('pass_change_success') !='')
				{
					echo '<div class="alert alert-info" role="alert">';
					echo $this->session->flashdata('pass_change_success');
					echo '</div>';
				}
				?>
				<form method="post" action="<?php echo base_url(); ?>log/proses">
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" class="form-control" name="username" id="username" placeholder="Enter Username">
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" name="password" id="password" placeholder="Password">
					</div>
					<button type="submit" class="btn btn-primary">Login</button>
					<?php echo "|" ?>
					<a href="<?php echo site_url('reg')?>">Belum punya akun?</a>
					<?php echo "|" ?>
					<a href="<?php echo site_url('forgot_pass')?>">Lupa Password?</a>
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
    		$('#password').password()
  			})
		</script>
	</footer>
	</body>
</html>