<?php
include "koneksi.php";
include "contorller/PostController.php";
include "contorller/EditpostinganController.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ujikom Neza</title>
    <link rel="stylesheet" href="src/css/output.css">
</head>

<body>

    <nav class="w-full flex justify-between border border-b-2 z-50 items-center px-[6%] py-2">
        <span class="font-bold text-3xl text-primary">Selamat datang, <?php echo $_SESSION['username']; ?>!</span>
        <form action="" method="POST" class="flex gap-2">
            <a href="dashboard.php" class="text-white bg-slate-800 rounded-md py-2 px-3 hover:bg-slate-500 transition-all">Home</a>
        </form>
    </nav>

    <div class="mx-[20%] mb-5">
        <h1 class="text-3xl font-bold text-primary border-b-2 mb-3">Postingan Saya</h1>
        <!-- Tambahkan pesan sukses di sini -->
        <?php if (isset($success_message)) : ?>
            <div class="success-message">
                <?php echo $success_message; ?>
            </div>
        <?php endif; ?>

        <?php
        // Periksa apakah ada foto yang diunggah oleh pengguna yang sedang login
        if ($result && mysqli_num_rows($result) > 0) {
            // Tampilkan foto-foto tersebut
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div>";
                echo "<h3 class='font-semibold text-xl text-primary'>" . $row['judul_foto'] . "</h3>";
                echo "<div class='w-full h-96 overflow-hidden'>";
                echo "<img src='uploads/" . $row['lokasi_file'] . "' alt='Foto'>";
                echo "</div>";
                echo "<p>" . $row['deskripsi_foto'] . "</p>";
                echo "<p>Tanggal Unggah: " . $row['tanggal_unggah'] . "</p>";
            

                // Form edit
                echo "<form action='' method='post' enctype='multipart/form-data' class='flex flex-col'>";
                echo "<input type='hidden' name='post_id' value='" . $row['foto_id'] . "'>"; // Menggunakan $row['id'] bukan $row['foto_id']
                echo "<input type='text' class='border-2 border-primary rounded-md w-full text-md py-1 px-2' name='judul_foto' value='" . $row['judul_foto'] . "'>";
                echo "<textarea name='deskripsi_foto' rows='1' class='border-2 border-primary rounded-md w-full text-md py-1 px-2 my-2'>" . $row['deskripsi_foto'] . "</textarea>";
                echo "<input type='file' name='fileToUpload' id='fileToUpload'> "; // Tambahkan input file
                echo "<button type='submit' name='edit' class='w-full py-1 px-2 bg-primary text-white rounded-md mt-3  text-lg text-md hover:bg-secondary transition-all'>Edit</button>";
                echo "</form>";
                $foto_id = $row['foto_id'];
                // Tombol delete
                echo "<div class='flex flex-col text-center'>";
            ?>
                <a href="delete.php?foto_id=<?= $foto_id ?>" onClick="return confirm('Apakah anda yakin ingin menghapus postingan ini?')" class="w-full py-1 px-2 bg-red-600 text-white rounded-md mt-1 text-lg text-md hover:bg-red-500 transition-all">Delete</a>
            </div>
            <?php
            }
            } else {
            echo "Belum ada postingan.";
        }
        ?>
    </div>


</body>

</html>