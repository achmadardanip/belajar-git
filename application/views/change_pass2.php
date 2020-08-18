<!doctype html>
<html lang="en">

<head>
	<title>Sistem Akademik Sederhana | SIS ANA</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
		integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="<//?php echo base_url('assets/js/bootstrap.min.js') ?>" crossorigin="anonymous"></script> -->

</head>

<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
			<a class="navbar-brand" href="#">Sistem Akademik Sederhana</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
				aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavDropdown">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item dropdown active">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
							aria-haspopup="true" aria-expanded="false">
							Data
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="<?php echo site_url('rumah') ?>">Data Siswa</a>
							<!-- <a class="dropdown-item" href="#">Another action</a>
							<a class="dropdown-item" href="#">Something else here</a> -->
						</div>
                    </li>
                    <li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
							aria-haspopup="true" aria-expanded="false">
							Profil
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="<?php echo site_url('rumah/detail_profil') ?>">Detail Profil</a>
							<a class="dropdown-item" href="<?php echo site_url('pass_change') ?>">Ganti Password</a>
							<!-- <a class="dropdown-item" href="#">Another action</a>
							<a class="dropdown-item" href="#">Something else here</a> -->
						</div>
                        <li class="nav-item">
							<a class="nav-link" href="<?php echo site_url('log/logout')?>">Logout <span class="sr-only">(current)</span></a>
						</li>
					</li>
				</ul>
			</div>
		</nav>
	</header>
	<div class="container">
		<div class="card mt-5">
			<div class="card-header">
				<strong>Form Ganti Password</strong>
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
				<?php 
				// var_dump($this->session);
				if($this->session->flashdata('pass_successful') !='')
				{
					echo '<div class="alert alert-info" role="alert">';
					echo $this->session->flashdata('pass_successful');
					echo '</div>';
				}
				?>
                <form method="post" action="<?php echo base_url(); ?>pass_change/proses">
                    <div class="form-group">
                        <label for="old-password">Password Lama</label>
                        <input type="password" name="old-password" class="form-control" id="password" placeholder="Masukkan password lama">
                        <?php echo form_error('old-password'); ?>
                    </div>
                    <div class="form-group">
						<label for="new-password">Password Baru</label>
						<input type="password" class="form-control" name="new-password" id="new-password" placeholder="Masukkan password baru">
                        <?php echo form_error('new-password'); ?>
                    </div>
                    <div class="form-group">
						<label for="conf-password">Konfirmasi Password</label>
						<input type="password" class="form-control" name="conf-password" id="conf-password" placeholder="Ketik ulang password baru">
                        <?php echo form_error('conf-password'); ?>
					</div>
					
                    <a href="<?php echo site_url('rumah')?>"><button type="button" class="btn btn-secondary">Kembali</button></a>
					<button type="submit" name="submit" class="btn btn-primary">Save Password</button>
				</form>
			</div>
		</div>
	</div>
    </footer>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>

<script>
  $(function() {
    $('#password').password();
	$('#new-password').password();
	$('#conf-password').password();

  })
</script>
</footer>
</body>

</html>
