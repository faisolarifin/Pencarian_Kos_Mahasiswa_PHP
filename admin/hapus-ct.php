<?php
$id = @$konek->real_escape_string($_GET['id']);
if(@$id){
	$qry = $konek->query("DELETE FROM kategori WHERE id_kat='$id'") or die ($konek->error);
	if($qry){
				echo "<script>alert('Kategori kos berhasil dihapus');window.location='index.php?req=ctkos';</script>";
			}
	}
?>