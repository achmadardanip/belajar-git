<!doctype html>
<html><head>
	<title></title>
</head><body>

    <h3 style="text-align: center;">DATA SISWA PKL DEVELOPER ADW 2020</h3>
	<table>
        <!-- membuat header table -->
		<tr>
			<th>ID</th>
			<th>Nama Siswa</th>
			<th>Tanggal Lahir</th>
			<th>Jenis Kelamin</th>
			<th>Nomor Handphone</th>
			<th>Alamat</th>
            <th>Alamat Email</th>
            <th>Sekolah</th>
            <th>Hobi</th>
		</tr>
        
        <!-- pengulangan untuk mendapatkan semua data dr db, variabel $siswa dilempar dr controller dan dipanggil disini
		variabel $no untuk membuat nomor berurut dimulai dari no 1 -->
        <?php $no = 1; foreach($siswa as $sw) : ?>
        <!-- mendapatkan data satu per satu atau per row hanya data yang id,nama,tgl_lhr,jk, no_hp, alamat, email, sekolaj, dan hobi yg ditampilkan -->
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $sw->nama ?></td>
            <td><?php echo $sw->tanggal_lahir ?></td>
            <td><?php echo $sw->jenis_kelamin ?></td>
            <td><?php echo $sw->no_hp ?></td>
            <td><?php echo $sw->alamat ?></td>
            <td><?php echo $sw->email ?></td>
            <td><?php echo $sw->sekolah ?></td>
            <td><?php echo $sw->hobi ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body></html>
