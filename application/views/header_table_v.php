<!DOCTYPE html>
<html>
<head>
	<title>Sistem Akademik Sederhana | SIS ANA</title>

	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>"  crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-grid.min.css') ?>"  crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap-table/dist/bootstrap-table.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/fontawesome-5.14.0/css/fontawesome.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/jquery.resizableColumns.css') ?>">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	


</head>
<body>
<div class="container-fluid">
<!-- <h1> Sederhana</h1> -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?php echo site_url() ?>"><h1>Sistem Akademik</h1></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="jurusanDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Jurusan
        </a>
        <div class="dropdown-menu" aria-labelledby="jurusanDropdown">
          <a class="dropdown-item" href="<?php echo site_url('jurusan') ?>">Lihat Jurusan </a>
          <a class="dropdown-item" href="<?php echo site_url('jurusan/tambah') ?>">Tambah Jurusan</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="kelasDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Kelas
        </a>
        <div class="dropdown-menu" aria-labelledby="kelasDropdown">
          <a class="dropdown-item" href="<?php echo site_url('kelas') ?>">Lihat Kelas</a>
          <a class="dropdown-item" href="<?php echo site_url('kelas/tambah') ?>">Tambah Kelas</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
