<div class="container" style="margin-top: 60px">
<?php echo $this->session->flashdata('message'); ?>
	<div class="row">
		<!-- <div class="col-md-12"> -->
			<div class="card">
				<div class="card-header"><strong>DATA SISWA</strong></div>
				<div class="card-body">
				<div id="printbar" style="float:right;"></div>
					<a href="<?php echo site_url('siswa/tambah') ?>" class="btn btn-md btn-success"
						style="margin-bottom:18px; float:left;"><i class="fa fa-plus"></i> TAMBAH DATA SISWA</a>
					<table class="table table-bordered table-hover" id="myTable">
						<thead>
							<tr>
								<th scope="col">NO</th>
								<th scope="col">NISN</th>
								<th scope="col">NAMA</th>
								<th scope="col">ALAMAT</th>
								<th scope="col">AKSI</th>
							</tr>
						</thead>

						<tbody>
							<?php
                            $no=1;
                            foreach($data_siswa as $siswa) {
                            ?>

							<tr>
								<td><?php echo $no++ ?></td>
								<td><?php echo $siswa->nisn ?></td>
								<td><?php echo $siswa->nama_siswa ?></td>
								<td><?php echo $siswa->alamat ?></td>
								<td class="text-center">
									<a href="<?php echo site_url('siswa/edit'.'/'.$siswa->id_siswa) ?>"
										class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</a>
									
                                    <a onclick="javascript: return confirm('Anda yakin hapus?')" href="<?php echo site_url('siswa/hapus'.'/'.$siswa->id_siswa) ?>"
										class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</a>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		<!-- </div> -->
	</div>
</div>
