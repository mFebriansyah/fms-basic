<?php include "../../../config/connection.php";?>
<script type="text/javascript">
	$(document).ready(function() {
		$("tr:odd").addClass("even");
		$("tr:even").addClass("odd");
		$("th").parent().addClass("tbheading");
		$('#fieldForm').hide().fadeIn();
	});
	function test(){
		fieldQuantity="<?php echo $_GET['fieldQuantity'] ?>";
		id=$('#tableName').attr('value');
		$(function(){
			table = "";
			for(i=0;fieldQuantity>i;i++){
				fieldName = '`'+$('#fieldName'+i).attr('value')+'`';
				fieldType = $('#fieldType'+i).attr('value');
				maxLength = $('#maxLength'+i).attr('value');
				required = $('#required'+i).attr('value');
				table = table+(fieldName+" "+fieldType+"("+maxLength+") "+required+",");
			}
			query ="CREATE TABLE IF NOT EXISTS `"+id+"` (`id_"+id+"` int(11) NOT NULL AUTO_INCREMENT,"+table+"PRIMARY KEY (`id_"+id+"`)) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";			
		})
	}
</script>
<?php
	echo"
		<table id=\"fieldForm\">
		<tr>
			<td>Field Name</td>
			<td>Type</td>
			<td>Max Length</td>
			<td>Required</td>
		</tr>
	";
	for($f=0;$f<$_GET['fieldQuantity'];$f++){
		echo"
			<tr>
				<td>
					<input type=\"text\" id=\"fieldName[]\" name=\"fieldName[]\">
					<input type=\"hidden\" id=\"fieldQuantity\" name=\"fieldQuantity\" value=\"$_GET[fieldQuantity]\">
				</td>
				<td>
					<select id=\"fieldType[]\" name=\"fieldType[]\">
						<option value=\"varchar\">Text Field&nbsp;&nbsp;</option>
						<option value=\"int\">Numeric Field</option>
						<option value=\"text\">Text Area&nbsp;&nbsp;</option>
						<option value=\"date\">Date Picker</option>
						<option value=\"year\">Year Picker</option>
						<option value=\"timestamp\">Timestamp</option>
					</select>
				</td>
				<td><input type=\"text\" id=\"maxLength[]\" name=\"maxLength[]\"></td>
				<td align=\"center\">
				<input type=\"radio\" id=\"required[$f]\" name=\"required[$f]\" checked=\"checked\" value=\"not null\">YES
				<input type=\"radio\" id=\"required[$f]\" name=\"required[$f]\" value=\"null\">NO
				</td>
			</tr>
		";
	}
	echo"</table>";
?>