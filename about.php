<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link href="css/responsive.css" rel="stylesheet">
    <title>Monekul UNJ</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-xl navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand d-flex" href="index.php" style="">
      <img src="dosen/img/unj.jpg" alt="" width="100" height="100" class="d-inline-block align-text-top ms-5 me-3">
      <label class="brand-title">SISTEM INFORMASI MONEV PERKULIAHAN <br>
      PRODI S1 MANAJEMEN PENDIDIKAN <br>
      FIP UNJ</label>
    </a>
    <button class="navbar-toggler" type="button" id="hamburger" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto" style="margin-right:30px;">
        <li class="nav-item me-3 fs-3">
          <a class="nav-link active" aria-current="page" href="index.php">Beranda</a>
        </li>
        <li class="nav-item me-3 fs-3">
          <a class="nav-link" href="about.php">Tentang</a>
        </li>
            <li class="nav-item me-3 fs-3">
              <a class="nav-link" href="contact.php">Kontak</a>
            </li>
            
        <li class="nav-item dropdown">
        <button style="background-color:#34CCCC;border:0" class="btn btn-secondary fs-3" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
            Absensi
        </button>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
            <li><a class="dropdown-item fs-4" href="mahasiswaAbsen.php">Mahasiswa</a></li>
            <li><a class="dropdown-item fs-4" href="dosenAbsen.php">Dosen</a></li>
          </ul>
        </li>
    
        <li class="nav-item me-3 fs-3">
          <a class="nav-link" href="login.php">Login</a>
        </li>
        <li class="nav-item me-3 fs-3">
          <a class="nav-link" href="registrasi.php">Registrasi</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
        <!-- Masthead-->
        <div class="container-fluid min-vh-100" style="background:#EFEFEF;">
        <div class="row">
        <div class="col">
          <div class="content" style="margin-top:100px;margin-left:100px">
            <h1 style="color:rgb(75,57,181)">Sekilas tentang Sistem Informasi Monekul MP <br>FIP UNJ</h1>
              <div class="content-text fs-2" style="width:70%;text-align:justify;">  
                <p>Sistem Informasi ini diadakan untuk memonitoring dan mengevaluasi sejauh mana proses absensi  Program Studi S1 Manajemen Pendidikan. Dengan adanya Sistem Informasi ini diharapkan Mahasiswa dan Dosen dapat dengan mudah melakukan absensi perkuliahan. Serta TPJM Prodi dan Kaprodi dibantu Staf Prodi dapat memantau absensi perkuliahan di Program Studi Manajemen Pendidikan dengan mudah dan lancar</p>
              </div>
          </div>
        </div>
      </div>

      <div class="row row-cols-1 row-cols-lg-3 g-4 in" style="margin-left:100px">
    <div class="col-lg" style="">
        <div class="card mt-4" style="width:60%;">
        <img src="img/manusia.png" style="height:300px" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title fw-light text-center">Emma Halimah, S.Pd</h5>
        </div>
        </div>
    </div>
    <div class="col-lg" style="">
        <div class="card mt-4" style="width:60%">
        <img src="img/manusia.png" style="height:300px" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title fw-light text-center">Siti Zulaikha, SAg., M.Pd</h5>
        </div>
        </div>
    </div>
    <div class="col-lg mb-4" style="">
        <div class="card mt-4" style="width:60%;">
        <img src="img/manusia.png" style="height:300px" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title fw-light text-center">Evitha Soraya, M.Pd</h5>
        </div>
        </div>
    </div>
</div> 
</div>
        <!-- Copyright Section-->
        <footer class="footer mt-auto py-3 " >
  <div class="container text-center">
    <span class="text-muted"><strong>Copyright © Absensi UNJ 2020</strong></span>
  </div>
</footer>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->
  </body>
</html>
