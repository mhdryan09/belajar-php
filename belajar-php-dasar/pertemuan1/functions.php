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

// menerima data dari form
function tambah($data)
{
  // koneksi database
  $conn = koneksi();

  // pecah data yang diambil dari database, masukan ke variabel
  $nama = htmlspecialchars($data['nama']);
  $nrp = htmlspecialchars($data['nrp']);
  $email = htmlspecialchars($data['email']);
  $jurusan = htmlspecialchars($data['jurusan']);
  $gambar = htmlspecialchars($data['gambar']);

  // query insert data
  $query = "INSERT INTO
              mahasiswa
            VALUES 
              (null, '$nama', '$nrp', '$email', '$jurusan', '$gambar')
            ";

  mysqli_query($conn, $query);

  // ada baris yang berubah atau tidak 
  return mysqli_affected_rows($conn);
}
