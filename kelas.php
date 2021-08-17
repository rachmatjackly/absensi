<?php 
include('koneksi.php');

    $idkelas= $_POST['kelas'];
    $nama = mysqli_query($koneksi, "SELECT nama, npm from absen_dosen where id_kelas = $idkelas");

    while($dataNama = mysqli_fetch_array($nama)){
        echo "<option value='$dataNama[npm]'>$dataNama[nama]</option>";
    }