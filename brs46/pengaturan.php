<?php require('headernya.php');
	$query = mysqli_query($kon, "SELECT * FROM pengaturan WHERE id = '1'");
	$data  = mysqli_fetch_array($query);
?>
<style>
  .imutdong{
    width: 40px;height: 40px; border:2px solid black;
  }
</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <section class="content">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-12">
            <div class="card">
              <div class="card-header">
                <h2 style="display:inline;"><button class="btn btn-dark" type="button" data-toggle="tooltip" data-placement="bottom" title="Ubah"><i class="fas fa-wrench"></i></button> Tampilan Halaman Utama</h2>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="" method="POST" autocomplete="off">
                  <div class="form-group">
                    <h5>Ukuran Teks Halaman Admin</h5>
                    <select class="form-control" name="ukuran_teks">
                      <?php 
                        if($data['ukuran_teks']=='text-sm'){?>
                          <option value="text-sm">Kecil</option>
                          <option value="text-md">Sedang</option>
                          <option value="text-lg">Besar</option>
                        <?php }else if($data['ukuran_teks']=='text-md'){?>
                          <option value="text-md">Sedang</option>
                          <option value="text-sm">Kecil</option>
                          <option value="text-lg">Besar</option>
                        <?php }else if($data['ukuran_teks']=='text-lg'){?>
                          <option value="text-lg">Besar</option>
                          <option value="text-sm">Kecil</option>
                          <option value="text-md">Sedang</option>
                        <?php }
                      ?>
                    </select>
                  </div>
                  <h5>Halaman Utama</h5>
                  <label>Tulisan 1</label>
                  <div class="d-flex flex-wrap">
                    <input type="text" name="tulisan1" class="form-control" value="<?= $data['tulisan1'] ?>">
                  </div>
                  <label>Tulisan 2</label>
                  <div class="d-flex flex-wrap">
                    <input type="text" name="tulisan2" class="form-control" value="<?= $data['tulisan2'] ?>">
                  </div>
                  <label>Tulisan 3</label>
                  <div class="d-flex flex-wrap">
                    <input type="text" name="tulisan3" class="form-control" value="<?= $data['tulisan3'] ?>">
                  </div>
                  <label>Tulisan 4</label>
                  <div class="d-flex flex-wrap">
                    <input type="text" name="tulisan4" class="form-control" value="<?= $data['tulisan4'] ?>">
                  </div><br>
                  <h5>Halaman Latar Belakang</h5>
                  <label>keterangan</label>
                  <div class="d-flex flex-wrap">
                    <textarea name="latarbelakang" class="form-control" rows="4"><?= $data['latarbelakang'] ?></textarea>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" name="simpan" class="btn btn-dark" data-toggle="tooltip" data-placement="bottom" title="Simpan"><i class="fas fa-check"></i></button>
                  <button type="reset" data-toggle="tooltip" data-placement="bottom" title="Reset" class="btn bg-orange float-right">
                    <i class="fas fa-sync-alt"></i></button>
                </div>
              </form>
              </div>
            </div>
          <div class="col-md-6 col-sm-12">
            <div class="card">
              <div class="card-header">
                <h2 style="display:inline;"><button class="btn btn-dark" type="button" data-toggle="tooltip" data-placement="bottom" title="Ubah"><i class="fas fa-wrench"></i></button> Tampilan Halaman Utama</h2>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="" method="POST" autocomplete="off" enctype="multipart/form-data">
                  <label>Ubah Gambar 1</label>
                  <div class="d-flex flex-wrap">
                    <input type="file" name="gambar1" class="form-control">
                    <input type="hidden" name="fotoLama1" value="<?= $data['gambar1'] ?>">
                  </div>
                  <label>Ubah Gambar 2</label>
                  <div class="d-flex flex-wrap">
                    <input type="file" name="gambar2" class="form-control">
                    <input type="hidden" name="fotoLama2" value="<?= $data['gambar2'] ?>">
                  </div>
                  <label>Ubah Gambar 3</label>
                  <div class="d-flex flex-wrap">
                    <input type="file" name="gambar3" class="form-control">
                    <input type="hidden" name="fotoLama3" value="<?= $data['gambar3'] ?>">
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" name="simpan2" class="btn btn-dark" data-toggle="tooltip" data-placement="bottom" title="Simpan"><i class="fas fa-check"></i></button>
                  <button type="reset" data-toggle="tooltip" data-placement="bottom" title="Reset" class="btn bg-orange float-right">
                    <i class="fas fa-sync-alt"></i></button>
                </div>
                </form>
            	</div>
            </div>
        </div> <!-- /.row -->
      </section>
  </div> <!-- /.content-wrapper -->
<?php require('footernya.php') ?>

<?php 
  require('../koneksi.php');
  if (isset($_POST['simpan'])) {
    $ukuran_teks   = $_REQUEST['ukuran_teks'];
    $tulisan1      = $_REQUEST['tulisan1'];
    $tulisan2      = $_REQUEST['tulisan2'];
    $tulisan3      = $_REQUEST['tulisan3'];
    $tulisan4      = $_REQUEST['tulisan4'];
    $latarbelakang = $_REQUEST['latarbelakang'];

    $ubah = mysqli_query($kon,"UPDATE pengaturan SET ukuran_teks='$ukuran_teks', tulisan4='$tulisan4', tulisan3='$tulisan3', tulisan2='$tulisan2', tulisan1='$tulisan1', latarbelakang='$latarbelakang'");
    if($ubah){
      ?> <script>alert('Berhasil Diperbaharui');window.location='pengaturan.php';</script> <?php
    }else{
      ?> <script>alert('Gagal Diperbaharui');</script> <?php
    }
  }

  if (isset($_POST['simpan2'])) {
    $namafoto1 = $_FILES['gambar1']['name'];
    $file_tmp1 = $_FILES['gambar1']['tmp_name'];
    $fotoLama1 = $_REQUEST['fotoLama1'];
    $namabaru1 = rand(1000,9999).preg_replace("/[^a-zA-Z0-9]/", ".", $namafoto1);   
    move_uploaded_file($file_tmp1, '../images/'.$namabaru1);
    unlink('../images/'.$fotoLama1);

    $namafoto2 = $_FILES['gambar2']['name'];
    $file_tmp2 = $_FILES['gambar2']['tmp_name'];
    $fotoLama2 = $_REQUEST['fotoLama2'];
    $namabaru2 = rand(1000,9999).preg_replace("/[^a-zA-Z0-9]/", ".", $namafoto2);   
    move_uploaded_file($file_tmp2, '../images/'.$namabaru2);
    unlink('../images/'.$fotoLama2);

    $namafoto3 = $_FILES['gambar3']['name'];
    $file_tmp3 = $_FILES['gambar3']['tmp_name'];
    $fotoLama3 = $_REQUEST['fotoLama3'];
    $namabaru3 = rand(1000,9999).preg_replace("/[^a-zA-Z0-9]/", ".", $namafoto3);   
    move_uploaded_file($file_tmp3, '../images/'.$namabaru3);
    unlink('../images/'.$fotoLama3);

    $ubah = mysqli_query($kon,"UPDATE pengaturan SET gambar1='$namabaru1', gambar2='$namabaru2', gambar3='$namabaru3'");
    if($ubah){
      ?> <script>alert('Berhasil Diperbaharui');window.location='pengaturan.php';</script> <?php
    }else{
      ?> <script>alert('Gagal Diperbaharui');</script> <?php
    }
  }
 ?>