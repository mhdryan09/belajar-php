<?php

class Produk
{
  public $judul, $penulis, $penerbit, $harga, $jmlHalaman, $waktuMain;

  public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga  = 0, $jmlHalaman = 0, $waktuMain = 0)
  {
    // timpa isi properti dari paramater yg kita terima
    $this->judul = $judul;
    $this->penulis = $penulis;
    $this->penerbit = $penerbit;
    $this->harga = $harga;
    $this->jmlHalaman = $jmlHalaman;
    $this->waktuMain = $waktuMain;
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
}

// child class dari class Produk (parent)
// perilaku method pada child class adalah dia akan cari dulu di scope child class itu sndiri
// kalau tidak ada, maka dia akan naik mencari method trsbut ke class parent nya
// hal yang sama juga berlaku pada properti

class Komik extends Produk
{
  // memanggil info produk khusus yang "KOMIK"
  public function getInfoProduk()
  {
    // Komik : Naruto | Masashi Kishimoto, Shonen Jump, Shonen Jump (Rp. 30000) - 100 Halaman.
    $str = "Komik : {$this->judul} | {$this->getLabel()} (Rp. {$this->harga})  - {$this->jmlHalaman} Halaman.";
    return $str;
  }
}

class Game extends Produk
{
  // memanggil info produk khusus yang "KOMIK"
  public function getInfoProduk()
  {
    $str = "Game : {$this->judul} | {$this->getLabel()} (Rp. {$this->harga})  ~ {$this->waktuMain} Jam.";
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
$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100, 0);
$produk2 = new Game("Uncharted", "Neil Druckman", "Sony Computer",  250000, 0, 50);

echo $produk1->getInfoProduk();
echo "<hr>";
echo $produk2->getInfoProduk();
