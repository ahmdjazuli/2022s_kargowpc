<?php
	session_start();
	error_reporting(0);
	require_once("../koneksi.php");
	?><script>alert('Data Berhasil Dihapus');</script><?php
	// user
	if (isset($_GET['id'])) {
		mysqli_query($kon, "DELETE FROM user WHERE id='$_REQUEST[id]'"); 
		?><script>window.location='user.php'</script><?php
	// barang
	}else if (isset($_GET['idbarang'])) {
		mysqli_query($kon, "DELETE FROM barang WHERE idbarang='$_REQUEST[idbarang]'"); 
		?><script>window.location='barang.php'</script><?php
	// barangmasuk
	}else if (isset($_GET['idbarangmasuk'])) {
		mysqli_query($kon, "DELETE FROM barangmasuk WHERE idbarangmasuk='$_REQUEST[idbarangmasuk]'"); 
		?><script>window.location='barangmasuk.php'</script><?php
	// transaksi
	}else if (isset($_GET['idtransaksi'])) {
		$query = mysqli_query($kon, "SELECT * FROM transaksi WHERE idtransaksi='$_REQUEST[idtransaksi]'");
		$data = mysqli_fetch_array($query);
		unlink('../images/'.$data['gambar']);
		mysqli_query($kon, "DELETE FROM transaksi WHERE idtransaksi='$_REQUEST[idtransaksi]'"); 
		?><script>window.location='transaksi.php'</script><?php
	// kirim
	}else if (isset($_GET['noresi'])) {
		mysqli_query($kon, "DELETE FROM kirim WHERE noresi='$_REQUEST[noresi]'"); 
		?><script>window.location='kirim.php'</script><?php
	// barangrusak
	}else if (isset($_GET['idbarangrusak'])) {
		mysqli_query($kon, "DELETE FROM barangrusak WHERE idbarangrusak='$_REQUEST[idbarangrusak]'"); 
		?><script>window.location='barangrusak.php'</script><?php
	// qc
	}else if (isset($_GET['idqc'])) {
		mysqli_query($kon, "DELETE FROM qc WHERE idqc='$_REQUEST[idqc]'"); 
		?><script>window.location='qc.php'</script><?php
	}
?>