<script>
    function resetDong() {
		const inputs = document.querySelectorAll('input');
		const textArea = document.getElementById('exampleFormControlTextarea1');
		const date = document.querySelector('input[type=date]');
		const select = document.querySelector('select');

        inputs.forEach(input => {
			input.value = "";
		});
		textArea.value = "";
		date.valueAsDate = null;
		select.selectedIndex = 0;
    }
</script>

<div class="content-wraper">
	<section class="content">
		<!-- pengulangan untuk mendapatkan semua data dr db, variabel $siswa didapat dr controller method edit dan dipanggil disini -->
		<?php foreach($siswa as $sw) { ?>
		<!-- ketika button submit diklik, maka akan menjalankan function update di controller -->
		<form action="<?php echo base_url(). 'web/update'; ?>" method="POST" enctype="multipart/form-data">
			<div class="form-group">
				<label>Nama Siswa</label>
				<input type="hidden" name="id" class="form-control" value="<?php echo $sw->id; ?>">
				<!-- disini menggunakan atribut value agar setiap field pada form sudah terisi data yang sudah diinput -->
				<input type="text" name="nama" class="form-control" value="<?php echo $sw->nama; ?>" required>
			</div>
			<div class="form-group">
				<label>Tanggal Lahir</label>
				<input type="date" name="tanggal_lahir" class="form-control" value="<?php echo $sw->tanggal_lahir; ?>" required>
			</div>
			<div class="form-group">
				<label for="exampleFormControlSelect1">Jenis Kelamin</label>
				<select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1" value="<?php echo $sw->jenis_kelamin; ?>" required>
					<option disabled>Pilih Jenis Kelamin</option>
					<option <?php if($sw->jenis_kelamin === "Laki-Laki") echo ' selected="selected"';  ?>>Laki-Laki</option>
					<option <?php if($sw->jenis_kelamin === "Perempuan") echo ' selected="selected"';  ?>>Perempuan</option>
				</select>
			</div>
			<div class="form-group">
				<label>Nomor Handphone</label>
				<input type="number" onkeydown="javascript: return event.keyCode == 69 ? false : true" name="no_hp" class="form-control" value="<?php echo $sw->no_hp; ?>" required>
			</div>
			<div class="form-group">
				<label for="exampleFormControlTextarea1">Alamat</label>
				<textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3" required><?php echo $sw->alamat; ?></textarea>
            </div>
			<!-- menambahkan form tambahan untuk email, sekolah, hobi, dan foto -->
            <div class="form-group">
				<label>Alamat Email</label>
				<input type="email" name="email" class="form-control" value="<?php echo $sw->email; ?>" required>
            </div>
            <div class="form-group">
				<label>Sekolah</label>
				<input type="text" name="sekolah" class="form-control" value="<?php echo $sw->sekolah; ?>" required>
            </div>
            <div class="form-group">
				<label>Hobi</label>
				<input type="text" name="hobi" class="form-control" value="<?php echo $sw->hobi; ?>" required>
			</div>
			<div class="form-group">
				<label>Foto</label>
				<input type="file" name="foto" class="form-control" value="<?php echo $sw->foto; ?>" required>
			</div>
			<a href="<?php echo base_url('web/index_crud'); ?>" class="btn btn-primary">Kembali</a>
			<button type="button" class="btn btn-danger" onclick="resetDong()">Reset</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
        <?php } ?>
	</section>
</div>
