<?php require('headernya.php');  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br><br>
    <section class="content">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-12">
            <div class="card">
              <div class="card-header">
                <h2 style="display:inline;"><button class="btn btn-default" type="button" data-toggle="tooltip" data-placement="bottom" title="Tambah"><i class="fas fa-folder-plus"></i></button> Barang Rusak</h2>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="" method="POST" autocomplete="off">
                  <div class="form-group">
                    <label>Tanggal</label>
                    <input type="date" class="form-control" name="tgl" value="<?= date('Y-m-d') ?>" required>
                  </div>
                  <div class="form-group">
                    <label>Nama Barang</label>
                    <select name="idbarang" class="form-control" required>
                      <option value="">-Pilih-</option>
                    <?php
                      $ahay = mysqli_query($kon, "SELECT * FROM barang ORDER BY namabarang ASC");
                        while($baris = mysqli_fetch_array($ahay)) {
                          echo "<option value='$baris[idbarang]'>$baris[namabarang]</option>";
                        } 
                      ?>
                  </select>
                  </div>
                  <div class="form-group">
                    <label>Jumlah</label>
                    <input type="number" class="form-control" name="kuantiti" required>
                  </div>
                  <div class="form-group">
                    <label>Keterangan</label>
                    <input type="text" class="form-control" name="ket" required>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" name="simpan" class="btn btn-dark" data-toggle="tooltip" data-placement="bottom" title="Simpan"><i class="fas fa-check"></i></button>
                  <button type="button" onclick="window.location='barangrusak.php';" data-toggle="tooltip" data-placement="bottom" title="Kembali" class="btn bg-orange float-right">
                    <i class="fas fa-times"></i></button>
                </div>
              </div> <!-- /.card-body -->
            </div> <!-- /.card -->
          </div> <!-- /.col -->
        </div> <!-- /.row -->
      </section>
  </div> <!-- /.content-wrapper -->
<?php require('footernya.php') ?>

<?php 
  require('../koneksi.php');
  if (isset($_POST['simpan'])) {
    $idbarang    = $_REQUEST['idbarang'];
    $tgl = $_REQUEST['tgl'];
    $kuantiti = $_REQUEST['kuantiti'];
    $ket = $_REQUEST['ket'];

      $tambah = mysqli_query($kon,"INSERT INTO barangrusak(tgl, kuantiti, idbarang, ket) VALUES ('$tgl','$kuantiti','$idbarang','$ket')");
      if($tambah){
        ?> <script>alert('Berhasil Disimpan');window.location='barangrusak.php';</script> <?php
      }else{
        ?> <script>alert('Gagal');window.location='barangrusak_input.php';</script> <?php
      }
  }
 ?>