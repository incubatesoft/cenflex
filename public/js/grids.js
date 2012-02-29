// JavaScript Document

	$(document).ready(function(){
							   
	   var rfqId=$("#rfq_id").val();
	    var catId=$("#catid").val();
		 var url=$("#url").val();
		//alert(rfqId+"------"+catId);
		
	    var w = 0;
		jQuery.each($("#ac_table .row:first > div:visible"), function(){
			w = w + parseInt($(this).width());
		});
		//alert(w+50);
		$(".row").css("min-width", w+50);
		$("#ac_table").scroll(function(){
			xoff = -$(this).scrollLeft();
			//alert(xoff);
			$("#ac_tablehead").css("margin-left", xoff);
		});
		$("#ac_table .row").equalHeights();
		$(".btn").live("mousedown", function(){
			$(this).addClass("btn_press");
		});
		$(".btn").live("mouseup", function(){
			$(this).removeClass("btn_press");
		});
		$("#ac_tablehead .eng").resizable({
											alsoResize: "#ac_table .eng",
											handles: 'e', 
											stop: function(event, ui){
												alert($(this).width())
											}
											});
		$(".message").dialog({
				modal:true, 
				title: "Add a new Term",
				autoOpen: false
			});
		$("#dialog").live("click", function(){
			$(".message").dialog("open");
		});
		$("#msgbox").click(function(){
			//$(".overlay").height($(window).height());
			//$(".overlay").slideDown();
			$.blockUI({message:$('.msgmodal')});
			$('.blockOverlay').attr('title','Click to unblock').click($.unblockUI);
			//$(".msgmodal").fadeIn().css("filter", "none");
		});
		$(".closeme").click(function(){
				$(".msgmodal").fadeOut();
				$.unblockUI();
			});
		$(".h_tab li a").live("click", function(){
		if($(this).hasClass("active_tab")==false){
			$(".active_tab").removeClass("active_tab");
			$(this).addClass("active_tab");
			var tabId = $(this).closest(".ac_display").attr("id")
			$("#"+tabId+" .section").hide();
			$("#"+tabId+" ."+$(this).attr("id")).slideDown();
			}
		})
		//$("#left_nav ul").width($("#left_nav").width())
		//alert($("#left_nav ul").width());
		//alert($("#ac_table").width());
		
		
		//edit butoon click for edit
		/*$(".btn").click(function(){
		alert("ssssssssss");
				$(".readonly").toggle();
									  });*/
		
		//leftnav trigger
		 var left_queryString="&rfqId="+rfqId;
		$.ajax({
				   type: "POST",
				   url: base_url+'new/listview/leftnav',
				   data: left_queryString,
				   beforeSend: function(){
					    $("#left_nav").html($(".spinner").clone());
				   },
				   success: function(html){
				  var ajaxDisplay = document.getElementById('left_nav');
			ajaxDisplay.innerHTML = html;
			$(".parent_nav li a:first").trigger("click");
			
					},
					complete: function(){
						}
				 });
				 //rightside
				 var queryString="&rfqId="+rfqId+"&catId="+catId+"&url="+url;
			 $.ajax({
			   type: "POST",
			   url: base_url+'new/listview/rightnav',
			   data: queryString,
			   beforeSend: function(){
					$("#active_content").html($(".spinner").clone());
			   },
			   success: function(html){
			  
			  var ajaxDisplay = document.getElementById('active_content');
				ajaxDisplay.innerHTML = html;
				$(".parent_nav li a:first").trigger("click");
				$(".date").datepicker();
				},
				complete: function(){
				
					}
				 });
		
		//Left Nav
			$(".parent_nav li a").live("click", function(){
			var id=$(this).attr("rel");
			$(".ac_display").hide();
			$(id).show();
			$(".active_nav").removeClass("active_nav");
			$(this).addClass("active_nav");
			
			});
		$(".edit_sec").live("click",function(){
		$(this).closest(".section").children(".readonly").toggle();
				$(this).hide();
				$(this).closest(".btn_bar").children(".save_sec").show();
	
	});
	$(".continue").live("click", function(){
		$(".active_tab").parent().next().children("a").trigger("click");
	});
	$(".back").live("click", function(){
		$(".active_tab").parent().prev().children("a").trigger("click");
	});
	$(".bac_nav").live("click", function(){
		$(".active_nav").parent().prev().children("a").trigger("click");
	});
	$(".adv_nav").live("click", function(){
		$(".active_nav").parent().next().children("a").trigger("click");
	});
	$(".sradio").live("click",function() { 
		if($(this).attr("id")=="shipping_new")
		{
			$("#shipping_otherzip").removeAttr("readonly"); 
			$("#shipping_otherzip").focus();
		}
		else
		{
		$("#shipping_otherzip").val(""); 
		$("#shipping_otherzip").attr("readonly","readonly"); 
		}
	});
	$(".save_sec").live("click",function(){
		var formName=$(this).closest("form").attr("name");
		//alert(formName)
		var formID = $("form[name='" + $(this).closest("form").attr("name") + "']\"");
		var oldForm = $("form[name='" + $(this).closest("form").attr("name") + "']:first\"")
		var holderId = $(this).closest(".section").attr("id");		
		 var str = $(this).closest("form").serialize();
		// alert(holderId);
			//alert(str);
				$.ajax({
			   type: "POST",
			   dataType: 'html',
			   url: base_url+'new/listview/'+formName,
			   data: str,
			   beforeSend: function(){
				$("#"+holderId).html($(".spinner").clone());
			   },
			   success: function(html){
			   formID.replaceWith(html);
			  // oldForm.remove();
			   $("#"+holderId).show();
				$(".active_nav").trigger("click");
				},
				complete: function(){
					
					}
				 });
	})
	
		
		
	});
	
