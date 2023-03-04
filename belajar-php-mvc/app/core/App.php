<?php

class App
{
  public function __construct()
  {
    // jalankan fungsi parseURL
    $url = $this->parseURL();
    var_dump($url);
  }

  // fungsi untuk mengecek URL
  public function parseURL()
  {
    // jika ada URL yang dikirimkan
    if (isset($_GET['url'])) {
      // isi variabel url dgn url yang kita kirimkan di halaman
      $url = rtrim($_GET['url'], '/');
      // rtrim artinya membersihkan dari suatu character tertentu

      // bersihkan url dari inputan user seperti character aneh
      $url = filter_var($url, FILTER_SANITIZE_URL);

      // kemudian kita pecah url menjadi elemen array
      $url = explode('/', $url);
      return $url;
    }
  }
}
