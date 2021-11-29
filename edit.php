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

				$id = $_GET['id']; //mengambil id barang yang ingin diubah

				//menampilkan barang berdasarkan id
				$data = mysqli_query($db, "select * from buku where id = '$id'");
				$row = mysqli_fetch_assoc($data);

				?>
				<form action="" method="post" role="form"  enctype="multipart/form-data">
				<div class="form-group">
						<label>ISBN : </label>
						<input type="text" name="isbn" disabled required="" class="form-control" value="<?= $row['isbn']; ?> ">
						<input type="hidden" name="id" required="" value="<?= $row['id']; ?>">
					</div>
					<div class="form-group">
						<label>Foto</label>
						<input type="file" name="image" class="form-control" <?php echo "<div id='img_div'> </div>" ; echo "<img src='img/".$row['image']. "'>";?>
					</div>
				<div class="form-group">
						<label>Judul</label>
						<input type="text" name="judul" required="" class="form-control" value="<?= $row['judul']; ?>">
						
					</div>
					<div class="form-group">
						<label>Tahun Buku</label>
						<input type="date" name="tahunbuku" class="form-control" value="<?= $row['tahunbuku']; ?>">
					</div>
                    <div class="form-group">
						<label>Penulis</label>
						<input type="text" name="penulis" class="form-control" value="<?= $row['penulis']; ?>">
					</div>
                    <div class="form-group">
						<label>kategori</label>
						<input type="text" name="kategori" class="form-control" value="<?= $row['kategori']; ?>">
					</div>
					<div class="form-check">
  <input class="form-check-input" type="radio" name="status" id="status" value="Tersedia" checked>
  <label class="form-check-label" for="flexRadioDefault2">
    Tersedia
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="status" id="status" value="Tidak Tersedia">
  <label class="form-check-label" for="flexRadioDefault1">
    Tidak Tersedia
  </label>
</div>
					<button type="submit" class="btn btn-primary" name="submit" value="simpan">update data</button>
				</form>

				<?php

				//jika klik tombol submit maka akan melakukan perubahan
				if (isset($_POST['submit'])) {
					$id = $_POST['id'];
					$isbn = $_POST['isbn'];
					$judul = $_POST['judul'];
					$tahunbuku = $_POST['tahunbuku'];
					$penulis = $_POST['penulis'];
                    $kategori = $_POST['kategori'];
                    $status = $_POST['status'];
					$image = $_FILES['image']['name'];
  	// Get text
  	$image_text = mysqli_real_escape_string($db, $_POST['image_text']);

  	// image file directory
  	$target = "img/".basename($image);
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
					//query mengubah barang
					mysqli_query($db, "update buku set judul='$judul', tahunbuku='$tahunbuku', penulis='$penulis', kategori='$kategori', status='$status', image='$image', image_text='$image_text' where id ='$id'") or die(mysqli_error($koneksi));

					//redirect ke halaman index.php
					echo "<script>alert('data berhasil diupdate.');window.location='home.php';</script>";
				}



				?>
			</div>
		</div>
	</div>
</body>

</html>