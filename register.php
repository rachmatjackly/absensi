<?php
session_start();
require 'functions.php';
    if(isset($_POST["submit"])){
        if(registrasi($_POST)>0){
            echo "<script>
                alert('User baru telah ditambahkan');
                document.location.href = 'index.php';
                </script>";
            
        }else{
            echo mysqli_error($koneksi);
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
    <title>Registrasi</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script language="javascript" src="jquery.js"></script>
    <script src="js/index.js" ></script>
</head>
<body class="login">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <form action="" class="panel" method="post" enctype="multipart/form-data">
                    <h3 class="mb-4 text-center text-uppercase">Registrasi</h3>
                    <div class="form-group ml-5 mr-5">
                    <h5 class="mb-4 text-center text-uppercase">Nama</h5>
                        <input type="text" name="nama" class="form-control form-control-lg radius" placeholder="Masukan Nama">
                    </div>
                    <div class="form-group ml-5 mr-5">
                    <h5 class="mb-4 text-center text-uppercase">NIDN/NPM</h5>
                        <input type="text" name="npm" class="form-control form-control-lg radius" placeholder="Masukan NPM">
                    </div>
                    <div class="form-group ml-5 mr-5">
                    <h5 class="mb-4 text-center text-uppercase">Jenis Kelamin</h5>
                        <select class="form-control" name="jk" class="form-control form-control-lg radius" placeholder="jenis kelamin">
                            <option value="" disabled="disabled">-Jenis Kelamin-</option>
                            <option value="pria">Pria</option>
                            <option value="wanita">Wanita</option>
                        </select>
                    </div>
                    <div class="form-group ml-5 mr-5">
                        <h5 class="mb-4 text-center text-uppercase">Tanggal Lahir</h5>
                        <input type="date" name="tgl_lahir" class="form-control form-control-lg radius" placeholder="Tanggal lahir">
                    </div>
                    <div class="form-group ml-5 mr-5">
                    <h5 class="mb-4 text-center text-uppercase">Status</h5>
                        <select id="status" class="form-control" name="status" class="form-control form-control-lg radius" placeholder="status">
                            <option value="" disabled="disabled">-Status-</option>
                            <option value="">Pilih Status</option>
                            <option value="dosen">Dosen</option>
                            <option value="mahasiswa">Mahasiswa</option>
                        </select>
                    </div>
                    <!-- <div class="form-group ml-5 mr-5"> -->
                    <h5 class="mb-4 text-center text-uppercase">Kelas / Matkul</h5>
                    <!-- Button trigger modal -->
                    <div class="d-grid gap-2 col-6 mx-auto">
                    <button id= "" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Pilih
                    </button>
</div>
                    <!-- </div> -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pilih Sesuai Kelas / Matkul</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="buttonKelas">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">SAVE</button>
      </div>
    </div>
  </div>
</div>


                    <div class="form-group ml-5 mr-5">
                    <h5 class="mb-4 text-center text-uppercase">Foto Profile</h5>
                        <img id="profileImage" class="mx-auto d-block" style="width:250px; margin-bottom:5px;"/>
                        <input type="file" name="foto" id="imgProfile" class="form-control form-control-lg radius" placeholder="Foto">
                    </div>
                    <div class="form-group mt-4 ml-5 mr-5">
                    <button type="submit" class="btn btn-info btn-login block radius" name="submit">Registrasi</button>
                    </div>
                </form>

            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" ></script>
    <script src="js/imagePreview.js" ></script>
    
</body>
</html>