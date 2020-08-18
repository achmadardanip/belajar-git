<style>
	table,
	th,
	td {
		padding: 10px;
		border-collapse: collapse;
	}

	h2 {
		margin-top: 30px;
		margin-bottom: 50px;
		text-align: center;
	}

</style>


<div id="body">
	<h2>DAFTAR KELAS</h2>
	<!-- menampilkan pesan berhasil menambahkan data -->
	<p><?php echo $this->session->flashdata('success_submit'); ?></p>
	<br />

	<!-- <button style="margin-top: -50px;" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"> <b>Tambah Data Kelas</b></i></button> -->
	<!-- <div class="navbar-form navbar-right form-inline" style="float: right; margin-bottom: 10px;">
		<form method="GET" action="<//?php echo site_url('kelas')  ?>">
			<input type=" text" name="search" class="form-control" placeholder="search" value="<//?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search'], ENT_QUOTES) : ''; ?>">
			<button type="submit" class="btn btn-success"><i class="fa fa-search" aria-hidden="true"></i>
				Cari</button>
		</form >
	</div>
	<form method="GET" action="<//?php echo site_url('kelas') ?>">
		<div class="form-group form-inline" style="    margin-left: 200px; float: right; margin-right: 500px;margin-top: 4px;">
			<select name="sort" class="form-control" id="exampleFormControlSelect1">
				<option selected disabled>Order by</option>
				<option disabled>---Ascending---</option>
				<option value="id_jurusan,asc"> ID Jurusan</option>
				<option value="nama_jurusan,asc">Nama Jurusan</option>
				<option value="kode_kelas,asc">Kode Kelas</option>
				<option value="nama_kelas,asc">Nama Kelas</option>
				<option disabled>---Descending---</option>
				<option value="id_jurusan,desc">ID Jurusan</option>
				<option value="nama_jurusan,desc">Nama Jurusan</option>
				<option value="kode_kelas,desc">Kode Kelas</option>
				<option value="nama_kelas,desc">Nama Kelas</option>
			</select>
			<button type="submit" class="btn btn-success" style="margin-left: 15px;"><i class="fa fa-sort"
					aria-hidden="true"></i>
				Urutkan</button>

		</div>
	</form>
	<form class="form-inline form-group" method="GET" action="<//?php echo site_url('kelas')?>">
		<div class="form-group">
			<label class="my-1 mr-2" for="inlineFormCustomSelectPref">Show Entries</label>
			<select name="limit" class="custom-select my-1 mr-sm-1 col-md-2" id="inlineFormCustomSelectPref">
				<option <//?php if($limit === "5") echo ' selected="selected"';  ?> value="5">5</option>
				<option <//?php if($limit === "10") echo ' selected="selected"';  ?> value="10">10</option>
				<option <//?php if($limit === "15") echo ' selected="selected"';  ?> value="15">15</option>
				<option <//?php if($limit === 0) echo ' selected="selected"';  ?> value="all">All</option>
			</select>
			<button type="submit" class="btn btn-success" style="margin-right: 100px;"><i class="fa fa-search"
					aria-hidden="true"></i> Submit</button>
		</div>
	</form> -->
	<div id="toolbar" style="float:left;">
		<a style="float:left;" class="btn btn-primary" href="<?php echo site_url("kelas/tambah") ?>"><i class="fa fa-plus"></i> Tambah Data Kelas</a>
  		<button id="button" class="btn btn-secondary" style="margin-left: 10px;"><i class="fa fa-eye"></i> Get Selections</button>
	</div>
	<table
		id="tablekelas"
		data-toolbar="#toolbar"
		data-toggle="table"
		data-search="true"
		data-show-search-button="true"
		data-show-refresh="true"
		data-page-size="5"
		data-show-toggle="true"
		data-show-pagination-switch="true"
		data-pagination="true"
		data-side-pagination="server"
		data-show-fullscreen="true"
		data-show-columns="true"
		data-click-to-select="true"
		data-page-list="[5, All]"
		data-resizeable="true"
		data-detail-view="true"
		data-detail-formatter="detailFormatter"
		data-show-export="true"
		data-export-types="['pdf', 'csv', 'xml']"
		data-export-data-type="all"
		data-export-options='{"fileName": "Daftar Kelas"}'
		data-url="<?php echo site_url('Kelas/data_kelas') ?>"
	>
		<!-- header tabel -->
		<thead>
		<tr>
			<th data-field="state" data-checkbox="true" data-formatter="checkboxFormatter"></th>
			<th class="text-center" data-sortable="true" data-formatter="numberFormatter">No</th>
			<th class="text-center" data-field="kode_kelas" data-sortable="true">Kode Kelas</th>
			<th class="text-center" data-field="nama_kelas" data-sortable="true">Nama Kelas</th>
			<th class="text-center" data-field="nama_jurusan" data-sortable="true">Nama Jurusan</th>
			<th class="text-center" data-field="id" data-searchable="false" data-force-hide="true" data-formatter="actionFormatter">AKSI</th>
		</tr>
		</thead>

		<!-- melakukan perulangan untuk mendapatkan semua data dari db yang tadi dikirim dalam variabel $data -->
		<tbody>
		<?php
		//$no = //1;
		//foreach ($data as $key => $value) { ?>
		<!-- $value sudah merupakan data single -->
		<!--<tr>
			<td class="text-center"><//?php echo $no ?></td>
			<td class="text-center"><//?php echo $value['kode_kelas'] ?></td>
			<td class="text-center"><//?php echo $value['nama_kelas'] ?></td>
			<td class="text-center"><//?php echo $value['nama_jurusan'] ?></td>
			<!-- jika tombol edit di klik maka akan menjalankan method edit dgn membawa parameter id -->
			<!--<td>
			<a class="btn btn-success" href="<//?php echo site_url("kelas/detail/".$value['id']) ?>"><i
						class="fa fa-search-plus"></i> Detail Data</a>
			<a class="btn btn-primary" href="<//?php echo site_url("kelas/edit/".$value['id']) ?>"><i
						class="fa fa-edit"></i> Edit</a>
			<!-- jika tombol delete di klik maka akan menjalankan method hapus dgn membawa parameter hapus -->
			<!--<a class="btn btn-danger" href="<//?php echo site_url("kelas/hapus/".$value['id']) ?>"><i class="fa fa-trash"></i> Hapus</a>
			</td>
		</tr> -->
		<?php //$no++; ?>
		</tbody>
	</table>
	<!-- <//?php echo $pagination; ?> -->
