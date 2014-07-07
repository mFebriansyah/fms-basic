/*
 * Image preview script 
 * powered by jQuery (http://www.jquery.com)
 * 
 * written by Alen Grakalic (http://cssglobe.com)
 * 
 * for more info visit http://cssglobe.com/post/1695/easiest-tooltip-and-image-preview-using-jquery
 *
 */
 
this.imagePreview = function(){	
	/* CONFIG */
		
		xOffset = 10;
		yOffset = 30;
		
		// these 2 variable determine popup's distance from the cursor
		// you might want to adjust to get the right result
		
	/* END CONFIG */
	$("a.preview").hover(function(e){
		this.t = this.title;
		this.title = "";	
		var c = (this.t != "") ? "" + this.t : "";
		$("body").append("<div id='preview'><img style=\"max-height:260px;\" src='"+ this.id +"' alt='"+ c +"' /></div>");	
								 
		$("#preview")
			.css("bottom","0px")
			.css("right","0px")
			.fadeIn("fast");
			$("#preview img")
			.css("height","inherit")
			.fadeIn("fast");		
							
    },
	function(){
		this.title = this.t;	
		$("#preview").remove();
    });	
	$("a.preview").mousemove(function(e){
		$("#preview")
			.css("bottom","0px")
			.css("right","0px");
	});			
};


// starting the script on page load
$(document).ready(function(){
	imagePreview();
});