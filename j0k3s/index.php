<?php 
  require('headernya.php');
  error_reporting(1);

  $se= mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM pengaturan WHERE id = 1"));
   $kirim = mysqli_num_rows(mysqli_query($kon, "SELECT * FROM kirim INNER JOIN transaksi ON kirim.idtransaksi = transaksi.idtransaksi INNER JOIN user ON transaksi.id = user.id INNER JOIN barang ON barang.idbarang = transaksi.idbarang WHERE nama = '$skuy[nama]'"));
   $transaksi   = mysqli_num_rows(mysqli_query($kon, "SELECT * FROM `transaksi` INNER JOIN user ON transaksi.id = user.id INNER JOIN barang ON transaksi.idbarang = barang.idbarang WHERE nama = '$skuy[nama]'"));
   $user      = mysqli_num_rows(mysqli_query($kon, "SELECT * FROM user WHERE id = '$skuy[id]'"));
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br><br>
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-6 col-12">
            <a href="user.php">
            <div class="info-box bg-primary">
              <span class="info-box-icon" style="font-size: 50px">
                <i class="fas fa-user-secret"></i></span>
              <div class="info-box-content">
                <span class="info-box-text"><b>Pengguna</b></span>
                <span class="info-box-number" style="font-size: 25px;"><?= $user ?></span>
              </div>
            </div>
            </a>
          </div>

          <div class="col-md-4 col-sm-6 col-12">
            <a href="transaksi.php">
            <div class="info-box bg-dark">
              <span class="info-box-icon" style="font-size: 50px">
                <i class="fas fa-shopping-bag"></i></span>
              <div class="info-box-content">
                <span class="info-box-text"><b>Transaksi</b></span>
                <span class="info-box-number" style="font-size: 25px;"><?= $transaksi ?></span>
              </div>
            </div>
            </a>
          </div>

          <div class="col-md-4 col-sm-6 col-12">
            <a href="kirim.php">
            <div class="info-box bg-dark">
              <span class="info-box-icon" style="font-size: 50px">
                <i class="fas fa-shipping-fast"></i></span>
              <div class="info-box-content">
                <span class="info-box-text"><b>Pengiriman</b></span>
                <span class="info-box-number" style="font-size: 25px;"><?= $kirim ?></span>
              </div>
            </div>
            </a>
          </div>
        
        </div> <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div> 
</div><!-- /.content wrapper -->

<?php require('footernya.php') ?>
