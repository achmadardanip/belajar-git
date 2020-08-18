<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Aplikasi Homepage Sederhana</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
</head>

<body>
	<div id="wraper">
		<header>
			<nav class="navbar navbar-light" style="background-color: #0b60b4">
				<div class="container-fluid">
					<div class="navbar-header">
						<a class="navbar-brand" href="#">adw.co.id</a>
					</div>
					<ul class="nav navbar-nav">
						<li class="active"><a href="<?php echo site_url('web') ?>">Home</a></li>
						<li style="color: white;"><a href="<?php echo site_url('web/about') ?>">About</a></li>
						<li style="color: white;"><a href="<?php echo site_url('web/calculator') ?>">Calculator</a></li>
						<li style="color: white;"><a href="<?php echo site_url('web/index_crud') ?>">CRUD</a></li>

                    </ul>
                    <ul class="nav navbar-nav navbar-right">
						<li><a href="<?php echo base_url().'register' ?>"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      					<li><a href="<?php echo base_url().'login/index' ?>"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
					</ul>
                    
				</div>
			</nav>
			<div class="clear"></div>
		</header>
