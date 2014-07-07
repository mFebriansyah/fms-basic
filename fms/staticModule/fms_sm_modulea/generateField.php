<script type="text/javascript">
      $(document).ready(function() {
        $("tr:odd").addClass("even");
        $("tr:even").addClass("odd");
        $("th").parent().addClass("tbheading");
		$('#fieldForm').hide().fadeIn();
      });
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
				<td><input type=\"text\" id=\"fieldName$f\" name=\"fieldName$f\"></td>
				<td>
					<select id=\"type$f\" name=\"type$f\">
						<option>Text Field&nbsp;&nbsp;</option>
						<option>Numeric Field</option>
						<option>Date Picker</option>
						<option>Year Picker</option>
						<option>Timestamp</option>
					</select>
				</td>
				<td><input type=\"text\" id=\"maxLength$f\" name=\"maxLength$f\"></td>
				<td align=\"center\">
				<input type=\"radio\" id=\"required$f\" name=\"required$f\" checked=\"checked\">YES
				<input type=\"radio\" id=\"required$f\" name=\"required$f\">NO
				</td>
			</tr>
		";
	}
	echo"</table>";
?>