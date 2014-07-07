<html>
	<head>
    	<title> M S</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="description" content="FufuriSite with jQuery and CSS3" />
        <meta name="keywords" content="fufuri, portfolio, fufuri portfolio, muhammad, febriansyah, muhammad febriansyah"/>
        <link rel="shortcut icon" href="style/icon.jpg" type="image/x-icon"/>
        <link type="text/css" rel="stylesheet" href="style/login.css">
    </head>
    <body>
		<div id="container">

			<div id="login">
				<h1>Fufuri Management System</h1>
				<form action="cekLogin.php" method="post"><label for="email">Username</label><br />
					<input type="text" id="email" name="username" value="" class="input"/>
					<div style="margin: 1.8em 0 0 0;">
						<label for="passwd">Password:</label><br />
						<input id="passwd" type="password" name="password" class="input" value=""/>

					</div>
					<div>
						<div id="submit"><input type="submit" name="Submit" value="Login" class="button" />
                        <?php
                        	if(isset($_GET['_fufuriCheck'])){
								echo"<span style=\"color:red\">&nbsp--Wrong Password or Username--</span>";
							}
						?>
                        </div>
					</div>
	<script type="text/javascript">
//<![CDATA[
if (document.getElementById('email')) document.getElementById('email').focus();
//]]>
</script>

				</form>

			</div>
			<h2 style="opacity:0"><a href="http://www.mfitsolutions.com">&copy; Copyright by MFIT Solutions. all rights reserved.</a></h2>
		</div>
	</body>
</html>