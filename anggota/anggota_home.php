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
<?php include('../header.php'); ?>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<link href="../css/bootstrap.min.css" rel="stylesheet">
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
   	height: 70px;
   }
</style>
<div class="container col-md-12 mt-4">
		<h1>Tabel Anggota</h1>
		<div class="card">
			<div class="card-header bg-secondary text-white ">
				DATA BARANG <a href="tambah.php" class="btn btn-sm btn-success float-right">Tambah</a>
			</div>
			<div class="card-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>ID Anggota</th>
							<th>Nama Anggota</th>
							<th>Foto</th>
							<th>Jenis Kelamin</th>
							<th>Alamat</th>
							<th>Status</th>
							<th>ACtions</th>
						</tr>
					</thead>
					<tbody>
						
						<?php
							include('../koneksi.php'); //memanggil file koneksi
							$datas = mysqli_query($db, "select * from member") or die(mysqli_error($koneksi));
							//script untuk menampilkan data barang

							$no = 1;//untuk pengurutan nomor

							//melakukan perulangan
							while($row = mysqli_fetch_assoc($datas)) {
						?>	

					<tr>
						<td><?= $no; ?></td>
						<td><?= $row['id'];?></td>
						<td><?= $row['name']; //untuk menampilkan nama ?></td>
						<td><?php echo "<div id='img_div'>";
      							  echo "<img src='../img/img/".$row['image']."'>";?></td>
						<td><?= $row['jeniskelamin']; ?></td>
						<td><?= $row['tanggalLahir']; ?></td>
                        <td><?= $row['username']; ?></td>
						<td>
                        <div class="col">
    <!-- <div class="card h-100">
      <div class="card-body">
        <div class="card text-center">
        <h5 class="card-title"><?= $row['name']; ?></h5>
        </div>
        <ul class="list-group list-group-flush">
        <li class="list-group-item">Tahun Buku : <?= $row['tanggalLahir']; ?></li>
        <li class="list-group-item">Penulis    : <?= $row['email']; ?></li>
        <li class="list-group-item">Penerbit   : <?= $row['username']; ?></li>
        <li class="list-group-item">Sinopsis   :<?= $row['level']; ?></li>
        </ul>
      </div>
      <div class="card-footer">
      </div>
    </div>
  </div> -->

								<a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-success">Edit</a>
								<a href="hapus.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('anda yakin ingin hapus?');">Hapus</a>
						</td>
					</tr>

						<?php $no++; } ?>
			

</body>
</html>