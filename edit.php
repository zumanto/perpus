<!DOCTYPE html>
<html>

<head>
	<title>TEST</title>
</head>

<body>
	<div>
		<h1>Table Daftar</h1>
		<div>
			<div>
				Edit Barang
			</div>
			<div>
				<?php
				include('koneksi.php');

				$id = $_GET['id'];

				$data = mysqli_query($koneksi, "select * from daftar where id = '$id'");
				$row = mysqli_fetch_assoc($data);

				?>
				<form action="" method="post" role="form">
					<div>
						<label>Nama</label>
						<input type="text" name="nama" required="" class="form-control" value="<?= $row['nama']; ?>">

						<input type="hidden" name="id" required="" value="<?= $row['id']; ?>">
					</div>
					<div class="form-group">
						<label>Nip</label>
						<input type="text" name="nip" required="" value="<?= $row['nip']; ?>">
					</div>

					<div class="form-group">
						<label>Jenis</label>
						<textarea required="" name="jenis"><?= $row['jenis']; ?></textarea>
					</div>
					<button type="submit" name="submit" value="simpan">update data</button>
				</form>

				<?php

				if (isset($_POST['submit'])) {
					$id = $_POST['id'];
					$nama = $_POST['nama'];
					$nip = $_POST['nip'];
					$jenis = $_POST['jenis'];

					mysqli_query($koneksi, "update daftar set nama='$nama', nip='$nip', jenis='$jenis' where id ='$id'") or die(mysqli_error($koneksi));

					echo "<script>alert('data berhasil diupdate.');window.location='halaman_admin.php';</script>";
				}



				?>
			</div>
		</div>
	</div>

</body>

</html>