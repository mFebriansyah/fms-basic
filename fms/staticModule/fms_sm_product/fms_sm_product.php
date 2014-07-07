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
			array("id_fms_pr_product_category", "product_name", "stock", "has_sold", "image_url")//select master
		),
		array(//varForm
			array("image_url"),//file
			array(//comboBox
				array("id_fms_pr_product_category"),//foreignKey
				array("fms_pr_product_category"),//foreignTable
				array("id_fms_pr_product_category"),//value
				array("product_category_name")//display
			),
			array(""),//password
			array("description"),//wysiwyg
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