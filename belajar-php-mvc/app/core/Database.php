<?php

class Database
{
  // pasang semua setup database
  private $host = DB_HOST;
  private $user = DB_USER;
  private $pass = DB_PASS;
  private $db_name = DB_NAME;

  private $dbh, $stmt;
  // dbh => database handler
  // stmt => statement

  // koneksi database
  public function __construct()
  {
    // data source name
    $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name . '';

    // Konfigurasi PDO
    $option = [
      PDO::ATTR_PERSISTENT => true,
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];

    try {
      // jalankan PDO
      $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
    } catch (PDOException $e) {
      // keluarkan pesan error
      die($e->getMessage());
    }
  }

  // fungsi untuk menjalankan query
  public function query($query)
  {
    // statement akan berisi query apapun yang diminta
    $this->stmt = $this->dbh->prepare($query);
  }

  // fungsi untuk binding data
  public function bind($param, $value, $type = null)
  {
    // kalau type nya null 
    if (is_null($type)) {
      switch (true) {
          // kalau nilai nya integer
        case is_int($value):
          // maka param nya kita set jadi integer
          $type = PDO::PARAM_INT;
          break;
          // kalau nilai nya boolean
        case is_bool($value):
          $type = PDO::PARAM_BOOL;
          break;
          // kalau nilainya null
        case is_null($value):
          $type = PDO::PARAM_NULL;
          break;
          // selain itu
        default:
          // param set type nya string
          $type = PDO::PARAM_STR;
      }
    }

    $this->stmt->bindValue($param, $value, $type);
  }

  // fungsi untuk eksekusi
  public function execute()
  {
    $this->stmt->execute();
  }

  // fungsi untuk mengembalikan banyak data
  public function resultSet()
  {
    // jalankan / eksekusi
    $this->execute();
    // kembalikan data dalam bentuk array associative
    return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  // fungsi untuk mengembalikan satu data saja
  public function single()
  {
    // jalankan / eksekusi
    $this->execute();
    // kembalikan data dalam bentuk array associative
    return $this->stmt->fetch(PDO::FETCH_ASSOC);
  }

  // method untuk mengetahui ada berapa baris yang berubah di dalam tabel nya
  public function rowCount()
  {
    // jalankan rowCount() milik PDO
    return $this->stmt->rowCount();
  }
}
