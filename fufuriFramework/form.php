<?php
	function generateOption(){
		$argsKey = array("from", "value", "view", "select", "lang", "null", "where");
		$_fufuriGetArgs = func_get_args();
		$var = getArgument($argsKey, $_fufuriGetArgs);
		$query = query($var['from'], "", $var['where'], $var['view'], "asc");
		if($var['lang']==""){
			$var['lang'] = "id_".$var['from'];
		}
		if($var['null']==""){
			echo '<option value="">---&nbsp;&nbsp;</option>';
		}
		while($r = fetch($query)){
			$selected = "";
			if($r[$var['value']]==$var['select']){
				$selected = "selected";
			}
			echo'
				<option value="'.$r[$var['value']].'" '.$selected.' lang="'.$r[$var['lang']].'">'.$r[$var['view']].'&nbsp;&nbsp;</option>
			';
		}
	}
	function generateRadio(){
		$argsKey = array("name", "from", "value", "view", "select", "lang", "null", "where");
		$_fufuriGetArgs = func_get_args();
		$var = getArgument($argsKey, $_fufuriGetArgs);
		$query = query($var['from'], "", $var['where'], $var['view'], "asc");
		if($var['lang']==""){
			$var['lang'] = "id_".$var['from'];
		}
		while($r = fetch($query)){
			$selected = "";
			if($r[$var['value']]==$var['select']){
				$selected = "checked='checked'";
			}
			echo'
				<div class="radio">
					<label>
						<input name="'.$var['name'].'" type="radio" value="'.$r[$var['value']].'" '.$selected.' lang="'.$r[$var['lang']].'">'.$r[$var['view']].'
					</label>
				</div>
			';
		}
	}
	function generateCheck(){
		$argsKey = array("name", "from", "value", "view", "select", "lang", "null", "where");
		$_fufuriGetArgs = func_get_args();
		$var = getArgument($argsKey, $_fufuriGetArgs);
		$query = query($var['from'], "", $var['where'], $var['view'], "asc");
		if($var['lang']==""){
			$var['lang'] = "id_".$var['from'];
		}
		$var['select'] = explode(";", $var['select']);
		if(!is_array($var['select'])){
			$var['select'] = array("select");
		}
		while($r = fetch($query)){
			$selected = "";
			if(in_array($r[$var['value']],$var['select'])){
				$selected = "checked='checked'";
			}
			echo'
				<div class="checkbox">
					<label>
						<input name="'.$var['name'].'[]" type="checkbox" value="'.$r[$var['value']].'" '.$selected.' lang="'.$r[$var['lang']].'">'.$r[$var['view']].'
					</label>
				</div>
			';
		}
	}
	function generateText(){
		$argsKey = array("name", "id", "value", "placeHolder", "class", "style", "lang");
		$_fufuriGetArgs = func_get_args();
		$var = getArgument($argsKey, $_fufuriGetArgs);
		echo'
			<input 
				type="text" 
				name="'.$var["name"].'"
				class="'.$var["class"].'" 
				value="'.$var["value"].'"
				id="'.$var["id"].'"
				style="'.$var["style"].'"
				lang="'.$var["lang"].'"
				placeholder="'.$var["placeHolder"].'"
				autocomplete="off"
			>
        ';
	}
	function generateTextArea(){
		$argsKey = array("name", "id", "value", "placeHolder", "class", "style", "lang");
		$_fufuriGetArgs = func_get_args();
		$var = getArgument($argsKey, $_fufuriGetArgs);
		echo'
			<textarea 
				type="text" 
				name="'.$var["name"].'"
				class="'.$var["class"].'" 
				id="'.$var["id"].'"
				style="'.$var["style"].'"
				lang="'.$var["lang"].'"
				placeholder="'.$var["placeHolder"].'"
				autocomplete="off"
			>'.$var["value"].'</textarea>
        ';
	}
	function gText(){
		$argsKey = array("name", "id", "value", "placeHolder", "class", "style", "lang");
		$_fufuriGetArgs = func_get_args();
		$var = getArgument($argsKey, $_fufuriGetArgs);
		$form = '<input type="text" name="'.$var["name"].'" class="'.$var["class"].'" value="'.$var["value"].'" id="'.$var["id"].'" style="'.$var["style"].'" lang="'.$var["lang"].'" placeholder="'.$var["placeHolder"].'" autocomplete="off" >';
		return $form;
	}
	
	function UploadFile2($fupload_name,$tempName, $location){
    	$vdir_upload = "../../../uploaded/$location/";
		if(!is_dir($vdir_upload)){
			createFolder($vdir_upload);
		}
   		$vfile_upload = $vdir_upload.$fupload_name;
		move_uploaded_file($tempName, $vfile_upload);
	}
	function UploadImage2($fupload_name,$tempName, $location, $fileType){
		$vdir_upload = "../../../uploaded/$location/";
		if(!is_dir($vdir_upload)){
			createFolder($vdir_upload);
		}
		$vfile_upload = $vdir_upload.$fupload_name;
		move_uploaded_file($tempName, $vfile_upload);
		if($fileType == "image/pjpeg" || $fileType == "image/jpeg"){
			$im_src = imagecreatefromjpeg($vfile_upload);
		}elseif($fileType == "image/x-png" || $fileType == "image/png"){
			$im_src = imagecreatefrompng($vfile_upload);
		}elseif($fileType == "image/gif"){
			$im_src = imagecreatefromgif($vfile_upload);
		}
		$src_width = imageSX($im_src);
		$src_height = imageSY($im_src);
		$dst_width = 110;
		$dst_height = ($dst_width/$src_width)*$src_height;
		$im = imagecreatetruecolor($dst_width,$dst_height);
		imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);
		if($fileType == "image/pjpeg" || $fileType == "image/jpeg"){	
			imagejpeg($im,$vdir_upload."small_".$fupload_name);
		}elseif($fileType == "image/x-png" || $fileType == "image/png"){	
			imagepng($im,$vdir_upload."small_".$fupload_name);
		}elseif($fileType == "image/gif"){
			imagegif($im,$vdir_upload."small_".$fupload_name);
		}
		$dst_width2 = 360;
		$dst_height2 = ($dst_width2/$src_width)*$src_height;
		$im2 = imagecreatetruecolor($dst_width2,$dst_height2);
		imagecopyresampled($im2, $im_src, 0, 0, 0, 0, $dst_width2, $dst_height2, $src_width, $src_height);
		if($fileType == "image/pjpeg" || $fileType == "image/jpeg"){	
			imagejpeg($im2,$vdir_upload."medium_".$fupload_name);
		}elseif($fileType == "image/x-png" || $fileType == "image/png"){	
			imagepng($im2,$vdir_upload."medium_".$fupload_name);
		}elseif($fileType == "image/gif"){
			imagegif($im2,$vdir_upload."medium_".$fupload_name);
		}
		imagedestroy($im);
		imagedestroy($im2);
	}
	function uploadAttachment(){
		$argsKey = array("fieldName", "table", "username");
		$_fufuriGetArgs = func_get_args();
		$var = getArgument($argsKey, $_fufuriGetArgs);
		$fieldName = $var["fieldName"];
		$table = $var["table"];
		$username = $var["username"];
		$path = $table;
		if($username!=""){
			$path = $username."/".$table;
		}
		if (isset($_FILES[$fieldName]["type"])) {
			if($_FILES[$fieldName]["type"]!=""){
				$_FILES[$fieldName]["name"];
				$prefixFile = $table."_".rand(0, 99999)."_";
				$file_type = $_FILES[$fieldName]["type"];
				$fileName = $prefixFile.$_FILES[$fieldName]["name"];
				$fileTmpName = $_FILES[$fieldName]["tmp_name"];
				if($file_type == "image/pjpeg" || $file_type == "image/jpeg" || $file_type == "image/x-png" || $file_type == "image/png" || $file_type == "image/gif"){
					UploadImage2($fileName, $fileTmpName, $path, $file_type);
				}else{
					UploadFile2($fileName, $fileTmpName, $path);
				}
				$_POST[$fieldName] = $fileName;
				if(isset($_POST['id'])){
					if($_POST['id']!=""){
						deleteAttachment($fieldName, $table, $username);
					}
				}
			}
		}
	}
	function deleteAttachment(){
		$argsKey = array("fieldName", "table", "path");
		$_fufuriGetArgs = func_get_args();
		$var = getArgument($argsKey, $_fufuriGetArgs);
		$fieldName = $var["fieldName"];
		$table = $var["table"];
		$path = $var["path"];
		if($path!=""){
			$path = $path."/".$table;
		}else{
			$path = $table;
		}
		$id = "0";
		if(isset($_POST['id'])){
			$id = $_POST['id'];
		}elseif(isset($_GET['id'])){
			$id = $_GET['id'];
		}
		$query = query($table, array("img_url"), "id_".$table." = ".$id);
		$r = fetch($query);
		if(file_exists("../../../uploaded/".$path."/".$r[$fieldName])){
			unlink("../../../uploaded/".$path."/small_".$r[$fieldName]);	
			unlink("../../../uploaded/".$path."/medium_".$r[$fieldName]);	
			unlink("../../../uploaded/".$path."/".$r[$fieldName]);	
		}
	}
?>