<script>
    function resetDong() {
		const inputs = document.querySelectorAll('input');
		const textArea = document.getElementById('exampleFormControlTextarea1');

        inputs.forEach(input => {
			input.value = "";
        });
        textArea.value = "";
    }
</script>

<div class="container" style="margin-top:30px">
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<div class="card">
				<div class="card-header"><strong>EDIT DATA SISWA<strong></div>
					<div class="card-body">
                        <form method="POST" action="<?php echo site_url('siswa/update') ?>">
                            <div class="form-group">
                                <label>NISN</label>
                                <input type="number" name="nisn" class="form-control" value="<?php echo $data_siswa->nisn ?>" onkeydown="javascript: return event.keyCode == 69 ? false : true" placeholder="Masukkan NISN Siswa" required>
                                <input type="hidden" name="id_siswa" value="<?php echo $data_siswa->id_siswa ?>">
                                <?php echo form_error('nisn'); ?>
                            </div>
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" name="nama_siswa" class="form-control" value="<?php echo $data_siswa->nama_siswa ?>" placeholder="Masukkan Nama Siswa" required>
                                <?php echo form_error('nama_siswa'); ?>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" placeholder="Masukkan Alamat Siswa" rows="4"><?php echo $data_siswa->alamat ?></textarea>
                                <?php echo form_error('alamat'); ?>
                            </div>
                            <div class="button" style="float: left; margin-bottom: 15px;">
                                <a href="#" onclick="history.go(-1)"><button type="button" class="btn btn-secondary">Kembali</button></a>
                                <button type="button" class="btn btn-danger" onclick="resetDong()">Reset</button>
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
