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
}
