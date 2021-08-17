
	<?php
    //koneksi ke database
    // $host = "localhost";
    // $user = "root";
    // $pass = "";
    // $dbnm = "absensimahasiswa";
	$idkelas=$_GET["kelas"];
    // $conn = mysqli_connect($host, $user, $pass);
    // if ($conn) {
    // $open = mysqli_select_db($conn,$dbnm);
    // if (!$open) {
    // die ("Database tidak dapat dibuka karena ".mysql_error());
    // }
    // } else {
    // die ("Server MySQL tidak terhubung karena ".mysql_error());
    // }
    //akhir koneksi
     require('../koneksi.php');
	#ambil data masukkan ke header
	$tgl1 = date('Y');// pendefinisian tanggal awal
    $tgl2 = date('Y', strtotime('+1 year', strtotime($tgl1))); //operasi penjumlahan tanggal sebanyak 6 hari
     //print tanggal

    $query="SELECT DISTINCT(jadwal) AS jadwal FROM absen_mahasiswa WHERE id_kelas='$idkelas'";
    $sql = mysqli_query ($koneksi,$query);
    $header = array();
    while ($row = mysqli_fetch_assoc($sql)) {
    array_push($header, $row);
    }
	
    #setting judul laporan dan header tabel
    $judul = "                                                         LAPORAN ABSENSI MAHASISWA SEMESTER ANGKATAN ". $tgl1 ."/".$tgl2;
    $judul2 = "                                                                              JURUSAN MANAJEMEN PENDIDIKAN";
    $judul3 = "                                                                                 UNIVERSITAS NEGERI JAKARTA";
    #sertakan library FPDF dan bentuk objek
    require_once ("fpdf/fpdf.php");
    $pdf = new FPDF('L','mm','A4');
    $pdf->AddPage();
     
    #tampilkan judul laporan
    $pdf->SetFont('Arial','B','14');
    $pdf->Cell(195,9, $judul, '0', 1, 'L');
    $pdf->Cell(195,9, $judul2, '0', 1, 'L');
    $pdf->Cell(195,9, $judul3, '0', 1, 'L');
    $pdf->Ln(10);
    
    $queryMedia = mysqli_query($koneksi, "SELECT nama_kelas from kelas where id_kelas=$idkelas");
    $media = mysqli_fetch_array($queryMedia);
    $kelas = "Kelas : " . $media['nama_kelas']; 
    $pdf->SetFont('Arial','','12');
    $pdf->Cell(195,5, $kelas, '0', 1, 'L');
    #buat header tabel
    $pdf->SetFont('Arial','','12');
    $pdf->SetFillColor(128,0,0);
    $pdf->SetTextColor(255);
    $pdf->SetDrawColor(20,10,0);
	
    $pdf->Cell(25, 10, 'NPM', 1 , '0', 'C', true);
    $pdf->Cell(55, 10, 'NAMA', 1 , '0', 'C', true);
	$i= 1;
    foreach ($header as $kolom) {
    $pdf->Cell(7, 10, $i++, 1, '0', 'C', true);
    }
    $pdf->Ln();
     
	 #ambil data masukkan ke nama
	$query="SELECT DISTINCT(npm) AS npm FROM absen_mahasiswa WHERE id_kelas='$idkelas'";
    $sql = mysqli_query ($koneksi,$query);
    $data = array();
    while ($row = mysqli_fetch_assoc($sql)) {
    array_push($data, $row);
    }

    #tampilkan data tabelnya    
	$pdf->SetFillColor(224,235,255);
    $pdf->SetTextColor(0);
    $pdf->SetFont('');
    $fill=false;
    foreach ($data as $baris) {
    $i = 0;
    // $j = 0;
    foreach ($baris as $cell) {
		
    $pdf->Cell(25, 5, $baris["npm"], 1, '0', 'C', $fill);
    // $pdf->Cell(55, 5, 'nama', 1, '0', 'C', $fill);
    // $pdf->Cell(5, 5, 's', 1, '0', 'C', $fill);
    $npm=$baris["npm"];
    // This query for get name in absensi table & mahasiswa table
    $queryNama = "SELECT DISTINCT(mahasiswa.nama) AS nama FROM absen_mahasiswa JOIN mahasiswa ON mahasiswa.npm_nidn = absen_mahasiswa.npm WHERE mahasiswa.npm_nidn = $npm";
    $sqlNama = mysqli_query ($koneksi,$queryNama);
    $dataNama = array();
    $rowNama = mysqli_fetch_assoc($sqlNama);
    $pdf->Cell(55, 5, $rowNama["nama"], 1, '0', 'C', $fill);
	#dari sini
	// $npm=$baris["npm"];
	$queryisi="SELECT LEFT(keterangan,1) AS keterangan FROM absen_mahasiswa WHERE npm='$npm'";
    $sqlisi = mysqli_query ($koneksi,$queryisi);
    while ($row = mysqli_fetch_assoc($sqlisi)) {
		$pdf->Cell(7, 5, $row["keterangan"], 1, '0', 'C', $fill);
    }
    
	#sampai sini
	$i++;
    }
    $fill = !$fill;
    $pdf->Ln();
    }
    #output file PDF
	
    #setting judul laporan dan header tabel
    $t1 = "Keterangan :";
    $t2 = "H = Hadir";
    $t3 = "A = Alpha";
    $t4 = "S = Sakit";
    $t5 = "I = Izin";

    #tampilkan judul laporan
    $pdf->SetFont('Arial','I','12');
    $pdf->Cell(195,5, $t1, '0', 1, 'L');
    $pdf->Cell(195,5, $t2, '0', 2, 'L');
    $pdf->Cell(195,5, $t3, '0', 2, 'L');
    $pdf->Cell(195,5, $t4, '0', 2, 'L');
    $pdf->Cell(195,5, $t5, '0', 2, 'L');
	
    // Insert a logo in the top-left corner at 300 dpi
    $image1 = "img/unj.jpg";
    $pdf->Cell(90, 120, "", 0, 1, 'C',$pdf->Image($image1,60,11,0,25));
	
    $pdf->Output();
    ?>