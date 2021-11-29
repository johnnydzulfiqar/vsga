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
		<h1>Table Tambah Anggota</h1>
		<div class="card">
			<div class="card-header bg-dark text-white">
				Tambah Anggota
			</div>
			<div class="card-body">
				<form action="" method="post" role="form" enctype="multipart/form-data">
				<div class="form-group">
						<label>Foto</label>
						<input type="file" name="image" required="" class="form-control">
					</div>
				<div class="form-group">
						<label>ID Anggota</label>
						<input type="text" name="id" required="" class="form-control">
					</div>
					<div class="form-group">
						<label>Nama</label>
						<input type="text" name="name" required="" class="form-control">
					</div>
					
					<div class="row form-group">
              <div class="col-md-3 text-md-left">
                <span class="label">Jenis Kelamin*</span>
              </div>
              <div class="col-md-4">
                <select class="form-select" name="jeniskelamin" id="jeniskelamin">
                  <option value="-1">Plih Satu</option>
                  <option value="Laki-Laki">Laki-Laki</option>
                  <option value="Perempuan">Perempuan</option>
                  <option value="Other">Other</option>
                </select>
              </div>
            </div>

					<div class="form-group">
						<label>Tanggal Lahir</label>
						<input type="date" name="tanggalLahir" class="form-control">
					</div>
                    <div class="form-group">
						<label>Email</label>
						<input type="email" name="email" required="" class="form-control">
					</div>
                    <div class="form-group">
						<label>alamat</label>
						<input type="text" name="alamat" required="" class="form-control">
					</div>
					
					<button type="submit" class="btn btn-primary" name="submit" value="simpan">Simpan data</button>
				</form>

				<?php
				include('koneksi.php');
				$msg = "";
				//melakukan pengecekan jika button submit diklik maka akan menjalankan perintah simpan dibawah ini
				if (isset($_POST['submit'])) {
					//menampung data dari inputan
					$id = $_POST['id'];
					$name = $_POST['name'];
					$tanggalLahir = $_POST['tanggalLahir'];
					$email = $_POST['email'];
                    $alamat = $_POST['alamat'];
                    $jeniskelamin = $_POST['jeniskelamin'];
					extract($_POST);
					// $nama_file = $_FILES['foto'] ['name'];
					// if(!empty($nama_file)){
					// 	$lokasi_file = $_FILES['foto'] ['temp_name'];
					// 	$tipe_file = pathinfo($nama_file, PATHINFO_EXTENSION);
					// 	$file_foto = $id. ".".$tipe_file;
					// 	$folder = "../img";
					// 	move_uploaded_file($lokasi_file, "$folder");
					// }
					// else 
					// $file_foto="-";
					// if (count($_FILES) > 0) {
					// 	if (is_uploaded_file($_FILES['gambar']['tmp_name'])) {
					// 		$datagambar = addslashes(file_get_contents($_FILES['gambar']['tmp_name']));
					// 		$propertiesgambar = getimageSize($_FILES['gambar']['tmp_name']);
					// 		$sql = "INSERT INTO member(tipeimage ,dataimage) VALUES('" . $propertiesgambar['mime'] . "', '" . $datagambar . "')";
					// 		mysqli_query($db, $sql) or die("<b>Error:</b> Ada kesalahan<br/>" . mysqli_error($db));
					// 		$lastrecord = "SELECT id FROM member ORDER BY id DESC LIMIT 1";
					// 		$result = mysqli_query($db, $lastrecord) or die("<b>Error:</b> Ada kesalahan<br/>" . mysqli_error($koneksi));
					// 		$getid = mysqli_fetch_array($result);
					// 		if (isset($getid["id"])) {
					// 			$notif = 'Gambar berhasil di simpan, silakan lihat di <a target="_blank" href="show.php?id=' . $getid["id"] . '">sini</a>';
					// 		}
					// 	}
					// }
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
  
					
					//query untuk menambahkan barang ke database, pastikan urutan nya sama dengan di database
					$datas = mysqli_query($db, "insert into member (id, name,tanggalLahir,email,alamat,jeniskelamin,image, image_text)values('$id', '$name', '$tanggalLahir', '$email', '$alamat', '$jeniskelamin', '$image', '$image_text')") or die(mysqli_error($db));
					//id barang tidak dimasukkan, karena sudah menggunakan AUTO_INCREMENT, id akan otomatis

					//ini untuk menampilkan alert berhasil dan redirect ke halaman index
					echo "<script>alert('data berhasil disimpan.');window.location='anggota_home.php';</script>";
				}
				?>
			</div>
		</div>
	</div>

	
</body>

</html>