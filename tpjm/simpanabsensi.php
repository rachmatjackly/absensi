<?php
	include "../koneksi.php";
    $id_kelas=$_GET['id'];
	$pekan=$_GET['jadwal'];
	$matkul=$_GET['matkul'];
	$nama = $_POST['nama'];
	$namaa = implode(" ",$nama);
	$npm = $_POST['npm'];
	$id = $_POST['idd'];
	$jml_data = count($nama);
	$jadwal = $_GET['jadwal'];
	$keterangan = $_POST['keterangan'];
			for($i=0; $i < $jml_data; $i++){
				// var_dump($keterangan);
				$sqlinsert = "UPDATE absen_dosen JOIN dosen ON absen_dosen.npm = dosen.npm_nidn set absen_dosen.keterangan = '$keterangan[$i]' WHERE absen_dosen.id_kelas='$id_kelas' and absen_dosen.pekan='$pekan' and absen_dosen.nama='$nama[$i]' and absen_dosen.npm='$npm[$i]'";
        		$result = mysqli_query($koneksi, $sqlinsert);
			}
	header("location:./detailabsensi.php?kelas=".$id_kelas."&pekan=".$pekan);

        

?>