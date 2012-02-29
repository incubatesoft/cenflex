// JavaScript Document
//loading page information
function hideUiblock(divid)
{
  $("#"+divid).unblock();
}

function  showUiblock(divid,message)
{
  var showdiv = '<div class="load_over" style="padding-bottom:100px"><h1 class="block_load"><img src="'+base_spinner+'" />'+message +'</h1></div>';

    $("#"+divid).block({
     message: showdiv, 
     css: {
     width: "auto"
      }
     });
}
//end of loading
function showargs(dept_id)
{
	

	var queryString="&dept_id="+dept_id;
	
		$.ajax({
				   type: "POST",
				   url: base_url+'admin/arg/show_args',
				   data: queryString,
				   beforeSend: function(){
					 
					  $("#dialog").removeClass("active");
					  $("#left_nav").html($(".spinner").clone());
					  
					  $(".loading_img").show();
				   },
				   success: function(html){
						//alert(html)
						var ajaxDisplay = document.getElementById('left_nav');
						ajaxDisplay.innerHTML = html;
						$(".has_children ul li a:first").trigger("click");
						
						//$("#dep_title").html($(".show_dept").closest("#dept_"+dept_id).text());
						//$("#dep_title").attr("rel",$(".show_dept").closest("#dept_"+dept_id).attr("rel"));
						$(".loading_img").hide();					
					
					},
					complete: function(){
						$("#dialog").addClass("active");
					
						}
				 });

}

function showResponses(arg_id)
{	

	if(arg_id!="no_cat")
	{
	var queryString="&arg_id="+arg_id;

	$.ajax({	
		         type: "POST",
				   url: base_url+'admin/arg/show_arg_responses',
				   data: queryString,
				   beforeSend: function(){
				   		$("#dialog").removeClass("active");
					   $("#overlay").show().fadeTo(100, 0.2);
					   //$("#active_content").html($(".spinner").clone());
					  showUiblock("active_content","Loading <b>"+ $("#"+arg_id).html()+"</b> Responses..");
					  
				   },
				   success: function(html){
					$("#dialog").show();
				     var ajaxDisplay = document.getElementById('active_content');
			         ajaxDisplay.innerHTML = html;
					 tiny_mce();
					 editInplace();
				     hideUiblock("active_content");
					  
				   },
				   complete: function(){
						setTimeout('$("#overlay").fadeOut()', 200);
						$("#dialog").addClass("active");
						}
				   });
	}
	else
	{
	$("#dialog").hide();
	$("#active_content").html($('#add_Cat').html());	
	}
}

function delete_response(id,cat_id)
{
	
var queryString="id="+id;
				 $.ajax({
				   type: "POST",
				   url: base_url+'admin/arg/delete_arg_response',
				   data: queryString,
				   success: function(msg){
				   $(".msgmodal_dialog").dialog("close");
					showResponses(cat_id)
				   }
				 });
}
function delete_category(Catid,dept_id){

var queryString="Catid="+Catid;
				 $.ajax({
				   type: "POST",
				   url: base_url+'admin/arg/delete_args',
				   data: queryString,
				   success: function(msg){
				   $(".catmodal_dialog").dialog("close");
				    showargs(dept_id);
					// alternatingRows()
				   }
				 });

}
function  AddResponse(CategoryId,resp_txt,incid_notes,aresp_txt){
	//alert("ssssss")
	var queryString="CategoryId="+CategoryId+"&resp_txt="+resp_txt+"&incid_notes="+incid_notes+"&aresp_txt="+aresp_txt;
				 $.ajax({
				   type: "POST",
				   url: base_url+'admin/arg/add_arg_responses',
				   data: queryString,
				   success: function(msg){
				//alert("ssssss");
					   $(".closeme").trigger('click');
					 
					  $(".has_children ul #" + CategoryId).trigger("click");
				  
				   }
				 });
}

function transfer_response(transfer_id,Catid)
{

var queryString="transfer_id="+transfer_id+"&delcatid="+Catid;

				 $.ajax({
				   type: "POST",
				   url: base_url+'admin/arg/transfer_responses',
				   data: queryString,
				   success: function(msg){
				
				   $(".newmodal_cat").dialog("close");
				   
				  
					$(".parent_nav a[rel='"+Catid+"']").slideUp().remove();
					$(".has_children ul li a[rel='"+$.trim(msg)+"']").trigger("click");
					
					
				   }
				 });
}

function search_responses(searchterm,dept_id)
{
	
	var queryString="searchterm="+searchterm+"&dept_id="+dept_id;

	$.ajax({
				   type: "POST",
				   url: base_url+'admin/arg/SearchResponses',
				  data: queryString,
				   beforeSend: function(){
					 
				   },
				   success: function(html){
				 
				 	 var ajaxDisplay = document.getElementById('active_content');
			         ajaxDisplay.innerHTML = html;
					 $(".active_nav").removeClass("active_nav");
					 $(".has_children > a").addClass("active_nav");
					 editInplace();
					 $(".clear_search").show();
					 $(".loading_img").hide();
				   }
				 });	
}
function delShowArgs(id,dept_id)
{
	//alert(dept_id);
	 queryString="id="+id+"&dept_id="+dept_id;
	//alert(queryString)
	$.ajax({
				   type: "POST",
				   url: base_url+'admin/arg/delShowArgs',
				  data: queryString,
				   beforeSend: function(){
					  
				   },
				   success: function(html){
				
					 $(".newmodal_cat").html(html);
				   }
				 });	
}