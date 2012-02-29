// JavaScript Document

// -----------------  applying  filter coding starts here -------- ///

// filter for  maximum starts here 	 
	$("#estvalmax").livequery("change", function(){	    	  
	$("#clearEstimateval_span").show();
	$("#hidden_val_filter_4").val("1");	 
	$(this).closest(".filterrow").addClass("remove_c");  
	 var qfc_date = $("#qfc_date").val();	 
	 var start_date = $("#rfq_start_date").val();
	 var end_date = $("#rfq_end_date").val();	
	 var country = $("#rfq_country").val(); 
	 var rfq_producttype = $("#rfq_producttype").val(); 
	 
	 if($("#hidden_filter_6").val()=="1")	 
	 var rfq_anualprint = $("#rfq_anualprint").val(); 
	 else
	 var rfq_anualprint = '-1'; 
	 
	 
	 
	  var estval = "";
	  var maxval = "";
	 
	 
	 if($("#hidden_val_filter_4").val()==1)
	 {
		  estval = $("#estval").val();		  
	      maxval = $("#estvalmax").val();  	 	 
	 }
	 
	 
	 var order_val = $("#order_hidden").val();
	 
	 var query_str = "start_date="+start_date+"&end_date="+end_date+"&qfc_date="+qfc_date+"&country="+country+"&rfq_producttype="+rfq_producttype+"&rfq_anualprint="+rfq_anualprint+"&estval="+estval+"&maxval="+maxval+"&showgrid=1&order_val="+order_val
	 // alert(query_str)
	  $.ajax({
	   type: "POST",
	   url: base_url+"admin/admin_jobs/setFilterOptions",
	   data: query_str,
	   success: function(html){		 
	   setLeftnav_counts();
	   }
	 });	  	 
	 
});
 // filter for maximum ends here 	



// filter for  minmumestimate starts here 	 
	$("#estval").livequery("change", function(){	    	  
	
	 
	$("#clearEstimateval_span").show();
	
	$("#hidden_val_filter_4").val("1");	 
	
	 $(this).closest(".filterrow").addClass("remove_c");
	 var qfc_date = $("#qfc_date").val();	 
	 var start_date = $("#rfq_start_date").val();
	 var end_date = $("#rfq_end_date").val();	
	 var country = $("#rfq_country").val(); 
	 var rfq_producttype = $("#rfq_producttype").val(); 
	 if($("#hidden_filter_6").val()=="1")	 
	 var rfq_anualprint = $("#rfq_anualprint").val(); 
	 else
	 var rfq_anualprint = '-1'; 
	 
	  var estval = $("#estval").val();	
	  changeUpperBoundary(estval)
	  var maxval = $("#estvalmax").val();  	 
	 
	/*   var estval = "";
	     changeUpperBoundary(estval)
	  var maxval = "";*/
	 
	 
	 if($("#hidden_val_filter_4").val()==1)
	 {
		  estval = $("#estval").val();		  
	      maxval = $("#estvalmax").val();  	 	 
	 }else
	 {
		 estval = "";
		 maxval = "";
	 }
	 
	 var order_val = $("#order_hidden").val();
	 
	 var query_str = "start_date="+start_date+"&end_date="+end_date+"&qfc_date="+qfc_date+"&country="+country+"&rfq_producttype="+rfq_producttype+"&rfq_anualprint="+rfq_anualprint+"&estval="+estval+"&maxval="+maxval+"&showgrid=1&order_val="+order_val
	  //alert(query_str)
	  $.ajax({
	   type: "POST",
	   url: base_url+"admin/admin_jobs/setFilterOptions",
	   data: query_str,
	   success: function(html){		 
		setLeftnav_counts();
	   }
	 });	  	 
	 
});
 // filter for minmumestimate ends here 	




