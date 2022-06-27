<?php require('headernya.php'); error_reporting(0); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- filter --><br>
    <div class="modal fade" id="modal-sm">
        <div class="modal-dialog modal-default">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Cetak Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="../assets/report/rtransaksi.php" target="_blank" method="post">
              <div class="input-group input-group-mb" style="margin-bottom: 10px">
                <div class="input-group-prepend" style="width: 50%">
                    <span class="input-group-text bg-orange" style="width: 100%;font-weight: bold;">Bulan</span>
                </div>
                <select name="bulan" class="form-control bg-dark" required style="color: white; font-weight: bold;">
                  <?php
                    $ahay = mysqli_query($kon, "SELECT MONTH(tgltransaksi) as bulan FROM transaksi GROUP BY bulan ORDER BY bulan ASC");
                    while($baris = mysqli_fetch_array($ahay)) {
                    $bulan = $baris['bulan']; 
                      if($bulan == 1){ $namabulan = "Januari"; }else if($bulan == 2){ $namabulan = "Februari"; }else if($bulan == 3){ $namabulan = "Maret"; }else if($bulan == 4){ $namabulan = "April"; }else if($bulan == 5){ $namabulan = "Mei"; }else if($bulan == 6){ $namabulan = "Juni"; }else if($bulan == 7){ $namabulan = "Juli"; }else if($bulan == 8){ $namabulan = "Agustus"; }else if($bulan == 9){ $namabulan = "September"; }else if($bulan == 10){ $namabulan = "Oktober"; }else if($bulan == 11){ $namabulan = "November"; }else if($bulan == 12){ $namabulan = "Desember";
                        } ?><option value="<?= $baris[bulan] ?>"><?= $namabulan; ?></option> 
                      }
                    <?php } ?>
                </select>
              </div>
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

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h2 style="display:inline;">Data Transaksi</h2>
                <button style="float: right;margin-left: 5px" class="btn btn-primary" type="button" data-toggle="tooltip" data-placement="bottom" title="Tambah"><a href="transaksi_input.php" class="text-white"><i class="fas fa-folder-plus"></i></a>
                </button>
                <button style="float: right" class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-sm" title="Cetak"><i class="fas fa-file-pdf"></i></button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="dataTables" class="table table-bordered table-sm">
                  <thead class="table-dark">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Pelanggan</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Bukti Pembayaran</th>
                        <th class="hide"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $no = 1;
                      $query = mysqli_query($kon, "SELECT * FROM `transaksi` INNER JOIN user ON transaksi.id = user.id INNER JOIN barang ON transaksi.idbarang = barang.idbarang ORDER BY tgltransaksi DESC");
                      while($data = mysqli_fetch_array($query)){
                        ?>
                          <tr class="text-center">
                          <td><?= $no++ ?></td>
                          <td><?= tgl_indo($data['tgltransaksi'],true)?></td>          
                          <td><?= $data['nama'] ?></td>
                          <td><?= $data['namabarang'] ?></td>           
                          <td>Rp. <?= number_format($data['harga'],0,',','.') ?> </td>
                          <td><?= $data['jumlahnya'] ?></td>           
                          <td>Rp. <?= number_format($data['total'],0,',','.') ?></td>           
                          <td><a target="_blank" href="../images/<?= $data['gambar'] ?>"><img src="../images/<?= $data['gambar'] ?>" width='60px'></a></td>        
                          <td>
                            <button class="btn bg-dark" type="button"><a href="transaksi_edit.php?idtransaksi=<?= $data['idtransaksi'] ?>" class="text-white"><i class="far fa-edit"></i></a></button>
                            <button class="btn bg-dark" onclick="yakin = confirm('Apakah Kamu yakin ingin Menghapus?'); if(yakin){ window.location = 'hapus.php?idtransaksi=<?= $data['idtransaksi'] ?>';
                              }" type="button"><i class="fas fa-trash"></i></button>
                          </td>
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
