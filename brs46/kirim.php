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
              <form action="../assets/report/rkirim.php" target="_blank" method="post">
              <div class="input-group input-group-mb" style="margin-bottom: 10px">
                <div class="input-group-prepend" style="width: 50%">
                    <span class="input-group-text bg-orange" style="width: 100%;font-weight: bold;">Bulan</span>
                </div>
                <select name="bulan" class="form-control bg-dark" required style="color: white; font-weight: bold;">
                  <?php
                    $ahay = mysqli_query($kon, "SELECT MONTH(tglkirim) as bulan FROM kirim GROUP BY bulan ORDER BY bulan ASC");
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
                    $ahay = mysqli_query($kon, "SELECT YEAR(tglkirim) as tahun FROM kirim GROUP BY tahun ORDER BY tahun ASC");
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
                <h2 style="display:inline;">Data Pengiriman</h2>
                <button style="float: right;margin-left: 5px" class="btn btn-primary" type="button" data-toggle="tooltip" data-placement="bottom" title="Tambah"><a href="kirim_input.php" class="text-white"><i class="fas fa-folder-plus"></i></a>
                </button>
                <button style="float: right" class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-sm" title="Cetak"><i class="fas fa-file-pdf"></i></button>
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
                        <th>Penerima</th>
                        <th>Tujuan</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th class="hide"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $no = 1;
                      $query = mysqli_query($kon, "SELECT * FROM kirim INNER JOIN transaksi ON kirim.idtransaksi = transaksi.idtransaksi INNER JOIN user ON transaksi.id = user.id INNER JOIN barang ON barang.idbarang = transaksi.idbarang ORDER BY tglkirim DESC");
                      while($data = mysqli_fetch_array($query)){
                        ?>
                          <tr class="text-center">
                          <td><?= $no++ ?></td>
                          <td><?= haribulantahun($data['tglkirim'],true)?></td>          
                          <td><?= haribulantahun($data['tglterima'],true)?></td>             
                          <td><?= $data['noresi'] ?></td>           
                          <td><?= $data['nama'] ?></td>
                          <td><?= $data['alamat'] ?></td>
                          <td><?= $data['namabarang'] ?></td>        
                          <td><?= $data['jumlahnya'] ?></td>        
                          <td>Rp. <?= number_format($data['total'],0,',','.') ?></td>          
                          <td>
                            <button class="btn bg-dark" type="button"><a href="https://wa.me/?phone=<?= $data['telp'] ?>&text=Halo, <?= $data['nama'] ?>.%20Kami%20dari%20PT.%20Andalan%20Kargo%20memberitahukan%20bahwa%0A%0APengiriman%20Barang%20dengan%20_No.Resi%20:%20<?= $data['noresi'] ?>_%20telah%20*SELESAI*." class="text-white"><i class="far fa-paper-plane"></i></a></button>
                            <button class="btn bg-dark" type="button"><a href="kirim_edit.php?noresi=<?= $data['noresi'] ?>" class="text-white"><i class="far fa-edit"></i></a></button>
                            <button class="btn bg-dark" onclick="yakin = confirm('Apakah Kamu yakin ingin Menghapus?'); if(yakin){ window.location = 'hapus.php?noresi=<?= $data['noresi'] ?>';
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
