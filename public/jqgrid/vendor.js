// JavaScript Document
 $(document).ready(function(){   
$("#existingvendors tr td").hover(
			function(){
				$(this).parent().css({backgroundColor:"#fbfbde"});
			},
			function(){
				$(this).parent().css({background:"none"});
								 });
	$("ul.newvendors li a").click(function(){
		$(this).parent().children("ul").slideToggle("fast");
		});
	
	 });