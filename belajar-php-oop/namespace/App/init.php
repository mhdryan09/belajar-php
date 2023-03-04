<?php
// cara lama :
// require_once 'Produk/InfoProduk.php';
// require_once 'Produk/Produk.php';
// require_once 'Produk/Game.php';
// require_once 'Produk/Komik.php';
// require_once 'Produk/CetakInfoProduk.php';
// require_once 'Produk/User.php';
// require_once 'Service/User.php';

spl_autoload_register(
  function ($class) {
    // mau bikin seperti ini : App\Produk\User = ["App", "Produk", "User"];
    // caranya :
    // kita pecah string berdasarkan pemisah tertentu
    $class = explode('\\', $class);
    // lalu kita ingin mengambil User nya aja
    $class = end($class);
    require_once __DIR__ . '/Produk/' . $class . '.php';
  }
);

spl_autoload_register(
  function ($class) {
    $class = explode('\\', $class);
    $class = end($class);
    require_once __DIR__ . '/Service/' . $class . '.php';
  }
);
