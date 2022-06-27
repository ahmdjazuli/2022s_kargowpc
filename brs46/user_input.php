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
                <h2 style="display:inline;"><button class="btn btn-default" type="button" data-toggle="tooltip" data-placement="bottom" title="Tambah"><i class="fas fa-folder-plus"></i></button> Data Pengguna</h2>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="" method="POST" autocomplete="off">
                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="nama">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password">
                  </div>
                  <div class="form-group">
                    <label>No. Telp</label>
                    <input type="telp" class="form-control" name="telp">
                  </div>
                  <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <label>Pengguna</label>
                    <select class="form-control" name="level">
                      <option value="teknisi">Teknisi</option>
                      <option value="pelanggan">Pelanggan</option>
                    </select>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" name="simpan" class="btn btn-dark" data-toggle="tooltip" data-placement="bottom" title="Simpan"><i class="fas fa-check"></i></button>
                  <button type="button" onclick="window.location='user.php';" data-toggle="tooltip" data-placement="bottom" title="Kembali" class="btn bg-orange float-right">
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
    $nama     = $_REQUEST['nama'];
    $password = $_REQUEST['password'];
    $telp     = $_REQUEST['telp'];
    $alamat   = $_REQUEST['alamat'];
    $level   = $_REQUEST['level'];

    $cek = mysqli_query($kon, "SELECT * FROM user WHERE telp='$telp'");

    if(mysqli_num_rows($cek)>0){
        ?> <script>alert('No. Telepon Sudah Digunakan');window.location='user_input.php';</script> <?php
    }else{
        $tambah = mysqli_query($kon,"INSERT INTO user(alamat, nama, password, telp, level) VALUES ('$alamat','$nama','$password','$telp','$level')");
        if($tambah){
          ?> <script>alert('Berhasil Disimpan');window.location='user.php';</script> <?php
        }else{
          ?> <script>alert('Gagal');window.location='user_input.php';</script> <?php
        }
    }
  }
 ?>