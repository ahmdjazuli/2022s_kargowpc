<?php require('headernya.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br><br>
    <section class="content">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-12">
            <div class="card">
              <div class="card-header">
                <h2 style="display:inline;"><button class="btn btn-default" type="button" data-toggle="tooltip" data-placement="bottom" title="Tambah"><i class="fas fa-folder-plus"></i></button> Data Pengiriman</h2>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="" method="POST" autocomplete="off">
                  <div class="form-group">
                    <label>No. Resi</label>
                    <input type="number" class="form-control" placeholder="ex : 2021121301" maxlength="10" name="noresi" required>
                  </div>
                  <div class="form-group">
                    <label>Tanggal Kirim</label>
                    <input type="date" class="form-control" name="tglkirim" required>
                  </div>
                  <div class="form-group">
                    <label>Tanggal Terima</label>
                    <input type="date" class="form-control" name="tglterima" required>
                  </div>
                  <div class="form-group">
                    <label>No. Transaksi</label>
                    <select name="idtransaksi" class="form-control" required>
                      <option value="">Pilih</option>
                    <?php
                      $ahay = mysqli_query($kon, "SELECT transaksi.idtransaksi,user.nama,transaksi.total,kirim.noresi FROM transaksi INNER JOIN user ON transaksi.id = user.id LEFT JOIN kirim ON kirim.idtransaksi = transaksi.idtransaksi");
                        while($baris = mysqli_fetch_array($ahay)) {
                          if($baris['noresi']==''){
                            echo "<option value='$baris[idtransaksi]'>$baris[idtransaksi] - atas nama $baris[nama] dengan pembayaran Rp. $baris[total]</option>";
                          } 
                        } 
                      ?>
                  </select>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" name="simpan" class="btn btn-dark" data-toggle="tooltip" data-placement="bottom" title="Simpan"><i class="far fa-handshake"></i></button>
                  <button type="button" onclick="window.location='beli.php';" data-toggle="tooltip" data-placement="bottom" title="Kembali" class="btn btn-danger float-right">
                    <i class="far fa-window-close"></i></button>
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
    $noresi      = $_REQUEST['noresi'];
    $idtransaksi = $_REQUEST['idtransaksi'];
    $tglterima   = $_REQUEST['tglterima'];
    $tglkirim    = $_REQUEST['tglkirim'];

    $tambah = mysqli_query($kon,"INSERT INTO kirim(noresi, idtransaksi, tglterima, tglkirim) VALUES ('$noresi','$idtransaksi','$tglterima','$tglkirim')");
    if($tambah){
      ?> <script>alert('Berhasil Disimpan');window.location='kirim.php';</script> <?php
    }else{
      ?> <script>alert('Gagal');window.location='kirim_input.php';</script> <?php
    }
  }
 ?>