<?php
$id = @$konek->real_escape_string($_GET['id']);
if(@$id){
	$data = $konek->query("SELECT * FROM kategori WHERE id_kat='$id'")->fetch_object();
}

?>
<h1 class="detail">Tambah Fasilitas</h1>
<div class="content-pack">
	<div class="notif"></div>
	<form action="" method="post">
		<table class="profile-table">
			<tr>
				<td width="120px">Nama Kategori</td>
				<td width="5px">:</td>
				<td><input type="text" name="namakat" value="<?= @$data->nama_kat; ?>"></td>
			</tr>
			<tr>
				<td colspan="2">&nbsp;</td>
				<td>
					<input type="submit" name="kategori" class="btn green" value="Simpan">
				</td>
			</tr>
		</table>	
	</form>
</div>
<?php
	if(isset($_POST['kategori'])){
		$nama = $konek->real_escape_string($_POST['namakat']);
		if($_GET['req']=='tambahkat'){
			$qry = $konek->query("INSERT INTO kategori(nama_kat) VALUES('$nama')") or die($konek->error);
			if($qry){
				echo "<script>$('.notif').text('Kategori kos berhasil ditambahkan, Tunggu Sebentar..').show();setTimeout(function(){window.location='index.php?req=ctkos';},3000);</script>";
			}
		}elseif($_GET['req']=='editkat'){
			$qry = $konek->query("UPDATE kategori SET nama_kat='$nama' WHERE id_kat='$id'") or die($konek->error);
			if($qry){
				echo "<script>$('.notif').text('Kategori kos berhasil diubah, Tunggu Sebentar..').show();setTimeout(function(){window.location='index.php?req=ctkos';},3000);</script>";
			}
		}
		
	}
?>
