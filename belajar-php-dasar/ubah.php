<?php
// jalankan session
session_start();

// apakah session dgn keyword login ada 
// jika tidak ada
if (!isset($_SESSION['login'])) {
  // pindahkan ke halaman login
  header("Location: login.php");
  exit;
}

require 'functions.php';

// jika tidak ada id di url
if (!isset($_GET['id'])) {
  header("Location: index.php");
  exit;
}

// ambil id dari url
$id = $_GET['id'];

// query mahasiswa berdasarkan id
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id");

// cek apakah tombol ubah sudah ditekan
if (isset($_POST['ubah'])) {

  // ambil semua data dan kirim ke function ubah
  // gunakan $_POST, karena kita mau mengirimkan data
  if (ubah($_POST) > 0) {
    echo "<script>
        alert('data berhasil diubah!');
        document.location.href = 'index.php';
        </script>
    ";
  } else {
    echo "data gagal diubah";
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ubah Data Mahasiswa</title>
</head>

<body>
  <h3>Form Ubah Data Mahasiswa</h3>
  <form action="" method="post" enctype="multipart/form-data">
    <!-- input id dgn tipe hidden -->
    <input type="hidden" name="id" value="<?= $mhs['id']; ?>">
    <ul>
      <li>
        <label>
          Nama :
          <input type="text" name="nama" autofocus required value="<?= $mhs['nama']; ?>">
        </label>
      </li>
      <li>
        <label>
          NRP :
          <input type="text" name="nrp" required value="<?= $mhs['nrp']; ?>">
        </label>
      </li>
      <li>
        <label>
          Email :
          <input type="text" name="email" required value="<?= $mhs['email']; ?>">
        </label>
      </li>
      <li>
        <label>
          Jurusan :
          <input type="text" name="jurusan" required value="<?= $mhs['jurusan']; ?>">
        </label>
      </li>
      <li>
        <!-- untuk menyimpan gambar lama, 
            mengantisipasi kalau user tidak ingin mengganti gambar
        -->
        <input type="hidden" name="gambar_lama" value="<?= $mhs['gambar']; ?>">
        <label>
          Gambar :
          <input type="file" name="gambar" class="gambar" onchange="previewImage()">
        </label>
        <!-- preview gambar  -->
        <img src="img/<?= $mhs['gambar']; ?>" alt="gambar" width="120" style="display: block;" class="img-preview">
      </li>
      <li>
        <button type="submit" name="ubah">Ubah Data</button>
      </li>
    </ul>
  </form>
  <script src="js/script.js"></script>
</body>

</html>