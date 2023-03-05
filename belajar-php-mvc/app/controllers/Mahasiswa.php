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
}
