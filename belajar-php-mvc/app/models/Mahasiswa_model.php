<?php

class Mahasiswa_model
{
  private $table = 'mahasiswa';
  private $db;

  public function __construct()
  {
    // instansiasi class Database
    $this->db = new Database;
  }


  // method untuk mengambil semua data mahasiswa
  public function getAllMahasiswa()
  {
    // panggil fungsi query dan kirimkan param berupa sintak query
    $this->db->query("SELECT * FROM " . $this->table);

    // panggil fungsi resultSet untuk mengambil semua datanya
    return $this->db->resultSet();
  }

  // method untuk mengambil satu data berdasarkan id yg dipilih
  public function getMahasiswaById($id)
  {
    // jalankan query
    $this->db->query("SELECT * FROM " . $this->table . ' WHERE id=:id');
    // binding data
    $this->db->bind('id', $id);
    // kembalikan satu data
    return $this->db->single();
  }
}
