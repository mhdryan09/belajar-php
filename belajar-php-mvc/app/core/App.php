<?php

class App
{
  // properti default
  protected $controller = 'Home';
  protected $method = 'index';
  protected $params = [];

  public function __construct()
  {
    // jalankan fungsi parseURL
    $url = $this->parseURL();

    // cek apakah ada nama file controller yang sesuai dengan yg kita ketik di url
    if (file_exists('../app/controllers/' . $url[0]) . '.php') {
      // $url[0] adalah elemen pertama saat ketik di url
      // dimana menandakan bahwa itu adalah controllernya
      $this->controller = $url[0];
      // hilangkan controller tersebut dari elemen array nya
      unset($url[0]);
      // ini kita gunakan supaya kita bisa mengambil parameter nya
    }

    // panggil file controller
    require_once '../app/controllers/' . $this->controller . '.php';
    // instansiasi object
    $this->controller = new $this->controller;
    // kita lakukan instansiasi agar bisa memanggil methodnya

    // method ada di url[1] dari request yg kita minta di url nya
    // cek method, apakah ada tidak di dalam controller nya
    if (isset($url[1])) {
      // cek method
      if (method_exists($this->controller, $url[1])) {
        // kalau ada kita timpa dengan url yg baru
        $this->method = $url[1];
        // hilangkan method tersebut dari elemen array nya
        unset($url[1]);
      }
    }

    // saatnya kelola paramater
    // parameter adalah data yg diminta setelah controller/method/

    // cek apakah elemen dari array $url ksong atau tidak
    // jika tidak kosong (alias ada)
    if (!empty($url)) {
      // tambahkan nilai url yg merupakan parameternya ke properti params
      $this->params = array_values($url);
    }

    // jalankan controller dan method serta kirimkan params jika ada
    call_user_func_array([$this->controller, $this->method], $this->params);
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
