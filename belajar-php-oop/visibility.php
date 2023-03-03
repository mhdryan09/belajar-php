<?php

/*
  == Visibility ==

  1. public, dapat digunakan dimana saja, bahkan di luar class
  2. protected, hanya dapat digunakan di dalam sebuah kelas beserta turunannya
  3. private, hanya dapat digunakan di dalam sebuah kelas tertentu saja.
    yaitu di class, dimana properti tersebut didefenisikan/deklarasikan.
*/

class Produk
{
  public $judul, $penulis, $penerbit;

  protected $diskon = 0;

  private $harga;

  public function __construct($judul, $penulis, $penerbit, $harga)
  {
    // timpa isi properti dari paramater yg kita terima
    $this->judul = $judul;
    $this->penulis = $penulis;
    $this->penerbit = $penerbit;
    $this->harga = $harga;
  }

  // method
  public function getLabel()
  {
    return "$this->penulis, $this->penerbit";
    // gunakan this, untuk mengacu kepada properti di dalam class
  }

  // method info lengkap suatu produk
  public function getInfoProduk()
  {
    // contoh : Naruto | Masashi Kishimoto, Shonen Jump, Shonen Jump (Rp. 30000) - 100 Halaman.
    $str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
    return $str;
  }

  public function getHarga()
  {
    return $this->harga - ($this->harga * $this->diskon / 100);
  }
}

class Komik extends Produk
{
  public $jmlHalaman;

  public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga  = 0, $jmlHalaman = 0)
  {
    // panggil construct milik parent nya
    parent::__construct($judul, $penulis, $penerbit, $harga);

    // timpa properti jumlah halaman dari parameter yg diterima
    $this->jmlHalaman = $jmlHalaman;
  }

  // memanggil info produk khusus yang "KOMIK"
  public function getInfoProduk()
  {
    // overriding : kita bisa menggunakan method yang namanya sama tp ini merujuk pada method milik class parent
    $str = "Komik : " . parent::getInfoProduk() . " - {$this->jmlHalaman} Halaman.";
    return $str;
  }
}

class Game extends Produk
{
  public $waktuMain;

  public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga  = 0, $waktuMain = 0)
  {
    // panggil construct milik parent nya
    parent::__construct($judul, $penulis, $penerbit, $harga);

    // timpa properti waktumain dari parameter yg diterima
    $this->waktuMain = $waktuMain;
  }

  // memanggil info produk khusus yang "Game"
  public function getInfoProduk()
  {
    $str = "Game : " . parent::getInfoProduk() . "  ~ {$this->waktuMain} Jam.";
    return $str;
  }

  // set diskon
  public function setDiskon($diskon)
  {
    $this->diskon = $diskon;
  }
}

class CetakInfoProduk
{
  // menerima paremeter hanya dari class Produk
  // dan objek nya $produk
  public function cetak(Produk $produk)
  {
    $str = "{$produk->judul} | {$produk->getLabel()}, Shonen Jump (Rp. {$produk->harga})";
    return $str;
  }
}

// membuat instansi objek dan mengirimkan paramater 
$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
$produk2 = new Game("Uncharted", "Neil Druckman", "Sony Computer",  250000, 50);

echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();
echo "<hr>";

// bisa diakses di class child produk2 alias class Game
$produk2->setDiskon(50);
echo $produk2->getHarga();
