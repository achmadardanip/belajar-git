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

	<div class="content-wraper">
		<section class="content" style="    margin-top: 30px;
        margin-left: 30px;
        margin-right: 30px;">
			<h4><strong>DETAIL DATA USER</strong></h4>
			<table class="table">
				<tr>
					<th>Nama</th>
					<td><?php echo $detail->nama; ?></td>
				</tr>
				<tr>
					<th>Email</th>
					<td><?php echo $this->encryption->decrypt($detail->email); ?></td>
				</tr>
                <tr>
					<th>Username</th>
					<td><?php echo $detail->username; ?></td>
				</tr>
				<tr>
					<th>Jenis Kelamin</th>
					<td><?php echo $detail->jenis_kelamin; ?></td>
				</tr>
				<tr>
					<th>Nomor Handphone</th>
					<td><?php echo $detail->no_hp; ?></td>
				</tr>
				<tr>
					<th>Alamat</th>
					<td><?php echo $detail->alamat; ?></td>
				</tr>
				<tr>
					<th>Foto</th>
					<!-- Menampilkan foto yang sudah diupload -->
					<td><img src="<?php echo base_url(); ?>assets/foto/<?php echo $detail->foto; ?>"
							style="position: relative; height: 60px;"></td>
				</tr>
			</table>
			<a href="<?php echo base_url('rumah/index'); ?>" class="btn btn-primary">Kembali</a>
		</section>
	</div>

	</footer>

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>
