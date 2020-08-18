<!DOCTYPE html>
<html>

<head>
	<title>Aplikasi Email</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
<div class="container" style="margin-top: 30px">
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<div class="card" style="margin-top: 120px;">
				<div class="card-header"><strong>FORM BERLANGGANAN MAJALAH BOBI</strong></div>
				<div class="card-body">
					<form method="POST" action="<?php echo site_url('EmailController/index')?>">
						<div class="form-group">
							<label style="float: left;">Email</label>
							<input type="email" name="email" class="form-control" placeholder="Masukkan alamat email" required>
                        </div>
						<div class="form-group">
							<label style="float: left;">Nama</label>
							<input type="text" name="name" class="form-control" placeholder="Masukkan nama kamu">
                        </div>
                        <div class="button" style="float: left;">
                            <button type="submit" name="submit" class="btn btn-success">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>
