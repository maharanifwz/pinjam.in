<?php
require_once "register_control.php";

session_start();

if (isset($_POST['Register'])) {
    $nama = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $alamat = $_POST['alamat'];
    $password = $_POST['password'];

    $register = new register_control();

    $register_valid = $register->register($nama, $username, $email, $alamat, $password);

    if($register_valid){
        $_POST['password'] = "";
        header("Location: login.php");
    }
    // $sql = "SELECT * FROM pengguna WHERE email = '$email'";
    // $result = mysqli_query($mysqli, $sql);
    // if (!$result->num_rows > 0) {
    //     $sql = "SELECT * FROM pengguna WHERE username = '$username'";
    //     $result = mysqli_query($mysqli, $sql);
    //     if (!$result->num_rows > 0) {
    //         $sqlquery = "INSERT INTO pengguna VALUES (NULL, '$nama', '$username', '$email', '$alamat' ,'$password');";
    //         $result = mysqli_query($mysqli, $sqlquery);
    //         if ($result) {
    //             echo "<script>alert('Selamat, registrasi berhasil!')</script>";
    //             $username = "";
    //             $nama = "";
    //             $email = "";
    //             $alamat = "";
    //             $_POST['password'] = "";
    //             header("Location: login.php");
    //         } else {
    //             echo "<script>alert('Terjadi kesalahan.')</script>";
    //         }
    //     } else {
    //         echo "<script>alert('Username Sudah Terdaftar.')</script>";
    //     }
    // } else {
    //     echo "<script>alert('Email Sudah Terdaftar.')</script>";
    // }
}

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
            <form action="#" method="POST">
                <div>
                    <label for="name">Nama</label><br>
                    <input type="text" name="name" id="name" required>
                </div>
                <div>
                    <label for="email">Email</label><br>
                    <input type="email" name="email" id="email" required>
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
                    <input class="submit" type="submit" value="Daftar" name="Register">
                    <p class="description">Sudah memiliki akun ? <span><a href="login.php">Masuk disini</a></span></p>
                </div>
            </form>
        </div>
    </div>
</body>

</html>