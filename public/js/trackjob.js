/*start: trackJob xml parsing*/
function getTrackJobDetails(rfqId, count){

	$("#track_rfq_date").text($("#jd_rfq_date").text());
	var param = "&RfqId=" + rfqId + "&count=" + count;

		$.ajax({
			   type: "POST",
			   url: base_url+'listview/onDemandTrackJob',
			   data: param,
			   dataType: "xml",
			   beforeSend: function(){
				  
				 	if(parseInt(count)==0 || $("#track_job_lnk").hasClass("active_nav")){
				 		$("#trackjob_details").html("<div class='cust_save_box'><span class='load_msg'>Loading Track Job..</span></div>");
				 	}else{
				 		 
				 	}
				 					 
			   },
			   success: parseTrackJobXml,
			   complete: function(){
			   }
			 });

}


/*this function will parse the trackjob xml and create the markup*/
function parseTrackJobXml(xml){	
	$("#trackjob_details .cust_save_box").remove();

	var total_actions = $(xml).find("Action").length;

	if(total_actions > 0)
	{

		$("#trackjob .l_bars").removeClass("no_changes");
		var bar_count = 0; /*$("#trackjob_details .row").length - 1*/
		var row_style = 0;

		var action = "";
		var row_visiblity = "";
		
		var bar_str = "";
		var section = "";
		var temp_sec = "";
		var user = "";
		var date = "";
		var time = "";
		var field = "";
		var section_temp = "";
		var user_temp = "";
		var time_temp = "";
		var show_next = 10;
		var option = "";
		var revision = "";
		var sec_icon_class = "estimate_ico";
		var feed_str = "";
		var questions = 0;
		var rev_cnt = "";
		var has_child_class = "";
		
		$(xml).find("Action").each(function(index)
		{	
			
			field = $(this).find("field");
			action = $(field).attr("action");
			temp_sec = section =  $(this).attr("section");
			
			questions = $(this).find("Question");
			
			
			if(section.indexOf("New Revision") >= 0){
				sec_icon_class = "revision_ico";
			}else if(section.indexOf("Production") >= 0){
				sec_icon_class = "prod_spec_icn";
			}else if(section.indexOf("Estimate") >= 0){
				sec_icon_class = "estimate_ico";
			}else if(section.indexOf("Job Detials") >= 0 || section.indexOf("Job Created") >= 0){
				sec_icon_class = "jod_det_icn";
			}else if(section.indexOf("Client Info") >= 0){
				sec_icon_class = "client_info_icn";
			}else if(section.indexOf("Feedback") >= 0){
				sec_icon_class = "feed_icn";
			}else if(section.indexOf("Internal Notes") >= 0 || section.indexOf("Message sent") >= 0 || section.indexOf("Customer Notes") >= 0){
				sec_icon_class = "dialogue_icn";
			}else if(section.indexOf("Shipping Details") >= 0){
				sec_icon_class = "ship_icn";
			}
			
			
			user = $(this).attr("user");
			user = $.trim(user).length>0 ? user : $("#company_cperson").val() + ", Customer";
			date = $(this).attr("date");
			time = $(this).attr("time");
			
			option = $(field).attr("option");
			revision = $(field).attr("revision");
			


			row_visiblity = "";
			/*if(bar_count == -1){
				row_style = "current";
			}else{
				row_style = "";
			}*/
			
			if(section.indexOf("New Revision") >= 0){
				row_style = "orange";
			}else{
				row_style = "";
			}
			
			if(bar_count > show_next-1){
				row_visiblity = "hide";
			}
			
			
			
			if(section==section_temp && user==user_temp && time==time_temp){
				
				$("#row_desc_" + bar_count).append(createAString(user, action, section, $(field).text(), $(this).find("value").text(), $(this).find("from").text()));
				
			}else{
				
				
				if(option && option>0){
					temp_sec = section + " in Option " + option; /* + " @ Revision " + revision;*/
					rev_cnt = "<span class='rev_cnt'>" + revision + "</span>";
				}else{
					rev_cnt = "";
				}
				
				bar_count++;
				
				if(action == "Decline Estimate"){
					feed_str = "<div class='act_desc'><span class='tj_sub_head'>I am leaving because: </span>";
					feed_str += "<span class='tj_value'>" + $(field).text() + "</span></div>";
					if(questions.length > 0){
						feed_str += createFeedback(questions);
					}else if($(field).text() == "Other"){
						feed_str += "<div class='act_desc'><span class='tj_value p_l_20'>" +  $(this).find("value").text() + "</span></div>";
					}/*else{
						feed_str += "<div class='act_desc'><span class='tj_value'>" +  $(field).text() + "</span></div>";
					}*/
						
				}else{
					feed_str = "";
				}
				if(action != "Estimate added" && action != "Estimate removed" && action != "Estimate sent" && action != "Estimate accepted" && action != "New Revision"){
					has_child_class = "c_inf";				
				}else{
					has_child_class = "";
				}
				
				
				bar_str = "<div rel='row_desc_" + bar_count + "' id='row_" + bar_count + "' class='row grey " + row_style + " " + row_visiblity + " b_v_" + parseInt(bar_count/show_next) + "' b_v_s='"+ parseInt(bar_count/show_next) +"'>" + rev_cnt + "<div class='left_cont'><img class='track_icn "+ sec_icon_class +"' src='" + base_s_img + "spacer.gif' /><span class='sec_desc " + has_child_class + "'>"+ temp_sec +"</span>.</div><div class='middle_cont'><span class='name_text'>"+ user +"</span></div><div class='right_cont'><span class='tym_num'>"+ date +"</span></div></div>";
				
				
				
				
				if(action != "Estimate added" && action != "Estimate removed" && action != "Estimate sent" && action != "Estimate accepted" && action != "New Revision"){
					bar_str += "<div class='row_content' id='row_desc_" + bar_count + "'>";
					bar_str += feed_str;
					
					if(questions.length == 0){
						bar_str += createAString(user, action, section, $(field).text(), $(this).find("value").text(), $(this).find("from").text());
					}
					
					bar_str += "</div>";
				}
				
					
				
				
				$("#trackjob_details").append(bar_str);			
			}

		  user_temp = user;
		  section_temp = section;
		  time_temp = time;	

		});		
		if(bar_count > show_next){
			$("#trackjob_details").append("<div class='show_changes'><a class='click_changes' id='show_more_changes' bar_count='"+ show_next +"' rel='" + $("#trackjob_details .row:hidden:first").attr("b_v_s") +"' count='"+ $("#trackjob_details .row").length +"'>Show " + show_next + " more changes.. </a></div>");
		}
		setHeaderWidth();
		
	}else{
		$("#trackjob .l_bars").addClass("no_changes");
		$("#trackjob_details").html("No changes made so far..");
	}
}

