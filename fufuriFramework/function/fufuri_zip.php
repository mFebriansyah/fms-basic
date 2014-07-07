<?php 
	$file = "1.txt";
	$destination = "my-archive.zip";
	$overwrite = "true";

		$zip = new ZipArchive;
		$zip->open($destination,$overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true;
		$zip->addFile($file,$file);
		$zip->close();

?>