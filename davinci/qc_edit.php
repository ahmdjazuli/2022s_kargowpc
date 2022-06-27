<?php require('headernya.php');
	$idqc = $_GET['idqc'];
	$query = mysqli_query($kon, "SELECT * FROM qc JOIN barangmasuk ON qc.idbarangmasuk = barangmasuk.idbarangmasuk JOIN barang ON barangmasuk.idbarang = barang.idbarang JOIN user ON qc.id = user.id WHERE idqc = '$idqc'");
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
                <h2 style="display:inline;"><button class="btn btn-default" type="button" data-toggle="tooltip" data-placement="bottom" title="Ubah"><i class="fas fa-edit"></i></button> Quality Check</h2>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="" method="POST" autocomplete="off">
                  <div class="form-group">
                      <label>Tanggal</label>
                      <input type="datetime" class="form-control" readonly value="<?= date('Y-m-d\ H:i',strtotime($data['tglqc'])) ?>">
                  </div>
                  <div class="form-group">
                      <label>Nama Teknisi</label>
                      <input type="text" class="form-control" readonly value="<?= $data['nama'] ?>">
                  </div>
                  <div class="form-group">
                      <label>Nama Barang</label>
                      <input type="text" class="form-control" readonly value="<?= $data['namabarang'] ?>">
                  </div>
                  <div class="form-group">
                      <label>Distributor</label>
                      <input type="text" class="form-control" readonly value="<?= $data['distributor'] ?>">
                  </div>
                  <div class="form-group">
                      <label>Analisis Blanko untuk Kontrol Kontaminasi</label><br>
                      <?php if($data['mutu1'] == 1){ ?>
                          <input type="radio" name="mutu1" value="1" checked> Baik
                          <input type="radio" name="mutu1" value="0"> Tidak<br>
                      <?php }else{ ?>
                          <input type="radio" name="mutu1" value="1"> Baik
                          <input type="radio" name="mutu1" value="0" checked> Tidak<br>
                      <?php } ?>
                  </div>
                  <div class="form-group">
                      <label>Analisis Duplo untuk kontrol keteliatian analisis</label><br>
                      <?php if($data['mutu2'] == 1){ ?>
                          <input type="radio" name="mutu2" value="1" checked> Baik
                          <input type="radio" name="mutu2" value="0"> Tidak<br>
                      <?php }else{ ?>
                          <input type="radio" name="mutu2" value="1"> Baik
                          <input type="radio" name="mutu2" value="0" checked> Tidak<br>
                      <?php } ?>
                  </div>
                  <div class="form-group">
                      <label>Analisis CRM (<i>Certified Reference Material</i>) untuk kontrol akurasi</label><br>
                      <?php if($data['akurasi1'] == 1){ ?>
                          <input type="radio" name="akurasi1" value="1" checked> Baik
                          <input type="radio" name="akurasi1" value="0"> Tidak<br>
                      <?php }else{ ?>
                          <input type="radio" name="akurasi1" value="1"> Baik
                          <input type="radio" name="akurasi1" value="0" checked> Tidak<br>
                      <?php } ?>
                  </div>
                  <div class="form-group">
                      <label>Analisis <i>Blind Sample</i></label><br>
                      <?php if($data['akurasi2'] == 1){ ?>
                          <input type="radio" name="akurasi2" value="1" checked> Baik
                          <input type="radio" name="akurasi2" value="0"> Tidak<br>
                      <?php }else{ ?>
                          <input type="radio" name="akurasi2" value="1"> Baik
                          <input type="radio" name="akurasi2" value="0" checked> Tidak<br>
                      <?php } ?>
                  </div>
                  <div class="form-group">
                      <label>Kesimpulan Akhir Quality Check</label><br>
                      <select name="kesimpulan" class="form-control" required>
                          <option value="<?= $data['kesimpulan'] ?>"><?= $data['kesimpulan'] ?></option>
                          <option value="Baik">Baik</option>
                          <option value="Tidak (Kembalikan)">Tidak (Kembalikan)</option>
                      </select>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" name="simpan" class="btn btn-dark" data-toggle="tooltip" data-placement="bottom" title="Simpan"><i class="fas fa-check"></i></button>
                  <button type="button" onclick="window.location='qc.php';" data-toggle="tooltip" data-placement="bottom" title="Kembali" class="btn bg-orange float-right">
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
    $kesimpulan = $_REQUEST['kesimpulan'];
    $akurasi1 = $_REQUEST['akurasi1'];
    $akurasi2 = $_REQUEST['akurasi2'];
    $mutu1 = $_REQUEST['mutu1'];
    $mutu2 = $_REQUEST['mutu2'];

    $ubah = mysqli_query($kon,"UPDATE qc SET kesimpulan='$kesimpulan',akurasi1='$akurasi1',akurasi2='$akurasi2',mutu1='$mutu1',mutu2='$mutu2' WHERE idqc = '$idqc'");
    if($ubah){
      ?> <script>alert('Berhasil Diperbaharui');window.location='qc.php';</script> <?php
    }else{
      ?> <script>alert('Gagal Diperbaharui');window.location='qc_edit.php?idqc=<?=$idqc?>';</script> <?php
    }
  }
 ?>