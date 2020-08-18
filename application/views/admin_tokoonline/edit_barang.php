<div class="container-fluid">
	<h3><i class="fas fa-edit"></i>EDIT DATA BARANG</h3>

	<?php foreach($barang as $brg) :?>
	<form method="POST" action="<?php echo base_url().'admin/data_barang/update'?>" enctype="multipart/form-data">
		<div class="form-group">
            <label>Nama Barang</label>
            <input type="text" name="nama_brg" class="form-control" value="<?php echo $brg->nama_brg ?>">
            <!-- <small class="form-text text-danger"><//?php echo form_error('nama_brg'); ?></small> -->
		</div>
        <div class="form-group">
            <label>Keterangan</label>
            <input type="hidden" name="id_brg" class="form-control" value="<?php echo $brg->id_brg ?>">
            <input type="text" name="keterangan" class="form-control" value="<?php echo $brg->keterangan ?>">
            <!-- <small class="form-text text-danger"><//?php echo form_error('keterangan'); ?></small> -->
		</div>
        <div class="form-group">
            <label>Kategori</label>
            <input type="text" name="kategori" class="form-control" value="<?php echo $brg->kategori ?>">
            <!-- <small class="form-text text-danger"><//?php echo form_error('kategori'); ?></small> -->
		</div>
        <div class="form-group">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control" onkeydown="javascript: return event.keyCode == 69 ? false : true" value="<?php echo $brg->harga ?>">
            <!-- <small class="form-text text-danger"><//?php echo form_error('harga'); ?></small> -->
        </div>
        <div class="form-group">
            <label>Stok</label>
            <input type="text" name="stok" class="form-control" value="<?php echo $brg->stok ?>">
            <!-- <small class="form-text text-danger"><//?php echo form_error('stok'); ?></small> -->
        </div>
        <div class="form-group">
            <label>Gambar Produk</label>
            <input type="file" name="gambar" class="form-control">
		</div>
        <a href="<?php echo base_url('admin/data_barang'); ?>" class="btn btn-secondary btn-sm">Kembali</a>
        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
	</form>
	<?php endforeach; ?>
</div>
