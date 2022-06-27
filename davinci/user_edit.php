<?php require('headernya.php');
	$id = $_GET['id'];
	$query = mysqli_query($kon, "SELECT * FROM user WHERE id = '$id'");
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
                <h2 style="display:inline;"><button class="btn btn-default" type="button" data-toggle="tooltip" data-placement="bottom" title="Ubah"><i class="fas fa-edit"></i></button> Data Pengguna <?= $skuy['nama'] ?></h2>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="" method="POST" autocomplete="off">
                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="nama" value="<?= $data['nama'] ?>">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" value="<?= $data['password'] ?>">
                  </div>
                  <div class="form-group">
                    <label>Telp</label>
                    <input type="number" class="form-control" name="telp" value="<?= $data['telp'] ?>">
                  </div>
                  <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control"><?= $data['alamat'] ?></textarea>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" name="simpan" class="btn btn-dark" data-toggle="tooltip" data-placement="bottom" title="Simpan"><i class="fas fa-check"></i></button>
                  <button type="button" onclick="window.location='user.php';" data-toggle="tooltip" data-placement="bottom" title="Kembali" class="btn bg-orange float-right">
                    <i class="fas fa-times"></i></button>
                </div>
            	</div>
            </div> <!-- /.card -->
          </div> <!-- /.col -->
        </div> <!-- /.row -->
      </section>
  </div> <!-- /.content-wrapper -->
<?php require('footernya.php') ?>

<?php 
  require('../koneksi.php');
  if (isset($_POST['simpan'])) {
    $nama     = $_REQUEST['nama'];
    $password = $_REQUEST['password'];
    $telp     = $_REQUEST['telp'];
    $alamat   = $_REQUEST['alamat'];

    $ubah = mysqli_query($kon,"UPDATE user SET password='$password', alamat='$alamat', telp='$telp', nama='$nama' WHERE id = '$id'");
    if($ubah){
      ?> <script>alert('Berhasil Diperbaharui');window.location='user.php';</script> <?php
    }else{
      ?> <script>alert('Gagal Diperbaharui');window.location='user_edit.php?id=<?=$id?>';</script> <?php
    }
  }
 ?>