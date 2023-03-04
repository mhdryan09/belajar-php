<?php
require_once 'App/init.php';

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
