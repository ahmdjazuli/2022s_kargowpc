<?php require_once("koneksi.php"); session_start();

	$telp 	= $_REQUEST['telp'];
	$password	= $_REQUEST['password'];
	if(isset($_POST['login'])){
		$query = mysqli_query($kon, "SELECT * FROM user WHERE telp='$telp' AND password = '$password'");
		$cek  = mysqli_fetch_array($query);

		if($cek['level'] == 'admin'){
			$_SESSION['telp'] = $telp;
			$_SESSION['id'] = $cek['id'];
			$_SESSION['level'] = "admin";
			?> <script>window.location='brs46/index.php'</script> <?php
		}else if($cek['level'] == 'pelanggan'){
			$_SESSION['telp'] = $telp;
			$_SESSION['id'] = $cek['id'];
			$_SESSION['level'] = "pelanggan";
			?> <script>window.location='j0k3s/index.php'</script> <?php
		}else if($cek['level'] == 'teknisi'){
			$_SESSION['telp'] = $telp;
			$_SESSION['id'] = $cek['id'];
			$_SESSION['level'] = "teknisi";
			?> <script>window.location='davinci/index.php'</script> <?php
		}else{
			?><script>alert('Gagal Login');window.location="login.php"; </script><?php
		}			
	}
?>