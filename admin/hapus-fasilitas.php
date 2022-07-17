<?php
$id = @$konek->real_escape_string($_GET['id']);
if(@$id){
	$qry = $konek->query("DELETE FROM fasilitas WHERE id_fas='$id'") or die ($konek->error);
	if($qry){
				echo "<script>alert('Fasilitas berhasil dihapus');window.location='index.php?req=datafas';</script>";
			}
	}
?>