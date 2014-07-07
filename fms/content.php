<div>
	<?php
		/*echo "content : ".$_GET['content']."<br/>";
		echo "sub : ".$_GET['subContent']."<br/>";
		echo "id : ".$_GET['id']."<br/>";
		echo "page : ".$_GET['page']."<br/>";
		*/
		if(isset($_GET['content'])){
			$title = ucwords(getSeoName($_GET['content']));
			if(isset($_GET['subContent'])){
				if(file_exists("module/$_GET[content]/$_GET[subContent].php")){ 
					include "module/$_GET[content]/$_GET[subContent].php";
				}elseif(file_exists("module/$_GET[content]/$_GET[content].php")){ 
					include "module/$_GET[content]/$_GET[content].php";
				}else{
					echo "<h1>Sub Page Not Found</h1>";
					echo "<div class=\"error\">Sorry, but the requested page is not exist, Please Contact Your Administrator...</div>";
				}
			}elseif(file_exists("module/$_GET[content]/$_GET[content].php")){ 
				echo "<h1>".$title."</h1>";
				include "module/$_GET[content]/$_GET[content].php";
			}elseif(file_exists("staticModule/".$_GET['content']."/".$_GET['content'].".php")){
				echo "<h1>".$title."</h1>";
				include "staticModule/".$_GET['content']."/".$_GET['content'].".php";
			}else{
				echo "<h1>Page Not Found</h1>";
				echo "<div class=\"error\">Sorry, but the requested page is not exist, Please Contact Your Administrator...</div>";
			}
		}else{
			echo "<h1>Page Not Found</h1>";
			echo "<center><div class=\"error\">Sorry, but the requested page is not exist, Please Contact Your Administrator...</div></center><br/>";
		}
	?>
</div>


