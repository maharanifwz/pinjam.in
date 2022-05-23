<?php 
 
$mysqli = new mysqli('localhost', 'root', '', 'pinjamin');
 
if (!$mysqli) {
    die("<script>alert('Gagal tersambung dengan database.')</script>");
}
