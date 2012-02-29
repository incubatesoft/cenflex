// JavaScript Document
	var cont_btn_click = 0;
	//start: showing the save and cancel button
	$(".edit_sec.smallactive").live("click",function(){	
		var obj_sec = "#" + $(this).closest(".section").attr("id");
		
		$(obj_sec + " .readonly").css("min-height", "30px");

		$(obj_sec + " .readonly").toggle();
		if($(this).closest(".btn_bar:not(.cloned)").hasClass("no_estimate")){
			$(obj_sec + " .readonly.edit_est_sec").hide();
		}
		
		if(!$(this).closest(".btn_bar").hasClass("est_btn_bar"))
			$(this).hide();

		$(this).closest(".btn_bar").children(".scl").show();

		if($(".rem_php").length > 0)
			resetRemovedVendors($(this).closest(".options").attr("id"));
		
		toggleView($(obj_sec + " .estimates_section .template_sec"));
		
		$(obj_sec + " .estimates_section.tot").toggleClass("edit_view");

		$(this).closest(".est_btn_bar.btn_bar").toggleClass("est_editing");
		
		setProfitMargin_view($("#profit_margin_"+ $("#show_my_options li a.active_nav").attr("estopt")));
			

	});
	//end: showing the save and cancel button
	$(".save_prv_est.smallactive").live("click", function(){	
		//alert("ssssssssss");
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
		var obj_sec = "#" + $(this).closest(".section").attr("id");
		$(obj_sec + " div.error").remove();
		$(obj_sec + " .error").removeClass("error");
		$(obj_sec + " .err").removeClass("err");
		
		if($("#left_nav .parent_nav .active_nav").hasClass("nav_changed")){
			$("#left_nav .parent_nav .active_nav").removeClass("nav_changed");
		}
		var frmid="#"+$(this).closest("form").attr("id");
		$(frmid)[ 0 ].reset();
		
		
		
		$(obj_sec + " .changed_bg").removeClass("changed_bg").find(".changed_img").remove();
		$(obj_sec).removeClass("sec_changed")	;
		$(obj_sec + " .readonly").css("min-height", "30px");
		$(obj_sec + " .readonly").toggle();
		if(no_templ){
			$(obj_sec + " .readonly.editmode").hide();
			$(obj_sec + " .btn_bar").removeClass("no_templ");
		}
		
		toggleView($(obj_sec + " .estimates_section .template_sec"));
		
		if($(obj_sec + " .est_btn_bar").hasClass("no_estimate")){
			$(obj_sec + " .editmode").hide();
			$(obj_sec + " .estimates_section.tot").hide();
		}
		if($(obj_sec + " .est_btn_bar").hasClass("has_estimate")){
			$(obj_sec + " .estimates_section.tot").show();
		}
		
		collapseCloneLinks();
		
		
		//$(obj_sec + " .estimates_section.tot").hide();
		
		/*if($(obj_sec + " .estimates_section .template_sec.new").length == 0){alert('d');
			
		} else{
			$(obj_sec + " .estimates_section.tot").hide();
		}*/
			
		/*if($(this).closest(".job_estimates").find("select[id^='templateSlect']").val() == 0){
			$(obj_sec + " .btn_bar .edit_sec").hide();
		}else{
			$(obj_sec + " .btn_bar .edit_sec").css("display", "inline-block");
		}*/
		
		
		
		cancelVendorEstimatesChanges($(this).closest(".options").attr("id"));
		//massCalEst($(this).closest(".options").attr("id"));

		$(obj_sec + " .btn_bar").toggleClass("est_editing");
		//$(obj_sec + " .estimates_section.tot").toggleClass("edit_view");
		
		//-------------$(this).closest(".section").children(".btn_bar").removeClass("default_edit");

	});
	/**end: cancel changes in estimates operations**/
	
	
	/**start: save operations**/
	$(".save_sec.smallactive").live("click", function(){
		
		
		var form = $(this).closest("form");
		/*to remove hidden markup from the dom, the hidden form is validating for the mandatory fields*/
		if($("#templateSlect_" + $("#show_my_options li a.active_nav").attr("estopt")).val() == 0){
			no_est_sec_html[$("#show_my_options li a.active_nav").attr("estopt")] = $("#edit_est_sec_" + $("#show_my_options li a.active_nav").attr("estopt")).html();
			$("#edit_est_sec_" + $("#show_my_options li a.active_nav").attr("estopt")).html("");
		}
		
		if($("#show_my_options li a.opt_approved").length > 0 && $(this).closest(".btn_bar").hasClass("controlbar")){
			approvedEstSave($(form).attr("id"), false);
		}else{
			$(form).submit();
		}
												
		//$(this).closest("form").submit();
		
	});
	/**end: save operations**/
	$(".save_create_revision.revisionSave").live("click", function(){

		
		
		var optionid=$("#show_my_options li a.active_nav").attr("estopt");
		var formName=$(this).closest("form").attr("id");
		var latestRev=$("#rfq_revisions option:selected").val();
		//alert(latestRev)
		
		if(formName=='product_spec_13' || formName=='product_spec_14' || formName=='product_spec_15')
		{	
			$("#ps_CreatRevision_"+optionid).val("1");
			$("#ps_CreatRevisionFrom_"+optionid).val(latestRev);
		}			
		else if(formName=='estimate_save_13' || formName=='estimate_save_14' || formName=='estimate_save_15')
		{
			$("#shipping_CreatRevision_"+optionid).val("1");
			$("#shipping_CreatRevisionFrom_"+optionid).val(latestRev);
		}
		
		
		/*to remove hidden markup from the dom, the hidden form is validating for the mandatory fields*/
		if($("#templateSlect_" + $("#show_my_options li a.active_nav").attr("estopt")).val() == 0)
		{
			no_est_sec_html[$("#show_my_options li a.active_nav").attr("estopt")] = $("#edit_est_sec_" + $("#show_my_options li a.active_nav").attr("estopt")).html();
			$("#edit_est_sec_" + $("#show_my_options li a.active_nav").attr("estopt")).html("");
		}
		//alert($("#ps_CreatRevision_"+optionid).val());
		
		if($("#" + formName).valid()){
			/*$.blockUI({message:$('#preview_revision_window')});
		
			var rev_size = $("#rfq_revisions option").size();	
			
			$("#preview_revision_window .new_rev_num").text(rev_size);*/
				
			approvedEstSave(formName, true);
		}
		
		/*form_pro_det = formName;*/
		
		

	});
	
	/*start: approved estimate save*/
	function approvedEstSave(form_id, new_rev){
	
		
		
		$("#continue_new_rev_btn").attr("rel", form_id);
		$(".continue_new_rev_s_btn").attr("rel", form_id);
		
		var rev_size = $("#rfq_revisions option").size();
		if(new_rev){
			$("#preview_revision_window .new_rev_num").text(rev_size);
			$("#preview_revision_window").addClass("new_rev");			
				
		}else{
			$("#preview_revision_window .new_rev_num").text(rev_size-1);
			$("#preview_revision_window").removeClass("new_rev");
		}
		
		if($("#show_my_options li a.opt_approved").length > 0){
			$("#preview_revision_window").addClass("approved").removeClass("sent est no_est");
			$("#preview_revision_window .sent_est_msg").hide();
		}else if($("#show_my_options li a.opt_estSend").length > 0){
			$("#preview_revision_window").addClass("sent").removeClass("approved est no_est");
			$("#preview_revision_window .sent_est_msg").show();
		}else if($("#show_my_options li a.opt_est").length > 0){
			$("#preview_revision_window").addClass("est").removeClass("sent approved no_est");
		}else{
			$("#preview_revision_window").addClass("no_est").removeClass("sent approved est");
		}
		
		generateOptionsStatus('main_opt_values', new_rev);
		
		$.blockUI({message:$('#preview_revision_window')});
	
	}
	/*end: approved estimate save*/
	
	//continue_cnt = 0;
	/*start: continue creating new revision*/
	$("#continue_new_rev_btn.active").live("click", function(){
		//continue_cnt++;
		
		var form_name = $(this).attr("rel");
		$(".notify_cust_check").removeClass("checked");
		
		$(this).removeClass("active main_btn");
		$("#back_btn").removeClass("active");
		$("#preview_revision_window .closeme").addClass("disabled");
	
		//if(continue_cnt == 2 || $("#show_my_options li a.opt_approved").length == 0){
		if($("#preview_revision_window").hasClass("new_rev")){
			new_rev_created = true;
			opt_id_active = $("#show_my_options .active_nav").attr("estopt");
			form_pro_det = form_name;
		}	
			
		if($("#show_my_options li a.opt_approved").length == 0){
			
			productspecfications = 0;
				
			$("#creating_new_rev").fadeIn();
			
			$("#" + form_name).submit();
			
			/*if(form_pro_det != "new_rev"){
				form_pro_det = $("#" + form_pro_det + " > .section").attr("section");
			}*/
			
			$(".main_rev_form.approved_msg").css({top: "-140px"});
			
			//continue_cnt = 0;
		}else{
			var new_rev_num = $("#rfq_revisions option").size();
			var current_rev_num = $("#preview_revision_window .new_rev_num:first").text();

			if(new_rev_num == current_rev_num){
				$(".main_rev_form.approved_msg:not(.current_rev)").animate({top: "0px"});
			}else{
				$(".main_rev_form.current_rev.approved_msg").animate({top: "0px"});
			}
			
		}
		
		
		
		
		/*$("#preview_revision_window .main_rev_form").slideDown();
		var rev_size = $("#rfq_revisions option").size();
		$("#rfq_revisions option:first").before("<option>Revision-"+ rev_size +"</option>");
		document.getElementById("rfq_revisions").options[0].selected = true;*/

	});
	
	/*end: continue creating new revision*/
	
	
	
	/**start: onchange event for template ddl**/
	function showEstimate(templ){
		
		var sec_obj = "#" + $(templ).closest(".section").attr("id");
		
		if($(templ).val() > 0){
			
			if(no_est_sec_html[$("#show_my_options li a.active_nav").attr("estopt")]){
				 $("#edit_est_sec_" + $("#show_my_options li a.active_nav").attr("estopt")).html(no_est_sec_html[$("#show_my_options li a.active_nav").attr("estopt")]);
				 
			}
			
			var temid=$("#" + $(templ).attr("id") + " option:selected").val();
			//alert(temid);
			var optionid=$("#show_my_options li a.active_nav").attr("estopt"); //remove h_tab
			var vat=$("#" + $(templ).attr("id") + " option:selected").attr("vat");
			var vat_back=$("#" + $(templ).attr("id") + " option:selected").attr("vat_back");
			var export_fee=$("#" + $(templ).attr("id") + " option:selected").attr("export_fee");
				
			$("#vat_"+optionid).val(vat);
			$("#vatback_"+optionid).val(vat_back);
			$("#exportfee_"+optionid).val(export_fee);
			
			
			
			$(sec_obj + " .editmode").show();
			$(sec_obj + " .estimates_section.tot").show();
			$(sec_obj + " .est_btn_bar").show().addClass("est_editing").removeClass("no_templ_added");
			
			
			//$(templ).closest(".section").children(".est_btn_bar.btn_bar").addClass("default_edit").removeClass("no_templ");
			setProfitMargin_view($("#profit_margin_"+ $("#show_my_options li a.active_nav").attr("estopt")));
			//alert("showEstimate --->opt_id: " + optionid);
			adjustedXrate(optionid);
			//}
			
		}else{			
			//if none is selected
			//alert("no template selected");

			$(sec_obj + " .changed_img").remove();
			
			//$(".estimates_section .text").val("");
			$(sec_obj + " .editmode").hide();
			$(sec_obj + " .estimates_section.tot").hide();
			
			//--------------$(templ).closest(".section").children(".btn_bar").removeClass("default_edit");
			

			//$(templ).closest(".section").children(".est_btn_bar").show();
			if($(sec_obj + " .est_btn_bar").hasClass("no_estimate")){
				no_template = true;
				//$(sec_obj + " .est_btn_bar").removeClass("est_editing")
				//$(sec_obj + " .est_btn_bar").hide();
				
				/*var sec_obj = "#" + $(this).closest(".section").attr("id");								  
				$(sec_obj + " div.error").remove();
				$(sec_obj + " .error").removeClass("error");
				$(sec_obj + " .err").removeClass("err");*/
				
			}else{
				
				$(sec_obj + " .est_btn_bar").addClass("no_templ_added");//.show();
			}
			

		}
		
		collapseCloneLinks();
		
		
		
	}
	/**end: onchange event for template ddl**/
	
	
	//for cancel button
	$(".cancel.smallactive").live("click",function(){
		var sec_obj = "#" + $(this).closest(".section").attr("id");									  
		$(sec_obj + " div.error").remove();
		$(sec_obj + " .error").removeClass("error");
		$(sec_obj + " .err").removeClass("err");
		//$(this).closest(".section").find(".error").remove();
		//$(this).closest(".section").find(".error").remove();
		if($(this).closest(".section").hasClass("pro_spec")){
			$(".cust_sel_input").remove();
			$(".cust_sel_box").removeClass("edit_inline");
		}
		if($("#left_nav .parent_nav .active_nav").hasClass("nav_changed")){
			$("#left_nav .parent_nav .active_nav").removeClass("nav_changed");
		}
			
		var frmid="#"+$(this).closest("form").attr("id");
		$(frmid)[ 0 ].reset();
		$(sec_obj + " .changed_bg").removeClass("changed_bg").find(".changed_img").remove();
		$(sec_obj).removeClass("sec_changed")	
		$(sec_obj + " .readonly").css("min-height", "30px");
		$(sec_obj + " .readonly").toggle();
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
			
			$(tab_id).show();
			
			//add accepted stamp in modal window
			$("#est_prv_option_" + $("#show_my_options a.opt_approved").attr("estopt") + " .master_table").addClass("accepted_est_stamp");
	
		
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
			

			var estCount=0;
			var my_option_id='';
			$("#opt_thumbnail_box .options_main .checked").each(function(){
				estCount++;
				optionId.push("'"+$(this).closest("li").attr("rel")+"'");
				my_option_id = $(this).closest("li").attr("rel");
			});
			//alert(estCount)
			//alert($("#opt_thumb_html .options_main > li").length);
			//alert($("#opt_thumbnail_box .options_main > li").length);
			if(estCount!=$("#opt_thumbnail_box .options_main li").length)
			{

			 var msg="You've Chosen to send only " + estCount +" option(s), are you sure you want to proceed?";
			
			 $("#dialog_message_confirm").html(msg);
 			 $("#dialog_message_confirm").dialog({
			  buttons: { 
			  "Send": function() {
			  				
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
		var revision=$("#rfq_revisions option:selected").attr("latestRev");
		var str="&RfqId="+RfqId+"&optionId="+optionId+"&customerEmail="+customerEmail+"&Catid="+Catid+"&contactPerson="+contactPerson+"&projectid="+projectid+"&my_option_id="+my_option_id+"&revision="+revision;
				var timeout = 2000;
				$.ajax({
					   type: "POST",
					   url: base_url+'listview/SendEstimate',
					   data: str,
					   beforeSend: function(){
						
							$("#opt_thumb_html").html("<div class='prv_win_loading_box'><img src=" + base_spinner + " class='fl'> Sending Estimate...</div>");
							
							/*****growlUI msg box******/
							var sec_name = "";
							var num_options = $("#opt_thumbnail_box .active_thumb .opt_label").length;
							$("#opt_thumbnail_box .active_thumb .opt_label").each(function(i){
								sec_name += num_options==(i+1) && i!=0 ? " and " : "";
								sec_name += $(this).text();
								sec_name += num_options==(i+1) || parseInt(num_options)-1==(i+1)? " " : ", ";
							});
							
							
							$.growlUI(sec_name, "<img src='"+ base_s_img +"spacer.gif' class='load_status login_loading'>Sending Estimate...", timeout);
							/*****growlUI msg box******/
					   },
					   success: function(msg){
						//alert(msg)
						$("#dialog_message_confirm").dialog("close");
						//rightnav($(".opt.active_tab").attr("id"));
						
						/*****growlUI msg box******/
						$("#growlUI_bdy").html("<img src='"+ base_s_img +"spacer.gif' class='load_status right_ico active'>Estimate Sent Successfully");					
						/*****growlUI msg box******/
						
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
		//alert('showOptionPreview');

		var RfqId=$("#rfq_id").val();
		
		var optionid=$("#show_my_options li a.active_nav").attr("estopt");//remove h_tab
		var revision=$("#rfq_revisions option:selected").attr("latestRev");
		var templateId=$("#templateId_"+optionid).attr("rel");
		var str="&RfqId="+RfqId+"&optionid="+optionid+"&templateId="+templateId+"&revision="+revision;//+"&estView="+estView;
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

				
				$(".est_inline_edit").editable(base_url+'listview/saveterms_conditions', {
					 indicator :'<img src="'+base_spinner+'"/>',
					 event: 'dblclick',
					 type  : 'mce',
					 cssclass : 'editing',
					 onblur: "ignore",
					 width:'80%',
					 submit: "Save",
					 cancel:'Cancel',
					 id:'rel',
					 tooltip   : 'Click to edit...',
					 callback : function(value, settings) {
							$(this).removeClass("editing_this").addClass("edit_saved");
				 }
				 });
				$(".est_inline_edit").live("mouseover", function(){
					$(this).prev("td").children(".edit_ico_inline").addClass("hover");
				});
				$(".est_inline_edit").live("mouseout", function(){
					$(this).prev("td").children(".edit_ico_inline").removeClass("hover");
				});
				
				
				
				
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
	//alert("vendor_section: " + vendor_section);
	var ven_tot = 0;
	var rfqoptionid=$("#show_my_options li a.active_nav").attr("estopt"); //remove h_tab
	
	var temp_id = $("#profit_margin_" + rfqoptionid).val();
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
	
	/*--*/
	updateProductionProfitMargin(vendor_section, temp_id, rfqoptionid, ven_tot);
	/*--*/
	
	//alert("true");
	//alert("calTotal --->opt_id: " + rfqoptionid);
	adjustedXrate(rfqoptionid);
	
}
//end estimate vendor detials


function updateProductionProfitMargin(vendor_section, temp_id, rfqoptionid, ven_tot){

	if($(vendor_section).closest(".estimates_section").hasClass("production")){
			if(temp_id=="m")
			{ 
			$("#estRfqProductionProfit_" + rfqoptionid).val();
			}
			else
			{
				var rangeMargin = getRangeMargin(temp_id, rfqoptionid, ven_tot);
				$("#estRfqProductionProfit_" + rfqoptionid).val(rangeMargin);	
			}
			
		}
	
}


function showAllOptions(){
	
	//show all operations----------
	//alert("ssss");
	
	//$("#prv_est_html").hide();
	//$("#opt_thumb_html").show();
	
	
	$.blockUI({message:$('#preview_estimate_window')});
	
	
	/***************************
	$(".btnholder .btn").show();
	$(".btnholder .continue").hide();
	*****************************/
	
	//alert("sss");
		var RfqId=$("#rfq_id").val();
		var revision=$("#rfq_revisions option:selected").attr("latestRev");
		var str="&RfqId="+RfqId+"&revision="+revision;
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
		//alert(obj[0]+"==,=="+ obj[1]);
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

/*if(opt_id_active != 0){
				$("#show_my_options .opt[estopt=" +opt_id_active+ "]").trigger("click");
				
			}*/

function showActiveEst(opt_id){
	

		
		//alert($("#projectdetails").html());
		productspecfications=0;
		//alert("rightnav: "+productspecfications)
	
		$("#" + opt_id).trigger("click");

		$("#qLinks li a[rel='job_estimates']").trigger("click");
		
		//$(".parent_nav .active_nav").trigger("click");

		
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
	var revision=$("#rfq_revisions option:selected").val();
	
	 window.open(base_url+'listview/EstPrint/'+rfqid+'/'+optionId+'/'+revision, '_blank', 'width=800,height=600,scrollbars=yes,status=yes,resizable=yes,screenx=0,screeny=0');	
	
});
//end


/*start: manul edit*/
function setProfitMargin_view(profit_margin_ddm){
	if($(profit_margin_ddm).val()==="m")
	{
		$(".pm_manual").attr("readonly", "").removeClass("r_o").addClass("text");
	} else
	{
		$(".pm_manual").attr("readonly", true).addClass("r_o").removeClass("text");
		getProfitMargin(profit_margin_ddm);
	}
	
	
}
/*end: manul edit*/
//profit margin get prepress, production
function getProfitMargin(profit)
{
//alert("123")
	var optionid=$("#show_my_options li a.active_nav").attr("estopt");
	var prepress=$("#" + $(profit).attr("id") + " option:selected").attr("prepress");
	var shipping=$("#" + $(profit).attr("id") + " option:selected").attr("shipping");
//	alert(prepress+"-------"+shipping)
	$("#estRfqPrePressProfit_"+optionid).val(prepress);
	$("#estRfqShippingProfit_"+optionid).val(shipping);
	
	var section = $(profit).closest(".section").attr("id");

	var ven_section = $("#" + section + " .estimates_section.production");
	//alert("temp: "+$("#" + $(profit).attr("id")).val());
	var temp_id = $("#" + $(profit).attr("id")).val();
	var ven_tot = $("#" + section + " .estimates_section.production .vendor_cst_total").val();
	updateProductionProfitMargin(ven_section, temp_id, optionid, ven_tot);
	
	adjustedXrate(optionid);
}
//end 

/*start: showing older Revision*/
$("#rfq_revisions").live("change",function(){
	
	
			var option = $("#show_my_options > li > a.active_nav").attr("rel_new");
			
				var rfqid=$("#rfq_id").val();	
				var catid=$("#catid").val();
				var deptid=$("#deptid").val();
				var onDemandrevision=$(this).val();
				var latestRev=$("#rfq_revisions option:selected").attr("latestRev");
				//alert(latestRev+"-----"+onDemandrevision)
				var str="&rfqId="+rfqid+"&catId="+catid+"&deptid="+deptid+"&onDemandrevision="+onDemandrevision;
					$.ajax({
					   type: "POST",
					   url: base_url+'listview/onDemandProductSpecfications',
					   data: str,
					   beforeSend: function(){

							$(".a_b_c_d").addClass("pos_rel").html("<div class='cust_save_box'><span class='load_msg'>Loading Option" + option + " Details..</span></div>");
							
							/*start: toggle the view of current Revision status*/
							var latest_rev = $("#rfq_revisions option:first").val();
							var selected_rev = $("#rfq_revisions").val();
							if(latest_rev != selected_rev){
								$("#current_revision").show();
								$("#projectdetails").addClass("older_rev");
							}else{
								$("#current_revision").hide();
								$("#projectdetails").removeClass("older_rev");
							}
							/*end: toggle the view of current Revision status*/	
							
					   },
					   success: function(msg){
						   //alert(msg)
						$(".a_b_c_d").html(msg);
						
						

						validateforms('product_spec_13');
						validateforms('product_spec_14');
						validateforms('product_spec_15');
						validateforms('shipping_form_13');
						validateforms('shipping_form_14');
						validateforms('shipping_form_15');
						validateforms('estimate_save_13');
						validateforms('estimate_save_14');
						validateforms('estimate_save_15');
						
						show_option(option);
						
						/*reset leftnav option status*/
						setOptionStatus();
						//alert(latestRev+"---"+onDemandrevision)
						/*if(latestRev!=onDemandrevision)
						{
							$(".edit_sec").attr("id","editRevision");
					  	  	$(".edit_sec > span > span").html("Edit To Create New Revision")
						}*/
						
						},
						complete: function(){
							}
					 });
										   
});
/*end: showing older Revision*/

/*start: loading revisions*/
$("#revision").live("click",function(){
				revisionsLoad++;
				if(revisionsLoad==1){
					$.ajax({
					   type: "POST",
					   url: base_url+'listview/onDemandRevision',
					   //data: str,
					   beforeSend: function(){
						   $("#revisions").html("<div class='cust_save_box'><span class='load_msg'>Loading Revisions..</span></div>");					
					   },
					   success: function(msg){
						 //alert(msg)
							$("#revisions").html(msg)
						},
						complete: function(){
							}
					 });
				}
													 
});
/*end: loading revisions*/

function setOptionStatus(){
	var est_bar = '';
	var opt_id = '';
	var status = "";
	$("#show_my_options li > a").each(function(index){

		opt_id = $(this).attr("estopt");
		est_bar = $("#job_estimates_" + opt_id + " .est_btn_bar")
		$("#ac_mask").removeClass("accepted_est");
		
		
		if($(est_bar).hasClass("estimate_accepted")){
		
			if($("#rfq_revisions option:first").attr("latestrev") == $("#rfq_revisions option:selected").val()){
				status = "opt_approved";
				$("#ac_mask").addClass("accepted_est");
			}else{
				$(this).removeClass("opt_approved");
				status = "opt_estSend";
			}
			
			$(this).addClass(status);
			
		}else if($(est_bar).hasClass("estimate_sent")){
			status = "opt_estSend";
			$(this).addClass(status).removeClass("opt_approved");
		}else if($(est_bar).hasClass("has_estimate")){
			status = "opt_est";
			$(this).addClass(status).removeClass("opt_estSend opt_approved");
		}else if($(est_bar).hasClass("no_estimate")){
			status = "no_estimate";
			$(this).removeClass("opt_est opt_estSend opt_approved");
		}
		
		setOptionStatusTtip($(this).attr("id"), status)

	});

}


function setOptionStatusTtip(a_obj, status){
	//alert(status);
	var tTip = "";
	if(status == "opt_approved"){
		tTip = "Estimate Accepted";
	}else if(status == "opt_estSend"){
		var date = $("#rfqEst_EstimateSentDateString_" + $("#" + a_obj).attr("estopt")).val();
		tTip = "Estimate Sent on " + date;
	}else if(status == "opt_est"){
		tTip = "Estimate Added";
	}else if(status == "no_estimate"){
		tTip = "Estimate not Added";
	}

	
	var temp_opt_status = $("#" + a_obj + " .opt_status");
	var opt_status = temp_opt_status.clone();
	temp_opt_status.remove();
	opt_status.attr("alt", tTip);				
	$("#" + a_obj).append(opt_status);
}

/*start: loading trackjob*/
$("#track_job_lnk").live("click",function(){
									  
	var RfqId = $("#rfq_id").val();
	var count = $("#trackjob_details .row").length;

	getTrackJobDetails(RfqId, count);
								 
});
/*end: loading trackjob*/

/* start:approved estimate checked */
$(".notify_cust_check").live("click",function(){
	$(this).toggleClass("checked");

	if($(this).hasClass("checked")){
		$("#ps_ApprovedEstimate_" + $("#show_my_options li a.active_nav").attr("estopt")).val(1);
		$("#shipping_ApprovedEstimate_" + $("#show_my_options li a.active_nav").attr("estopt")).val(1);
	}else{
		$("#ps_ApprovedEstimate_" + $("#show_my_options li a.active_nav").attr("estopt")).val(0);
		$("#shipping_ApprovedEstimate_" + $("#show_my_options li a.active_nav").attr("estopt")).val(0);
	}									 
});
/* end:approved estimate checked */

/*start: close the approved estimate notification msg in popup*/
$("#preview_revision_window .closeme:not(.disabled), #back_btn.active").live("click", function(){
	//continue_cnt = 0;
	$(".main_rev_form.approved_msg").animate({top: "-140px"});
});


/*@start: popup back button click*/
$("#preview_revision_window .rev_win_p_back").live("click", function(){

	unblockRevWin();
	$(".main_rev_form.approved_msg").animate({top: "-140px"});

});


/*@start: clickable current revision*/
$("#current_revision").live("click", function(){
	
	$("#rfq_revisions option:first").attr("selected", "selected");
	$("#rfq_revisions").trigger("change")

});

/*@start: create new rev continue*/
$(".continue_new_rev_s_btn").live("click", function(){
	
	$("#creating_new_rev").fadeIn();
	
	
	//alert( $(this).attr("rel"));
	$("#" + $(this).attr("rel")).submit();

});


/*@start: prepare options status for Revision Modal Window*/
function generateOptionsStatus(target_id, new_rev){

	var options = new Array();
	
	if($("#show_my_options li a").length>0){
	
		var revision_num = new_rev?$("#rfq_revisions option").size():parseInt($("#rfq_revisions option").size())-1;
		
		var is_est_exist = false;
	
		
		var dynamic_rev = "<span class='rt_new new_rev_num'>" + revision_num + "</span>";

		options.push(dynamic_rev);
		
		options.push("<ul class='inner_revision l_brdr'>");
	
		$("#show_my_options li a").each(function(option){
			var option_class = "Raju Bogi";
			is_est_exist = $("#templateSlect_" + $(this).attr("estopt") + " option:selected").val() > 0;

			if(new_rev){
				if($(this).hasClass("opt_est") ||  $(this).hasClass("opt_approved") || $(this).hasClass("opt_estSend")){
					option_class = "est_true";
					if(!is_est_exist){
						option_class = "est_false";
					}
				}else{
					option_class = "est_false";
					if(is_est_exist){
						option_class = "est_true";
					}
				}
			}else{
				if($(this).hasClass("opt_approved")){
					option_class = "est_approved";
					if(!is_est_exist){
						option_class = "est_false";
					}
				}else if($(this).hasClass("opt_estSend")){
					option_class = "est_sent";
					if(!is_est_exist){
						option_class = "est_false";
					}
				}
				else if($(this).hasClass("opt_est")){
					option_class = "est_true";
					if(!is_est_exist){
						option_class = "est_false";
					}
				}else{
					option_class = "est_false";
					if(is_est_exist){
						option_class = "est_true";
					}
				}
			}
			
			options.push("<li class='rev_paper " + option_class + " '><label>" + $(this).text() + "</label></li>");
	
		});
		
		options.push("</ul>");
		
		$("#" + target_id).html(options.join(''));
		
	//alert(options.join());
	}

}
