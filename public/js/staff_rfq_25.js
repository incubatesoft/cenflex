// JavaScript Document
	var cont_btn_click = 0;
	//start: showing the save and cancel button
	$(".edit_sec.smallactive").live("click",function(){
		$(this).closest(".section").children(".readonly").css("min-height", "30px");
		$(this).closest(".section").children(".readonly").toggle();
		
		$(this).hide();
		
		$(this).closest(".btn_bar").children(".scl").show();
		
		if($(".rem_php").length > 0)
			resetRemovedVendors($(this).closest(".options").attr("id"));
		
		toggleView($(this).closest(".section").children(".estimates_section").children(".template_sec"));
		
		$(this).closest(".section").children(".estimates_section.tot").toggleClass("edit_view");
		
		$(this).closest(".est_btn_bar.btn_bar").toggleClass("est_editing");
			

	});
	//end: showing the save and cancel button
	$(".save_prv_est.smallactive").live("click", function(){	
		//	alert("ssssssssss");
		savePreviewEst=1;
		$(this).closest(".btn_bar").children(".save_sec").trigger("click");
		//alert("ssssss");
		//$(this).closest(".btn_bar").children(".prv_send_est").trigger("click");
		//alert("ssssssssss");
		
	 });
	/**start: preview estimates operations**/
	$(".prv_send_est.smallactive, .view_est.smallactive").live("click", function(){
		
		//showOptionPreview($(this).attr("rel"));
		showAllOptions();
	});
	/**end: preview estimates operations**/
	
	
	/**start: cancel changes in estimates operations**/
	$(".cancelchanges.smallactive").live("click", function(){
														   
														   
		
		if($("#templateSlect_" + $("#show_my_options li a.active_nav").attr("estopt") + " option:selected").val() == 0){
			
			var no_templ = true;
			
		}
		
		$(this).closest(".section").find("div.error").remove();
		$(this).closest(".section").find(".error").removeClass("error");
		$(this).closest(".section").find(".err").removeClass("err");
			
		var frmid="#"+$(this).closest("form").attr("id");
		$(frmid)[ 0 ].reset();
		
		$(this).closest(".section").find(".changed_bg").removeClass("changed_bg").find(".changed_img").remove();
		$(this).closest(".section").removeClass("sec_changed")	;
		$(this).closest(".section").children(".readonly").css("min-height", "30px");
		$(this).closest(".section").children(".readonly").toggle();
		if(no_templ){
			$(this).closest(".section").children(".readonly.editmode").hide();
			$(this).closest(".section").children(".btn_bar").removeClass("no_templ");
		}
		
		
		if($(this).closest(".section").children(".estimates_section").children(".template_sec.new").length == 0){
			toggleView($(this).closest(".section").children(".estimates_section").children(".template_sec"));
		} else{
			$(this).closest(".section").children(".estimates_section.tot").hide();
		}
			
		if($(this).closest(".job_estimates").find("select[id^='templateSlect']").val() == 0){
			$(this).closest(".section").children(".btn_bar").children(".edit_sec").hide();
		}else{
			$(this).closest(".section").children(".btn_bar").children(".edit_sec").css("display", "inline-block");
		}
		
		cancelVendorEstimatesChanges($(this).closest(".options").attr("id"));
		//massCalEst($(this).closest(".options").attr("id"));
	
		$(this).closest(".section").children(".btn_bar").toggleClass("est_editing");
		$(this).closest(".section").children(".estimates_section.tot").toggleClass("edit_view");
		
		//-------------$(this).closest(".section").children(".btn_bar").removeClass("default_edit");
		
		
		
		

	});
	/**end: cancel changes in estimates operations**/
	
	
	/**start: save operations**/
	$(".save_sec.smallactive").live("click", function(){
	//alert($(this).html());
	/*var optionid=$("#show_my_options li a.active_nav").attr("estopt");
	if($("#templateSlect_"+optionid +" option:selected").val()==0)
	{ //alert("sss")
	$(".err").removeClass("err");
	$(".error").removeClass("error");
	}*/
	//alert($(this).closest("form").attr("id"));
	
		$(this).closest("form").submit();
		
	});
	/**end: save operations**/
	
	
	/**start: onchange event for template ddl**/
	function showEstimate(templ){
		
		if($(templ).val() > 0){
			
			var temid=$("#" + $(templ).attr("id") + " option:selected").val();
			//alert(temid);
			var optionid=$("#show_my_options li a.active_nav").attr("estopt"); //remove h_tab
			var vat=$("#" + $(templ).attr("id") + " option:selected").attr("vat");
			var vat_back=$("#" + $(templ).attr("id") + " option:selected").attr("vat_back");
			var export_fee=$("#" + $(templ).attr("id") + " option:selected").attr("export_fee");
			var PrePressProfit=$("#" + $(templ).attr("id") + " option:selected").attr("PrePress");
			var ShippingProfit=$("#" + $(templ).attr("id") + " option:selected").attr("Shipping");
			
			//alert(PrePressProfit+"---"+ShippingProfit);
			//alert(quantity)
			//if(temid)
			//{
				
			$("#vat_"+optionid).val(vat);
			$("#vatback_"+optionid).val(vat_back);
			$("#exportfee_"+optionid).val(export_fee);
			$("#estRfqPrePressProfit_"+optionid).html(PrePressProfit);
			$("#estRfqShippingProfit_"+optionid).html(ShippingProfit);
			
			//alert($(templ).closest(".section"));
			$(templ).closest(".section").children(".editmode").show();
			$(templ).closest(".section").children(".estimates_section.tot").show();
			
			$(templ).closest(".section").children(".est_btn_bar").show().addClass("est_editing").removeClass("no_templ_added");
			
			
			//$(templ).closest(".section").children(".est_btn_bar.btn_bar").addClass("default_edit").removeClass("no_templ");
				
			adjustedXrate(optionid);
			//}
			
		}else{			
			//if none is selected
			//alert("no template selected");
			
			$("#" + $(templ).closest(".section").attr("id") + " .changed_img").remove();
			
			
			//$(".estimates_section .text").val("");
			$(templ).closest(".section").children(".editmode").hide();
			$(templ).closest(".section").children(".estimates_section.tot").hide();
			
			//--------------$(templ).closest(".section").children(".btn_bar").removeClass("default_edit");
			
			
			//$(templ).closest(".section").children(".est_btn_bar").show();
			if($(templ).closest(".section").children(".est_btn_bar").hasClass("no_estimate")){
				no_template = true;
				$(templ).closest(".section").children(".est_btn_bar").hide();
			}else{
				
				$(templ).closest(".section").children(".est_btn_bar").addClass("no_templ_added").show();
			}
			

		}
		
		
	}
	/**end: onchange event for template ddl**/
	
	
	//for cancel button
	$(".cancel.smallactive").live("click",function(){
												  
		$(this).closest(".section").find("div.error").remove();
		$(this).closest(".section").find(".error").removeClass("error");
		$(this).closest(".section").find(".err").removeClass("err");
		//$(this).closest(".section").find(".error").remove();
		//$(this).closest(".section").find(".error").remove();
			
		if($(this).closest(".ac_display").find(".sec_changed").length <= 1)
			$(".active_nav").removeClass("nav_changed");
		var frmid="#"+$(this).closest("form").attr("id");
		$(frmid)[ 0 ].reset();
		$(this).closest(".section").find(".changed_bg").removeClass("changed_bg").find(".changed_img").remove();
		$(this).closest(".section").removeClass("sec_changed")	
		$(this).closest(".section").children(".readonly").css("min-height", "30px");
		$(this).closest(".section").children(".readonly").toggle();
		$(this).closest(".btn_bar").children(".scl").hide();
		$(this).closest(".btn_bar").children(".edit_sec").show();
	});
	
	function toggleView(obj){
		$(obj).toggle();
	}
	
	/**start: thumbnail view operations**/
	$(".est_info, #back_btn_prev").live("click", function(){
		$(this).closest(".options_main").children("li[rel]").removeClass("active_thumb");
		$(this).parent("li").addClass("active_thumb");
		
		
		$("#sample_bdy_est").show();
		$("#opt_thumbnail_box").hide();
		
		//$(".btnholder .btn").hide();
		//$(".btnholder .continue").show();
		
		$(".options_tab li[rel='" + $(this).parent("li").attr("rel") +"'] a").trigger("click");
		
		//$(".estimates_bdy").children(".options_view").hide();		
		//$("#est_prv_option_" + $(this).attr("rel").parent("li")).show();
	});
	/**end: thumbnail view operations**/
	
	
	/**start: checkbox click operations**/
	$(".options_main li:not(.disable_est) img.check, .options_main li:not(.disable_est) .opt_label").live("click", function(){
																															
	
		$(this).closest("li").children(".opt_label").children("img.check").toggleClass("checked");
		$(this).closest("li").toggleClass("active_thumb");
		
		/*if($(this).closest("li").hasClass("sent_est") && $(".opt_label").children("img.checked").length > 0)			
			$("#send_est_btn").find(".label").html("Resend Estimate");
		else
			$("#send_est_btn").find(".label").html("Send Estimate");*/
		
		if($(".opt_label").children("img.checked").length > 1){
			$("#send_est_btn .label").html("Send Estimates");
		} else{
			$("#send_est_btn .label").html("Send Estimate");
		}
			
		
		setSendEst();
		
	});
	/**end: checkbox click operations**/
	
	/**start: note view operations**/	
	$(".notes_sec a.add_notes").live("click", function(){
	
		$(".notes_txt").slideToggle();
		$(this).children("img").toggleClass("arr_d")
		
	});
	/**end: note view operations**/
	
	/**start: options tab view operations**/	
	$(".options_tab li a").live("click", function(){
		
			
			$(this).closest("ul").children("li").children("a").removeClass("active_opt");
			$(this).addClass("active_opt");
			$(".options_view").hide();
			
			var tab_id = "#est_prv_option_" + $(this).parent("li").attr("rel");
			//alert(tab_id)
			$(tab_id).show();
	
		
	});
	/**end: options tab view operations**/
	
	
	/**start: continue button view operations**/
	$("#continue_btn.active").live("click", function(){
		cont_btn_click = 1;
		//alert('continue_btn: click');
		//$(".options_tab li a.show_all_opt").trigger("click");
		//showAllOptions();
		
		$("#sample_bdy_est").hide();
		$("#opt_thumbnail_box").show();
		
		
		if(cont_btn_click === 1){
				
			$(".active_thumb").removeClass("active_thumb");
			$(".options_main li[rel='"+ $(".active_opt").parent("li").attr("rel") +"']").addClass("active_thumb").children(".opt_label").children("img.check").addClass("checked");
			/*if($(".options_main li[rel='"+ $(".active_opt").parent("li").attr("rel") +"']").hasClass("sent_est"))
				$("#send_est_btn").find(".label").html("Resend Estimate");*/
			
			$("#send_est_btn").addClass("main_btn active");	
			cont_btn_click = 0;
		
		}
		setSendEst();
		
		
			
	});
	/**end: continue button view operations**/
	
	/**start: send estimate button view operations**/
	$("#send_est_btn.active").live("click", function(){
			var RfqId=$("#rfq_id").val();
			var Catid=$("#catid").val();
			var contactPerson=$("#company_cperson").val();
			var optionId= new Array();
			var customerEmail=$("#company_email").val();
			var projectid=$("#projectid").val();
			//alert(customerEmail)
			var estCount='';
			var my_option_id='';
			$(".checked").each(function(){
										estCount++;
				optionId.push("'"+$(this).closest("li").attr("rel")+"'");
				my_option_id = $(this).closest("li").attr("rel");
			});
			//alert(estCount)
			//alert($("#opt_thumb_html .options_main > li").length);
			//alert($("#opt_thumbnail_box .options_main > li").length);
			if(estCount!=$("#opt_thumbnail_box .options_main > li").length)
				{
						 var msg="You've Chosen to send only " + estCount +" option's,are you sure you want to proceed?";
						 $("#dialog_message_confirm").html(msg);
			 			 $("#dialog_message_confirm").dialog({
			  buttons: { 
			  "Send": function() {					
				
					//alert(str);
					send_Estimate(RfqId,optionId,customerEmail,Catid,contactPerson,projectid,my_option_id);
					
					 },
							
			   "Don't Send": function() {
						$(this).dialog("close");
						}
					 },
				title: "Confirmation",
				close: function(event, ui) { },
				modal: true,
				autoOpen: false,
				resizable: false,
				width:500,
				overlay: { 
				opacity: 0.5, 
				background: "black" 
					}
				});
				 $("#dialog_message_confirm").dialog("open");
				}
				else
				{
					send_Estimate(RfqId,optionId,customerEmail,Catid,contactPerson,projectid,my_option_id);
				}
				
					
	});
	/**end: send estimate button view operations**/
	//function for send estimate
	function send_Estimate(RfqId,optionId,customerEmail,Catid,contactPerson,projectid,my_option_id)
	{
		var str="&RfqId="+RfqId+"&optionId="+optionId+"&customerEmail="+customerEmail+"&Catid="+Catid+"&contactPerson="+contactPerson+"&projectid="+projectid+"&my_option_id="+my_option_id;
					//alert(templateId);
					$.ajax({
					   type: "POST",
					   url: base_url+'listview/SendEstimate',
					   data: str,
					   beforeSend: function(){
							$("#opt_thumb_html").html("<div class='prv_win_loading_box'><img src=" + base_spinner + " class='fl'> Sending Estimate...</div>");
					   },
					   success: function(msg){
						//alert(msg)
						$("#dialog_message_confirm").dialog("close");
						//rightnav($(".opt.active_tab").attr("id"));
						leftnav($(".opt.active_nav").attr("id"));
						
						$(".closeme").trigger("click");
						},
						complete: function(){
							}
					 });			
	}
	//end of function for send estimate
	function setSendEst(){
		if($(".options_main li img.checked").length > 0){
			$("#send_est_btn").addClass("main_btn active");
		}else{
			$("#send_est_btn").removeClass("main_btn active");
		}
		
	}
	setSendEst();
	
	/**start: showing options preview window**/
	function showOptionPreview(option_id, est_status){
		//var estView=$(est_status).attr("rel");
		//alert('h');
		
		var RfqId=$("#rfq_id").val();
		
		var optionid=$("#show_my_options li a.active_nav").attr("estopt");//remove h_tab
		
		var templateId=$("#templateId_"+optionid).attr("rel");
		var str="&RfqId="+RfqId+"&optionid="+optionid+"&templateId="+templateId;//+"&estView="+estView;
		//alert(templateId);
		$.ajax({
		   type: "POST",
		   url: base_url+'listview/EstPreview',
		   data: str,
		   beforeSend: function(){
			   	//alert('o');
				$("#sample_bdy_est").html("<div class='prv_win_loading_box' style='width: 290px; margin-left: -145px;'><img src=" + base_spinner + " class='fl'> Showing Estimate Preview...</div>");
		   },
		   success: function(msg){
			
				//alert(msg);					
				
				$("#sample_bdy_est").html(msg);	
				//alert($(".options_tab li:nth-child(" + (parseInt($("#show_my_options li a.active_nav").attr("estopt")) ) +") a").html());
				$(".options_tab li[rel=" + $("#show_my_options li a.active_nav").attr("estopt") +"] a").trigger("click"); //remove h_tab

				
				//$("#dialogues").html(msg);
			
			},
			complete: function(){
				}
		 });				 
		//$.blockUI({message:$('.msgmodal')});
	}
	/**end: showing options preview window**/
	
	
	
	/**********start: add vendor new*************/
	$(".add_v_est:not(.disabled)").live("click", function(){
														  
		var v_sec = $(this).closest(".vendor_section");
		//alert($(v_sec).children(".row").length);
		if($(v_sec).children(".row:not(.rem_r)").length < 3){
			$(v_sec).find(".rem_v_est").removeClass("disabled");
			var footer_row = $(v_sec).children(".footer_row");
			var new_row = $(".new_vendor_row").clone().removeClass("new_vendor_row").addClass("new_row_est").insertBefore(footer_row).slideDown();
			
			var obj_new_row_names = [new_row, ".ven_id:"+$(this).closest("ul").find(".ven_id").attr('name'), ".hdn_v_cost:"+$(this).closest("ul").find('.hdn_v_cost').attr('name'), ".v_t_u_c:"+$(this).closest("ul").find('.v_t_u_c').attr('name')];
			
			var obj_new_row_ids = [new_row, ".ven_id:"+$(this).closest("ul").find(".ven_id").attr('id'), ".v_t_u_c:"+$(this).closest("ul").find('.v_t_u_c').attr('id')];
			
			setNamesToNewRow(obj_new_row_names);
			setIdsToNewRow(obj_new_row_ids);
			
			//$(this).closest("ul").clone().insertBefore(footer_row);
			resetAddRemove(v_sec);
			
			calTotal(v_sec);
		}
		
	});
	/**********end: add vendor new*************/
	
	/**********start: remove vendor new*************/
	$(".rem_v_est:not(.disabled)").live("click", function(){
														
		var v_sec = $(this).closest(".vendor_section");
		if($(v_sec).children(".row:not(.rem_r)").length > 1){
			/*if($(this).closest("ul[class^='cols']").hasClass("new_row_est"))
				$(this).closest("ul[class^='cols']").remove();
			else{
				
				$(this).closest("ul[class^='cols']").addClass("rem_r").slideUp();
				$(this).closest("ul[class^='cols']").children("li").children(".v_t_u_c").addClass("rem");
				
				$(this).closest("ul[class^='cols']").children("li").children(".ven_id").addClass("rem_php");
				$(this).closest("ul[class^='cols']").children("li").children(".hdn_v_cost").addClass("rem_php");
				$(this).closest("ul[class^='cols']").children("li").children(".v_t_u_c").addClass("rem_php");
				$(this).closest("ul[class^='cols']").children("li").children(".rem_php.ven_id").attr("name","rfqEst_RemVenId[]");
				$(this).closest("ul[class^='cols']").children("li").children(".rem_php.hdn_v_cost").attr("name","rfqEst_RemVenCostType[]");
				$(this).closest("ul[class^='cols']").children("li").children(".rem_php.v_t_u_c").attr("name","rfqEst_RemVenCost[]");
			}*/		
			
			if($(this).closest("ul[class^='cols']").hasClass("new_row_est"))
				$(this).closest("ul[class^='cols']").remove();
			else{
				$(this).closest("ul[class^='cols']").addClass("rem_r").slideUp();
				$(this).closest("ul[class^='cols']").children("li").children(".v_t_u_c").addClass("rem");
				
				var new_ven_id = $(this).closest("ul[class^='cols']").children("li").children(".ven_id");
				$(new_ven_id).addClass("rem_php").attr("name",  "111rem"+$(new_ven_id).attr("name"));
				
				var new_v_cst_type = $(this).closest("ul[class^='cols']").children("li").children(".hdn_v_cost");
				$(new_v_cst_type).addClass("rem_php").attr("name", "111rem"+$(new_v_cst_type).attr("name"));
				
				var new_v_cst = $(this).closest("ul[class^='cols']").children("li").children(".v_t_u_c");
				$(new_v_cst).addClass("rem_php").attr("name", "111rem"+$(new_v_cst).attr("name"));
			}
						
			resetAddRemove(v_sec);			
			
			calTotal(v_sec);
		}
		
	});
	/**********end: remove vendor new*************/
	
	
	$(".v_t_u_c").live("keyup", function(){
		if($(this).val() == "" || $(this).val() == null){$(this).val("");}
			
		calTotal($(this).closest(".vendor_section"));
		
		$(this).closest(".vendor_section").children(".footer_row").children(".s_2").children(".vendor_cst_total").addClass("edited");
		
	});
