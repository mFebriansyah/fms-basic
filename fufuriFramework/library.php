<?php
date_default_timezone_set('Asia/Jakarta'); // PHP 6 mengharuskan penyebutan timezone.
function hari($tgl)
{
$unix=strtotime($tgl);
$seminggu = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
$hari = date("w",$unix);
 $harii = $seminggu[$hari];
 
 return $harii;

}
?>
