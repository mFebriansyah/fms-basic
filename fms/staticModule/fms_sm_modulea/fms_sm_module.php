<script>
	function generateField(quantity){
		$('#field').load('/fms/staticModule/fms_sm_module/generatefield.php?fieldQuantity='+quantity);
	}
</script>
<select name="fieldQuantity" onchange="generateField(this.value)">
<?php
	for($f=1;$f<101;$f++){
		echo"<option value=\"$f\">$f&nbsp;&nbsp;</option>";
	}
?>	
</select>
<div id="field"></div>
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
			array("img"),//file
			array(
				array("id_fms_pr_module_category"),//foreignKey
				array("fms_pr_module_category"),//foreignTable
				array("id_fms_pr_module_category"),//value
				array("nama_kategori_module")//display
			),//combobox
			array(""),//password
			array("isi")//wysiwyg
		)
	);
?>