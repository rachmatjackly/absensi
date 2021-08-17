<?php 
include('koneksi.php');

    $kelasQuery = "SELECT * from kelas";
    $konekKelas = mysqli_query($koneksi, $kelasQuery);

    $matkulQuery = "SELECT * from matkul";
    $konekMatkul = mysqli_query($koneksi, $matkulQuery);

    if($_POST['status']=='dosen'){
        while($dataMatkul = mysqli_fetch_array($konekMatkul)){ 
            echo "<label>  <input type='checkbox' name='kelas[]' value=$dataMatkul[kode]>  $dataMatkul[nama]</label>";
            }
    }
    
    if($_POST['status']=='mahasiswa'){
        while($dataKelas = mysqli_fetch_array($konekKelas)){ 
            echo "<label>  <input type='checkbox' name='kelas[]' value=$dataKelas[id_kelas]>  $dataKelas[nama_kelas]</label>";
            }
    }