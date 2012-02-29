// JavaScript Document
$(document).ready(function(){
 
		/**start: custom navigation bar**/
	   $("ul.pbtnc li a").live("click", function(){
				var objLi = $(this).parent();
				objLi.siblings().removeClass("pbtn_selected");
				objLi.addClass("pbtn_selected");
				//showSearchResults();
		});
		/**end: custom navigation bar**/

		
		//**start: adding new row**//
		$("#add_company").live("click", function(){
			if(!$("#conChanged").hasClass("changed") && !$(".parent_nav li").hasClass('last_nav.i'))
			{
				$(".active_nav").removeClass("active_nav");
				$(".last_nav:first").clone().appendTo("#left_nav ul.parent_nav").show().addClass("i");
				$("#left_nav ul.parent_nav").scrollTo($("#left_nav ul.parent_nav li.i:last"), 10);
				//alert("sssss");
				
				$.ajax({
					   type: "POST",
					   url: base_url+"contacts/addcompany",
					  
					   success: function(html){		 
						   //alert(html)
						   //alert("ssss");
						   $("#right_content").html(html);
						   validate("insertcontacts_info");
						  // $("#com_cname").focus();
				   		}
				 });
			}
			else
			{
				//alert("Please Save the Contact Details");
				$("#left_nav ul.parent_nav").scrollTo($("#left_nav ul.parent_nav li.i:last"), 10);
				showNotification();
			}
		});		
		/**end: adding new row**/
		
		/**start: add empty form while clicking on new company**/
		$("ul.parent_nav li.last_nav.i").live("click", function(){
			if(!$("#active_right_content_header").hasClass("new_company_form")){
				$.ajax({
						type: "POST",
						url: base_url+"contacts/addcompany",	  
						success: function(html){
								   $("#right_content").html(html)
								   validate("insertcontacts_info");
								}
					});	
			}else{
				$("#com_cname").focus();
				$("#left_nav ul.parent_nav").scrollTo($("#left_nav ul.parent_nav li.i:last"), 10);
			}		
		});
		/**end: add empty form while clicking on new company**/
		
		/**start: horizontal tab script**/
		$("ul.horizontal_tab li a").live("click", function(){
			if(!$(this).hasClass("disabled_tab") && !$(this).hasClass("active_tab")){	
				$(".active_tab").removeClass("active_tab");
				$(".active_section").removeClass("active_section");
				$(this).addClass("active_tab");
				
				var sectionId = $(this).attr("navigate");
				$("#contacts_contentarea .section").hide();
				$("#contacts_contentarea " + sectionId).addClass("active_section");
				$("#contacts_contentarea " + sectionId).show();
			}		
		});
		/**end: horizontal tab script**/
		
		/**start: toggle edit & readonly script**/
		$("#edit_btn").live("click", function(){
			if($.browser.msie)
				$("#contentarea").css("min-height", $("#contentarea").height() + "px");
				
			$(".section").addClass("editing_mode");
			$(".section .visible_content").css("min-height", "30px");	
			
			$(".section").show();
			$(".section .visible_content").toggle();
			$(".section").hide();
			$(".section.active_section").show();
				
			$("span.comp_name_ro").hide();
			$("input.comp_name_txt").val($("span.comp_name_ro").html());
			$("input.comp_name_txt").show().focus();
			
			$(this).hide();			
			$(this).parent("div").children(".scl").show();
		});
		/**end: toggle edit & readonly script**/
		

		/**start: cancel **/
		$("#cancel_btn").live("click",function(){
			//$("#notify_error").slideUp();
			
			if($.browser.msie)
				$("#contentarea").css("min-height", $("#contentarea").height() + "px");
				
			hideNotification();
			$("#conChanged").removeClass("changed") 
			$(".err").removeClass("err");
			$("div.error.not('notes')").remove();
			$("#save_btn").addClass("active main_btn");
			$("#contacts_info")[0].reset();
			$("#com_empty").removeClass("visible").hide().closest(".header").removeClass("err");
			$(".search").attr("readonly","");
			$(".section").removeClass("editing_section");
			$(".section .visible_content").css("min-height", "30px");
			
			$(".section").show();
			$(".section .visible_content").toggle();
			$(".section").hide();
			$(".section.active_section").show();
			
			$("span.comp_name_ro").show();
			$("input.comp_name_txt").hide();	
			$("#com_exist").removeClass("visible").hide().closest(".header").removeClass("err");
			$("#com_empty").removeClass("visible").hide().closest(".header").removeClass("err");
			$(this).parent("div").children(".scl").hide();
			$(this).parent("div").children("#edit_btn").show();		
		});
		
		//add new comp cancel action
		$("#add_cancel_btn").live("click",function(){
			//$("#notify_error").slideUp();
			//$("#com_cname").preventDefault();
			
			if($.browser.msie)
				$("#contentarea").css("min-height", $("#contentarea").height() + "px");
			
			hideNotification();
			$(".new_company_form").removeClass("new_company_form");
			$("#conChanged").removeClass("changed");
			$("#com_empty").removeClass("visible").hide().parent().removeClass("err");
			$(".err").removeClass("err");
			$("div.error").remove();
			$("#add_save_btn").addClass("active main_btn");
			load_contacts(0);
			$(".parent_nav").scrollTo(0, 100);
		});
		
		
		/**start: search**/ 
		if($("input.search").val()=="" || $("input.search").val()=="Search.."){
			$("input.search").val($("input.search").attr("title")).addClass("blur");
		}else{
			$(".clear_search").show();
			//$("#search_display").show().text("Search Results for.."+$("input.search").val());
		}
		$(".search").focus(function(){
			if(!($("#conChanged").hasClass("changed")))
			{						
				if($(this).val()==$(this).attr("title"))
					$(this).val("").removeClass("blur");	
			}
			else
			{    
				$(this).attr("readonly","readonly");
				//alert("Please Save the Contact Details")	
				//$("#notify_error").slideDown();
				showNotification();
			}
		});
		$(".search").blur(function(){
			if($(this).val()==$(this).attr("title")||$(this).val()==""){
				$(this).val($(this).attr("title")).addClass("blur");
				$(".clear_search").hide();
			}
		});
		/**end: **/
		
		$(".notification.no").live("click", function(){
			$("#cancel_btn").trigger("click");		
		});
		$(".notification.yes").live("click", function(){
			$("#save_btn").trigger("click");		
		});
		$(".notification.add.yes").live("click", function(){
			$("#add_save_btn").trigger("click");		
		});
		$(".notification.add.no").live("click", function(){
			$("#add_cancel_btn").trigger("click");		
		});
		
		 $(".logout, #header ul.nav li > a, .page_heading a").live("click", function(){
																					
					if($("#conChanged").hasClass("changed")){
						
					showNotification();	
						return false;
					}
									});
});
function clearserchTerms(){
	$("input.search").val("").trigger("blur");
	$("#search_display").hide();
}
function showSearchResults(){
	if($(".search_display:visible").length < 1){
		$("ul.parent_nav").animate({top: "28px"});
		$(".search_display").slideDown();
		$(".clear_search").show();
	}
}
function hideSearchResults(){
		$("ul.parent_nav").animate({top: "0px"});
		$(".search_display").slideUp();
		$(".clear_search").hide();
}

