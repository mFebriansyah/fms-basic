<?php
	if (file_exists("../../config/connection.php")){
		include "../../config/connection.php";
	}
	function hello(){}
	function alert($string){}
	function antiinjection($data){
		return $filter_sql;
	}
	function login(){}
	function getCurrentPage(){
		$argsKey = array("var");
		return $currentPage;
	}
	function getArgument($argsKey, $arg_list){
		return $args;
	}
	function query(){
		$argsKey = array("from","select","whereStatement","orderBy","sortBy", "limit", "debug");
		return ($query);
	}
	function getTotalColumn(){
		$argsKey = array("from","select");
		return $totalColumn;
	}
	function getTotalRow(){
		$argsKey = array("from","select","whereStatement","orderBy","sortBy", "limit");
		return $totalRow;
	}
	function generateTable(){
		$argsKey = array("from","select","whereStatement","orderBy","sortBy", "limit");
	}
	function getStaticContent(){
		$argsKey = array("table","field");
		return $r[1];
	}
	function getStaticContent2(){
		$argsKey = array("table","field","row");
		return $r;
	}
	function generateTableMaster(){
		$argsKey = array("varTable","varQuery","varForm","varGrid");
		$var = getArgument($argsKey, $_fufuriGetArgs);
		$argsKey = array("insertForm","updateForm","backTo");
		$varTable = getArgument($argsKey, $var['varTable']);
		$argsKey = array("from","select","whereStatement","orderBy","sortBy", "limit", "selectMaster");
		$varQuery = getArgument($argsKey, $var['varQuery']);
		$argsKey = array("file","comboBox","password","wysiwyg","email","default","checkList");
		$varForm = getArgument($argsKey, $var['varForm']);
	}
	function generateGridView(){
		$argsKey = array("varTable","varQuery","varForm","varGrid");
	}
	function generateUpdateForm(){
		getInitiatedForm();
		$argsKey = array("from","select","whereStatement","backTo","varForm");
	}
	function generateInsertForm(){
		getInitiatedForm();
		$argsKey = array("from","select","backTo","varForm");
	}
	function getFieldForm(){
		$argsKey = array("table","field","whereStatement","varForm");
	}
	function save(){
		$argsKey = array("table", "backTo");
	}
	function saveUpdate(){
		$argsKey = array("table", "backTo");
	}
	function insert(){
		$argsKey = array("table","fieldName","fieldValue");
	}
	function update(){
		$argsKey = array("table","fieldName","fieldValue","id");
	}
	function delete(){
		$argsKey = array("table","fieldValue","backTo");
	}
	function getFieldName(){
		$argsKey = array("table");
		return $fieldName;
	}
	function getSeoName(){
		$argsKey = array("string");
		return $word;
	}
	function ddmmyy(){
		$argsKey = array("yy-mm-dd");
			return $date." ".$month." ".$year;
	}
	//form function
	function generateInputPassword(){
		$argsKey = array("name","id","class","type","value");
	}
	function UploadFile($fupload_name,$tempName, $location){}
	function UploadImage($fupload_name,$tempName, $location, $fileType){}
	function createFolder($structure){}
	function createFile($folderPath,$fileName,$content){}
	function deleteFolderAndItsContent($structure){}
	//form function
	if(isset($_GET['fufuriFunction'])){
		if(isset($_GET['fufuriVar'])){
			$var = explode(",",$_GET['fufuriVar']);
			$argsKey = array("var1", "var2", "var3");
			$var = getArgument($argsKey, $var);
		}
		$function = "$_GET[fufuriFunction]";
		echo $function($var['var1'],$var['var2'],$var['var3']);
	}
	//number
	function threeDecimal($int){}
	//user side
	function sendMail(){
		$argsKey = array("table","fieldName","fieldValue");
	}
	function paging(){
		$argsKey = array("varQuery", "varPaging");
		return array($query, $pageButton);
	}
	function generateTestimonial(){
		$argsKey = array("from", "pageLimit", "seo", "select","whereStatement","orderBy","sortBy", "limit");
	}
	function generateCallUs(){
		getInitiatedForm();
		$argsKey = array("table","name","email","website","subject","message");
	}
	function generateArticle(){
		getInitiatedForm();
		$argsKey = array("paging", "address", "query","comment");
	}
	function generateForum (){
		getInitiatedForm();
		$argsKey = array("paging", "address", "query","comment");
	}	
	function generateYoutube (){
		getInitiatedForm();
		$argsKey = array("paging", "address", "query","comment");
	}
	function generateTableText(){
		$argsKey = array("from","select","whereStatement","orderBy","sortBy", "limit");
		return $table;
	}
	function generateJSON(){
		$argsKey = array("from","select","whereStatement","orderBy","sortBy", "limit");
		return $json;
	}
?>