// filter for  rfq_anualprint starts here 	 
	$("#rfq_anualprint").livequery("change", function(){
 
 	$("#clearAnualprint_span").show();
    $("#hidden_val_filter_6").val("1");	 
	
 $(this).closest(".filterrow").addClass("remove_c");
	 var qfc_date = $("#qfc_date").val();	 
	 var start_date = $("#rfq_start_date").val();
	 var end_date = $("#rfq_end_date").val();	
	 var country = $("#rfq_country").val(); 
	 var rfq_producttype = $("#rfq_producttype").val(); 
	 if($("#hidden_filter_6").val()=="1")	 
	 var rfq_anualprint = $("#rfq_anualprint").val(); 
	 else
	 var rfq_anualprint = '-1'; 
	 
	   var estval = "";
	  var maxval = "";
	 
	 
	 if($("#hidden_val_filter_4").val()==1)
	 {
		  estval = $("#estval").val();		  
	      maxval = $("#estvalmax").val();  	 	 
	 }
	 
	 var order_val = $("#order_hidden").val();
	 
	 var query_str = "start_date="+start_date+"&end_date="+end_date+"&qfc_date="+qfc_date+"&country="+country+"&rfq_producttype="+rfq_producttype+"&rfq_anualprint="+rfq_anualprint+"&estval="+estval+"&maxval="+maxval+"&showgrid=1&order_val="+order_val
	   //alert(query_str)
	  $.ajax({
	   type: "POST",
	   url: base_url+"admin/admin_jobs/setFilterOptions",
	   data: query_str,
	   success: function(html){		 
		setLeftnav_counts();
	   }
	 });
	
	});
	
  // filter for rfq_anualprint ends here 
	


// filter for  rfq_producttype starts here 	 
	$("#rfq_producttype").livequery("change", function(){
 
 	$("#clearTypeofpro_span").show();
	
	$("#hidden_val_filter_5").val("1");	 
	
    $(this).closest(".filterrow").addClass("remove_c");
	 var qfc_date = $("#qfc_date").val();	 
	 var start_date = $("#rfq_start_date").val();
	 var end_date = $("#rfq_end_date").val();	
	 var country = $("#rfq_country").val(); 
	  var rfq_producttype = $("#rfq_producttype").val(); 
	   if($("#hidden_filter_6").val()=="1")	 
	 var rfq_anualprint = $("#rfq_anualprint").val(); 
	 else
	 var rfq_anualprint = '-1'; 
	   var estval = "";
	  var maxval = "";
	 
	 
	 if($("#hidden_val_filter_4").val()==1)
	 {
		  estval = $("#estval").val();		  
	      maxval = $("#estvalmax").val();  	 	 
	 }
	 var order_val = $("#order_hidden").val();
	 
	 var query_str = "start_date="+start_date+"&end_date="+end_date+"&qfc_date="+qfc_date+"&country="+country+"&rfq_producttype="+rfq_producttype+"&rfq_anualprint="+rfq_anualprint+"&estval="+estval+"&maxval="+maxval+"&showgrid=1&order_val="+order_val
	 //alert(query_str)
	  $.ajax({
	   type: "POST",
	   url: base_url+"admin/admin_jobs/setFilterOptions",
	   data: query_str,
	   success: function(html){		 
		setLeftnav_counts();
	   }
	 });
	
	});
	
  // filter for rfq_producttype ends here 
	

// filter for  country starts here 	 
	$("#rfq_country").livequery("change", function(){
 	
	//alert($(this).parent().attr("class"));
	
 	//$(this).parent("div").addclass("remove_c");
 
 
 
     $("#hidden_val_filter_3").val("1");	 
 
 
  	 $("#clearCountry_span").show();
	 
	 $(this).closest(".filterrow").addClass("remove_c");
 
	 var qfc_date = $("#qfc_date").val();	 
	 var start_date = $("#rfq_start_date").val();
	 var end_date = $("#rfq_end_date").val();	
	 var country = $("#rfq_country").val(); 
	 
	 var rfq_producttype = $("#rfq_producttype").val(); 
	 
	 if($("#hidden_filter_6").val()=="1")	 
	 var rfq_anualprint = $("#rfq_anualprint").val(); 
	 else
	 var rfq_anualprint = '-1'; 
	 
	 
	 
	  var estval = "";
	  var maxval = "";
	 
	 
	 if($("#hidden_val_filter_4").val()==1)
	 {
		  estval = $("#estval").val();		  
	      maxval = $("#estvalmax").val();  	 	 
	 }
	 
	 var order_val = $("#order_hidden").val();
	 
	 var query_str = "start_date="+start_date+"&end_date="+end_date+"&qfc_date="+qfc_date+"&country="+country+"&rfq_producttype="+rfq_producttype+"&rfq_anualprint="+rfq_anualprint+"&estval="+estval+"&maxval="+maxval+"&showgrid=1&order_val="+order_val
	 
	  $.ajax({
	   type: "POST",
	   url: base_url+"admin/admin_jobs/setFilterOptions",
	   data: query_str,
	   success: function(html){		 
		setLeftnav_counts();
	   }
	 });
	
	});
	
  // filter for country ends here 
	