/*this function will toggle the view of the trackjob description according to the clicked row status*/
$("#trackjob_details .row").live("click", function(){
	
	$("#trackjob_details .row.current").removeClass("current");	
	
	$(this).addClass("current");
	$("#" + $(this).attr("id") + " .sec_desc.c_inf").toggleClass("open")
	
	//$(".row_content:visible").hide();
	$("#" + $(this).attr("rel")).toggle();
	setHeaderWidth();
	
});

/*this function will show the next posiible history of jobs. If no jobs are in hidden mode then it will get the data from a ajax call*/
$("#show_more_changes").live("click", function(){

	//var count = $(this).attr("bar_count");
	var bar_rel = $(this).attr("rel");
	
	if($("#trackjob_details .row.hide").length > 0){
		

		$("#trackjob_details .row.b_v_" + bar_rel).removeClass("hide");
		
		var show_nxt_rel = $("#trackjob_details .row:hidden:first").attr("b_v_s");
		$(this).attr("rel", show_nxt_rel);
		
		if($("#trackjob_details .row.b_v_" + bar_rel).length < 10){
			$(this).hide();
		}		
	}/*else{
		//$(this).hide();
		var RfqId = $("#rfq_id").val();
		var count = $("#trackjob_details .row").length;
		getTrackJobDetails(rfqId, count);
		
	}*/
	setHeaderWidth();
	
	
	
});
/*This function will create description of the trackjob string all it needs is username, action, section name, field name, final value, initial value*/
function createAString(user, action, section, field, value, from){
	var str = "";
	if(section == "Feedback modified" || section == "Feedback added"){
		if(value == 1){
			value = "Yes";
		}else if(value == 2){
			value = "No"; 
		}
		if(from == 1){
			from = "Yes";
		}else if(from == 2){
			from = "No"; 
		}
	}else if(section == "Estimate modified"){
		if(value == 1){
			value = "Total Cost";
		}else if(value == 2){
			value = "Unit Cost"; 
		}
		if(from == 1){
			from = "Total Cost";
		}else if(from == 2){
			from = "Unit Cost"; 
		}
	}

	if(field == "Product Use"){
		if(value == 1){
			value = "Promotional Use only";
		}else if(value == 2){
			value = "For Sale"; 
		}
		if(from == 1){
			from = "Promotional Use only";
		}else if(from == 2){
			from = "No"; 
		}
	}
	
	
	
	if(action == "added" || action == "removed")
	{
		str = "<div class='act_desc'><span class='tj_label'>" + field + ": </span> <span class='tj_value'>" + value + "</span> " + action + "</div>";
		
	}else if(action == "changed")
	{
		str = "<div class='act_desc'><span class='tj_label'>" + field + ": </span> " + action + " from <span class='tj_value'>" + from + "</span> "  + "to <span class='tj_value'>" + value + "</span></div>";
	}else if(action == "created"){
		str = "<div class='act_desc'>New Job is created by <span class='tj_value'>" + user + "</span></div>";
	}else if(action == "dialogues"){
		if(value == ""){
			str = "<div class='act_desc'><span class='tj_value'>" + field + "</span></div>";		
		}else{
			str = "<div class='act_desc'><span class='tj_value'>" + field + "</span> <br /><span class='tj_label'>Attachment(s):</span> <span class='tj_value'>" +  value + "</span></div>";
		}
		if(field == ""){
			str = "<div class='act_desc'><span class='tj_label'>Attachment(s):</span> <span class='tj_value'>" +  value + "</span></div>";
		}
	}
	
	return str;
	
}
/*end: trackJob xml parsing*/

/*start: creating feedback string of descline estimate*/
function createFeedback(questions){
	var str = "" ;
	
	$(questions).each(function(index){
		str += "<div class='act_desc'>";
		str += "<span class='tj_label p_l_20'>" + $(this).attr("question") + "</span>";
		
		if($.trim($(this).text()).length > 0){
			str += "<br/>";
			str += "<span class='tj_value p_l_40'>" + $(this).text() + "</span>";
		}
		
		str += "</div>";
	});
	
	return str;
		
}
/*end: creating feedback string of descline estimate*/

/*This function will set the width of the trackjob header according to the scrollbar width*/
function setHeaderWidth(){
	$("#trackjob .cont_header").css("right", $("#trackjob .total_content").width() - $("#trackjob .row:first").width() + "px");	
}