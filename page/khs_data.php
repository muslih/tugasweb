<?php breadcrumb(array("KHS","Data")); ?>
<h2>Data KHS</h2>
<form class="form-horizontal" action="?hal=khs_cetak" method="POST">
  <fieldset>
    <legend>Cari Data KHS</legend>
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
        <button type="submit" class="btn btn-primary">cari</button>
      </div>
    </div>
  </fieldset>
</form>

<!-- form data KHS -->
