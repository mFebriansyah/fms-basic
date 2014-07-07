<script>
	$(function(){
		menu = <?php if(isset($_GET["menu"])){echo"\"#$_GET[menu]Menu\"";}else{echo "\"default\"";}?>;
		$(menu).show();
		$('.module').bind('mouseleave',function(){
			id = $(this).attr("id");
			$("#triangle"+id).hide();
			$("#triangleChild"+id).hide();
		}).bind('mouseenter',function(){
			id = $(this).attr("id");
			$("#triangle"+id).fadeIn();
			$("#triangleChild"+id).fadeIn();
		});	
		$('.childModule').bind('mouseleave',function(){
			$(this).hide();
			$("#triangle"+id).hide();
		}).bind('mouseenter',function(){
			$(this).css({"display":"block"});
			$("#triangle"+id).css({"z-index":99999,"display":"block"});
		});	
	 });
</script>
<?php
$query2 = query("fms_pr_module_category","","","nama_kategori_module","ASC");
while($r2 = mysql_fetch_array($query2)){
	$query = query("fms_sm_module","","id_fms_pr_module_category = $r2[0] && id_parent_module=0","module_name","ASC");
	if(mysql_num_rows($query) > 0){
		echo'
			<div id="'.$r2["id_fms_pr_module_category"].'Menu" class="menuNav"><h3>'.$r2["nama_kategori_module"].'</h3>
				<ul>
		';
					while($r = mysql_fetch_array($query)){
						echo '
							<li>
								<a class="module" id="'.$r['id_fms_sm_module'].'"  href="home.php?menu='.$r2['id_fms_pr_module_category'].'&content='.$r['table_name'].'&action=master">
									<div class="full">'.$r['module_name'].'</div>
									<span id="triangle'.$r['id_fms_sm_module'].'" class="triangle"></span>
								</a>
						';
									$query3 = query("fms_sm_module","","id_parent_module=$r[0]","module_name","ASC");
									if(mysql_num_rows($query3) > 0){
										echo'
											<ul class="childModule" id="triangleChild'.$r['id_fms_sm_module'].'">
										';
										while($r3 = mysql_fetch_array($query3)){
											echo '
												<li>
													<a href="home.php?menu='.$r2['id_fms_pr_module_category'].'&content='.$r3['table_name'].'&action=master">
														<div class="fullChild">'.$r3['module_name'].'</div>
													</a>
												</li>
											';
										}
										echo'
											</ul>
										';
									}
						echo'
								<div style="clear:both"></div>
							</li>
						';
					}
		echo'
				</ul>
			</div>
		';
	}
}


	