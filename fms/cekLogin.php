<?php
	session_start();
	session_destroy();
	session_start();
	include "../config/connection.php";
	function antiinjection($data){
		$filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
	return $filter_sql;
	}
	$password=antiinjection(md5($_POST['password']));
	$username=antiinjection($_POST['username']);
	$query = mysql_query("select * from fms_sm_user where username='$username' and password='$password'");
	if($r=mysql_fetch_array($query)){
		$_SESSION["fufuri_username_admin"]=$r["username"];
		$_SESSION["fufuri_id_admin"]=$r["id_fms_sm_user"];
		//echo $_SESSION["fufuri_username"]." ";
		//$_SESSION["fufuri_email"]=$r["email"];
		//echo $_SESSION["fufuri_email"];
		echo "<script>window.location.href='home.php?content=fms_sm_home';</script>";
	}else{
		echo "<script>window.location.href='index.php?_fufuriCheck';</script>";
	}
?>