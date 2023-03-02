<?php
// jalankan session
session_start();

// bersihin semua session
session_destroy();

// pindah halaman ke login
header("Location: login.php");
exit;
