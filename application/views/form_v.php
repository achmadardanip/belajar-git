<section class="about" style="margin-top: -30px;">
	<h1><?php echo $title ?></h1>
	<br>
	<!-- memanggil method validation_errors untuk menampilkan pesan error pada halaman form -->
	<?php echo validation_errors(); ?>

	<!-- membuat form dengan method post
	form ini akan dikirim melalui route http verb ke method aboutme pada controller web
	menambahkan atribut enctype untuk mengatur bagaimana data di encoded saat dikirim ke server
	multipart/form-data = value ini dipakai saat ada input type file di form kita/untuk membawa data -->
	<form method="POST" action="<?php echo site_url('dataforminput'); ?>" enctype="multipart/form-data">
		<div class="form-group row">
			<label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
			<div class="col-sm-3">
				<input name="nama" type="text" class="form-control" id="inputPassword3" placeholder="Nama" required>
			</div>
		</div>
		<div class="form-group row">
			<label for="inputPassword3" class="col-sm-2 col-form-label">Tanggal Lahir</label>
			<div class="col-sm-3">
				<input name="tgl_lahir" type="date" class="form-control" id="inputPassword3" placeholder="Tahun Lahir" required>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-sm-2"><b>Jenis Kelamin</b></div>
			<div class="col-sm-10">
				<div class="form-check form-check-inline">
					<input name="jeniskelamin" class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
						value="Laki-Laki" required>
					<label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
				</div>
				<div class="form-check form-check-inline">
					<input name="jeniskelamin" class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
						value="Perempuan" required>
					<label class="form-check-label" for="inlineRadio2">Perempuan</label>
				</div>
			</div>
		</div>
		<div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">No HP</label>
			<div class="col-sm-3">
				<input name="nohp" type="text" class="form-control" id="inputPassword3" placeholder="Nomor Handphone" required>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-sm-2"><b>Alamat</b></div>
			<div class="col-sm-3">
			<textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" placeholder="Alamat" rows="2" required></textarea>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-sm-2"><b>Foto Kamu</b></div>
			<div class="col-sm-3">
			<input name="file" type="file"/>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-sm-3">
				<button type="submit" class="btn btn-primary">Input</button>
                <!-- <button type="submit" class="btn btn-primary" onclick="<?php echo base_url(). '/web/cek_kuki'?>">Cek Cookie</button> -->
			</div>
		</div>
	</form>
</section>
