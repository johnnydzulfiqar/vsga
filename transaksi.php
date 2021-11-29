<?php
// session_start();
 
// //Check if the user is logged in, if not then redirect him to login page
// if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
//     header("location: loginUsingPhp.php");
//     exit;
// }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<?php include('header.php'); ?>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<link href="css/bootstrap.min.css" rel="stylesheet">
<body>
<style type="text/css">
   #content{
   	width: 50%;
   	margin: 20px auto;
   	border: 1px solid #cbcbcb;
   }
   form{
   	width: 50%;
   	margin: 20px auto;
   }
   form div{
   	margin-top: 5px;
   }
   #img_div{
   	width: 80%;
   	padding: 5px;
   	margin: 15px auto;
   	border: 1px solid #cbcbcb;
   }
   #img_div:after{
   	content: "";
   	display: block;
   	clear: both;
   }
   img{
   	float: left;
   	margin: 5px;
   	width: 120px;
   	height: 60px;
   }
</style>
	<div class="container col-md-12 mt-4">
		<h1>Index Buku Perpustakan</h1>
		<div class="card">
			<div class="card-header bg-dark text-white ">
				DATA BUKU <a href="transaksi_tambah.php" class="btn btn-sm btn-secondary float-right">Tambah</a>
				
			</div>
	<form method="GET" action="transaksi.php" style="text-align: center;">
		<label>Kata Pencarian : </label>
		<input type="text" name="kata_cari" value="<?php if(isset($_GET['kata_cari'])) { echo $_GET['kata_cari']; } ?>"  />
		<button type="submit">Cari</button>
	</form>

			<div class="card-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>ID Transaksi</th>
							<th>ID Anggota</th>
							<th>Nama anggota</th>
							<th>ID Buku</th>
							<th>Tanggal Pinjam</th>
							<!-- <th>Tanggal Registrasi</th> -->
							<th>Tanggal Pengembalian</th>
                            <th>Status</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
					<?php 
			//untuk meinclude kan koneksi
			include('koneksi.php');
		
				//jika kita klik cari, maka yang tampil query cari ini
				if(isset($_GET['kata_cari'])) {
					//menampung variabel kata_cari dari form pencarian
					$kata_cari = $_GET['kata_cari'];

					//jika hanya ingin mencari berdasarkan kode_produk, silahkan hapus dari awal OR
					//jika ingin mencari 1 ketentuan saja query nya ini : SELECT * FROM produk WHERE kode_produk like '%".$kata_cari."%' 
					$query = "SELECT * FROM transaksi WHERE id_transaksi like '%".$kata_cari."%' OR id_anggota like '%".$kata_cari."%' OR status like '%".$kata_cari."%' ORDER BY id_transaksi ASC";
				} else {
					//jika tidak ada pencarian, default yang dijalankan query ini
					$query = "SELECT * FROM transaksi ORDER BY id_transaksi ASC";
				}
				

				$result = mysqli_query($db, $query);

				if(!$result) {
					die("Query Error : ".mysqli_errno($db)." - ".mysqli_error($db));
				}
				//kalau ini melakukan foreach atau perulangan
				while ($row = mysqli_fetch_assoc($result)) { 
				?>
				<tr>
                        <td><?= $row['id_transaksi']; ?></td>
						<td><?= $row['id_anggota']; //untuk menampilkan nama ?></td>
                        <td><?= $row['name']; ?></td>
						<td><?= $row['isbn']; ?></td>
						<td><?= $row['pinjam']; ?></td>
                        <td><?= $row['kembali']; ?></td>
                        <td><?= $row['status']; ?></td>
						<td>
                        <div class="col">
                        <a href="nota.php?id=<?= $row['id_transaksi']; ?>" class="btn btn-sm btn-warning">Cetak</a>
						<a href="transaksi_edit.php?id=<?= $row['id_transaksi']; ?>" class="btn btn-sm btn-success">Pengembalian</a>
								
						</td>
						<?php } ?>
						<!-- <?php
							//include('koneksi.php'); //memanggil file koneksi
							//$datas = mysqli_query($db, "select * from member") or die(mysqli_error($koneksi));
							//script untuk menampilkan data barang

							//$no = 1;//untuk pengurutan nomor

							//melakukan perulangan
							//while($row = mysqli_fetch_assoc($datas)) {
						?>	 -->

					</tr>
						
			

</body>
</html>