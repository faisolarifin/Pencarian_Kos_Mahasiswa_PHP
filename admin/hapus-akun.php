<?php
$req = $konek->real_escape_string($_GET['req']);
$id  = $konek->real_escape_string($_GET['id']);
if($req=='blokir'){
	$qry = $konek->query("UPDATE akun SET status='blokir' WHERE id_akun='$id'") or die ($konek->error);
	if($qry){
			echo "<script>alert('User telah diblokir');window.location='index.php';</script>";
	}
}elseif($req=='hapusakun'){
	$qry = $konek->query("DELETE FROM akun WHERE id_akun='$id'") or die ($konek->error);
	if($qry){
			echo "<script>alert('User berhasil dihapus');window.location='index.php';</script>";
	}
}

?>