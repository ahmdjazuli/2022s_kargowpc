<?php 
require "../../koneksi.php";
require "../../tgl_indo.php";
  $bulan  = $_REQUEST['bulan'];
  $tahun  = $_REQUEST['tahun'];
  if($bulan AND $tahun){
    $result = mysqli_query($kon, "SELECT * FROM `transaksi` INNER JOIN user ON transaksi.id = user.id INNER JOIN barang ON transaksi.idbarang = barang.idbarang WHERE MONTH(tgltransaksi) = '$bulan' AND YEAR(tgltransaksi) = '$tahun' ORDER BY tgltransaksi DESC");
  } require('kepala.php');
?>
<h3 style="text-align: center;">Laporan Transaksi</h3>
<h5 class="text-center">
  Periode Bulan : <?php echo '<b>'.$namabulan.'</b> tahun <b>'.$tahun.'</b>'; ?>
</h5>
	<!-- container form inputan -->
<div class="container-fluid">
  <!-- tabel buat nampilin data -->
  <table class="table table-sm" border="1px" style="font-weight: 400;">
    <thead class="text-center">
      <tr>
      <th>No</th>
      <th>Tanggal</th>
      <th>Pelanggan</th>
      <th>Nama Barang</th>
      <th>Harga</th>
      <th>Jumlah</th>
      <th>Total</th>
      <th>Bukti Pembayaran</th>
      </tr>
    </thead>
<?php 
$i = 1;

while( $data = mysqli_fetch_array($result) ) :
 ?> 
<tr class="text-center">
  	<td><?= $i++; ?></td>
  	<td><?= tgl_indo($data['tgltransaksi'],true)?></td>          
    <td><?= $data['nama'] ?></td>
    <td><?= $data['namabarang'] ?></td>           
    <td>Rp. <?= number_format($data['harga'],0,',','.') ?> </td>
    <td><?= $data['jumlahnya'] ?></td>           
    <td>Rp. <?= number_format($data['total'],0,',','.') ?></td>           
    <td><img src="../../images/<?= $data['gambar'] ?>" width='60px'></td>
</tr>
<?php endwhile; ?>
  </table>
<!-- akhir table -->
</div>
<div id="kiri"></div>
<div id="kanan">
  .................., ...................... 20...<br>
  Mengetahui, Pimpinan<br>,
  <?php QRcode::png($kode,"LaporanTransaksi.png","M",2,2); ?>
  <img src="laporanTransaksi.png"><br>
  Erwan Rosdi, S.sos
</div>
<script>
  window.print();
</script>   
</body>
</html>