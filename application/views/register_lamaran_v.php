<html>

<head>
	<title>Form Register</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
</head>

<body>
	<div class="container">
		<div class="card mt-5">
			<div class="card-header">
				Form Register
			</div>
			<div class="card-body">
				<?php 
				if($this->session->flashdata('error') !='')
				{
					echo '<div class="alert alert-danger" role="alert">';
					echo $this->session->flashdata('error');
					echo '</div>';
				}
				?>
                <form method="post" action="<?php echo base_url(); ?>register_lamaran/proses">
                    <div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" name="email" id="email"
							placeholder="Enter Email">
					</div>
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" class="form-control" name="username" id="username"
							placeholder="Enter Username">
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" name="password" id="password"
							placeholder="Password">
					</div>
					<div class="form-group">
						<label for="nama">Nama</label>
						<input type="text" class="form-control" name="nama" id="nama" placeholder="Nama">
                    </div>
					<button type="submit" name="submit" class="btn btn-primary">Register</button>
				</form>
			</div>
		</div>
	</div>
</body>

</html>