<script>
	$(function(){
		$("#topBarMobile .menuMobile").click(function(){
			css = $(".sidebar").css("display");
			if(css=="none"){
				$(".sidebar").css({"display":"block", "margin-left":"-250px"}).animate({"margin-left":"0"});
				$("#content").animate({"margin-right":"-250px", "margin-left":"250px"});
				$("body").css({"overflow":"hidden"});
			}else{
				$(".sidebar").animate({"margin-left":"-250px"}, function(){
					$(".sidebar").css({"display":"none"});
				})
				$("#content").animate({"margin-left":"0", "margin-right":"0"});
				$("body").css({"overflow-y":"auto"});
			}
		})
	})
</script>
<div id="topBar">
	<ul id="topBarMobile" class="hidden-md hidden-lg">
    	<li><a  class="rounded" href="#menu">FMS</a></li>
    	<li class="menuMobile"><a href="#">Menu</a></li>
        <li><a href="home.php?menu=default&content=fms_sm_module">Module</a></li>
    </ul>
	<ul id="topBarMenu" class="hidden-xs hidden-sm">
    	<li><a  class="rounded" href="#menu">FMS</a></li>
    	<li class="unSelected"><a href="home.php?menu=default&content=fms_sm_home">Home</a></li>
        <li class="unSelected"><a href="home.php?menu=default&content=fms_sm_dashboard">Dashboard</a></li>
        <li class="unSelected"><a href="home.php?menu=default&content=fms_sm_module">Module Management</a></li>
    	<li class="unSelected"><a href="home.php?menu=default&content=fms_sm_MySQL_and_PHP_info">PHP & MySQL Info</a></li>
        <li class="unSelected"><a href="home.php?menu=default&content=fms_sm_setting">Setting</a></li>
    </ul>
	<ul id="accountMenu">
        <li class="off"><a href="home.php?menu=default&content=fms_sm_log_off">off</a></li>
   		<li><a href="home.php?menu=default&content=fms_sm_account">Hi, <?php echo $_SESSION["fufuri_username_admin"]?></a></li>
    </ul>
	<div style="clear:both"></div>
</div>