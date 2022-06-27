<?php 
require "../../koneksi.php";
require "../../tgl_indo.php";
	$tahun 	= $_REQUEST['tahun'];
	if(isset($_POST['cetak'])){
		$result = mysqli_query($kon, "SELECT tgltransaksi, MONTH(tgltransaksi) as bulan, YEAR(tgltransaksi) as tahun FROM `transaksi` WHERE YEAR(tgltransaksi) = '$tahun' GROUP BY bulan");
	}

	require('kepala2.php');
?>
<h3 style="text-align: center;">Laporan Pendapatan Bulanan</h3>
<h5 class="text-center"><?= 'tahun '.$tahun; ?> </h5>
<div class="container">
  <table class="table table-sm" border="1px" style="font-weight: 400;">
    <thead class="text-center">
      <tr>
        <th>No</th>
        <th>Periode</th>
        <th>Total Pendapatan</th>
      </tr>
    </thead>
<?php 
$i = 1;
$total = 0;
while( $data = mysqli_fetch_array($result) ) :
	$bulan = $data['bulan'];
  $tahun = $data['tahun'];
  $woy = mysqli_fetch_array(mysqli_query($kon, "SELECT SUM(total) as total FROM transaksi INNER JOIN user ON transaksi.id = user.id WHERE MONTH(tgltransaksi) = '$bulan' AND YEAR(tgltransaksi) = '$tahun'"));
?> 
<tr class="text-center">
  	<td><?= $i++; ?></td>
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
</tr>
<?php $total += $woy['total']; endwhile; ?>
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
  <?php QRcode::png($kode,"LaporanPendapatanBulanan.png","M",2,2); ?>
  <img src="laporanPendapatanBulanan.png"><br>
  Erwan Rosdi, S.sos
</div>
<script>
  window.print();
</script>   
</body>
</html>