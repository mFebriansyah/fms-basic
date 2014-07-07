<?php
	session_start();
	if(isset($_SESSION["fufuri_username_admin"])){ 
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title> M S</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="description" content="" />
        <meta name="keywords" content=""/>
        <link rel="shortcut icon" href="style/icon.jpg" type="image/x-icon"/>
        <?php
			include "../config/connection.php";
			include "../fufuriFramework/init.php";
			include "staticModule/fms_sm_init/fms_sm_init.php";
			include "../fufuriFramework/function.php";
		?>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
		<link href="<?= $home ?>/css/bootstrap.min.css" rel="stylesheet">
		<script src="<?= $home ?>/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="style/style.css" title="style" />
    </head>
    <body>
		<div id="main">
			<div id="header">
				<?php include "header.php" ?>
				<div style="clear:both"></div>
			</div>
			<div class="container">
				<div class="row">
					<div class="sidebar col-md-2">
						<?php include "sidebar.php" ?>
					</div>
					<div id="content" class="col-md-10">
						<?php include "content.php" ?>
					</div>
				</div>
			</div>
		</div>
    </body>
</html>
<?php }else{ ?>
<script>window.location.href='index.php'</script>	
<?php } ?>