<?php 
require "../../koneksi.php";
require "../../tgl_indo.php";
	$idbeli 		= $_REQUEST['idbeli'];

	$result = mysqli_query($kon, "SELECT * FROM beliproduk WHERE idbeli = '$idbeli'");
	$info = mysqli_query($kon, "SELECT * FROM beli INNER JOIN user ON beli.id = user.id WHERE idbeli = '$idbeli'"); 
	$data = mysqli_fetch_array($info);
?>
<!DOCTYPE html>
<html lang="id, in">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/bootstrap.min.css.map">
  	<link rel="stylesheet" href="../css/bootstrap-grid.min.css">
  	<link rel="stylesheet" href="../css/bootstrap-grid.min.css.map">
  	<link rel="apple-touch-icon-precomposed" sizes="57x57" href="../icon/apple-touch-icon-57x57.png" />
  	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="../icon/apple-touch-icon-114x114.png" />
  	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="../icon/apple-touch-icon-72x72.png" />
  	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="../icon/apple-touch-icon-144x144.png" />
  	<link rel="apple-touch-icon-precomposed" sizes="60x60" href="../icon/apple-touch-icon-60x60.png" />
  	<link rel="apple-touch-icon-precomposed" sizes="120x120" href="../icon/apple-touch-icon-120x120.png" />
  	<link rel="apple-touch-icon-precomposed" sizes="76x76" href="../icon/apple-touch-icon-76x76.png" />
  	<link rel="apple-touch-icon-precomposed" sizes="152x152" href="../icon/apple-touch-icon-152x152.png" />
  	<link rel="icon" type="image/png" href="../icon/favicon-196x196.png" sizes="196x196" />
  	<link rel="icon" type="image/png" href="../icon/favicon-96x96.png" sizes="96x96" />
  	<link rel="icon" type="image/png" href="../icon/favicon-32x32.png" sizes="32x32" />
  	<link rel="icon" type="image/png" href="../icon/favicon-16x16.png" sizes="16x16" />
  	<link rel="icon" type="image/png" href="../icon/favicon-128.png" sizes="128x128" />
  	<meta name="application-name" content="&nbsp;"/>
  	<meta name="msapplication-TileColor" content="#FFFFFF" />
  	<meta name="msapplication-TileImage" content="../icon/mstile-144x144.png" />
  	<meta name="msapplication-square70x70logo" content="../icon/mstile-70x70.png" />
  	<meta name="msapplication-square150x150logo" content="../icon/mstile-150x150.png" />
  	<meta name="msapplication-wide310x150logo" content="../icon/mstile-310x150.png" />
  	<meta name="msapplication-square310x310logo" content="../icon/mstile-310x310.png" />
	<style>
		hr{ border: 4px; border-style: double; width: 100%; }
		.wew{ margin-right: 5%; }
		.wow{ margin-left: 5%; float: left }		
		#kiri{
			width: 50%; height: 100px; float:left; font-weight: normal;
		}
		#kanan{
			width: 50%; height: 100px; float:right; font-weight: normal;
		}
		th{text-align:center;}
	</style>
</head>
<body>
<div class="container-fluid"><br>
	<p class="text-center"><b>
		<img src="../icon/logoreport.png" style="width: 200px">
		<br>
		<span style="font-weight: 400; font-size: 12px;">Alamat : Jembatan Rahmat RT01/RW01 Gang RINDU Nomor 3, <br>Kelurahan Bukat, Kecamatan Barabai Kabupaten HST</span>
	</p>
	<hr>
</div>
<style type="text/css" media="print"> @page { size: portrait; } </style>
<h3 style="text-align: center;">Cetak Nota</h3>
<h4 style="text-align: center;">No. Pembelian : <?= $data['idbeli'] ?></h4>
<h5 class="text-center">
</h5>
<div style="width:50%;float:left;margin-left: 20px;">
		<h4 style="font-weight: bold;">Info Pembeli</h4>
		<label style="font-weight: normal;">Tanggal : <?= haribulantahun($data['tglbeli'],true)?></label><br>
		<label style="font-weight: normal;">Nama : <?= $data['nama'] ?></label><br>
		<label style="font-weight: normal;">Telp : <?= $data['telp'] ?></label><br>
	</div>
	<div style="width:40%;float:right;">
		<h4 style="font-weight: bold;">Pengiriman</h4>
		<label style="font-weight: normal;">Tujuan : <?= $data['namakota'] ?></label><br>
		<label style="font-weight: normal;">Alamat : <?= $data['alamat'] ?></label><br>
	</div>
</div>
<div class="container">
  <table class="table table-sm" border="1px" style="font-weight: 400;">
    <thead class="text-center">
      <tr>
        <th> No </th>
        <th> Nama Produk </th>
				<th> Harga </th>
				<th> Jumlah </th>
				<th> Sub Harga </th>
      </tr>
    </thead>
<?php 
$i = 1;$totalbelanja = 0;
while( $row = mysqli_fetch_array($result) ) :
$subharga = $row['harganya']*$row['jumlah']; ?>
<tr class="text-center">
  	<td><?= $i++; ?></td>
  	<td><?= $row['namanya'] ?></td>          
	  <td>Rp. <?= number_format($row['harganya'],0,',','.') ?> </td>
		<td><?= $row['jumlah'] ?> </td>
		<td>Rp. <?= number_format($row['subharga'],0,',','.') ?></td>
</tr>
<?php $totalbelanja+=$subharga; endwhile; ?>
<tr>
	<td class="text-center" colspan="4">Sub Total</td>
	<td class="text-center">Rp. <?= number_format($totalbelanja,0,',','.') ?></td>
</tr>
<tr>
	<td class="text-center" colspan="4">Biaya Ongkir</td>
	<td class="text-center">Rp. <?= number_format($data['tarifnya'],0,',','.') ?></td>
</tr>
<tr>
	<td class="text-center" style="font-weight: bold; background-color: #f1f1f1 !important;" colspan="4">Total Pembayaran</td>
	<td class="text-center" style="font-weight: bold; background-color: #f1f1f1 !important;">Rp. <?= number_format($totalbelanja+$data['tarifnya'],0,',','.') ?></td>
</tr>
  </table>
</div>
<br><br><br>
<script>
	 window.print();
</script> 	
</body>
</html>