// filter for qfc date starts here 	 
	$("#qfc_date").livequery("change", function(){
		 
     $("#clearQfcDate_span").show();
	$(this).closest(".filterrow").addClass("remove_c");
	
	$("#hidden_val_filter_2").val("1");	 
	
	 var qfc_date = $("#qfc_date").val();	 
	 var start_date = $("#rfq_start_date").val();
	 var end_date = $("#rfq_end_date").val();	
	  
	  var country = $("#rfq_country").val(); 
	 
	 var rfq_producttype = $("#rfq_producttype").val(); 
	 
	   if($("#hidden_filter_6").val()=="1")	 
	 var rfq_anualprint = $("#rfq_anualprint").val(); 
	 else
	 var rfq_anualprint = '-1'; 
	 
	  var estval = $("#estval").val();		  
	  var maxval = $("#estvalmax").val();  	 
	 
	 var order_val = $("#order_hidden").val();
	 
	 var query_str = "start_date="+start_date+"&end_date="+end_date+"&qfc_date="+qfc_date+"&country="+country+"&rfq_producttype="+rfq_producttype+"&rfq_anualprint="+rfq_anualprint+"&estval="+estval+"&maxval="+maxval+"&showgrid=1&order_val="+order_val
	 
	 
	  $.ajax({
	   type: "POST",
	   url: base_url+"admin/admin_jobs/setFilterOptions",
	   data: query_str,
	   success: function(html){		 
		setLeftnav_counts();
	   }
	 });
   
	});
	
  // filter for qfc date ends here 

