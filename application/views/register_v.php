
<section id="login">
	<div class="container">
		<div class="row justify-content-center mt-6">
			<div class="col-md-4">
				<div class="card">
					<div class="card-header bg-transparent mb-0">
						<h5 class="text-center">Please <span class="font-weight-bold text-primary">SIGN UP</span></h5>
					</div>
					<div class="card-body">
                    <!-- menampilkan pesan error jika form validation tidak terpenuhi -->
                    <!-- pengecekan apakah ada error pada form validation -->
                    <!-- apabila ada pesan error makaakan ditampilkan flash data error yang berisi pesan errornya -->
                    <?php 
				    if($this->session->flashdata('error') !='')
				    {
					echo '<div class="alert alert-danger" role="alert">';
					echo $this->session->flashdata('error');
					echo '</div>';
				    }
				    ?>
						<form method="POST" action="<?php echo base_url(); ?>register/register_proses">
							<div class="form-group">
								<input type="text" name="username" class="form-control" placeholder="Username" required>
							</div>
							<div class="form-group">
								<input type="password" name="password" class="form-control" placeholder="Password" required>
							</div>
							<div class="form-group">
								<input type="text" name="nama" class="form-control" placeholder="Nama" required>
							</div>
							<div class="form-group">
								<input type="submit" name="" value="Sign Up" class="btn btn-primary btn-block">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<section>
