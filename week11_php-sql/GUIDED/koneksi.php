<?php
// ======================
// KONFIGURASI DATABASE
// ======================

$host     = "localhost"; 
$username = "root";      
$password = "";          
$database = "akademik";  

// ======================
// MEMBUAT KONEKSI
// ======================

$conn = mysqli_connect($host, $username, $password, $database);

// Cek koneksi
if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

echo "Koneksi database berhasil!";
?>
