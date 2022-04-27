<?php

include 'config.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- Link CSS -->
    <link rel="stylesheet" href="styles.css">

    <!-- Link Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;800;900&display=swap" rel="stylesheet">
</head>

<body>
    <div class="register">
        <div class="container-fluid">
            <h1>Daftar</h1>
            <form action="" method="get">
                <div>
                    <label for="name">Nama</label><br>
                    <input type="text" name="name" id="name" required>
                </div>
                <div>
                    <label for="contact">Kontak</label><br>
                    <input type="contact" name="contact" id="contact" required>
                </div>
                <div>
                    <label for="username">Username</label><br>
                    <input type="text" name="username" id="username" required>
                </div>
                <div>
                    <label for="alamat">Alamat</label><br>
                    <input type="text" name="alamat" id="alamat" required>
                </div>
                <div>
                    <label for="password">Password</label><br>
                    <input type="password" name="password" id="password" required>
                </div>
                <div>
                    <input class="submit" type="submit" value="Daftar">
                    <p class="description">Sudah memiliki akun ? <span><a href="login.php">Masuk disini</a></span></p>
                </div>
            </form>
        </div>
    </div>
</body>

</html>