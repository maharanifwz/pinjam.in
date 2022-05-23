<?php

session_start();

// File : login_control.php
class login_control
{
    public function login($username, $password)
    {

        global $mysqli;
        $sqlquery = "SELECT * FROM pengguna WHERE username = '$username'";
        $rs = $mysqli->query($sqlquery);

        if (!$rs) {
            // header("Location: login.php");
            return 'query error';
        }

        $data = $rs->fetch_assoc();

        if ($rs->num_rows > 0) {
            if ($data['password'] != $password) {
                echo "<script>alert('Password Anda salah. Silahkan coba lagi!')</script>";
                return 'wrong password';
            } else {
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                $_SESSION['state'] = true;
                return 'success';
                // header("Location: index.php");

            }
        } else {
            echo "<script>alert('Username Tidak Dikenali. Silahkan coba lagi!')</script>";
            return 'username unidentified';
        }
    }
}
