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
                <h2 style="display:inline;"><button class="btn btn-dark" type="button" data-toggle="tooltip" data-placement="bottom" title="Tambah"><i class="fas fa-folder-plus"></i></button> Data Transaksi</h2>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Tanggal Transaksi</label>
                    <input type="date" class="form-control" name="tgltransaksi">
                  </div>
                  <div class="form-group">
                    <label>Nama Pelanggan</label>
                    <select name="id" class="form-control" required>
                      <option value="">-Pilih-</option>
                    <?php
                      $ahay = mysqli_query($kon, "SELECT * FROM user WHERE level = 'pelanggan' ORDER BY nama ASC");
                        while($baris = mysqli_fetch_array($ahay)) {
                          echo "<option value='$baris[id]'>$baris[nama]</option>";
                        } 
                      ?>
                  </select>
                  </div>
                  <div class="form-group">
                    <label>Nama Barang</label>
                    <select name="idbarang" class="form-control" onchange='ubah(this.value)' required>
                      <option value="">-Pilih-</option>
                    <?php
                      $ahay = mysqli_query($kon, "SELECT * FROM barang ORDER BY namabarang ASC");
                      $b    = "var harga = new Array();\n;";
                      $a    = "var jumlah = new Array();\n;";
                        while($baris = mysqli_fetch_array($ahay)) {
                          echo "<option value='$baris[idbarang]'>$baris[namabarang]</option>";
                          $b .= "harga['" . $baris['idbarang'] . "'] = {harga:'" . addslashes($baris['harga'])."'};\n";
                          $a .= "jumlah['" . $baris['idbarang'] . "'] = {jumlah:'" . addslashes($baris['jumlah'])."'};\n";
                        } 
                      ?>
                  </select>
                  </div>
                </div>
              </div>
              </div>
              <div class="col-md-6 col-sm-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <form action="" method="POST" autocomplete="off">
                  <div class="form-group">
                    <label>Jumlah</label>
                    <input type="number" class="form-control" id="jumlah" name="jumlahnya" required>
                  </div>
                  <div class="form-group">
                    <label>Harga Barang</label>
                    <input type="number" class="form-control" id="harga" name="harga" readonly required>
                  </div>
                  <div class="form-group">
                    <label>Bukti Pembayaran</label>
                    <input type="file" class="form-control" name="gambar">
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" name="simpan" class="btn btn-dark" data-toggle="tooltip" data-placement="bottom" title="Simpan"><i class="fas fa-check"></i></button>
                  <button type="button" onclick="window.location='transaksi.php';" data-toggle="tooltip" data-placement="bottom" title="Kembali" class="btn bg-orange float-right">
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
    $idbarang     = $_REQUEST['idbarang'];
    $tgltransaksi = $_REQUEST['tgltransaksi'];
    $id           = $_REQUEST['id'];
    $harga        = $_REQUEST['harga'];
    $jumlahnya    = $_REQUEST['jumlahnya'];
    $total        = $jumlahnya*$harga;

    $ekstensi_diperbolehkan = array('png','jpg','jpeg');
    $namafoto               = $_FILES['gambar']['name'];
    $x                      = explode('.', $namafoto);
    $ekstensi               = strtolower(end($x));
    $ukuran                 = $_FILES['gambar']['size'];
    $file_tmp               = $_FILES['gambar']['tmp_name'];

    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
      if($ukuran < 2048000){  
        $namabaru = rand(1000,9999).preg_replace("/[^a-zA-Z0-9]/", ".", $namafoto);   
        move_uploaded_file($file_tmp, '../images/'.$namabaru);
        
        $hasil = mysqli_query($kon,"INSERT INTO transaksi (idbarang, tgltransaksi, id, total, jumlahnya, gambar) VALUES ('$idbarang','$tgltransaksi','$id','$total','$jumlahnya','$namabaru')");

        if($hasil){
          ?> <script>alert('Berhasil Disimpan!'); window.location = 'transaksi.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'transaksi_input.php';</script><?php
        }
      }else{
        ?> <script>alert('Gagal, Ukuran File Maksimal 2MB!'); window.location = 'transaksi_input.php';</script><?php
      }
    }else{
      ?> <script>alert('Gagal, File yang diupload format jpg, jpeg atau png!'); window.location = 'transaksi_input.php';</script><?php
    }    
}?>
<script> <?php echo $b.$a; ?>
  function ubah(id){  
      document.getElementById('harga').value = harga[id].harga; 
      document.getElementById('jumlah').max = jumlah[id].jumlah; 
  };   
</script> 