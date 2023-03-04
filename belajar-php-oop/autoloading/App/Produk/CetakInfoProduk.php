<?php 
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
