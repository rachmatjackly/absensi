<?php 
include('koneksi.php');

    $nidn = $_POST['idmatkul'];
    $kelasQuery = "SELECT jenis from matkul where id_matkul='$nidn'";
    $konekKelas = mysqli_query($koneksi, $kelasQuery);
    $dataMatkul = mysqli_fetch_assoc($konekKelas);

    if($dataMatkul['jenis']=="MP"){
        echo "";
    }

    ?>