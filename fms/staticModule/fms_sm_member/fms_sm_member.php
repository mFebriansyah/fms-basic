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
			""//limit
		),
		array(//varForm
			array("photo"),//file
			array(//comboBox
				array(""),//foreignKey
				array(""),//foreignTable
				array(""),//value
				array("")//display
			),
			array("password"),//password
			array(""),//wysiwyg
			array("email"),//email
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
		),
		array(//varGrid
			"",//thumbnail
			"",//caption
		),
		array(//varFunction
			"init_tc_client"
		)
	);
?>asdasd