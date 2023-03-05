<?php

class Home extends Controller
{
  // method default
  public function index()
  {
    // set judul
    $data['judul'] = 'Home';
    $this->view("templates/header", $data);
    // kita panggil fungsi view lalu cari folder home dgn file index
    $this->view("home/index");
    $this->view("templates/footer");
  }
}
