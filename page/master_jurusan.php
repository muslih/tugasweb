<?php breadcrumb(array("Master","Jurusan")); ?>
<h2>Master Jurusan</h2>
<?php 
if (isset($_POST['method'])) {
	if ($_POST['method'] == "post") {
		$nama = $_POST['nama'];

		$data = Jurusan::find_by_nama_jurusan($nama);

		if ($data) {
			flash("danger", "<strong>Data tidak bisa disimpan! </strong> nama jurusan sudah terdaftar");
		} else {
		    if (Jurusan::create(array(
		        // "tipe_id" => $tipe_id,
		        "nama_jurusan" => $nama
		      ))){
		        flash("success", "Data jurusan berhasil ditambahkan");
		    }else{
		        flash("error", "Data jurusan gagal ditambahkan");
		    }
		}
	}

	if ($_POST['method'] == "delete") {
		$id = $_POST['id'];

		$data = Jurusan::find($id);

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
    	<?php $jurusans = Jurusan::all(); ?>
      <table class="table table-striped table-hover ">

      	<thead>
      		<tr>
      			<td><strong>No</strong></td>
      			<td><strong>Nama Jurusan</strong></td>
      			<td><strong>Aksi</strong></td>
      		</tr>

      	</thead>
      	<tbody>
      		<?php 
      		$no = 1;
      		foreach ($jurusans as $jurusan) {
      			echo "<tr>";
      			echo "<td>".$no."</td><td>".$jurusan->nama_jurusan."</td>";
      			echo "<td>".hapus($jurusan->id)."</td>";
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
		    <legend>Tambah Data Jurusan</legend>
			<div class="form-group">
		    	<label for="nama" class="col-lg-2 control-label">Nama Jurusan</label>
		    	<div class="col-lg-10">
		    		<input type="text" name="nama" id="nama" placeholder="nama Jurusan" class="form-control" required>
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