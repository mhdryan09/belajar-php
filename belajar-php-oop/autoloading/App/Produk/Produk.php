<?php 

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
