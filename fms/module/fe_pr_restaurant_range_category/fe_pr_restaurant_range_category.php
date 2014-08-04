<!--Fufuri Management System-->
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
				array("id_fms_pr_active_category"),//foreignKey
				array("fms_pr_active_category"),//foreignTable
				array("id_fms_pr_active_category"),//value
				array("active_category_name")//display
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
?>