<html>

<head>
	<title>Profil</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
		integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
	<div class="content-wraper">
		<section class="content">
            <h4 align="center" style="margin-top: 30px;"><strong>DETAIL PROFIL</strong></h4>
            <?php
				if($this->session->flashdata('success')){
					echo "
					<div class='alert alert-success'>
					  ".$this->session->flashdata("success")."
					</div>
					";
				}
				?>
			<table class="table table-hover mt-3">
            <!-- <//?php foreach($profil as $prf) : ?> -->
                <tr>
					<th>Nama Awal</th>
					<td></td>
                </tr>
                <tr>
					<th>Nama Akhir</th>
					<td></td>
                </tr>
                <tr>
					<th>Tanggal Lahir</th>
					<td></td>
                </tr>
                <tr>
					<th>Alamat</th>
					<td></td>
                </tr>
                <tr>
					<th>Deskripsi</th>
					<td></td>
                </tr>
                <tr>
					<th>Hobi</th>
					<td></td>
				</tr>
				<tr>
					<th>Username</th>
					<td><?php echo $this->session->userdata('username')?></td>
				</tr>
				<tr>
					<th>Email</th>
					<td><?php echo $this->session->userdata('email')?></td>
                </tr>
                <tr>
					<th>Informasi</th>
					<td></td>
                </tr>
                <tr>
					<th>Foto Profil</th>
					<td></td>
                </tr>

				<!-- <tr>
					<th>Foto Profil</th>
					<td><img src="<//?php echo base_url(); ?>assets/images/<//?php echo $detail->foto; ?>"
							style="position: relative; height: 60px; top: 30px; left:25px;"></td>
				</tr> -->
			</table>
			<!-- <a href="<//?php echo base_url('login_lamaran/logout'); ?>" class="btn btn-primary">Kembali</a> -->
		</section>
	</div>
</body>

</html>