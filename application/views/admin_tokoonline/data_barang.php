<div class="container-fluid">
	<button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_barang"><i
			class="fas fa-plus fa-sm"> Tambah Barang</i>
    </button>
    <?php echo $this->session->flashdata('message'); ?>
	<table class="table table-border table-hover">
		<tr>
			<th>NO</th>
			<th>NAMA BARANG</th>
			<th>KETERANGAN</th>
			<th>KATEGORI</th>
			<th>HARGA</th>
			<th>STOK</th>
			<th colspan="3">AKSI</th>
		</tr>

		<?php
        $no = 1;
        foreach($barang as $brg) : ?>

		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $brg->nama_brg; ?></td>
			<td><?php echo $brg->keterangan; ?></td>
			<td><?php echo $brg->kategori; ?></td>
			<td><?php echo $brg->harga; ?></td>
			<td><?php echo $brg->stok; ?></td>
			<td>
				<div class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></div>
			</td>
			<td><?php echo anchor('admin/data_barang/edit/'.$brg->id_brg, '<div class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></div>')?></td>
			<td onclick="javascript: return confirm('Anda yakin hapus?')"><?php echo anchor('admin/data_barang/hapus/'.$brg->id_brg, '<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>')?></td>
		</tr>

		<?php endforeach; ?>
	</table>
</div>

<!-- Modal -->
<div class="modal fade" id="tambah_barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">FORM INPUT PRODUK</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" action="<?php echo base_url().'admin/data_barang/tambah_aksi'?>"
					enctype="multipart/form-data">
					<div class="form-group">
						</label>Nama Barang</label>
						<input type="text" name="nama_brg" id="nama_brg" class="form-control"
							placeholder="Masukkan nama barang">
					</div>
					<div class="form-group">
						</label>Keterangan</label>
						<input type="text" name="keterangan" id="keterangan" class="form-control"
							placeholder="Masukkan keterangan barang">
					</div>
					<div class="form-group">
						</label>Kategori</label>
						<input type="text" name="kategori" id="kategori" class="form-control"
							placeholder="Masukkan kategori barang">
					</div>
					<div class="form-group">
						</label>Harga</label>
						<input type="number" onkeydown="javascript: return event.keyCode == 69 ? false : true"
							name="harga" id="harga" class="form-control" placeholder="Masukkan harga barang">
					</div>
					<div class="form-group">
						</label>Stok</label>
						<input type="text" id="stok" name="stok" class="form-control"
							placeholder="Masukkan stok barang">
					</div>
					<div class="form-group">
						</label>Gambar Produk</label><br>
						<input type="file" name="gambar" id="gambar" class="form-control">
					</div>

					<div id="alert-msg"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				<button type="submit" name="submit" id="submit" class="btn btn-primary">Simpan</button>
			</div>
			</form>

		</div>
	</div>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.js"
	integrity="sha512-ntfq5A52mYIK2b3eHD6EisHq5+wanA/FW2UJS28iOqhJPXhLG/2wdUbBqOFfiAzm2QjJrUE04FZAS5MsCWjvYA=="
	crossorigin="anonymous"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
<script type="text/javascript">
	$('#submit').click(function () {
		var form_data = {
			nama_brg: $('#nama_brg').val(),
			keterangan: $('#keterangan').val(),
			kategori: $('#kategori').val(),
			harga: $('#harga').val(),
			stok: $('#stok').val(),
            gambar: $('#gambar').val()
		};
		$.ajax({
			url: "<?php echo base_url().'admin/data_barang/tambah_aksi'?>",
			type: 'POST',
			data: form_data,
			success: function(msg) {
				$('#alert-msg').html('<div class="alert alert-danger">' + msg + '</div>');
			}
		});
		return false;
	});

</script>
