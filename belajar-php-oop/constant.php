<?php
// cara membuat tipe constant ada 2 : define dan const
// gunakan huruf kapital ketika mendefinisikan sebuah constant
// agar membedakan dengan variabel

// 1. define()
// define('NAMA', 'Mhd Ryan Pranata');
// echo NAMA;

// echo "<br>";

// // 2. const
// const UMUR = 26;
// echo UMUR;

/*
perbedaan dari kedua cara diatas adalah ketika kita ingin coding dgn menggunakan style OOP
jika kita menggunakan define, itu kita tidak bisa simpan ke dalam sebuah class, melainkan kita set diluar sebagai constanta global
sedangkan const, kita bisa masukan ke dalam class, sehingga bisa kita gunakan ketika ingin menggunakan style OOP
*/


class Coba
{
  // define('NAMA', 'Mhd Ryan Pranata'); // error
  const NAMA = 'Mhd Ryan Pranata';
}

// cara mengakses nilai const
echo Coba::NAMA;
