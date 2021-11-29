<!DOCTYPE html>
<html>
<?php include('../header.php'); ?>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<link href="../css/bootstrap.min.css" rel="stylesheet">

<body>
	<div class="container col-md-6 mt-4">
		<h1>Table Edit Data Buku</h1>
		<div class="card">
			<div class="card-header bg-dark text-white ">
				Edit Buku
			</div>
			<div class="card-body">
				<?php
				include('../koneksi.php');

				$id = $_GET['id']; 
				$data = mysqli_query($db, "select * from member where id = '$id'");
				$row = mysqli_fetch_assoc($data);
				?>
				<form action="" method="post" role="form">
					<div class="form-group">
						<label>Nama</label>
						<input type="text" name="name" required="" class="form-control" value="<?= $row['name']; ?>">
						<input type="hidden" name="id" required="" value="<?= $row['id']; ?>">
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
						<input type="date" name="tanggalLahir" class="form-control" value="<?= $row['tanggalLahir']; ?>">
					</div>
                    <div class="form-group">
						<label>Email</label>
						<input type="email" name="email" class="form-control" value="<?= $row['email']; ?>">
					</div>
                    <div class="form-group">
						<label>Username</label>
						<input type="text" name="username" class="form-control" value="<?= $row['username']; ?>">
					</div>
					<button type="submit" class="btn btn-primary" name="submit" value="simpan">update data</button>
				</form>

				<?php

				//jika klik tombol submit maka akan melakukan perubahan
				if (isset($_POST['submit'])) {
					$id = $_POST['id'];
					$name = $_POST['name'];
					$tanggalLahir = $_POST['tanggalLahir'];
					$email = $_POST['email'];
                    $username = $_POST['username'];
                    $jeniskelamin = $_POST['jeniskelamin'];
					//query mengubah barang
					mysqli_query($db, "update member set name='$name', tanggalLahir='$tanggalLahir', email='$email', username='$username', jeniskelamin='$jeniskelamin' where id ='$id'") or die(mysqli_error($koneksi));

					//redirect ke halaman index.php
					echo "<script>alert('data berhasil diupdate.');window.location='index.php';</script>";
				}



				?>
			</div>
		</div>
	</div>
</body>

</html>