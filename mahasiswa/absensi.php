<?php
require '../koneksi.php';
if(isset($_POST['masuk']))
    {
        $nama1 = $_POST["nama1"];
        $id_kelas1 = $_POST["id_kelas1"];
        $npm1 =$_POST["npm1"];
        $jadwal = date("Y:m:d");
        $keterangan =$_POST["keterangan"];
        $pekan =$_POST['pekan'];
        $media = $_POST['media'];
        $time = date("H:i:s");
        
        $sqlinsert = "INSERT into absensi (nama, jadwal, pekan, id_kelas, npm, media, keterangan, waktu_absen) values ('$nama1', '$jadwal', $pekan, '$id_kelas1', '$npm1', '$media', '$keterangan', '$time')";
        
        $result = mysqli_query($koneksi, $sqlinsert);
        
        
        if($result)
        {
            echo "<script>
            window.location.href = '../index.php';
            alert('Absen Berhasil');</script>";
        }
        else
        {
            echo "Gagal melakukan absen";
            var_dump($result);
        }
    }

if(isset($_POST['pilih'])){
    $idkelas = $_POST['idkelas'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../dosen/css/bootstrap.min.css" >
    <link rel="stylesheet" href="../dosen/css/style.css">
    <link rel="stylesheet" href="../dosen/css/styles.css">
    <link rel="icon" href="img/favicon.ico">
    
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <title>Absen UNJ</title>
</head>
<body class="login">
        <div class="login-div">
            <div class="title">
                Mata Kuliah Kelas
            </div>
            <form action="" method="POST">
                <select class="form-control form-control-lg radius" name="idkelas" id="mySelect" class="form-control form-control-lg radius" placeholder="kelas anda">
                    <option value="" disabled="disabled">-Mata Kuliah Kelas MP-</option>
                <?php
                    $sqlKelas="SELECT id_kelas, nama_kelas FROM kelas";
                    $kelas= mysqli_query($koneksiMahasiswa, $sqlKelas);
                    while($dataKelas=mysqli_fetch_assoc($kelas)){ 
                ?>
                    <option id='id_elas' value="<?=$dataKelas['id_kelas'];?>"><?=$dataKelas['nama_kelas'];?></option>    
                    <?php } ?>
                </select>  
                      
            <div class="form-group">
                <input type="submit" class="btn btn-info" value="Pilih" name="pilih">  
            </div>
            </form> 
            <?php
                if(isset($idkelas)){
                    echo "<script>
                    document.getElementById('mySelect').value = '$idkelas';
            </script>";}?> 

            <div class="title">
                Absen Mahasiswa
            </div>

            <div class="sub-title">
                NAMA
            </div>
            <?php
                if(!isset($_POST['nameMahasiswa'])){ ?>
                    <form action="" method="POST">
                        <select name="nameMahasiswa" id="namaMahasiswa" class="form-control form-control-lg radius" placeholder="kelas anda" onchange='this.form.submit()'>
                            <option value="">Nama Mahasiswa</option>
                            <?php
                                    $sql="SELECT nama FROM mahasiswa WHERE id_kelas = '$idkelas'";
                                    $cek= mysqli_query($koneksi, $sql);

                                    while($data=mysqli_fetch_assoc($cek)){ 
                                        $name = $data['nama'];
                                        // var_dump($name);
                                        $timenow = date('Y-m-d');
                                        $waktuAbsen = "SELECT jadwal FROM absensi WHERE nama = '$name'";
                                        $cekWaktu = mysqli_query($koneksi, $waktuAbsen);
                                        while($dataWaktu=mysqli_fetch_assoc($cekWaktu)){   
                                            $waktu_ = $dataWaktu['jadwal'];
                                            if($waktu_==$timenow){
                                                continue 2;
                                            }
                                        }
                                        ?>
                                        
                                        <option value="<?=$nama = $data['nama'];?>"><?=$nama = $data['nama'];?></option>    
                                <?php } ?>
                        </select>
                        <noscript><input type=”submit” value=”Submit”></noscript>    
                    </form>
                                
                <?php }else{?> 
                    <form action="" method="post">
                    <?php
                        $sw = $_POST['nameMahasiswa']; ?>
                        <input type="text" value="<?=$sw?>" class="form-control form-control-lg radius" name="nama1">
                        <script>
                        document.getElementById('namaMahasiswa').style.visibility = "hidden";
                        </script>
                <?php } ?>
    
            <div class="sub-title">
                NPM
            </div>
            <?php
                if(isset($sw)){
                    $npm = "select npm from mahasiswa where nama='$sw'";
                    $cekNpm = mysqli_query($koneksi, $npm); 
                    if($dataNpm = mysqli_fetch_array($cekNpm)){ ?>
                        <input type="text" name="npm1" class="form-control form-control-lg radius" placeholder="NPM anda" value="<?=$dataNpm["npm"];?>">
                    <?php  }}else{?>
                    <input type="text" name="npm" class="form-control form-control-lg radius" placeholder="NPM anda" disabled>
                <?php };?>      

                    <div class="form-group ml-5 mr-5" hidden>
                    <h5 class="mb-1 text-center text-uppercase">id</h5>
                    <?php
                    if(isset($dataNpm["npm"])){
                    $npmMahasiswa=$dataNpm["npm"];    
                    $id = "select id_kelas from mahasiswa where npm='$npmMahasiswa'";
                    $cekid = mysqli_query($koneksi, $id);
                    if($dataid = mysqli_fetch_array($cekid)){ ?>
                        <input type="text" name="id_kelas1" class="form-control form-control-lg radius" value="<?=$dataid['id_kelas']?>">
                    <?php }}?>
                    </div>

            <!-- <div class="sub-title">
                Tanggal Absen
            </div>
            <input type="date" name="jadwal" class="form-control form-control-lg radius" placeholder="Tanggal absen anda"> -->

            <div class="sub-title">
                Media
            </div>
            <select name="media" class="form-control form-control-lg radius" placeholder="Media">
                <option value="" disabled="disabled">-Media-</option>
                <option value="gmeet">Goggle Meet</option>
                <option value="zoom">Zoom</option>
                <option value="classroom">Google Classroom</option>
                <option value="whatsapp">Whatsapp Group</option>
            </select>

            <div class="sub-title">
                Absen Pekan
            </div>
            <select name="pekan" class="form-control form-control-lg radius" placeholder="absen pekan">
                <option value="" disabled="disabled">-Absen Pekan-</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
            </select>

            <div class="sub-title">
                Keterangan
            </div>
            <select name="keterangan" class="form-control form-control-lg radius" placeholder="keterangan">
                <option value="" disabled="disabled">-Keterangan-</option>
                <option value="Hadir">Hadir</option>
                <option value="Izin">Izin</option>
                <option value="Sakit">Sakit</option>
                <option value="Alpha">Alpha</option>
            </select>

            <button class="signin-button" name="masuk">Absen</button>
            <div class="link">
                Tidak terdaftar dikelas ? <a href="../register.php">Sign up</a>
            </div>
            </form>
        </div>
    <script src="js/bootstrap.min.js" ></script>
</body>
</html>