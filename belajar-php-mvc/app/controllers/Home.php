<?php

class Home extends Controller
{
  // method default
  public function index()
  {
    // set data
    $data['judul'] = 'Home';
    // panggil model User_model dan jalankan method getUser
    // lalu kirimkan sebagai parameter nama
    $data['nama'] = $this->model('User_model')->getUser();

    // panggil halaman header, dan kirimkan data sesuai yg sudah kita set
    $this->view("templates/header", $data);
    $this->view("home/index", $data);
    $this->view("templates/footer");
  }
}
