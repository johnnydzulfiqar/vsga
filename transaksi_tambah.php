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
						<label>ID Transaksi</label>
						<input type="text" name="id_transaksi" required="" class="form-control" >
					</div>
					<div class="form-group">
						<label>ID anggota</label>
						<input type="text" name="id_anggota" required="" class="form-control" >
					</div>
					<div class="form-group">
						<label>Nama Anggota</label>
						<input type="text" name="name" class="form-control">
					</div>
                    <div class="form-group">
						<label>ISBN</label>
						<input type="text" name="isbn" required="" class="form-control">
					</div>
                    <div class="form-group">
						<label>Tanggal Pinjam </label>
						<input type="date" name="pinjam" required="" class="form-control">
					</div>
                    <div class="form-group">
						<label>Tanggal Kembalikan </label>
						<input type="date" name="kembali" required="" class="form-control">
					</div>
					<div class="form-check">
  <input class="form-check-input" type="radio" name="status" id="status" value="Meminjam" checked>
  <label class="form-check-label" for="flexRadioDefault2">
  Meminjam
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="status" id="status" value="Sudah Kembali">
  <label class="form-check-label" for="flexRadioDefault1">
    Sudah Kembali
  </label>
</div>

					<button type="submit" class="btn btn-primary" name="submit" value="simpan">Simpan data</button>
				</form>

				<?php
				include('koneksi.php');
				
				//melakukan pengecekan jika button submit diklik maka akan menjalankan perintah simpan dibawah ini
				if (isset($_POST['submit'])) {
					//menampung data dari inputan
					$id_transaksi = $_POST['id_transaksi'];
					$id_anggota = $_POST['id_anggota'];
					$name = $_POST['name'];
					$isbn = $_POST['isbn'];
                    $pinjam = $_POST['pinjam'];
                    $kembali = $_POST['kembali'];
                    $status = $_POST['status'];
  
					//query untuk menambahkan barang ke database, pastikan urutan nya sama dengan di database
					$datas = mysqli_query($db, "insert into transaksi (id_transaksi,id_anggota,name,isbn,pinjam,kembali, status)values
                    ('$id_transaksi', '$id_anggota', '$name', '$isbn', '$pinjam', '$kembali', '$status')") or die(mysqli_error($db));
					//id barang tidak dimasukkan, karena sudah menggunakan AUTO_INCREMENT, id akan otomatis

					//ini untuk menampilkan alert berhasil dan redirect ke halaman index
					echo "<script>alert('data berhasil disimpan.');window.location='transaksi.php';</script>";
				}
				?>
			</div>
		</div>
	</div>

	
</body>

</html>