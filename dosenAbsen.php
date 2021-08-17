<?php
require 'koneksi.php';
if(isset($_POST['masuk']))
    {
        $nama1 = $_POST["nama1"];
        $id_kelas1 = $_POST["id_kelas1"];
        $npm1 =$_POST["npm1"];
        $jadwal = date("Y:m:d");
        $keterangan =$_POST["keterangan"];
        $pekan =$_POST['pekan'];
        $time = date("H:i:s");
        $media = $_POST['media'];
        $kelas = $_POST['idkelas'];
        
        $sqlinsert = "INSERT into absen_dosen (nama, jadwal, pekan, id_kelas, id_matkul, npm, keterangan, waktu_absen, media) values ('$nama1', '$jadwal', $pekan, '$id_kelas1', '$kelas', '$npm1', '$keterangan', '$time','$media')";
        // $updateDosen = "UPDATE dosen set id_kelas='$id_kelas1' WHERE id_matkul=''"
        $result = mysqli_query($koneksi, $sqlinsert);
        
        
        if($result)
        {
            echo "<script>
            window.location.href = 'index.php';
            alert('Absen Berhasil');</script>";
        }
        else
        {
            echo "Gagal melakukan absen";
            var_dump($result);
        }
    }

if(isset($_POST['pilih'])){
    $idmatkul = $_POST['idmatkul'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/styless.css">
    <link rel="icon" href="img/favicon.ico">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <title>Absen UNJ</title>
</head>
<body class="login" style="background:#B80B00;">
        <div class="login-div">
            <div class="title">
                Mata Kuliah
            </div>
            <form action="" method="POST">
                <select class="form-control form-control-lg radius" name="idmatkul" id="mySelect" class="form-control form-control-lg radius" placeholder="kelas anda">
                    <option value="" disabled="disabled">-Mata Kuliah-</option>
                <?php
                    $sqlMatkul="SELECT * FROM matkul";
                    $matkul= mysqli_query($koneksi, $sqlMatkul);
                    while($dataMatkul=mysqli_fetch_assoc($matkul)){ 
                ?>
                    <option id='id_elas' value="<?=$dataMatkul['kode'];?>"><?=$dataMatkul['nama'];?></option>    
                
                    <?php } ?>   
                    </select> 
                    <input name='jenis' value="<?=$dataMatkul['jenis']?>" hidden> 
            <div class="form-group">
                <button class="pilih-button" name="pilih" style="margin-top: 10px;">Pilih</button>
            </div>
            </form> 
            <?php
                if(isset($idmatkul)){
                    echo "<script>
                    document.getElementById('mySelect').value = '$idmatkul';
            </script>";}?> 

            <div class="title">
                Absen Dosen
            </div>

            <div class="sub-title">
                NAMA
            </div>
            <?php
                if(!isset($_POST['nameDosen'])){ ?>
                    <form action="" method="POST">
                        <input type="text" name="kelas" value="<?=$idmatkul?>" hidden>
                        <select name="nameDosen" id="namaMahasiswa" class="form-control form-control-lg radius" placeholder="Nama" onchange='this.form.submit()'>
                            <option value="">Nama Dosen</option>
                            <?php
                                    $sql="SELECT npm_nidn, nama FROM dosen WHERE id_matkul = '$idmatkul'";
                                    $cek= mysqli_query($koneksi, $sql);

                                    while($data=mysqli_fetch_assoc($cek)){ 
                                        $name = $data['nama'];
                                        
                                        ?>
                                        
                                        <option value="<?=$name?>"><?=$name?></option>    
                                <?php } ?>
                        </select>
                        <noscript><input type=”submit” value=”Submit”></noscript>    
                    </form>
                                
                <?php }else{?> 
                    <form action="" method="post">
                    <?php
                        $idkelas = $_POST['kelas'];
                        $sw = $_POST['nameDosen']; ?>
                        <input type="text" value="<?=$idkelas?>" name="idkelas" hidden>
                        <input type="text" value="<?=$sw?>" class="form-control form-control-lg radius" name="nama1">
                        <script>
                        document.getElementById('namaDosen').style.visibility = "hidden";
                        </script>
                <?php } ?>
    
            <div class="sub-title">
                NIDN
            </div>
            <?php
                if(isset($sw)){
                    $npm = "select npm_nidn from dosen where nama='$sw'";
                    $cekNpm = mysqli_query($koneksi, $npm); 
                    if($dataNpm = mysqli_fetch_array($cekNpm)){ ?>
                        <input type="text" name="npm1" class="form-control form-control-lg radius" placeholder="NPM anda" value="<?=$dataNpm["npm_nidn"];?>">
                    <?php  }}else{?>
                    <input type="text" name="npm" class="form-control form-control-lg radius" placeholder="NPM anda" disabled>
                <?php };?>      

                    

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
                Media
            </div>
            <select name="media" class="form-control form-control-lg radius" placeholder="media">
                <option value="" disabled="disabled">-Media-</option>
                <option value="zoom">Zoom</option>
                <option value="gmeet">Google Meet</option>
                <option value="classroom">Classroom</option>
                <option value="wa">Whatsapp Group</option>
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
            
            <div class='sub-title'>
                Kelas
            </div>
            <select name='id_kelas1' class='form-control form-control-lg radius' placeholder='kelas'>
                <option value='' disabled='disabled'>-Kelas-</option>
                <?php
                    $queryKelas = mysqli_query($koneksi, "SELECT id_kelas, nama_kelas from kelas");
                    while($datakelas=mysqli_fetch_assoc($queryKelas)){
                        echo "<option value='$datakelas[id_kelas]'>$datakelas[nama_kelas]</option>";
                    }
                ?>
            </select>
            

            <button class="signin-button" name="masuk" style="margin-top: 30px;">Absen</button>
            <div class="link">
                Tidak terdaftar dikelas ? <a href="register.php">Sign up</a>
            </div>
            </form>
        </div>
    <script src="js/bootstrap.min.js" ></script>
</body>
</html>