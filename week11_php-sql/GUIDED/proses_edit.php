<?php
// File: proses_edit.php
// Fungsi: Memproses update data mahasiswa

include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Ambil & amankan data
    $nim           = mysqli_real_escape_string($conn, $_POST['nim']);
    $nama          = mysqli_real_escape_string($conn, $_POST['nama']);
    $jurusan       = mysqli_real_escape_string($conn, $_POST['jurusan']);
    $email         = mysqli_real_escape_string($conn, $_POST['email']);
    $tanggal_lahir = mysqli_real_escape_string($conn, $_POST['tanggal_lahir']);

    // Query UPDATE
    $query = "UPDATE mahasiswa SET
                nama = '$nama',
                jurusan = '$jurusan',
                email = '$email',
                tanggal_lahir = '$tanggal_lahir'
              WHERE nim = '$nim'";

    // Eksekusi query
    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('Data berhasil diupdate!');
                window.location.href = 'tampil_data.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal mengupdate data!');
                window.location.href = 'form_edit.php?nim=$nim';
              </script>";
    }
}

mysqli_close($conn);
?>
