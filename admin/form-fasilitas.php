<?php
$id = @$konek->real_escape_string($_GET['id']);
if(@$id){
	$data = $konek->query("SELECT * FROM fasilitas WHERE id_fas='$id'")->fetch_object();
}

?>
<h1 class="detail">Tambah Fasilitas</h1>
<div class="content-pack">
	<div class="notif"></div>
	<form action="" method="post">
		<table class="profile-table">
			<tr>
				<td width="120px">Nama Fasilitas</td>
				<td width="5px">:</td>
				<td><input type="text" name="namafas" value="<?= @$data->nama_fas; ?>"></td>
			</tr>
<!-- 			<tr>
				<td width="120px">Icon Awesome</td>
				<td width="5px">:</td>
				<td><input type="text" name="awesome" value="<?= $data->awesome; ?>"></td>
			</tr> -->
			<tr>
				<td colspan="2">&nbsp;</td>
				<td>
					<input type="submit" name="fasilitas" class="btn green" value="Simpan">
				</td>
			</tr>
		</table>	
	</form>
</div>
<?php
	if(isset($_POST['fasilitas'])){
		$nama = $konek->real_escape_string($_POST['namafas']);
		$icon = @$konek->real_escape_string($_POST['awesome']);
		if($_GET['req']=='tambahfas'){
			$qry = $konek->query("INSERT INTO fasilitas(nama_fas,awesome) VALUES('$nama','$icon')") or die($konek->error);
			if($qry){
				echo "<script>$('.notif').text('Fasilitas berhasil ditambahkan, Tunggu Sebentar..').show();setTimeout(function(){window.location='index.php?req=datafas';},3000);</script>";
			}
		}elseif($_GET['req']=='editfas'){
			$qry = $konek->query("UPDATE fasilitas SET nama_fas='$nama', awesome='$icon' WHERE id_fas='$id'") or die($konek->error);
			if($qry){
				echo "<script>$('.notif').text('Fasilitas berhasil diubah, Tunggu Sebentar..').show();setTimeout(function(){window.location='index.php?req=datafas';},3000);</script>";
			}
		}
		
	}
?>
