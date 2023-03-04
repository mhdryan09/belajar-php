<?php

// class ContohStatic
// {
//   public static $angka = 1;

//   public static function halo()
//   {
//     // untuk menggunakan properti angka, gunakan self::
//     // yang tujuannya sama seperti this
//     return "Halo " . self::$angka . " kali";
//   }
// }

// // cara mengakses properti yang memiliki keyword static
// echo ContohStatic::$angka;
// echo "<br>";
// // sedangkan untuk function
// echo ContohStatic::halo();
// echo "<hr>";

/*
  static keyword
    - member (properti & method) yang terikat dengan class, bukan dengan object
    - nilai static akan selalu tetap meskipun object di-instansiasi berulang kali
    - membuat kode menjadi "procedural"
    - biasanya digunakan untuk membuat fungsi bantuan/helper
    - atau digunakan di class-class utility pada Framework
*/

class Contoh
{
  // public $angka = 1;
  public static $angka = 1; // static

  public function halo()
  {
    // return "Halo " . $this->angka++ . " kali. <br>";

    // gunakan keyword self:: karena kita punya properti static
    return "Halo " . self::$angka++ . " kali. <br>";

    // dan karena nilainya static, maka nilai nya tidak akan di reset
  }
}

$obj = new Contoh();
echo $obj->halo();
echo $obj->halo();
echo $obj->halo();

echo "<hr>";

$obj2 = new Contoh();
echo $obj2->halo();
echo $obj2->halo();
echo $obj2->halo();

/*
  sebenarnya kita bisa mengakses property dan method dalam konteks class.
  Artinya, kita bisa mengakses property dan method tanpa melakukan instansiasi dari class tersebut. 
  Kita dapat melakukan hal tersebut dengan static keyword.
  Maka kita butuh membuat static property dan static method, agar kita bisa akses pada konteks class
*/
