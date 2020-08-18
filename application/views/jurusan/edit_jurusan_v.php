<style>
	h2 {
		margin-top: 30px;
		margin-bottom: 20px;
		text-align: center;
	}

</style>

<script>
    function resetDong() {
		const inputs = document.querySelectorAll('input');
		const textArea = document.getElementById('exampleFormControlTextarea1');

        inputs.forEach(input => {
			input.value = "";
		});
    }
</script>

<div id="body">
	<h2>EDIT JURUSAN</h2>
	<?php echo $this->session->flashdata('error_submit'); ?>
	<form action="<?php echo site_url('jurusan/submit_edit') ?>" method="post">

		<div class="form-group">
			<label>Kode Jurusan</label>
			<?php $curval =  set_value("id") ? set_value("id") : $data['id']?>
			<input type="hidden" name="id" value="<?php echo $curval ?>">
			<?php $curval =  set_value("kode_jurusan") ? set_value("kode_jurusan") : $data['kode_jurusan']?>
			<input type="text" name="kode_jurusan" class="form-control" value="<?php echo $curval  ?>" placeholder="Masukkan kode jurusan">
			<?php echo form_error('kode_jurusan', "<span>", "</span>"); ?>
		</div>

		<div class="form-group">
			<label>Nama Jurusan</label>
			<?php $curval =  set_value("nama_jurusan") ? set_value("nama_jurusan") : $data['nama_jurusan']?>
			<input type="text" name="nama_jurusan" class="form-control" value="<?php echo $curval ?>" placeholder="Masukkan nama jurusan">
			<?php echo form_error('nama_jurusan', "<span>", "</span>"); ?>
		</div>
		<a href="#" onclick="history.go(-1)"><button type="button" class="btn btn-secondary">Kembali</button></a>
		<button type="button" class="btn btn-danger" onclick="resetDong()">Reset</button>
		<button type="submit" class="btn btn-primary">Simpan</button>
	</form>
</div>