function resetTotal(hdn_v_cost){
	
	//alert("hdn_v_cost: " + hdn_v_cost);
	$(hdn_v_cost).parent("li").children("label").html($(hdn_v_cost).children("option:selected").text());
	
	//$(this).closest("li").children(".v_t_u_c").val($(this).val());
	//alert($(this).children("option:selected").val());
	if($(hdn_v_cost).children("option:selected").val() == 2)
		$(hdn_v_cost).closest("li").children(".v_t_u_c").addClass("u_c");
	else
		$(hdn_v_cost).closest("li").children(".v_t_u_c").removeClass("u_c");
	
	calTotal($(hdn_v_cost).closest(".vendor_section"));
	
}


function calTotal(vendor_section){
	//alert("vendor_section");
	var ven_tot = 0;
	var rfqoptionid=$("#show_my_options li a.active_nav").attr("estopt"); //remove h_tab
	var EstQty;
	($.trim($("#rfqEst_quantity_"+rfqoptionid).val())=="")?EstQty=0:EstQty=parseInt($.trim($("#rfqEst_quantity_"+rfqoptionid).val()));

	$(vendor_section).children("ul").children("li").children(".vendor_txt.v_t_u_c:not(.rem)").each(function(i){
		var cost = trimLeft($(this).val());
		
		
		
		//alert(isNaN(cost));
		if(cost=='' || isNaN(cost))
		cost=0;
		
		if($(this).hasClass("u_c")){
			cost = parseInt(EstQty) * cost;
		}
		
		ven_tot = ven_tot + parseInt(cost);
		
	});
	if(ven_tot==0)
	ven_tot='';
	$(vendor_section).children("ul").children("li").children(".vendor_cst_total").attr("value", ven_tot);
	//alert("true");
	adjustedXrate(rfqoptionid);
	
}
//end estimate vendor detials


