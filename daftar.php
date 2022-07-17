<?php
require './koneksi.php';
$result = $konek->query("SELECT MAX(id_akun) AS maxKode FROM akun");
$kode = $result->fetch_object();
$noUrut = (int) substr($kode->maxKode, 4, 3);
$noUrut++;
$autocode = 'USER'. sprintf("%03s", $noUrut);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>SiKos Telang || Homepage</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="sikos telang - pusat kos daerah universitas trunojoyo madura">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.3.4/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.3.4/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.3.4/animate.css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/login.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
</head>
<body>
<div class="super_container">
	<div class="super_overlay"></div>
	
	<!-- Header -->

	<header class="header">
		
		<!-- Header Bar -->
		<div class="header_bar d-flex flex-row align-items-center justify-content-start">
			<div class="header_list">
				<ul class="d-flex flex-row align-items-center justify-content-start">
					<!-- Phone -->
					<li class="d-flex flex-row align-items-center justify-content-start">
						<div><img src="images/phone-call.svg" alt=""></div>
						<span>+62 82335685 138</span>
					</li>
					<!-- Address -->
					<li class="d-flex flex-row align-items-center justify-content-start">
						<div><img src="images/placeholder.svg" alt=""></div>
						<span>Jl. Raya Telang, PO BOX 2 Kamal, Bangkalan Madura</span>
					</li>
					<!-- Email -->
					<li class="d-flex flex-row align-items-center justify-content-start">
						<div><img src="images/envelope.svg" alt=""></div>
						<span>sikostelang@gmail.com</span>
					</li>
				</ul>
			</div>
			<div class="ml-auto d-flex flex-row align-items-center justify-content-start">
				<div class="social">
					<ul class="d-flex flex-row align-items-center justify-content-start">
						<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
						<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
						<li><a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
					</ul>
				</div>
				<div class="log_reg d-flex flex-row align-items-center justify-content-start">
					<ul class="d-flex flex-row align-items-start justify-content-start">
						<li><a href="login.php">Login</a></li>
						<li><a href="daftar.php">Daftar</a></li>
					</ul>
				</div>
			</div>
		</div>

		<!-- Header Content -->
		<div class="header_content d-flex flex-row align-items-center justify-content-start">
			<div class="logo"><a href="#">Si<span>KosMa</span></a></div>
			<nav class="main_nav">
				<ul class="d-flex flex-row align-items-start justify-content-start">
					<li class="active"><a href="index.php">Home</a></li>
					<li><a href="about.php">Tentang</a></li>
					<li><a href="listings.php">Listings</a></li>
					<li><a href="blog.php">Berita</a></li>
					<li><a href="contact.php">Kontak</a></li>
				</ul>
			</nav>
			<div class="submit ml-auto"><a href="#">diel listing</a></div>
			<div class="hamburger ml-auto"><i class="fa fa-bars" aria-hidden="true"></i></div>
		</div>

	</header>

	<!-- Menu -->

	<div class="menu text-right">
		<div class="menu_close"><i class="fa fa-times" aria-hidden="true"></i></div>
		<div class="menu_log_reg">
			<div class="log_reg d-flex flex-row align-items-center justify-content-end">
				<ul class="d-flex flex-row align-items-start justify-content-start">
					<li><a href="#">Login</a></li>
					<li><a href="#">Daftar</a></li>
				</ul>
			</div>
			<nav class="menu_nav">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="about.php">Tentang</a></li>
					<li><a href="listings.php">Listings</a></li>
					<li><a href="blog.php">Berita</a></li>
					<li><a href="contact.php">Kontak</a></li>
				</ul>
			</nav>
		</div>
	</div>

