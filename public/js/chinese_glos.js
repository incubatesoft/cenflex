$(document).ready(function(){
	//Load the Table
	allTicketsAjax(0, 50,0);
	if($(".search").val()!= "Search.." || $(".search").val()== ""){
		$(".search").val($(".search").attr("title"));
	}
	
	//Button Actions
	newWidths = false;
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
		
		//Search Functionality
		$(".search").focus(function(){
				if($(this).val()== "Search.."){
					$(this).removeClass("blur").val("");
				}
			});
			$(".search").blur(function(){
				if($(this).val()== "Search.." || $(this).val()== ""){
					$(this).addClass("blur").val("Search..");
				}
			});
		$(".clear_search").live("click", function(){
			clearTimeout(st);
		   		if($(".search").val()!= "Search.." || $(".search").val()!= ""){
		   			
					$(".search").val("");
					allTicketsAjax('0','50','0');
					$(".search").trigger("blur");
					$(this).hide();
				}
			});
		
		//Add a row
		$("#dialog").live("click", function(){
			$(".lastrow:last").clone().appendTo("#ac_table").show().addClass("editing_row");
			$(".lastrow:visible:first input:first").trigger("focus").removeClass("blur");
			$("#ac_table").scrollTo($(".lastrow:visible:first"), 100);
		});
		$(".addterm").livequery("focus", function(){
				if($(this).val()== $(this).attr("title"))
				 	$(this).removeClass("blur").val("");
			});
		$(".addterm").livequery("blur", function(){
				if($(this).val()== "")
				 	$(this).addClass("blur").val($(this).attr("title"));
			});
		$(".clear_add").live("click", function(){
				$(this).closest(".row").remove();
			});
		$(".save_disk").live("click", function(){
				$(this).parents(".row").attr("id", "adding");
				var english=$('#adding .eng input').val();
				var chinese=$('#adding .chin input').val();
				var romanized_chinese=$('#adding .rom input').val();
				var queryString="english="+english+"&chinese="+chinese+"&romanized_chinese="+romanized_chinese;
				 $.ajax({
				   type: "POST",
				   url: base_url+'admin/chinese/update_china_eng',
				   data: queryString,
				   success: function(latest_id){
					 insertRow( english, chinese, romanized_chinese,latest_id);
					 $("#adding").remove();
				   }
				});
			});
			
		$(".delete:not(.clear_add)").live("click", function(){
			id = $(this).attr("id");
			$(".msgmodal_dialog").html("Are you Sure you want to Delete the Term for: <strong> " +$('#'+id+'.eng').text()+"</strong>");
			//alert(term)
			$("#row"+id).addClass("deleting_row");
			$(".msgmodal_dialog").dialog("open");
	
		})
	dataReady();
	$(".msgmodal_dialog").innerHTML="Are you Sure you want to Delete the Term for:";
	$(".msgmodal_dialog").dialog({
		  buttons: { "Delete": 
		 function() {
			// alert(id);
		 delete_china(id);
		 
		   },
		   "Don't Delete": function()
		    { $(this).dialog("close");
				$(".deleting_row:not(.lastrow)").removeClass("deleting_row"); } } ,
			
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
			})
	
function dataReady(){
	//Table base scrolling functions
		if(newWidths==true){
			$("#ac_tablehead .eng").width(eng_width+4);
			$("#ac_tablehead .chin").width(chin_width+4);
			$("#ac_tablehead .rom").width(rom_width+4);
			$("#ac_table .eng").width(eng_width);
			$("#ac_table .chin").width(chin_width);
			$("#ac_table .rom").width(rom_width);
		}
	    calculateWidths();
		$("#ac_table").scroll(function(){
			xoff = -$(this).scrollLeft();
			$("#ac_tablehead").css("margin-left", xoff);
		});
		//$("#ac_table .row").equalHeights();
		
		resize(".eng");
		resize(".chin");
		resize(".rom");
		editInplace();
			
			
	}
	function delete_china(id)
	{
		var queryString="id="+id;
				 $.ajax({
				   type: "POST",
				   url: base_url+'admin/chinese/delete_china_eng',
				   data: queryString,
				   success: function(msg){
				   $(".msgmodal_dialog").dialog("close");
					$("#row"+id).slideUp().remove();
					 $("#adding").remove();
					 alternatingRows()
				   }
				 });
	}
	
function insertRow( english, chinese, roman_chinese,latest_id){
	var latest_id=jQuery.trim(latest_id)
	var insert_id="row"+jQuery.trim(latest_id);
	//alert(insert_id);
		var newRow = '<div class="row" id="'+insert_id+'"><div class="wide eng" id="'+latest_id+'" >'+english+'</div><div class="wider chin" id="'+latest_id+'">'+chinese+'</div><div class="wide rom" id="'+latest_id+'">'+roman_chinese+'</div><div class="opts"><div class="delete" id="'+latest_id+'"></div></div><br class="clearfloat" /></div>';
		$("#ac_table .row:not(.lastrow):last").after(newRow)
		$("#"+insert_id).effect("highlight", {color:"#FBE3E4"}, 1200);
		if(newWidths==true){
			$("#"+insert_id+" .eng").width(eng_width);
			$("#"+insert_id+" .chin").width(chin_width);
			$("#"+insert_id+" .rom").width(rom_width);
		}
		 editInplace();
		//alert($(".cloned .eng").html())
	}
	
function delay_search(){
		if($(".search").val()!="" && $(".search").val()!="Search.."){
			if(st1=="active"){
				clearTimeout(st);
				st1 = "inactive";
			}
			$(".loading_img").show();
			searchterm = $(".search").val();
			st = setTimeout("allTicketsAjax(0,50,searchterm)", 1000);
			var st1 = "active";
		}else{
			$(".clear_search").hide();
			$(".loading_img").hide();
			allTicketsAjax(0,50,0)
		}
	};
	
	//jQuery(".search").bind('paste', function(e){ alert('pasting!') })

function editInplace(){
	
	alternatingRows();
		$('#ac_table .eng:not(.lastrow .eng)').editable(base_url+'admin/chinese/edit_china_eng', {
					 indicator :'<img src="'+base_img+'/ajax loader2.gif'+'"/>',
					 height: 'none',
					 cssclass : 'editing',
					 onblur:'submit',
					 width: 'none',
					 callback : function(value, settings) {
							$(this).removeClass("editing_this").addClass("edit_saved");
					//$("#"+id).html(value);
				 }
				 });
				 $('#ac_table .chin:not(.lastrow .chin)').editable(base_url+'admin/chinese/edit_china', {
					 indicator :'<img src="'+base_img+'/ajax loader2.gif'+'"/>',
					 height: 'none',
					 width: 'none',
					 cssclass : 'editing',
					 onblur:'submit',
					  callback : function(value, settings) {
							$(this).removeClass("editing_this").addClass("edit_saved");
					//$("#"+id).html(value);
				 }
				 });
				  $('#ac_table .rom:not(.lastrow .rom)').editable(base_url+'admin/chinese/edit_china_rom', {
					 indicator :'<img src="'+base_img+'/ajax loader2.gif'+'"/>',
					 height: 'none',
					 width: 'none',
					 onblur:'submit',
					 cssclass : 'editing',
					  callback : function(value, settings) {
							$(this).removeClass("editing_this").addClass("edit_saved");
					//$("#"+id).html(value);
				 }
				 });
	}
function alternatingRows(){
	$("#ac_table .row").removeClass("altBlu");
	$("#ac_table .row:even").addClass("altBlu");
}
function calculateWidths(){
		var w = 0;
		jQuery.each($("#ac_table .row:first > div:visible"), function(){
			w = w + parseInt($(this).width());
		});
		$(".row").css("min-width", w+50);
}
function resize(className){
	$("#ac_tablehead "+ className).resizable({
											alsoResize: "#ac_table "+ className,
											handles: 'e', 
											stop: function(event, ui){
													calculateWidths();
													$("#ac_table "+ className).height("auto");
													eng_width = $("#ac_table .row:first > .eng:visible").width();
													chin_width = $("#ac_table .row:first > .chin:visible").width();
													rom_width = $("#ac_table .row:first > .rom:visible").width();
													$(".lastrow "+className).width($(this).width()-4);
													newWidths = true;
												//alert($(this).width())
											}
											});
}