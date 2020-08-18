<style>
h2{
	margin-top: 30px;
    margin-bottom: 20px;
	text-align: center;
}
</style>

<script>
	function resetDong() {
		const inputs = document.querySelectorAll('input');
		const select = document.querySelector('select');

		inputs.forEach(input => {
			input.value = "";
		});
		select.selectedIndex = 0;
	}

</script>

<div id="body">
<h2>TAMBAH KELAS</h2>
<!-- jika ada error maka akan ditampilkan pesan errornya di halaman ini langsung -->
<?php echo $this->session->flashdata('error_submit'); ?>
<!-- //ketika button submit di klik maka data2 akan dibawa ke method submit_tambah untuk selanjutnya di proses -->
<form action="<?php echo site_url('kelas/submit_tambah') ?>" method="post">
	<!-- disini kita membuat form untuk input kode kelas, nama kelas, dan id jurusan -->
	<div class="form-group">
		<label>Kode Kelas</label>
		<input type="text" name="kode_kelas" class="form-control" placeholder="Masukkan kode kelas" value="<?php echo set_value("kode_kelas") ? set_value("kode_kelas") : ''  ?>">
		<?php echo form_error('kode_kelas', "<span>", "</span>"); ?>
	</div>
	<div class="form-group">
		<label>Nama Kelas</label>
		<input type="text" name="nama_kelas" class="form-control" placeholder="Masukkan nama kelas" value="<?php echo set_value("nama_kelas") ? set_value("nama_kelas") : "" ?>">
		<?php echo form_error('nama_kelas', "<span>", "</span>"); ?>
	</div>
	<div class="form-group">
		<label>Nama Jurusan</label>
		<select name="nama_jurusan" class="form-control" id="exampleFormControlSelect1">
		<option value="" selected disabled>Pilih nama Jurusan</option>
		<?php
	    foreach ($data as $key => $value) {
        ?>
		<option value="<?= $value['id'] ?>"><?= $value['nama_jurusan'] ?></option>
		<?php  } ?>	
		</select>
		<?php echo form_error('nama_jurusan', "<span>", "</span>"); ?>
	</div>
	<a href="#" onclick="history.go(-1)"><button type="button" class="btn btn-secondary">Kembali</button></a>
	<button type="reset" name="reset " class="btn btn-danger" onclick="resetDong()">Reset</button>
	<button type="submit" class="btn btn-primary">Simpan</button>
</form>
</div>
