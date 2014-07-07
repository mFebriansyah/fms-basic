<style>
	#insertForm{
		/*display:none;*/
	}
</style>
<script>
	function generateField(quantity){
		$('#field').load('../fms/staticModule/fms_sm_module/generatefield.php?fieldQuantity='+quantity);
	}
	$(function(){
		$("#insertForm").hide();
		$("#insertButton").click(function() {
			$("#insertForm").animate({height:'toggle', width:'toggle'});
		})
	})
</script>

<form enctype="multipart/form-data" id="insertForm" method="post" action="../fms/staticModule/<?php echo $_GET['content']."/act_".$_GET['content'] ?>.php">
    <table>
        <tr>
            <td>Module Name</td>
            <td><input type="text" id="module_name" name="module_name"></td>
        </tr>
        <tr>
        	<td>Parent Module</td>
            <td>
            	<select name="id_parent_module">
                	<option value="0">&nbsp;&nbsp;--&nbsp;&nbsp;</option>
					<?php
						$query = query("fms_sm_module","","id_parent_module=0");
                        while($r=mysql_fetch_array($query)){
                            echo"<option value=\"$r[id_fms_sm_module]\">$r[module_name]&nbsp;&nbsp;</option>";
                        }
                    ?>	
                </select>
			</td>
        </tr>
        <tr>
        	<td>Category Module</td>
            <td>
            	<select name="id_fms_pr_module_category">
                	<option value="0">&nbsp;&nbsp;--&nbsp;&nbsp;</option>
					<?php
						$query = query("fms_pr_module_category");
                        while($r=mysql_fetch_array($query)){
                            echo"<option value=\"$r[id_fms_pr_module_category]\">$r[nama_kategori_module]&nbsp;&nbsp;</option>";
                        }
                    ?>	
                </select>
			</td>
        </tr>
        <tr>
            <td>Table Name</td>
            <td><input type="text" id="table_name" name="table_name"></td>
        </tr>
        <tr>
        	<td>Field Quantity</td>
            <td>
            	<select name="fieldQuantity" onchange="generateField(this.value)">
				<?php
                    for($f=0;$f<101;$f++){
                        echo"<option value=\"$f\">$f&nbsp;&nbsp;</option>";
                    }
                ?>	
                </select>
			</td>
        </tr>
        <tr>
            <td colspan="2"><div id="field"></div></td>
        </tr>
        <tr>
            <td colspan="2" align="right">
                <input class="small awesome green" type="submit" value="Submit" id="submit" />
            </td>
        </tr>
    </table>
</form>
<?php
	echo generateTableMaster(
		array(
			"#",
			"home.php?menu=$_GET[menu]&content=$_GET[content]",
			"home.php?menu=$_GET[menu]&content=$_GET[content]"
		),
		array(
			"$_GET[content]",
			array("")
		),
		array(
			array("img"),//file
			array(
				array("id_fms_pr_module_category","id_parent_module"),//foreignKey
				array("fms_pr_module_category","fms_sm_module"),//foreignTable
				array("id_fms_pr_module_category","id_fms_sm_module"),//value
				array("nama_kategori_module","module_name")//display
			),//combobox
			array(""),//password
			array("isi")//wysiwyg
		)
	);
?>