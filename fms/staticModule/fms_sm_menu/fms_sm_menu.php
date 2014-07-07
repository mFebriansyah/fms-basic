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
			array("icon_url"),//file
			array(//comboBox
				array("id_menu_parent", "id_menu_category"),//foreignKey
				array("fms_sm_menu", "fms_pr_menu_category"),//foreignTable
				array("id_fms_sm_menu", "id_fms_pr_menu_category"),//value
				array("menu_name", "menu_category_name")//display
			),
			array(""),//password
			array(""),//wysiwyg
			array(""),//email
			array(//default
				array(""),//default field
				array("")//default value
			)
		)/*,
		array(//varGrid
			"",//thumbnail
			"",//caption
		)*/
	);
?>