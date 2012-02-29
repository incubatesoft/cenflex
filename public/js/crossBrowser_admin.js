//IE inconsistency fixes
$(function(){
	if($.browser.msie)
	$(".app").addClass("ie");
	
	if($.browser.mozilla)
	$(".app").addClass("firefox")
	
	
	if($.browser.msie){
		$(".ie #contentarea").height($(window).height()-47);
		$(window).resize(function(){
			$(".ie #contentarea").height($(window).height()-47);
		});
	}
	
});