<?php
	$select = array("id_mf_tc_module","nama_module");
	$from = "mf_tc_module";
	$where = "id_mf_tc_module = 'a'";
	$orderBy = "id_mf_tc_module";
	$sortBy = "ASC";
	$limit = "0 , 30";
	$argsKey = array("from","select");
	
	getArgument($argsKey, func_get_args());
	query($from,$select,$where,$orderBy,$sortBy,$limit);
	
	generateTable($from,$select,$where,$orderBy,$sortBy,$limit);
	getTotalColumn($from,$select);
	
	generateTableMaster(
		array(
			"insertForm",
			"updateForm",
			"backTo"
		),
		array(
			"from",
			"select",
			"whereStatement",
			"orderBy",
			"sortBy", 
			"limit"
		),
		array(
			"file",
			"comboBox"
		)
	);
?>
