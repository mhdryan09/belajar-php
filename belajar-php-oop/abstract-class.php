<?php
/*
  abstract class 
    - Sebuah class yang tidak dapat di-instansiasi
    - Dapat disebut dengan kelas ‘abstrak’
    - Mendefenisikan interface untuk kelas lain yang menjadi turunan nya
    - Berperan sebagai ‘kerangka dasar’ untuk kelas turunan nya.
        Jadi class – class turunan nya akan bekerja sesuai dengan kerangka atau interface yang sudah kita buat di class abstract
    - Di dalam class abstrak, memiliki minimal 1 method abstrak
        Method ini yang nanti akan kita anggap sebagai interface atau kerangka dari method yang akan kita buat di class – class turunan nya
    - Digunakan dalam ‘pewarisan/inheritance’ untuk ‘memaksakan’ implementasi method abstrak yang sama untuk semua kelas turunan nya
    - Semua kelas turunan, harus mengimplementasikan method abstrak yang ada di kelas abstraknya
    - Kelas abstrak boleh memiliki property / method reguler (boleh public, private, protected)
    - Kelas abstrak boleh memiliki property / static method

    Yang penting, minimal harus ada 1 method abstrak.

  Jadi di dalam class abstrak, nanti kita akan punya sebuah method abstrak yang hanya interface nya aja (nama saja, tidak ada isinya). Kemudian isinya nanti, kita tuliskan di class – class turunan nya, dengan menggunakan method yang nama nya sama
*/



// set class Produk menjadi abstract class
abstract class Produk
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

  // method abstract
  // yang nanti akan di implementasikan di class child/turunan nya
  abstract public function getInfoProduk();

  public function getInfo()
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
    $str = "Komik : " . $this->getInfo() . " - {$this->jmlHalaman} Halaman.";
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
    $str = "Game : " . $this->getInfo() . "  ~ {$this->waktuMain} Jam.";
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
