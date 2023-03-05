<?php

class Flasher
{

  // static artinya, kita tidak perlu instansiasi object nya nanti
  // aksi akan berupa tambah/hapus/ubah
  // tipe akan berupa class mana yg kita gunakan dari bootstrap
  public static function setFlash($pesan, $aksi, $tipe)
  {
    // set session berdasarkan data yg kita kirimkan
    $_SESSION['flash'] = [
      'pesan' => $pesan,
      'aksi' => $aksi,
      'tipe' => $tipe
    ];
  }

  // method untuk menampilkan flash (pesan nya)
  public static function flash()
  {
    // ada tidak session dengan nama flash
    // jika ada
    if (isset($_SESSION['flash'])) {
      // tampilkan pesan nya
      echo '
      <div class="alert alert-' . $_SESSION['flash']['tipe'] . ' alert-dismissible fade show" role="alert">
        Data Mahasiswa <strong>' . $_SESSION['flash']['pesan'] . '</strong>
        ' . $_SESSION['flash']['aksi'] . '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';

      // selanjutnya session akan kita hapus, karena flash hanya terjadi sekali
      // hapus session
      unset($_SESSION['flash']);
    }
  }
}
