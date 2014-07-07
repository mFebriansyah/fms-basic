<style>
	.sidebar{
		display:none;	
	}
	#content{
		width:96%;	
	}
</style>
<script>
	$(function(){
		$(".sidebar").remove();
		$(".menu").show();
	})
</script>
<ul class="sortable">
	<h1 style="clear:both;border-bottom:1px solid #91bd09;color:#91bd09;">Fms</h1>	<li class="ui-state-default">
	<li class="ui-state-default">
		<div class="boxMenu" id="fms_sm_admin">
			<a
				rel="example_group1" 
				href="style/moduleCategory.png" 
				class="preview" 
				title="Manajemen Kategori Module"
				id="style/admin.png" 
			>
				<img alt="" src="style/default.png" />
			</a>
			<div class="boxMenuTitle">
			<a href="home.php?menu=$_GET[menu]&content=fms_sm_admin" style="color:#fff">
				<font color="#FFFFFF">General</font>
			</a>
			</div>
		</div>
	</li>
	<li class="ui-state-default">
		<div class="boxMenu" id="fms_sm_admin">
			<a
				rel="example_group1" 
				href="style/moduleCategory.png" 
				class="preview" 
				title="Manajemen Kategori Module"
				id="style/default.png" 
			>
				<img alt="" src="style/default.png" />
			</a>
			<div class="boxMenuTitle">
			<a href="home.php?menu=$_GET[menu]&content=fms_sm_admin" style="color:#fff">
				<font color="#FFFFFF">Blog</font>
			</a>
			</div>
		</div>
	</li>
	<li class="ui-state-default">
		<div class="boxMenu" id="fms_sm_admin">
			<a
				rel="example_group1" 
				href="style/moduleCategory.png" 
				class="preview" 
				title="Manajemen Kategori Module"
				id="style/default.png" 
			>
				<img alt="" src="style/default.png" />
			</a>
			<div class="boxMenuTitle">
			<a href="home.php?menu=$_GET[menu]&content=fms_sm_admin" style="color:#fff">
				<font color="#FFFFFF">Shop</font>
			</a>
			</div>
		</div>
	</li>
	<li class="ui-state-default">
		<div class="boxMenu" id="fms_sm_admin">
			<a
				rel="example_group1" 
				href="style/moduleCategory.png" 
				class="preview" 
				title="Manajemen Kategori Module"
				id="style/admin.png" 
			>
				<img alt="" src="style/default.png" />
			</a>
			<div class="boxMenuTitle">
			<a href="home.php?menu=$_GET[menu]&content=fms_sm_admin" style="color:#fff">
				<font color="#FFFFFF">Miscellaneous</font>
			</a>
			</div>
		</div>
	</li>
<?php
$query2 = query("fms_pr_module_category");
while($r2 = mysql_fetch_array($query2)){
	$query = query("fms_sm_module","","id_fms_pr_module_category=$r2[0]","module_name","asc");
	if(mysql_num_rows($query) > 0){
		echo"<h1 style=\"clear:both;border-bottom:1px solid #91bd09;color:#91bd09;\">$r2[1]</h1>";
	}
	while($r = mysql_fetch_array($query)){
		if($r['img']=="" || !file_exists("../uploaded/fms_sm_module/medium_$r[img]")){
			$images = "style/default.png";
		}else{
			$images = "../uploaded/fms_sm_module/$r[img]";
		}
		echo "
			<li class=\"ui-state-default\">
				<div class=\"boxMenu\" id=\"$r[0]\">
					<a
						rel=\"example_group1\" 
						href=\"../uploaded/fms_sm_module/$r[img]\" 
						class=\"preview\" 
						title=\"$r[1]\"
						id=\"../uploaded/fms_sm_module/$r[img]\" 
					>
						<img alt=\"\" src=\"$images\" />
					</a>
					<div class=\"boxMenuTitle\">
					<a href=\"home.php?menu=$_GET[menu]&content=$r[2]\" style=\"color:#fff\">
						<font color=\"#FFFFFF\">$r[1]</font>
					</a>
					</div>
				</div>
			</li>";
	}
}
/*echo"<h1 style=\"clear:both;border-bottom:1px solid #91bd09;color:#91bd09;\">Management</h1>
	<li class=\"ui-state-default\">
		<div class=\"boxMenu\" id=\"fms_sm_module\">
			<a
				rel=\"example_group1\" 
				href=\"style/module.png\" 
				class=\"preview\" 
				title=\"Manajemen Module\"
				id=\"style/module.png\" 
			>
				<img alt=\"\" src=\"style/module.png\" />
			</a>
			<div class=\"boxMenuTitle\">
			<a href=\"home.php?menu=$_GET[menu]&content=fms_sm_module\" style=\"color:#fff\">
				<font color=\"#FFFFFF\">Manajemen Module</font>
			</a>
			</div>
		</div>
	</li>
	<li class=\"ui-state-default\">
		<div class=\"boxMenu\" id=\"fms_pr_module_category\">
			<a
				rel=\"example_group1\" 
				href=\"style/moduleCategory.png\" 
				class=\"preview\" 
				title=\"Manajemen Kategori Module\"
				id=\"style/moduleCategory.png\" 
			>
				<img alt=\"\" src=\"style/moduleCategory.png\" />
			</a>
			<div class=\"boxMenuTitle\">
			<a href=\"home.php?menu=$_GET[menu]&content=fms_pr_module_category\" style=\"color:#fff\">
				<font color=\"#FFFFFF\">Manajemen Kategori Module</font>
			</a>
			</div>
		</div>
	</li>
	<li class=\"ui-state-default\">
		<div class=\"boxMenu\" id=\"fms_sm_user\">
			<a
				rel=\"example_group1\" 
				href=\"style/moduleCategory.png\" 
				class=\"preview\" 
				title=\"Manajemen Kategori Module\"
				id=\"style/users.png\" 
			>
				<img alt=\"\" src=\"style/users.png\" />
			</a>
			<div class=\"boxMenuTitle\">
			<a href=\"home.php?menu=$_GET[menu]&content=fms_sm_user\" style=\"color:#fff\">
				<font color=\"#FFFFFF\">Manajemen User</font>
			</a>
			</div>
		</div>
	</li>
	<li class=\"ui-state-default\">
		<div class=\"boxMenu\" id=\"fms_sm_admin\">
			<a
				rel=\"example_group1\" 
				href=\"style/moduleCategory.png\" 
				class=\"preview\" 
				title=\"Manajemen Kategori Module\"
				id=\"style/admin.png\" 
			>
				<img alt=\"\" src=\"style/admin.png\" />
			</a>
			<div class=\"boxMenuTitle\">
			<a href=\"home.php?menu=$_GET[menu]&content=fms_sm_admin\" style=\"color:#fff\">
				<font color=\"#FFFFFF\">Manajemen Admin</font>
			</a>
			</div>
		</div>
	</li>";
?>*/