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
	<div class="container">
		<div class="card mt-5">
			<div class="card-header">
				Form Edit
			</div>
			<div class="card-body">
				<?php 
					if($this->session->flashdata('email_error') !='')
					{
						echo '<div class="alert alert-danger" role="alert">';
						echo $this->session->flashdata('email_error');
						echo '</div>';
					}
				?>
				<?php 
					if($this->session->flashdata('pass_error') !='')
					{
						echo '<div class="alert alert-danger" role="alert">';
						echo $this->session->flashdata('pass_error');
						echo '</div>';
					}
				?>
                <form method="post" action="<?php echo base_url(); ?>rumah/update" enctype= multipart/form-data>
                    <div class="form-group">
						<label for="nama">Nama</label>
						<?php $curval =  set_value("id") ? set_value("id") : $edit->id?>
                        <input type="hidden" name="id" class="form-control" value="<?php echo $curval ?>">
						<?php $curval =  set_value("nama") ? set_value("nama") : $edit->nama?>
						<input type="text" class="form-control" name="nama" id="nama"
							value="<?php echo $curval ?>" placeholder="Masukkan nama">
                            <?php echo form_error('nama'); ?>
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="hidden" class="form-control" name="email_hidden" id="hidden"
							value="<?php echo $this->encryption->decrypt($edit->email) ?>">
						<input type="email" class="form-control" name="email" id="email"
							value="<?php echo $this->encryption->decrypt($edit->email) ?>" placeholder="Masukkan alamat email">
                            <?php echo form_error('email'); ?>
					</div>
					<div class="form-group">
						<label for="username">Username</label>
						<?php $curval =  set_value("username") ? set_value("username") : $edit->username?>
						<input type="text" class="form-control" name="username" id="username" value="<?php echo $curval ?>" placeholder="Masukkan username">
                        <?php echo form_error('username'); ?>
					</div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <label><input type="radio" name="jenis_kelamin" id="laki-laki" value="Laki-Laki"<?php echo ($edit->jenis_kelamin == 'Laki-Laki' ? ' checked' : ''); ?>> Laki-Laki</label>
                        <label><input type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan"<?php echo ($edit->jenis_kelamin == 'Perempuan' ? ' checked' : ''); ?>> Perempuan</label>
                    </div>
                    <?php echo form_error('jenis_kelamin'); ?>
                    <div class="form-group">
						<label for="no_hp"><strong>Nomor Handphone</strong></label>
						<?php $curval =  set_value("no_hp") ? set_value("no_hp") : $edit->no_hp?>
						<input type="number" class="form-control" name="no_hp" id="no_hp" value="<?php echo $curval ?>" placeholder="Masukkan nomor handphone">
					</div>
                    <?php echo form_error('no_hp'); ?>
                    <div class="form-group">
						<label><strong>Alamat</strong></label>
						<?php $curval =  set_value("alamat") ? set_value("alamat") : $edit->alamat?>
						<textarea name="alamat" id="textarea" class="form-control" placeholder="Masukkan alamat"><?php echo $curval?></textarea>
					</div>
                    <?php echo form_error('alamat'); ?>
					<div class="form-group">
						<label for="foto"><strong>Foto</strong></label>
						<input type="file" class="form-control" name="foto" id="foto">
						<input type="hidden" name="old_image" value="<?php echo $edit->foto;?>">
					</div>
                    <a href="<?php echo site_url('rumah')?>"><button type="button" class="btn btn-secondary">Kembali</button></a>
					<button type="button" class="btn btn-danger" onclick="resetDong()">Reset</button>
					<button type="submit" name="submit" class="btn btn-primary">Edit</button>
				</form>
			</div>
		</div>
	</div>
    </footer>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<script>
    function resetDong() {
		const inputs = document.querySelectorAll('input');
		const textArea = document.getElementById('textarea');
		const radio = document.querySelector('input[type=radio]');
		const jk_m = document.getElementById('laki-laki');
		const jk_f = document.getElementById('perempuan');
		// const file = document.querySelector('file');

        inputs.forEach(input => {
			input.value = "";
		});
		jk_m.value="";
		jk_f.value="";
		textArea.value = "";
		radio.valueAsDate = null;
		// select.selectedIndex = 0;
    }
</script>
</body>

</html>
