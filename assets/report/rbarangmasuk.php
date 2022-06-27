<?php 
require "../../koneksi.php";
require "../../tgl_indo.php";
	$bulan 	= $_REQUEST['bulan'];
	$tahun 	= $_REQUEST['tahun'];
	if($bulan AND $tahun){
    $result = mysqli_query($kon, "SELECT * FROM barangmasuk INNER JOIN barang ON barangmasuk.idbarang = barang.idbarang WHERE MONTH(tgl) = '$bulan' AND YEAR(tgl) = '$tahun' ORDER BY tgl DESC");
  } require('kepala.php');
?>
<h3 style="text-align: center;">Laporan Barang Masuk</h3>
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
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Total</th>
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
    <td>Rp. <?= number_format($data['hargamasuk'],0,',','.') ?> </td>                  
	  <td><?= $data['kuantiti'] ?></td>
	  <td>Rp. <?= number_format($data['hargamasuk']*$data['kuantiti'],0,',','.') ?> </td> 
</tr>
<?php endwhile; ?>
  </table>
</div>
<div id="kiri"></div>
<div id="kanan">
	.................., ...................... 20...<br>
	Mengetahui, Pimpinan<br>,
  <?php QRcode::png($kode,"LaporanMasuk.png","M",2,2); ?>
  <img src="laporanMasuk.png"><br>
	Erwan Rosdi, S.sos
</div>
<script>
	window.print();
</script> 	
</body>
</html>