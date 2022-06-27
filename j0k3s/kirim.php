<?php require('headernya.php'); error_reporting(0); 
  $idbeli = $_GET['idbeli'];
  $beliproduk = mysqli_query($kon, "SELECT * FROM beliproduk INNER JOIN tanam ON beliproduk.idtanam = tanam.idtanam WHERE idbeli = '$idbeli' ORDER BY namatanam ASC");
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- filter --><br>
    <!-- Main content -->
    <section class="content">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h2 style="display:inline;">Riwayat Pengiriman <?= $skuy['nama'] ?></h2>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="dataTables" class="table table-bordered table-sm">
                  <thead class="table-dark">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Tanggal Kirim</th>
                        <th>Tanggal Terima</th>
                        <th>No. Resi</th>
                        <th>Tujuan</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $no = 1;
                      $query = mysqli_query($kon, "SELECT * FROM kirim INNER JOIN transaksi ON kirim.idtransaksi = transaksi.idtransaksi INNER JOIN user ON transaksi.id = user.id INNER JOIN barang ON barang.idbarang = transaksi.idbarang WHERE nama = '$skuy[nama]' ORDER BY tglkirim DESC");
                      while($data = mysqli_fetch_array($query)){
                        ?>
                          <tr class="text-center">
                          <td><?= $no++ ?></td>
                          <td><?= haribulantahun($data['tglkirim'],true)?></td>          
                          <td><?= haribulantahun($data['tglterima'],true)?></td>             
                          <td><?= $data['noresi'] ?></td>
                          <td><?= $data['alamat'] ?></td>
                          <td><?= $data['namabarang'] ?></td>        
                          <td><?= $data['jumlahnya'] ?></td>        
                          <td>Rp. <?= number_format($data['total'],0,',','.') ?></td> 
                        <?php 
                      }
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <hr>
            </div> <!-- /.card -->
          </div> <!-- /.col -->
        </div> <!-- /.row -->
      </div> <!-- /.container-fluid -->
    </section> <!-- /.content -->
  </div> <!-- /.content-wrapper -->
<?php require('footernya.php') ?>
