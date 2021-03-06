<?php
session_start();
require '../functions.php';
  if ( !isset($_SESSION["loginAdmin"]) ) {
    header("Location: ../login.php");
    exit;
}

if(isset($_SESSION['status'])){
    if($_SESSION['status']!='admin'){
        header("Location: index.php");
        exit;
    }
}

$dosen_id = $_SESSION["dosen_id"];
$dosen_name = $_SESSION["dosen_user_name"];
$dosen_foto = $_SESSION["dosen_user_foto"];
$dosen_last_login = $_SESSION["dosen_user_last_login"];
if(isset($_POST["tambah"])){
    if(tambah_akun($_POST)>0){
        echo "<script>
            alert('Akun baru telah ditambahkan');
            </script>";
        
    }else{
        echo mysqli_error($koneksi);
    }
}
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Tambah Kelas | MONEKUL</title>

  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  
  <link rel="icon" href="img/favicon.ico">
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon">
          <i class="fas fa-university"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Monekul Admin</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      

        <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="tambahkelas.php">
          <!-- <i class="fas fa-fw fa-book"></i> -->
          <i class="bi bi-plus-lg"></i>
          <span>Tambah Kelas</span></a>
      </li>

      <hr class="sidebar-divider">
      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="tambahmatkul.php">
          <i class="fas fa-fw fa-book"></i>
          <span>Tambah Matkul</span></a>
      </li>

      <hr class="sidebar-divider">
      <li class="nav-item">
        <a class="nav-link" href="tambahakun.php">
         <i class="bi bi-person-plus-fill"  style='font-size: 1.1rem;'></i>
          <span>Tambah Akun</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
    

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>


          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <li class="nav align-items-center">
            <span class="mr-2 d-none d-lg-inline text-gray-600 medium">Terakhir Login : <span class="text-primary"><?=$dosen_last_login?></span></span>
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 medium"><?=$dosen_name?></span>
                <img class="img-profile rounded-circle" src="../img/<?=$dosen_foto?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="profil.php?id_dosen=<?=$dosen_id ?>">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profil
                </a>
                <a class="dropdown-item" href="setting.php">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Setting
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Tambah Akun</h1>

          <div class="card mt-3">

        <div class="card-header bg-primary text-white">
            Form Tambah Akun Admin & TPJM 
        </div>
	  <div class="card-body">
	    <form method="post" action="" enctype="multipart/form-data">
		<div class="form-group">
	    		<label><b>NIM/NIDN</label>
	    		<input type="text" name="nidn" value="" class="form-control" placeholder="Masukkan NIM/NIDN" required>
	    	</div>
		<div class="form-group">
	    		<label class="fw-bold"><b>Nama</label>
	    		<input type="text" name="nama" value="" class="form-control" placeholder="Masukkan Nama" required>
	    	</div>
		<div class="form-group">
	    		<label class="fw-bold"><b>Tanggal Lahir</label>
	    		<input type="date" name="tanggal_lahir" value="" class="form-control" placeholder="Masukkan Nama Kelas" required>
	    	</div>
		<div class="form-group">
	    		<label class="fw-bold"><b>Jenis Kelamin</label>
                <select name="jk" class="form-control form-control-mg radius">
                    <option value="pria">Pria</option>
                    <option value="wanita">Wanita</option>
                </select>
	    	</div>
		<div class="form-group">
	    		<label class="fw-bold"><b>Email</label>
	    		<input type="text" name="email" value="" class="form-control" placeholder="Masukkan Email" required>
	    	</div>
		<div class="form-group">
	    		<label class="fw-bold"><b>Password</label>
	    		<input type="password" name="password" value="" class="form-control" placeholder="Masukkan Password" required>
	    	</div>
    <div class="form-group">
    <label class="fw-bold"><b>Foto Profile</label>
                      <img id="profileImage" class="d-block" style="width:250px; margin-bottom:5px;"/>
                    <input type="file" name="foto" id="imgProfile" class="form-control form-control-mg radius" placeholder="Foto">
                </div>
		<div class="form-group" id="div-status">
	    		<label class="fw-bold"><b>Status</label>
                <select name="status" class="form-control form-control-mg radius">
                    <option value="tpjm">TPJM</option>
                    <option value="admin">Admin</option>>
                </select>
	    	</div>
	    	
	    	<button type="submit" class="btn btn-primary" name="tambah">Tambah</button>

	    </form>
	  </div>
	</div>

      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; MONEKUL 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Coming Soon-->
  <div class="modal fade" id="comingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Coming Soon</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">??</span>
          </button>
        </div>
        <div class="modal-body">Fitur ini masih belum aktif</div>
        <div class="modal-footer">
        <button class="btn btn-primary" type="button" data-dismiss="modal">Oke</button>
        </div>
      </div>
    </div>
  </div>
   <!-- Logout Coming Soon-->
   <div class="modal fade" id="warningModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin Mengubah Akun?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">??</span>
          </button>
        </div>
        <div class="modal-body">Untuk mengubah biodata profil ini anda harus menghubungi pihak berwajib dari kampus dengan cara menghubungi via WhatsApp</div>
        <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
        <a class="btn btn-success" href="#"><i class="fab fa-whatsapp"></i> Hubungi</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar ?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">??</span>
          </button>
        </div>
        <div class="modal-body">Pilih Logout untuk keluar</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="../logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <script src="js/imagePreview.js" ></script>
</body>

</html>
