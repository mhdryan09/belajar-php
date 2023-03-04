<?php
/*
  autoloading secara sederhana adalah memanggil class (file) tanpa harus menggunakan require.

  Jadi, pemanggilan nya secara otomatis. Karena nantinya, pada saat kita membuat sebuah aplikasi menggunakan konsep object oriented itu biasanya 1 class ditulis dalam 1 file.

  Kenapa dengan menggunakan require / include / require_once ?

  Sebenarnya fungsinya sama yaitu untuk memanggil file terpisah. Tidak akan masalah menggunakan require, jika aplikasi yang dibuat hanya sederhana dan bekerja sendiri. Hal tersebut berbeda jika kita bekerja secara berkelompok atau dengan tim, karena pasti banyak file – file yang akan di include kan
*/


// cara lama :
// require_once 'Produk/InfoProduk.php';
// require_once 'Produk/Produk.php';
// require_once 'Produk/Game.php';
// require_once 'Produk/Komik.php';
// require_once 'Produk/CetakInfoProduk.php';

// spl : standart php library
spl_autoload_register(
  function ($class) {
    require_once 'Produk/' . $class . '.php';
    // Jadi function ( $class ) ini akan berguna untuk memanggil class satu persatu, yang ada di dalam folder Produk, secara otomatis. Lalu file tersebut kita gabungkan dengan .php
  }
);
// fungsi ini akan melihat file apa saja yang sudah teregistrasi di dalam folder Produk

// Hal ini memudahkan, ketika kita ingin membuat sebuah class baru, lalu instansiasi nya, tanpa harus require
