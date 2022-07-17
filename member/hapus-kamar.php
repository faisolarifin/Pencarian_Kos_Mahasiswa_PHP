<?php
	$id = @$_GET['id'] ? $konek->real_escape_string($_GET['id']) : @$id_kamar->id_kamar;
	if(@$id)
	{	
		if($konek->query("SELECT kos.id_kos, kos.id_akun, kamar.id_kos FROM kos, kamar WHERE kos.id_kos=kamar.id_kos AND kamar.id_kamar='$id' AND kos.id_akun='".$_SESSION['id']."'")->num_rows > 0){
			del_kamar($id,$konek);
			echo "<script>alert('Kamar berhasil dihapus');setTimeout(function(){window.location='index.php?req=datakamar';},1000);</script>";
		}else{
			echo "<script>alert('Anda tidak dapat menghapus kamar !');setTimeout(function(){window.location='index.php?req=datakamar';},1000);</script>";
		}
	}


?>