<?php 
class Komik extends Produk implements InfoProduk
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
    $str = "Komik : " . $this->getInfo() . " - {$this->jmlHalaman} Halaman.";
    return $str;
  }

  public function getInfo()
  {
    // contoh : Naruto | Masashi Kishimoto, Shonen Jump, Shonen Jump (Rp. 30000) - 100 Halaman.
    $str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
    return $str;
  }
}