function showAllOptions(){
	
	//show all operations----------
	//alert("ssss");
	
	//$("#prv_est_html").hide();
	//$("#opt_thumb_html").show();
	
	
	$.blockUI({message:$('.msgmodal')});
	
	
	/***************************
	$(".btnholder .btn").show();
	$(".btnholder .continue").hide();
	*****************************/
	
	//alert("sss");
		var RfqId=$("#rfq_id").val();
		var str="&RfqId="+RfqId;
		//alert(templateId);
		$.ajax({
		   type: "POST",
		   url: base_url+'listview/ShowAllBtn',
		   data: str,
		   beforeSend: function(){
				$("#est_form").html("<div class='prv_win_loading_box'><img src=" + base_spinner + " class='fl'> Showing Options...</div>");
		   },
		   success: function(msg){
			//alert(msg)
			
			$("#est_form").html(msg);
			//$(".msgmodal").fadeOut(20000);
			//$.unblockUI();
			
			
				
			//$(".estimates_bdy").html(msg);
			//$("#dialogues").html(msg);
			if(cont_btn_click === 1){
				
				$(".active_thumb").removeClass("active_thumb");
				$(".options_main li[rel='"+ $(".active_opt").parent("li").attr("rel") +"']").addClass("active_thumb").children(".opt_label").children("img.check").addClass("checked");
				/*if($(".options_main li[rel='"+ $(".active_opt").parent("li").attr("rel") +"']").hasClass("sent_est"))
					$("#send_est_btn").find(".label").html("Resend Estimate");*/
				
				$("#send_est_btn").addClass("main_btn active");	
				cont_btn_click = 0;
				
				
			
			}
			
			showOptionPreview("", "");
			setSendEst();

			},
			complete: function(){
				}
		 });
}

