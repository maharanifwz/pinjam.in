<?php
include 'config.php';

session_start();

// File : register_control.php
class register_control
{
    public function register($nama, $username, $email, $alamat, $password)
    {
        global $mysqli;
        $sql = "SELECT * FROM pengguna WHERE email = '$email'";
        $result = mysqli_query($mysqli, $sql);
        if (!$result->num_rows > 0) {
            $sql = "SELECT * FROM pengguna WHERE username = '$username'";
            $result = mysqli_query($mysqli, $sql);
            if (!$result->num_rows > 0) {
                $sqlquery = "INSERT INTO pengguna VALUES (NULL, '$nama', '$username', '$email', '$alamat' ,'$password');";
                $result = mysqli_query($mysqli, $sqlquery);
                if ($result) {
                    echo "<script>alert('Selamat, registrasi berhasil!')</script>";
                    $username = "";
                    $nama = "";
                    $email = "";
                    $alamat = "";
                    // $_POST['password'] = "";
                    return true;
                    // header("Location: login.php");
                } else {
                    echo "<script>alert('Terjadi kesalahan.')</script>";
                    return false;
                }
            } else {
                echo "<script>alert('Username Sudah Terdaftar.')</script>";
                return false;
            }
        } else {
            echo "<script>alert('Email Sudah Terdaftar.')</script>";
            return false;
        }
    }
}
