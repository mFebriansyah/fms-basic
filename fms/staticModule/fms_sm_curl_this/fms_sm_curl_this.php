<?php 
	
	$csv = $_POST['csv'];
	$csv = str_replace('\\', "", $csv);
	$name = $_GET['name'];
	$name = str_replace('tc_', "", $name);
	$name = str_replace('_', "-", $name);
	createFile("../csv",$name.".csv", $csv);
?>