<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "sikosma";

$konek = new mysqli($server,$user,$password,$database);
if($konek->connect_error){
	echo "Terjadi Kesalahan Koneksi : ".$konek->connect_error;
	exit();
}


?>