<script type="text/javascript" src="../plugin/jquery-1.6.2.min.js"></script>
<script type="text/javascript" src="../plugin/jquery-ui-1.8.16.min.js"></script>
<link rel="stylesheet" type="text/css" href="../plugin/dataTables/smoothness/jquery-ui-1.8.4.custom.css">
<style>
	#example td:hover{
		background:#0aF !important;	
	}
	#example a:hover{
		background:#0aF !important;	
	}
	#example tr:hover td{
		color:#fff !important;	
		background:#3CF;	
	}
</style>
<!--<sortable>-->
	<script src="../plugin/ui/jquery.ui.sortable.min.js"></script>
	<style>	
        .sortable{ list-style-type: none;}
		.sortable li, .sortableSidebar li{ 			
			border:none;
			background:none;
			margin:5px;
			color:#599100 !important;
			cursor:move;
		}
		.sortable li{
			float:left;
			overflow:hidden;
		}
		.ui-state-default{
			color:#599100 !important;
		}
    </style>
    <script>
		$(function() {
			$(".sortable").sortable({revert: true, cancel: "img"});
			$(".sortable").disableSelection();
		});
	</script>
<!--</sortable>-->
<!--<current>-->
    <?php 
        $url = $_SERVER['REQUEST_URI'];
        $url = explode('/', $url);
        $url = $url[sizeof($url)-1];
        $url = "$url";
    ?>
    <script type="text/javascript">
        var url = ("<?php echo $url ?>");
        $(document).ready(function(){
            $("#topBarMenu li").removeClass();
            var menu = $("#topBarMenu li").get();
            var innerMenu;
            for (var i = 0; i < menu.length; i++) {
                innermenu=($("ul#topBarMenu a:eq("+i+")").attr("href"));
                if(innermenu==url){
                    $("#topBarMenu li:eq("+i+") a").addClass("selected");
                }else{
					$("#topBarMenu li:eq("+i+") a").addClass("unSelected");
				}
            }
        });
    </script>
<!--</current>-->
<!--<opacity>-->
	<script type="text/javascript">
        $(document).ready(function() {
			$('.unSelected').bind('mouseenter',function(){
				$(this).stop().animate({'opacity':'1'});
			}).bind('mouseleave',function(){
				$(this).stop().animate({'opacity':'0.7'});
			});
    		$('img').bind('mouseleave',function(){
				$(this).stop().animate({'opacity':'1'});
			}).bind('mouseenter',function(){
				$(this).stop().animate({'opacity':'0.7'});
			});
         });
    </script>
    <style>
		.unSelected{
			opacity:0.7;
		}
	</style>
<!--</opacity>-->
<!--<zurbButton>-->
	<link rel="stylesheet" type="text/css" href="../plugin/zurbButton/global.css" title="style" />
<!--</zurbButton>-->
<!--<ToolTip>-->
	<script src="../plugin/tooltip/main.js" type="text/javascript"></script>
    <style>
	#preview{
		max-height:260px;
		position:fixed;
		border:1px solid #fff;
		background:#fff;
		padding:5px;
		display:none;
		margin:20px;
		-moz-box-shadow: 0 0 6px #000;
		-moz-border-radius:10px;
		-webkit-box-shadow: 0 0 6px #000;
		-webkit-border-radius:10px;
		box-shadow: 0 0 6px #000;
		border-radius:10px;
		size:10px;
		color:#599100;
		text-align:center;
		z-index:99999;
	}
	</style>
<!--</ToolTip>-->
<!--<current>-->
	<?php 
		$url = $_SERVER['REQUEST_URI'];
		$url = explode('/', $url);
		$url = $url[sizeof($url)-1];
		$url = "$url";
	?>
	<script type="text/javascript">
		var url = ("<?php echo $url ?>");
		$(document).ready(function(){
			$("#menu li").removeClass();
			var menu = $("#menu li").get();
			var innerMenu;
			for (var i = 0; i < menu.length; i++) {
				innermenu=($("ul#menu a:eq("+i+")").attr("href"));
				if(innermenu==url){
					$("#menu li:eq("+i+")").addClass("selected");
				}
			}
		});
	</script>
<!--</current>-->
<!--<content>-->
	<script type="text/javascript">
		$(document).ready(function() {
			$('#container').fadeIn();
		});
	</script>
<!--</content>-->
<!--<fancybox>-->
	<script type="text/javascript" src="../plugin/fancyBox/jquery.mousewheel-3.0.4.pack.js"></script>
    <script type="text/javascript" src="../plugin/fancyBox/jquery.fancybox-1.3.4.pack.js"></script>
    <link rel="stylesheet" type="text/css" href="../plugin/fancyBox/jquery.fancybox-1.3.4.css" media="screen" />
    <script type="text/javascript">
		$(document).ready(function() {
			$("a[rel=example_group1]").fancybox({
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'titlePosition' 	: 'over',
				'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
					return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
				}
			});
			$("a[rel=example_group2]").fancybox({
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'titlePosition' 	: 'over',
				'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
					return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
				}
			});
		});
	</script>
