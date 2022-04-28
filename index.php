<?php
include 'config.php';

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pinjam.in</title>

    <!-- Link CSS -->
    <link rel="stylesheet" href="styles.css">

    <!-- Link Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;800;900&display=swap" rel="stylesheet">
</head>

<body>
    <section id="home">
        <div class="container-fluid">
            <nav>
                <div class="navbar">
                    <div>
                        <a href="">pinjam.in</a>
                    </div>
                    <div>
                        <ul>
                            <li>
                                <a href="">Home</a>
                            </li>
                            <li>
                                <a href="login.php">Masuk</a>
                            </li>
                            <li>
                                <a href="register.php">Daftar</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="title">
                <h1 class="heading">Hadir untuk mengatasi permasalahan finansial Anda.</h1>
                <p class="heading-desc">Butuh uang cepat? Tidak ingin terlihat di riwayat transaksi? Coba pinjamin untuk meminjam uang secara aman.
                </p>
                <button type="button">Mulai</button>
            </div>

        </div>
    </section>



</body>

</html>