<?php

class Mahasiswa_model
{
  // private $mhs = [
  //   [
  //     "nama" => "Muhammad Ryan Pranata",
  //     "nim" => "12345",
  //     "email" => "pranataryan91@gmail.com",
  //     "jurusan" => "Sistem Informasi"
  //   ],
  //   [
  //     "nama" => "Yudhia Ayu Puspita",
  //     "nim" => "12346",
  //     "email" => "yudhia11@gmail.com",
  //     "jurusan" => "Akutansi"
  //   ],
  //   [
  //     "nama" => "Muhammad Rifky Prawira",
  //     "nim" => "12347",
  //     "email" => "rifky14@gmail.com",
  //     "jurusan" => "Teknik Informatika"
  //   ]
  // ];

  private $dbh, $stmt;
  // dbh => database handler
  // stmt => statement

  // method construct kita isi untuk koneksi ke database
  // gunakan metode PDO, karena lebih baik daripada mysqli_connect
  public function __construct()
  {
    // data source name
    $dsn = 'mysql:host=localhost;dbname=belajar-php-mvc';

    try {
      // jalankan PDO
      $this->dbh = new PDO($dsn, 'root', '');
    } catch (PDOException $e) {
      // keluarkan pesan error
      die($e->getMessage());
    }
  }

  // method untuk mengambil semua data mahasiswa
  public function getAllMahasiswa()
  {
    // return $this->mhs;

    // cara mendapatkan query
    $this->stmt = $this->dbh->prepare("SELECT * FROM mahasiswa");
    // eksekusi statement
    $this->stmt->execute();
    // kembalikan semua data nya sebagai array associative 
    return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
