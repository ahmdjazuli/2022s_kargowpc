<?php
  SESSION_START();
  require "../koneksi.php"; require('../tgl_indo.php');
  date_default_timezone_set('Asia/Kuala_Lumpur');
  $pengaturan     = mysqli_query($kon,"SELECT * FROM pengaturan WHERE id = 1");
  $se             = mysqli_fetch_array($pengaturan);
  $level          = $_SESSION['level'];
  $telp           = $_SESSION['telp'];
  $query          = mysqli_query($kon,"SELECT * FROM user WHERE level='$level' AND telp = '$telp'");
  $skuy           = mysqli_fetch_array($query);
  $_SESSION['id'] = $skuy['id'];
  $id             = $_SESSION['id'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>PT. Global Andalan Kargo</title>
  <link rel="apple-touch-icon-precomposed" sizes="57x57" href="../assets/icon/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/icon/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/icon/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/icon/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="../assets/icon/apple-touch-icon-60x60.png" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="../assets/icon/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="../assets/icon/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="../assets/icon/apple-touch-icon-152x152.png" />
    <link rel="icon" type="image/png" href="../assets/icon/favicon-196x196.png" sizes="196x196" />
    <link rel="icon" type="image/png" href="../assets/icon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/png" href="../assets/icon/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="../assets/icon/favicon-16x16.png" sizes="16x16" />
    <link rel="icon" type="image/png" href="../assets/icon/favicon-128.png" sizes="128x128" />
    <meta name="application-name" content="&nbsp;"/>
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="../assets/icon/mstile-144x144.png" />
    <meta name="msapplication-square70x70logo" content="../assets/icon/mstile-70x70.png" />
    <meta name="msapplication-square150x150logo" content="../assets/icon/mstile-150x150.png" />
    <meta name="msapplication-wide310x150logo" content="../assets/icon/mstile-310x150.png" />
    <meta name="msapplication-square310x310logo" content="../assets/icon/mstile-310x310.png" />
  <link rel="stylesheet" href="../assets/fonts/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../assets/css/adminlte.min.css">
  <link rel="stylesheet" href="../assets/css/costum.css">
  <link rel="stylesheet" href="../assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/plugins/datatables-select/css/searchPanes.dataTables.min.css">
  <link rel="stylesheet" href="../assets/plugins/sweetalert2/dark.css">
  <link rel="stylesheet" href="../assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> 
</head>
<body class="hold-transition layout-top-nav <?= $se['ukuran_teks'] ?> layout-fixed">
<div class="wrapper">
<!-- Navbar -->
<nav class="main-header navbar navbar-expand-md navbar-light navbar-dark">
  <div class="container">
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    <span class='badge bg-orange' style="font-size: 100%;"><span style="font-weight: normal;">pelanggan</span></span>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php" data-toggle="tooltip" title="Home"><i class="fas fa-home"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="user.php" data-toggle="tooltip" title="Data Pengguna"><i class="fas fa-user-secret"></i></a>
          </li>
          <li class="nav-item text-white"> <a class="nav-link" href="#">|</a> </li>
          <li class="nav-item">
            <a class="nav-link" href="transaksi.php" data-toggle="tooltip" title="Riwayat Transaksi"><i class="fas fa-shopping-bag"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="kirim.php" data-toggle="tooltip" title="Riwayat Pengiriman"><i class="fas fa-shipping-fast"></i></a>
          </li>
        </ul>
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item">
          <button class="button btn bg-orange" onclick="yakin = confirm('Apakah Kamu yakin ingin Keluar?'); if(yakin){ window.location = '../logout.php'; }" type="button"><i class="fas fa-sign-out-alt"></i></button>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->