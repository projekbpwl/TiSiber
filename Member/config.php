<?php
$server ="localhost";
$user = "root";
$password = "";
$nama_database = "perpustakaan_online";
$db = mysqli_connect("$server", "$user", "$password", "$nama_database");
if (!$db) {
	die("Gagal Terhubung dengan database: ".mysqli_connect_error());
}
?>