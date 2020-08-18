<section id="login">
	<div class="container">
		<div class="row justify-content-center mt-6">
			<div class="col-md-4">
				<div class="card">
					<div class="card-header bg-transparent mb-0">
						<h5 class="text-center">Kalkulator <span class="font-weight-bold text-primary">LUAS PERSEGI PANJANG</span></h5>
					</div>
					<div class="card-body">
                        <form method="POST" action="<?php echo site_url('hitung_success') ?>">
							<div class="form-group">
								<input type="text" name="panjang" class="form-control" placeholder="Panjang">
							</div>
							<div class="form-group">
								<input type="text" name="lebar" class="form-control" placeholder="Lebar">
							</div>
							<div class="form-group">
								<input type="submit" name="submit" value="Hitung" class="btn btn-primary btn-block">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
    </div>
    <br>
    <p align="center"><?= $hasilhitung; ?></p>
	<br>
	<?php echo validation_errors('<div class="error">', '</div>'); ?>
<section>