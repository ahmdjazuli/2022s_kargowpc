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
		hr{ border: 2px; margin-top: 5px; border-style: solid; width: 100%; }
		.logo{ width: 20%; float:left; font-weight: normal; }
		.info{ width: 80%; margin-top: -20px; line-height: 0.7; float:right; font-weight: normal; }		
		#kiri{
			width: 70%; height: 100px; float:left; font-weight: normal;
		}
		#kanan{
			width: 30%; height: 100px; float:right; font-weight: normal;
		}
		th{text-align:center;}
	</style>
</head>
<body>
<div class="container"><br>
	<img src="../icon/logo.png" style="width: 100px" class="float-left logo">
	<div class="info">
		<h1 style="font-weight: bold;">PT. GLOBAL ANDALAN KARGO</h1>
		<p>Jalan Guntung Manggis RT.13/RW.002</p>
		<p>Kelurahan Guntung Manggis – Banjarbaru – Kalimantan Selatan</p>
		<p>Telp : +62 8115005220 E-mail : globalandalankargo@gmail.com</p>
	</div>
</div>
	<hr>
	<?php $kode = 'localhost'.htmlspecialchars($_SERVER['REQUEST_URI']);
	require_once('../phpqrcode/qrlib.php'); ?>
