<?php 
//session_start();
//if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
//header("location: loginUsingPhp.php");
//exit;
//}
	// session_start();
	// if($_SESSION['status']!="login"){
	// 	header("location:login.php?pesan=belum_login");
	// }
	?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Perpustakaan Online</title>
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



<style>
html, body {
	font-family: 'Roboto', sans-serif;
	margin-left: 20px;
	margin-right: 20px;
	margin-top: 80px;
}
.borderright {
	border-right: 2px solid silver;
}
.borderleft {
	border-left: 2px solid silver;
}
</style>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
		<div class="col-2">
			<a class="navbar-brand" href="home.php">Perpustakaan Online</a>
			<button class="navbar-toggler navbar-toggler-icon" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
			</button>
		</div>
		<div class="col-10">
			<div class="collapse navbar-collapse justify-content-end" id="navbarText">
				<ul class="navbar-nav">
					<a class="nav-link" href="home.php" id="navbardrop">Home</a>
					<li class="nav-item dropdown borderleft">
						<a class="nav-link dropdown-toggle" href="registrasi.php" id="navbardrop" data-toggle="dropdown">Data master </a>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="anggota_home.php">Data Anggota</a>
							<a class="dropdown-item" href="home.php">Data Buku</a>
						</div>
					<li class="nav-item dropdown borderleft">
						<a class="nav-link dropdown-toggle" href="registrasi.php" id="navbardrop" data-toggle="dropdown">Data Transaksi</a>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="transaksi_tambah.php">Transaksi Peminjaman</a>
							<a class="dropdown-item" href="transaksi.php">Transaksi Pengembalian Buku</a>
							<a class="dropdown-item" href="about.php">about</a>
						</div>
					</li>
					<ul class="navbar-nav">
					<a class="nav-link" href="transaksi.php" id="navbardrop">Laporan Transaksi</a>
					<li class="nav-item dropdown borderleft">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle borderleft" href="logout.php" id="navbardrop" data-toggle="dropdown">Sign Out</a>
						<div class="dropdown-menu">
							<a href="logout.php" class="dropdown-item">Sign Out</a>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</nav>

</body>
</html>