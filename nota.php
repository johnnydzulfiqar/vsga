<!DOCTYPE html>
<html>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<link href="css/bootstrap.min.css" rel="stylesheet">
<body>
	<div class="container col-md-6 mt-4">
		<h1>NOTA PEMINJAMAN DAN PENGEMBALIAN BUKU</h1>
		<div class="card">
			<div class="card-header bg-dark text-white ">
			</div>
			<div class="card-body">
				<?php
				include('koneksi.php');
				include('koneksi.php');
				$id_transaksi = $_GET['id'];
				$data = mysqli_query($db, "select * from transaksi where id_transaksi = '$id_transaksi'");
				$row = mysqli_fetch_assoc($data);
				?>
				
			<div class="card-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>ID Transaksi</th>
							<th>ID anggota</th>
							<th>Nama Anggota</th>
							<th>ISBN</th>
							<th>Tanggal Pinjam</th>
                            <th>Tanggal Pengembalian</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
                    <td><?= $row['id_transaksi'];?></td>
						<td><?= $row['id_anggota']; ?></td>
						<td><?= $row['name']; ?></td>
						<td><?= $row['isbn']; ?></td> 
                        <td><?= $row['pinjam']; ?></td>
                        <td><?= $row['kembali']; ?></td>
                        <td><?= $row['status']; ?></td>
						
			
    
			</div>
		</div>
	</div>
    
	<script>
		window.print();
	</script>
 
</body>

</html>