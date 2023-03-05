<?php

class About
{

  // method default
  public function index($nama = 'Ryan', $pekerjaan = 'Programmer')
  {
    echo "Halo nama saya adaah $nama, saya adalah seorang $pekerjaan";
  }

  // method page
  public function page()
  {
    echo 'About/page';
  }
}
