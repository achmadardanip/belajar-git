<!-- script ini digunakan untuk mereset form saat button reset diklik -->
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
	<!-- judul page pada halaman indeks -->
	<section class="about" style="margin-top: -30px;">
		<h1><?php echo $title ?></h1>
	</section>

	<!-- section ini berisi tabel untuk menampilkan data dari db dan sebuah button untuk membuka modal -->
	<section class="content">
		<!-- meletakkan pesan flash data di atas button "tambah data siswa" yang dipanggil disini cuma nama flashdatanya saja -->
		<?php echo $this->session->flashdata('message'); ?>
		<!-- membuat button untuk membuka modal bootstrap -->
		<button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"> <b>Tambah
					Data Siswa</b></i></button>
		<!-- Membuat button untuk print data, ketika button ini diklik maka akan menjalankan method print pada controller -->
		<a class="btn btn-danger" href="<?php echo base_url('web/print_siswa') ?>"><i class="fa fa-print"></i>
			<b>Print</b></a>
		<!-- Membuat button export pdf dan excel dlm dropdown, Ketika button pdf di klik maka akan menjalankan method pdf pada controller
		dan ketika button excel di klik maka akan menjalankan method excel -->
		<div class="inline dropdown" style="display: inline;">
			<button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown"
				aria-haspopup="true" aria-expanded="true">
				<i class="fa fa-download"></i> <b>Export</b>
				<span class="caret"></span>
			</button>
			<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
				<li><a href="<?php echo base_url('web/pdf') ?>">PDF</a></li>
				<li><a href="<?php echo base_url('web/excel') ?>">Excel</a></li>
			</ul>
		</div>

		<!-- Membuat form navbar untuk pencarian data yag berada di sebelah kanan, ketika di klik submit akan menjalankan method search pada controller -->
		<div class="navbar-form navbar-right"">
			<?php echo form_open('web/search'); ?>
			<input type=" text" name="keyword" class="form-control" placeholder="search">
			<!-- Membuat button untuk submit pencarian data -->
			<button type="submit" class="btn btn-success">Cari</button>
			<?php echo form_close(); ?>
		</div>
		<!-- membuat table untuk menampilkan data -->
		<table class="table table-hover">
			<!-- membuat header dari tabel -->
			<tr>
				<th>ID</th>
				<th>Nama Siswa</th>
				<th>Tanggal Lahir</th>
				<th>Jenis Kelamin</th>
				<th>No HP</th>
				<th>Alamat</th>
				<!-- //ini adalah kolom untuk tombol edit, hapus, dan detail data -->
				<th colspan="3">AKSI</th>
			</tr>
			<!-- pengulangan untuk mendapatkan semua data dr db, variabel $murid dilempar dr controller dan dipanggil disini
			variabel $id untuk membuat nomor berurut dimulai dari no 1 -->
			<?php $id = 1; foreach($murid as $mrd) : ?>
			<!-- mendapatkan data satu per satu atau per row hanya data yang id,nama,tgl_lhr,jk, no_hp, dan alamat yg ditampilkan -->
			<tr>
				<td><?php echo $id++ ?></td>
				<td><?php echo $mrd->nama ?></td>
				<td><?php echo date('d-m-Y', strtotime($mrd->tanggal_lahir)) ?></td>
				<td><?php echo $mrd->jenis_kelamin ?></td>
				<td><?php echo $mrd->no_hp ?></td>
				<td><?php echo $mrd->alamat ?></td>
				<!-- membuat button detail data, ketika button ini di klik maka akan menjalankan method detail sekaligus mengirimkan parameter id ke method tsb -->
				<td><?php echo anchor('web/detail/' .$mrd->id, '<div class="btn btn-success"><i class ="fa fa-search-plus"></i></div>')?>
				</td>
				<!-- membuat button delete, ketika button ini diklik maka akan menjalankan method hapus pada controller sekaligus mengirim parameter id ke method tsb -->
				<!-- di button delete akan ada konfirmasi apakah ingin menghapus data -->
				<td onclick="javascript: return confirm('Anda yakin hapus?')">
					<?php echo anchor('web/hapus/' .$mrd->id . '/'. $mrd->foto, '<div class="btn btn-danger"><i class="fa fa-trash"></i></div>')?>
				</td>
				<!-- button ini untuk mengedit data, ketika button ini diklik maka akan menjalankan method edit pada controller sekaligus mengirim parameter id ke methd tsb  -->
				<td><?php echo anchor('web/edit/' .$mrd->id, '<div class="btn btn-primary"><i class="fa fa-edit"></i></div>')?>
				</td>
			</tr>
			<!-- menutup perulangan -->
			<?php endforeach; ?>
		</table>
	</section>

	<!-- untuk form input data digunakan modal dari bootstrap -->
	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="exampleModalLabel">FORM INPUT SISWA</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<!-- membuat form input di dalam modal-body -->
				<!-- form_open adalah default function dari CI sama spt tag form dg method post dan action yg mengarah ke base url -->
				<!-- ketika submit di klik, data dikirim ke method tambah_aksi pada controller web -->
				<div class="modal-body">
					<?php echo form_open_multipart('web/tambah_aksi'); ?> 
					<div class="form-group">
						<label>Nama Siswa</label>
						<input type="text" name="nama" class="form-control" placeholder="Masukkan nama" required>
					</div>
					<div class="form-group">
						<label>Tanggal Lahir</label>
						<input type="date" name="tanggal_lahir" class="form-control">
					</div>
					<div class="form-group">
						<label for="exampleFormControlSelect1">Jenis Kelamin</label>
						<select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
							<option value="" selected disabled>Pilih Jenis Kelamin</option>
							<option>Laki-Laki</option> 
							<option>Perempuan</option>
						</select>
					</div>
					<div class="form-group">
						<label>Nomor Handphone</label>
						<input type="number" onkeydown="javascript: return event.keyCode == 69 ? false : true"
							name="no_hp" class="form-control" placeholder="Masukkan nomor hp" required>
					</div>
					<div class="form-group">
						<label for="exampleFormControlTextarea1">Alamat</label>
						<textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3"
							placeholder="Masukkan alamat" required></textarea>
					</div>
					<!-- menambahkan form tambahan untuk email, sekolah, hobi, dan foto -->
					<div class="form-group">
						<label>Alamat Email</label>
						<input type="email" name="email" class="form-control" placeholder="Masukkan alamat email"
							required>
					</div>
					<div class="form-group">
						<label>Sekolah</label>
						<input type="text" name="sekolah" class="form-control" placeholder="Masukkan nama sekolah"
							required>
					</div>
					<div class="form-group">
						<label>Hobi</label>
						<input type="text" name="hobi" class="form-control" placeholder="Masukkan hobi" required>
					</div>
					<div class="form-group">
						<label>Upload Foto</label>
						<input type="file" name="foto" class="form-control" required>
					</div>
					<div class="modal-footer">
						<!-- ketika button reset diklik maka akan menjalankan function resetDong() -->
						<button type="reset" name="reset " class="btn btn-danger" onclick="resetDong()">Reset</button>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
					<!-- Penutup form_open_multipart -->
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
