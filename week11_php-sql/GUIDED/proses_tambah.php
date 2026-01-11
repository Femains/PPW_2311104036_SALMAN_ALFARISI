<?php
// File: proses_tambah.php
// Fungsi: Memproses data dari form dan menyimpan ke database

include "koneksi.php";

// Cek apakah form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Ambil data dari form
    $nim            = mysqli_real_escape_string($conn, $_POST['nim']);
    $nama           = mysqli_real_escape_string($conn, $_POST['nama']);
    $jurusan        = mysqli_real_escape_string($conn, $_POST['jurusan']);
    $email          = mysqli_real_escape_string($conn, $_POST['email']);
    $tanggal_lahir  = mysqli_real_escape_string($conn, $_POST['tanggal_lahir']);

    // Validasi: cek apakah NIM sudah terdaftar
    $cek_nim = mysqli_query(
        $conn,
        "SELECT nim FROM mahasiswa WHERE nim = '$nim'"
    );

    if (mysqli_num_rows($cek_nim) > 0) {
        // NIM sudah ada
        echo "<script>
                alert('NIM sudah terdaftar! Gunakan NIM lain.');
                window.location.href = 'form_tambah.php';
              </script>";
    } else {

        // Query INSERT
        $query = "INSERT INTO mahasiswa 
                  (nim, nama, jurusan, email, tanggal_lahir)
                  VALUES 
                  ('$nim', '$nama', '$jurusan', '$email', '$tanggal_lahir')";

        // Eksekusi query
        if (mysqli_query($conn, $query)) {
            echo "<script>
                    alert('Data berhasil ditambahkan!');
                    window.location.href = 'tampil_data.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Gagal menambahkan data!');
                    window.location.href = 'form_tambah.php';
                  </script>";
        }
    }
}

// Tutup koneksi
mysqli_close($conn);
?>
