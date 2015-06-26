<?php breadcrumb(array("KHS","Input")); ?>
<h2>Input KHS</h2>
<?php 
if (isset($_POST['method'])) {
	if ($_POST['method'] == "post") {
		$nrp = $_POST['nrp'];
		$matkul = $_POST['matkul'];
		$nilai = $_POST['nilai'];
		$semester = $_POST['semester'];
		// flash("success", "Data mata kuliah berhasil ditambahkan");
		
		if (Nilai::create(array(
	        "mahasiswa_id" => $nrp,
	        "matkul_id" => $matkul,
	        "nilai" => $nilai,
	        "semester_id" => $semester
	      ))){
	        flash("success", "Data mata kuliah berhasil ditambahkan");
	    }else{
	        flash("error", "Data mata kuliah gagal ditambahkan");
	    }
	}
}
?>
<form class="form-horizontal" action="" method="POST">
  <fieldset>
    <legend>Tambah Nilai</legend>
    <div class="form-group">
    	<label for="nrp" class="col-lg-2 control-label">NRP</label>
    	<div class="col-lg-10">
    		<select name="nrp" id="nrp" class="form-control" required>
    			<option value="">--pilih mahasiswa--</option>
    			<?php 
    			$sem = Mahasiswa::all();
    			foreach ($sem as $mah) {
    				echo "<option value=\"".$mah->id."\">".$mah->id." - ".$mah->nama."</option>";
    			}
    			 ?>
    		</select>
    	</div>
    </div>
	<div class="form-group">
    	<label for="matkul" class="col-lg-2 control-label">Kode Mata Kuliah</label>
    	<div class="col-lg-10">
    		<select name="matkul" id="matkul" class="form-control" required>
    			<option value="">--pilih semester--</option>
    			<?php 
    			$sem = Matkul::all();
    			foreach ($sem as $mat) {
    				echo "<option value=\"".$mat->id."\">".$mat->namamatkul." - ".$mat->semester->semester." - ".$mat->semester->tahun."</option>";
    			}
    			 ?>
    		</select>
    	</div>
    </div>

    <div class="form-group">
    	<label for="nilai" class="col-lg-2 control-label">Nilai</label>
    	<div class="col-lg-10">
    		<input type="nilai" name="nilai" id="nilai" placeholder="nilai dosen" class="form-control" required>
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