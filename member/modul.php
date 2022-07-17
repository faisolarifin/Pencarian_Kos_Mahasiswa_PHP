<?php
function del_kamar($id,$konek){
	$q = $konek->query("SELECT nama_gmb FROM gambar_kamar WHERE id_kamar='$id'");
	while($r=$q->fetch_object()){
		unlink('../gambar/'.$r->nama_gmb);
	}
	$konek->query("DELETE FROM fasilitas_kamar WHERE id_kamar='$id'") or die($konek->error);
	$konek->query("DELETE FROM gambar_kamar WHERE id_kamar='$id'") or die($konek->error);
	$konek->query("DELETE FROM harga WHERE id_kamar='$id'") or die($konek->error);
	$konek->query("DELETE FROM kamar WHERE id_kamar='$id'") or die($konek->error);
}

?>