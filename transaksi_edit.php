<!DOCTYPE html>
<html>
<?php include('header.php'); ?>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<link href="css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
   img{
   	float: left;
   	margin: 5px;
   	width: 70px;
   	height: 75px;
   }
</style>
<body>
	<div class="container col-md-6 mt-4">
		<h1>Table Edit Data Buku</h1>
		<div class="card">
			<div class="card-header bg-dark text-white ">
				Edit Buku
			</div>
			<div class="card-body">
				<?php
				include('koneksi.php');
				$id_transaksi = $_GET['id'];
				$data = mysqli_query($db, "select * from transaksi where id_transaksi = '$id_transaksi'");
				$row = mysqli_fetch_assoc($data);
				?>
				<form action="" method="post" role="form"  enctype="multipart/form-data">
				<div class="form-group">
						<label>ID Transaksi</label>
						<input type="text" name="id" disabled required="" class="form-control" value="<?= $row['id_transaksi']; ?> ">
						<input type="hidden" name="id" required="" value="<?= $row['id_transaksi']; ?>">
					</div>
				<div class="form-group">
						<label>Id Anggota</label>
						<input type="text" name="id_anggota" disabled required="" class="form-control" value="<?= $row['id_anggota']; ?>">
					</div>
					<div class="form-group">
						<label>Nama Anggota</label>
						<input type="text" name="name" disabled class="form-control" value="<?= $row['name']; ?>">
					</div>
                    <div class="form-group">
						<label>ISBN Buku</label>
						<input type="text" name="isbn" disabled class="form-control" value="<?= $row['isbn']; ?>">
					</div>
                    <div class="form-group">
						<label>Tanggal Peminjaman</label>
						<input type="date" name="pinjam" disabled class="form-control" value="<?= $row['pinjam']; ?>">
					</div>
                    <div class="form-group">
						<label>Tanggal Pengembalian</label>
						<input type="date" name="kembali" disabled class="form-control" value="<?= $row['kembali']; ?>">
					</div>
					<div class="form-check">
  <input class="form-check-input" type="radio" name="status" value="Meminjam" checked>
  <label class="form-check-label" for="flexRadioDefault2">
  Meminjam
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="status"  value="Sudah Dikembalikan">
  <label class="form-check-label" for="flexRadioDefault1">
    Sudah Dikembalikan
  </label>
</div>
					<button type="submit" class="btn btn-primary" name="submit" value="simpan">update data</button>
				</form>

				<?php

				//jika klik tombol submit maka akan melakukan perubahan
				if (isset($_POST['submit'])) {
                    $status = $_POST['status'];
					//query mengubah barang
					mysqli_query($db, "update transaksi set status='$status' where id_transaksi ='$id_transaksi'") or die(mysqli_error($db));

					//redirect ke halaman index.php
					echo "<script>alert('data berhasil diupdate.');window.location='transaksi.php';</script>";
				}



				?>
			</div>
		</div>
	</div>
</body>

</html>