<?php
// Include file koneksi database
include "../koneksi.php";
$error_message = "";
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    // Jika tidak, redirect ke halaman login
    header("Location: login.php");
    exit;
}

// Folder tempat menyimpan foto
$folder_foto = "uploads"; // Lokasi folder menyimpan foto

// Periksa apakah tombol submit diklik
if (isset($_POST["submit"])) {
    $judul_foto = $_POST["judul_foto"];
    $deskripsi_foto = $_POST["deskripsi_foto"];
    $tanggal_unggah = date("Y-m-d"); // Ambil tanggal saat ini
    $nama_file = basename($_FILES["fileToUpload"]["name"]);
    $lokasi_file = $nama_file; // Ubah lokasi file

    $user_id = $_SESSION['user_id']; // Ambil user_id dari session

    // Periksa apakah file gambar asli atau palsu
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        // Periksa apakah file sudah ada
        if (file_exists('../uploads/' . $lokasi_file)) {
            $error_message =  "<p class='textcenter'>Maaf, file sudah ada.</p>";
        } else {
            // Jika semua kondisi terpenuhi, coba upload file
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], '../uploads/' . $lokasi_file)) {
                // Simpan informasi foto ke dalam database
                $query = "INSERT INTO foto (judul_foto, deskripsi_foto, tanggal_unggah, lokasi_file, user_id) 
                          VALUES ('$judul_foto', '$deskripsi_foto', '$tanggal_unggah', '$lokasi_file', '$user_id')";
                $result = mysqli_query($conn, $query);
                if ($result) {
                    $error_message = "<p class='textcenter'>File $nama_file berhasil diunggah.</p>";
                } else {
                    $error_message =  "Maaf, terjadi kesalahan saat menyimpan informasi ke database.";
                }
            } else {
                $error_message =  "Maaf, terjadi kesalahan saat mengunggah file.";
            }

            header('location: ../dashboard.php');
        }
    } else {
        $error_message =  "File bukan gambar.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Foto</title>
    <link rel="stylesheet" href="../src/css/output.css">
</head>

<body>
    <div class="w-full h-full bg-bg">
        <div class=" w-full h-screen flex justify-center items-center">
            <div class="w-96 bg-white p-5">
                <h1 class="font-bold text-primary text-3xl text-center">Upload Foto</h1>
                <?php if (isset($error_message)) : ?>
                    <div class="error-message">
                        <?php echo $error_message; ?>
                    </div>
                <?php endif; ?>
                <form action="upload.php" method="POST" enctype="multipart/form-data" class="mt-5">
                    <label for="judul_foto" class="font-semibold text-lg text-text">Judul Foto</label><br>
                    <input type="text" name="judul_foto" class="w-full border-2 border-primary text-md rounded-md py-1 px-2"><br>
                    <label for="deskripsi_foto" class="font-semibold text-lg text-text">Deskripsi Foto</label><br>
                    <textarea name="deskripsi_foto" class="w-full border-2 border-primary text-md rounded-md py-1 px-2"></textarea><br>
                    <input type="file" name="fileToUpload" id="fileToUpload"><br>
                   <button type="submit" name="submit" class="w-full py-1 px-2 bg-primary text-white rounded-md mt-3  text-lg hover:bg-secondary transition-all">Upload</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>