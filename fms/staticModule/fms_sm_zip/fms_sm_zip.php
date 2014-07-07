<script>
	$(function(){
		$('body').append("<div id='fufuriFunction'></p>");	
	});
	function zip(){
		$('#fufuriFunction').load('/fufuriFramework/function/fufuri_zip.php?file=fms');
	}
</script>
<input type="button" onclick="zip()" value="click"/>