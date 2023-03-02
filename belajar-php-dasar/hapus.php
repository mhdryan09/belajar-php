<?php
// jalankan session
session_start();

// apakah session dgn keyword login ada 
// jika tidak ada
if (!isset($_SESSION['login'])) {
  // pindahkan ke halaman login
  header("Location: login.php");
  exit;
}

require 'functions.php';

// jika tidak ada id di url
if (!isset($_GET['id'])) {
  header("Location: index.php");
  exit;
}

// ambil id dari url
$id = $_GET['id'];

// jika baris yang berubah
if (hapus($id) > 0) {
  echo "<script>
      alert('data berhasil dihapus!');
      document.location.href = 'index.php';
      </script>
  ";
} else {
  echo "data gagal dihapus";
}
