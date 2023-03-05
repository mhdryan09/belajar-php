<?php
// cek ada session ada tidak
// jika di dalam program kita, tidak terdeteksi session
if (!session_id()) {
  // jalankan session nya
  session_start();
};

// file yang berisi pemanggilan seluruh file terkait.
// init : inisialisasi
require_once '../app/init.php';

// instansiasi class App / menjalankan class App
$app = new App;
