<?php
	$id = $konek->real_escape_string($_GET['id']);
	if(@$id){
		if($konek->query("SELECT * FROM kos WHERE id_kos='$id'")->num_rows > 0){
			$result = $konek->query("SELECT id_kamar FROM kamar WHERE id_kos='$id'");
			while($row=$result->fetch_object()){
				del_kamar($row->id_kamar,$konek);
			}
			$q = $konek->query("SELECT nama_gambar FROM gambar_kos WHERE id_kos='$id'");
			while($r=$q->fetch_object()){
				unlink('../gambar/'.$r->nama_gambar);
			}
			$konek->query("DELETE FROM gambar_kos WHERE id_kos='$id'") or die($konek->error);
			$konek->query("DELETE FROM kos WHERE id_kos='$id'") or die($konek->error);
			echo "<script>alert('Kos berhasil dihapus');setTimeout(function(){window.location='index.php?req=datakost';},1000);</script>";
		}else{
			echo "<script>alert('Anda tidak dapat menghapus kos!');setTimeout(function(){window.location='index.php?req=datakost';},1000);</script>";
		}
	}
?>