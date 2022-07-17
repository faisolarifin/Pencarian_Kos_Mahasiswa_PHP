<?php
if($_GET['req']!='setakun'){
	if(@$_GET['id']){
		$id_akun = $konek->real_escape_string($_GET['id']);
	}else{
		$id_akun = $_SESSION['id'];
	}
	$row = $konek->query("SELECT akun.*, level.* FROM akun, level WHERE akun.id_akses=level.id_akses AND id_akun='$id_akun'")->fetch_object();
}
?>
<div class="content-pack">
	<form action="" method="post" name="profile">
		<input type="hidden" name="id" value="<?= @$row->id_akun ?>">
		<div class="notif"></div>
		<table class="profile-table">
			<tr>
				<td width="120px">Nama</td>
				<td width="5px">:</td>
				<td><input type="text" name="nama" value="<?= @$row->nama; ?>"></td>
			</tr>
			<tr>
				<td width="120px">Email</td>
				<td width="5px">:</td>
				<td><input type="text" name="email" value="<?= @$row->email; ?>"></td>
			</tr>
			<tr>
				<td width="120px">Jenis Kelamin</td>
				<td width="5px">:</td>
				<td>
					<select name="gender">
						<option></option>
						<option value="L" <?= @$row->jenis_kelamin=='L' ? 'selected' : ''; ?>>Laki-Laki</option>
						<option value="P" <?= @$row->jenis_kelamin=='P' ? 'selected' : ''; ?>>Perempuan</option>
					</select>
				</td>
			</tr>
			<tr>
				<td width="120px">Tempat Lahir</td>
				<td width="5px">:</td>
				<td><input type="text" name="tempat" value="<?= @$row->tempat_lahir; ?>"></td>
			</tr>
			<tr>
				<td width="120px">Tanggal Lahir</td>
				<td width="5px">:</td>
				<td><input type="text" name="tgl_lahir" value="<?= @$row->tanggal_lahir; ?>"></td>
			</tr>
			<tr>
				<td width="120px">Telp</td>
				<td width="5px">:</td>
				<td><input type="text" name="telp" value="<?= @$row->telp; ?>"></td>
			</tr>
			<tr>
				<td width="120px">Alamat</td>
				<td width="5px">:</td>
				<td><textarea name="alamat"><?= @$row->alamat; ?></textarea></td>
			</tr>

			<?php if($_SESSION['akses']=='1'){ ?>
			<tr>
				<td width="120px">Akses</td>
				<td width="5px">:</td>
				<td>
					<select name="akses">
						<option></option>
						<option value="1" <?= @$row->id_akses=='1' ? 'selected' : ''; ?>>Admin</option>
						<option value="2" <?= @$row->id_akses=='2' ? 'selected' : ''; ?>>Member</option>
					</select>
				</td>
			</tr>
			<?php } ?>
			<tr>
				<td colspan="2">&nbsp;</td>
				<td>
					<input type="submit" name="profile" class="btn red" value="Simpan">
				</td>
			</tr>
		</table>	
	</form>
	<?php
		$result = $konek->query("SELECT MAX(id_akun) AS maxKode FROM akun");
		$kode = $result->fetch_object();
		$noUrut = (int) substr($kode->maxKode, 4, 3);
		$noUrut++; 
		if(isset($_POST['profile'])){
			$nama = $konek->real_escape_string($_POST['nama']);
			$email = $konek->real_escape_string($_POST['email']);
			$gender = $konek->real_escape_string($_POST['gender']);
			$tempat = $konek->real_escape_string($_POST['tempat']);
			$tgl_lahir = $konek->real_escape_string($_POST['tgl_lahir']);
			$telp = $konek->real_escape_string($_POST['telp']);
			$alamat = $konek->real_escape_string($_POST['alamat']);
			$akses = @$konek->real_escape_string($_POST['akses']);
			if($_GET['req']=='setakun'){
				$id_akun = 'AKUN'. sprintf("%03s", $noUrut);
				$result = $konek->query("INSERT INTO akun SET id_akun='$id_akun', nama='$nama', email='$email', jenis_kelamin='$gender', tempat_lahir='$tempat', tanggal_lahir='$tgl_lahir', telp='$telp', alamat='$alamat', id_akses='$akses'") or die($konek->error);
				echo "<script>$('.notif').text('Data berhasil ditambah, Tunggu Sebentar..').show();
					setTimeout(function(){window.location='index.php';}, 1000)</script>";
			}else{
				$id = $konek->real_escape_string($_POST['id']);
				$result = $konek->query("UPDATE akun SET  nama='$nama', email='$email', jenis_kelamin='$gender', tempat_lahir='$tempat', tanggal_lahir='$tgl_lahir', telp='$telp', alamat='$alamat', id_akses='$akses' WHERE id_akun='$id' ") or die($konek->error);
				echo "<script>$('.notif').text('Data berhasil diubah, Tunggu Sebentar..').show();
					setTimeout(function(){window.location='index.php';}, 1000)</script>";
			}
		}

	?>

</div>
