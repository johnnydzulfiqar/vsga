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
   	width: 70px;
   	height: 75px;
   }
</style>
	<div class="container col-md-12 mt-4">
		<h1>Tabel Anggota</h1>
		<div class="card">
			<div class="card-header bg-dark text-white ">
				DATA ANGGOTA <a href="anggota_tambah.php" class="btn btn-sm btn-secondary float-right">Tambah</a>
				<a href="cetak.php" class="btn btn-sm btn-secondary float-center">Cetak Data</a>
			</div>
	<form method="GET" action="anggota_home.php" style="text-align: center;">
		<label>Kata Pencarian : </label>
		<input type="text" name="kata_cari" value="<?php if(isset($_GET['kata_cari'])) { echo $_GET['kata_cari']; } ?>"  />
		<button type="submit">Cari</button>
	</form>

			<div class="card-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>ID Anggota</th>
							<th>Nama Anggota</th>
							<th>Foto</th>
							<th>Jenis Kelamin</th>
							<!-- <th>Tanggal Registrasi</th> -->
							<th>Alamat</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
					<?php 
			//untuk meinclude kan koneksi
			include('koneksi.php');
			$no = 1;
				//jika kita klik cari, maka yang tampil query cari ini
				if(isset($_GET['kata_cari'])) {
					//menampung variabel kata_cari dari form pencarian
					$kata_cari = $_GET['kata_cari'];

					//jika hanya ingin mencari berdasarkan kode_produk, silahkan hapus dari awal OR
					//jika ingin mencari 1 ketentuan saja query nya ini : SELECT * FROM produk WHERE kode_produk like '%".$kata_cari."%' 
					$query = "SELECT * FROM member WHERE name like '%".$kata_cari."%' OR alamat like '%".$kata_cari."%' OR jeniskelamin like '%".$kata_cari."%' ORDER BY id ASC";
				} else {
					//jika tidak ada pencarian, default yang dijalankan query ini
					$query = "SELECT * FROM member ORDER BY id ASC";
				}
				

				$result = mysqli_query($db, $query);

				if(!$result) {
					die("Query Error : ".mysqli_errno($db)." - ".mysqli_error($db));
				}
				//kalau ini melakukan foreach atau perulangan
				while ($row = mysqli_fetch_assoc($result)) { 
				?>
				<tr>
						<td><?= $no; ?></td>
						<td><?= $row['id'];?></td>
						<td><?= $row['name']; //untuk menampilkan nama ?></td>
						<td><?php echo "<div id='img_div'>";
      							  echo "<img src='img/".$row['image']."'>";?></td>
						<td><?= $row['jeniskelamin']; ?></td>
						<!-- <td><?= $row['tanggalLahir']; ?></td> -->
                        <td><?= $row['alamat']; ?></td>
						<td>
                        <div class="col">
						<a href="cetak_anggota.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-success">Cetak</a>
								<a href="anggota_edit.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-success">Edit</a>
								<a href="anggota_hapus.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('anda yakin ingin hapus?');">Hapus</a>
						</td>
						<?php $no++; } ?>
						<!-- <?php
							//include('koneksi.php'); //memanggil file koneksi
							//$datas = mysqli_query($db, "select * from member") or die(mysqli_error($koneksi));
							//script untuk menampilkan data barang

							//$no = 1;//untuk pengurutan nomor

							//melakukan perulangan
							//while($row = mysqli_fetch_assoc($datas)) {
						?>	 -->

					
    <!-- <div class="card h-100">
      <div class="card-body">
        <div class="card text-center">
        <h5 class="card-title"><?= $row['name']; ?></h5>
        </div>
        <ul class="list-group list-group-flush">
        <li class="list-group-item">Tahun Buku : <?= $row['tanggalLahir']; ?></li>
        <li class="list-group-item">Penulis    : <?= $row['email']; ?></li>
        <li class="list-group-item">Penerbit   : <?= $row['alamat']; ?></li>
        <li class="list-group-item">Sinopsis   :<?= $row['level']; ?></li>
        </ul>
      </div>
      <div class="card-footer">
      </div>
    </div>
  </div> -->
  								
					</tr>
						
			

</body>
</html>