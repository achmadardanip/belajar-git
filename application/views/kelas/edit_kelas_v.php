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
		const textArea = document.getElementById('exampleFormControlTextarea1');
		document.querySelector('select').selectedIndex = "0";

        inputs.forEach(input => {
			input.value = "";
		});
    }
</script>

<div id="body">
<h2>EDIT KELAS</h2>
<!-- pesan validasi error akan ditampilkan pada halaman ini -->
<?php echo $this->session->flashdata('error_submit'); ?>
<!-- ketika button submit di klik maka data2 form akan dibawa ke method submit_edit -->
<form action="<?php echo site_url('kelas/submit_edit') ?>" method="post">

	<div class="form-group">
		<label>Kode Kelas</label>
		<?php $curval =  set_value("id") ? set_value("id") : $data['id']?>
		<input type="hidden" name="id" value="<?php echo $curval ?>">
		<?php $curval =  set_value("kode_kelas") ? set_value("kode_kelas") : $data['kode_kelas']?>
		<input type="text" name="kode_kelas" class="form-control" value="<?php echo $curval  ?>" placeholder="Masukan kode kelas">
		<?php echo form_error('kode_kelas', "<span>", "</span>"); ?>
	</div>

	<div class="form-group">
		<label>Nama Kelas</label>
		<?php $curval =  set_value("nama_kelas") ? set_value("nama_kelas") : $data['nama_kelas']?>
		<input type="text" name="nama_kelas" class="form-control"  value="<?php echo $curval ?>" placeholder="Masukan nama kelas">
	</div>

	<div class="form-group">
		<label>Nama Jurusan</label>
		<?php $value =  set_value("nama_jurusan") ? set_value("nama_jurusan") : $data['id_jurusan']?>
		<select name="nama_jurusan" class="form-control" id="exampleFormControlSelect1">
		<option disabled>Pilih nama Jurusan</option>
		<?php foreach ($get as $key => $row) : ?>
		<option value="<?php echo $row['id']?>"<?php if($data['id_jurusan'] == $row['id']) echo 'selected'?>><?php echo $row['nama_jurusan']?></option>
		<?php endforeach; ?>	
		</select>
		<?php echo form_error('nama_jurusan', "<span>", "</span>"); ?>
	</div>
	<a href="#" onclick="history.go(-1)"><button type="button" class="btn btn-secondary">Kembali</button></a>
	<button type="button" class="btn btn-danger" onclick="resetDong()">Reset</button>
	<button type="submit" class="btn btn-primary">Simpan</button>
</form>
</div>

