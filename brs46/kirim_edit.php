<?php require('headernya.php');
	$noresi = $_GET['noresi'];
	$query = mysqli_query($kon, "SELECT * FROM kirim WHERE noresi = '$noresi'");
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
                <h2 style="display:inline;"><button class="btn btn-default" type="button" data-toggle="tooltip" data-placement="bottom" title="Ubah"><i class="fas fa-edit"></i></button> Data Pengiriman</h2>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="" method="POST" autocomplete="off">
                  <div class="form-group">
                    <label>Tanggal Kirim</label>
                    <input type="date" class="form-control" name="tglkirim" value="<?= $data['tglkirim'] ?>" required>
                  </div>
                  <div class="form-group">
                    <label>Tanggal Terima</label>
                    <input type="date" class="form-control" name="tglterima" value="<?= $data['tglterima'] ?>" required>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" name="simpan" class="btn btn-dark" data-toggle="tooltip" data-placement="bottom" title="Simpan"><i class="far fa-handshake"></i></button>
                  <button type="button" onclick="window.location='kirim.php';" data-toggle="tooltip" data-placement="bottom" title="Kembali" class="btn btn-danger float-right">
                    <i class="far fa-window-close"></i></button>
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
    $tglterima   = $_REQUEST['tglterima'];
    $tglkirim    = $_REQUEST['tglkirim'];

    $ubah = mysqli_query($kon,"UPDATE kirim SET tglkirim='$tglkirim', tglterima='$tglterima' WHERE noresi = '$noresi'");
    if($ubah){
      ?> <script>alert('Berhasil Diperbaharui');window.location='kirim.php';</script> <?php
    }else{
      ?> <script>alert('Gagal Diperbaharui');window.location='kirim_edit.php?noresi=<?=$noresi?>';</script> <?php
    }
  }
 ?>