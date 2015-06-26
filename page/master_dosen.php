<?php breadcrumb(array("Master","Dosen")); ?>
<h2>Master Dosen</h2>
<?php 
if (isset($_POST['method'])) {
	if ($_POST['method'] == "post") {
		$nip = $_POST['nip'];
		$nama = $_POST['nama'];
		$email = $_POST['email'];

		$data = Dosen::find_by_nip($nip);

		if ($data) {
			flash("danger", "<strong>Data tidak bisa disimpan! </strong> NIP sudah terdaftar");
		} else {
		    if (Dosen::create(array(
		        // "tipe_id" => $tipe_id,
		        "nip" => $nip,
		        "nama" => $nama,
		        "email" => $email
		      ))){
		        flash("success", "Data semester berhasil ditambahkan");
		    }else{
		        flash("error", "Data semester gagal ditambahkan");
		    }
		}
	}

	if ($_POST['method'] == "delete") {
		$id = $_POST['id'];

		$data = Dosen::find($id);

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
    	<?php $dosens = Dosen::all(); ?>
    	<!-- <pre>
    		<?php print_r($sem) ?>
    	</pre> -->
      <table class="table table-striped table-hover ">

      	<thead>
      		<tr>
      			<td>No</td>
      			<td>NIP</td>
      			<td>Nama</td>
      			<td>Email</td>
      			<td>Aksi</td>
      		</tr>

      	</thead>
      	<tbody>
      		<?php 
      		$no = 1;
      		foreach ($dosens as $dosen) {
      			echo "<tr>";
      			echo "<td>".$no."</td><td>".$dosen->nip."</td><td>".$dosen->nama."</td><td>".$dosen->email."</td>";
      			echo "<td>".hapus($dosen->id)."</td>";
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
		    	<label for="nip" class="col-lg-2 control-label">NIP</label>
		    	<div class="col-lg-10">
		    		<input type="text" name="nip" class="form-control" id="nip" placeholder="NIP Dosen" required>
		    	</div>
		    </div>

			<div class="form-group">
		    	<label for="nama" class="col-lg-2 control-label">Nama</label>
		    	<div class="col-lg-10">
		    		<input type="text" name="nama" id="nama" placeholder="nama dosen" class="form-control" required>
		    	</div>
		    </div>

		    <div class="form-group">
		    	<label for="email" class="col-lg-2 control-label">Email</label>
		    	<div class="col-lg-10">
		    		<input type="email" name="email" id="email" placeholder="email dosen" class="form-control" required>
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