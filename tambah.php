<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<?php include('header.php'); ?>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<link href="css/bootstrap.min.css" rel="stylesheet">
<body>
	<div class="container col-md-6 mt-4">
		<h1>Table Buku</h1>
		<div class="card">
			<div class="card-header bg-dark text-white">
				Tambah Buku
			</div>
			<div class="card-body">
				<form action="" method="post" role="form" enctype="multipart/form-data">
				<div class="form-group">
						<label>Foto</label>
						<input type="file" name="image" required="" class="form-control">
					</div>
					<div class="form-group">
						<label>ISBN</label>
						<input type="text" name="isbn" required="" class="form-control" >
					</div>
					<div class="form-group">
						<label>Judul</label>
						<input type="text" name="judul" required="" class="form-control" >
					</div>
					<div class="form-group">
						<label>Tahun Buku</label>
						<input type="date" name="tahunbuku" class="form-control">
					</div>
                    <div class="form-group">
						<label>Penulis</label>
						<input type="text" name="penulis" required="" class="form-control">
					</div>
                    <div class="form-group">
						<label>kategori</label>
						<input type="text" name="kategori" required="" class="form-control">
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

					<button type="submit" class="btn btn-primary" name="submit" value="simpan">Simpan data</button>
				</form>

				<?php
				include('koneksi.php');
				
				//melakukan pengecekan jika button submit diklik maka akan menjalankan perintah simpan dibawah ini
				if (isset($_POST['submit'])) {
					//menampung data dari inputan
					$isbn = $_POST['isbn'];
					$judul = $_POST['judul'];
					$tahunbuku = $_POST['tahunbuku'];
					$penulis = $_POST['penulis'];
                    $kategori = $_POST['kategori'];
                    $status = $_POST['status'];
					extract($_POST);
					$image = $_FILES['image']['name'];
  	// Get text
  					$image_text = mysqli_real_escape_string($db, $_POST['image_text']);

  	// image file directory
  					$target = "img/buku".basename($image);
  	// execute query
  					mysqli_query($db, $sql);

  					if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  					$msg = "Image uploaded successfully";
  						}else{
  							$msg = "Failed to upload image";
  								}
  
					
					//query untuk menambahkan barang ke database, pastikan urutan nya sama dengan di database
					$datas = mysqli_query($db, "insert into buku (isbn,judul,tahunbuku,penulis,kategori,status, image, image_text)values('$isbn', '$judul', '$tahunbuku', '$penulis', '$kategori', '$status', '$image', '$image_text')") or die(mysqli_error($db));
					//id barang tidak dimasukkan, karena sudah menggunakan AUTO_INCREMENT, id akan otomatis

					//ini untuk menampilkan alert berhasil dan redirect ke halaman index
					echo "<script>alert('data berhasil disimpan.');window.location='home.php';</script>";
				}
				?>
			</div>
		</div>
	</div>

	
</body>

</html>