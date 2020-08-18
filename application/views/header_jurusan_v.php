<!DOCTYPE html>
<html lang="en">
<html>

<head>
	<title>Sistem Akademik Sederhana | SIS ANA</title>
	
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>"  crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-grid.min.css') ?>"  crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap-table/dist/bootstrap-table.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/fontawesome-5.14.0/css/fontawesome.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/jquery.resizableColumns.css') ?>">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<script src="<?php echo base_url('assets/js/jquery.min.js') ?>" crossorigin="anonymous"></script>
	<script src="<?php echo base_url('assets/js/popper.min.js') ?>" crossorigin="anonymous"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>" crossorigin="anonymous"></script>


	<style>
		#body {
            padding-bottom: 40px;
            padding-left: 10px;
            padding-right: 10px;
		}

        /* #footer{
            background: #f0f0f0;
            position: absolute;
            bottom: 0;
            width: 100%;
            text-align: center;
            color: #808080;
        } */

        /* html,body{
        margin:0;
        padding:0;
        height:100%;
        } */

        /* #wrapper{
        min-height:100%;
        margin-bottom: -50px; */
         */



	</style>

</head>

<body>
	<div style="padding: -10px">
		<!-- <h1>Sistem Akademik Sederhana</h1> -->

		<div content="wraper">
			<div id="header">
				<nav class="navbar navbar-expand-lg navbar-light bg-light">
					<a class="navbar-brand" href="#">Sistem Akademik Sederhana</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
						aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarNavDropdown">
						<ul class="navbar-nav">
							<li class="nav-item active">
								<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
									data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Data
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
									<a class="dropdown-item" href="<?php echo site_url('jurusan') ?>">Lihat Jurusan</a>
									<a class="dropdown-item" href="<?php echo site_url('kelas')?>">Lihat Kelas</a>
								</div>
							</li>
						</ul>
					</div>
			</div>
			</nav>
