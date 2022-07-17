<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<title>Login Admin | Sikosma</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/admin-login.css">
	<link rel="icon" href="../assets/image/logo1.png" type="image/png"> 
</head>
<body>
	<div class="bg-admin"></div>
	<section class="row login-admin">
		<div class="contrainer">
			<div class="login-page">
				<div class="image-admin">
					<img src="../assets/image/admin-img.png" alt="Admin">
				</div>
				<form method="post">
					<table>
						<tr>
							<td>
								<label for="username">Email</label>
							</td>
							<td>
								<label for="password">Password</label>
							</td>
						</tr>
						<tr>
							<td>
								<input type="text" name="email" id="username" placeholder="email">
							</td>
							<td>
								<input type="text" name="password" id="password" placeholder="password">
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="submit" value="Login" name="login">
							</td>
						</tr>
					</table>				
				</form>
			</div>
		</div>
	</section>

	<footer class="footer-page">
		<div class="bottom-footer">
			<div class="footer-copy">
				Copyright &copy; <?= date('Y'); ?> Sikosma
			</div>
		</div>
	</footer>
</body>
</html>
<?php
	include '../koneksi/koneksi.php';
	if(@$_POST['login']){
		$email = $konek->real_escape_string($_POST['email']);
		$pass = $konek->real_escape_string($_POST['password']);
		if($email=="" || $pass==""){
			echo "<script>alert('Username atau Password tidak boleh kosong !');</script>";
		}else{
			$result = $konek->query("SELECT * FROM akun WHERE email='$email' AND password='$pass' AND id_akses='1'");
			$row = $result->fetch_object();
			if($result->num_rows > 0){
				if($row->id_akses=='1'){
					session_start();
					$_SESSION['id'] = $row->id_akun;
					$_SESSION['nama'] = $row->nama;
					$_SESSION['akses'] = $row->id_akses;
					echo "<script>alert('login berhasil');window.location='./index.php';</script>";
				}else{
					echo "Terjadi kesalahan saat login !";
				}
			}else{
				echo "<script>alert('Username atau Password anda salah !');</script>";
			}
		}
	}


?>