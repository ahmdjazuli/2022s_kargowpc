<?php require('headernya.php');
	$idbarang = $_GET['idbarang'];
	$query = mysqli_query($kon, "SELECT * FROM barang WHERE idbarang = '$idbarang'");
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
                <h2 style="display:inline;"><button class="btn btn-default" type="button" data-toggle="tooltip" data-placement="bottom" title="Ubah"><i class="fas fa-edit"></i></button> Data Barang</h2>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="" method="POST">
                  <div class="form-group">
                    <label>Kode Barang</label>
                    <input type="text" class="form-control" name="kode" value="<?= $data['kode']?>">
                  </div>
                  <div class="form-group">
                    <label>Nama Barang</label>
                    <input type="text" class="form-control" name="namabarang" value="<?= $data['namabarang']?>">
                  </div>
                  <div class="form-group">
                    <label>Jenis</label>
                    <input type="text" class="form-control" name="jenis" value="<?= $data['jenis']?>">
                  </div>
                  <div class="form-group">
                    <label>Berat</label>
                    <input type="text" class="form-control" name="berat" value="<?= $data['berat']?>">
                  </div>
                  <div class="form-group">
                    <label>Jumlah</label>
                    <input type="number" class="form-control" name="jumlah" value="<?= $data['jumlah']?>">
                  </div>
                  <div class="form-group">
                    <label>Harga</label>
                    <input type="number" class="form-control" name="harga" value="<?= $data['harga']?>">
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" name="simpan" class="btn btn-dark" data-toggle="tooltip" data-placement="bottom" title="Simpan"><i class="fas fa-check"></i></button>
                  <button type="button" onclick="window.location='user.php';" data-toggle="tooltip" data-placement="bottom" title="Kembali" class="btn bg-orange float-right">
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
    $namabarang = $_REQUEST['namabarang'];
    $jenis      = $_REQUEST['jenis'];
    $jumlah     = $_REQUEST['jumlah'];
    $kode       = $_REQUEST['kode'];
    $berat      = $_REQUEST['berat'];
    $harga      = $_REQUEST['harga'];

    $ubah = mysqli_query($kon,"UPDATE barang SET namabarang='$namabarang', kode='$kode', jenis = '$jenis', jumlah = '$jumlah', berat = '$berat', harga = '$harga' WHERE idbarang = '$idbarang'");
    if($ubah){
      ?> <script>alert('Berhasil Diperbaharui');window.location='barang.php';</script> <?php
    }else{
      ?> <script>alert('Gagal Diperbaharui');window.location='barang_edit.php?idbarang=<?=$idbarang?>';</script> <?php
    }  
} ?>