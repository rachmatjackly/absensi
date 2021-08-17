<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link href="css/style1.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <title>Monekul UNJ</title>
  </head>
  <body style="background:#EFEFEF">
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
        <section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">INFORMASI KONTAK</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-10 col-md-12">
					<div class="wrapper">
						<div class="row no-gutters">
							<div class="col-md-7 d-flex align-items-stretch">
								<div class="contact-wrap w-100 p-md-5 p-4">
									<h3 class="mb-4">Lapor Website</h3>
									<div id="form-message-warning" class="mb-4"></div> 
				      		<div id="form-message-success" class="mb-4">
				            Your message was sent, thank you!
				      		</div>
									<form method="POST" action="kirim.php">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<input type="text" class="form-control" name="name" id="name" placeholder="Nama">
												</div>
											</div>
											<div class="col-md-6"> 
												<div class="form-group">
													<input type="email" class="form-control" name="email" id="email" placeholder="Email">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<input type="text" class="form-control" name="judul" id="subject" placeholder="Judul">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<textarea name="pesan" class="form-control" id="message" cols="30" rows="7" placeholder="Pesan"></textarea>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<input type="submit" value="Kirim Pesan" class="btn" style="background:#291F64;color:white">
													<div class="submitting"></div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
							<div class="col-md-5 d-flex align-items-stretch">
                                <div class="info-wrap w-100 p-lg-5 p-4" style="background:#291F64">
                                    <h3 class="mb-4 mt-md-4">Monekul MP</h3>
                                    <div class="dbox w-100 d-flex align-items-center">
                                        <div class="text pl-3">
                                        <p>Manajemen Pendidikan Fakultas Ilmu Pendidikan Universitas Negeri Jakarta</p>
                                      </div>
                                  </div>
                                    <div class="dbox w-100 d-flex align-items-start">
                                        <div class="icon d-flex align-items-center justify-content-center">
                                            <span class="fa fa-map-marker"></span>
                                        </div>
                                        <div class="text pl-3">
					            <p><span>Alamat:</span> Jl. Rawamangun Muka Kompleks UNJ Gd. Daksinapati Lt. 1 Ruang 100 Rawamangun, Jakarta Timur 13220</p>
					          </div>
				          </div>
				        	<div class="dbox w-100 d-flex align-items-center">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-phone"></span>
				        		</div>
				        		<div class="text pl-3">
					            <p><span>No Hp:</span> <a href="tel://087738442607">0877-3844-2607</a></p>
					            <p><span>Telepon:</span> <a href="tel://0214700189">021-4700189</a></p>
					          </div>
				          </div>
				        	<div class="dbox w-100 d-flex align-items-center">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-paper-plane"></span>
				        		</div>
				        		<div class="text pl-3">
					            <p><span>Email:</span> <a href="mailto:info@yoursite.com">info@mpfipunj.web.id</a></p>
					          </div>
				          </div>
			          </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
        <!-- Copyright Section-->
        <footer class="footer mt-auto py-3 bg-light">
  <div class="container text-center">
    <span class="text-muted"><strong>Copyright © Absensi UNJ 2020</strong></span>
  </div>
</footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Contact form JS-->
        <script src="assets/mail/jqBootstrapValidation.js"></script>
        <script src="assets/mail/contact_me.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
