<?php require('headernya.php');
	$idbarangrusak = $_GET['idbarangrusak'];
	$query = mysqli_query($kon, "SELECT * FROM barangrusak INNER JOIN barang ON barangrusak.idbarang = barang.idbarang WHERE idbarangrusak = '$idbarangrusak'");
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
                <h2 style="display:inline;"><button class="btn btn-default" type="button" data-toggle="tooltip" data-placement="bottom" title="Ubah"><i class="fas fa-edit"></i></button> Barang Rusak</h2>
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
                    <label>Keterangan</label>
                    <input type="text" class="form-control" name="ket" value="<?= $data['ket'] ?>">
                  </div>
                  <div class="form-group">
                    <label>Jumlah</label>
                    <input type="number" class="form-control" name="kuantiti" value="<?= $data['kuantiti'] ?>">
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" name="simpan" class="btn btn-dark" data-toggle="tooltip" data-placement="bottom" title="Simpan"><i class="fas fa-check"></i></button>
                  <button type="button" onclick="window.location='barangrusak.php';" data-toggle="tooltip" data-placement="bottom" title="Kembali" class="btn bg-orange float-right">
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
    $tgl      = $_REQUEST['tgl'];
    $kuantiti = $_REQUEST['kuantiti'];
    $ket      = $_REQUEST['ket'];

    $ubah = mysqli_query($kon,"UPDATE barangrusak SET kuantiti='$kuantiti', tgl='$tgl', ket = '$ket' WHERE idbarangrusak = '$idbarangrusak'");
    if($ubah){
      ?> <script>alert('Berhasil Diperbaharui');window.location='barangrusak.php';</script> <?php
    }else{
      ?> <script>alert('Gagal Diperbaharui');window.location='barangrusak_edit.php?idbarangrusak=<?=$idbarangrusak?>';</script> <?php
    }
  }
 ?>