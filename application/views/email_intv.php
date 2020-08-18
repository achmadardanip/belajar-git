<!DOCTYPE html>
<html>

<head>
	<title>Aplikasi Email Sederhana</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
			integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
			integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
		</script>
</head>

<body>
	<br />
	<div class="container">
		<div class="row">
			<div class="col-md-8" style="margin:0 auto; float:none;">
				<h3 align="center">Aplikasi Email Sederhana</h3>
				<br />
				<?php
				if($this->session->flashdata('success')){
					echo "
					<div class='alert alert-success'>
					  ".$this->session->flashdata("success")."
					</div>
					";
				}
				?>
				<?php
				if($this->session->flashdata('error')){
					echo "
					<div class='alert alert-danger'>
					  ".$this->session->flashdata("error")."
					</div>
					";
				}
				?>
				<form method="POST" action="<?php echo base_url();?>emailcontroller2/index" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>From</label>
								<input type="email" name="sender_email" class="form-control" placeholder="Masukkan email kamu"
									>
							</div>
							<div class="form-group">
								<label>To</label>
								<input type="email" name="receiver_email" class="form-control"
									placeholder="Masukkan email penerima">
							</div>
							<!-- <div class="form-group">
								<label>Password</label>
								<input type="password" name="password" class="form-control"
									placeholder="Masukkan password email kamu">
							</div> -->
							<div class="form-group">
								<label>Nama Lengkap</label>
								<input type="text" name="nama" class="form-control" placeholder="Masukkan nama lengkap"
									>
							</div>
							<div class="form-group">
								<label>Alamat</label>
								<textarea name="alamat" class="form-control" placeholder="Masukkan alamat"
									></textarea>
							</div>
							<div class="form-group">
								<label>Bahasa Pemrograman</label>
								<select name="programming_languages[]" class="form-control" multiple
									style="height: 150px">
									<option value=".NET">.NET</option>
									<option value="Kotlin">Kotlin</option>
									<option value="Flutter">Flutter</option>
									<option value="C">C</option>
									<option value="C++">C++</option>
									<option value="C#">C#</option>
									<option value="PHP">PHP</option>
									<option value="Java">Java</option>
									<option value="Pascal">Pascal</option>
									<option value="Ruby">Ruby</option>
									<option value="Python">Python</option>
									<option value="R">R</option>
									<option value="Swift">Swift</option>
									<option value="Perl">Perl</option>
									<option value="Objective-C">Objective-C</option>
									<option value="JavaScript">JavaScript</option>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Pengalaman Kerja</label>
								<select name="pengalaman" class="form-control">
									<option value="" selected disabled>-Pilih-</option>
									<option value="0-1 tahun">0-1 tahun</option>
									<option value="2-3 tahun">2-3 tahun</option>
									<option value="4-5 tahun">4-5 tahun</option>
									<option value="6-7 tahun">6-7 tahun</option>
									<option value="8-9 tahun">8-9 tahun</option>
									<option value=">10 tahun">>10 tahun</option>
								</select>
							</div>
							<div class="form-group">
								<label>Posisi</label>
								<select name="posisi" class="form-control">
									<option value="" selected disabled>-Pilih-</option>
									<option value="Web Developer">Web Developer</option>
									<option value="Mobile Apps Developer">Mobile Apps Developer</option>
									<option value="Game Developer">Game Developer</option>
									<option value="Database Administrator">Database Administrator</option>
									<option value="Data Engineer">Data Engineer</option>
									<option value="IT Infrastructure">IT Infrastructure</option>
									<option value="System Analyst">System Analyst</option>
									<option value="DevOps">DevOps</option>
									<option value="UI/UX Designer">UI/UX Designer</option>
								</select>
							</div>
							<div class="form-group">
								<label>Nomor Handphone</label>
								<input type="number" name="no_hp" class="form-control"
									onkeydown="javascript: return event.keyCode == 69 ? false : true"
									placeholder="Masukkan nomor handphone">
							</div>
							<div class="form-group">
								<label>Lampiran CV</label>
								<input type="file" name="file" class="form-control" accept=".doc,.docx, .pdf">
							</div>
							<div class="form-group">
								<label>Informasi Tambahan</label>
								<textarea name="informasi" class="form-control" placeholder="Masukkan informasi tambahan"
									></textarea>
							</div>
						</div>
					</div>
					<div class="form-group" align="center">
						<button type="submit" name="submit" class="btn btn-success">Kirim</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>

</html>
