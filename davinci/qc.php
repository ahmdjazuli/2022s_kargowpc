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
        <form action="../assets/report/rqc.php" target="_blank" method="post">
        <div class="input-group input-group-mb" style="margin-bottom: 10px">
          <div class="input-group-prepend" style="width: 50%">
              <span class="input-group-text bg-orange" style="width: 100%;font-weight: bold;">Bulan</span>
          </div>
          <select name="bulan" class="form-control bg-dark" required style="color: white; font-weight: bold;">
            <?php
              $ahay = mysqli_query($kon, "SELECT MONTH(tglqc) as bulan FROM qc GROUP BY bulan ORDER BY bulan ASC");
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
              $ahay = mysqli_query($kon, "SELECT YEAR(tglqc) as tahun FROM qc GROUP BY tahun ORDER BY tahun ASC");
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
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h2 style="display:inline;">Quality Check</h2>
                <button style="float: right" class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-sm" title="Cetak"><i class="fas fa-file-pdf"></i></button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="dataTables" class="table table-bordered table-hover table-sm">
                  <thead class="table-dark">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama Barang</th>
                        <th>Distributor</th>
                        <th>Jumlah</th>
                        <th>Nama Teknisi</th>
                        <th>Kesimpulan</th>
                        <th class="hide"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $no = 1;
                      $query = mysqli_query($kon, "SELECT * FROM qc JOIN barangmasuk ON qc.idbarangmasuk = barangmasuk.idbarangmasuk JOIN barang ON barangmasuk.idbarang = barang.idbarang JOIN user ON qc.id = user.id WHERE nama = '$skuy[nama]' ORDER BY tglqc DESC");
                      while($data = mysqli_fetch_array($query)){
                        ?>
                          <tr class="text-center">
                          <td><?= $no++ ?></td>        
                          <td><?= haribulantahun($data['tgl'],true)?></td>             
                          <td><?= $data['namabarang'] ?></td>
                          <td><?= $data['distributor'] ?></td>
                          <td><?= $data['kuantiti'] ?></td>
                          <td><?= $data['nama'] ?></td>
                          <td><?= $data['kesimpulan'] ?></td>
                          <td>
                            <button class="btn bg-dark" type="button"><a href="qc_edit.php?idqc=<?= $data['idqc'] ?>" class="text-white"><i class="far fa-edit"></i></a></button>
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
