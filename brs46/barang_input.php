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
                <h2 style="display:inline;"><button class="btn btn-dark" type="button" data-toggle="tooltip" data-placement="bottom" title="Tambah"><i class="fas fa-folder-plus"></i></button> Data Barang</h2>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="" method="POST">
                  <div class="form-group">
                    <label>Kode Barang</label>
                    <input type="text" class="form-control" name="kode">
                  </div>
                  <div class="form-group">
                    <label>Nama Barang</label>
                    <input type="text" class="form-control" name="namabarang">
                  </div>
                  <div class="form-group">
                    <label>Jenis</label>
                    <input type="text" class="form-control" name="jenis">
                  </div>
                  <div class="form-group">
                    <label>Berat</label>
                    <input type="text" class="form-control" name="berat">
                  </div>
                  <div class="form-group">
                    <label>Jumlah</label>
                    <input type="number" class="form-control" name="jumlah">
                  </div>
                  <div class="form-group">
                    <label>Harga</label>
                    <input type="number" class="form-control" name="harga">
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" name="simpan" class="btn btn-dark" data-toggle="tooltip" data-placement="bottom" title="Simpan"><i class="fas fa-check"></i></button>
                  <button type="button" onclick="window.location='barang.php';" data-toggle="tooltip" data-placement="bottom" title="Kembali" class="btn bg-orange float-right">
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
        
    $hasil = mysqli_query($kon,"INSERT INTO barang (namabarang, jenis, jumlah, kode, berat, harga) VALUES ('$namabarang','$jenis','$jumlah','$kode','$berat','$harga')");

    if($hasil){
      ?> <script>alert('Berhasil Disimpan!'); window.location = 'barang.php';</script><?php
    }else{
      ?> <script>alert('Gagal, cek kembali!.'); window.location = 'barang_input.php';</script><?php
    }
  } 
?>