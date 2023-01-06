<!DOCTYPE html>
<html>

<head>
	<title>TEXT</title>
</head>

<body>
	<div>
		<h1>Tabel Daftar</h1>
		<div>
			<div>
				Tambah Daftar
			</div>
			<div>
				<form action="" method="post" role="form">
					<div>
						<label>Nama</label>
						<input type="text" name="nama" required="">
					</div>
					<div>
						<label>Nip</label>
						<input type="text" name="nip" required="">
					</div>

					<div>
						<label>Jenis</label>
						<textarea name="jenis" required=""></textarea>
					</div>

					<button type="submit" name="submit" value="simpan">Simpan data</button>
				</form>

				<?php
				include('koneksi.php');
				
				//melakukan pengecekan jika button submit diklik maka akan menjalankan perintah simpan dibawah ini
				if (isset($_POST['submit'])) {
					//menampung data dari inputan
					$nama = $_POST['nama'];
					$nip = $_POST['nip'];
					$jenis = $_POST['jenis'];

					//query untuk menambahkan barang ke database, pastikan urutan nya sama dengan di database
					$datas = mysqli_query($koneksi, "insert into daftar (nama,nip,jenis)values('$nama', '$nip', '$jenis')") or die(mysqli_error($koneksi));
					//id barang tidak dimasukkan, karena sudah menggunakan AUTO_INCREMENT, id akan otomatis

					//ini untuk menampilkan alert berhasil dan redirect ke halaman index
					echo "<script>alert('data berhasil disimpan.');window.location='halaman_admin.php';</script>";
				}
				?>
			</div>
		</div>
	</div>


</body>

</html>