<?php
// Jualan Produk : Komik dan Game

class Produk
{
  // property
  public $judul = "judul", // set nilai default
    $penulis = "penulis",
    $penerbit = "penerbit",
    $harga = 0;

  // method
  public function getLabel()
  {
    return "$this->penulis, $this->penerbit";
    // gunakan this, untuk mengacu kepada properti di dalam class
  }
}

// // membuat instans objek dari class Produk
// $produk1 = new Produk();
// // menimpa isi properti
// $produk1->judul = "Naruto";

// satu instansi untuk semua properti lengkap
$produk3 = new Produk();
$produk3->judul = "Naruto";
$produk3->penulis = "Masashi Kishimoto";
$produk3->penerbit = "Shonen Jump";
$produk3->harga = 30000;

$produk4 = new Produk();
$produk4->judul = "Uncharted";
$produk4->penulis = "Neil Druckman";
$produk4->penerbit = "Sony Computer";
$produk4->harga = 250000;

// cetak ke layar
// echo "Komik : $produk3->judul, $produk3->penulis"; // cetak properti

echo "Komik : " . $produk3->getLabel();
echo "<br>";
echo "Game : " . $produk4->getLabel();
