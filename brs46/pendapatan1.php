<?php require('headernya.php');  error_reporting(0); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content --><br>
<div class="modal fade" id="modal-sm">
        <div class="modal-dialog modal-default">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Filter Cetak</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="../assets/report/rpendapatan1.php" target="_blank" method="post">
              <div class="input-group input-group-mb" style="margin-bottom: 10px">
                  <div class="input-group-prepend" style="width: 50%">
                      <span class="input-group-text bg-orange" style="width: 100%;font-weight: bold;">Tahun</span>
                  </div>
              <select name="tahun" class="form-control bg-dark" required style="color: white; font-weight: bold;">
              <?php
                  $ahay = mysqli_query($kon, "SELECT YEAR(tgltransaksi) as tahun FROM transaksi GROUP BY tahun ORDER BY tahun ASC");
                  while($baris = mysqli_fetch_array($ahay)) {
                  $tahun = $baris['tahun']; 
                      ?><option value="<?= $baris[tahun] ?>"><?= $tahun; ?></option> 
              <?php } ?>
              </select>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="reset" class="btn bg-orange"><i class="fas fa-sync-alt"></i></button>
              <button type="submit" name="cetak" class="btn bg-orange"><i class="fas fa-file-pdf"></i></button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h2 style="display:inline;">Data Pendapatan Bulanan</h2>
                <button style="float: right" class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-sm" title="Cetak"><i class="fas fa-file-pdf"></i></button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="dataTables" class="table table-bordered table-hover table-sm">
                  <thead class="table-dark">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Periode</th>
                        <th>Total Pendapatan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $no = 1;
                      $query = mysqli_query($kon, "SELECT tgltransaksi, MONTH(tgltransaksi) as bulan, YEAR(tgltransaksi) as tahun FROM `transaksi` GROUP BY bulan ORDER BY tgltransaksi DESC");
                      while($data = mysqli_fetch_array($query)){
                        $bulan = $data['bulan'];
                        $tahun = $data['tahun'];
                        $woy = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM transaksi INNER JOIN user ON transaksi.id = user.id WHERE MONTH(tgltransaksi) = '$bulan' AND YEAR(tgltransaksi) = '$tahun'"));
                        ?>
                          <tr class="text-center">
                          <td><?= $no++ ?></td> 
                          <td><?php 
                            if($data['bulan'] == 6){echo 'Juni'.' - '. $data['tahun']; }
                            else if($data['bulan'] == 7){echo 'Juli'.' - '. $data['tahun']; }
                            else if($data['bulan'] == 8){echo 'Agustus'.' - '. $data['tahun']; }
                            else if($data['bulan'] == 9){echo 'September'.' - '. $data['tahun']; }
                            else if($data['bulan'] == 10){echo 'Oktober'.' - '. $data['tahun']; }
                            else if($data['bulan'] == 11){echo 'November'.' - '. $data['tahun']; }
                            else if($data['bulan'] == 12){echo 'Desember'.' - '. $data['tahun']; }
                            else if($data['bulan'] == 1){echo 'Januari'.' - '. $data['tahun']; }
                            else if($data['bulan'] == 2){echo 'Februari'.' - '. $data['tahun']; }
                            else if($data['bulan'] == 3){echo 'Maret'.' - '. $data['tahun']; }
                            else if($data['bulan'] == 4){echo 'April'.' - '. $data['tahun']; }
                            else if($data['bulan'] == 5){echo 'Mei'.' - '. $data['tahun']; }
                          ?></td>
                          <td>Rp. <?= number_format($woy['total'],0,'.','.') ?></td>
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
