<html>

<head>
	<title>Form Register</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
		integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>

<body>
	<div class="container">
		<div class="card">
			<div class="card-header">
				<strong>Form Register</strong>
			</div>
			<div class="card-body">
				<!-- <//?php 
				if($this->session->flashdata('error') !='')
				{
					echo '<div class="alert alert-danger" role="alert">';
					echo $this->session->flashdata('error');
					echo '</div>';
				}
				?> -->
				<?php 
				if($this->session->flashdata('email_error') !='')
				{
					echo '<div class="alert alert-danger" role="alert">';
					echo $this->session->flashdata('email_error');
					echo '</div>';
				}
				?>
				<form method="post" action="<?php echo base_url(); ?>reg/proses" enctype="multipart/form-data">
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" class="form-control" name="username" id="Masukkan username"
							placeholder="Masukkan Username" value="<?php echo set_value("username") ? set_value("username") : ''  ?>">
							<?php echo form_error('username', "<span>", "</span>"); ?>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" name="password" id="password"
							placeholder="Massukan Password">
							<?php echo form_error('password', "<span>", "</span>"); ?>
					</div>
					<div class="form-group">
						<label for="nama">Nama</label>
						<input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan nama" value="<?php echo set_value("nama") ? set_value("nama") : ''  ?>">
						<?php echo form_error('nama', "<span>", "</span>"); ?>
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" name="email" id="nama" placeholder="Masukkan email" value="<?php echo set_value("email") ? set_value("email") : ''  ?>">
						<?php echo form_error('email', "<span>", "</span>"); ?>
					</div>
					<div class="form-group">
						<label for="no_hp">Nomor Handphone</label>
						<input type="number" class="form-control" name="no_hp" id="no_hp" placeholder="Masukkan nomor handphone" value="<?php echo set_value("no_hp") ? set_value("no_hp") : ''  ?>">
						<?php echo form_error('no_hp', "<span>", "</span>"); ?>
					</div>
					<div class="form-group">
						<label for="jenis_kelamin">Jenis Kelamin</label>
                        <label><input type="radio" name="jenis_kelamin" value="Laki-Laki" <?php echo  set_radio('jenis_kelamin', 'Laki-Laki'); ?>/> Laki-Laki</label>
                        <label><input type="radio" name="jenis_kelamin" value="Perempuan" <?php echo  set_radio('jenis_kelamin', 'Perempuan'); ?>/> Perempuan</label>
						<?php echo form_error('jenis_kelamin', "<span>", "</span>"); ?>
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<textarea name="alamat" class="form-control"
							placeholder="Masukkan alamat" value="<?php echo set_value("alamat") ? set_value("alamat") : ''  ?>"></textarea>
							<?php echo form_error('alamat', "<span>", "</span>"); ?>
					</div>
					<div class="form-group">
						<label for="foto">Foto</label>
						<input type="file" class="form-control" name="foto" id="foto">
					</div>
					<button type="submit" class="btn btn-primary">Register</button>
				</form>
			</div>
		</div>
	</div>
	<footer>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>

	<script>
  	$(function() {
    $('#password').password()

  	})
	</script>
	
</footer>
</body>

</html>