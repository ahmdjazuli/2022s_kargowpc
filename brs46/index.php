<?php 
  require('headernya.php');
  error_reporting(1);

  $se= mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM pengaturan WHERE id = 1"));
   $kirim = mysqli_num_rows(mysqli_query($kon, "SELECT * FROM kirim"));
   $qc = mysqli_num_rows(mysqli_query($kon, "SELECT * FROM qc"));
   $barangrusak = mysqli_num_rows(mysqli_query($kon, "SELECT * FROM barangrusak"));
   $pendapatan     = mysqli_num_rows(mysqli_query($kon, "SELECT DATE(tgltransaksi) as hari FROM transaksi GROUP BY hari"));
   $pendapatan1     = mysqli_num_rows(mysqli_query($kon, "SELECT MONTH(tgltransaksi) as bulan FROM transaksi GROUP BY bulan"));
   $transaksi   = mysqli_num_rows(mysqli_query($kon, "SELECT * FROM `transaksi` INNER JOIN user ON transaksi.id = user.id INNER JOIN barang ON transaksi.idbarang = barang.idbarang"));
   $barangmasuk      = mysqli_num_rows(mysqli_query($kon, "SELECT * FROM barangmasuk"));
   $barang      = mysqli_num_rows(mysqli_query($kon, "SELECT * FROM barang"));
   $user      = mysqli_num_rows(mysqli_query($kon, "SELECT * FROM user"));
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
            <a href="barang.php">
            <div class="info-box bg-primary">
              <span class="info-box-icon" style="font-size: 50px">
                <i class="fas fa-coins"></i></span>
              <div class="info-box-content">
                <span class="info-box-text"><b>Barang</b></span>
                <span class="info-box-number" style="font-size: 25px;"><?= $barang ?></span>
              </div>
            </div>
            </a>
          </div>

          <div class="col-md-4 col-sm-6 col-12">
            <a href="barangmasuk.php">
            <div class="info-box bg-dark">
              <span class="info-box-icon" style="font-size: 50px">
                <i class="fas fa-shopping-basket"></i></span>
              <div class="info-box-content">
                <span class="info-box-text"><b>Barang Masuk</b></span>
                <span class="info-box-number" style="font-size: 25px;"><?= $barangmasuk ?></span>
              </div>
            </div>
            </a>
          </div>

          <div class="col-md-3 col-sm-6 col-12">
            <a href="qc.php">
            <div class="info-box bg-dark">
              <span class="info-box-icon" style="font-size: 50px">
                <i class="fas fa-gem"></i></span>
              <div class="info-box-content">
                <span class="info-box-text"><b>Quality Check</b></span>
                <span class="info-box-number" style="font-size: 25px;"><?= $qc ?></span>
              </div>
            </div>
            </a>
          </div>

          <div class="col-md-3 col-sm-6 col-12">
            <a href="barangrusak.php">
            <div class="info-box bg-dark">
              <span class="info-box-icon" style="font-size: 50px">
                <i class="fas fa-dragon"></i></span>
              <div class="info-box-content">
                <span class="info-box-text"><b>Barang Rusak</b></span>
                <span class="info-box-number" style="font-size: 25px;"><?= $barangrusak ?></span>
              </div>
            </div>
            </a>
          </div>

          <div class="col-md-3 col-sm-6 col-12">
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

          <div class="col-md-3 col-sm-6 col-12">
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

          <div class="col-md-4 col-sm-6 col-12">
            <a href="pendapatan.php">
            <div class="info-box bg-dark">
              <span class="info-box-icon" style="font-size: 50px">
                <i class="fas fa-dollar-sign"></i></span>
              <div class="info-box-content">
                <span class="info-box-text"><b>Pendapatan Harian</b></span>
                <span class="info-box-number" style="font-size: 25px;"><?= $pendapatan ?></span>
              </div>
            </div>
            </a>
          </div>
          
          <div class="col-md-4 col-sm-6 col-12">
            <a href="pendapatan1.php">
            <div class="info-box bg-dark">
              <span class="info-box-icon" style="font-size: 50px">
                <i class="fas fa-dollar-sign"></i></span>
              <div class="info-box-content">
                <span class="info-box-text"><b>Pendapatan Bulanan</b></span>
                <span class="info-box-number" style="font-size: 25px;"><?= $pendapatan1 ?></span>
              </div>
            </div>
            </a>
          </div>

          <div class="col-md-4 col-sm-6 col-12">
            <a href="grafik.php">
            <div class="info-box bg-dark">
              <span class="info-box-icon" style="font-size: 50px">
                <i class="fas fa-money-bill"></i></span>
              <div class="info-box-content">
                <span class="info-box-text"><b>Grafik Pendapatan Bulanan</b></span>
                <span class="info-box-number" style="font-size: 25px;"></span>
              </div>
            </div>
            </a>
          </div>
        </div> <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div> 
</div><!-- /.content wrapper -->

<?php require('footernya.php') ?>
