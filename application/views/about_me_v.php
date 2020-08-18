<section class="about">
<h1><?php echo $title ?></h1>
<p>Nama: <?php echo $nama; ?></p>
<p>Umur kamu saat ini: <?php echo $umur; ?></p>
<p>Jenis Kelamin: <?php echo $jk; ?></p>
<p>Kota: <?php echo $kota; ?></p>
<p>Kutipan: <?php echo $kutipan; ?></p>
<p>Foto : <a href = "<?php echo site_url('web/download/' .$file_name ."/" .$orig_name); ?>" target='_blank'><?php echo $orig_name?></a></p>
</section>