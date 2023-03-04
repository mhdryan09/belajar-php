<?php 
class Game extends Produk implements InfoProduk
{
  public $waktuMain;

  public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga  = 0, $waktuMain = 0)
  {
    // panggil construct milik parent nya
    parent::__construct($judul, $penulis, $penerbit, $harga);

    // timpa properti waktumain dari parameter yg diterima
    $this->waktuMain = $waktuMain;
  }

  public function getInfoProduk()
  {
    $str = "Game : " . $this->getInfo() . "  ~ {$this->waktuMain} Jam.";
    return $str;
  }

  public function getInfo()
  {
    // contoh : Naruto | Masashi Kishimoto, Shonen Jump, Shonen Jump (Rp. 30000) - 100 Halaman.
    $str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
    return $str;
  }
}