/*start: sets names to all the new row  fields*/
function setNamesToNewRow(obj_new_row){
	for(i=1; i<obj_new_row.length; i++){
		var obj = obj_new_row[i].split(":");		
		$(obj_new_row[0]).find(obj[0]).attr("name", obj[1]+(i+3));
		//alert("new object name: " + obj[1]+(i+3));
	}
}	
/*end: sets names to all the new row  fields*/

/*start: sets Ids to all the new row fields*/
function setIdsToNewRow(obj_new_row){
	for(i=1; i<obj_new_row.length; i++){
		var obj = obj_new_row[i].split(":");
		
		var newId = obj[1].substring(0, eval(obj[1].lastIndexOf("_"))+1) + (3 + eval(new_row_id));
		
		$(obj_new_row[0]).find(obj[0]).attr("id", newId).prev("label").attr("for", newId);
	}
	new_row_id++;
}	
/*end: sets Ids to all the new row  fields*/


/*start: cancel changes for Vendor Estimates Changes*/
function cancelVendorEstimatesChanges(opt_id){

	$("#"+opt_id+" .new_row_est").remove();

}
/*end: cancel changes for Vendor Estimates Changes*/

/*start: reset removed  Vendor Estimates Changes*/
function resetRemovedVendors(opt_id){
	//alert(opt_id)
	var optionid=$("#show_my_options li a.active_nav").attr("estopt"); //remove h_tab
	
	$("#job_estimates_" +optionid + " .readonly.editmode .vendor_section").each(function(index){
		
		var ven_sec_id = $(this).attr("id");
		
		//alert(ven_sec_id);
		var ven_id = $("#"+ven_sec_id+" .rem_r .rem_php.ven_id");
		$(ven_id).removeClass("rem_php").attr("name", getSubStr($(ven_id).attr("name"), "111rem"));	
		
		var hdn_ven_cst = $("#"+ven_sec_id+" .rem_r .rem_php.hdn_v_cost");
		$(hdn_ven_cst).removeClass("rem_php").attr("name", getSubStr($(hdn_ven_cst).attr("name"), "111rem"));	
		
		var ven_cst = $("#"+ven_sec_id+" .rem_r .rem_php.v_t_u_c");
		$(ven_cst).removeClass("rem_php").attr("name", getSubStr($(ven_cst).attr("name"), "111rem"));
		
		$("#"+ven_sec_id+" .rem_r").removeClass("rem_r").show();
		
		
		resetAddRemove($(this));
										
	});

	$("#"+opt_id+" .rem_r").show();

}
/*end:  reset removed  Vendor Estimates Changes*/


