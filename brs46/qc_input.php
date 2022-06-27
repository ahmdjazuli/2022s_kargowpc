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
                <h2 style="display:inline;"><button class="btn btn-default" type="button" data-toggle="tooltip" data-placement="bottom" title="Tambah"><i class="fas fa-folder-plus"></i></button> Quality Check</h2>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="" method="POST" autocomplete="off">
                  <div class="form-group">
                    <label>Barang Masuk</label>
                    <select name="idbarangmasuk" class="form-control" required onchange='ubah(this.value)'>
                      <option value="">-Pilih-</option>
                    <?php
                      $ahay = mysqli_query($kon, "SELECT * FROM barangmasuk JOIN barang ON barangmasuk.idbarang = barang.idbarang WHERE idbarangmasuk NOT IN (SELECT idbarangmasuk FROM qc) ORDER BY tgl DESC");
                      $a    = "var kuantiti = new Array();\n;";
                      $b    = "var idbarang = new Array();\n;";
                        while($j = mysqli_fetch_array($ahay)) {
                          echo "<option value='$j[idbarangmasuk]'>$j[namabarang] ($j[tgl])</option>";
                          $a .= "kuantiti['" . $j['idbarangmasuk'] . "'] = {kuantiti:'" . addslashes($j['kuantiti'])."'};\n";
                          $b .= "idbarang['" . $j['idbarangmasuk'] . "'] = {idbarang:'" . addslashes($j['idbarang'])."'};\n";
                        } 
                      ?>
                  </select>
                  <input type="hidden" id="kuantiti" name="kuantiti"><input type="hidden" id="idbarang" name="idbarang">
                  </div>
                  <div class="form-group">
                      <label>Nama Teknisi</label>
                      <select name="id" class="form-control" required>
                          <option disabled selected>Pilih</option>
                        <?php
                          $ketapel = mysqli_query($kon, "SELECT * FROM user WHERE level = 'teknisi'");
                            while($bisalah = mysqli_fetch_array($ketapel)) {
                              echo "<option value='$bisalah[id]'>$bisalah[nama]</option>";
                            } 
                          ?>
                      </select>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" name="simpan" class="btn btn-dark" data-toggle="tooltip" data-placement="bottom" title="Simpan"><i class="fas fa-check"></i></button>
                  <button type="button" onclick="window.location='qc.php';" data-toggle="tooltip" data-placement="bottom" title="Kembali" class="btn bg-orange float-right">
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
    $idbarangmasuk = $_REQUEST['idbarangmasuk'];
    $kuantiti      = $_REQUEST['kuantiti'];
    $idbarang      = $_REQUEST['idbarang'];
    $id            = $_REQUEST['id'];

      $tambah = mysqli_query($kon,"INSERT INTO qc(kuantiti, idbarang, id, idbarangmasuk) VALUES ('$kuantiti','$idbarang','$id','$idbarangmasuk')");
      if($tambah){
        ?> <script>alert('Berhasil Disimpan');window.location='qc.php';</script> <?php
      }else{
        ?> <script>alert('Gagal');window.location='qc_input.php';</script> <?php
      }
  }
 ?>

 <script>   
  <?php echo $a.$b; ?>
  function ubah(id){  
      document.getElementById('kuantiti').value = kuantiti[id].kuantiti; 
      document.getElementById('idbarang').value = idbarang[id].idbarang; 
  };   
</script> 