<?php 
 
$mysqli = new mysqli('localhost', 'root', '1234567', 'pinjamin');
 
if (!$mysqli) {
    die("<script>alert('Gagal tersambung dengan database.')</script>");
}
