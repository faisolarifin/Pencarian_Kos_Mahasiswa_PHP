<?php 
$server = "localhost";
$user = "root";
$pass = "";
$database = "sikosma";
$konek = new mysqli($server,$user,$pass,$database);

if(!$konek){
	echo "Koneksi Gagal ".$konek->error($konek);
}
?>