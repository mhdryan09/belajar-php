<?php
// Jualan Produk : Komik dan Game

// constructor : method yang otomatis dijalankan ketika sebuah class kita instansiasi atau kita buat objek nyas

class Produk
{
  // property
  public $judul, $penulis, $penerbit, $harga, $jmlHalaman, $waktuMain, $tipe;

  // method constructor
  // set nilai default di constructor saja
  public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga  = 0, $jmlHalaman = 0, $waktuMain = 0, $tipe)
  {
    // timpa isi properti dari paramater yg kita terima
    $this->judul = $judul;
    $this->penulis = $penulis;
    $this->penerbit = $penerbit;
    $this->harga = $harga;
    $this->jmlHalaman = $jmlHalaman;
    $this->waktuMain = $waktuMain;
    $this->tipe = $tipe;
  }

  // method
  public function getLabel()
  {
    return "$this->penulis, $this->penerbit";
    // gunakan this, untuk mengacu kepada properti di dalam class
  }

  // method info lengkap suatu produk
  public function getInfoLengkap()
  {
    // Komik : Naruto | Masashi Kishimoto, Shonen Jump, Shonen Jump (Rp. 30000) - 100 Halaman.
    $str = "{$this->tipe} : {$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";

    // cek berdasarkan tipe
    if ($this->tipe == "Komik") {
      $str .= " - {$this->jmlHalaman} Halaman.";
    } else if ($this->tipe == "Game") {
      $str .= " ~ {$this->waktuMain} Jam.";
    }

    return $str;
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
$produk1 = new Produk("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100, 0, "Komik");
$produk2 = new Produk("Uncharted", "Neil Druckman", "Sony Computer",  250000, 0, 50, "Game");

echo $produk1->getInfoLengkap();
echo "<hr>";
echo $produk2->getInfoLengkap();
