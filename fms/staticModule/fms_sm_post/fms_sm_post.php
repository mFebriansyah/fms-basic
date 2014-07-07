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
			array("image_url"),//file
			array(//comboBox
				array("id_fms_pr_post_category","id_fms_pr_headline_category"),//foreignKey
				array("fms_pr_post_category","fms_pr_headline_category"),//foreignTable
				array("id_fms_pr_post_category","id_fms_pr_headline_category"),//value
				array("post_category_name","headline_category_name")//display
			),
			array(""),//password
			array(""),//wysiwyg
			array(""),//email
			array(//default
				array("username"),//default field
				array("$_SESSION[fufuri_username_admin]")//default value
			),
			array(//check list
				array("id_fms_pr_post_tag"),//foreignKey
				array("fms_pr_post_tag"),//foreignTable
				array("id_fms_pr_post_tag"),//value
				array("post_tag_name")//display
			)
		)/*,
		array(//varGrid
			"",//thumbnail
			"",//caption
		)*/
	);
?>