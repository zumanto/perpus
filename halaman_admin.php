<html>
<head>
	<title>TEST</title>
</head>
<body>
	<?php 
	session_start();
 
	if($_SESSION['level']==""){
		header("location:index.php?pesan=gagal");
	}
 
	?>
	<h1>Halaman Admin</h1>
 
	<p>Hallo <b><?php echo $_SESSION['username']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['level']; ?></b>.</p>
	<a href="logout.php">LOGOUT</a>
	<br/>
	<br/>
		<div>
		<center>
			<div>
				DATA ANGGOTA <a href="tambah.php">Tambah</a>
			</div>
			<br>
			<div>
				<table border="1">
					<thead>
						<tr >
							<th>No</th>
							<th>Nama</th>
							<th>Nip</th>
							<th>Jenis</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
							include('koneksi.php'); 
							$data = mysqli_query($koneksi, "select * from daftar") or die(mysqli_error($koneksi));

							$no = 1;

							while($row = mysqli_fetch_assoc($data)) {
						?>	

					<tr>
						<td><?= $no; ?></td>
						<td><?= $row['nama']; //untuk menampilkan nama ?></td>
						<td>No <?= $row['nip']; ?></td>
						<td><?= $row['jenis']; ?></td>
						<td>
								<a href="edit.php?id=<?= $row['id']; ?>" >Edit</a>
								<a href="hapus.php?id=<?= $row['id']; ?>" onclick="return confirm('anda yakin ingin hapus?');">Hapus</a>
						</td>
					</tr>

						<?php $no++; } ?>
					</tbody>
				</table>
			</div>
		</div>
		</center>
	</div>

</body>
</html>