<!--</fancybox>-->
<?php
function getInitiatedWYSIWYG(){
?>
<!--<TinyMCE>-->
	<script language="javascript" type="text/javascript" src="../wysiwyg/tiny_mce.js"></script>
    <script language="javascript" type="text/javascript">
        tinyMCE.init({
            mode : "exact",
            theme : "advanced",
			elements : "wysiwyg",
			plugins : "table,youtube,advhr,advimage,advlink,emotions,flash,searchreplace,paste,directionality,noneditable,contextmenu",
			theme_advanced_buttons1_add : "fontselect,fontsizeselect",
			theme_advanced_buttons2_add : "separator,preview,zoom,separator,forecolor,backcolor,liststyle",
			theme_advanced_buttons2_add_before: "cut,copy,paste,separator,search,replace,separator",
			theme_advanced_buttons3_add_before : "tablecontrols,separator,youtube,separator",
			theme_advanced_buttons3_add : "emotions,flash",
			theme_advanced_toolbar_location : "top",
			theme_advanced_toolbar_align : "left",
			theme_advanced_statusbar_location : "bottom",
			extended_valid_elements : "hr[class|width|size|noshade]",
			file_browser_callback : "fileBrowserCallBack",
			paste_use_dialog : false,
			theme_advanced_resizing : true,
			theme_advanced_resize_horizontal : false,
			theme_advanced_link_targets : "_something=My somthing;_something2=My somthing2;_something3=My somthing3;",
			apply_source_formatting : true
        });
    
        function fileBrowserCallBack(field_name, url, type, win) {
            var connector = "../../filemanager/browser.html?Connector=connectors/php/connector.php";
            var enableAutoTypeSelection = true;
            
            var cType;
            tinymcpuk_field = field_name;
            tinymcpuk = win;
            
            switch (type) {
                case "image":
                    cType = "Image";
                    break;
                case "flash":
                    cType = "Flash";
                    break;
                case "file":
                    cType = "File";
                    break;
            }
            
            if (enableAutoTypeSelection && cType) {
                connector += "&Type=" + cType;
            }
            
            window.open(connector, "tinymcpuk", "modal,width=600,height=400");
        }
    </script>
<!--</TinyMCE-->
<?php		
}function getInitiatedDataTables(){
?>
<!--<dataTables>-->
	<link rel="stylesheet" type="text/css" href="../plugin/dataTables/css/demo_table_jui.css">
	<script type="text/javascript" language="javascript" src="../plugin/dataTables/jquery.dataTables.min.js"></script>
	<script type="text/javascript" charset="utf-8">
		$(document).ready(function() {
			oTable = $('#example').dataTable({
				"bJQueryUI": true,
				"sPaginationType": "full_numbers",
				"sScrollX": "100%",
				"sScrollXInner": "110%",
				"bScrollCollapse": true,
				 "aaSorting": [[ 0, "asc" ]]
			});
		} );
	</script>
<!--</dataTables>-->
<!--<confirm>-->
	<script>
		var doConfirm = function(id){
			var link = document.getElementById(id);
				if(confirm("hapus data ini selamanya?")){
				return true;
			}
			else{
				return false;
			}
		}
	</script>
<!--</confirm>-->
<?php		
}function getInitiatedForm(){
?>
<!--</datepicker>-->
	<style>#ui-datepicker-div { display: none; }</style>
	<script>
		$(function() {
			if($(".datepicker").eq(0).val()!=null){
				value = [""];
				len = $(".datepicker").length;
				for(i=0;i<len;i++){
					value[i] = $(".datepicker").eq(i).val();
				}
				$(".datepicker").datepicker({
					changeMonth: true,
					changeYear: true
				}).datepicker("option","dateFormat","yy-mm-dd");
				for(i=0;i<len;i++){
					$(".datepicker").eq(i).val(value[i]);
				}
			}
		});
	</script>
<!--</datepicker>-->
<!--</validation>-->
	<link rel="stylesheet" type="text/css" href="../plugin/jqueryValidators/validationEngine.css" title="style" />
	<script src="../plugin/jqueryValidators/jqueryValidators.js" type="text/javascript" charset="utf-8"></script>
	<script src="../plugin/jqueryValidators/jqueryValidators2.js" type="text/javascript" charset="utf-8"></script>
	<script>
		$(document).ready(function(){
			$("#insertForm").validationEngine();
		});
	</script>
<!--</validation>-->
<?php		
}
?>

<script type="text/javascript">
	$(document).ready(function() {
		$(".form-group:odd").addClass("even");
		$(".form-group:even").addClass("odd");
		sidebarHeight =  parseFloat(($(".sidebar").css("height")).replace(/px/g, ""));
		contentHeight = parseFloat(($("#content").css("height")).replace(/px/g, ""));
		//alert(contentHeight)
		if(contentHeight<sidebarHeight){
			$("#content").css("height", sidebarHeight)
		}
	});  
</script>