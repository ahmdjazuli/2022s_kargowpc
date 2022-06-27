<?php require('headernya.php');
	$idtransaksi = $_GET['idtransaksi'];
	$query = mysqli_query($kon, "SELECT * FROM `transaksi` INNER JOIN user ON transaksi.id = user.id INNER JOIN barang ON transaksi.idbarang = barang.idbarang WHERE idtransaksi = '$idtransaksi'");
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
                <h2 style="display:inline;"><button class="btn btn-default" type="button" data-toggle="tooltip" data-placement="bottom" title="Ubah"><i class="fas fa-edit"></i></button> Data Transaksi</h2>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="" method="POST" autocomplete="off" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Tanggal Transaksi</label>
                    <input type="date" class="form-control" name="tgltransaksi" value="<?= $data['tgltransaksi']?>">
                  </div>
                  <div class="form-group">
                    <label>Nama Barang</label>
                    <input type="text" class="form-control" value="<?= $data['namabarang']?>" readonly>
                  </div>
                  <div class="form-group">
                    <label>Harga</label>
                    <input type="number" class="form-control" name="harga" value="<?= $data['harga']?>" readonly>
                  </div>
                  <div class="form-group">
                    <label>Jumlah</label>
                    <input type="number" class="form-control" name="jumlahnya" value="<?= $data['jumlahnya']?>" max="<?= $data['jumlah']+$data['jumlahnya'] ?>" required>
                  </div>
                  <div class="form-group">
                    <label>Ubah Bukti Pembayaran</label>
                    <input type="file" class="form-control" name="foto">
                    <input type="hidden" name="fotoLama" value="<?= $data['gambar'] ?>">
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" name="simpan" class="btn btn-dark" data-toggle="tooltip" data-placement="bottom" title="Simpan"><i class="fas fa-check"></i></button>
                  <button type="button" onclick="window.location='transaksi.php';" data-toggle="tooltip" data-placement="bottom" title="Kembali" class="btn bg-orange float-right">
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
    $tgltransaksi    = $_REQUEST['tgltransaksi'];
    $jumlahnya    = $_REQUEST['jumlahnya'];
    $harga    = $_REQUEST['harga'];
    $total    = $harga*$jumlahnya;

    $ekstensi_diperbolehkan = array('png','jpg','jpeg');
    $namafoto = $_FILES['foto']['name'];
    $x = explode('.', $namafoto);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['foto']['size'];
    $file_tmp = $_FILES['foto']['tmp_name'];
    $foto     = $_FILES['foto']['error'];
    $fotoLama  = $_REQUEST['fotoLama'];

    if($foto){
      $ubah = mysqli_query($kon,"UPDATE transaksi SET tgltransaksi='$tgltransaksi', total='$total', jumlahnya = '$jumlahnya', gambar = '$fotoLama' WHERE idtransaksi = '$idtransaksi'");
      ?> <script>alert('Berhasil Diperbaharui, tanpa Mengubah Foto');window.location='transaksi.php';</script> <?php
    }else{
      if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        if($ukuran < 10240000){  
          $namabaru = rand(1000,9999).preg_replace("/[^a-zA-Z0-9]/", ".", $namafoto);   
          move_uploaded_file($file_tmp, '../images/'.$namabaru);
          unlink("../images/".$fotoLama);
          $ubah = mysqli_query($kon,"UPDATE transaksi SET tgltransaksi='$tgltransaksi', total='$total', jumlahnya = '$jumlahnya', gambar = '$namabaru' WHERE idtransaksi = '$idtransaksi'");
          
          if($ubah){
            ?> <script>alert('Berhasil Diperbaharui');window.location='transaksi.php';</script> <?php
          }else{
            ?> <script>alert('Gagal Diperbaharui');window.location='transaksi_edit.php?idtransaksi=<?=$idtransaksi?>';</script> <?php
          }
        }else{
          ?> <script>alert('Gagal, Ukuran File Maksimal 10MB!'); window.location = 'transaksi_edit.php?idtransaksi=<?=$idtransaksi?>';</script><?php
        }
      }else{
        ?> <script>alert('Gagal, File yang diupload format jpg, jpeg atau png!'); window.location = 'transaksi_edit.php?idtransaksi=<?=$idtransaksi?>';</script><?php
      }
    }
  }
 ?>