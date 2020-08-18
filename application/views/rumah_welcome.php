<html>
	<head>
		<title>Welcome</title>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
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
                    <a href="<?php echo site_url('reg/index'); ?>" class="btn btn-primary">Register</a>
				    <a href="<?php echo site_url('log/index'); ?>" class="btn btn-primary">Login</a>
                </div>
            </div>
		</div>
	</div>		
	</body>
</html>