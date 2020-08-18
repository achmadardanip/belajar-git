
<section id="login">
	<div class="container">
		<div class="row justify-content-center mt-6">
			<div class="col-md-4">
				<div class="card">
					<div class="card-header bg-transparent mb-0">
						<h5 class="text-center">Please <span class="font-weight-bold text-primary">LOGIN</span></h5>
					</div>
					<div class="card-body">
					<!-- menampilkan pesan error jika username sama password salah -->
					<?php 
					if($this->session->flashdata('error') !='')
					{
					echo '<div class="alert alert-danger" role="alert">';
					echo $this->session->flashdata('error');
					echo '</div>';
					}
					?>
					<!-- menampilkan pesan jika berhasil registrasi -->
					<?php 
					if($this->session->flashdata('success_register') !='')
					{
					echo '<div class="alert alert-info" role="alert">';
					echo $this->session->flashdata('success_register');
					echo '</div>';
					}
					?>
					<!-- jika button submit di klik maka data2 inputan akan dikirim ke method login_successful -->
						<form method="POST" action="<?php echo site_url('login/login_success') ?>">
							<div class="form-group">
								<input type="text" name="username" class="form-control" placeholder="Username" required>
							</div>
							<div class="form-group">
								<input type="password" name="password" class="form-control" placeholder="Password" required>
							</div>
							<div class="form-group custom-control custom-checkbox">
								<input type="checkbox" name="remember" class="custom-control-input" id="customControlAutosizing">
								<label class="custom-control-label" for="customControlAutosizing">Remember me</label>
							</div>
							<div class="form-group">
								<input type="submit" name="" value="Login" class="btn btn-primary btn-block">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
	<?php echo validation_errors('<div class="error">', '</div>'); ?>
<section>
