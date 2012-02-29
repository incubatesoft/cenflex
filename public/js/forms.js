$.fn.focusBlock = function(){
		return this.each(function(){
		if($(this).parent().is("dd")==true){
					var targ = "dd"
					//$("#active_actions").append($(this).parent().text());
				}else if($(this).parent().is("li")==true){
					var targ = "li"
				}
				if($(this).hasClass("text")==true||$(this).is(":text")==true||$(this).is("textarea")==true)
				{
				$(this).live("click", function(){
					alert("clicked");
				});
				$(this).focus(function(){
							//$("#active_actions").html($(targ).text());						
							$(this).closest(targ).addClass("focus").prev("dt").addClass("ar loud");
							
					});
				$(this).livequery("blur", function(){
							$(this).closest(targ).removeClass("focus").prev("dt").removeClass("ar loud");
							if($(this).hasClass("required") == true )
								$(this).valid();
								  });
					
				}else if($(this).is("select")==true){
					$(this).mousedown(function(){
							$(this).closest(targ).addClass("focus").prev("dt").addClass("ar loud");
								  });
					if($.browser.msie != true)
					{
					$(this).focus(function(){
							$(this).closest(targ).addClass("focus").prev("dt").addClass("ar loud");
								  });
					}
					$(this).blur(function(){
							$(this).closest(targ).removeClass("focus").prev("dt").removeClass("ar loud");
							if($(this).hasClass("required") == true )
								$(this).valid();
								  });
				}
								  });
								  
	}
$.fn.collapsible = function(){
	return this.each(function(){
			if($(this).hasClass(".section")==true){
				$(this).addClass("collapsible").children("h3").prepend("<img src='"+imgpath+"' class='up' width='12' height='10' />");
				$(this).children("h3").click(function(){
					$(this).children("img.up").toggleClass("down").parent().nextAll().slideToggle();
				});
			}
							  });
}
$(function(){
	$(".section input.text, .section textarea, .contentarea input.text, .contentarea textarea").livequery("focus", function(){
			if($(this).parent().is("dd")==true){
					$(this).closest("dd").addClass("focus").prev("dt").addClass("ar loud");
				}else if($(this).parent().is("li")==true){
					$(this).closest("li").addClass("focus").children("label").addClass("ar loud");
				}
	});
	$(".section input.text, .section textarea, .contentarea input.text, .contentarea textarea").livequery("blur", function(){
		if($(this).parent().is("dd")==true){
					$(this).closest("dd").removeClass("focus").prev("dt").removeClass("ar loud");
				}else if($(this).parent().is("li")==true){
					$(this).closest("li").removeClass("focus").children("label").removeClass("ar loud");;
				}
							if($(this).hasClass("required") == true )
								$(this).valid();
	});
	if($.browser.msie != true)
					{
					$(".section select, .contentarea select").livequery("focus", function(){
					if($(this).parent().is("dd")==true){
					var targ = "dd"
				}else if($(this).parent().is("li")==true){
					var targ = "li"
				}
							$(this).closest(targ).addClass("focus").prev("dt").addClass("ar loud");
								  });
					}else{
	$(".section select, .contentarea select").live("mousedown", function(){
			if($(this).parent().is("dd")==true){
					var targ = "dd"
				}else if($(this).parent().is("li")==true){
					var targ = "li"
				}
			$(this).closest(targ).addClass("focus").prev("dt").addClass("ar loud");
	});
	}
	$(".section select, .contentarea select").livequery("blur", function(){
	if($(this).parent().is("dd")==true){
					var targ = "dd"
				}else if($(this).parent().is("li")==true){
					var targ = "li"
				}
		$(this).closest(targ).removeClass("focus").prev("dt").removeClass("ar loud");
							if($(this).hasClass("required") == true )
								$(this).valid();
								  });

});