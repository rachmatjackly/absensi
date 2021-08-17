<?php
	include "../koneksi.php";
    $id_kelas=$_GET['id'];
	$pekan=$_GET['jadwal'];
	$nama = $_POST['nama'];
	$namaa = implode(" ",$nama);
	$npm = $_POST['npm'];
	$id = $_POST['idd'];
	$jml_data = count($nama);
	$jadwal = $_GET['jadwal'];
	$keterangan = $_POST['keterangan'];
			for($i=0; $i < $jml_data; $i++){
				// var_dump($keterangan);
				$sqlinsert = "UPDATE absen_mahasiswa set keterangan = '$keterangan[$i]' WHERE id_kelas='$id_kelas' and pekan='$pekan' and nama='$nama[$i]'";
        		$result = mysqli_query($koneksi, $sqlinsert);
			}
	header("location:./detailabsensi.php?kelas=".$id_kelas."&pekan=".$pekan);

        

?>