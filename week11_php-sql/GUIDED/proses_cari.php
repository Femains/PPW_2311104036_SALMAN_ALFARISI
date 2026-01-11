<?php
// File: proses_cari.php
// Fungsi: Logika pencarian data mahasiswa

function cariMahasiswa($conn, $keyword)
{
    // Escape keyword untuk keamanan
    $keyword = mysqli_real_escape_string($conn, $keyword);

    // Query pencarian
    $query = "SELECT * FROM mahasiswa
              WHERE nim LIKE '%$keyword%'
                 OR nama LIKE '%$keyword%'
                 OR jurusan LIKE '%$keyword%'
              ORDER BY nim ASC";

    return mysqli_query($conn, $query);
}

function hitungHasilCari($result)
{
    return mysqli_num_rows($result);
}
?>
