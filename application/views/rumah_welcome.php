<html>
	<head>
		<title>Welcome</title>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
		integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	</head>
	<body>
	<div class="container">
		<div class="card">
			<div class="card-header">
				<strong>Aplikasi CRUD</strong>
			</div>
			<div class="card-body">
				<center><h1>Selamat Datang</h1></center>
                <div class="col-md-12 text-center"> 
					<p align="center">Silakan registrasi atau login</p>
                    <a href="<?php echo site_url('reg/index'); ?>" class="btn btn-primary"> <i class="fa fa-user" aria-hidden="true"></i> Register</a>
				    <a href="<?php echo site_url('log/index'); ?>" class="btn btn-primary"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
                </div>
            </div>
		</div>
	</div>		
	</body>
</html>