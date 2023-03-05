<?php

class Mahasiswa extends Controller
{
  // method default
  public function index()
  {
    $data['judul'] = 'Daftar Nama Mahasiwa';
    // panggil model dan jalankan method getAllMahasiswa
    $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
    $this->view('templates/header', $data);
    $this->view('mahasiswa/index', $data);
    $this->view('templates/footer');
  }

  // ambil parameter id dari url
  public function detail($id)
  {
    $data['judul'] = 'Detail Mahasiwa';
    $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);
    $this->view('templates/header', $data);
    $this->view('mahasiswa/detail', $data);
    $this->view('templates/footer');
  }

  // fungsi untuk proses tambah data
  public function tambah()
  {
    // panggil model dan jalankan method tambahDataMahasiswa
    // lalu jika ada baris yg berubah
    if ($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0) {
      // set flah message
      Flasher::setFlash('berhasil', 'ditambahkan!', 'success');
      // arahkan ke halaman mahasiswa
      header("Location: " . BASE_URL . '/mahasiswa');
      exit;
    } else {
      // set flah message
      Flasher::setFlash('gagal', 'ditambahkan!', 'danger');
      // arahkan ke halaman mahasiswa
      header("Location: " . BASE_URL . '/mahasiswa');
      exit;
    }
  }

  // fungsi untuk proses hapus data
  // menerima paramater id
  public function hapus($id)
  {
    // panggil model dan jalankan method hapusDataMahasiswa
    // lalu jika ada baris yg berubah
    if ($this->model('Mahasiswa_model')->hapusDataMahasiswa($id) > 0) {
      // set flah message
      Flasher::setFlash('berhasil', 'dihapus!', 'success');
      // arahkan ke halaman mahasiswa
      header("Location: " . BASE_URL . '/mahasiswa');
      exit;
    } else {
      // set flah message
      Flasher::setFlash('gagal', 'dihapus!', 'danger');
      // arahkan ke halaman mahasiswa
      header("Location: " . BASE_URL . '/mahasiswa');
      exit;
    }
  }

  public function getubah()
  {
    // panggil model, lalu jalankan method getMahasiswaById sambil mengirimkan data berupa id
    // karena ini outputnya berupa array associative
    // dan kita harus mengubah ke dalam bentuk json, maka gunakan json_encode
    echo json_encode($this->model('Mahasiswa_model')->getMahasiswaById($_POST['id']));

    // lalu data json tersebut akan dikirimkan ke dalam script.js
  }

  // method untuk proses ubah dari form modal box
  public function ubah()
  {
    // panggil model dan jalankan method ubahDataMahasiswa
    // lalu jika ada baris yg berubah
    if ($this->model('Mahasiswa_model')->ubahDataMahasiswa($_POST) > 0) {
      // set flah message
      Flasher::setFlash('berhasil', 'diubah', 'success');
      // arahkan ke halaman mahasiswa
      header("Location: " . BASE_URL . '/mahasiswa');
      exit;
    } else {
      // set flah message
      Flasher::setFlash('gagal', 'diubah!', 'danger');
      // arahkan ke halaman mahasiswa
      header("Location: " . BASE_URL . '/mahasiswa');
      exit;
    }
  }
}
