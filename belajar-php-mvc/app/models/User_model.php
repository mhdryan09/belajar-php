<?php

class User_model
{
  private $nama = 'Mhd Ryan Pranata';

  // fungsi untuk mengambil data nama
  public function getUser()
  {
    return $this->nama;
  }
}
