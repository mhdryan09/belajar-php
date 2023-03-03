<?php

/* 
    kita menggunakan setter & getter ini untuk menghindari ketika kita membuat sebuah property dengan visibillity public. Karena sebaiknya kita tidak membiarkan bagian dari luar class kita, bisa mengakses property secara langsung. 
    Maka untuk itu kita ubah visibillity nya menjadi protected atau private, tergantung dari desain kita.
    
    Karena kita mengubah visibillity nya, maka kita juga membutuhkan sebuah method yang dapat membaca/melihat isi dari property ataupun mengubah isinya. Method tersebut nantinya akan kita sebut dengan setter dan getter.

    lalu tujuan selanjutnya, jika semisal kita ingin melakukan validasi pada sebuah inputan, misal untuk judul, maka cukup lakukan di dalam fungsi setJudul() aja.
*/

class Produk
{
  private $judul, $penulis, $penerbit, $harga, $diskon = 0;

  public function __construct($judul, $penulis, $penerbit, $harga)
  {
    // timpa isi properti dari paramater yg kita terima
    $this->judul = $judul;
    $this->penulis = $penulis;
    $this->penerbit = $penerbit;
    $this->harga = $harga;
  }

  // method setter
  public function setJudul($judul)
  {
    // jika judulnya tidak berbentuk string
    if (!is_string($judul)) {
      throw new Exception("Judul harus string");
    }

    // set ulang judul dari parameter yg dikirimkan
    $this->judul = $judul;
  }

  // method getter
  public function getJudul()
  {
    return $this->judul;
  }

  public function setPenulis($penulis)
  {
    $this->penulis = $penulis;
  }

  public function getPenulis()
  {
    return $this->penulis;
  }

  public function setPenerbit($penerbit)
  {
    $this->penerbit = $penerbit;
  }

  public function getPenerbit()
  {
    return $this->penerbit;
  }

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

  public function setDiskon($diskon)
  {
    $this->diskon = $diskon;
  }

  public function getDiskon()
  {
    return $this->diskon;
  }

  public function setHarga($harga)
  {
    $this->harga = $harga;
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

$produk1->setJudul("Judul Baru"); // setter
echo $produk1->getJudul(); // getter
echo "<br>";

// set nilai baru ke penulis
$produk1->setPenulis("Ryan Pranata");
echo $produk1->getPenulis();
