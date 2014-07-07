<?php
	if (file_exists("../../config/connection.php")){
		include "../../config/connection.php";
	}
	//if (session_status() === PHP_SESSION_NONE){session_start();}
	function hello(){
		echo "<script>alert('hello')</script>";
	}
	function alert($string){
		echo "<script>alert('$string')</script>";
	}
	function antiinjection($data){
		$filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
		return $filter_sql;
	}
	function login(){
		$password=antiinjection(md5($_GET['password']));
		$username=antiinjection($_GET['username']);
		$query = mysql_query("select username from fms_sm_user where username='$username' and password='$password'");
		if($r=mysql_fetch_array($query)){
			echo "select username from fms_sm_user where username='$username' and password='$password'";
		}
	}
	function getCurrentPage(){
		$argsKey = array("var");
		$_fufuriGetArgs = func_get_args();
		$var = getArgument($argsKey, $_fufuriGetArgs);
		$url = $_SERVER['REQUEST_URI'];
		$url = explode('/', $url);
		$url = $url[sizeof($url)-1];
		$currentPage = $url;
		if($var['var']!=""){	
			$lastChar = $url[strlen($url)-1];
			$_3LastChar = substr($url, strlen($url)-3, 3);
			if($_3LastChar=="tml" || $_3LastChar=="htm" || $_3LastChar=="php"){
				$lastChar="?";
			}elseif($lastChar!="?"){
				$lastChar="&";
			}
			$currentPage = $url.$lastChar.$var['var'].$lastChar.$var['var'].$lastChar.$var['var'];
			$currentPage = str_ireplace($lastChar.$var['var'],"",$currentPage);
			$currentPage = $currentPage.$lastChar.$var['var'];
		}
		return $currentPage;
	}
	function getArgument($argsKey, $arg_list){
		$argsKey = $argsKey;
		$argsValue = array();
		$numargs = func_num_args()-1;
		for ($i = 0; $i < count($argsKey); $i++){
			if(count($arg_list)>$i){
        		$value = $arg_list[$i];
			}else{
				$value = "";
			}
			array_push($argsValue, $value);
   		}
		$args = array_combine($argsKey, $argsValue);
		return $args;
	}
	function query(){
		$argsKey = array("from","select","whereStatement","orderBy","sortBy", "limit", "debug");
		$_fufuriGetArgs = func_get_args();
		$var = getArgument($argsKey, $_fufuriGetArgs);
		$prefixFrom = "";
		$from = $var['from'];
		if(is_array($var['from'])){
			$prefixFrom = "`f_0`.`id_".$var['from'][0]."`";
			$from = $var['from'][0];
		}
		$query = "SELECT";
		if($var['select']!=""&&$var['select'][0]!=""&&is_array($var['select'])){
			$select = " `id_".$from."`, `".implode("`, `", $var['select'])."`";
			if(is_array($var['from'])){
				$select = str_ireplace(".", "`.`", $select);
			}
			$query .= $select;
		}elseif($var['select']!="" && !is_array($var['select'])){
			$query .= " $prefixFrom, `".$var['select']."`";
		}else{
			$query .= " * ";
		}
		if($var['from']!=""){
			$query .= " FROM ";
			if(is_array($var['from'])){
				$iArray = 0;
				foreach($var['from'] as &$value){
					$value = "`$value` `f_$iArray`";
					$iArray++;
				}
				$query .= implode(", ", $var['from']);
			}else{
				$query .= "`".$var['from']."`";
			}
		}
		if($var['whereStatement']!=""){
			$query .= " WHERE ".$var["whereStatement"];
		}
		if($var['orderBy']!=""){
			$query .=  " ORDER BY ".$var['orderBy'];
		}elseif(is_array($var['from'])){
			$query .=  " ORDER BY $prefixFrom";
		}else{
			$query .=  " ORDER BY id_".$var['from'];
		}
		if($var['sortBy']!=""){
			$query .= " ".$var['sortBy'];
		}else{
			$query .=  " DESC";
		}
		if($var['limit']!=""){
			$query .= " LIMIT ".$var['limit'];
		}
		if($var['debug']=="y"){	
			echo $query;
		}
		//echo "$query";
		$sql = mysql_query($query);
		if(mysql_error()){
			echo mysql_error;
			echo "<div><strong>".$query."</strong></div>";
		}; 
		return ($sql);
	}
	function myQuery($string){
		return mysql_query($string);
	}
	function fetch($string){
		return mysql_fetch_array($string);
	}
	function decode($string){
		return html_entity_decode ($string);
	}
	function oneLine($string){
		return str_ireplace(PHP_EOL, "", ($string));
	}
	function getSumColumn(){
		$argsKey = array("from","select","whereStatement","orderBy","sortBy", "limit", "debug");
		$_fufuriGetArgs = func_get_args();
		$var = getArgument($argsKey, $_fufuriGetArgs);
		$select = implode(")+sum(", $var['select']);
		$select = "sum(".$select.")";
		$r = fetch(myQuery("SELECT ".$select." FROM `".$var['from']."` WHERE ".$var['whereStatement']));
		return $r[0];
	}
	function getTotalColumn(){
		$argsKey = array("from","select","whereStatement","orderBy","sortBy", "limit", "debug");
		$_fufuriGetArgs = func_get_args();
		$var = getArgument($argsKey, $_fufuriGetArgs);
		$query = query($var['from'], $var['select'], $var['whereStatement'], $var['orderBy'], $var['sortBy'], $var['limit'], $var['debug']);
		$totalColumn = mysql_num_fields($query); 
		return $totalColumn;
	}
	function getTotalRow(){
		$argsKey = array("from","select","whereStatement","orderBy","sortBy", "limit", "debug");
		$_fufuriGetArgs = func_get_args();
		$var = getArgument($argsKey, $_fufuriGetArgs);
		$query = query($var['from'], $var['select'], $var['whereStatement'], $var['orderBy'], $var['sortBy'], $var['limit'], $var['debug']);
		$totalRow = mysql_num_rows($query); 
		return $totalRow;
	}
	function generateTable(){
		$argsKey = array("from","select","whereStatement","orderBy","sortBy", "limit", "debug");
		$_fufuriGetArgs = func_get_args();
		$var = getArgument($argsKey, $_fufuriGetArgs);
		$query = query($var['from'], $var['select'], $var['whereStatement'], $var['orderBy'], $var['sortBy'], $var['limit'], $var['debug']);
		echo"<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" class=\"display\" id=\"example\"><thead><tr>";
		$iField=0;
		$totalColumn = getTotalColumn($var['from'], $var['select'], $var['whereStatement'], $var['orderBy'], $var['sortBy'], $var['limit'], $var['debug']);
		alert($totalColumn);
		/*while(getTotalColumn($var['from'],$var['select'])>$iField){
			echo "<th>".mysql_field_name($query, $iField)."</th>";
			$iField++;
		}
		echo "<th>Aksi</th>";
		echo"</tr></thead><tbody>";
		while($r=mysql_fetch_array($query)){
			echo "<tr>";
			$iField=0;
			while(getTotalColumn($var['from'],$var['select'])>$iField){
				echo "<td>$r[$iField]</td>";
				$iField++;
			}
			echo "
					<td>
						<a href=\"#\" title=\"hapus\">Hapus</a>
						<a href=\"#\" title=\"edit\">Edit</a>
					</td>
				</tr>
			";
		}
		echo"</tbody></table>";*/
		
	}
	function getStaticContent(){
		$argsKey = array("table","field");
		$_fufuriGetArgs = func_get_args();
		$var = getArgument($argsKey, $_fufuriGetArgs);
		$query = query($var['table'],$var['field']);
		$r=mysql_fetch_array($query);
		return $r[1];
	}
	function getStaticContentWhere(){
		$argsKey = array("from","select","whereStatement","orderBy","sortBy", "limit", "debug");
		$_fufuriGetArgs = func_get_args();
		$var = getArgument($argsKey, $_fufuriGetArgs);
		$query = query($var['from'],array($var['select']),$var['whereStatement'],$var['orderBy'],$var['sortBy'],$var['limit'],$var['debug']);
		$r=mysql_fetch_array($query);
		return $r[1];
	}
	function getStaticContent2(){
		$argsKey = array("table","field","row");
		$_fufuriGetArgs = func_get_args();
		$var = getArgument($argsKey, $_fufuriGetArgs);
		if($var['row']!=""){
			$row = $var['row'].", 1";
		}else{
			$row = "";
		}
		$query = query($var['table'],($var['field']),"","id_".$var['table'],"ASC",$row);
		$r=mysql_fetch_array($query);
		return $r;
	}
	function generateTableMaster(){
		$argsKey = array("varTable","varQuery","varForm","varGrid","varFunction");
		$_fufuriGetArgs = func_get_args();
		$var = getArgument($argsKey, $_fufuriGetArgs);
		$argsKey = array("insertForm","updateForm","backTo");
		$varTable = getArgument($argsKey, $var['varTable']);
		$argsKey = array("from","select","whereStatement","orderBy","sortBy", "limit", "selectMaster", "debug");
		$varQuery = getArgument($argsKey, $var['varQuery']);
		$argsKey = array("file","comboBox","password","wysiwyg","email","default","checkList");
		$varForm = getArgument($argsKey, $var['varForm']);
		if(is_array($var['varGrid'])){
			$argsKey = array("thumbnail","caption");
			$varGrid = getArgument($argsKey, $var['varGrid']);
		}
		if(is_array($var['varFunction'])){
			$argsKey = array("functionName");
			$varFunction = getArgument($argsKey, $var['varFunction']);
		}else{
			$varFunction["functionName"] = "";
		}
		$formFile = $varForm['file'];
		if(!is_array($formFile)){
			$formFile = array();
		}
		$formCombo = $varForm['comboBox'];
		if(!is_array($formCombo)){
			$formCombo = array();
		}else{
			$formCombo = $varForm['comboBox'][0];
			$formComboforeignTable = $varForm['comboBox'][1];
			$formComboValue = $varForm['comboBox'][2];
			$formComboDisplay = $varForm['comboBox'][3];
		}
		$formCheckList = $varForm['checkList'];
		if(!is_array($formCheckList)){
			$formCheckList = array();
		}else{
			$formCheckList = $varForm['checkList'][0];
			$formCheckListforeignTable = $varForm['checkList'][1];
			$formCheckListValue = $varForm['checkList'][2];
			$formCheckListDisplay = $varForm['checkList'][3];
		}
		$formPassword = $varForm['password'];
		if(!is_array($formPassword)){
			$formPassword = array();

		}
		$formWysiwyg = $varForm['wysiwyg'];
		if(!is_array($formWysiwyg)){
			$formWysiwyg = array();
		}else{
			getInitiatedWYSIWYG();	
		}
		$select = $varQuery['select'];
		if(is_array($varQuery['selectMaster'])){
			$select = $varQuery['selectMaster'];
		}
		$query = query($varQuery['from'],$select,$varQuery['whereStatement'],$varQuery['orderBy'],$varQuery['sortBy'],$varQuery['limit']);
		if(isset($_GET['fufuriForm'])){
			$select = $varQuery['select'];
			if($_GET['fufuriForm']=="generateUpdateForm"){
				generateUpdateForm($varQuery['from'], $select, "id_$varQuery[from] = '$_GET[id]'", $varQuery['orderBy'],$varQuery['sortBy'],$varQuery['limit'], $varQuery['debug'], $varTable['backTo'],$var['varForm']);
			}elseif($_GET['fufuriForm']=="generateInsertForm"){
				generateInsertForm($varQuery['from'], $select, $varQuery['whereStatement'], $varQuery['orderBy'],$varQuery['sortBy'],$varQuery['limit'], $varQuery['debug'], $varTable['backTo'],$var['varForm'], $varFunction["functionName"]);
			}elseif($_GET['fufuriForm']=="generateGridView"){
				generateGridView($_fufuriGetArgs[0], $_fufuriGetArgs[1], $_fufuriGetArgs[2], $_fufuriGetArgs[3]);
			}
		}else{
			getInitiatedDataTables();
			echo"
				<div id=\"masterTable\">
				<a id=\"insertButton\" class=\"awesome green\" href=\"".$varTable['insertForm']."&fufuriForm=generateInsertForm\" />Insert New Record</a>&nbsp;&nbsp;
			";
			if(isset($varGrid['thumbnail'])){
				echo"
				<a class=\"awesome green\" href=\"".$varTable['insertForm']."&fufuriForm=generateGridView\"/>Grid View</a>
				";
			}
			echo'
				<br/><br/>
				<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
				<thead>
					<tr>
			';
			$iField=0;
			$maxField=5;
			$totalColumn = getTotalColumn($varQuery['from'], $select, $varQuery['whereStatement'], $varQuery['orderBy'], $varQuery['sortBy'], $varQuery['limit'], $varQuery['debug']);
			while($totalColumn>$iField && $maxField>$iField){
				if(in_array(mysql_field_name($query, $iField), $formPassword)){
				}else{
					echo "<th>".ucwords(getSeoName(mysql_field_name($query, $iField)))."</th>";
				}
				$iField++;
			}
			echo"<th>Action</th>";
			echo"</tr></thead><tbody>";
			while($r=mysql_fetch_array($query)){
				echo "<tr id=\"tr\">";
				$iField = 0;
				$file = "";
				$file = array();
				while($totalColumn>$iField && $maxField>$iField){
					$fieldName = mysql_field_name($query, $iField);
					$content = str_ireplace($varQuery['from']."_","",$r[$iField]);
					$maxlen = 20;
					$type = mysql_field_type($query, $iField);
					$flags = explode(' ', mysql_field_flags($query, $iField));
					if(in_array($fieldName, $formFile)){
						$rel="";
						$class="preview";
						$file[] = "$r[$iField]";
						$id = "../uploaded/".$varQuery['from']."/small_$r[$iField]";
						$title = "thumbnail";
						$ext=substr($content, strlen($content)-4, 4);
						if(strlen($content)>=$maxlen+1){
							$content = substr($content, 0, $maxlen)."...";
						}
						$extPreview = array(".jpg",".jpeg",".png",".gif");
						if(in_array(strtolower($ext), $extPreview)){
							$rel="example_group1";
							$title = "$r[$iField]";
						}else{
							$title = "File Not Found";
							if(file_exists("../uploaded/".$varQuery['from']."/$r[$iField]")){
								$title = "File : $r[$iField]";
							}
						}
						echo "<td><a rel=\"$rel\" href=\"../uploaded/".$varQuery['from']."/$r[$iField]\" id=\"$id\" class=\"$class\" title=\"$title\">$content</a></td>";
					}elseif(in_array($fieldName, $formCombo)){
						$key = array_search($fieldName, $formCombo);
						$rFormComboValue = $formComboValue[$key];
						$rFormComboDisplay = $formComboDisplay[$key];
						$rForeignTable = $formComboforeignTable[$key];
						$queryForeign = query($rForeignTable,array($rFormComboDisplay),"$rFormComboValue = '$r[$iField]'");
						$rForeign = mysql_fetch_array($queryForeign);
						echo "<td>$rForeign[1]</td>";
					}elseif(in_array($fieldName, $formCheckList)){
						$rValue = explode(";", $r[$iField]);
						$displayValue="";
						$key = array_search($fieldName, $formCheckList);
						$rFormCheckListValue = $formCheckListValue[$key];
						$rFormCheckListDisplay = $formCheckListDisplay[$key];
						$rForeignTable = $formCheckListforeignTable[$key];
						for($i=0;$i<count($rValue);$i++){
							$queryForeign = mysql_fetch_array(query($rForeignTable,array($rFormCheckListDisplay),"id_$rForeignTable = '".$rValue[$i]."'", $rFormCheckListDisplay, "asc"));
							$displayValue .= $queryForeign[$rFormCheckListDisplay]."<br/>";
						}
						$displayValue = rtrim($displayValue, "</br>");
						echo "<td>$displayValue</td>";
					}elseif(in_array($fieldName, $formWysiwyg)){
						$htmlContent = trim(strip_tags(str_ireplace("&nbsp;","",$r[$iField])));
						$content = substr($htmlContent,0,$maxlen);
						echo "<td>$content</td>";
					}elseif(in_array($fieldName, $formPassword)){
					}elseif(($type=="int"||$type=="real") && !in_array("primary_key", $flags)){
						$val = $content;
						if(is_numeric($content) && $content!=""){
							$val = number_format($content);
						}
						echo '<td style="text-align:right">'.$val.'</td>';
					}else{
						if(strlen($content)>=50){
							$content = substr($r[$iField], 0, $maxlen)."...";
						}
						echo "<td>".$content."</td>";
					}
					$iField++;
				}
				$backForFunction = str_replace("?", "fqm", $varTable['backTo']);
				$backForFunction = str_replace("&", "aqm", $varTable['backTo']);
				echo "
						<td style='white-space:nowrap'>
							<a class=\"preview\" onclick=\"return doConfirm(this.id);\" href=\"".getCurrentPage("fufuriVarForm=".(implode(",",$file))."&fufuriFunction=delete&fufuriVar=".$varQuery['from'].",".$r["id_".$varQuery['from']].",".$backForFunction)."\" title=\"Delete This Record\">
								<img src=\"../fufuriFramework/images/glossy_icons/block.png\" alt=\"Delete\" />
							</a>
							<a class=\"preview\" href=\"".$varTable['updateForm']."&fufuriForm=generateUpdateForm&id=".$r["id_".$varQuery['from']]."\" title=\"Edit This Record\">
								<img src=\"../fufuriFramework/images/glossy_icons/refresh.png\" alt=\"Edit\" />
							</a>
						</td>
					</tr>
				";
			}
			echo"</tbody></table></div>";
		}
	}
	function generateGridView(){
		$argsKey = array("varTable","varQuery","varForm","varGrid");
		$_fufuriGetArgs = func_get_args();
		$var = getArgument($argsKey, $_fufuriGetArgs);
		$argsKey = array("from","select","whereStatement","orderBy","sortBy", "limit", "debug");
		$varQuery = getArgument($argsKey, $var['varQuery']);
		$argsKey = array("insertForm","updateForm","backTo");
		$varTable = getArgument($argsKey, $var['varTable']);
		$argsKey = array("file","comboBox","password","wysiwyg","email","default","checkList");
		$varForm = getArgument($argsKey, $var['varForm']);
		$argsKey = array("thumbnail","caption");
		$varGrid = getArgument($argsKey, $var['varGrid']);		
?>
<style>
.polaroid{
	width:110px;	
	border:1px solid #91bd09;
	background:#91bd09;
	padding-bottom:0pxb !important;
	-moz-box-shadow: 0 0px 6px rgba(0,0,0,.25);
	-webkit-box-shadow: 0 0px 6px rgba(0,0,0,.25);
	box-shadow: 0 0px 6px rgba(0,0,0,.25);
	size:10px;
	color:#fff !important;
	text-align:center;
	-moz-transform: rotate(0deg) ;
	-webkit-transform: rotate(0deg) ;
}
.imgContainer{
	height:100px;
	overflow:hidden;
	background:#FFF;
}
.imgContainer img{
	min-height:100%;
	min-width:100%;
}
</style>
<?php
		echo"
			<a class=\"awesome green\" href=\"".$varTable['insertForm']."&fufuriForm=generateInsertForm\" />Insert New Record</a>
			<p>
			<div class=\"polaroidContainer\">
			<ul class=\"sortable\">
		";
		$query = query($varQuery['from']);
		while($r = mysql_fetch_array($query)){
			$degre = rand(-5, 5);
			echo"
				<li class=\"ui-state-default\">
					<table border=\"0\" height=\"120\" width=\"auto\">
					<tr style=\"background:none !important\">
					<td valign=\"top\">
					<div class=\"polaroid\"\">
						<div class=\"imgContainer\"\">
						<a
							rel=\"example_group1\" 
							href=\"../uploaded/".$varQuery['from']."/".$r[$varGrid['thumbnail']]."\" 
							class=\"preview\" 
							title=\"".$r[$varGrid['caption']]."\"
							id=\"../uploaded/".$varQuery['from']."/medium_".$r[$varGrid['thumbnail']]."\" 
						>
							<img 
								alt=\"\" 
								src=\"../uploaded/".$varQuery['from']."/small_".$r[$varGrid['thumbnail']]."\" 
							/>
						</a>
						</div>
						<p><a href=\"#\"><font color=\"#FFFFFF\">".$r[$varGrid['caption']]."</font></a></p>
					</div>
					</td>
					</tr>
					</table>
				</li>
			";
		}
		echo"
			</ul>	
			</div>
		";
	}
	function generateUpdateForm(){
		getInitiatedForm();
		$argsKey = array("from","select","whereStatement","orderBy","sortBy", "limit", "debug", "backTo", "varForm");
		$_fufuriGetArgs = func_get_args();
		$var = getArgument($argsKey, $_fufuriGetArgs);
		$query = query($var['from'],$var['select'],$var['whereStatement']);
		$value = mysql_fetch_array($query);
		$value = $value[0];
		echo'
			<div id="myForm">
				<form class="form-container form-horizontal" role="form" enctype="multipart/form-data" id="insertForm" method="post" action="'.getCurrentPage('fufuriFunction=saveUpdate&fufuriVar='.$var['from'].','.$var['backTo']).'">
					<input value="'.$value.'" type="hidden" name="id_'.$var['from'].'" id="id_'.$var['from'].'"/>
		';
					$iField=1;
					$totalColumn = getTotalColumn($var['from'], $var['select'], $var['whereStatement'], $var['orderBy'], $var['sortBy'], $var['limit'], $var['debug']);
					while($totalColumn>$iField){
						$fieldName = mysql_field_name($query, $iField);
						$fieldType = mysql_field_type($query, $iField);
						$fieldFlags = mysql_field_flags($query, $iField);
						echo'
							<div class="form-group">
								<label class="col-sm-3 control-label" style="text-align:left !important" for="'.$fieldName.'">'.ucwords(getSeoName($fieldName)).'</label>
								<div class="col-sm-9">
									'.getFieldForm($var['from'],$fieldName,$var['whereStatement'],$var['varForm']).'
								</div>
							</div>
						';
						$iField++;
					}
					$varForm = array();
					if(is_array($var['varForm'][0])){
						$varForm = $var['varForm'][0];
					}
					$varFormPassword = array();
					if(isset($var['varForm'][2])){
						if(is_array($var['varForm'][2])){
							$varFormPassword = $var['varForm'][2];
						}
					}
					$varFormCheck = array();
					if(isset($var['varForm'][6])){
						if(is_array($var['varForm'][6])){
							$varFormCheck = $var['varForm'][6][0];
						}
					}
		echo'
					<div class="form-group text-right">
						<input type="hidden" name="fufuriVarForm" value="'.implode(",", $varForm).'" />
						<input type="hidden" name="fufuriVarFormPassword" value="'.implode(",", $varFormPassword).'" />
						<input type="hidden" name="fufuriVarFormCheck" value="'.implode(",", $varFormCheck).'" />
						<input type="hidden" name="fufuriVarBackTo" value="'.$var['backTo'].'" />
						<input class="btn btn-danger" type="button" value="Cancel" class="button" id="button" onclick="window.location.href=\''.$var['backTo'].'\';"/>
						<input class="btn btn-success" type="submit" value="Submit" class="button" id="submit" />
					</div>
				</form>
			</div>
		';
	}
	function generateInsertForm(){
		getInitiatedForm();
		$argsKey = array("from","select","whereStatement","orderBy","sortBy", "limit", "debug", "backTo", "varForm", "functionName");
		$_fufuriGetArgs = func_get_args();
		$var = getArgument($argsKey, $_fufuriGetArgs);
		$query = query($var['from'],$var['select']);
		echo"
			<div id=\"myForm\">
				<form class=\"form-container form-horizontal\" role=\"form\" enctype=\"multipart/form-data\" id=\"insertForm\" method=\"post\" action=\"".getCurrentPage("fufuriFunction=save&fufuriVar=".$var['functionName'].",".$var['from'].",".$var['backTo'])."\">
		";
					$iField=1;
					while(getTotalColumn($var['from'], $var['select'], $var['whereStatement'], $var['orderBy'], $var['sortBy'], $var['limit'], $var['debug'])>$iField){
						$fieldName = mysql_field_name($query, $iField);
						$fieldType = mysql_field_type($query, $iField);
						$fieldFlags = mysql_field_flags($query, $iField);
						echo '
							<div class="form-group">
								<label class="col-sm-3 control-label" style="text-align:left !important" for="'.$fieldName.'">'.ucwords(getSeoName($fieldName)).'</label>
								<div class="col-sm-9">
									'.getFieldForm($var['from'],$fieldName,"",$var['varForm']).'
								</div>
							</div>
						';
						$iField++;
					}
					$varForm = array();
					if(is_array($var['varForm'][0])){
						$varForm = $var['varForm'][0];
					}
					$varFormPassword = array();
					if(isset($var['varForm'][2])){
						if(is_array($var['varForm'][2])){
							$varFormPassword = $var['varForm'][2];
						}
					}
					$varFormCheck = array();
					if(isset($var['varForm'][6])){
						if(is_array($var['varForm'][6])){
							$varFormCheck = $var['varForm'][6][0];
						}
					}
		echo'
					<div class="form-group text-right">
						<input type="hidden" name="fufuriVarForm" value="'.implode(",", $varForm).'" />
						<input type="hidden" name="fufuriVarFormPassword" value="'.implode(",", $varFormPassword).'" />
						<input type="hidden" name="fufuriVarFormCheck" value="'.implode(",", $varFormCheck).'" />
						<input type="hidden" name="fufuriVarBackTo" value="'.$var['backTo'].'" />
						<input class="btn btn-danger" type="button" value="Cancel" class="button" id="button" onclick="window.location.href=\''.$var['backTo'].'\';"/>
						<input class="btn btn-success" type="submit" value="Submit" class="button" id="submit" />
					</div>
				</form>
			</div>
		';
	}
	function getFieldForm(){
		$argsKey = array("table","field","whereStatement","varForm");
		$_fufuriGetArgs = func_get_args();
		$var = getArgument($argsKey, $_fufuriGetArgs);
		$argsKey = array("file","comboBox","password","wysiwyg","email","default","checkList");
		$varForm = getArgument($argsKey, $var['varForm']);
		$formFile = $varForm['file'];
		if(!is_array($formFile)){
			$formFile = array();
		}
		$formDefault = $varForm['default'];
		if(!is_array($formDefault)){
			$formDefault = array();
			$formDefault[0] = array();
			$formDefault[1] = array();
		}
		$formEmail = $varForm['email'];
		if(!is_array($formEmail)){
			$formEmail = array();
		}
		$formPassword = $varForm['password'];
		if(!is_array($formPassword)){
			$formPassword = array();
		}
		$formWysiwyg = $varForm['wysiwyg'];
		if(!is_array($formWysiwyg)){
			$formWysiwyg = array();
		}
		$formCombo = $varForm['comboBox'];
		if(!is_array($formCombo)){
			$formCombo = array();
		}else{
			$formCombo = $varForm['comboBox'][0];
			$formComboforeignTable = $varForm['comboBox'][1];
			$formComboValue = $varForm['comboBox'][2];
			$formComboDisplay = $varForm['comboBox'][3];
		}
		$formCheck = $varForm['checkList'];
		if(!is_array($formCheck)){
			$formCheck = array();
		}else{
			$formCheck = $varForm['checkList'][0];
			$formCheckforeignTable = $varForm['checkList'][1];
			$formCheckValue = $varForm['checkList'][2];
			$formCheckDisplay = $varForm['checkList'][3];
		}
		$query = query($var['table'],array($var['field']),$var['whereStatement']);
		$name = mysql_field_name($query, 1);
		$type = mysql_field_type($query, 1);
		$flags = mysql_field_flags($query, 1);
		$len = mysql_field_len($query, 1);
		$form = "";
		$validate = "";
		$value = "";
		if($flags!="" && $flags!="blob" && $flags!="multiple_key" && $flags!="binary"){
			$validate = "required";
		}
		if($var['whereStatement']!=""){
			$value = mysql_fetch_array($query);
			$value = $value[$name];
		}
		if(in_array($var['field'], $formFile)) {
			$previewImage = "";
			if($value!=""){
				$rel="";
				$class="preview";
				$id = "../uploaded/".$var['table']."/small_$value";
				$title = "thumbnail";
				$rel = "example_group1";
				$previewImage = "
					<a rel=\"$rel\" href=\"../uploaded/".$var['table']."/$value\" id=\"$id\" class=\"$class\" title=\"$title\">
						<img src=\"../fufuriFramework/images/glossy_icons/images.png\" alt=\"Thumb\">
					</a>
				";	
			}
    		$form = '
				<div class="input-group" style="float:left">
					<input name="'.$var['field'].'" value="'.$value.'" class="form-control" type="text"  id="'.$var['field'].'" readonly="readonly" />
					<span class="input-group-btn" style="position:relative">
						<button class="btn btn-success" style="position:absolute; top:0" type="button">Search files</button>
					</span>
				</div>
				<input style="position:absolute; width:350px; top:5px; z-index:3; opacity:0;" type="file" name="file_'.$var['field'].'" class="file_input_hidden" onchange="javascript: document.getElementById(\''.$var['field'].'\').value = this.value" />
				<div style="position:relative;float:right;z-index=999">'.$previewImage.'</div>
				<div style="clear:both"></div>
			';
		}elseif (in_array($var['field'], $formDefault[0])) {
			$key = array_search($var['field'], $formDefault[0]);
			$form = '<input  size="100%" value="'.($formDefault[1][$key]).'" class="validate[maxSize['.$len.']] form-control " type="text" name="'.$var['field'].'" id="'.$var['field'].'" readonly/>';
		}elseif (in_array($var['field'], $formCheck)) {
			$key = array_search($var['field'], $formCheck);
			$formCheckValue = $formCheckValue[$key];
			$formCheckDisplay = $formCheckDisplay[$key];
			$foreignTable = $formCheckforeignTable[$key];
			$query = query($foreignTable, "", "", $formCheckDisplay, "asc");
			$form = "";
			$count_id = 0;
			$arrayValue = explode(";", $value);
			while($r=mysql_fetch_array($query)){
				$selected = "";
				if(in_array($r[$formCheckValue], $arrayValue)){
					$selected = 'checked="checked"';	
				}
				$keyValue = array_search($var['field'], $formCombo);
				$form .= '
					<div class="checkbox">
						<label>
							<input type="checkbox" value="'.$r[$formCheckValue].'" class="validate['.$validate.',maxSize['.$len.']]" name="'.$var['field'].'[]" id="'.$var['field'].$count_id.'" '.$selected.'> '.$r[$formCheckDisplay].'
						</label>
					</div>
				';
				$count_id++;
			}
		}elseif (in_array($var['field'], $formPassword)) {
			$form = "<input size=\"100%\" value=\"\" class=\"validate[maxSize[$len]] form-control \" type=\"password\" name=\"".$var['field']."\" id=\"".$var['field']."\"/ autocomplete=\"off\">";
		}elseif(in_array($var['field'], $formWysiwyg)) {
			$form = "<textarea cols=\"80%\" id=\"wysiwyg\" class=\"validate[$validate,maxSize[$len]] form-control \" name=\"".$var['field']."\" id=\"".$var['field']."\">$value</textarea>";
		}elseif(in_array($var['field'], $formEmail)) {
			$form = "<input size=\"100%\" value=\"$value\" class=\"validate[$validate,custom[email],maxSize[$len]] form-control \" type=\"text\" name=\"".$var['field']."\" id=\"".$var['field']."\"/>";
		}elseif($flags=="not_null multiple_key" || in_array($var['field'], $formCombo)){
			if(in_array($var['field'], $formCombo)){
				$key = array_search($var['field'], $formCombo);
				$formComboValue = $formComboValue[$key];
				$formComboDisplay = $formComboDisplay[$key];
				$foreignTable = $formComboforeignTable[$key];
			}else{
				$formComboValue = "0";
				$formComboDisplay = "1";
				$foreignTable = "mgm_pr_".$var['field'];
			}
			$query = query($foreignTable, "", "", $formComboDisplay, "asc");
			$option = "<option value=\"\">---&nbsp;&nbsp;</option>";
			while($r=mysql_fetch_array($query)){
				$selected = "";
				if($value==$r[$formComboValue]){	
					$selected = "selected=\"selected\"";
				}
				$option .= "<option value=\"$r[$formComboValue]\" $selected>$r[$formComboDisplay]&nbsp;&nbsp;</option>";
			}
			$form = "<select class=\"validate[$validate,maxSize[$len]] form-control \" name=\"".$var['field']."\" id=\"".$var['field']."\">$option</select>";
		}elseif($type=="int"||$type=="real"){
			$form = "<input size=\"100%\" value=\"$value\" class=\"validate[$validate,custom[number],maxSize[$len]] form-control \" type=\"text\" name=\"".$var['field']."\" id=\"".$var['field']."\"/>";
		}elseif($type=="string"){
			$form = "<input size=\"100%\" value=\"$value\" class=\"validate[$validate,maxSize[$len]] form-control \" type=\"text\" name=\"".$var['field']."\" id=\"".$var['field']."\"/>";
		}elseif($type=="blob"){
			$form = "<textarea cols=\"50%\" class=\"validate[$validate,maxSize[$len]] form-control \" type=\"text\" name=\"".$var['field']."\" id=\"".$var['field']."\">$value</textarea>";
		}elseif($type=="date"){
			$form = "<input id=\"".$var['field']."\" value=\"$value\" class=\"datepicker validate[$validate,maxSize[$len]] form-control \" type=\"text\" name=\"".$var['field']."\" />";
		}elseif($type=="year"){
			$gd = getdate();
			$option = "<option value=\"\">----&nbsp;&nbsp;</option>";
			$startYear = $gd['year'];
			$endYear = 1945;
			while ($startYear>=$endYear){
				$selected = "";
				if($value==$startYear){	
					$selected = "selected=\"selected\"";
				}
				$option .= "<option value=\"$startYear\" $selected>$startYear&nbsp;&nbsp;</option>";
				$startYear = $startYear-1;
			}
			$form = "<select class=\"validate[$validate,maxSize[$len]] form-control \" name=\"".$var['field']."\" id=\"".$var['field']."\"/>$option</select>";
		}elseif($type=="timestamp"){
			/*if($value==""){*/
				date_default_timezone_set('asia/jakarta');
				$gd = getdate();
				$value = "$gd[year]-$gd[mon]-$gd[mday] ".date("H:i:s");
				$form = "<input size=\"20\" value=\"$value\" class=\"validate[$validate,maxSize[$len]] form-control \" type=\"text\" name=\"".$var['field']."\" id=\"".$var['field']."\" readonly=\"readonly\"/> Time Zone : ". ucwords(date("e"));
			/*}else{
				$form = "<input size=\"20\" value=\"$value\" class=\"validate[$validate,maxSize[$len]] form-control \" type=\"text\" name=\"".$var['field']."\" id=\"".$value."\" readonly=\"readonly\"/>";
			}*/
		}else{
			$form = "flags: ".$flags." type: ".$type;
		}
		return $form;
	}
	function saveHistory(){
		$argsKey = array("table", "id", "act");
		$_fufuriGetArgs = func_get_args();
		$var = getArgument($argsKey, $_fufuriGetArgs);
		$idUser = 0;
		$idMember = 0;
		$idClient = 0;
		
		if(isset($_SESSION["fufuri_id_admin"])){
			$idUser = $_SESSION["fufuri_id_admin"];
		}
		if(isset($_SESSION["fufuri_id_member"])){
			$idMember = $_SESSION["fufuri_id_member"];
		}
		if(isset($_SESSION["fufuri_id_client"])){
			$idClient = $_SESSION["fufuri_id_client"];
		}
		$fieldName = implode(",", array("id_fms_sm_user", "id_fms_sm_member", "id_fms_sm_client", "id_data", "table_name", "action"));
		$fieldValue = implode("','",array($idUser, $idMember, $idClient,$var['id'], $var['table'], $var['act']));
		$fieldValue = "'".$fieldValue."'";
		//echo"insert into ".$var['table']."($fieldName) values($fieldValue)";
		mysql_query("insert into fms_sm_history ($fieldName) values($fieldValue)");
	}
	function autoSave(){
		$argsKey = array("table", "backTo");
		$_fufuriGetArgs = func_get_args();
		$var = getArgument($argsKey, $_fufuriGetArgs);
		$aFieldName = getFieldName($var['table']);
		$fieldName = array();
		$fieldValue = array();
		for ($i = 0; $i < count($aFieldName); $i++){
			if(isset($_POST[$aFieldName[$i]])){
					$fieldName[] = $aFieldName[$i];
					$fieldValue[] = antiinjection($_POST[$aFieldName[$i]]);
			}
		}
		$fieldName = implode(",",$fieldName);
		$fieldValue = implode("','",$fieldValue);
		$fieldValue = "'".$fieldValue."'";		
		//var_dump("insert into ".$var['table']."($fieldName) values($fieldValue)");exit;
		mysql_query("insert into ".$var['table']."($fieldName) values($fieldValue)");
		$query = query($var['table']);
		$r = fetch($query);
		saveHistory($var['table'], $r[0], "autoSave");
		if($var['backTo']!=""){
			echo "<script>window.location.href='".$var["backTo"]."';</script>";
		}
	}
	function autoUpdate(){
		$argsKey = array("table", "id", "backTo");
		$_fufuriGetArgs = func_get_args();
		$var = getArgument($argsKey, $_fufuriGetArgs);
		$set ="set";
		$where = "id_$var[table] = '".$var['id']."'";
		$aFieldName = getFieldName($var['table']);
		for ($i = 0; $i < count($aFieldName); $i++){
			if(isset($_POST[$aFieldName[$i]])){
				$set .= " `".$aFieldName[$i]."` = '".antiinjection($_POST[$aFieldName[$i]])."', ";
			}
		}
		$set = substr($set, 0, strlen($set)-2);
		mysql_query("update `$var[table]` $set where $where");
		saveHistory($var['table'], $var['id'], "autoUpdate");
	}
	function save(){
		$argsKey = array("functionName", "table", "backTo");
		$_fufuriGetArgs = func_get_args();
		$var = getArgument($argsKey, $_fufuriGetArgs);
		$aFieldName = getFieldName($var['table']);
		$fieldName = array();
		$fieldValue = array();
		$formFile = explode(",",$_POST["fufuriVarForm"]);
		$formPassword = explode(",",$_POST["fufuriVarFormPassword"]);
		$formCheck = explode(",",$_POST["fufuriVarFormCheck"]);
		if($var['functionName']!=""){
			echo $var['functionName']();
		};
		for ($i = 0; $i < count($aFieldName); $i++){
			if(isset($_POST[$aFieldName[$i]])){
				if (in_array($aFieldName[$i], $formPassword)) {
					$fieldName[] = $aFieldName[$i];
					$fieldValue[] = md5($_POST[$aFieldName[$i]]);
				}elseif (in_array($aFieldName[$i], $formCheck)) {
					$fieldName[] = $aFieldName[$i];
					$fieldValue[] = implode(";", $_POST[$aFieldName[$i]]);
				}elseif (in_array($aFieldName[$i], $formFile)) {
					$prefixFile = $var['table']."_".rand(0, 99999)."_";
					$file_type = $_FILES["file_$aFieldName[$i]"]["type"];
					$fileName = $prefixFile.$_FILES["file_$aFieldName[$i]"]["name"];
					$fileTmpName = $_FILES["file_$aFieldName[$i]"]["tmp_name"];
					if($file_type == "image/pjpeg" || $file_type == "image/jpeg" || $file_type == "image/x-png" || $file_type == "image/png" || $file_type == "image/gif"){
						UploadImage($fileName, $fileTmpName, $var['table'], $file_type);
					}else{
						UploadFile($fileName, $fileTmpName, $var['table']);
					}
					$fieldName[] = $aFieldName[$i];
					$fieldValue[] = $fileName;
				}else{
					$fieldName[] = $aFieldName[$i];
					$fieldValue[] = antiinjection($_POST[$aFieldName[$i]]);
				}
			}
		}
		$fieldName = implode(",",$fieldName);
		$fieldValue = implode("','",$fieldValue);
		$fieldValue = "'".$fieldValue."'";		
		mysql_query("insert into ".$var['table']."($fieldName) values($fieldValue)");
		$query = query($var['table']);
		$r = fetch($query);
		saveHistory($var['table'], $r[0], "save");
		if($var['table']=="fms_sm_module"){
			if(!file_exists("module/".$_POST["table_name"])){
				$structure = "module/".$_POST["table_name"];
				$fileName = $_POST["table_name"].".php";
				$content = '<!--Fufuri Management System-->
<?php
	echo generateTableMaster(
		array(//varTable
			"home.php?content=$_GET[content]",//insertForm
			"home.php?content=$_GET[content]",//updateForm
			"home.php?content=$_GET[content]"//backTo
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
			)
		)/*,
		array(//varGrid
			"",//thumbnail
			"",//caption
		),
		array(//varFunction
			""//functionName
		)*/
	);
?>';
				mysql_query('
					CREATE TABLE IF NOT EXISTS `'.$_POST["table_name"].'` (
					  `id_'.$_POST["table_name"].'` int(11) NOT NULL AUTO_INCREMENT,
					  `varchar_test` varchar(50) NOT NULL,
					  `integer_test` int(11) NOT NULL,
					  `date_test` date NOT NULL,
					  `timestamp_test` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
					  `year_test` year(4) NOT NULL,
					  `text_test` text NOT NULL,
					  PRIMARY KEY (`id_'.$_POST["table_name"].'`)
					) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
				');
				createFolder($structure);
				createFile($structure,$fileName,$content);
			}
		}
		echo "<script>window.location.href='".$_POST["fufuriVarBackTo"]."';</script>";
	}
	function saveUpdate(){
		$argsKey = array("table", "backTo");
		$_fufuriGetArgs = func_get_args();
		$var = getArgument($argsKey, $_fufuriGetArgs);
		$aFieldName = getFieldName($var['table']);
		$set="";
		$formFile = explode(",",$_POST["fufuriVarForm"]);
		$formPassword = explode(",",$_POST["fufuriVarFormPassword"]);
		$formCheck = explode(",",$_POST["fufuriVarFormCheck"]);
		$where = "id_$var[table] = '".$_POST["id_".$var['table']]."'";
		for ($i = 0; $i < count($aFieldName); $i++){
			if(isset($_POST[$aFieldName[$i]])){
				if (in_array($aFieldName[$i], $formPassword)) {
					if($_POST[$aFieldName[$i]]!=""){
						$set .= $aFieldName[$i]." = '".md5($_POST[$aFieldName[$i]])."', ";
					}
				}elseif (in_array($aFieldName[$i], $formCheck)) {
					$fieldValue = implode(";", $_POST[$aFieldName[$i]]);
					$set .= $aFieldName[$i]." = '".$fieldValue."', ";
				}elseif (in_array($aFieldName[$i], $formFile)) {
					if(($_FILES["file_$aFieldName[$i]"]["name"])!=null||($_FILES["file_$aFieldName[$i]"]["name"])!=""){
						$query = query($var['table'], array("$aFieldName[$i]"),$where);
						$prefixFile = $var['table']."_".rand(0, 99999)."_";
						$r = mysql_fetch_array($query);
						if(file_exists("../uploaded/".$var['table']."/".$r[1])){
							unlink("../uploaded/".$var['table']."/".$r[1]);
						}
						if(file_exists("../uploaded/".$var['table']."/small_".$r[1])){
							unlink("../uploaded/".$var['table']."/small_".$r[1]);
						}
						if(file_exists("../uploaded/".$var['table']."/medium_".$r[1])){
							unlink("../uploaded/".$var['table']."/medium_".$r[1]);
						}
						$set .= $aFieldName[$i]." = '".$prefixFile.$_FILES["file_$aFieldName[$i]"]["name"]."', ";
						$file_type = $_FILES["file_$aFieldName[$i]"]["type"];
						$fileName = $prefixFile.$_FILES["file_$aFieldName[$i]"]["name"];
						$fileTmpName = $_FILES["file_$aFieldName[$i]"]["tmp_name"];
						if($file_type == "image/pjpeg" || $file_type == "image/jpeg" || $file_type == "image/x-png" || $file_type == "image/png" || $file_type == "image/gif"){
							UploadImage($fileName, $fileTmpName, $var['table'], $file_type);
						}else{
							UploadFile($fileName, $fileTmpName, $var['table']);
						}
					}
				}else{
					$set .= "`".$aFieldName[$i]."` = '".antiinjection($_POST[$aFieldName[$i]])."', ";
				}
			}
		}
		$set = substr($set, 0, strlen($set)-2);
		$where = "id_$var[table] = '".$_POST["id_".$var['table']]."'";
		mysql_query("UPDATE ".$var['table']." SET $set WHERE $where");
		//echo"UPDATE ".$var['table']." SET $set WHERE $where";
		saveHistory($var['table'], $_POST["id_".$var['table']], "saveUpdate");
		echo "<script>window.location.href='".$_POST['fufuriVarBackTo']."';</script>";
	}
	function insert(){
		$argsKey = array("table","fieldName","fieldValue");
		$_fufuriGetArgs = func_get_args();
		$var = getArgument($argsKey, $_fufuriGetArgs);
		$fieldName = implode(",", $var['fieldName']);
		$fieldValue = implode("','",$var['fieldValue']);
		$fieldValue = "'".$fieldValue."'";
		//echo"insert into ".$var['table']."($fieldName) values($fieldValue)";
		mysql_query("insert into ".$var['table']."($fieldName) values($fieldValue)");
		$query = query($var['table']);
		$r = fetch($query);
		saveHistory($var['table'], $r[0], "insert");
	}
	function update(){
		$argsKey = array("table","fieldName","fieldValue","id");
		$_fufuriGetArgs = func_get_args();
		$var = getArgument($argsKey, $_fufuriGetArgs);
		$set ="set";
		$where = "id_$var[table] = '".$var['id']."'";
		$cFieldName = count($var['fieldName']);
		for($i=0;$i<$cFieldName;$i++){
			$set .= " `".$var['fieldName'][$i]."` = '".antiinjection($var['fieldValue'][$i])."', ";
		}
		$set = substr($set, 0, strlen($set)-2);
		//var_dump("update `$var[table]` $set where $where");exit;
		mysql_query("update `$var[table]` $set where $where");
		saveHistory($var['table'], $var['id'], "update");
	}
	function delete(){
		$argsKey = array("table","fieldValue","backTo");
		$_fufuriGetArgs = func_get_args();
		$var = getArgument($argsKey, $_fufuriGetArgs);
		if($var['table']=="fms_sm_module"){
			$query = mysql_query("select table_name from ".$var['table']." WHERE id_".$var['table']." = '".$var['fieldValue']."'");
			$r = mysql_fetch_array($query);
			deleteFolderAndItsContent("module/".$r["table_name"]);
			mysql_query("drop table `".$r["table_name"]."`");
		}
		mysql_query("DELETE FROM ".$var['table']." WHERE id_".$var['table']." = '".$var['fieldValue']."'");
		saveHistory($var['table'], $var['fieldValue'], "delete");
		if(isset($_GET['fufuriVarForm'])){
			$fufuriVarForm = explode(",",$_GET['fufuriVarForm']);
			for ($i = 0; $i < count($fufuriVarForm); $i++){
				if(file_exists("../uploaded/".$var['table']."/".$fufuriVarForm[$i])){
					unlink("../uploaded/".$var['table']."/".$fufuriVarForm[$i]);
				}
				if(file_exists("../uploaded/".$var['table']."/small_".$fufuriVarForm[$i])){
					unlink("../uploaded/".$var['table']."/small_".$fufuriVarForm[$i]);
				}
				if(file_exists("../uploaded/".$var['table']."/medium_".$fufuriVarForm[$i])){
					unlink("../uploaded/".$var['table']."/medium_".$fufuriVarForm[$i]);
				}
			}
		}
		$back = str_replace("fqm", "?", $var['backTo']);
		$back = str_replace("aqm", "&", $var['backTo']);
		echo "<script>window.location.href='".$back."';</script>";
	}
	function getFieldName(){
		$argsKey = array("from","select","whereStatement","orderBy","sortBy", "limit", "debug");
		$_fufuriGetArgs = func_get_args();
		$var = getArgument($argsKey, $_fufuriGetArgs);
		$query = query($var['from'], $var['select'], $var['whereStatement'], $var['orderBy'], $var['sortBy'], $var['limit'], $var['debug']);
		$iField=0;
		$fieldName = array();
		while(getTotalColumn($var['from'], $var['select'], $var['whereStatement'], $var['orderBy'], $var['sortBy'], $var['limit'], $var['debug'])>$iField){
			$fieldName[] = mysql_field_name($query, $iField);
			$iField++;
		}
		return $fieldName;
	}
	function getSeoName(){
		$argsKey = array("string");
		$_fufuriGetArgs = func_get_args();
		$var = getArgument($argsKey, $_fufuriGetArgs);
		$seo = array("ums_", "fms_", "pbs_", "ms_", "cus_", "ppa_", "idk_", "pms_","sm_", "Ptf_", "ptf_", "tc_", "id_", "pr_", "_", "-");
		$word = str_ireplace($seo," ",$var["string"]);
		return $word;
	}
	function getTrimName(){
		$argsKey = array("string");
		$_fufuriGetArgs = func_get_args();
		$var = getArgument($argsKey, $_fufuriGetArgs);
		$seo = array(" ", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "{", "}", "[", "]", ":", ";", "'", "<", ">");
		$word = str_ireplace($seo,"",$var["string"]);
		return $word;
	}
	function getLinkName(){
		$argsKey = array("string");
		$_fufuriGetArgs = func_get_args();
		$var = getArgument($argsKey, $_fufuriGetArgs);
		$word = preg_replace('!\s+!', ' ', $var["string"]);
		$word = urlencode($word);
		$seo = array(" ", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "{", "}", "[", "]", ":", ";", "'", "<", ">");
		$word = str_ireplace($seo,"+",$word);
		$word = strtolower($word);
		return $word;
	}
	function ddmmyy(){
		$argsKey = array("yy-mm-dd", "value", "abbreviation", "noTime");
		$_fufuriGetArgs = func_get_args();
		$var = getArgument($argsKey, $_fufuriGetArgs);
		if($var['yy-mm-dd']!="" && substr($var['yy-mm-dd'], 5, 2)!=0){
			$timestamp = explode(" ", $var['yy-mm-dd']);
			$cTime = count($timestamp);
			if($cTime==2 && $var['noTime']==""){
				$time = " | ".$timestamp[1];
			}else{
				$time = "";
			}
			if($var['abbreviation']=="num"){
				$monthName = array("01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12");
			}elseif($var['abbreviation']=="y"){
				$monthName = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
			}else{
				$monthName = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
			}
			$year = substr($var['yy-mm-dd'], 0, 4);			
			$month = $monthName[(intval(substr($var['yy-mm-dd'], 5, 2))-1)];
			$date = substr($var['yy-mm-dd'], 8, 2);
			if($var['value'] == ""){
				return $date." ".$month." ".$year.$time;
			}elseif($var['value'] == "ym"){
				return $month." ".$year;
			}elseif($var['value'] == "y"){
				return $year;
			}elseif($var['value'] == "m"){
				return $month;
			}elseif($var['value'] == "d"){
				return $date;
			}		
		}
	}
	//form function
	function generateInputPassword(){
		$argsKey = array("name","id","class","type","value");
		$_fufuriGetArgs = func_get_args();
		$var = getArgument($argsKey, $_fufuriGetArgs);
		$form = "<input value=\"".$var['value']."\" class=\"".$var['class']."\" type=\"".$var['type']."\" name=\"".$var['name']."\" id=\"".$var['id']."\"/>";
		echo $form;
	}
	function UploadFile($fupload_name,$tempName, $location){
    	$vdir_upload = "../uploaded/$location/";
		if(!is_dir($vdir_upload)){
			createFolder($vdir_upload);
		}
   		$vfile_upload = $vdir_upload.$fupload_name;
		move_uploaded_file($tempName, $vfile_upload);
	}
	function UploadImage($fupload_name,$tempName, $location, $fileType){
		$vdir_upload = "../uploaded/$location/";
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
	function createFolder($structure){
		mkdir($structure, 0777, true);
	}
	function createFile($folderPath,$fileName,$content){
		$folder_path=$folderPath."/".$fileName;
		$fh = fopen($folder_path, 'w') or die("can't open file");
		fwrite($fh, $content);
		fclose($fh);
	}
	function deleteFolderAndItsContent($structure){
		if (is_dir($structure)) {
			$objects = scandir($structure);
			foreach ($objects as $object) {
				if ($object != "." && $object != "..") {
					if (filetype($structure."/".$object) == "dir") rmdir($structure."/".$object); else unlink($structure."/".$object);
				}
			}
			reset($objects);

			rmdir($structure);	
		}		
	}
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
	function threeDecimal($int){
		$rupiah=number_format($int,0,',','.');
		return $rupiah;
	}
	//user side
	function maskingId(){
		$argsKey = array("string","prefix","len");
		$_fufuriGetArgs = func_get_args();
		$var = getArgument($argsKey, $_fufuriGetArgs);
		$masking = $var['len'];
		$length = strlen($var['string']);
		for($i=0;$i<($masking-$length);$i++){
			$var['string'] = "0".$var['string'];
		}
		return $var['prefix'].$var['string'];
	}
	function sendMail2(){
		$argsKey = array("to","subject","message", "from");
		$_fufuriGetArgs = func_get_args();
		$var = getArgument($argsKey, $_fufuriGetArgs);
		$to      = "$var[to]";
		$subject = "$var[subject]";
		$message = "$var[message]";
		
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= "From: $var[from]" . "\r\n" .
			'Reply-To: $var[from]' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();


		mail($to, $subject, $message, $headers);
	}
	function sendMail(){
		$argsKey = array("to","subject","message", "from");
		$_fufuriGetArgs = func_get_args();
		$var = getArgument($argsKey, $_fufuriGetArgs);
		$to = "$var[to]";
		$from = $var['from'];
		$subject = "$var[subject]";
		$message = "$var[message]";
		$headers  = "From: $from\r\n"; 
		$headers .= "Content-type: text/html\r\n";
		mail($to, $subject, $message, $headers);
	}
	function paging(){
		$argsKey = array("varQuery", "varPaging");
		$_fufuriGetArgs = func_get_args();
		$var = getArgument($argsKey, $_fufuriGetArgs);
		$argsKey = array("from","select","whereStatement","orderBy","sortBy", "limit", "debug");
		$varQuery = getArgument($argsKey, $var["varQuery"]);
		$argsKey = array("limit","seo","openWrapper","closeWrapper","home");
		$varPaging = getArgument($argsKey, $var["varPaging"]);
		$pageButton="";
		$total = mysql_num_rows(query(
			$varQuery['from'],
			$varQuery['select'],
			$varQuery['whereStatement']
		));
		$page =  ceil($total/$varPaging['limit']);
		$currentPage = 1;
		if(isset($_GET['page'])){
			$currentPage = $_GET['page'];
		}
		$query = query(
			$varQuery['from'],
			$varQuery['select'],
			$varQuery['whereStatement'],
			$varQuery['orderBy'],
			$varQuery['sortBy'],
			(($varPaging['limit']*$currentPage)-$varPaging['limit']).",
			$varPaging[limit]",
			$varQuery['debug']
		);
		$home = $GLOBALS["home"];
		if($varPaging['home']!=""){
			$home =$varPaging['home'];
		}
		$totalButton = 0;
		for($i=1;$i<=$page;$i++){
			$totalButton++;
			$pageButton = $pageButton.$varPaging['openWrapper']."<a href=\"".$home."/$varPaging[seo]$i.html\">$i</a>".$varPaging['closeWrapper'];		
		}
		//$pageButton .= "*";
		//$pageButton = str_ireplace(" &middot; *", "", $pageButton);
		if($pageButton == "*"){
			$pageButton = "No Result Found";
		}
		return array($query, $pageButton, $total, $totalButton);
	}
	function generateTableText(){
		$argsKey = array("from","select","whereStatement","orderBy","sortBy", "limit", "debug");
		$_fufuriGetArgs = func_get_args();
		$var = getArgument($argsKey, $_fufuriGetArgs);
		$query = query($var["from"], $var["select"], $var["whereStatement"], $var["orderBy"], $var["sortBy"], $var["limit"], $var["debug"]);
		$totalColumn = getTotalColumn($var["from"], $var["select"], $var["whereStatement"], $var["orderBy"], $var["sortBy"], $var["limit"], $var["debug"]); 
		$iField=1;
		if(is_array($var["from"])){
			$var["from"] = $var["from"][0];
		}
		$table = '<table class="table" cellpadding="0" cellspacing="0" border="0" class="display tablesorter" id="'.$var["from"].'"><thead><tr class="th">';
		while(($totalColumn-1)>$iField){
			$seo = array("idk_", "pms_", "fms_", "sm_", "Ptf_", "ptf_", "tc_", "pr_", "_");
			$word = str_ireplace($seo," ",mysql_field_name($query, $iField));
			$table .= '<th class="th index'.$iField.'">'.ucwords($word).'</th>';
			$iField++;
		}
		$table .= "</tr></thead><tbody>";
		while($r=mysql_fetch_array($query)){
			$table .= '<tr>';
			$iField=1;
			while(($totalColumn-1)>$iField){
				$table .= '<td class="td index'.$iField.'">'.$r[$iField].'</td>';
				$iField++;
			}
			$table .= '</tr>';
		}
		$table .= '</tbody><tfoot><tr class="total">';
		$iField=1;
		while(($totalColumn-1)>$iField){
			$table .= '<td class="td index'.$iField.'" id="'.$var["from"].$iField.'">-</td>';
			$iField++;
		}
		$table .='</tr></tfoot></table>';
		return $table;
	}
	function generateCSV(){
		$argsKey = array("from","select","whereStatement","orderBy","sortBy", "limit", "debug");
		$_fufuriGetArgs = func_get_args();
		$var = getArgument($argsKey, $_fufuriGetArgs);
		$query = query($var["from"], $var["select"], $var["whereStatement"], $var["orderBy"], $var["sortBy"], $var["limit"], $var["debug"]);
		$totalColumn = getTotalColumn($var["from"], $var["select"], $var["whereStatement"], $var["orderBy"], $var["sortBy"], $var["limit"], $var["debug"]); 
		$iField=1;
		if(is_array($var["from"])){
			$var["from"] = $var["from"][0];
		}
		$csv = '';
		while(($totalColumn-1)>$iField){
			$seo = array("idk_", "pms_", "fms_", "sm_", "Ptf_", "ptf_", "tc_", "pr_", "_");
			$word = str_ireplace($seo," ",mysql_field_name($query, $iField));
			$csv .= '"'.ucwords($word).'",';
			$iField++;
		}
		$csv .= "\n";
		while($r=mysql_fetch_array($query)){
			$iField=1;
			while(($totalColumn-1)>$iField){
				$csv .= '"'.$r[$iField].'",';
				$iField++;
			}
			$csv .= "\n";
		}
		return $csv;
	}
	function getWorkingDays($startDate,$endDate,$holidays){
		$endDate = strtotime($endDate);
		$startDate = strtotime($startDate);
		$days = ($endDate - $startDate) / 86400 + 1;
		$no_full_weeks = floor($days / 7);
		$no_remaining_days = fmod($days, 7);
		$the_first_day_of_week = date("N", $startDate);
		$the_last_day_of_week = date("N", $endDate);
		if ($the_first_day_of_week <= $the_last_day_of_week) {
			if ($the_first_day_of_week <= 6 && 6 <= $the_last_day_of_week) $no_remaining_days--;
			if ($the_first_day_of_week <= 7 && 7 <= $the_last_day_of_week) $no_remaining_days--;
		}
		else {
			if ($the_first_day_of_week == 7) {
				$no_remaining_days--;
				if ($the_last_day_of_week == 6) {
					$no_remaining_days--;
				}
			}
			else {
				$no_remaining_days -= 2;
			}
		}
		$workingDays = $no_full_weeks * 5;
		if ($no_remaining_days > 0 ){
		  $workingDays += $no_remaining_days;
		}
		if(is_array($holidays)){
			foreach($holidays as $holiday){
				$time_stamp=strtotime($holiday);
				if ($startDate <= $time_stamp && $time_stamp <= $endDate && date("N",$time_stamp) != 6 && date("N",$time_stamp) != 7)
					$workingDays--;
			}
		}
		return $workingDays;
	}
	function getWords($n, $valuta) {
		$n = explode(".", $n);
		$function = "getWords".$valuta;
		if(isset($n[0])){
			$words = $function($n[0]);
		}
		if(isset($n[1])){
			$words = $words." Poin ".($function($n[1]));
		}
		return $words;
	}
	function getWordsIdr($n) {
		$str = "";
		$dasar = array(1 => 'satu', 'dua', 'tiga', 'empat', 'lima', 'enam','tujuh', 'delapan', 'sembilan');
		$angka = array(1000000000, 1000000, 1000, 100, 10, 1);
		$satuan = array('milyar', 'juta', 'ribu', 'ratus', 'puluh', '');
		
		$i = 0;
		if($n==0){
			$str = "nol";
		}else{
			while ($n != 0) {
				$count = (int)($n/$angka[$i]);
				if ($count >= 10) {
					$str .= getWordsIdr($count). " ".$satuan[$i]." ";
				}else if($count > 0 && $count < 10){
					$str .= $dasar[$count] . " ".$satuan[$i]." ";
				}
				$n -= $angka[$i] * $count;
				$i++;
			}
			$str = preg_replace("/satu puluh (\w+)/i", "\\1 belas", $str);
			$str = preg_replace("/satu (ribu|ratus|puluh|belas)/i", "se\\1", $str);
		}
		return $str;
	}
	function getWordsUsd($n) {
		$str = "";
		$dasar = array(1 => 'one', 'two', 'three', 'four', 'five', 'six','seven', 'eight', 'nine');
		$angka = array(1000000000, 1000000, 1000, 100, 10, 1);
		$satuan = array('billion', 'billion', 'thousand', 'hundred', 'ty', '');
		
		$i = 0;
		if($n==0){
			$str = "nol";
		}else{
			while ($n != 0) {
				$count = (int)($n/$angka[$i]);
				if ($count >= 10) {
					$str .= getWordsUsd($count). " ".$satuan[$i]." ";
				}else if($count > 0 && $count < 10){
					$str .= $dasar[$count] . " ".$satuan[$i]." ";
				}
				$n -= $angka[$i] * $count;
				$i++;
			}
			$str = preg_replace("/one ty (\w+)/i", "\\1 teen", $str);
			
			$str = str_ireplace("one teen", "eleven", $str);
			$str = str_ireplace("two teen", "twelve", $str);
			$str = str_ireplace("three teen", "thirteen", $str);
			$str = str_ireplace("five teen", "fifteen", $str);
			$str = str_ireplace("eight teen", "eighteen", $str);
			$str = str_ireplace(" teen", "teen", $str);
			
			$str = str_ireplace("two ty", "twenty", $str);
			$str = str_ireplace("three ty", "thirty", $str);
			$str = str_ireplace("five ty", "fifty", $str);
			$str = str_ireplace("eight ty", "eighty", $str);
			$str = str_ireplace(" ty", "ty", $str);
		}
		return $str;
	}
	function generateJSON(){
		$argsKey = array("from","select","whereStatement","orderBy","sortBy", "limit", "debug");
		$_fufuriGetArgs = func_get_args();
		$var = getArgument($argsKey, $_fufuriGetArgs);
		$json="";
		$query = query($var['from'], $var['select'], $var['whereStatement'], $var['orderBy'], $var['sortBy'], $var['limit'], $var['debug']);
		$json .="var ".$var['from']." = [";
		while($r=mysql_fetch_array($query)){
			$json .= "\n{";
			$iField=0;
			while(getTotalColumn($var['from'], $var['select'], $var['whereStatement'], $var['orderBy'], $var['sortBy'], $var['limit'], $var['debug'])>$iField){
				$json .= "\"".mysql_field_name($query, $iField)."\":\"$r[$iField]\" , ";
				$iField++;
			}
			$json .= "},";
		}
		$json .="\n]";
		return $json;
	}
	function getInitial(){
		$argsKey = array("string");
		$_fufuriGetArgs = func_get_args();
		$var = getArgument($argsKey, $_fufuriGetArgs);
		$words = explode(" ", $var["string"]);
		$letters = "";
		foreach ($words as $value) {
			$letters .= substr($value, 0, 1);
		}
		return $letters;	
	}
?>