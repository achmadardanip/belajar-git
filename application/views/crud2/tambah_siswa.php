<div class="container" style="margin-top: 30px">
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<div class="card">
				<div class="card-header"><strong>TAMBAH SISWA</strong></div>
				<div class="card-body">
					<form method="POST" action="<?php echo site_url('siswa/simpan')?>">
						<div class="form-group">
							<label style="float: left;">NISN</label>
							<input type="number" name="nisn" class="form-control" onkeydown="javascript: return event.keyCode == 69 ? false : true" placeholder="Masukkan NISN" required>
                            <?php echo form_error('nisn'); ?>
                        </div>
						<div class="form-group">
							<label style="float: left;">Nama Lengkap</label>
							<input type="text" name="nama_siswa" class="form-control" placeholder="Masukkan Nama Siswa" required>
                            <?php echo form_error('nama_siswa'); ?>
                        </div>
						<div class="form-group">
							<label style="float: left;">Alamat</label>
                            <textarea class="form-control" name="alamat" placeholder="Masukkan Alamat Siswa" rows="4" required></textarea>
                            <?php echo form_error('alamat'); ?>
                        </div>
                        <div class="button" style="float: left;">
                            <a href="#" onclick="history.go(-1)"><button type="button" class="btn btn-secondary">Kembali</button></a>
                            <button type="reset" class="btn btn-danger">Reset</button>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
