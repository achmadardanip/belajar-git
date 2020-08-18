<style>
h2{
	margin-top: 30px;
    margin-bottom: 20px;
	text-align: center;
}
</style>

<h2>TAMBAH JURUSAN</h2>
<?php echo $this->session->flashdata('error_submit'); ?>
<div id="body">
<form action="<?php echo site_url('jurusan/submit_tambah') ?>" method="post">
	<div class="form-group">
		<label>Kode Jurusan</label>
		<input type="text" name="kode_jurusan" class="form-control" placeholder="Masukkan kode jurusan" value="<?php echo set_value("kode_jurusan") ? set_value("kode_jurusan") : ''  ?>">
		<?php echo form_error('kode_jurusan', "<span>", "</span>"); ?>
	</div>
	<div class="form-group">
		<label>Nama Jurusan</label>
		<input type="text" name="nama_jurusan" class="form-control" placeholder="Masukkan nama jurusan" value="<?php echo set_value("nama_jurusan") ? set_value("nama_jurusan") : ''  ?>">
		<?php echo form_error('nama_jurusan', "<span>", "</span>"); ?>
	</div>
	<a href="#" onclick="history.go(-1)"><button type="button" class="btn btn-secondary">Kembali</button></a>
	<button type="reset" name="reset " class="btn btn-danger" onclick="resetDong()">Reset</button>
	<button type="submit" class="btn btn-primary">Simpan</button>
</form>
</div>