/*start: mass calculate estimates*/
function massCalEst(opt_id){

	$("#" + opt_id + " .v_tc_init").each(function(i){
												  
		resetAddRemove($(this).closest(".vendor_section"));
		calTotal($(this).closest(".vendor_section"));
		
	});
}
/*end:  mass calculate estimates*/


function resetAddRemove(v_sec){
	
	var ven_sec_id = $(v_sec).attr("id");
	var obj_len = $(v_sec).children(".row:not(.rem_r)").length;
	
	if(obj_len == 3){
		$("#" + ven_sec_id + " .add_v_est").addClass("disabled");
		$("#" + ven_sec_id + " .rem_v_est").removeClass("disabled");
	}
	
	if(obj_len < 3){
		$("#" + ven_sec_id + " .add_v_est").removeClass("disabled");
		$("#" + ven_sec_id + " .rem_v_est").removeClass("disabled");
	}
	
	if(obj_len == 1){
		$("#" + ven_sec_id + " .add_v_est").removeClass("disabled");
		$("#" + ven_sec_id + " .rem_v_est").addClass("disabled");
	}
		
}

function showActiveEst(opt_id){
	
	//alert($("#projectdetails").html());
	productspecfications=0;
	//alert("rightnav: "+productspecfications)
	$("#show_my_options > li a").trigger("click");
	$(".parent_nav .active_nav").trigger("click");
	$("#" + opt_id).trigger("click");
	
}

function trimLeft(str) {
	//alert(str)
    var ListOfWhiteSpaceChars = "0";

    var k = 0;
    while (k < str.length) {
      if (ListOfWhiteSpaceChars.indexOf(str.charAt(k)) == -1) {
        return str.substring(k, str.length);
      } else {
        k++;
      }
    }
  }
  
function getSubStr(ven, ext){
	if(ven && ext)
	{ var newstr=ven.split("111rem");
		return newstr[1];
	}
}
//print estimate for model window
$("#print_est_rfq").live("click",function(){
										  
	var  rfqid=	$("#rfq_id").val();
	var optionId=$(".active_opt").parent("li").attr("rel");
	//alert(rfqid+"----"+optionId);
	
	 window.open(base_url+'listview/EstPrint/'+rfqid+'/'+optionId, '_blank', 'width=800,height=600,scrollbars=yes,status=yes,resizable=yes,screenx=0,screeny=0');	
	
});
//end