<div class="featured">
		<div class="container">
			<div class="row featured_row">
				<div class="form-login form-regis">
					<h1>Daftar Disini ...</h1>
					<form name="daftar" action="" method="post">
						<input type="text" name="nama" placeholder="Nama Anda">
						<br>
						<input type="text" name="email" placeholder="Email">
						<br>
						<input type="text" name="tempat_lahir" placeholder="Tempat Lahir">
						<br>
						<input type="text" name="tgl_lahir" placeholder="Tanggal Lahir">
						<br>
						<select name="gender">
							<option value="">-- Jenis Kelamin --</option>
							<option value="L">Laki-Laki</option>
							<option value="P">Perempuan</option>
						</select>
						<br>
						<input type="text" name="telp" placeholder="No. Telp">
						<br>
						<textarea name="alamat" placeholder="Alamat"></textarea>					
						<br>
						<input type="password" name="password" placeholder="Password">
						<br>
						<input type="submit" name="daftar" value="Daftar Sekarang">
						<input type="reset" value="Clear">
					</form>
					<?php
						if(isset($_POST['daftar'])){
							$nama = $konek->real_escape_string($_POST['nama']);
							$email = $konek->real_escape_string($_POST['email']);
							$tempat = $konek->real_escape_string($_POST['tempat_lahir']);
							$tanggal = $konek->real_escape_string($_POST['tgl_lahir']);
							$gender = $konek->real_escape_string($_POST['gender']);
							$telp = $konek->real_escape_string($_POST['telp']);
							$alamat = $konek->real_escape_string($_POST['alamat']);
							$password = $konek->real_escape_string($_POST['password']);
							$akses='2';
							$simpan = $konek->query("INSERT INTO akun(id_akun,nama,email,jenis_kelamin,tempat_lahir,tanggal_lahir,password,telp,alamat,id_akses) VALUES ('$autocode','$nama','$email','$gender','$tempat','$tanggal','$password','$telp','$alamat','$akses')");
							if($simpan){
								echo "Anda berhasil mendaftar sebagai member kami";
								echo "<br>Anda akan diarahkan untuk login, Tunggu Sebentar...";
								echo "<script>setTimeout(function(){window.location='./login.php';}, 3000);</script>";
							}
							else{
								echo "Terjadi kesalahan : ".$konek->error;
							}
						}
					?>
				</div>
			</div>
		</div>
	</div>
	

	<footer class="footer">
		<div class="footer_content">
			<div class="container">
				<div class="row">
					
					<!-- Footer Column -->
					<div class="col-xl-3 col-lg-6 footer_col">
						<div class="footer_about">
							<div class="footer_logo"><a href="#">Si<span>KosMa</span></a></div>
							<div class="footer_text">
								<p>Nulla aliquet bibendum sem, non placerat risus venenatis at. Prae sent vulputate bibendum dictum. Cras at vehicula urna. Suspendisse fringilla lobortis justo, ut tempor leo cursus in.</p>
							</div>
						</div>
					</div>

					<!-- Footer Column -->
					<div class="col-xl-3 col-lg-6 footer_col">
						<div class="footer_column">
							<div class="footer_title">Informasi</div>
							<div class="footer_info">
								<ul>
									<!-- Phone -->
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div><img src="images/phone-call.svg" alt=""></div>
										<span>+62 82335685 138</span>
									</li>
									<!-- Address -->
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div><img src="images/placeholder.svg" alt=""></div>
										<span>Jl. Raya Telang, PO BOX 2 Kamal, Bangkalan-Madura</span>
									</li>
									<!-- Email -->
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div><img src="images/envelope.svg" alt=""></div>
										<span>sikostelang@gmail.com</span>
									</li>
								</ul>
							</div>
							
						</div>
					</div>

					<!-- Footer Column -->
					<div class="col-xl-3 col-lg-6 footer_col">
						<div class="footer_links">
							<div class="footer_title">Tautan</div>
								<ul>
									<li><a href="#">Home</a></li>
									<li><a href="#">Tentang</a></li>
									<li><a href="#">Listings</a></li>
									<li><a href="#">Berita</a></li>
									<li><a href="#">Kontak</a></li>
								</ul>
							</div>
						</div>
					</div>

					
				</div>
			</div>
		</div>
		<div class="footer_bar">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="footer_bar_content d-flex flex-md-row flex-column align-items-md-center align-items-start justify-content-start">
							<div class="copyright order-md-2 order-1 ml-md-auto">
								Copyright &copy; <script>document.write(new Date().getFullYear());</script> SiKos - All rights reserved 
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
</div>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="styles/bootstrap-4.1.2/bootstrap.min.js"></script>

<script src="plugins/OwlCarousel2-2.3.4/owl.carousel.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
<script src="js/custom.js"></script>
</body>
</html>