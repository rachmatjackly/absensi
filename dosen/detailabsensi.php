<?php
	
  session_start();
  if ( !isset($_SESSION["loginDosen"]) ) {
    header("Location: login.php");
    exit;
}
	include "../koneksi.php";
	/*
	if(isset($_session['id'])){
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';	
	}*/		
	$dosen_id = $_SESSION['dosen_id'];
	$dosen_name = $_SESSION["dosen_user_name"];
    $dosen_foto = $_SESSION["dosen_user_foto"];
    
    $tgl=date("d-m-Y");
	// $jumlah_dosen=mysqli_num_rows(mysqli_query($koneksi,"select * from dosen where status='Dosen'"));
	// $jumlah_kelas=mysqli_num_rows(mysqli_query($koneksi,"select * from kelas"));
	// $jumlah_mahasiswa=mysqli_num_rows(mysqli_query($koneksi,"select * from mahasiswa"));
	
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Absensi | MONEKUL</title>

  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="icon" href="img/favicon.ico">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon">
          <i class="fas fa-university"></i>
        </div>
        <div class="sidebar-brand-text mx-3">MONEKUL DOSEN</div>
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
      <hr class="sidebar-divider">

     
      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="absensi.php">
          <i class="fas fa-fw fa-user-check"></i>
          <span>Absensi</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="nilai.php">
          <i class="fas fa-fw fa-book"></i>
          <span>Nilai Tugas</span></a>
      </li> -->

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

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $dosen_name ;?></span>
                <img class="img-profile rounded-circle" src="../img/<?= $dosen_foto; ?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="profil.php?id_dosen=<?=$dosen_id ?>">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profil
                </a>
                <a class="dropdown-item" href="setting.php">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Pengaturan
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
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
          <h1 class="h3 mb-4 text-gray-800">Absensi <?php if($_GET["kelas"]){echo 'Kelas';}?> <br>Minggu <?=$_GET["pekan"].' ('.$tgl.')'?> </h1>

            <!-- DataTales -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Daftar Mahasiswa </h6>
            </div>
            <div class="card-body">             
                <form role="form" action="simpanabsensi.php?id=<?php echo $_GET['kelas'];?>&jadwal=<?php echo $_GET['pekan'];?>" method="post" name="postform" enctype="multipart/form-data">
              <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr align="center">
                      <th>No</th>
                      <th>Profil</th>
                      <th>NPM</th>
                      <th>Nama</th>
                      <th>Status</th>
                      <th>Waktu</th>
                    </tr>
                  </thead>
                  <tbody align="center">
                    <?php
                    $id_kelas=$_GET['kelas'];
                    
                    $pekan=$_GET['pekan'];
                    $sql="SELECT DISTINCT mahasiswa.foto, absen_mahasiswa.* FROM absen_mahasiswa JOIN mahasiswa ON mahasiswa.npm_nidn=absen_mahasiswa.npm WHERE absen_mahasiswa.id_kelas='$id_kelas' and absen_mahasiswa.pekan='$pekan'";
                    $query=mysqli_query($koneksi,$sql);
                    $i = 1;
                    while ($data=mysqli_fetch_assoc($query)){
                      $foto = $data["foto"];
                        $npm=$data["npm"];
                        $nama=$data["nama"];
                        $status=$data["keterangan"];
                        $jadwal = date('Y:m:d');
                        $jml[] = $status;
                        $pekan = $data['pekan'];
                        $waktu_absen = $data['waktu_absen'];
                     ?>
                    <tr>
                      <input type="hidden" name="nama[]" value="<?php echo $nama;?>"/>
                      <input type="hidden" name="idd" value="<?php echo $i;?>"/>
                      <input type="hidden" name="npm" value="<?php echo $npm;?>"/>
                      <td><?=$i++;?></td>
                      <td><img class="img-profile rounded-circle" style="width:50px;height:50px;" src="../img/<?= $foto;?>"></td>
                      <td><?= $npm;?></td>
                      <td><?= $nama;?></td>
                      <td style="width:150px;"> 
                      <select class="form-control form-control-mg radius text-center" name="keterangan[]">
                        <?php
                          // if($status == 'Hadir'){ ?>
                            
                          <option value="hadir" <?php if($status == "Hadir") { echo "SELECTED"; } ?>>Hadir</option>
                          <option value="absen" <?php if($status == "Absen") { echo "SELECTED"; } ?>>Absen</option>
                          <option value="sakit" <?php if($status == "Sakit") { echo "SELECTED"; } ?>>Sakit</option>
                          <option value="izin" <?php if($status == "Izin") { echo "SELECTED"; } ?>>Izin</option>
  

                            <!-- <script>document.getElementById('hadir').checked=true;</script> -->
                            <!-- <label class="radio-inline"><input type="radio" value="hadir" id="hadir" name="keterangan<?=$i?>" checked>Hadir</label>
                            <label class="radio-inline"><input type="radio" value="absen" id="absen" name="keterangan<?=$i?>" >Absen</label>
                            <label class="radio-inline"><input type="radio" value="sakit" id="sakit" name="keterangan<?=$i?>" >Sakit</label>
                            <label class="radio-inline"><input type="radio" value="izin" id="izin" name="keterangan<?=$i?>" >Izin</label> -->
                          <?php// }elseif($status == 'Absen'){ ?>
                            <!-- <script>document.getElementById('absen').checked=true;</script> -->
                            <!-- <label class="radio-inline"><input type="radio" value="hadir" id="hadir"name="keterangan<?=$i?>">Hadir</label>
                            <label class="radio-inline"><input type="radio" value="absen" id="absen" name="keterangan<?=$i?>" checked>Absen</label>
                            <label class="radio-inline"><input type="radio" value="sakit" id="sakit" name="keterangan<?=$i?>" >Sakit</label>
                            <label class="radio-inline"><input type="radio" value="izin" id="izin" name="keterangan<?=$i?>" >Izin</label> -->
                          <?php// }elseif($status == 'Sakit'){ ?>
                            <!-- <script>document.getElementById('sakit').checked=true</script> -->
                            <!-- <label class="radio-inline"><input type="radio" value="hadir" id="hadir" name="keterangan<?=$i?>">Hadir</label>
                            <label class="radio-inline"><input type="radio" value="absen" id="absen" name="keterangan<?=$i?>" >Absen</label>
                            <label class="radio-inline"><input type="radio" value="sakit" id="sakit" name="keterangan<?=$i?>" checked>Sakit</label>
                            <label class="radio-inline"><input type="radio" value="izin" id="izin" name="keterangan<?=$i?>">Izin</label> -->
                          <?php// }else{ ?>
                            <!-- <script>document.getElementById('izin').checked=true;</script> -->
                            <!-- <label class="radio-inline"><input type="radio" value="hadir" id="hadir"name="keterangan<?=$i?>">Hadir</label>
                            <label class="radio-inline"><input type="radio" value="absen" id="absen" name="keterangan<?=$i?>" >Absen</label>
                            <label class="radio-inline"><input type="radio" value="sakit" id="sakit" name="keterangan<?=$i?>" >Sakit</label>
                            <label class="radio-inline"><input type="radio" value="izin" id="izin" name="keterangan<?=$i?>" checked>Izin</label> -->
                        <?php// } ?>
                        </select>
                      </td>
                      <td><?=$waktu_absen?></td>
                    </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>
            <button type="submit" class="btn btn-primary mt-4 col-md-2 offset-10">Simpan Data</button>
            </form>
            
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; MONEKUL</span>
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

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih Logout untuk keluar.</div>
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
  
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
