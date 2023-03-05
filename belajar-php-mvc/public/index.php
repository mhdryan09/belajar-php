<?php
// jika tidak ada session di index, maka jalankan session start
if (!session_id()) {
  session_start();
}

// file yang berisi pemanggilan seluruh file terkait.
// init : inisialisasi
require_once '../app/init.php';

// instansiasi class App / menjalankan class App
$app = new App;
