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
				array("id_fe_pr_restaurant_range_category", "id_fms_pr_active_category"),//foreignKey
				array("fe_pr_restaurant_range_category", "fms_pr_active_category"),//foreignTable
				array("id_fe_pr_restaurant_range_category", "id_fms_pr_active_category"),//value
				array("restaurant_range_category_name", "active_category_name")//display
			),
			array(""),//password
			array(""),//wysiwyg
			array(""),//email
			array(//default
				array(""),//default field
				array("")//default value
			),
			array(//check list
				array("id_fe_pr_restaurant_category"),//foreignKey
				array("fe_pr_restaurant_category"),//foreignTable
				array("id_fe_pr_restaurant_category"),//value
				array("restaurant_category_name")//display
			)
		)/*,
		array(//varGrid
			"",//thumbnail
			"",//caption
		)*/
	);
?>