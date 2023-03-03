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

// menghubungkan dgn halaman functions.php
require 'functions.php';

// mengirimkan query select
$mahasiswa = query("SELECT * FROM mahasiswa");

// ketika tombol cari di klik
if (isset($_POST['cari'])) {
  // ambil keyword lalu kirim ke fungsi cari
  $mahasiswa = cari($_POST['keyword']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Mahasiswa</title>
</head>

<body>
  <a href="logout.php">Logout</a>
  <h3>Daftar Mahasiswa</h3>

  <a href="tambah.php">Tambah Data Mahasiswa</a>
  <br><br>

  <form action="" method="post">
    <input type="text" name="keyword" size="30" placeholder="masukan keyword pencarian..." autocomplete="off" autofocus class="keyword">
    <button type="submit" name="cari" class="tombol-cari">Cari</button>
  </form>
  <br>

  <div class="container">
    <table border="1" cellpadding="10" cellspacing="0">
      <tr>
        <th>No</th>
        <th>Gambar</th>
        <th>Nama</th>
        <th>Aksi</th>
      </tr>

      <?php if (empty($mahasiswa)) : ?>
        <tr>
          <td colspan="4">
            <p style="color: red; font-style: italic;">Data Mahasiswa tidak ditemukan!</p>
          </td>
        </tr>
      <?php endif; ?>

      <tr>
        <?php $i = 1; ?>
        <?php foreach ($mahasiswa as $m) : ?>
          <td><?= $i++; ?></td>
          <td><img src="img/<?= $m["gambar"] ?>" alt="gambar1" width="60"></td>
          <td><?= $m["nama"] ?></td>
          <td>
            <a href="detail.php?id=<?= $m['id']; ?>">lihat detail</a>
          </td>
      </tr>
    <?php endforeach; ?>
    </table>
  </div>

  <script src="js/script.js"></script>
</body>

</html>