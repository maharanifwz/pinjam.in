<?php 
 
$mysqli = new mysqli('localhost', 'root', 'bismillah', 'pinjamin');
 
if (!$mysqli) {
    die("<script>alert('Gagal tersambung dengan database.')</script>");
}
