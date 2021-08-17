<?php 
require('koneksi.php');
session_start();
$dosen_id = $_SESSION['dosen_id'];
$berhasil = true;
$date = date("Y:m:d H:i:s");

    $_SESSION =[];
    session_unset();
    session_destroy;
    header("Location: index.php");
echo mysqli_error($koneksi);
?>