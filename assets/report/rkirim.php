<?php 
require "../../koneksi.php";
require "../../tgl_indo.php";
	$bulan  = $_REQUEST['bulan'];
  $tahun  = $_REQUEST['tahun'];
  if($bulan AND $tahun){
    $result = mysqli_query($kon, "SELECT * FROM kirim INNER JOIN transaksi ON kirim.idtransaksi = transaksi.idtransaksi INNER JOIN user ON transaksi.id = user.id INNER JOIN barang ON barang.idbarang = transaksi.idbarang WHERE MONTH(tglkirim) = '$bulan' AND YEAR(tglkirim) = '$tahun' ORDER BY tglkirim DESC");
  } require('kepala.php');
?>
<h3 style="text-align: center;">Laporan Pengiriman</h3>
<h5 class="text-center">
  Periode Bulan : <?php echo '<b>'.$namabulan.'</b> tahun <b>'.$tahun.'</b>'; ?>
</h5>
<div class="container-fluid">
  <table class="table table-sm" border="1px" style="font-weight: 400;">
    <thead class="text-center">
      <tr>
        <th>No</th>
        <th>Tanggal Kirim</th>
        <th>Tanggal Terima</th>
        <th>No. Resi</th>
        <th>Penerima</th>
        <th>Tujuan</th>
        <th>Nama Barang</th>
        <th>Jumlah</th>
        <th>Total</th>
      </tr>
    </thead>
<?php 
$i = 1;
while( $data = mysqli_fetch_array($result) ) : ?>
<tr class="text-center">
  	<td><?= $i++; ?></td>
  	<td><?= haribulantahun($data['tglkirim'],true)?></td>          
	  <td><?= haribulantahun($data['tglterima'],true)?></td>             
	  <td><?= $data['noresi'] ?></td>           
	  <td><?= $data['nama'] ?></td>
	  <td><?= $data['alamat'] ?></td>
	  <td><?= $data['namabarang'] ?></td>        
	  <td><?= $data['jumlahnya'] ?></td>        
	  <td>Rp. <?= number_format($data['total'],0,',','.') ?></td>
</tr>
<?php endwhile; ?>
  </table>
</div>
<div id="kiri"></div>
<div id="kanan">
  .................., ...................... 20...<br>
  Mengetahui, Pimpinan<br>,
  <?php QRcode::png($kode,"LaporanPengiriman.png","M",2,2); ?>
  <img src="laporanPengiriman.png"><br>
  Erwan Rosdi, S.sos
</div>
<script>
	window.print();
</script> 	
</body>
</html>