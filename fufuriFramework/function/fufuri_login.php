<?php
	include "../../config/connection.php";
	function antiinjection($data){
		$filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
	return $filter_sql;
	}
	$password=antiinjection(md5($_GET['password']));
	$username=antiinjection($_GET['username']);
	$query = mysql_query("select username from fms_sm_user where username='$username' and password='$password'");
	if($r=mysql_fetch_array($query)){
		echo "select username from fms_sm_user where username='$username' and password='$password'";
	}
?>