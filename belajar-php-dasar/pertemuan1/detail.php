<?php
require 'functions.php';

// ambil id dari url
$id = $_GET["id"];

// query mahasiswa berdasarkan id
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id");
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Mahasiswa</title>
</head>

<body>
  <h3>Detail Mahasiswa</h3>
  <ul>
    <li><img src="../pertemuan1/img/<?= $mhs['gambar']; ?>" alt=""></li>
    <li>NRP : <?= $mhs["npm"]; ?></li>
    <li>Nama : <?= $mhs["nama"]; ?></li>
    <li>Email : <?= $mhs["email"]; ?></li>
    <li>Jurusan : <?= $mhs["jurusan"]; ?></li>
    <li><a href="">ubah</a> | <a href="">hapus</a></li>
    <li><a href="latihan2.php">Kembali ke daftar mahasiswa</a></li>
  </ul>
</body>

</html>