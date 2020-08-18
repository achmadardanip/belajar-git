<style>
h2{
	margin-top: 30px;
    margin-bottom: 20px;
	text-align: center;
}
</style>

<div id="body">
<h2>DETAIL KELAS</h2>

<table class="table table-hover">
        <tr>
            <th>Kode Kelas</th>
            <!-- memanggil $detail dimana $detail sudah berisi data per row berdasarkan id msg2 data
            disertai memanggil fieldnya -->
            <td><?php echo $data['kode_kelas']; ?></td>
        </tr>
        <tr>
            <th>Nama Kelas</th>
            <td><?php echo $data['nama_kelas']; ?></td>
        </tr>
        <tr>
            <th>ID Jurusan</th>
            <td><?php echo $data['id_jurusan']; ?></td>
        </tr>
        <tr>
            <th>Nama Jurusan</th>
            <td><?php echo $data['nama_jurusan']; ?></td>
        </tr>
        <tr>
            <th>Created Datetime</th>
            <td><?php echo date('d-m-Y H:i:s', strtotime($data['created_datetime'])); ?></td>
        </tr>
        <tr>
            <th>Updated Datetime</th>
            <td><?php echo date('d-m-Y H:i:s', strtotime($data['updated_datetime'])); ?></td>
        </tr>
    </table>
    <a href="#" onclick="history.go(-1)"><button type="button" class="btn btn-secondary">Kembali</button></a>


</div>
