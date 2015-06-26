<?php breadcrumb(array("Master","Semester")); ?>


<h2>Master Semester</h2>

<?php 
if (isset($_POST['method'])) {
	if ($_POST['method'] == "post") {
		$kodesemester = $_POST['kodesemester'];
		$semester = $_POST['semester'];
		$tahun = $_POST['tahun'];

		$data = Semester::find_by_id($kodesemester);

		if ($data) {
			flash("danger", "<strong>Data tidak bisa disimpan! </strong> Kode barang anda masukan sudah terdaftar");
		} else {
		    if (Semester::create(array(
		        // "tipe_id" => $tipe_id,
		        "id" => $kodesemester,
		        "semester" => $semester,
		        "tahun" => $tahun
		      ))){
		        flash("success", "Data semester berhasil ditambahkan");
		    }else{
		        flash("error", "Data semester gagal ditambahkan");
		    }
		}
	}

	if ($_POST['method'] == "delete") {
		$id = $_POST['id'];

		$data = Semester::find($id);

		if ($data->delete()) {
			flash("success", "Data semester berhasil dihapus");
		} else {
			flash("error", "Data semester gagal dihapus");
		}
	}
}
?>
<div class="bs-component">
  <ul class="nav nav-tabs">
    <li class="active"><a href="#data" data-toggle="tab" aria-expanded="true">Data</a></li>
    <li class=""><a href="#tambah" data-toggle="tab" aria-expanded="false">Tambah</a></li>
  </ul>
  <div id="myTabContent" class="tab-content">
    <div class="tab-pane fade active in" id="data">
    	<?php $sem = Semester::all(); ?>
    	<!-- <pre>
    		<?php print_r($sem) ?>
    	</pre> -->
      <table class="table table-striped table-hover ">

      	<thead>
      		<tr>
      			<td>No</td>
      			<td>Kode Semester</td>
      			<td>Semester</td>
      			<td>Tahun Ajaran</td>
      			<td>Aksi</td>
      		</tr>

      	</thead>
      	<tbody>
      		<?php 
      		$no = 1;
      		foreach ($sem as $semester) {
      			echo "<tr>";
      			echo "<td>".$no."</td><td>".$semester->id."</td><td>".$semester->semester."</td><td>".$semester->tahun."</td>";
      			echo "<td>".hapus($semester->id)."</td>";
      			echo "</tr>";
      			$no = $no + 1;
      		}

      		 ?>
      	</tbody>
      </table>
    </div>
    <div class="tab-pane fade" id="tambah">
      <form class="form-horizontal" action="" method="POST">
		  <fieldset>
		    <legend>Tambah Data Semester</legend>
		    <div class="form-group">
		    	<label for="inputKode" class="col-lg-2 control-label">Kode Semester</label>
		    	<div class="col-lg-10">
		    		<input type="text" name="kodesemester" class="form-control" id="inpputKode" placeholder="kode semester">
		    	</div>
		    </div>

			<div class="form-group">
		    	<label for="inputSemester" class="col-lg-2 control-label">Semester</label>
		    	<div class="col-lg-10">
		    		<select name="semester" class="form-control" id="inputSemester">
		    			<option value="ganjil">Ganjil</option>
		    			<option value="genap">Genap</option>
		    		</select>
		    	</div>
		    </div>

		    <div class="form-group">
		    	<label for="inputTahun" class="col-lg-2 control-label">Tahun Ajaran</label>
		    	<div class="col-lg-10">
		    		<select name="tahun" class="form-control" id="tahun">
		    			<option value="2015/2016">2015/2016</option>
		    			<option value="2016/2017">2016/2017</option>
		    		</select>
		    	</div>
		    </div>
			<input type="hidden" name="method" value="post">
		    <div class="form-group">
		      <div class="col-lg-10 col-lg-offset-2">
		        <button type="reset" class="btn btn-default">batal</button>
		        <button type="submit" class="btn btn-primary">tambah</button>
		      </div>
		    </div>
		  </fieldset>
		</form>
    </div>

  </div>
  <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">&lt; &gt;</div>
</div>