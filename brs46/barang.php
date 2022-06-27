<?php require('headernya.php'); error_reporting(0); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- filter --><br>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h2 style="display:inline;">Data Barang</h2>
                <button style="float: right;margin-left: 5px" class="btn btn-primary" type="button" data-toggle="tooltip" data-placement="bottom" title="Tambah"><a href="barang_input.php" class="text-white"><i class="fas fa-folder-plus"></i></a></button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="dataTables" class="table table-bordered table-hover table-sm">
                  <thead class="table-dark">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Jenis</th>
                        <th>Berat</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th class="hide"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $no = 1;
                      $query = mysqli_query($kon, "SELECT * FROM barang ORDER BY idbarang DESC");
                      while($data = mysqli_fetch_array($query)){
                        ?>
                          <tr class="text-center">
                          <td><?= $no++ ?></td>
                          <td><?= $data['kode'] ?></td>        
                          <td><?= $data['namabarang'] ?></td>           
                          <td><?= $data['jenis'] ?></td>           
                          <td><?= $data['berat'] ?></td>           
                          <td>Rp. <?= number_format($data['harga'],0,',','.') ?> </td>          
                          <td><?= $data['jumlah'] ?></td>           
                          <td>
                            <button class="btn bg-dark" type="button"><a href="barang_edit.php?idbarang=<?= $data['idbarang'] ?>" class="text-white"><i class="far fa-edit"></i></a></button>
                            <button class="btn bg-dark" onclick="yakin = confirm('Apakah Kamu yakin ingin Menghapus?'); if(yakin){ window.location = 'hapus.php?idbarang=<?= $data['idbarang'] ?>';
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
