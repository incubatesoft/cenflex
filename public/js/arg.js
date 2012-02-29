function tiny_mce()
{
	$.fn.tinymce = function(options){
   return this.each(function(){
      tinyMCE.execCommand("mceAddControl", true, this.id);
   });
}	
	
	
/*tinyMCE.init({
			  mode : "textareas",
				width : 400,
				editor_content_width : 350,
				content_css : "css/content.css",
				theme : "simple"

		});*/


/////////////////////////////////////////   TINYMCE GZIP                /////////////////////////
/*
tinyMCE_GZ.init({
	plugins : "spellchecker,safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
	themes : 'advanced',
	languages : 'en',
	disk_cache : true,

	debug : false
});


*/
	tinyMCE.init({
	// General options
	mode : "textareas",
	theme : "advanced",

	plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

	// Theme options
	theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,copy,paste,pastetext,pasteword,|,undo,redo,|,forecolor,backcolor,|,spellchecker",
	theme_advanced_buttons2 :"",
	theme_advanced_buttons3 : "",
	
	theme_advanced_toolbar_location : "bottom",
	theme_advanced_toolbar_align : "center",
	//theme_advanced_statusbar_location : "bottom",
	theme_advanced_resizing : false,
 spellchecker_languages : "+English=en,Spanish=es",    
    
	// Example content CSS (should be your site CSS)
	content_css : "styles/textarea.css",

	// Drop lists for link/image/media/template dialogs
	template_external_list_url : "lists/template_list.js",
	external_link_list_url : "lists/link_list.js",
	external_image_list_url : "lists/image_list.js",
	media_external_list_url : "lists/media_list.js",

	// Replace values for the template plugin
	template_replace_values : {
		username : "Some User",
		staffid : "991234"
	}
});





////////////////////////         TINY MCE GZIP////////////////////////////////
 tinyMCE.triggerSave();
$.editable.addInputType('mce', {
   element : function(settings, original) {
      var textarea = $('<textarea id="'+$(original).attr("id")+'_mce"/>');
      if (settings.rows) {
         textarea.attr('rows', settings.rows);
      } else {
         textarea.height(settings.height);
      }
      if (settings.cols) {
         textarea.attr('cols', settings.cols);
      } else {
         textarea.width(settings.width);
      }
      $(this).append(textarea);
         return(textarea);
      },
   plugin : function(settings, original) {
      tinyMCE.execCommand("mceAddControl", true, $(original).attr("id")+'_mce');
      },
   submit : function(settings, original) {
      tinyMCE.triggerSave();
      tinyMCE.execCommand("mceRemoveControl", true, $(original).attr("id")+'_mce');
      },
   reset : function(settings, original) {
      tinyMCE.execCommand("mceRemoveControl", true, $(original).attr("id")+'_mce');
      original.reset();
   }
});
}
$(document).ready(function(){


	//showargs(1);
	
		
		   $(".depts_ico").live("click",function(){  
												  $(".depts").slideToggle();
												  });
		//Modal Boxes
		$("#dialog").click(function(){
			var sel_arg = $(".active_nav").attr("id");
			var dept_id=$("#dep_title").attr("rel");
			var queryString="&dept_id="+dept_id;
			$.ajax({
				   type: "POST",
				   url: base_url+'admin/arg/add_response_form',
				   data: queryString,
				   beforeSend: function(){
					   $("#ext_form").html("<img src='"+base_spinner+"' width='32' height='32' style='position: absolute; left: 50%; top: 50%; margin-left: -16px; margin-top: -16px;' />");	
					   
				   },
				   success: function(html){
					 $("#ext_form").html(html);
					 $(".add_response select").val(sel_arg);
					 tiny_mce();
					 $(".add_response input:first").focus();
				   }
				});
			$.blockUI({message:$('.msgmodal')});
			
		});
		
		
		$(".newmodal_cat").dialog({
			width: 500,
		  buttons: { 
		  "Transfer": function() {
					transfer_response($("#transfer_id").val(), Catid);
		 				},
		   "Cancel": function() {
		  			$(this).dialog("close");
					}
				 } ,
		    title: "Transfer Responses",
			close: function(event, ui) { },
			modal: true,
			autoOpen: false,
			resizable: false,
			//width:500,
			overlay: { 
			opacity: 0.5, 
			background: "black" 
				}
			});
		
		
		$(".msgmodal_dialog").dialog({
		  buttons: { 
		  "Delete": function() {
					delete_response(response_id,$(".arg_nav.active_nav").attr("rel"));
		 				},
		   "Don't Delete": function() {
		  			$(this).dialog("close");
					}
				 } ,
		    title: "Confirmation",
			close: function(event, ui) { $(".deleting_row:not(.lastrow)").removeClass("deleting_row");},
			modal: true,
			autoOpen: false,
			resizable: false,
			//width:500,
			overlay: { 
			opacity: 0.5, 
			background: "black" 
				}
			});	
		
		
		$(".catmodal_dialog").dialog({
		  buttons: { 
		  "Delete Category & Responses": function() {
					delete_category(Catid,$("#dep_title").attr("rel"));
		 				},
			"Transfer Responses": function() {
			delShowArgs(Catid,$("#dep_title").attr("rel"));
			$(".newmodal_cat").dialog("open");
			$(this).dialog("close");
			$("#transfer3").text($("#ac_title h4").text());
			},			
		   "Don't Delete": function() {
		  			$(this).dialog("close");
					}
				 } ,
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
		
	$(".add_responses").live("click", function(){
		$("#dialog").trigger("click")
	})
	
	
	//Deleteing the arg responses
		$(".del").live("click", function(){
		 response_id=$(this).closest("span").attr("id");
		 $(".msgmodal_dialog").html("Are you Sure you want to Delete the Response : <strong> " +$('#r_title--'+response_id).text()+"</strong>");
		$(".msgmodal_dialog").dialog("open");
	
});

		//Delete Categories
		$(".del_cat").live("click", function(){
			 Catid =$(this).attr("id");
		$(".catmodal_dialog").html("Are you Sure you want to Delete the Category : <strong> " +$("#ac_title h4").text()+"</strong>");
		$(".catmodal_dialog").dialog("open");
		});
		
		//Add responses
		$(".add_resp").live("click",function (){
			tinyMCE.triggerSave();
		  CategoryId=$("#cat_id").val();
		     resp_text=$("#resp_id").val();
			incid_notes_txt=$(".incid_notes").val();
			aresp_text=$(".resp_txt").val();
			incid_notes_txt=escape(incid_notes_txt);
			aresp_text=escape(aresp_text);
			 AddResponse(CategoryId,resp_text,incid_notes_txt,aresp_text);
		})
		//Icons and Button functions
		$(".btn").live("mousedown", function(){
			$(this).addClass("btn_press");
		});
		$(".btn").live("mouseup", function(){
			$(this).removeClass("btn_press");
		});
		$(".save_disk").live("mousedown", function(){
			$(this).css("background-position", "center bottom")
		});
		$(".save_disk").live("mouseup", function(){
			$(this).css("background-position", "")
		});
		$(".prev, .next").live("mousedown", function(){
			$(this).children("a.active").addClass("mdown");
		});
		$(".prev, .next").live("mouseup", function(){
			$(this).children("a.active").removeClass("mdown");
		});
		//Search Functionlaity
		if($("input.search").val()==""){
		$("input.search").val($("input.search").attr("title")).addClass("blur");
		}
		$(".search").focus(function(){
			if($(this).val()==$(this).attr("title"))
			$(this).val("").removeClass("blur")
		});
		$(".search").blur(function(){
			if($(this).val()==$(this).attr("title")||$(this).val()==""){
			$(this).val($(this).attr("title")).addClass("blur");
			$(".clear_search").hide();
			}
		});
		$(".search").keyup(function(event){
			if($(this).val()!="")
				$(".clear_search").show();
			else
				$(".clear_search").hide();
		});

		$(".clear_search").click(function(){
			$(".search").val("").trigger("blur");
			$(this).hide();
		});

		
		$(".closeme").click(function(){
				$(".msgmodal").fadeOut();
				$.unblockUI();
			});
		  
	
	$(".arg_title:not(.r_title)").live("click", function(){
			
		});
	$(".has_children a img").live("click", function(){
			$(this).toggleClass("collapse").closest(".has_children").children("ul").slideToggle();
		});
	$(".parent_nav li a").qtip({
	   content: 'This is an active list element',
	   show: 'mouseover',
	   style: {
			name: 'dark',
			tip: 'topLeft',
			border: {
				radius: 5,
				width: 1,
				color: "#333333"
			}
	   },
	   hide: 'mouseout'
	});
//adding new row
 $("#exp").live("click", function(){
		  
			$(".last_nav:not(.editing_nav):last").clone().appendTo(".has_children ul").show().addClass("editing_nav");
			$(".last_nav:visible:first input:first").trigger("focus").removeClass("blur");
			$("#left_nav_long").scrollTo($(".last_nav:visible:first"), 100);
		
		});
$(".editing_nav input").live("keyup", function(){
				if($(this).val() !="")
				
					$(this).parent().children(".save_disk").show();
				
				else
					$(this).parent().children(".save_disk").hide();
										 });
			$(".save_disk").live("click", function(){
												   
				$(this).closest("li").attr("id", "adding");
				var cat_name=$('#adding input').val();
				var deptId=$("#dep_title").attr("rel");
				
				var queryString="cat_name="+cat_name+"&deptId="+deptId;
			
				 $.ajax({
				   type: "POST",
				   url: base_url+'admin/arg/add_category',
				   data: queryString,
				   success: function(latest_id){
				   //alert(latest_id)
					 insertRow(cat_name,latest_id);
					 $("#adding").remove();
				   }
				});
			});
	});
	//insering the newly added row
	function insertRow(cat_name,latest_id){

	var latest_id=jQuery.trim(latest_id)
	var insert_id="arg_nav"+jQuery.trim(latest_id);

		var newRow = '<li><a href="#"  class="arg_nav" id="'+latest_id+'" rel="'+latest_id+'">'+cat_name+'</a></li>';
		if($(".has_children ul li:not(.last_nav):visible:last").length >0)
		$(".has_children ul li:not(.last_nav):visible:last").after(newRow);
		else
		$(".has_children ul").prepend(newRow);
		
		$("#"+insert_id).effect("highlight", {color:"#FBE3E4"}, 1200);
		$(".no_arg_nav").hide();
		$("#adding").remove();
		 editInplace();
		
	}
	//removeing newly added row
	$(".clear_add").live("click", function(){
				$(this).closest("li").remove();
			});
	//editinplace for catogories
	//editInplace_cat();
	//search responses
	function delay_search(){
		searchterm = $(".search").val();
			searchterm=searchterm.replace(/[^A-z-0-9]/g,"");
			
		if(searchterm!=""){
			$(".clear_search").show();
			if(st1=="active"){
			clearTimeout(st);
			st1 = "inactive";
			}
			$(".loading_img").show();
			dept_id=$("#dep_title").attr("rel");
			//alert(dept_id)
			st = setTimeout("search_responses(searchterm,dept_id)", 600);
			var st1 = "active";
		}else{
			//alert(searchterm);
			$(".clear_search").hide();
			$(".loading_img").hide();
			//alert($("#dep_title").attr("rel"));
			showargs($("#dep_title").attr("rel"));
			//$(".clear_search").trigger("click");
		}
	};
	
	//clear Search
	$(".clear_search").live("click", function(){
	
			clearTimeout(st);
		   		if($(".search").val()!= "Search.." || $(".search").val()!= ""){
		   			
					$(".search").val("");
					showargs($("#dep_title").attr("rel"));
					$(".search").trigger("blur");
					$(this).hide();
				}
			});
	
	
	
	//Load a Category Responses
		$('.arg_nav:not(.last_nav .arg_nav)').live("click",function(){
																	
			argID = $(this).attr("id");
			$(".active_nav").removeClass("active_nav");
			$(this).addClass("active_nav");
			showResponses(argID);		
		});

		$(".collapse").live("click",function() {
			$(this).toggleClass("expand").closest(".arg_title").toggleClass("title_opend").next("dd").slideToggle();	
		});
		/********response title click operation***********
		$(".collapse, .arg_title").live("click",function() {
			$(this).toggleClass("title_opend").next("dd").slideToggle();
			$(this).children(".collapse").toggleClass("expand");
		});
		********response title click operation***********/
	function editInplace () {
	$(".r_title").editable(base_url+'admin/arg/edit_response_title', {
					 indicator :'<img src="'+base_img+'/ajax loader2.gif'+'"/>',
					 height: 'none',
					 event: 'dblclick',
					 cssclass : 'editing',
					 submit:'Save',
					 cancel:'Cancel',
					 width: 'auto',
					 callback : function(value, settings) {
					 $(this).removeClass("editing_this").addClass("edit_saved");
					//$("#"+id).html(value);
				 }
				 });
	 $("dd.incd_notes").editable(base_url+'admin/arg/edit_incd_notes', {
					 indicator :'<img src="'+base_img+'/ajax loader2.gif'+'"/>',
					 event: 'dblclick',
					 type  : 'mce',
					 cssclass : 'editing',
					 onblur: "ignore",
					 width:'80%',
					 submit: "Save",
					 cancel:'Cancel',
					 id:'rel',
					
					 callback : function(value, settings) {
							$(this).removeClass("editing_this").addClass("edit_saved");
					//$("#"+id).html(value);
				 }
				 });

	  $("dd.response_txt").editable(base_url+'admin/arg/edit_response_txt', {
					 indicator :'<img src="'+base_img+'/ajax loader2.gif'+'"/>',
					 event: 'dblclick',
					 type  : 'mce',
					 cssclass : 'editing',
					 onblur: "ignore",
					 width:'80%',
					 submit: "Save",
					 cancel:'Cancel',
					 id:'rel',
					 callback : function(value, settings) {
							$(this).removeClass("editing_this").addClass("edit_saved");
					//$("#"+id).html(value);
				 }
				 });
		/*}	
		function editInplace_cat(){*/
		$(".edit_cat").editable(base_url+'admin/arg/edit_category', {
					 indicator :'<img src="'+base_img+'/ajax loader2.gif'+'"/>',
					 height: 'none',
					 event: 'dblclick',
					 cssclass : 'editing',
					 submit:'Save',
					 cancel:'Cancel',
					 width: 'none',
					 callback : function(value, settings) {
					 $(this).removeClass("editing_this").addClass("edit_saved");
					//showResponses($(this).attr("id"));		
					$(".active_nav").text($(this).text());
				 }
				 });
		}
		
		$(".show_dept").live("click",function () {
											   
			showargs($(this).attr("rel"));						   
		});