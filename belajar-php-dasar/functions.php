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

  // Query isi tabel mahasiswa dgn menerima query dari index.php
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

  mysqli_query($conn, $query) or die(mysqli_error($conn));

  // ada baris yang berubah atau tidak 
  return mysqli_affected_rows($conn);
}

// menerima id dari hapus.php
function hapus($id)
{
  // koneksi database
  $conn = koneksi();

  // query delete
  mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id") or die(mysqli_error($conn));

  // ada baris yang berubah atau tidak 
  return mysqli_affected_rows($conn);
}

// menerima data iputan dari form
function ubah($data)
{
  // koneksi database
  $conn = koneksi();

  // pecah data yang diambil dari database, masukan ke variabel
  $nama = htmlspecialchars($data['nama']);
  $nrp = htmlspecialchars($data['nrp']);
  $email = htmlspecialchars($data['email']);
  $jurusan = htmlspecialchars($data['jurusan']);
  $gambar = htmlspecialchars($data['gambar']);
  // tangkap id
  $id = $data['id'];

  // query update data
  $query = "UPDATE mahasiswa SET
              nama = '$nama',
              nrp = '$nrp',
              email = '$email',
              jurusan = '$jurusan',
              gambar = '$gambar'
            WHERE id = '$id'
            ";

  mysqli_query($conn, $query) or die(mysqli_error($conn));

  // ada baris yang berubah atau tidak 
  return mysqli_affected_rows($conn);
}

// mencari data berdasarkan keyword cari
function cari($keyword)
{
  // koneksi database
  $conn = koneksi();

  $query = "SELECT * FROM mahasiswa
            WHERE 
            nama LIKE '%$keyword%' OR
            nrp LIKE '%$keyword%' OR
            email LIKE '%$keyword%'OR
            jurusan LIKE '%$keyword%'
            ";

  $result = mysqli_query($conn, $query);

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

// fungsi login
function login($data)
{
  // koneksi database
  $conn = koneksi();

  // ambil inputan data dari form user
  $username = htmlspecialchars($data['username']);
  $password = htmlspecialchars($data['password']);

  // cek dulu username
  if ($user = query("SELECT * FROM user WHERE username = '$username'")) {
    // cek password
    if (password_verify($password, $user['password'])) {
      // set session
      $_SESSION['login'] = true;

      header("Location: index.php");
      exit;
    }
  }
  return [
    'error' => true,
    'pesan' => 'Username / Password Salah!'
  ];
}

// fungsi registrasi
function registrasi($data)
{
  // koneksi database
  $conn = koneksi();

  // ambil inputan data dari form user
  $username = htmlspecialchars(strtolower($data['username']));
  $password1 = mysqli_real_escape_string($conn, $data['password1']);
  $password2 = mysqli_real_escape_string($conn, $data['password2']);

  // jika username / password kosong
  if (empty($username) || empty($password1) || empty($password2)) {
    echo "<script>
      alert('username / password tidak boleh kosong!');
      document.location.href = 'registrasi.php';
      </script>
    ";
    return false;
  }

  // jika username sudah ada
  if (query("SELECT * FROM user WHERE username = '$username'")) {
    echo "<script>
      alert('username sudah terdaftar!');
      document.location.href = 'registrasi.php';
      </script>
  ";
    return false;
  }

  // jika konfirmasi password tidak sesuai
  if ($password1 !== $password2) {
    echo "<script>
      alert('konfirmasi password tidak sesuai!');
      document.location.href = 'registrasi.php';
      </script>
  ";
    return false;
  }

  // jika password lebih kecil dari 5 digit
  if (strlen($password1) < 5) {
    echo "<script>
      alert('password terlalu pendek!');
      document.location.href = 'registrasi.php';
      </script>
    ";
    return false;
  }

  // jika username & password sudah sesuai
  // enkripsi password
  $password_baru = password_hash($password1, PASSWORD_DEFAULT);
  // masukkan ke tabel user
  $query = "INSERT INTO user
              VALUES
            (null, '$username', '$password_baru')
  ";

  // pasang query dgn koneksi
  mysqli_query($conn, $query) or die(mysqli_error($conn));

  // ada baris yang berubah atau tidak 
  return mysqli_affected_rows($conn);
}
