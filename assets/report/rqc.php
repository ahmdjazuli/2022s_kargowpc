<?php 
require "../../koneksi.php";
require "../../tgl_indo.php";
	$bulan 	= $_REQUEST['bulan'];
	$tahun 	= $_REQUEST['tahun'];
	if($bulan AND $tahun){
    $result = mysqli_query($kon, "SELECT * FROM qc JOIN barangmasuk ON qc.idbarangmasuk = barangmasuk.idbarangmasuk JOIN barang ON barangmasuk.idbarang = barang.idbarang JOIN user ON qc.id = user.id WHERE MONTH(tgl) = '$bulan' AND YEAR(tgl) = '$tahun' ORDER BY tgl DESC");
  } require('kepala.php');
?>
<h3 style="text-align: center;">Laporan Quality Check</h3>
<h5 class="text-center">
	Periode Bulan : <?php echo '<b>'.$namabulan.'</b> tahun <b>'.$tahun.'</b>'; ?>
</h5>
<div class="container-fluid">
  <table class="table table-sm" border="1px" style="font-weight: 400;">
    <thead class="text-center">
      <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Nama Barang</th>
        <th>Distributor</th>
        <th>Jumlah</th>
        <th>Nama Teknisi</th>
        <th>Kesimpulan</th>
      </tr>
    </thead>
<?php 
$i = 1;
while( $data = mysqli_fetch_array($result) ) : ?>
<tr class="text-center">
  	<td><?= $i++; ?></td>
  	<td><?= haribulantahun($data['tgl'],true)?></td>             
    <td><?= $data['namabarang'] ?></td>
    <td><?= $data['distributor'] ?></td>
    <td><?= $data['kuantiti'] ?></td>
    <td><?= $data['nama'] ?></td>
    <td><?= $data['kesimpulan'] ?></td>
</tr>
<?php endwhile; ?>
  </table>
</div>
<div id="kiri"></div>
<div id="kanan">
	.................., ...................... 20...<br>
	Mengetahui, Pimpinan<br>,
  <?php QRcode::png($kode,"LaporanQC.png","M",2,2); ?>
  <img src="laporanQC.png"><br>
	Erwan Rosdi, S.sos
</div>
<script>
	window.print();
</script> 	
</body>
</html>