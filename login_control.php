<?php

session_start();
include 'config.php';
// File : login_control.php

global $mysqli;

class login_control
{
    
    public function login($username, $password)
    {
        global $mysqli;
        $sqlquery = "SELECT * FROM pengguna WHERE username = '$username'";
        $rs = $mysqli->query($sqlquery);

        if (!$rs) {
            return $rs;
        }

        $data = $rs->fetch_assoc();

        if ($rs->num_rows > 0) {
            if ($data['password'] != $password) {
                //ini dicomment biar gak ikut keprint
                // echo "<script>alert('Password Anda salah. Silahkan coba lagi!')</script>";
                return false;
            } else {
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                $_SESSION['state'] = true;
                return true;

            }
        } else {
            // echo "<script>alert('Username Tidak Dikenali. Silahkan coba lagi!')</script>";
            return false;
        }
    }
}