</div>

<script>
function numberFormatter(value, row, index) {
	var options = $('#tablekelas').bootstrapTable('getOptions')

	var formula = 0
	if(!isNaN(options['pageSize'])) {
		formula = ((options["pageNumber"]-1) * options["pageSize"])
	}
	return index+1+formula;

}

function checkboxFormatter(value, row, index) {
	return false;
}

function confirm_delete() {
  return confirm('Anda yakin hapus?');
}

function actionFormatter(value, row, index) {
	return [
		'<a class="btn btn-primary" href="<?php echo base_url("Kelas/edit") ?>'+'/'+value+'"><i class="fa fa-edit"></i> Edit</a>',
		'      ',
		'<a class="btn btn-danger" href="<?php echo base_url("Kelas/hapus") ?>'+'/'+value+'" onclick="return confirm_delete()"><i class="fa fa-trash"></i> Hapus</a>',
	].join('');
}

function detailFormatter(index, row) {
    var html = []
	const excludeType = ["undefined", "object"];
    $.each(row, function (key, value) {
	  if(!excludeType.includes(typeof value)) {
      	html.push('<p><b>' + key + ':</b> ' + value + '</p>')
	  }
    })
    return html.join('')
  }
	
$(document).ready(function(){
var table = $('#tablekelas')
var $button = $('#button')

    $button.click(function () {
      alert('getSelections: ' + JSON.stringify(table.bootstrapTable('getSelections')[0]["kode_kelas"]))
    })
  });

</script>