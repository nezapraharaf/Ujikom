<?php
include "koneksi.php";

// Pastikan koneksi berhasil dibuat
if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Query untuk mengambil foto dari tabel foto beserta informasi pengguna yang mengunggahkannya
$query = "SELECT foto.*, user.username 
          FROM foto 
          LEFT JOIN user ON foto.user_id = user.user_id"; // Menggunakan LEFT JOIN untuk memastikan semua foto diambil

// Eksekusi query
$result = mysqli_query($conn, $query);

$fotos = [];

// Periksa apakah query berhasil dieksekusi
if ($result) {
    // Loop untuk menambahkan setiap foto dan informasi pengguna ke dalam array
    while ($row = mysqli_fetch_assoc($result)) {
        $fotos[] = $row;
    }
    // Bebaskan hasil query
    mysqli_free_result($result);
} else {
    // Tangani kesalahan jika query gagal dieksekusi
    echo "Error: " . mysqli_error($conn);
}
