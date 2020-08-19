<!doctype html>
<html lang="en">

<head>
	<title>Sistem Akademik Sederhana | SIS ANA</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<!-- <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"> -->
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
						<a class="nav-link" href="<?php echo site_url('rumah/lorem')?>">Home <span class="sr-only">(current)</span></a>
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
	<div class="container" style="margin-top: 60px">
		<div class="row" style="display: inline;">
			<!-- <div class="col-md-12"> -->
			<div class="card">
				<div class="card-header"><strong><?php echo $title ?></strong></div>
				<div class="card-body">
                    <div id="printbar" style="float:right;"></div>
                    <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>      
                    
                    <p>Hello world</p>
                </div>
			</div>
			<!-- </div> -->
		</div>
	</div>
	</footer>

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<!-- <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script> -->
</body>

</html>
