<?php

class Controller
{
  // method untuk memanggil halaman view, dan mengirimkan data (jika ada)
  public function view($view, $data = [])
  {
    require_once '../app/views/' . $view . '.php';
  }

  // method untuk memanggil model
  public function model($model)
  {
    require_once '../app/models/' . $model . '.php';
    // instansiasi class agar bisa digunakan
    return new $model;
  }
}
