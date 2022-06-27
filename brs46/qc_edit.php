<?php require('headernya.php');
	$idqc = $_GET['idqc'];
	$query = mysqli_query($kon, "SELECT * FROM qc JOIN user ON qc.id = user.id WHERE idqc = '$idqc'");
	$data  = mysqli_fetch_array($query);
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br><br>
    <section class="content">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-12">
            <div class="card">
              <div class="card-header">
                <h2 style="display:inline;"><button class="btn btn-default" type="button" data-toggle="tooltip" data-placement="bottom" title="Ubah"><i class="fas fa-edit"></i></button> Quality Check</h2>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="" method="POST" autocomplete="off">
                  <div class="form-group">
                      <label>Nama Teknisi</label>
                      <select name="id" class="form-control" required>
                          <option value="<?= $data['id'] ?>"><?= $data['nama'] ?></option>
                        <?php
                          $ketapel = mysqli_query($kon, "SELECT * FROM user WHERE level = 'teknisi'");
                            while($bisalah = mysqli_fetch_array($ketapel)) {
                              echo "<option value='$bisalah[id]'>$bisalah[nama]</option>";
                            } 
                          ?>
                      </select>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" name="simpan" class="btn btn-dark" data-toggle="tooltip" data-placement="bottom" title="Simpan"><i class="fas fa-check"></i></button>
                  <button type="button" onclick="window.location='qc.php';" data-toggle="tooltip" data-placement="bottom" title="Kembali" class="btn bg-orange float-right">
                    <i class="fas fa-times"></i></button>
                </div>
            	</div>
            </div>
        </div> <!-- /.row -->
      </section>
  </div> <!-- /.content-wrapper -->
<?php require('footernya.php') ?>

<?php 
  require('../koneksi.php');
  if (isset($_POST['simpan'])) {
    $id            = $_REQUEST['id'];

    $ubah = mysqli_query($kon,"UPDATE qc SET id='$id' WHERE idqc = '$idqc'");
    if($ubah){
      ?> <script>alert('Berhasil Diperbaharui');window.location='qc.php';</script> <?php
    }else{
      ?> <script>alert('Gagal Diperbaharui');window.location='qc_edit.php?idqc=<?=$idqc?>';</script> <?php
    }
  }
 ?>