<?php
	function init_tc_client(){
		global $baseUrl;
		$to = $_POST["email"];
		$from = $_POST["email"];
		$subject = "IES Helpdesk Account";
		$message = '
			Hi,<br/><br/>
			Your account has been made.<br/><br/>
			Username : '.$_POST["username"].'.<br/>
			Password : '.$_POST["password"].'.<br/><br/>
			Please follow the link below to log in:<br/>
			<a href="'.$baseUrl.'/home/login.html">'.$baseUrl.'/home/login.html</a>
			<br/><br/>
			Regards,<br/>
			IES NUSANTARA
		';
		$headers  = "From: $from\r\n"; 
		$headers .= "Content-type: text/html\r\n";
		mail($to, $subject, $message, $headers);
		alert("confirmation sent to ".$_POST["email"]);
	};
?>