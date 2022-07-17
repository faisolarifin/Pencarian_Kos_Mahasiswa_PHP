<?php
	$id_kos = @$konek->real_escape_string($_GET['id']);
	if(@$id_kos){
		$data = $konek->query("SELECT kos.*, gambar_kos.* FROM kos, kategori, gambar_kos WHERE kategori.id_kat=kos.id_kat AND gambar_kos.id_kos=kos.id_kos AND kos.id_kos='$id_kos'");
		if($data->num_rows > 0){
			$data = $data->fetch_object();
			$html = "";
			$qry = $konek->query("SELECT * FROM gambar_kos WHERE id_kos='$data->id_kos'");
			while($d=$qry->fetch_object()){
				$html .= "<img src='../gambar/$d->nama_gambar' width='115' style='margin:0 10px 0 0;'>";
			}
		}
	}
?>
<h1 class="detail">Tambah Kos</h1>
<div class="content-pack">
	<div class="notif"></div>
	<form action="" method="post" name="kos" enctype="multipart/form-data">
		<table class="profile-table">
			<tr>
				<td width="120px">Nama Kos</td>
				<td width="5px">:</td>
				<td><input type="text" name="nama" value="<?= @$data->nama; ?>"></td>
			</tr>
			<tr>
				<td width="120px">Kategori</td>
				<td width="5px">:</td>
				<td>
					<select name="kategori">
						<option value=""></option>
						<?php
						$q=$konek->query("SELECT * FROM kategori");
						while($r=$q->fetch_object()){
							$ct[] = $r->id_kat;
							?><option value='<?= $r->id_kat ?>' <?= @$data->id_kat==$r->id_kat ? 'selected' : ''; ?>><?= $r->nama_kat; ?></option><?php
						}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td width="120px">Umur Bangunan</td>
				<td width="5px">:</td>
				<td><input type="text" name="umur" value="<?= @$data->umur_kos; ?>"></td>
			</tr>
			<tr>
				<td width="120px">Jam Tamu</td>
				<td width="5px">:</td>
				<td>
					<select name="jam">
						<option value=""></option>
						<option value="Bebas" <?= @$data->jam_tamu=='Bebas' ? 'selected' : ''; ?>>Bebas</option>
						<option value="Dibatasi" <?= @$data->jam_tamu=='Dibatasi' ? 'selected' : ''; ?>>Dibatasi</option>
					</select>
				</td>
			</tr>
			<tr>
				<td width="120px">Pelihara Binatang</td>
				<td width="5px">:</td>
				<td>
					<select name="binatang">
						<option value=""></option>
						<option value="Ya" <?= @$data->pelihara_bnt=='Ya' ? 'selected' : ''; ?>>Ya</option>
						<option value="Tidak" <?= @$data->pelihara_bnt=='Tidak' ? 'selected' : ''; ?>>Tidak</option>
					</select>
				</td>
			</tr>
			<tr>
				<td width="120px">Deskripsi</td>
				<td width="5px">:</td>
				<td><textarea name="deskripsi"><?= @$data->deskripsi; ?></textarea></td>
			</tr>
			<tr>
				<td width="120px">Alamat</td>
				<td width="5px">:</td>
				<td><textarea name="alamat"><?= @$data->alamat; ?></textarea></td>
			</tr>
			<tr>
				<td width="120px">Gambar</td>
				<td width="5px">:</td>
				<td>
					<input type="file" name="gambar[]" id="get_gambar" multiple="true" accept="image/*">
				</td>
			</tr>
			<tr id="col_hidden">
				<td colspan="2">&nbsp;</td>
				<td id="set_image"><?= @$html; ?></td>
			</tr>
			<tr>
				<td colspan="2">&nbsp;</td>
				<td>
					<input type="submit" name="kos" class="btn green" value="Simpan">
				</td>
			</tr>
		</table>	
	</form>
	<?php 
	$result = $konek->query("SELECT MAX(id_kos) AS maxKode FROM kos");
	$kode = $result->fetch_object();
	$noUrut = (int) substr($kode->maxKode, 3, 3);
	$noUrut++;
		if(isset($_POST['kos'])){
			$id_user = $konek->real_escape_string($_SESSION['id']);
			$nama = $konek->real_escape_string($_POST['nama']);
			$kategori = $konek->real_escape_string($_POST['kategori']);
			$umur = $konek->real_escape_string($_POST['umur']);
			$jam = $konek->real_escape_string($_POST['jam']);
			$binatang = $konek->real_escape_string($_POST['binatang']);
			$deskripsi = $konek->real_escape_string($_POST['deskripsi']);
			$alamat = $konek->real_escape_string($_POST['alamat']);
			if($id_user=="" || $nama=="" || $kategori=="" || $umur=="" || $jam=="" || $binatang=="" || $deskripsi=="" || $alamat==""){
				echo "<script>notifikasi('Silahkan lengkapi borang yang disediakan !');</script>";
			}elseif(!in_array($kategori, $ct)){
				echo "<script>notifikasi('Silahkan pilih kategori yang tersedia !');</script>";
			}elseif(!is_numeric($umur)){
				echo "<script>notifikasi('Masukkan angka pada umur bangunan !');</script>";
			}elseif(!in_array($jam, ['Bebas','Dibatasi'])){
				echo "<script>notifikasi('Silahkan pilih jam tamu yang disediakan !');</script>";
			}elseif(!in_array($binatang, ['Ya','Tidak'])){
				echo "<script>notifikasi('Silhakan pilih Ya/Tidak saja !');</script>";
			}elseif(count($_FILES['gambar']['name']) < 4 && $_GET['req'] != 'editkos'){
				echo "<script>notifikasi('Masukkan minimal 4 gambar !');</script>";
			}else{
				if(@$_GET['req']=='editkos'){
					$konek->query("UPDATE kos SET id_akun='$id_user', id_kat='$kategori', nama='$nama', umur_kos='$umur', jam_tamu='$jam', pelihara_bnt='$binatang', deskripsi='$deskripsi', alamat='$alamat' WHERE id_kos='$id_kos'") or die($konek->error);
					echo "<script>$('.notif').text('Data kos berhasil di ubah, Silahkan tunggu..').show();setTimeout(function(){window.location='index.php?req=datakost';},3000);</script>";				
				}else{
					$id_kos = 'KOS'. sprintf("%03s", $noUrut);
					$konek->query("INSERT INTO kos(id_kos,id_akun,id_kat,nama,umur_kos,jam_tamu,pelihara_bnt,deskripsi,alamat) VALUES('$id_kos','$id_user','$kategori','$nama','$umur','$jam','$binatang','$deskripsi','$alamat')") or die($konek->error);
					echo "<script>$('.notif').text('Data kos berhasil ditambahkan, Anda akan diarahkan untuk mengisi data kamar ..').show();setTimeout(function(){window.location='index.php?req=tambahkmr&id=$id_kos';},3000);</script>";

				};
				if(count($_FILES['gambar']['name']) > 1){
					$img_count = count($_FILES['gambar']['name']);
					$q=$konek->query("SELECT nama_gambar FROM gambar_kos WHERE id_kos='$id_kos'");
					while($r=$q->fetch_object()){
						unlink("../gambar/".$r->nama_gambar);
					}
					$konek->query("DELETE FROM gambar_kos WHERE id_kos='$id_kos'");
					for($i=0;$i<$img_count;$i++){
						$img_name = time().$_FILES['gambar']['name'][$i];
						$img_tmp = $_FILES['gambar']['tmp_name'][$i];
						move_uploaded_file($img_tmp, '../gambar/'.$img_name);
						$konek->query("INSERT INTO gambar_kos (id_kos,nama_gambar) VALUES ('$id_kos','$img_name')") or die($konek->error);
					}
				}
			}
		}
	?>
</div>
<script>
$('#col_hidden').show(); 
 $('#get_gambar').change(function(e){
 	$('#set_image').html('');
 	$('#col_hidden').show(); 	
 	readImage(this,'#set_image');
 });
</script>