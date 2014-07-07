<?php
	include "../../../config/connection.php";
	include "../../../fufuriFramework/function.php";
	$table = "";
	$id = $_POST['table_name'];
	for($f=0;$_POST["fieldQuantity"]>$f;$f++){
		$fieldName = '`'.$_POST['fieldName'][$f].'`';
		$fieldType = $_POST['fieldType'][$f];
		$maxLength = "";
		if($fieldType!="date"&&$fieldType!="text"&&$fieldType!="timestamp"&&$fieldType!="year"){
			$maxLength = "(".$_POST['maxLength'][$f].") ";
		}
		$required = $_POST['required'][$f];
		$table = $table.($fieldName." ".$fieldType." ".$maxLength." ".$required.",");
	}
	$query = "
		CREATE TABLE IF NOT EXISTS `$id` (
			`id_$id` int(11) NOT NULL AUTO_INCREMENT,
			$table PRIMARY KEY (`id_$id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";
	//echo $query;
	mysql_query($query);
	insert("fms_sm_module", 
		array(
			"module_name",
			"table_name",
			"id_fms_pr_module_category",
			"id_parent_module"
		),array(
			$_POST["module_name"],
			$_POST["table_name"],
			$_POST["id_fms_pr_module_category"],
			$_POST["id_parent_module"]
		)
	);
	if(!file_exists("../../module/".$_POST["table_name"])){
	$structure = "../../module/".$_POST["table_name"];
	$fileName = $_POST["table_name"].".php";
	$content = '<!--Fufuri Management System-->
<?php
	echo generateTableMaster(
		array(//varTable
			"home.php?menu=$_GET[menu]&content=$_GET[content]",//insertForm
			"home.php?menu=$_GET[menu]&content=$_GET[content]",//updateForm
			"home.php?menu=$_GET[menu]&content=$_GET[content]"//backTo
		),
		array(//varQuery
			"$_GET[content]",//from
			array(""),//from
			"",//whereStatement
			"",//orderBy
			"",//sortBy
			"",//limit
			array("")//select master
		),
		array(//varForm
			array(""),//file
			array(//comboBox
				array(""),//foreignKey
				array(""),//foreignTable
				array(""),//value
				array("")//display
			),
			array(""),//password
			array(""),//wysiwyg
			array(""),//email
			array(//default
				array(""),//default field
				array("")//default value
			),
			array(//check list
				array(""),//foreignKey
				array(""),//foreignTable
				array(""),//value
				array("")//display
			)
		)/*,
		array(//varGrid
			"",//thumbnail
			"",//caption
		)*/
	);
?>';
	createFolder($structure);
	createFile($structure,$fileName,$content);
}
echo "<script>window.location.href='../../home.php?menu=default&content=fms_sm_module&action=master'</script>";
?>