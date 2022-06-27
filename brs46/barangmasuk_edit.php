<?php require('headernya.php');
	$idbarangmasuk = $_GET['idbarangmasuk'];
	$query = mysqli_query($kon, "SELECT * FROM barangmasuk INNER JOIN barang ON barangmasuk.idbarang = barang.idbarang WHERE idbarangmasuk = '$idbarangmasuk'");
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
                <h2 style="display:inline;"><button class="btn btn-default" type="button" data-toggle="tooltip" data-placement="bottom" title="Ubah"><i class="fas fa-edit"></i></button> Barang Masuk</h2>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="" method="POST" autocomplete="off">
                  <div class="form-group">
                    <label>Tanggal</label>
                    <input type="date" class="form-control" name="tgl" value="<?= $data['tgl'] ?>">
                  </div>
                  <td>
                  <div class="form-group">
                    <label>Nama Barang</label>
                    <input type="text" class="form-control" name="namabarang" value="<?= $data['namabarang']?>" readonly>
                  </div>
                  <div class="form-group">
                    <label>Distributor</label>
                    <input type="text" class="form-control" name="distributor" value="<?= $data['distributor'] ?>">
                  </div>
                  <div class="form-group">
                    <label>Jumlah</label>
                    <input type="number" class="form-control" name="kuantiti" value="<?= $data['kuantiti'] ?>">
                  </div>
                  <div class="form-group">
                    <label>Harga</label>
                    <input type="number" class="form-control" name="hargamasuk" value="<?= $data['hargamasuk'] ?>">
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" name="simpan" class="btn btn-dark" data-toggle="tooltip" data-placement="bottom" title="Simpan"><i class="fas fa-check"></i></button>
                  <button type="button" onclick="window.location='barangmasuk.php';" data-toggle="tooltip" data-placement="bottom" title="Kembali" class="btn bg-orange float-right">
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
    $tgl = $_REQUEST['tgl'];
    $kuantiti = $_REQUEST['kuantiti'];
    $hargamasuk = $_REQUEST['hargamasuk'];
    $distributor = $_REQUEST['distributor'];

    $ubah = mysqli_query($kon,"UPDATE barangmasuk SET hargamasuk='$hargamasuk', kuantiti='$kuantiti', tgl='$tgl', distributor = '$distributor' WHERE idbarangmasuk = '$idbarangmasuk'");
    if($ubah){
      ?> <script>alert('Berhasil Diperbaharui');window.location='barangmasuk.php';</script> <?php
    }else{
      ?> <script>alert('Gagal Diperbaharui');window.location='barangmasuk_edit.php?idbarangmasuk=<?=$idbarangmasuk?>';</script> <?php
    }
  }
 ?>