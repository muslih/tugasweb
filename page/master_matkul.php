<?php breadcrumb(array("Master","Mata Kuliah")); ?>
<h2>Master Mata Kuliah</h2>
<?php 
if (isset($_POST['method'])) {
	if ($_POST['method'] == "post") {
		$kode = $_POST['kode'];
		$nama = $_POST['nama'];
		$sks = $_POST['sks'];
		$semester = $_POST['semester'];

		$data = Matkul::find_by_id($kode);

		if ($data) {
			flash("danger", "<strong>Data tidak bisa disimsemestern! </strong> kode sudah terdaftar");
		} else {
		    if (Matkul::create(array(
		        // "tipe_id" => $tipe_id,
		        "id" => $kode,
		        "namamatkul" => $nama,
		        "sks" => $sks,
		        "semester_id" => $semester
		      ))){
		        flash("success", "Data mata kuliah berhasil ditambahkan");
		    }else{
		        flash("error", "Data mata kuliah gagal ditambahkan");
		    }
		}
	}

	if ($_POST['method'] == "delete") {
		$id = $_POST['id'];

		$data = Matkul::find($id);

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
    <li class="active"><a href="#data" data-toggle="tab" aria-exsemesternded="true">Data</a></li>
    <li class=""><a href="#tambah" data-toggle="tab" aria-exsemesternded="false">Tambah</a></li>
  </ul>
  <div id="myTabContent" class="tab-content">
    <div class="tab-pane fade active in" id="data">
      <table class="table table-striped table-hover">
      	<thead>
      		<tr>
      			<td>No</td>
      			<td>Kode</td>
      			<td>Mata Kuliah</td>
      			<td>SKS</td>
      			<td>Semester</td>
      			<td>Tahun Ajaran</td>
      			<td>Aksi</td>
      		</tr>
      	</thead>
      	<tbody>
      		<?php 
      		$no = 1;
      		$matkuls = Matkul::all();
      		foreach ($matkuls as $matkul) {
      			echo "<tr><td>".$no."</td><td>".$matkul->id."</td><td>".$matkul->namamatkul."</td><td>".$matkul->sks."</td><td>".$matkul->semester->semester."</td><td>".$matkul->semester->tahun."</td>";
      			echo "<td>".hapus($matkul->id)."</td></tr>";
      			$no = $no + 1;
      		}?>
      	</tbody>
      </table>
    </div>
    <div class="tab-pane fade" id="tambah">
      <form class="form-horizontal" action="" method="POST">
		  <fieldset>
		    <legend>Tambah Mata Kuliah</legend>
		    <div class="form-group">
		    	<label for="kode" class="col-lg-2 control-label">Kode Mata Kuliah</label>
		    	<div class="col-lg-10">
		    		<input type="text" name="kode" class="form-control" id="kode" placeholder="kode Matkul" required>
		    	</div>
		    </div>

			<div class="form-group">
		    	<label for="nama" class="col-lg-2 control-label">Nama Mata Kuliah</label>
		    	<div class="col-lg-10">
		    		<input type="text" name="nama" id="nama" placeholder="nama Matkul" class="form-control" required>
		    	</div>
		    </div>
		    <div class="form-group">
		    	<label for="sls" class="col-lg-2 control-label">Jumlah SKS</label>
		    	<div class="col-lg-10">
		    		<input type="text" name="sks" id="sks" placeholder="jumlah SKS" class="form-control" required>
		    	</div>
		    </div>
		    <div class="form-group">
		    	<label for="semester" class="col-lg-2 control-label">Semester</label>
		    	<div class="col-lg-10">
		    		<select name="semester" id="semester" class="form-control" required>
		    			<option value="">--pilih semester--</option>
		    			<?php 
		    			$sem = Semester::all(); 
		    			foreach ($sem as $semester) {
		    				echo "<option value=\"".$semester->id."\">".$semester->semester." - ".$semester->tahun."</option>";
		    			}
		    			?>
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