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
	<h2>DAFTAR JURUSAN</h2>
	<p><?php echo $this->session->flashdata('success_submit'); ?></p>
	<br />

	<!-- <div class="navbar-form navbar-right form-inline" style="float: right; margin-bottom: 10px;">
		<form method="GET" action="<//?php echo site_url('jurusan')  ?>">
			<input type=" text" name="search" class="form-control" placeholder="search"value="<//?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search'], ENT_QUOTES) : ''; ?>">
			<button type="submit" class="btn btn-success">Cari</button>
		</form>
	</div>
	<form method="GET" action="<//?php echo site_url('jurusan') ?>">
		<div class="form-group form-inline" style="margin-left: 200px;float: right; margin-right: 535px; margin-top: 4px;">
			<select name="sort" class="form-control" id="exampleFormControlSelect1">
				<option selected disabled>Order by</option>
				<option disabled>---Ascending---</option>
				<option value="id ,asc">ID</option>
				<option value="kode_jurusan ,asc">Kode Jurusan</option>
				<option value="nama_jurusan ,asc">Nama Jurusan</option>
				<option disabled>---Descending---</option>
				<option value="id ,desc">ID</option>
				<option value="kode_jurusan ,desc">Kode Jurusan</option>
				<option value="nama_jurusan ,desc">Nama Jurusan</option>
			</select>
			<button type="submit" class="btn btn-success" style="margin-left: 15px;"><i class="fa fa-sort"
					aria-hidden="true"></i>
				Urutkan</button>


		</div>

	</form>
	<form class="form-inline form-group" method="GET" action="<//?php echo site_url('jurusan')?>">
		<div class="form-group">
			<label class="my-1 mr-2" for="inlineFormCustomSelectPref">Show Entries</label>
			<select name="limit" class="custom-select my-1 mr-sm-1 col-md-2" id="inlineFormCustomSelectPref">
				<option <//?php if($limit === "2") echo ' selected="selected"';  ?> value="2">2</option>
				<option <//?php if($limit === "5") echo ' selected="selected"';  ?> value="5">5</option>
				<option <//?php if($limit === "10") echo ' selected="selected"';  ?> value="10">10</option>
				<option <//?php if($limit === 0) echo ' selected="selected"';  ?> value="all">All</option>
			</select>
			<button type="submit" class="btn btn-success" style="margin-right: 100px;"><i class="fa fa-search"
					aria-hidden="true"></i> Submit</button>
		</div>
	</form> -->
	<div id="toolbar" style="float:left; margin-top: 11px;">
		<a style="float:left;" class="btn btn-primary" href="<?php echo site_url("jurusan/tambah") ?>"><i class="fa fa-plus"></i> Tambah Data Kelas</a>
    	<button id="button" class="btn btn-secondary" style="margin-left: 10px;"><i class="fa fa-eye"></i> Get Selections</button>
	</div>
	<table id="tablejurusan" data-url="<?php echo site_url('Jurusan/data_jurusan') ?>">
	</table>
</div>

<script type="text/javascript" src="<?php echo base_url("assets/js/configBsTable.js")?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/jurusan.js")?>"></script>
<script type="text/javascript">

	function confirm_delete() {
  		return confirm('are you sure?');
	}

	function actionFormatter(value, row, index) {
	return [
		'<a class="btn btn-primary" href="<?php echo base_url("Jurusan/edit") ?>'+'/'+value+'"><i class="fa fa-edit"></i> Edit</a>',
		'      ',
		'<a class="btn btn-danger" href="<?php echo base_url("Jurusan/hapus") ?>'+'/'+value+'" onclick="return confirm_delete()"><i class="fa fa-trash"></i> Hapus</a>',
	].join('');
	}
</script>

