<html>
	<head>
    	<title> F u f u r i  C M S</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="description" content="FufuriSite with jQuery and CSS3" />
        <meta name="keywords" content="fufuri, portfolio, fufuri portfolio, muhammad, febriansyah, muhammad febriansyah"/>
        <link rel="shortcut icon" href="style/icon.jpg" type="image/x-icon"/>
    	<style>
			html{
				height: 100%;
			}
			
			*{
				margin: 0;
				padding: 0;
			}
			body{
				font: normal .80em 'trebuchet ms', arial, sans-serif;
				color: #fff;
				background-image: url(style/wp.jpg);
				background-repeat: repeat, no-repeat;
				background-position: center center;
				background-attachment: fixed;
				-webkit-background-size: auto, cover;
				-moz-background-size: auto, cover;
				-o-background-size: auto, cover;
				background-size: auto, cover;
			}
			#header{
				position:fixed;
				width:100%;
				top:0;
				height:32px;
				border-bottom-left-radius: 15px;
				border-bottom-right-radius: 15px;
				margin:0 auto 0 auto;
				overflow:hidden;
				box-shadow:  0 1px 3px rgba(0,0,0,0.5);
				background-image: url(style/pattern.png);
			}
			#loginForm{
				position:absolute;
				right:70px;
			}
			#login{
				position:absolute;
				right:0px;
				height:22px;
				width:60px;
				padding:5px;
				margin:0px  !important;
				background:#2daebf;
				color:#FFF;
				border-bottom-right-radius: 15px;
				text-align:center;
				text-shadow: 0 -1px 1px rgba(0,0,0,0.25);
			}
			#login:hover{
				opacity:0.7;
				cursor:pointer;
			}
			#login2{
				position:absolute;
				left:0px;
				height:22px;
				width:100px;
				padding:5px;
				margin:0px  !important;
				background:#2daebf;
				color:#FFF;
				border-top-right-radius: 15px;
				border-bottom-left-radius: 15px;
				text-align:center;
				text-shadow: 0 -1px 1px rgba(0,0,0,0.25);
			}
			input, select, textarea, .button{
				float:left;
				text-decoration:none;
				height:34px !important;
				border:1px solid #fff;
				background:#FFF;
				color:#06f;
				padding:3px;
				border-left:1px solid #999;
				background:url(style/background.png);
				margin-top:-1px;
				margin-right:-1px;
			}
			input:-moz-placeholder {
				color: #999;
			}
			#marquee{
				float:left;
				color:#fff;
				width:90%;
				margin-top:5px;
				text-shadow: 0 -1px 1px rgba(0,0,0,0.25);
			}
			#siteContent{
				width:80%;
				margin:10% auto auto auto;
				padding: 0 5% 0 5%;
			}
			.siteContent{
				width:210px;
				margin:0 10px 0 10px;
				box-shadow:  0 1px 3px rgba(0,0,0,25);
				background-image: url(style/pattern.png);
				padding:10px;
				position:absolute;
			}
			.siteContent img{
				margin:0;
				padding:0;
				width:40px;
			}
			#dockContainer{
				width:100%;
				position:fixed;
				bottom:0px;
			}
			#docklet{
				margin:auto;
				width:400px;
				text-align:center;
				box-shadow:  0 1px 3px rgba(0,0,0,25);
				background-image: url(style/pattern.png);
			}
			#docklet img{
				margin-top:5px;
				padding:0;
				width:40px;	
			}
			#titleContainer{
				border-top:1px solid #fff;
				height:24px;
				background:none;
				background:#FFF;
				background-image: url(style/pattern.png);
			}
			#title{
				font-size:24px;
				color:#2daebf;
				text-shadow: 0 -1px 1px rgba(0,0,0,0.25);
			}
			#h,#m,#s{
				float:left;
				height:20px;
				width:20px;
				bottom:0px;
				box-shadow:  2px -2px 2px rgba(0,0,0,25);
				position:absolute;
				bottom:11px;
				text-align:center;
			}
			#h{
				background-color: #2daebf;
				right:80px;
			}
			#m{
				background-color: #e33100;
				right:50px;
			}
			#s{
				background-color: #91bd09;
				right:20px;
			}
			#clock{
				position:fixed;bottom:0px;left:50px;	
			}
			img{
				cursor:pointer;
			}
			#sortable1, #sortable2 { list-style-type: none; margin: 5px; padding: 0; }
			#sortable1 li, #sortable2 li { margin: 5px; padding: 0; float: left; font-size: 4em; text-align: center; }
       		#draggable { width: 150px; height: 150px; padding: 0.5em; }
		</style>
        <script src="../plugin/jquery-1.6.2.min.js"></script>
        <script src="../plugin/watermark/jquery.watermark.min.js"></script>
		<script src="../plugin/ui/jquery.ui.core.min.js"></script>
        <script src="../plugin/ui/jquery.ui.widget.min.js"></script>
        <script src="../plugin/ui/jquery.ui.mouse.min.js"></script>
        <script src="../plugin/ui/jquery.ui.draggable.min.js"></script>
        <script src="../plugin/ui/jquery.ui.sortable.min.js"></script>
        <script>
			$(function() {
			   $(".siteContent").draggable({
					stack:"body div",
					snap: ".siteContent, #header",
					containment: "body"
				});
			});
        	$(function(){
				$('#docklet img').click(function() {
					$("#"+$(this).attr('alt')).animate({height:'toggle', width:'toggle', 'z-index':'99'});
					$(".siteContent").animate({'z-index':'0'});
					getPage($(this).attr('alt'));
				});
				$('#username').watermark('Username  ');
				$('#password').watermark('Password  ');
				$('#docklet img').bind('mouseleave',function(){
					$(this).stop().animate({'margin-bottom':'0px'});
				}).bind('mouseenter',function(){
					$("#title").text($(this).attr('alt')).hide().fadeIn();
					$(this).stop().animate({'margin-bottom':'3%'});
				});
				$('.siteContent img').bind('mouseleave',function(){
					$(this).stop().animate({'opacity':'1'});
				}).bind('mouseenter',function(){
					$(this).stop().animate({'opacity':'0.7'});
				});
			});
			$(function() {
				$( "ul.droptrue" ).sortable({
					connectWith: "ul",
					cancel: "h1",
					revert: true
				});
				$( "#sortable1, #sortable2, #sortable3" ).disableSelection();
			});
			setInterval(function(){
				var currentTime = new Date();
				var h = currentTime.getHours();
				var m = currentTime.getMinutes();
				var s = currentTime.getSeconds();	
				$("#h").text(h);
				$("#m").text(m);
				$("#s").text(s);	
				$("#h").stop().animate({height:((h*3)+20)+'px'});
				$("#m").stop().animate({height:((m*3)+20)+'px'});
				$("#s").stop().animate({height:((s*3)+20)+'px'});
			},1000);
			function login(username, password){
				$.ajax({
					url: "../fufuriFramework/function/fufuri_login.php?username="+username+"&password="+password,
					success: function(data) {
						if(data){
							alert("welcome " + data);
							window.location.href='home.php?content=fms_sm_home';
						}else{
							alert("wrong");
						}
					}
            	});
			}
			function getPage(page){
				$.ajax({
					url: page,
					success: function(data) {
						$("#page").html(data);
					}
            	});
			}
        </script>
    </head>
    <body>
        <div id=header>
        <marquee id="marquee">Please login to use Fufuri Content Management System</marquee>
        	<div id="login2"><a id="" class="login">Fufuri CMS</a></div>
        	<div id="loginForm">
        	<input class="watermark" type="text" id="username" name="username" />
            <input type="password" id="password" name="password" />
            </div>
            <div id="login"><p class="login" onClick="login(username.value, password.value)">Login</p></div>
        </div>
        <div id="siteContent">
        	<div class="siteContent" id="page"></div>
        	<div class="siteContent" id="tools">
                <h1 style="clear:both;border-bottom:1px solid #fff;color:#fff;">Tools</h1>
            	<ul id="sortable1" class='droptrue'>
                    <li class="ui-state-default"><img src="style/png/3dsmax.png"></li>
                    <li class="ui-state-default"><img src="style/png/anki.png"></li>
                    <li class="ui-state-default"><img src="style/png/audition.png"></li>
                    <li class="ui-state-default"><img src="style/png/boxee.png"></li>
                    <li class="ui-state-default"><img src="style/png/calc.png"></li>
                    <li class="ui-state-default"><img src="style/png/calibre.png"></li>
                    <li class="ui-state-default"><img src="style/png/ccleaner.png"></li>
                    <h1 style="clear:both;border-bottom:1px solid #fff;color:#fff;">&nbsp;</h1>
                </ul>
        	</div>
        	<div class="siteContent" id="management">
                <h1 style="clear:both;border-bottom:1px solid #fff;color:#fff;">Management</h1>
            	<ul id="sortable2" class='droptrue'>
                    <li class="ui-state-default"><img src="style/png/3dsmax.png"></li>
                    <li class="ui-state-default"><img src="style/png/anki.png"></li>
                    <li class="ui-state-default"><img src="style/png/audition.png"></li>
                    <li class="ui-state-default"><img src="style/png/boxee.png"></li>
                    <li class="ui-state-default"><img src="style/png/calc.png"></li>
                    <li class="ui-state-default"><img src="style/png/calibre.png"></li>
                    <li class="ui-state-default"><img src="style/png/ccleaner.png"></li>
                    <li class="ui-state-default"><img src="style/png/chat.png"></li>
                    <li class="ui-state-default"><img src="style/png/chrome.png"></li>
                    <li class="ui-state-default"><img src="style/png/daemon.png"></li>
                    <li class="ui-state-default"><img src="style/png/deviant.png"></li>
                    <h1 style="clear:both;border-bottom:1px solid #fff;color:#fff;">&nbsp;</h1>
                    <li class="ui-state-default"><img src="style/png/daemon.png"></li>
                    <li class="ui-state-default"><img src="style/png/deviant.png"></li>
                    <li class="ui-state-default"><img src="style/png/chat.png"></li>
                    <li class="ui-state-default"><img src="style/png/chrome.png"></li>
                </ul>
        	</div>
        	<div class="siteContent" id="clock">
            	<h1 style="clear:both;border-bottom:1px solid #fff;color:#fff;">Clock</h1>
            	<div id="h"></div>
                <div id="m"></div>
                <div id="s"></div>
            </div>
        </div>
        <div id="dockContainer">
            <div id="docklet">
                <img src="style/png/3dsmax.png" alt="tools">
                <img src="style/png/anki.png" alt="management">
                <img src="style/png/audition.png" alt="staticModule/asd.txt">
                <img src="style/png/boxee.png" alt="asdasd">
                <img src="style/png/ccleaner.png" alt="asdasd">
                <img src="style/png/chat.png" alt="asdasd">
                <img src="style/png/chrome.png" alt="asdasd">
                <img src="style/png/daemon.png" alt="daemon">
                <img src="style/png/deviant.png" alt="deviant">
                <div id="titleContainer"><div id="title"></div></div>
            </div>
        </div>
    </body>
</html>