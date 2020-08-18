<div class="content-wraper">
<section class="content">
    <h4><strong>DETAIL DATA SISWA</strong></h4>
    <table class="table">
        <tr>
            <th>Nama Siswa</th>
            <!-- memanggil $detail dimana $detail sudah berisi data per row berdasarkan id msg2 data
            disertai memanggil fieldnya -->
            <td><?php echo $detail->nama; ?></td>
        </tr>
        <tr>
            <th>Tanggal Lahir</th>
            <td><?php echo $detail->tanggal_lahir; ?></td>
        </tr>
        <tr>
            <th>Jenis Kelamin</th>
            <td><?php echo $detail->jenis_kelamin; ?></td>
        </tr>
        <tr>
            <th>Nomor Handphone</th>
            <td><?php echo $detail->no_hp; ?></td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td><?php echo $detail->alamat; ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?php echo $detail->email; ?></td>
        </tr>
        <tr>
            <th>Sekolah</th>
            <td><?php echo $detail->sekolah; ?></td>
        </tr>
        <tr>
            <th>Hobi</th>
            <td><?php echo $detail->hobi; ?></td>
        </tr>
        <tr>
            <th>Foto</th>
            <!-- Menampilkan foto yang sudah diupload -->
            <td><img src="<?php echo base_url(); ?>assets/foto/<?php echo $detail->foto; ?>" style="position: relative; height: 60px; top: 30px; left:25px;"></td>
        </tr>
    </table>
    <a href="<?php echo base_url('web/index_crud'); ?>" class="btn btn-primary">Kembali</a>
</section>
</div>