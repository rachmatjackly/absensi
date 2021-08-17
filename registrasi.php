<?php
session_start();

require 'koneksi.php';
require 'functions.php';

    if(isset($_POST["submit"])){
        if(verifikasi($_POST)>0){
            echo "<script>
                    alert('user baru telah ditambahkan');
                    document.location.href = 'login.php';
                    </script>";
        }else{
            echo mysqli_error($koneksi);
        }
    }

    if(isset($_POST['cek'])){
        $nidn = $_POST['nidn'];
        $queryNama = "SELECT nama, npm_nidn from dosen where npm_nidn='$nidn'";
        $cekNama = mysqli_query($koneksi, $queryNama);
        $dataNama = mysqli_fetch_array($cekNama);
        
        $cekNIDN = mysqli_query($koneksi, "SELECT npm_nidn from user where npm_nidn='$nidn'");
        if(mysqli_fetch_assoc($cekNIDN)){
        echo "<script>
                     alert('NIDN sudah terdaftar, silahkan login');
                    window.location.href = 'registrasi.php';
                 </script>";
    }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="dosen/css/bootstrap.min.css" >
    <link rel="stylesheet" href="dosen/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" href="img/favicon.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Registrasi</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script language="javascript" src="jquery.js"></script>
    <script src="js/index.js" ></script>

</head>
<body class="login">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="panel">
                <form method="post" action="">
                <h3 class="mb-4 text-center text-uppercase fw-bold">Verifikasi Akun</h3>
                    <div class="form-group ml-5 mr-5">
                    <h5 class="mb-4 text-center text-uppercase fw-bold">NIDN</h5>
                        <input type="text" id="nidn" name="nidn" class="form-control form-control-lg radius" placeholder="Masukan NIDN">
                        
                        
                    </div>
                    <div class="form-group mt-4 ml-5 mr-5">
                    <button type="submit" class="btn btn-info btn-login block radius" name="cek">CEK</button>
                    </div>
                </form>
                <div class="form-group ml-5 mr-5" >
                    <h5 class="mb-4 text-center text-uppercase fw-bold">Nama</h5>
                    <?php
                        if(isset($dataNama['nama'])){
                            echo "<div class='d-flex flex-row'><input type='text' name='nama' class='form-control form-control-lg radius' placeholder='Masukan Nama' disabled value='$dataNama[nama]'>
                            <i class='bi bi-check-circle-fill w3-animate-opacity ms-2' style='font-size: 2rem; color: cornflowerblue;' ></i></div>";
                        } else{
                            echo "<input type='text' name='nama' class='form-control form-control-lg radius' placeholder='Masukan Nama' disabled>";
                        }
                    ?>
                    </div>
                
                    
                    <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group ml-5 mr-5">
                    <h5 class="mb-4 text-center text-uppercase fw-bold">Email</h5>
                        <input type="text" name="npm_nidn" value="<?=$dataNama['npm_nidn']?>" hidden>
                        <input type="text" name="email" class="form-control form-control-lg radius" placeholder="Masukan Email">
                    </div>
                    <div class="form-group ml-5 mr-5">
                    <h5 class="mb-4 text-center text-uppercase fw-bold">Password</h5>
                    <input type="password" name="password" class="form-control form-control-lg radius" placeholder="Masukan Password" required>
                    </div>
                    <div class="form-group ml-5 mr-5" hidden>
                    <h5 class="mb-4 text-center text-uppercase fw-bold">Status</h5>
                    <select name="status" id="" class="form-control form-control-lg radius">
                        <option value="dosen">Dosen</option>
                    </select>
                    </div>
                    <div class="form-group mt-4 ml-5 mr-5">
                    <button type="submit" class="btn btn-info btn-login block radius" name="submit">Verifikasi</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>




    <script src="js/bootstrap.min.js" ></script>
    <script src="js/imagePreview.js" ></script>
</body>
</html>