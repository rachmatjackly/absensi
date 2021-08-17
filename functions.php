<?php
require 'koneksi.php';

function registrasi($data){
    global $koneksi;

    $nama = $_POST["nama"];
    $npm = $_POST["npm"];
    $jk = $_POST["jk"];
    $tgl_lahir = $_POST["tgl_lahir"];
    // $email = $_POST["email"];
    // $password =$_POST["password"];
    $cekKelas = $_POST['kelas'];
    $count = count($cekKelas);
    $id_kelas = implode(",", $cekKelas);
    // $password2 = $_POST["password2"];
    // $no_hp =$_POST["no_hp"];
    $status = $_POST["status"];

    $ekstensi = array('png','jpg','jpeg');
    $filename = $_FILES['foto']['name'];
    $size = $_FILES['foto']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    // $emailUser = mysqli_query($koneksi, "SELECT email FROM prodi WHERE email = '$email'");
    // if(mysqli_fetch_assoc($emailUser)){
    //     echo "<script>
    //             alert('Email sudah terdafatar');
    //         </script>";
    //     return false;  
    // }

    if(!in_array($ext,$ekstensi) ) {
        echo "<script>alert('File extension salah');</script>";
        return false;
    }

    if($size > 1044070){		
        echo "<script>alert('Ukuran file terlalu besar');</script>";
        return false;
    }
    
    $bash = $filename;
    move_uploaded_file($_FILES['foto']['tmp_name'], 'img/'.$filename);

    

    if($status=='dosen'){
        $querymatkul = "SELECT id_matkul from dosen WHERE npm_nidn = '$npm'";
        $koneksimatkul = mysqli_query($koneksi, $querymatkul);
        while($data=mysqli_fetch_assoc($koneksimatkul)){
        $idmatkul = $data['id_matkul'];
        mysqli_query($koneksi, "DELETE from dosen WHERE npm_nidn='$npm' and id_matkul = '$idmatkul'");
    }
        for($i=0; $i < $count; $i++){
            mysqli_query($koneksi, "INSERT INTO dosen (npm_nidn, nama, gender, id_matkul, tanggal_lahir, foto) VALUES('$npm', '$nama', '$jk', '$cekKelas[$i]', '$tgl_lahir', '$bash')");
        }
    }

    if($status=='mahasiswa'){
        for($i=0; $i < $count; $i++){
            mysqli_query($koneksi, "INSERT INTO mahasiswa (npm_nidn, nama, gender, id_kelas, tanggal_lahir, foto, status) VALUES('$npm', '$nama', '$jk', '$cekKelas[$i]', '$tgl_lahir', '$bash', '$status')");
        }
    }
    return mysqli_affected_rows($koneksi);
    }

function verifikasi($data){
    global $koneksi;

    $email = $_POST['email'];
    $password = $_POST['password'];
    $status = $_POST['status'];
    $npm_nidn = $_POST['npm_nidn'];
    
    $emailUser = mysqli_query($koneksi, "SELECT email FROM user WHERE email = '$email'");
    if(mysqli_fetch_assoc($emailUser)){
        echo "<script>
                alert('Email sudah terdafatar');
            </script>";
        return false;  
    }



    $password = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($koneksi, "INSERT into user (email, password, status, npm_nidn) values('$email','$password','$status','$npm_nidn')");
    return mysqli_affected_rows($koneksi);
}

function tambah_kelas($data){
    global $koneksi;

    $nama_kelas = $_POST['nama_kelas'];
    $id_kelas = $_POST['id_kelas'];
    $queryKelas = mysqli_query($koneksi, "SELECT nama_kelas FROM kelas where nama_kelas = '$nama_kelas'");

    if($dataKelas = mysqli_fetch_assoc($queryKelas)){
        echo "<script>
                alert('Kelas sudah ada, silahkan masukkan kelas lain');
            </script>";
        return false;  
    }

    $tambahKelas = mysqli_query($koneksi, "INSERT INTO kelas VALUES ('','$id_kelas','$nama_kelas','')");
    return mysqli_affected_rows($koneksi);

}

function tambah_matkul($data){
    global $koneksi;

    $nama_matkul = $_POST['nama_matkul'];
    $kode = $_POST['kode'];
    $jenis = $_POST['jenis'];

    $queryKelas = mysqli_query($koneksi, "SELECT kode where kode = $kode");
    $dataKelas = mysqli_fetch_assoc($queryKelas);

    if($dataKelas){
        echo "<script>
                alert('Kode Matkul sudah terdaftar, silahkan masukkan kelas lain');
            </script>";
        return false;  
    }

    $tambahMatkul = mysqli_query($koneksi, "INSERT INTO matkul VALUES ('$kode','$nama_matkul','$jenis')");
    return mysqli_affected_rows($koneksi);

}

function tambah_akun($data){
    global $koneksi;

    $nidn = $_POST['nidn'];
    $nama = strtoupper($_POST['nama']);
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jk'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $status = $_POST['status'];

    $ekstensi = array('png','jpg','jpeg');
    $filename = $_FILES['foto']['name'];
    $size = $_FILES['foto']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $bash = $filename;

    $queryNIDN = mysqli_query($koneksi, "SELECT npm_nidn from user where npm_nidn = '$nidn'");
    if(mysqli_fetch_assoc($queryNIDN)){
        echo "<script>
                alert('NPM/NIDN sudah terdafatar');
            </script>";
        return false;  
    }
    
    $queryEmail = mysqli_query($koneksi, "SELECT email from user where email = '$email'");
    if(mysqli_fetch_assoc($queryEmail)){
            echo "<script>
                    alert('Email sudah terdafatar');
                </script>";
            return false;  
        }

    if(!in_array($ext,$ekstensi) ) {
        echo "<script>alert('File extension salah');</script>";
        return false;
    }

    if($size > 1044070){		
        echo "<script>alert('Ukuran file terlalu besar');</script>";
        return false;
    }


    move_uploaded_file($_FILES['foto']['tmp_name'], '../'.'img/'.$filename);

    $insertDosen = mysqli_query($koneksi, "INSERT INTO dosen VALUES ('','$nidn', '$nama', '$jenis_kelamin', '', '', '$tanggal_lahir', '$bash')");

    $password = password_hash($password, PASSWORD_DEFAULT);
    $insertUser = mysqli_query($koneksi, "INSERT INTO user VALUES ('$nidn', '$email', '$password', '$status', '')");
    return mysqli_affected_rows($koneksi);
}

?>