<?php
require '../functions.php';

// ambil keyword lalu kirim ke fungsi cari
$mahasiswa = cari($_GET['keyword']);
?>

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