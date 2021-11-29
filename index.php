<html>
<head>
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
.error {
	border: 1px solid #ff6c6c;
	border-radius: 4px;
	padding: 12px;
	background: #ff7272;
	color: #fff;
}

</style>
<body>
	<!-- cek pesan notifikasi -->
	<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan'] == "gagal"){
			echo "Login gagal! username dan password salah";
		}else if($_GET['pesan'] == "logout"){
			echo "<script>alert('Anda telah berhasil logout')</script>";
		}else if($_GET['pesan'] == "belum_login"){
			echo "<script>alert('Username & Password salah gunakan (Username : admin & password : admin)')</script>";
		}
	}
	
	?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-2">
			</div>
			<div class="col-8">
	<form method="post" action="cek_login.php">
		<center><h1>Login Perpustakaan Online </h1></center>
					<div class="row form-group">
						<div class="col-md-2 text-md-right">
						</div>
						<div class="col-md-8">
							<span id="error" name="error" class="error label"  style="display: none">Name*</span>
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-2 text-md-right">
							<span class="label">Username</span>
						</div>
						<div class="col-md-8">
							<input type="text" name="username" value="admin" required="" class="form-control">
							
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-2 text-md-right">
							<span class="label">Password</span>
						</div>
						<div class="col-md-8">
							<input type="password" name="password" value="admin" required="" class="form-control">
							
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-2 text-md-right">
						</div>
						<div class="col-md-8">
							<button style="width: 200px;" type="submit" class="btn btn-success mb-4">login
							</button>
							<button style="width: 200px;" class="btn btn-danger mb-4" type="reset">
								Reset
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>

</body>
</html>