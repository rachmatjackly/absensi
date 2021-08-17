<?php
    session_start();
    if (isset($_SESSION["loginDosen"]) ) {
        header("Location: dosen/index.php");
    }
    require 'koneksi.php';
    if( isset($_POST["login"]) ) {
        $email = $_POST["email"];
        $password = $_POST["password"];

       $result = mysqli_query($koneksi, "SELECT user.email, user.password,user.status, user.last_login, dosen.* FROM user JOIN dosen ON user.npm_nidn = dosen.npm_nidn WHERE user.email ='$email'");
            while($row = mysqli_fetch_assoc($result)) {

                if($row['status']=='dosen'){
                    $date = date("Y:m:d H:i:s");
                    mysqli_query($koneksi, "UPDATE user SET last_login ='$date' where email='$email'");
                    if(password_verify($password, $row["password"] )) {
                        $_SESSION["loginDosen"] = true;
                        // $id=$row["id_dosen"];
                        $_SESSION['dosen_id']=$row["npm_nidn"];
                        $_SESSION['jk'] = $row["jk"];
                        $_SESSION['tgl'] = $row["tgl_lahir"];
                        $_SESSION["status"] = $row["status"];
                        $_SESSION['dosen_user_email']=$email;
                        $_SESSION['dosen_user_name']=$row["nama"];
                        $_SESSION['dosen_user_foto']=$row["foto"];
                        $_SESSION['dosen_user_last_login']=$row["last_login"];
                        header("Location: dosen/index.php");
                        exit;
                    }
                }

                if($row['status']=='admin'){
                    $date = date("Y:m:d H:i:s");
                    mysqli_query($koneksi, "UPDATE user SET last_login ='$date' where email='$email'");
                    if(password_verify($password, $row["password"] )) {
                        $_SESSION["loginAdmin"] = true;
                        // $id=$row["id_dosen"];
                        $_SESSION['dosen_id']=$row["npm_nidn"];
                        $_SESSION['jk'] = $row["jk"];
                        $_SESSION['tgl'] = $row["tgl_lahir"];
                        // $_SESSION["no_hp"] = $row["no_hp"];
                        $_SESSION["status"] = $row["status"];
                        $_SESSION['dosen_user_email']=$email;
                        $_SESSION['dosen_user_name']=$row["nama"];
                        $_SESSION['dosen_user_foto']=$row["foto"];
                        $_SESSION['dosen_user_last_login']=$row["last_login"];
                        header("Location: admin/index.php");
                        exit;
                    }
                }

                if($row['status']=='tpjm'){
                    $date = date("Y:m:d H:i:s");
                    mysqli_query($koneksi, "UPDATE user SET last_login ='$date' where email='$email'");
                    if(password_verify($password, $row["password"] )) {
                        $_SESSION["loginTpjm"] = true;
                        // $id=$row["id_dosen"];
                        $_SESSION['dosen_id']=$row["npm_nidn"];
                        $_SESSION['jk'] = $row["jk"];
                        $_SESSION['tgl'] = $row["tgl_lahir"];
                        $_SESSION["status"] = $row["status"];
                        $_SESSION['dosen_user_email']=$email;
                        $_SESSION['dosen_user_name']=$row["nama"];
                        $_SESSION['dosen_user_foto']=$row["foto"];
                        $_SESSION['dosen_user_last_login']=$row["last_login"];
                        header("Location: tpjm/index.php");
                        exit;
                    }
                }
            }
       
       
       $error = true;
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
    <link rel="icon" href="img/favicon.ico">
    <title>Login Monekul Dosen</title>
</head>
<body class="login">
    <div class="container">
        <div class="row justify-content-center form-login mt-5">
            <div class="col-md-6">
                <form action="" class="panel" method="post">
                    <h3 class="mb-4 text-center text-uppercase">Login Monekul Dosen</h3>
                    <?php if( isset($error) ) :?>
                    <div class="alert alert-danger mr-5 ml-5 radius" role="alert">
                    Email / Password salah
                    </div>
                    <?php endif; ?>
                    <div class="form-group ml-5 mr-5">
                        <input type="text" name="email" id="email" class="form-control form-control-lg radius" placeholder="Email">
                    </div>
                    <div class="form-group ml-5 mr-5">
                        <input type="password" name="password" id="password" class="form-control form-control-lg radius" placeholder="Password">
                    </div>
                    <div class="form-group mt-4 ml-5 mr-5">
                    <button type="submit" class="btn btn-info btn-login block radius" name="login">Login</button>
                    </div>
                    <div class="link" style="padding-top: 20px;
    text-align: center;">
                         Belum ada akun? <a style="text-decoration: none;
    color:blue;
    font-size: 15px;" href="registrasi.php">Verifikasi Akun!</a>
                    </div>
                    <!-- <div class="form-group mt-4 ml-5 mr-5">
                    <a href="registrasidosen.php" class="btn btn-info btn-regis block radius" role="button">Registrasi</a>
                    </div> -->

                </form>

            </div>
        </div>
    </div>




    <script src="js/bootstrap.min.js" ></script>
</body>
</html>