function showNotification(){
	$("#active_content_area").animate({top: "88px"}, 100);
	$("#notify_error").slideDown(150);
	$("#active_right_content_header.contacts").css("height", "87px"); 
}
function hideNotification(){
	$("#active_content_area").animate({top: "31px"}, 100);
	$("#notify_error").slideUp(150);
	$("#active_right_content_header.contacts").css("height", "31px");
}


function setFocus(obj){
	$(obj).parent().addClass("focus");
	if($(obj).val() == $(obj).attr("title"))
		$(obj).val("").removeClass("blur");
	
}
function validateMe(obj){
		if(jQuery.trim($(obj).val()).length == 0 || $(obj).val()==$(obj).attr("title")){
			if(!$("#com_exist").hasClass("visible"))
				$("#com_empty").show().addClass("visible").parent().addClass("err");
			
			$("#save_btn").removeClass("active main_btn");
			$("#add_save_btn").removeClass("active main_btn");
			//$(obj).focus();
		}else{
			$("#save_btn").addClass("active main_btn");
			$("#add_save_btn").addClass("active main_btn");
			$("#com_empty").hide().removeClass("visible").parent().removeClass("err");
			$("#com_exist").hide().removeClass("visible").parent().removeClass("err");
		}
}

function validateBlur(obj){
	$(obj).parent().removeClass("focus");
	
	if($(obj).val()==$(obj).attr("title") || $(obj).val()=="")
		$(obj).val($(obj).attr("title")).addClass("blur");

	//if(!$(obj).closest(".header").hasClass("new_company_form"))
	if(jQuery.trim($(obj).val()).length == 0){
		$("#com_empty").show().addClass("visible").parent().addClass("err");
		$("#save_btn").removeClass("active main_btn");
		$("#add_save_btn").removeClass("active main_btn");
	}
	
}
