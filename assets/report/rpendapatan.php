<?php 
require "../../koneksi.php";
require "../../tgl_indo.php";
	$tgl 	= $_REQUEST['tgl'];
	$cek = date('Y-m-d',strtotime($tgl.'monday this week'));
	$cok = date('Y-m-d',strtotime($tgl.'sunday this week'));
	$result = mysqli_query($kon, "SELECT tgltransaksi, DATE(tgltransaksi) as hari FROM transaksi WHERE tgltransaksi BETWEEN '$cek' AND '$cok' GROUP BY hari");

	require('kepala2.php');
?>
<h3 style="text-align: center;">Laporan Pendapatan Harian</h3>
<h5 class="text-center">
<?php	echo "Dari Tanggal : ".tgl_indo($cek,true).' s/d '.tgl_indo($cok,true); ?>
</h5>
<div class="container">
  <table class="table table-sm" border="1px" style="font-weight: 400;">
    <thead class="text-center">
      <tr>
        <th>No</th>
        <th>Hari</th>
        <th>Total Pendapatan</th>
      </tr>
    </thead>
<?php 
$i = 1;
$total = 0;
while( $data = mysqli_fetch_array($result) ) :
	$hari = $data['hari'];
  $pendapatan1 = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM transaksi INNER JOIN user ON transaksi.id = user.id WHERE DATE(tgltransaksi) = '$hari'"));
?> 
<tr class="text-center">
  	<td><?= $i++; ?></td>
  	<td><?= haribulantahun($hari,true)?></td>          
	  <td>Rp. <?= number_format($pendapatan1['total'],0,'.','.') ?></td>
</tr>
<?php $total += $pendapatan1['total']; endwhile; ?>
<tr class="text-center" style="background-color: #e5e5e5;">
	<td colspan="2"><b>Total Keseluruhan</b></td>
	<td>Rp. <?= number_format($total,0,'.','.') ?></td>
</tr>
  </table>
</div>
<div id="kiri"></div>
<div id="kanan">
  .................., ...................... 20...<br>
  Mengetahui, Pimpinan<br>,
  <?php QRcode::png($kode,"LaporanPendapatanMingguan.png","M",2,2); ?>
  <img src="laporanPendapatanMingguan.png"><br>
  Erwan Rosdi, S.sos
</div>
<script>
	window.print();
</script> 	
</body>
</html>