// filter for rfq date starts here 	 
	$("#rfq_end_date").livequery("change", function(){
	
	$("#clearRfqDate_span").show();
	$("#hidden_val_filter_1").val("1");	 
	$(this).closest(".filterrow").addClass("remove_c");
	
	 var qfc_date = $("#qfc_date").val();	 
	 var start_date = $("#rfq_start_date").val();
	 var end_date = $("#rfq_end_date").val();	
	  
	 var country = $("#rfq_country").val(); 
	 
	  var rfq_producttype = $("#rfq_producttype").val(); 
	 
	  if($("#hidden_filter_6").val()=="1")	 
	 var rfq_anualprint = $("#rfq_anualprint").val(); 
	 else
	 var rfq_anualprint = '-1'; 
	 
	  var estval = $("#estval").val();		  
	  var maxval = $("#estvalmax").val();  	 
	 
	  var order_val = $("#order_hidden").val();
	 
	 var query_str = "start_date="+start_date+"&end_date="+end_date+"&qfc_date="+qfc_date+"&country="+country+"&rfq_producttype="+rfq_producttype+"&rfq_anualprint="+rfq_anualprint+"&estval="+estval+"&maxval="+maxval+"&showgrid=1&order_val="+order_val
	 
	  $.ajax({
	   type: "POST",
	   url: base_url+"admin/admin_jobs/setFilterOptions",
	   data: query_str,
	   success: function(html){		 
		setLeftnav_counts();
	   }
	 });
   
	});
	
  // filter for rfq date ends here 	
  
  
 // -----------------  applying  filter coding starts here -------- /// 
  
 
 
 ////// <<<<<<<     Defaut filter settings starts here   >>>>> /////
  
  //this function for showing the filter oprtion
		 $(".filterGrid").live("click", function(){
		  
		//alert('hi');
				
		 
		 
		  ////<<<< Removing default filters coding starts here >>>>///
		  
		  if($(this).hasClass("filter_tab")){
			//  alert('hi');
		
			 
						var current_filter_val =  $("#order_hidden").val();
						
						//alert(current_filter_val)
						
					    var split_array = Array();
						split_array = current_filter_val.split("^")
						 
						for(var i=0;i<split_array.length;i++)
						{
							if(split_array[i]!="")
							{
								 var filter_val = split_array[i];
								 var divid="#filter_"+filter_val;
							
								 var hiden_var_id = "#hidden_"+"filter_"+filter_val;
								 
								 $(divid).removeClass("remove_c");
								 
								  $("#hidden_filterBox").append($(divid));
					  
								  $(hiden_var_id).val("0");
								  
								  
								  
							}
						}
		   
						$("#new_filter_child").hide();		
						 var fH = $("#filterBox").height()+parseInt(31);
					    $("#active_content_contentarea").css("top", fH);//active_content
	    }
									   
		else
		{
			 
			  steDefaultSelectOptions();
			  	
		}
		 
	     ////<<<< Removing default filters coding ends here >>>>///	
										
										
		 $(this).toggleClass("filter_tab");
		 $("#filterBox").toggle();
		 
		  /// hiding clear spans coding statrs here
		  $("#clearRfqDate_span").hide();
		  $("#clearQfcDate_span").hide();
		  $("#clearCountry_span").hide();
	      $("#clearEstimateval_span").hide();
		  $("#clearTypeofpro_span").hide();
		  $("#clearAnualprint_span").hide();
		  /// hiding clear spans coding ends here
		  if($.browser.msie == true)
			 $("#contentarea").height($(window).height()- 105);
		  if($("#filterBox").is(":visible")){
		  var fH = $("#filterBox").height()+parseInt($("#active_content_contentarea").css("top"));//active_content
		  $("#active_content_contentarea").css("top", fH);//active_content
		   }else
		   {
			    var rH = parseInt($("#active_content_contentarea").css("top"))-$("#filterBox").height();//active_content
				  $("#active_content_contentarea").css("top", rH);//active_content
			  
			   
			  /* var mystr = "hidden1_val="+$("#hidden_val_filter_1").val();
			   
			   mystr = mystr + "hidden2_val="+$("#hidden_val_filter_2").val();
			   
			   mystr = mystr + "hidden3_val="+$("#hidden_val_filter_3").val();
				
			   mystr = mystr + "hidden4_val="+$("#hidden_val_filter_4").val();
				  
			   mystr = mystr + "hidden5_val="+$("#hidden_val_filter_5").val();
			   
			   mystr = mystr + "hidden6_val="+$("#hidden_val_filter_6").val();  
			   
			   alert(mystr);*/
			   
			   
			   
			   if($("#hidden_val_filter_1").val()!="0" || $("#hidden_val_filter_2").val()!="0" || $("#hidden_val_filter_3").val()!="0" || $("#hidden_val_filter_4").val()!="0" || $("#hidden_val_filter_5").val()!="0"  ||  $("#hidden_val_filter_6").val()!="0" ){
			   
			   
		   		$("#hidden_val_filter_1").val("0");
				$("#hidden_val_filter_2").val("0");
				$("#hidden_val_filter_3").val("0");
				$("#hidden_val_filter_4").val("0");
				$("#hidden_val_filter_5").val("0");
				$("#hidden_val_filter_6").val("0");
				
				  
				  //$(".active_nav").trigger("click");
				 $("#qfc_date").val("");	 
				 $("#rfq_start_date").val("");
	             $("#rfq_end_date").val("");
				 $("#rfq_country").val("0"); 
				 $("#rfq_producttype").val("0"); 
				 $("#rfq_anualprint").val("-1"); 	 
	             $("#estval").val("0");		  
	    		 $("#estvalmax").val("100000");  	 
	  
	 			 $("#order_hidden").val("")
	    
	             var query_str = "start_date=&end_date=&qfc_date=&country=0&rfq_producttype=&rfq_anualprint=-1&estval=&maxval=&showgrid=0&order_val=";
	 			 
				// alert(query_str);
				 
			  $.ajax({
			   type: "POST",
			   url: base_url+"admin/admin_jobs/setFilterOptions",
			   data: query_str,
			   success: function(html){
				// alert( html );
				setLeftnav_counts();
			   }
			 });
				   
			   } /// hidden if ends
				   }
				  
				 });
 // filter option code ends
		
 ////// <<<<<<<     Defaut filter settings ends here   >>>>> /////		
		
		
