<?php

/*
  interface
    - Interface merupakan kelas abstrak yang sama sekali tidak memiliki implementasi.
      Seperti yang kita ketahui, bahwa kelas abstrak adalah sebuah kelas yang di dalamnya harus memiliki minimal ada 1 method abstrak.
      Ketika kita punya method abstrak, method tersebut hanya kita tulis defenisi nya saja, lalu implementasi ada di kelas turunan nya. 
      Sedangkan interface kebalikannya, semua nya harus defenisi nya saja.

    - kelas yang murni, merupakan template untuk kelas turunan nya. murni artinya, sama sekali tidak ada implementasinya.

    - tidak boleh memiliki property, hanya deklarasi method saja

    - semua method nya harus di deklarasikan dengan visibility public

    - boleh mendeklarasikan __construct ( )
      kita bisa mendeklarasikan keyword __construct di dalam interface, untuk mewajibkan kelas turunan nya punya method construct juga.

    - Satu kelas (turunan nya) boleh mengimplementasikan banyak interface.
      Jadi, kita boleh punya banyak interface yang di implements ke sebuah kelas.

    -  Dengan menggunakan type – hinting dapat melakukan ‘dependency injection’.
      Type – hinting ini artinya kita dapat menjadikan object sebagai parameter. dependecy injection artinya kita memaksakan sebuah method untuk menerima parameter yang berupa object.

    - Pada akhinya akan mencapai polimorphism

    Tambahan : 
      Kalau kita punya 3 function di dalam interface, maka untuk class turunan yang ingin mengimplementasikan dari interface itu, 
      wajib menggunakan 3 fungsi tersebut di dalamnya
*/

// interface
interface InfoProduk
{
  public function getInfoProduk();
}

// set jadi abstract class
abstract class Produk
{
  // set jadi protected, karena butuh diakses oleh class child nya
  protected $judul, $penulis, $penerbit, $harga, $diskon = 0;

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

  // method abstract
  abstract public function getInfo();
}

// extends : mewarisi semua properti dan method dari class Produk
// implements : mengimplementasikan interface InfoProduk
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

class CetakInfoProduk
{
  // kita buat variabel array kosong untuk menampung produk
  public $daftarProduk = [];

  // menerima paremeter hanya dari class Produk
  // dan objek nya $produk
  public function tambahProduk(Produk $produk)
  {
    // kita tambahkan produk ke daftarProduk
    $this->daftarProduk[] = $produk;
  }

  public function cetak()
  {
    $str = "DAFTAR PRODUK : <br>";

    // kita lakukan loop array untuk mengambil data daftar produk
    foreach ($this->daftarProduk as $p) {
      // gabungkan dgn str
      $str .= "- {$p->getInfoProduk()} <br>";
      // karena $p adalah objek produk, sehingga kita bisa memanggil fungsi getInfoProduk
    }

    return $str;
  }
}

// membuat instansi objek dan mengirimkan paramater 
$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
$produk2 = new Game("Uncharted", "Neil Druckman", "Sony Computer",  250000, 50);

// kita instansiasi objek cetakInfoProduk
$cetakProduk = new CetakInfoProduk();
// panggi fungsi tambahProduk
$cetakProduk->tambahProduk($produk1);
$cetakProduk->tambahProduk($produk2);
// cetak ke layar
echo $cetakProduk->cetak();
