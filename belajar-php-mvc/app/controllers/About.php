<?php

class About extends Controller
{

  // method default
  // dan set nilai paramater default
  public function index($nama = 'Ryan', $pekerjaan = 'Programmer', $umur = 26)
  {
    // set data yg diambil dari parameter
    $data['nama'] = $nama;
    $data['pekerjaan'] = $pekerjaan;
    $data['umur'] = $umur;
    $data['judul'] = 'About Me';

    $this->view("templates/header", $data);
    // panggil view dan mengirimkan data
    $this->view('about/index', $data);
    $this->view('templates/footer');
  }

  // method page
  public function page()
  {
    $data['judul'] = 'Pages';

    $this->view("templates/header", $data);
    $this->view('about/page');
    $this->view('templates/footer');
  }
}
