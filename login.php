<?php
include "koneksi.php";
include "contorller/LoginController.php"
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
        <div class=" w-full h-screen flex justify-center items-center border-b-2 border-primary rounded-md">
            <div class="w-[28rem] p-5 bg-bg">
                <h1 class="font-bold text-primary text-3xl text-center">Login</h1>
                <p class="text-text text-center">Login sekarang untuk menikmati semua fitur</p>
                <?php if (!empty($error_message)) : ?>
                    <div style="color: red;"><?php echo $error_message; ?></div>
                <?php endif; ?>
                <div>
                    <form action="login.php" method="POST" class="mt-5">
                        <label for="username" class="font-semibold text-lg text-text">Username</label><br />
                        <input type="text" name="username" class="w-full border-2 border-primary text-md rounded-md py-1 px-2"><br />
                        <label for="password" class="font-semibold text-lg text-text mt-5">Password</label><br>
                        <input type="password" name="password" class="w-full border-2 border-primary text-md rounded-md py-1 px-2"><br />
                        <button type="submit" class="w-full py-1 px-2 bg-primary text-white rounded-md mt-3  text-lg hover:bg-secondary transition-all">Login</button>
                    </form>
                    <div>
                        <p class="text-center mt-3 text-text">Belum memiliki akun?<a href="register.php" class="text-blue-600">Register</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>