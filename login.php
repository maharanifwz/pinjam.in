<?php

session_start();
$mysqli = new mysqli('localhost', 'root', '1234567', 'pinjamin');

if (isset($_POST['Masuk'])) {
    // echo "<script>alert('username anda = ' . )</script>";

    $username = $_POST['username'];
    $password = $_POST['password'];

    global $mysqli;
    $sqlquery = "SELECT * FROM pengguna WHERE username = '$username'";
    $rs = $mysqli->query($sqlquery);
    if (!$rs) {
        header("Location: login.php");
        return;
    }

    $data = $rs->fetch_assoc();

    $message = $data['username'];
    echo "<script type='text/javascript'>alert('$message');</script>";

    if ($data['password'] != $password) {
        echo "<script>alert('Password Anda salah. Silahkan coba lagi!')</script>";
        return;
    } else {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['state'] = true;
        header("Location: index.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Link CSS -->
    <link rel="stylesheet" href="styles.css">

    <!-- Link Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;800;900&display=swap" rel="stylesheet">
</head>

<body>
    <div class="login">
        <div class="container-fluid">
            <h1>Masuk</h1>
            <form action="#" method="POST">
                <div>
                    <label for="username">Username</label><br>
                    <input type="text" name="username" id="username" required>
                </div>
                <div class="form-example">
                    <label for="password">Password</label><br>
                    <input type="password" name="password" id="password" required>
                </div>
                <div class="form-example">
                    <input class="submit" type="submit" value="Masuk" name="Masuk">
                    <p class="description">Belum memiliki akun ? <span><a href="register.php">Daftar disini</a></span></p>
                </div>
            </form>
        </div>
    </div>
</body>

</html>