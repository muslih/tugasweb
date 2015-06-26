<?php breadcrumb(array("Master","Mahasiswa")); ?>
<h2>Master Mahasiswa</h2>
<?php 
if (isset($_POST['method'])) {
	if ($_POST['method'] == "post") {
		$nrp = $_POST['nrp'];
		$nama = $_POST['nama'];
		$jurusan = $_POST['jurusan'];
		$pa = $_POST['pa'];

		$data = Mahasiswa::find_by_id($nrp);

		if ($data) {
			flash("danger", "<strong>Data tidak bisa disimpan! </strong> NRP sudah terdaftar");
		} else {
		    if (Mahasiswa::create(array(
		        // "tipe_id" => $tipe_id,
		        "id" => $nrp,
		        "nama" => $nama,
		        "jurusan_id" => $jurusan,
		        "dosen_id" => $pa
		      ))){
		        flash("success", "Data semester berhasil ditambahkan");
		    }else{
		        flash("error", "Data semester gagal ditambahkan");
		    }
		}
	}

	if ($_POST['method'] == "delete") {
		$id = $_POST['id'];

		$data = Mahasiswa::find($id);

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
    	<?php $students = Mahasiswa::all(); ?>
    	<!-- <pre>
    		<?php print_r($sem) ?>
    	</pre> -->
      <table class="table table-striped table-hover ">

      	<thead>
      		<tr>
      			<td>No</td>
      			<td>NRP</td>
      			<td>Nama</td>
      			<td>Jurusan</td>
      			<td>PA</td>
      			<td>Aksi</td>
      		</tr>

      	</thead>
      	<tbody>
      		<?php 
      		$no = 1;
      		foreach ($students as $mhs) {
      			echo "<tr>";
      			echo "<td>".$no."</td><td>".$mhs->id."</td><td>".$mhs->nama."</td><td>".$mhs->jurusan->nama_jurusan."</td><td>".$mhs->dosen->nama."</td>";
      			echo "<td>".hapus($mhs->id)."</td>";
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
		    <legend>Tambah Data Dosen</legend>
		    <div class="form-group">
		    	<label for="nrp" class="col-lg-2 control-label">NRP</label>
		    	<div class="col-lg-10">
		    		<input type="text" name="nrp" class="form-control" id="nrp" placeholder="NRP mahasiswa" required>
		    	</div>
		    </div>

			<div class="form-group">
		    	<label for="nama" class="col-lg-2 control-label">Nama</label>
		    	<div class="col-lg-10">
		    		<input type="text" name="nama" id="nama" placeholder="nama mahasiswa" class="form-control" required>
		    	</div>
		    </div>

		    <div class="form-group">
		    	<label for="jurusan" class="col-lg-2 control-label">Jurusan</label>
		    	<div class="col-lg-10">
		    		<select name="jurusan" id="jurusan" class="form-control">
		    			<option value="">--pilih jurusan--</option>
		    			<?php 
		    			$jur = Jurusan::all(); 
		    			foreach ($jur as $jurusan) {
		    				echo "<option value=\"".$jurusan->id."\">".$jurusan->nama_jurusan."</option>";
		    			} ?>
		    		</select>
		    	</div>
		    </div>
		    <div class="form-group">
		    	<label for="pa" class="col-lg-2 control-label">Pembimbing Akademik</label>
		    	<div class="col-lg-10">
		    		<select name="pa" id="pa" class="form-control" required>
		    			<option value="">--pilih dosen--</option>
		    			<?php 
		    			$dos = Dosen::all(); 
		    			foreach ($dos as $dosen) {
		    				echo "<option value=\"".$dosen->id."\">".$dosen->nama."</option>";
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