<?php 
if (isset($_POST['method'])) {
 if ($_POST['method'] == "post") {
   $nrp = $_POST['nrp'];
   $semester = $_POST['semester'];

   $data = Nilai::all(array('conditions' => array('mahasiswa_id = ? AND semester_id = ?', $nrp, $semester)));
   // $n = Nilai::all();
   // $n->delete();
   // $data->delete();
   $mhs = Mahasiswa::find_by_id($nrp);
   $smt = Semester::find_by_id($semester);

   if ($data) {
    // echo "<pre>";
    // print_r($data);
    // echo "</pre>";
    // require './page/khs_cetak.php';
    flash("success", "Data ditemukan ditemukan");
   } else {
     flash("error", "Tidak ada data yang ditemukan");
   }
 }
}
?>

<div class="wrap cetak">
	<h2>Kartu Hasil Studi</h2>
	<div class="row">
		<div class="col-xs-6 col-md-6">
			<table>
				<tr>
					<td>Nama</td>
					<td>: </td>
					<td><?php echo $mhs->nama ?></td>
				</tr>
				<tr>
					<td>NRP</td>
					<td>:</td>
					<td><?php echo $mhs->id ?></td>
				</tr>
				<tr>
					<td>Jurusan</td>
					<td>: </td>
					<td><?php echo $mhs->jurusan->nama_jurusan ?></td>
				</tr>
			</table>
		</div>
		<div class="col-xs-6 col-md-6">
			<table>
				<tr>
					<td>Jurusan</td>
					<td>: </td>
					<td>Sistem Informasi</td>
				</tr>
				<tr>
					<td>Pembimbing Akademik</td>
					<td>: </td>
					<td>Iwan Fitriady</td>
				</tr>
				<tr>
					<td>Semester</td>
					<td>: </td>
					<td>Ganjil 2015-2016</td>
				</tr>
			</table>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-lg-12">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Mata Kuliah</th>
						<th>Kode</th>
						<th>SKS (K)</th>
						<th>Nilai (N)</th>
						<th>K X N</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$no = 1;
					$total = 0;
					foreach ($data as $dat) { ?>
					<tr>
						<td> <?php echo $no ?> </td>
						<td><?php echo $dat->matkul->namamatkul ?> </td>
						<td><?php echo $dat->matkul->id ?></td>
						<td><?php echo $dat->matkul->sks ?></td>
						<td><?php echo $dat->nilai ?></td>
						<td></td>
					</tr>
					<?php
					$no = $no + 1;
					$total = $total + $dat->matkul->sks;
					 } ?>
					<tr>
						<td colspan="3">Jumlah</td>
						<td> <?php echo $total ?>  </td>
						<td></td>
						<td></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-6 col-md-6">
			<table>
				<tr>
					<td>Indeks Prestasi</td>
					<td>:</td>
					<td>3.50</td>
				</tr>
				<tr>
					<td>Jumlah SKS yang diambil </td>
					<td>:</td>
					<td><strong><?php echo $total ?></strong> SKS</td>
				</tr>
			</table>
		</div>
		<div class="col-xs-6 col-md-6">
			Banjarmasin, 14-03-2015
		</div>
	</div>

	<div class="row">
		<div class="col-xs-6 col-md-6">
			Pb. Direktur I
			<br>
			<br>
			<br>
			Yefriansyah Salim, M.Kom
		</div>
		<div class="col-xs-6 col-md-6">
			Ketua Jurusan
			<br>
			<br>
			<br>
			Siti Cholofah, M.Kom
		</div>
	</div>


</div>