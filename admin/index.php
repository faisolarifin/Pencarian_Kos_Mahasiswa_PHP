<?php
	session_start();
	if(empty($_SESSION['id']) && empty($_SESSION['akses']) && @$_SESSION['akses'] != 'member'){
		echo "<script>alert('Anda tidak di izinkan mengakses halaman ini!!, Silahkan login terlebih dahulu !');setTimeout(function(){window.location='./login.php';},1000);</script>";
	}else{
	require '../koneksi/koneksi.php';
	require '../member/modul.php';

?>
<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<title>Member | Sikosma</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/main-style.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/back-style.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/admin-back.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/slider.css">
	<link rel="stylesheet" type="text/css" href="../plugin/font-awesome-4.7.0/css/font-awesome.min.css">

	<script src="../assets/js/jquery.min.js"></script>
	<script src="../assets/js/slider.js"></script>
	<script src="../assets/js/min.js"></script>

</head>
<body>
	<header class="header-top bg-header3">
		<div class="header-content">
			<div class="top-logo">
				<img src="../assets/image/logo.png" alt="Logo Sistem">
			</div>
			<nav>
				<ul class="menu">
					<li class="menu-play"><a href="#"><i class="fa fa-user"></i>&nbsp;&nbsp;<?= $_SESSION['nama']; ?> <i class="fa fa-caret-down"></i></a>
						<ul>
							<li><a href="index.php?req=profile">Profile</a></li>
							<li><a href="index.php?req=gantipass">Ganti Password</a></li>
							<li><a href="index.php?req=keluar">Logout</a></li>
						</ul>
					</li>					
				</ul>
			</nav>		
			<div class="clear-fix"></div>
		</div>
	</header>

	<section class="sidenav">
		<nav class="nav-left">
			<ul class="sidenav-manu">
				<li><a href="index.php">Dashboard</a></li>
				<li><a href="index.php?req=lsakun&ct=admin">Daftar Admin</a></li>
				<li><a href="index.php?req=lsakun&ct=member">Daftar Member</a></li>
				<li><a href="index.php?req=datakost">Daftar Kos</a></li>
				<li><a href="index.php?req=datakamar">Daftar Kamar</a></li>
				<li><a href="index.php?req=ctkos">Kategori Kos</a></li>
				<li><a href="index.php?req=datafas">Daftar Fasilitas</a></li>
			</ul>
		</nav>
		<div class="clear-fix"></div>
	</section>

	<section class="package-content">
		<?php
			$request = @htmlentities($_GET['req']);
			switch ($request) {
				case 'datakost':
					include './list-kos.php';
					break;
				case 'datakamar':
					include './data-kamar.php';
					break;
				case 'detail':
					include './detail-kos.php';
					break;
				case 'profile':
					include '../member/profile.php';
					break;
				case 'detailkmr':
					include './detail-kamar.php';
					break;
				case 'tambahkos':
					include './tambah-kos.php';
					break;
				case 'tambahkmr':
					include './tambah-kamar.php';
					break;
				case 'hapuskos':
					include './hapus-kos.php';
					break;	
				case 'hapuskmr':
					include './hapus-kamar.php';
					break;
				case 'editkos':
					include './tambah-kos.php';
					break;	
				case 'editkmr':
					include './tambah-kamar.php';
					break;
				case 'gantipass':
					include '../member/gantipass.php';
					break;
				//for admin
				case 'lsakun':
					include './list-akun.php';
					break;
				case 'datafas':
					include './data-fasilitas.php';
					break;
				case 'ctkos':
					include './kategori-kos.php';
					break;
				case 'tambahfas':
					include './form-fasilitas.php';
					break;
				case 'editfas':
					include './form-fasilitas.php';
					break;
				case 'hapusfas':
					include './hapus-fasilitas.php';
					break;
				case 'tambahkat':
					include './form-kat.php';
					break;
				case 'editkat':
					include './form-kat.php';
					break;
				case 'hapuskat':
					include './hapus-ct.php';
					break;
				case 'editakun':
					include '../member/profile.php';
					break;
				case 'blokir':
					include './hapus-akun.php';
					break;
				case 'hapusakun':
					include './hapus-akun.php';
					break;
				case 'setakun':
					include '../member/profile.php';
					break;
				case 'keluar':
					include './logout.php';
					break;
				default:
					include './main.php';
					break;
			}
		?>
	</section>
	<footer class="footer-page footer-bottom">
		<div class="bottom-footer">
			<div class="footer-copy">
				Copyright &copy; <?= date('Y'); ?> SiKosMa
			</div>
		</div>
	</footer>
</body>
</html>
<?php
}
?>