// -----------------   clear filter coding starts here -------- ///


// clear for rfqdate filter starts here
	$("#clearRfqDate").live("click", function(){
	// alert('clearRfqDate');
		
     $("#clearRfqDate_span").hide();
	 $("#hidden_val_filter_1").val("0");	 
	  $(this).closest(".filterrow").removeClass("remove_c");
		
	 $("#rfq_start_date").val("");
     $("#rfq_end_date").val("");	
		
	 var qfc_date = $("#qfc_date").val();	 
	 var start_date = '';
	 var end_date = '';	
	 var country = $("#rfq_country").val(); 
	 var rfq_producttype = $("#rfq_producttype").val(); 
	  if($("#hidden_filter_6").val()=="1")	 
	 var rfq_anualprint = $("#rfq_anualprint").val(); 
	 else
	 var rfq_anualprint = '-1'; 
	 
	    var estval = "";
	  var maxval = "";
	 
	 
	 if($("#hidden_val_filter_4").val()==1)
	 {
		  estval = $("#estval").val();		  
	      maxval = $("#estvalmax").val();  	 	 
	 }
	 
	  var showGridval = 1;
	  
	// alert(findFilterDefaultValues());
	  
	  if(findFilterDefaultValues())
	  {
		  showGridval = 0;
	  }
	  
	  
	  
	 
	  
	  var order_val = $("#order_hidden").val();
	 
	 
	 var query_str = "start_date="+start_date+"&end_date="+end_date+"&qfc_date="+qfc_date+"&country="+country+"&rfq_producttype="+rfq_producttype+"&rfq_anualprint="+rfq_anualprint+"&estval="+estval+"&maxval="+maxval+"&showgrid="+showGridval+"&order_val="+order_val
	 // alert(query_str)
	  $.ajax({
	   type: "POST",
	   url: base_url+"admin/admin_jobs/setFilterOptions",
	   data: query_str,
	   success: function(html){		 
		setLeftnav_counts();
	   }
	 });	  	 
	  
	  
	});
	// clear for rfqdate filter ends here
	 

	// clear for qfcdate filter starts here
	$("#clearQfcDate").live("click", function(){
		//alert('surya');
		
     $("#clearQfcDate_span").hide();
	  $("#hidden_val_filter_2").val("0");	 
	 $(this).closest(".filterrow").removeClass("remove_c");
	 
     $("#qfc_date").val("");	
		
	 var qfc_date = '';	 
	 var start_date = $("#rfq_start_date").val();
	 var end_date =   $("#rfq_end_date").val();	
	 var country = $("#rfq_country").val(); 
	 var rfq_producttype = $("#rfq_producttype").val(); 
	  if($("#hidden_filter_6").val()=="1")	 
	 var rfq_anualprint = $("#rfq_anualprint").val(); 
	 else
	 var rfq_anualprint = '-1'; 
	 
	   var estval = "";
	  var maxval = "";
	 
	 
	 if($("#hidden_val_filter_4").val()==1)
	 {
		  estval = $("#estval").val();		  
	      maxval = $("#estvalmax").val();  	 	 
	 }
	 var showGridval = 1;
	  
	  if(findFilterDefaultValues())
	  {
		  showGridval = 0;
	  }
	 
	 
	  
	  var order_val = $("#order_hidden").val();
	 
	 
	 var query_str = "start_date="+start_date+"&end_date="+end_date+"&qfc_date="+qfc_date+"&country="+country+"&rfq_producttype="+rfq_producttype+"&rfq_anualprint="+rfq_anualprint+"&estval="+estval+"&maxval="+maxval+"&showgrid="+showGridval+"&order_val="+order_val
	 // alert(query_str)
	  $.ajax({
	   type: "POST",
	   url: base_url+"admin/admin_jobs/setFilterOptions",
	   data: query_str,
	   success: function(html){		 
		setLeftnav_counts();
	   }
	 });	  	 
	});
	// clear for qfcdate filter ends here
 
 
 	// clear for clearCountry filter starts here
	$("#clearCountry").live("click", function(){
	// alert('surya');
		
     $("#clearCountry_span").hide();
	 
	  $(this).closest(".filterrow").removeClass("remove_c");
	 
     $("#rfq_country").val("0");	
	 
	 $("#hidden_val_filter_3").val("0");	 
		
	 var qfc_date =  $("#qfc_date").val();	
	 var start_date = $("#rfq_start_date").val();
	 var end_date =   $("#rfq_end_date").val();	
	 var country = '0'; 
	 var rfq_producttype = $("#rfq_producttype").val(); 
	  if($("#hidden_filter_6").val()=="1")	 
	 var rfq_anualprint = $("#rfq_anualprint").val(); 
	 else
	 var rfq_anualprint = '-1'; 
	 
  	  var estval = "";
	  var maxval = "";
	 
	 
	 if($("#hidden_val_filter_4").val()==1)
	 {
		  estval = $("#estval").val();		  
	      maxval = $("#estvalmax").val();  	 	 
	 }
	 
	 var showGridval = 1;
	  
	  if(findFilterDefaultValues())
	  {
		  showGridval = 0;
	  }
	 
	 
	 
	   var order_val = $("#order_hidden").val();
	 
	 
	 var query_str = "start_date="+start_date+"&end_date="+end_date+"&qfc_date="+qfc_date+"&country="+country+"&rfq_producttype="+rfq_producttype+"&rfq_anualprint="+rfq_anualprint+"&estval="+estval+"&maxval="+maxval+"&showgrid="+showGridval+"&order_val="+order_val
	 // alert(query_str)
	  $.ajax({
	   type: "POST",
	   url: base_url+"admin/admin_jobs/setFilterOptions",
	   data: query_str,
	   success: function(html){		 
		setLeftnav_counts();
	   }
	 });	  	 
	});
	// clear for clearCountry filter ends here
	
	
	// clear for clearEstimateval filter starts here
	$("#clearEstimateval").live("click", function(){
		//alert('surya');
		
     $("#clearEstimateval_span").hide();
	  $("#hidden_val_filter_4").val("0");	 
	 $(this).closest(".filterrow").removeClass("remove_c");
	 setDefaultMaxValues();
	 
     $("#estval").val("0");		  
	 $("#estvalmax").val("100000");  	 
		
	 var qfc_date =  $("#qfc_date").val();	
	 var start_date = $("#rfq_start_date").val();
	 var end_date =   $("#rfq_end_date").val();	
	 var country =   $("#rfq_country").val(); 
	 var rfq_producttype = $("#rfq_producttype").val(); 
	  if($("#hidden_filter_6").val()=="1")	 
	 var rfq_anualprint = $("#rfq_anualprint").val(); 
	 else
	 var rfq_anualprint = '-1'; 
	 
	  var estval = '';		  
	  var maxval = '';  	 
	 
	 var showGridval = 1;
	  
	  if(findFilterDefaultValues())
	  {
		  showGridval = 0;
	  }
	 
	 
	/*  var delte_filter_id = $(this).attr("filtervalue");
	 
	 var delete_filter_val = "^"+delte_filter_id;
	 
	 var current_val = $("#order_hidden").val();
	 
	 current_val =  current_val.replace(delete_filter_val,"");
	 
	 
	 $("#order_hidden").val(current_val);*/
	 
	  var order_val = $("#order_hidden").val();
	 
	 
	 var query_str = "start_date="+start_date+"&end_date="+end_date+"&qfc_date="+qfc_date+"&country="+country+"&rfq_producttype="+rfq_producttype+"&rfq_anualprint="+rfq_anualprint+"&estval="+estval+"&maxval="+maxval+"&showgrid="+showGridval+"&order_val="+order_val
	 // alert(query_str)
	  $.ajax({
	   type: "POST",
	   url: base_url+"admin/admin_jobs/setFilterOptions",
	   data: query_str,
	   success: function(html){		 
		setLeftnav_counts();
	   }
	 });	  	 
	});
	// clear for clearEstimateval filter ends here
 
	// clear for clearTypeofpro filter starts here
	$("#clearTypeofpro").live("click", function(){
		//alert('surya');
		
     $("#clearTypeofpro_span").hide();
	  $("#hidden_val_filter_5").val("0");	 
	 
	 $(this).closest(".filterrow").removeClass("remove_c");
	 
     $("#rfq_producttype").val("0");	
		
	 var qfc_date =  $("#qfc_date").val();	
	 var start_date = $("#rfq_start_date").val();
	 var end_date =   $("#rfq_end_date").val();	
	 var country = $("#rfq_country").val();  
	 var rfq_producttype = ''; 
	 
	 
	 if($("#hidden_filter_6").val()=="1")	 
	 var rfq_anualprint = $("#rfq_anualprint").val(); 
	 else
	 var rfq_anualprint = '-1'; 
	 
	   var estval = "";
	  var maxval = "";
	 
	 
	 if($("#hidden_val_filter_4").val()==1)
	 {
		  estval = $("#estval").val();		  
	      maxval = $("#estvalmax").val();  	 	 
	 }
	 
	 var showGridval = 1;
	  
	  if(findFilterDefaultValues())
	  {
		  showGridval = 0;
	  }
	  
	//  alert(showGridval)
	 
	 
	 
	  var order_val = $("#order_hidden").val();
	 
	 
	 
	 var query_str = "start_date="+start_date+"&end_date="+end_date+"&qfc_date="+qfc_date+"&country="+country+"&rfq_producttype="+rfq_producttype+"&rfq_anualprint="+rfq_anualprint+"&estval="+estval+"&maxval="+maxval+"&showgrid="+showGridval+"&order_val="+order_val
	 // alert(query_str)
	  $.ajax({
	   type: "POST",
	   url: base_url+"admin/admin_jobs/setFilterOptions",
	   data: query_str,
	   success: function(html){		 
		setLeftnav_counts();
	   }
	 });	  	 
	});
	// clear for clearTypeofpro filter ends here
	
	
	// clear for clearAnualprint filter starts here
	$("#clearAnualprint").live("click", function(){
		//alert('surya');
		
     $("#clearAnualprint_span").hide();
	 
	  $("#hidden_val_filter_6").val("0");	 
	 
	 $(this).closest(".filterrow").removeClass("remove_c");
	 
     $("#rfq_anualprint").val("-1");	
		
	 var qfc_date =  $("#qfc_date").val();	
	 var start_date = $("#rfq_start_date").val();
	 var end_date =   $("#rfq_end_date").val();	
	 var country = $("#rfq_country").val();  
	 var rfq_producttype = $("#rfq_producttype").val(); 
	 var rfq_anualprint = "-1"; 
	 
	   var estval = "";
	  var maxval = "";
	 
	 
	 if($("#hidden_val_filter_4").val()==1)
	 {
		  estval = $("#estval").val();		  
	      maxval = $("#estvalmax").val();  	 	 
	 }
	  var showGridval = 1;
	  
	  if(findFilterDefaultValues())
	  {
		  showGridval = 0;
	  }
	  
	   
	   var order_val = $("#order_hidden").val();
	 
	 
	 var query_str = "start_date="+start_date+"&end_date="+end_date+"&qfc_date="+qfc_date+"&country="+country+"&rfq_producttype="+rfq_producttype+"&rfq_anualprint="+rfq_anualprint+"&estval="+estval+"&maxval="+maxval+"&showgrid="+showGridval+"&order_val="+order_val
	 // alert(query_str)
	  $.ajax({
	   type: "POST",
	   url: base_url+"admin/admin_jobs/setFilterOptions",
	   data: query_str,
	   success: function(html){		 
		setLeftnav_counts();
	   }
	 });	  	 
	});
	// clear for clearAnualprint filter ends here
	
// -----------------   clear filter coding ends here -------- ///
	
