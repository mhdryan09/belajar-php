<?php
// Jualan Produk : Komik dan Game

// constructor : method yang otomatis dijalankan ketika sebuah class kita instansiasi atau kita buat objek nyas

class Produk
{
  // property
  public $judul, $penulis, $penerbit, $harga;

  // method constructor
  // set nilai default di constructor saja
  public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga  = 0)
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
}

// membuat instansi objek dan mengirimkan paramater 
$produk1 = new Produk("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000);
$produk2 = new Produk("Uncharted", "Neil Druckman", "Sony Computer",  250000);

echo "Komik : " . $produk1->getLabel();
echo "<br>";
echo "Game : " . $produk2->getLabel();
