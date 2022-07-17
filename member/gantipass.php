<h1>Ganti Passsword</h1>
<div class="content-pack">
	<div class="notif"></div>
	<form action="" method="post">
		<table class="profile-table">
			<tr>
				<td width="120px">Password Lama :</td>
				<td width="5px">:</td>
				<td><input type="password" name="lama"></td>
			</tr>
			<tr>
				<td width="120px">Password Baru :</td>
				<td width="5px">:</td>
				<td><input type="password" name="baru"></td>
			</tr>
			<tr>
				<td width="120px">Konfirmasi Password :</td>
				<td width="5px">:</td>
				<td><input type="password" name="konfir"></td>
			</tr>
			<tr>
				<td colspan="2">&nbsp;</td>
				<td>
					<input type="submit" name="gantipwd" class="btn red" value="Ubah Sekarang">
				</td>
			</tr>
		</table>	
	</form>
	<?php
		if(isset($_POST['gantipwd'])){
			$id = $konek->real_escape_string($_SESSION['id']);
			$pwd = $konek->query("SELECT password FROM akun WHERE id_akun='$id'")->fetch_object();
			$baru = $konek->real_escape_string($_POST['baru']);
			
			if($_POST['lama']!=$pwd->password){
				echo "<script>$('.notif').text('Password lama tidak benar !').show();";
			}elseif($baru!=$_POST['konfir']){
				echo "<script>$('.notif').text('Konfirmasi password tidak sama !').show();</script>";
			}else{
				$result = $konek->query("UPDATE akun SET password='$baru' WHERE id_akun='$id' ");
				if($result){
					echo "<script>$('.notif').text('Password berhasil di ganti, Silahkan login kembali ..').show();setTimeout(function(){window.location='index.php?req=../login.php';},3000);</script>";
				}else{
					echo $konek->error;
				}
			}
		}

	?>

</div>
