<?php
include "koneksi.php";
include "contorller/RegisterContoller.php";
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
    <div class="w-full h-full bg-bg">
        <div class=" w-full h-screen flex justify-center items-center">
            <div class="w-[28rem]  p-5 bg-bg">
                <h1 class="font-bold text-3xl text-primary mb-1 text-center">Registrasi</h1>
                <p class="text-text mb-3 text-center"><span class="font-semibold">Registrasi</span> untuk bisa masuk dan menikmati semua fitur</p>
                <?php if (!empty($error_message)) : ?>
                    <div style="color: red;"><?php echo $error_message; ?></div>
                <?php endif; ?>
                <form action="register.php" method="POST">
                    <label for="NamaLengkap" class="font-semibold text-lg text-text mt-3">Nama Lengkap</label><br>
                    <input type="text" id="nama_lengkap" name="nama_lengkap" required class="border-2 border-primary rounded-md w-full text-md py-1 px-2"><br>
                    <label for="Email" class="font-semibold text-lg text-text mt-3">Email</label><br>
                    <input type="email" id="email" name="email" required class="border-2 border-primary rounded-md w-full text-md py-1 px-2"><br> <label for="Alamat" class="font-semibold text-lg text-text">Alamat:</label><br>
                    <input type="alamat" id="alamat" name="alamat" required class="border-2 border-primary rounded-md w-full text-md py-1 px-2"><br> <label for="Username" class="font-semibold text-lg text-text">Username:</label><br>
                    <input type="text" id="username" name="username" required class="border-2 border-primary rounded-md w-full text-md py-1 px-2"><br>
                    <label for="password" class="font-semibold text-lg text-text">Password</label><br>
                    <input type="password" id="password" name="password" required class="border-2 border-primary rounded-md w-full text-md py-1 px-2"><br>
                    <button type="submit" class="w-full py-1 px-2 bg-primary text-white rounded-md mt-3  text-lg text-md hover:bg-slate-500 transition-all">Register</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>