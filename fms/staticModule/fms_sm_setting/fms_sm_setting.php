<?php echo getInitiatedForm(); ?>
<div id=\"myForm\">
<form enctype="multipart/form-data" id="insertForm" method="post" action="">
<?php echo"<h1 style=\"clear:both;border-bottom:1px solid #91bd09;color:#91bd09;\">General</h1>"; ?><br />
<table>
    <tr>
    	<td>Site Name</td>
        <td>
        	<input size="100%" class="validate[required,maxSize[255]]" type="text" id="site_name" name="site_name">
        </td>
    </tr>
	<tr>
    	<td>Language</td>
        <td>
        	<select class="validate[required]" name="language" id="language">
            	<option>English&nbsp;&nbsp;</option>
                <option>Indonesia&nbsp;&nbsp;</option>
			</select>
        </td>
    </tr>
	<tr>
    	<td>Time Zone</td>
        <td>
        	<select class="validate[required]" name="time_zone" id="time_zone">  	
			<?php 
                $query = query("fms_pr_timezone","","","location");
				echo"<option value=\"\">---</option>";
				while($r = mysql_fetch_array($query)){
					echo"<option value=\"$r[0]\">($r[2])&nbsp;$r[1]&nbsp;&nbsp;</option>";	
				}
            ?>
			</select>
        </td>
    </tr>
    <tr>
    	<td colspan="2" align="right">
        	<input type="submit" value="Submit" class="small awesome green" />
        </td>
    </tr>
</table>
<br /><?php echo"<h1 style=\"clear:both;border-bottom:1px solid #91bd09;color:#91bd09;\">Database</h1>"; ?><br />
<table>
    <tr>
    	<td>Database Name</td>
        <td>
        	<input size="100%" class="validate[required,maxSize[255]]" type="text" id="database" name="database">
        </td>
    </tr>
    <tr>
    	<td>Database Username</td>
        <td>
        	<input size="100%" class="validate[required,maxSize[255]]" type="text" id="database_username" name="database_username">
        </td>
    </tr>
    <tr>
    	<td>Database Password</td>
        <td>
        	<input size="100%" class="validate[required,maxSize[255]]" type="password" id="database_password" name="database_password">
        </td>
    </tr>
    <tr>
    	<td>Database Table Prefix</td>
        <td>
        	<input size="100%" class="validate[required,maxSize[255]]" type="text" id="database_table_prefix" name="database_table_prefix">
        </td>
    </tr>
    <tr>
    	<td colspan="2" align="right">
        	<input type="submit" value="Submit" class="small awesome green" />
        </td>
    </tr>
</table>
</form>
</div>