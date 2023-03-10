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

  // fungsi untuk proses tambah data
  // dan menerima data yg dikirim dari controller
  public function tambahDataMahasiswa($data)
  {
    // query insert data
    // kita gunakan binding data di dalamnya
    $query = "INSERT INTO mahasiswa
              VALUES
              ('', :nama, :nim, :email, :jurusan)";

    // jalankan method query
    $this->db->query($query);

    // binding data
    $this->db->bind('nama', $data['nama']);
    // $data['nama']; itu nama, kita dapatkan dari name di form inputannya
    $this->db->bind('nim', $data['nim']);
    $this->db->bind('email', $data['email']);
    $this->db->bind('jurusan', $data['jurusan']);

    // eksekusi query
    $this->db->execute();

    // kita butuh kembalikan nilai berupa angka, yaitu berapa baris yang terpengaruhi
    // jadi kita bisa gunakan method rowCount dari Database.php
    return $this->db->rowCount();
  }

  // fungsi untuk proses hapus data
  public function hapusDataMahasiswa($id)
  {
    // :id adalah cara binding 
    $query = "DELETE FROM mahasiswa WHERE id = :id";
    // jalankan query
    $this->db->query($query);
    // binding data id dari query, dan param
    $this->db->bind('id', $id);
    // eksekusi
    $this->db->execute();
    // kembalikan jika ada baris yg berubah
    return $this->db->rowCount();
  }

  // fungsi untuk proses ubah data
  // dan menerima data yg dikirim dari controller
  public function ubahDataMahasiswa($data)
  {
    // query update data
    // kita gunakan binding data di dalamnya
    $query = "UPDATE mahasiswa SET
              nama = :nama,
              nim = :nim,
              email = :email,
              jurusan = :jurusan
            WHERE id = :id";

    // jalankan method query
    $this->db->query($query);

    // binding data
    $this->db->bind('nama', $data['nama']);
    // $data['nama']; itu nama, kita dapatkan dari name di form inputannya
    $this->db->bind('nim', $data['nim']);
    $this->db->bind('email', $data['email']);
    $this->db->bind('jurusan', $data['jurusan']);
    $this->db->bind('id', $data['id']);

    // eksekusi query
    $this->db->execute();

    // kita butuh kembalikan nilai berupa angka, yaitu berapa baris yang terpengaruhi
    // jadi kita bisa gunakan method rowCount dari Database.php
    return $this->db->rowCount();
  }

  // fungsi untuk proses cari data
  public function cariDataMahasiswa()
  {
    // ambil data keyword yg dikirimkan 
    $keyword = $_POST['keyword'];
    $query = "SELECT * FROM mahasiswa WHERE nama LIKE :keyword";

    // jalankan query
    $this->db->query($query);
    // binding data
    $this->db->bind('keyword', "%$keyword%");
    // kembalikan semua data nya
    return $this->db->resultSet();
  }
}
