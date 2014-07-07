<?php
	$baseUrl = "http://".$_SERVER['SERVER_NAME']."/basic";
	$home = "$baseUrl/home";
	
	$today = date('Y-m-d H:i:s');
	$todayDate = date('Y-m-d');
	
	$server = "localhost";
	$username = "root";
	$password = "";
	$database = "basic";
	mysql_connect($server,$username,$password) or die("Koneksi gagal");
	mysql_select_db($database) or die("Database tidak bisa dibuka");
?>
