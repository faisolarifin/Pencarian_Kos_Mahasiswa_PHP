<?php
	$id_kamar = @$konek->real_escape_string($_GET['id']);
	if(@$id_kamar && @$_GET['req']=='editkmr'){
		$qry = $konek->query("SELECT kamar.*, harga.*, kos.id_kos, kos.id_akun FROM kamar, harga, kos WHERE kamar.id_kamar=harga.id_kamar AND kamar.id_kamar='$id_kamar' AND kos.id_kos=kamar.id_kos");
		
		if($qry->num_rows > 0){
			$data = $qry->fetch_object();
			$html = "";
			$qry = $konek->query("SELECT * FROM gambar_kamar WHERE id_kamar='$data->id_kamar'");
			while($d=$qry->fetch_object()){
				$html .= "<img src='../gambar/$d->nama_gmb' width='115' style='margin:0 10px 0 0;'>";
			}
			$q = $konek->query("SELECT id_fas FROM fasilitas_kamar WHERE id_kamar='$data->id_kamar'");
			while($r=$q->fetch_object()){
				$check[] = $r->id_fas;
			}
		}
	}
?>
<h1 class="detail">Tambah Kamar</h1>
<div class="content-pack">
	<div class="notif"></div>
	<form action="" method="post" enctype="multipart/form-data">
		<table class="profile-table">
			<?php
			if(empty($_GET['id']) or $_GET['req']=='editkmr'){
			?>
			<td width="120px">Nama Kos</td>
				<td width="5px">:</td>
				<td>
					<select name="nama_kos">
						<option value=""></option>
						<?php
						$q=$konek->query("SELECT id_kos, nama, id_akun FROM kos");
						while($r=$q->fetch_object()){
							?><option value='<?= $r->id_kos; ?>' <?= @$data->id_kos==$r->id_kos ? 'selected' : ''; ?>><?= $r->nama; ?></option><?php
						}
						?>
					</select>
				</td>
			<?php
			}
			?>
			<tr>
				<td width="120px">Jumlah Kamar</td>
				<td width="5px">:</td>
				<td><input type="text" name="jumlah" value="<?= @$data->jumlah; ?>"></td>
			</tr>
			<tr>
				<td width="120px">Luas (m)</td>
				<td width="5px">:</td>
				<td><input type="text" name="luas" placeholder="sample: 7x7" value="<?= @$data->luas; ?>"></td>
			</tr>
			<tr>
				<td width="120px">Harga</td>
				<td width="5px">:</td>
				<td>
					<input type="text" name="hrg_hari" class="form-harga" placeholder="Rp.*" value="<?= !empty($data->harian) ? $data->harian : '' ?>">/hari
					<input type="text" name="hrg_minggu" class="form-harga"placeholder="Rp.*" value="<?= !empty($data->mingguan) ? $data->mingguan : '' ?>">/minggu
					<input type="text" name="hrg_bulan" class="form-harga"placeholder="Rp." value="<?= !empty($data->bulanan) ? $data->bulanan : '' ?>">/bulan
					<input type="text" name="hrg_tahun" class="form-harga"placeholder="Rp.*" value="<?= !empty($data->tahunan) ? $data->tahunan : '' ?>">/tahun
				</td>
			</tr>
			<tr>
				<td width="120px">Deskripsi</td>
				<td width="5px">:</td>
				<td><textarea name="deskripsi"><?= @$data->deskripsi; ?></textarea></td>
			</tr>
			<tr>
				<td width="120px">Fasilitas</td>
				<td width="5px">:</td>
				<td>
					<?php
						$q = $konek->query("SELECT * FROM fasilitas");
						while($r=$q->fetch_object()){
					?>
					<span class="fasilitas-box">
						<input type="checkbox" name="fasilitas[]" id="<?= $r->id_fas; ?>" value="<?= $r->id_fas; ?>" <?= @in_array($r->id_fas, $check) ? 'checked' : ''; ?>><label for="<?= $r->id_fas; ?>"><i class="fa <?= $r->awesome; ?>"></i> <?= $r->nama_fas; ?></label>
					</span>
					<?php
						}
					?>
				</td>
			</tr>
			<tr>
				<td width="120px">Gambar</td>
				<td width="5px">:</td>
				<td>
					<input type="file" name="gambar[]" id="kmr_gambar" multiple="true" accept="image/*">
				</td>
			</tr>
			<tr id="col_hidden">
				<td colspan="2">&nbsp;</td>
				<td id="kmr_image"><?= @$html; ?></td>
			</tr>
			<tr>
				<td colspan="2">&nbsp;</td>
				<td>
					<input type="submit" name="kamar" class="btn green" value="Simpan">
				</td>
			</tr>
		</table>	
	</form>
	<?php
		$result = $konek->query("SELECT MAX(id_kamar) AS maxKode FROM kamar");
		$kode = $result->fetch_object();
		$noUrut = (int) substr($kode->maxKode, 3, 3);
		$noUrut++; 
		if(isset($_POST['kamar'])){
			$id_kos = @$_POST['nama_kos']!='' ? $konek->real_escape_string($_POST['nama_kos']) : $konek->real_escape_string($_GET['id']);
			$jumlah = $konek->real_escape_string($_POST['jumlah']);
			$luas = $konek->real_escape_string($_POST['luas']);
			$hrg_hari = $konek->real_escape_string($_POST['hrg_hari']);
			$hrg_minggu = $konek->real_escape_string($_POST['hrg_minggu']);
			$hrg_bulan = $konek->real_escape_string($_POST['hrg_bulan']);
			$hrg_tahun = $konek->real_escape_string($_POST['hrg_tahun']);
			$deskripsi = $konek->real_escape_string($_POST['deskripsi']);
			if($id_kos=="" || $jumlah=="" || $luas=="" ||  $hrg_bulan=="" || $deskripsi==""){
				echo "<script>notifikasi('Silahkan lengkapi borang berikut !');</script>";
			}elseif(!is_numeric($jumlah)){
				echo "<script>notifikasi('Jumlah kamar harus berupa angka !');</script>";
			}elseif(!is_numeric($hrg_bulan)){
				echo "<script>notifikasi('Harga kamar harus berupa angka !');</script>";
			}elseif(empty($_POST['fasilitas'])){
				echo "<script>notifikasi('Pilih salah satu fasilitas !');</script>";
			}elseif(count($_FILES['gambar']['name']) < 4 && $_GET['req'] != 'editkmr'){
				echo "<script>notifikasi('Masukkan minimal 4 gambar !');</script>";
			}else{
				if($_GET['req']=='tambahkmr'){
					$id_kamar = 'KMR'. sprintf("%03s", $noUrut);
					$konek->query("INSERT INTO kamar(id_kamar,id_kos,jumlah,luas,deskripsi) VALUES ('$id_kamar','$id_kos','$jumlah','$luas','$deskripsi')") or die($konek->error);
					$konek->query("INSERT INTO harga (id_kamar,harian,mingguan,bulanan,tahunan) VALUES ('$id_kamar','$hrg_hari','$hrg_minggu','$hrg_bulan','$hrg_tahun')") or die($konek->error);
					foreach ($_POST['fasilitas'] as $v) {
						$konek->query("INSERT INTO fasilitas_kamar (id_kamar,id_fas) VALUES ('$id_kamar','".$konek->real_escape_string($v)."')") or die($konek->error);
					}
					echo "<script>$('.notif').text('Data kamar berhasil disimpan, Silahkan Tunggu..').show();setTimeout(function(){window.location='index.php?req=datakamar';},3000);</script>";

				}else{
					$konek->query("UPDATE kamar SET id_kos='$id_kos', jumlah='$jumlah', luas='$luas', deskripsi='$deskripsi' WHERE id_kamar='$id_kamar'") or die($konek->error);
					$konek->query("UPDATE harga SET harian='$hrg_hari', mingguan='$hrg_minggu', bulanan='$hrg_bulan', tahunan='$hrg_tahun' WHERE id_kamar='$id_kamar'");
					$konek->query("DELETE FROM fasilitas_kamar WHERE id_kamar='$id_kamar'");
					foreach ($_POST['fasilitas'] as $v) {
						$konek->query("INSERT INTO fasilitas_kamar (id_kamar,id_fas) VALUES ('$id_kamar','".$konek->real_escape_string($v)."')") or die($konek->error);
					}
					echo "<script>$('.notif').text('Data kamar berhasil diubah, Silahkan Tunggu..').show();setTimeout(function(){window.location='index.php?req=datakamar';},3000);</script>";
				}
				if(count($_FILES['gambar']['name']) > 1){
					$q=$konek->query("SELECT nama_gmb FROM gambar_kamar WHERE id_kamar='$id_kamar'");
					while($r=$q->fetch_object()){
						unlink("../gambar/".$r->nama_gmb);
					}
					$konek->query("DELETE FROM gambar_kamar WHERE id_kamar='$id_kamar'");
					$img_count = count($_FILES['gambar']['name']);
					for($i=0;$i<$img_count;$i++){
						$img_name = time().$_FILES['gambar']['name'][$i];
						$img_tmp = $_FILES['gambar']['tmp_name'][$i];
						move_uploaded_file($img_tmp, '../gambar/'.$img_name);
						$konek->query("INSERT INTO gambar_kamar (id_kamar,nama_gmb) VALUES ('$id_kamar','$img_name')") or die($konek->error);
					}

				}
			}
		}

	?>
</div>
<script>
	if($('input[type=checkbox]').is(":checked")){
		$('input[type=checkbox]:checked').parents('.fasilitas-box').css({'background-color':'#4db3dd'});
	}
	$('#col_hidden').show(); 
	$('.fasilitas-box').on('click',function(){
		var check = $(this).find('input[type=checkbox]');
		if(check.is(':checked')){
			check.prop('checked', false);
			$(this).css({'background-color':'#fff'});
		}else{
			check.prop('checked', true);
			$(this).css({'background-color':'#4db3dd'});

		}
		
	});
	 $('#kmr_gambar').change(function(e){
	 	$('#kmr_image').html('');
	 	$('#col_hidden').show(); 	
	 	readImage(this,'#kmr_image');
	 });
</script>