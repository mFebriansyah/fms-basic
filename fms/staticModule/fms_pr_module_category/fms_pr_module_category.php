<?php
	echo generateTableMaster(
		array(
			"home.php?menu=$_GET[menu]&content=$_GET[content]",
			"home.php?menu=$_GET[menu]&content=$_GET[content]",
			"home.php?menu=$_GET[menu]&content=$_GET[content]"
		),
		array(
			"$_GET[content]",
			array("")
		),
		array(
			array("")
		)
	);
?>
