<style>
body{
	font: normal .80em 'trebuchet ms', arial, sans-serif !important;
	background:url(background.png) !important;
}
h1, h2, h3, h4, h5, h6{
	font: normal 175% 'century gothic', arial, sans-serif !important;
	margin: 0 0 15px 0 !important;
	padding: 15px 0 5px 0 !important;
}
.center table { margin:0 !important}
a:link {color: #fff !important;}
a:hover {text-decoration: none !important;}
table{
	float:left !important;	
	background:#000 !important;
	
	-moz-box-shadow: 0 1px 3px rgba(0,0,0,0.5);
	-webkit-box-shadow: 0 1px 3px rgba(0,0,0,0.5);
	box-shadow: 0 1px 3px rgba(0,0,0,0.5);
}
td{
	white-space:normal;
	padding:10px;
	border:none !important;
	color: #777;
}
#accountMenu a{
	background-color:#000;	
}
.off a{
	background-color:#2daebf !important;	
}
#content{
	position:relative;
	float: left;
	text-align: justify;
	width: 78%;
	padding-right:2%;
	padding-left:2%;
	z-index:9999;
	box-shadow:0 0 5px #000;
	min-height:850px;
}
</style>
<script type="text/javascript">
	$(document).ready(function(){
		$("td").removeClass();
	});
</script>
<?php
echo "
<h1 style=\"clear:both;border-bottom:1px solid #91bd09;color:#91bd09;\">MySQL Info</h1>
<table>
<tr><td>Server Version</td><td>".mysql_get_server_info()."</td></tr>
<tr><td>Client Version</td><td>".mysql_get_client_info()."</td></tr>
<tr><td>Protocol</td><td>".mysql_get_proto_info()."</td></tr>
<tr><td>Host at</td><td>".mysql_get_host_info()."</td></tr>
</table>
</div>
<h1 style=\"clear:both;border-bottom:1px solid #91bd09;color:#91bd09;\">PHP Info</h1>";
echo str_ireplace("1", "", phpinfo(1));
?>