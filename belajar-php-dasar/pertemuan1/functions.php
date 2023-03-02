<?php
function koneksi()
{
  // koneksi ke DB dan pilih Database
  return mysqli_connect('localhost', 'root', '', 'belajar-php-dasar');
}

function query($query)
{
  // panggil koneksi
  $conn = koneksi();

  // Query isi tabel mahasiswa dgn menerima query dari latihan1.php
  $result = mysqli_query($conn, $query);

  // jika hasilnya hanya 1 data
  if (mysqli_num_rows($result) == 1) {
    return mysqli_fetch_assoc($result);
  }

  // variabel array kosong
  $rows = [];
  // ubah data ke dalam array 
  // lakukan perulangan while untuk mengulang seberapa banyak datanya
  while ($row = mysqli_fetch_assoc($result)) {
    // masukan data ke variabel $rows
    $rows[] = $row;
  }

  return $rows;
}
