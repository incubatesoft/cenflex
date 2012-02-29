$(document).ready(function(){
	
	/**start: none view edit radios **/
	$("ul.form_details li img").live("click", function(){
		if(!$(this).hasClass("selected") && $(this).hasClass("active")){
			$(this).closest("li").children("img").removeClass("selected");
			$(this).addClass("selected");
			$(this).closest("li").children("input[rel='access_details']").val($(this).attr("rel"));
			
			var selected = $(this).closest(".form_details").children("li").children("img[rel='" + $(this).attr("rel") + "'].selected").length;
			var total = $(this).closest(".form_details").children("li").children("img[rel='" + $(this).attr("rel") + "']").length;
			
			var myParent = $(this).closest(".has_children").children(".form_access").children("li[rel='"+ $(this).attr("rel") +"']").children("a").children("span").children("span").children("img");
			var myParentSiblings = $(this).closest(".has_children").children(".form_access").children("li[rel!='"+ $(this).attr("rel") +"']").children("a").children("span").children("span").children("img");
			
			if(selected == total){
				$(myParent).addClass("full").removeClass("partial");
				$(myParentSiblings).removeClass("full").removeClass("partial");
				
				 $(this).closest(".has_children").children(".form_access").children("li").removeClass("selected");
				 $(this).closest(".has_children").children(".form_access").children("li[rel='"+ $(this).attr("rel") +"']").addClass("selected");
				
			} else if(selected > 0){
				$(myParent).removeClass("full").addClass("partial");
				$(myParentSiblings).removeClass("full").addClass("partial");
			} else{
				$(myParent).removeClass("full").removeClass("partial");
			}
			
		}
	});
	/**start: none view edit radios **/
	
	/**start: ai component**/
	$("ul.comp_ai li a").live("click", function(){
	
		if($(this).closest("ul").hasClass("active") && !$(this).parent("li").hasClass("selected") && !$(this).parent("li").hasClass("disable")){
			var comp_id = $(this).closest("ul");
			$(comp_id).children("li").removeClass("selected");			
			$(this).parent("li").addClass("selected");
			$($(comp_id).attr("status")).attr("value", $(this).attr("rel"));
		}
		
	});
	/**end: ai component**/
	
	/**start: none vie edit component**/
	$("ul.comp_radio li a").live("click", function(){
	
		if($(this).closest("ul").hasClass("active") && !$(this).parent("li").hasClass("selected") && !$(this).parent("li").hasClass("disable")){
			var comp_id = $(this).closest("ul");
			$(comp_id).children("li").removeClass("selected");			
			$(this).parent("li").addClass("selected");
			$($(comp_id).attr("status")).attr("value", $(this).attr("rel"));
		}
		
	});
	/**end: none vie edit component**/

	/**start: none view edit form access - new component**/
	$("ul.comp_radio.form_access li a").live("click", function(){
	
		if($(this).closest("ul").hasClass("active")){

			var comp_id = $(this).closest("ul");
			$($(comp_id).attr("rel")).children("li").removeClass("selected");			
			$(this).parent("li").addClass("selected");
			$($(comp_id).attr("status")).attr("value", $(this).attr("rel"));
			
			/**/
			$(this).parent("li").siblings().children("a").children("span").children("span").children("img").removeClass("full partial");
			$(this).children("span").children("span").children("img").addClass("full");
			/**/
						
			var accessElement = eval($(this).attr("rel"));
			var objId = $(this).closest("ul").attr("access");
			$(objId).children("li").children("img").removeClass("active selected");
			
			$(objId).children("li").children("img").each(
				function(index){
					if(eval($(this).attr("rel")) < accessElement)
						$(this).addClass("active");
					else if(eval($(this).attr("rel")) == accessElement){
						$(this).addClass("active").addClass("selected");
						$(this).closest("li").children("input[rel='access_details']").val($(this).attr("rel"));	
					}
						
					else
						$(this).removeClass("active");
				}
			);
			
		}
		
	});
	/**start: none view edit form access - new component**/
	
	
	/*$(document).livequery(function(){
									  
									  $("#newUsers").validate({
		errorElement: "div",
		errorContainer: $(".err"),
		errorPlacement: function(error, element) {
		if(element.parent().is("li")==true){
			error.appendTo(element.closest("li"));
			element.closest("li").addClass("err")
		} else{
				error.appendTo(element.closest("dd"));
				element.closest("dd").addClass("err")
			}
		},
		success: function(label) {
			label.hide().closest(".err").removeClass("err");
		},
		submitHandler:function(form) {
			//alert(form_name)
			//ajax_submit(form);
			
				ajax_submitInsert(newUsers);										
		},
		rules: {
			number: {
				required:true,
				minLength:3,
				maxLength:15,
				number:true	
			},
			secret: "buga",
			math: {
				equal: 11	
			}
		}
	});
									  })*/
	
	/**start: message box component**/
	$("#add_user_btn.active").live("click", function(){
		if(!($("#changesMade").hasClass("changed")))
			{
					$("#new_user_form").html("");
                                      
					$.blockUI({message:$('.msgmodal.add_user_form')});
					$(".add_user_form .modal_title").text("Add User");
					//$(".msgmodal").addClass("add_user_form");
						
					//alert("ddddddd");
					$.ajax({
									   type: "POST",
									   url: base_url+'admin/adminlistview/addNewUserForm',
									  // data: query_str,
									   beforeSend: function(){
										 $("#new_user_form").html("<img src='"+ base_spinner + "' style='margin-top: 120px; margin-left: 350px;'>");

										 // alert("")
					
									   },
										error:function() {
										//alert("srinu");
									   },
									   success: function(html){
											
											
                                            $("#add_user_box").html(html);
											$("#new_user_form").html($("#add_user_box").html());
											$(".username_new").focus();
											$(".username_new").live("keyup", function(){//alert('f');
												if($(this).parent().children(".error").length > 0)
													$(".username_exists").hide();
											});
											
										},
										complete: function(){
											//alert(active_id)
											//if(searchterm!="Search..")
											//showSearchResults();
											}
									 });
		
			} 
			else
			{
				//$("#notify_error").slideDown();
				showNotification();
			}
		
		
		
	});
	
	$("#add_dept_btn").live("click", function(){
		//if(!($("#changesMade").hasClass("changed")))
		//{	
			//$(".msgmodal").removeClass("add_user_form");
			var dept_name= new Array();
			$(".department_contentarea h3 > img").each(function(){
				dept_name.push("'"+$(this).attr("rdept")+"'");
			});
			//alert(dept_name)
			var userId=$(".active_nav").attr("id");
			var query_str="&userId="+userId+"&deptids="+dept_name;
			$("#new_dept_form").html("");
			
			$(".add_dept_form .modal_title").html("Add Department - <span class='small_txt'>"+$(".active_nav").html()+"</span>");
			
			 $.blockUI({message:$('.msgmodal.add_dept_form')});
		
		
			$.ajax({
							   type: "POST",
							   url: base_url+'admin/adminlistview/getDepartments',
							   data: query_str,
							   beforeSend: function(){
			
							 //  alert(base_url+'admin/adminlistview/view_usersLeftnav')
								   //$("#left_nav").html('<img src="'+base_spinner+'" />');
							   },
								error:function() {
								//alert("srinu");
							   },
							   success: function(html){
									//alert(html);
									 $("#dept_Names").html(html);
									 $("#new_dept_form").html($("#add_dept_box").html());
									
		
								},
								complete: function(){									 
									//alert(active_id)
									//if(searchterm!="Search..")
									//showSearchResults();
									}
							 });
		//}else{
				//showNotification();
			//}
	
	});
	
	$(".closeme, .cancel_msg_btn").live("click", function(){
		$("#new_user_form").html("");
		$(".msgmodal").fadeOut();
		$.unblockUI();
	});
	/**end: message box component**/
	
	/***start: left navigation children view**/
	$(".form_access_label").live("click", function(){
		$(this).children("img").toggleClass("expand");
		$(this).closest("li").children(".child_form").toggle();
		$(this).closest("li").toggleClass("has_children")
	});
	/**end: children slideDown**/
	
	
	/**start: search**/ 
	if($("input.search").val()=="" || $("input.search").val()=="Search.."){
		$("input.search").val($("input.search").attr("title")).addClass("blur");
	}else{
		$(".clear_search").show();
		//$("#search_display").show().text("Search Results for.."+$("input.search").val());
	}
	$(".search").focus(function(){
		if(!($("#changesMade").hasClass("changed")))
		{				
			if($(this).val()==$(this).attr("title"))
				$(this).val("").removeClass("blur")
				
		}
		else
		{    
			$(this).attr("readonly","readonly");
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
	/**end: search**/ 
	
	/**start: notification**/
	$(".notification.no").live("click", function(){
		$("#cancel_btn").trigger("click");		
	});
	$(".notification.yes").live("click", function(){
		$("#save_btn.active").trigger("click");		
	});
	/**end: notification**/
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

function setUserDefaultPool(obj_pool){
	
	$("ul[poolaccess='"+ $(obj_pool).attr("id") + "']").children("li:nth-child(2)").removeClass("disable");
	
	var obj_id = $("#" + $(obj_pool).attr("id") + " :selected").val();
	var comp_id =  "#" + $(obj_pool).attr("rel") + obj_id;
	$(comp_id).children("li").removeClass("selected");
	$(comp_id).children("li:nth-child(2)").addClass("disable");
	if($(comp_id).children("li:nth-child(1)").children("input").val() == 0)
		$(comp_id).children("li:nth-child(3)").children("a").trigger("click");
	else{
		var c = eval($(comp_id).children("li:nth-child(1)").children("input").val()) + 2;		
		$(comp_id).children("li:nth-child("+c+")").children("a").trigger("click");
		}
}

function setActiveState(){
	$(".form_details").each(function(i){
		
		if($(this).children("li").children("img.a_2.active").length > 0){
			//$(this).closest("li").children(".comp_radio.active").children("li:nth-child(3)").addClass("selected");
			$(this).children("li").children("img.a_2").addClass("active");
		}/*else{
			$(this).closest("li").children(".comp_radio.active").children("li:nth-child(2)").removeClass("active");
		}*/
	
	});
}
function resetformDetails(){
	$(".form_details").each(function(i){
		 var li = $(this).children("li");
		 
		 $(li).each(function(){
				var activeChild = eval($(this).children("input").val()) + 2;
				$(this).children("img").removeClass("selected");
				$(this).children("img:nth-child("+ activeChild +")").addClass("selected");			
		});
		
			
		if($(this).children("li").children("img.a_2.selected").length > 0){
			$(this).children("li").children("img.a_2").addClass("active");
		}else{
			$(this).children("li").children("img.a_2").removeClass("active");
		}
	
	});
}

function resetStatus(){
	$("ul.comp_ai").each(
				 
		function(){
			var obj_id = $(this).attr("id");
			var active_status = $("#" + obj_id + "  li:first > input").val();
			$("#" + obj_id + " li").removeClass("selected");
			$("#" + obj_id + " li[rel="+ active_status +"]").addClass("selected");
		}
	);
}
function resetRadio(){
	$("ul.comp_radio").each(
				 
		function(){
			var obj_id = $(this).attr("id");
			var active_status = eval($("#" + obj_id + "  li:first > input").val());
			$("#" + obj_id + " li").removeClass("selected");
			
			if(active_status == -1)
				active_status += 2;
			
			$("#" + obj_id + " li[rel="+ active_status +"]").addClass("selected");
		}
	);
}
function resetFormAccessStatus(){
	$("ul.comp_radio.form_access").each(
				 
		function(){
			var obj_id = $(this).attr("id");
			var active_status = eval($("#" + obj_id + "  li:first > input").val());
			$("#" + obj_id + " li a img.status").removeClass("full partial");
			if(active_status == -1)
				$("#" + obj_id + " li a img.status").addClass("partial");
			else
				$("#" + obj_id + " li[rel="+ active_status +"] a img.status").addClass("full");
		}
	);
}
function resetPool(){
	var selectedpool = "#pcomp_ai_" + $("#user_pool :selected").val();
	$("ul.resetpool").each(
				 
		function(){
			var obj_id = $(this).attr("id");
			var active_status = $("#" + obj_id + "  li:first > input").val();
			$("#" + obj_id + " li").removeClass("selected disable");
			$("#" + obj_id + " li[rel="+ active_status +"]").addClass("selected");
		}
	);
	$(selectedpool).children("li:nth-child(2)").addClass("disable");
}
function showNotification(){
	$("#active_content").animate({top: "57px"}, 200);
	$("#notify_error").slideDown(200);
}
function hideNotification(){
	$("#active_content").animate({top: "0px"}, 200);
	$("#notify_error").slideUp(200);
}