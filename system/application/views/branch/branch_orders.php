<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-us" lang="en-us">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<LINK REL="SHORTCUT ICON" HREF="<?php echo base_url(); ?>images/malinilogo.png">
<title>Shree Malani Foams </title>
 <script type="text/javascript">
base_url = '<?= base_url();?>index.php/';
base_img=	'<?= base_url();?>public/images';
base_js_url = '<?= base_url();?>';
base_spinner = '<?= base_url();?>public/styles/images/spinner.gif';
gridimgpath = '<?= base_url();?>public/themes/basic/images';
</script>

<script type="text/javascript" src='<?php echo base_url(); ?>js/jquery.js' language="javascript"></script>
<script src="<?php echo base_url(); ?>js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script src="<?= base_url();?>js/library.js" type="text/javascript"></script>
<script src="<?=base_url();?>js/utils.js" type="text/javascript"></script>		
<link type="text/css" href="<?= base_url();?>themes/base/ui.all.css" rel="stylesheet" />
<link type="text/css"  rel="stylesheet" href="<?php echo base_url(); ?>css/style.css"  />
<script src="<?=base_url();?>public/js/blockUI.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo  base_url();?>themes/ui-lightness/jquery-ui-1.8.custom.css" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo  base_url();?>themes/ui.jqgrid.css" />

<link href="<?php echo base_url();?>public/styles/components.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>public/css/ship.css" rel="stylesheet" type="text/css" />

<script src="<?php echo  base_url();?>jqgrid/jquery-ui-1.7.1.custom.min.js" type="text/javascript"></script>
<script src="<?php echo  base_url();?>jqgrid/jquery.layout.js" type="text/javascript"></script>
<script src="<?php echo  base_url();?>jqgrid/i18n/grid.locale-en.js" type="text/javascript"></script>


<script src="<?php echo base_url();?>jqgrid/jquery.jqGrid.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>jqgrid/jquery.tablednd.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>public/js/blockUI.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>public/js/jqui.js" type="text/javascript"></script>

<script src="<?php echo base_url();?>public/js/utils.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo  base_url();?>ui/ui.core.js"></script>
	<script type="text/javascript" src="<?php echo  base_url();?>ui/ui.draggable.js"></script>
	<script type="text/javascript" src="<?php echo  base_url();?>ui/ui.resizable.js"></script>
	<script type="text/javascript" src="<?php echo  base_url();?>ui/ui.dialog.js"></script>
	<script type="text/javascript" src="<?php echo  base_url();?>ui/effects.core.js"></script>
	<script type="text/javascript" src="<?php echo  base_url();?>ui/effects.highlight.js"></script>
	<script type="text/javascript" src="<?php echo  base_url();?>themes/external/bgiframe/jquery.bgiframe.js"></script>

	<link type="text/css" href="<?= base_url();?>css/demos.css" rel="stylesheet" />
<?php
//echo ($_SERVER['HTTP_USER_AGENT']);

    if ( strpos($_SERVER['HTTP_USER_AGENT'], 'Gecko') && strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') || strpos($_SERVER['HTTP_USER_AGENT'], 'Gecko') && strpos($_SERVER['HTTP_USER_AGENT'], 'Safari') )
   {
  
    ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/stylechrome.css" type="text/css" />
<?php
}

 else if ( strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') || strpos($_SERVER['HTTP_USER_AGENT'], 'Presto') )
{
?>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/styleall.css" type="text/css" />
<?php
}
else
{
?>
<link rel='stylesheet' href='<?php echo base_url(); ?>css/styleall.css' type='text/css' />
<?php
}
?>

	
	

	
<script type="text/javascript">
// We use a document ready jquery function.
jQuery(document).ready(function()
{

//var branch=document.frmteachinbox.branch.value;
//alert(us);
jQuery("#list5").jqGrid({
//var gr=jQuery("#pager5").getGridParam('selarrrow'); 
//alert(gr); 
    // the url parameter tells from where to get the data from server
    // adding ?nd='+new Date().getTime() prevent IE caching
    url:base_url+'branch/branch_ordersgrid',
	
    // datatype parameter defines the format of data returned from the server
    // in this case we use a JSON data
    datatype: "json",
	mtype: "POST",
	 colNames:['DO Number','Order Date','Order From','Priority','Package Type','Send'],
    // colNames parameter is a array in which we describe the names
    // in the columns. This is the text that apper in the head of the grid.
   colModel:[
	    
      
        {name:'donum',index:'donum', width:100,editable:true},
		{name:'orderdate',index:'orderdate', width:120,editable:true},
		{name:'orderby',index:'orderby', width:130,editable:true},
		{name:'priority',index:'priority', width:100,editable:true},
		{name:'packagetype',index:'packagetype', width:120,editable:true},
		
		{name:'send',index:'send', width:110,editable:true},
	
    	
        	
    ],
	//var gr=jQuery("#pager5").getGridParam('selarrrow'); 
	//alert(gr);
	
    rowNum:10,
   	rowList:[10,20,30],
   	imgpath: base_url+'themes/steel/images',
   	pager: jQuery('#pager5'),
   	sortname: 'donum',
    viewrecords: true,
    sortorder: "desc",
    caption:"Orders List",
	height:260,
	//gr :jQuery("#list5").getGridParam('selrow');
    editurl:base_url+'superadmin/sadmin_course/EditCourse',
	//alert(gr);
}).navGrid("#pager5",{edit:false,add:false,del:false});


var gridimgpath = base_url+'themes/steel/images';
jQuery(document).ready(function(){
   

	$('body').layout({
		resizerClass: 'ui-state-default',
        west__onresize: function (pane, $Pane) 
		{
            jQuery("#west-grid").setGridWidth($Pane.innerWidth()-2);
		}
	});
	$.jgrid.defaults = $.extend($.jgrid.defaults,{loadui:"enable"});
	var maintab =jQuery('#tabs','#RightPane').tabs({
        add: function(e, ui) 
		{
            // append close thingy
            $(ui.tab).parents('li:first')
                .append('<span class="ui-tabs-close ui-icon ui-icon-close" title="Close Tab"></span>')
                .find('span.ui-tabs-close')
                .click(function() {
                    maintab.tabs('remove', $('li', maintab).index($(this).parents('li:first')[0]));
                });
            // select just added tab
            maintab.tabs('select', '#' + ui.panel.id);
        }
		
    });
    
	
// end splitter

});
});
$(function() {
$("#dialog_message").dialog(
{
	  	autoOpen: false,		 
		modal: true,
		buttons: { 
				"Ok": function() 
				{
					$(this).dialog("close");
					$(".closeme").trigger("click");
					//alert('Before='+jQuery("#list5").getGridParam('selrow'));
					$.ajax({
					type: "POST",
					url: base_url+"admin/admin_orders/order_deactive/"+jQuery("#list5").getGridParam('selrow'),			 
					beforeSend: function()
					{
					// alert('After='+$("#delete_idval").val()); 
					   },
					success: function(html)
					{   
					 //$("#delete_idval").val('');
					// alert('After='+$("#delete_idval").val());
					 alert(html);
					// window.location.href=base_url+'admin/admin_shipping/show_shipping/delete';
					
		 			jQuery("#list5").setGridParam({page:1}).trigger("reloadGrid");

					}
				});
		 
				},
				"Cancel": function() {
					$(this).dialog("close");
					$(".closeme").trigger("click");
					 
				}
			 },
		title: "Confirmation", 
		resizable: false,
		overlay: { 
			opacity: 0.5, 
			background: "black" 
			} ,
		width: 300	
			});
		});

function  delete_order(obj)
{
 		$(this).closest("td").unbind("click");
		// alert($(obj).attr("ship_no"));
		$("#game_idval").val($(obj).attr("id"));
		var msg="Are you sure you want to Activate/Deactive Order "+obj + "?";
		$("#dialog_message").html(msg);
		$("#dialog_message").dialog("open",obj);

 
 }
 
 function  edit_order(obj)
 {
 		//alert(obj);
		//alert($(obj).attr("ship_no"));
		
		$("#add_admin_shipping").width(870).height(500);
		
		//$(this).closest("td").unbind("click");
 		
		$.blockUI({message: $("#add_admin_shipping")});
		
		$("#add_admin_shipping .modal_title").html("Edit Order");
		
		  var query_str = "";
		  	$.ajax({
			type: "POST",
			url: base_url+"admin/admin_orders/editorder/"+obj,
		 //	data: query_str,
			beforeSend: function(){
			  
			 $("#add_admin_shipping .frmholder").html($(".spinner").clone());
				
			   },
			success: function(html)
			{   
			 	//alert(html);
				 $("#add_admin_shipping .frmholder").html(html);
				  bind_datepicker();
				  $("#project_number").select();			  
				  $("#project_number").focus();
			}
		}); 
		
		   
 }
  $(".closeme, .close_inco_terms").live("click", function()
 {
 	// alert("hi");
	$("#add_admin_shipping .frmholder").html("");
	$("#add_admin_shipping1 .frmholder").html("");
	 //jQuery("#list5").setGridParam({page:1}).trigger("reloadGrid");

	 $.unblockUI();
 
 });
 
 function  order_details(obj)
 {
 		//alert(obj);
		//alert($(obj).attr("ship_no"));
		
		$("#add_admin_shipping1").width(700).height(500);
		
		//$(this).closest("td").unbind("click");
 		
		$.blockUI({message: $("#add_admin_shipping1")});
		
		$("#add_admin_shipping1 .modal_title").html("Order Details");
		
		  var query_str = "";
		  	$.ajax({
			type: "POST",
			url: base_url+"factory/factory_orders/order_details/"+obj,
		 //	data: query_str,
			beforeSend: function(){
			  
			 $("#add_admin_shipping1 .frmholder").html($(".spinner").clone());
				
			   },
			success: function(html)
			{   
			 	//alert(html);
				 $("#add_admin_shipping1 .frmholder").html(html);
				  bind_datepicker();
				  $("#project_number").select();			  
				  $("#project_number").focus();
			}
		}); 
		
		   
 }
 
 
 
 
</script>	

</head>

<body marginwidth="0" marginheight="0" bgcolor="#e9f1fb" topmargin="0" leftmargin="0" rightmargin="0">


<table width=100% cellpadding="0" cellspacing="0" border="0">
<tr><td style="padding-top:0px;width:200px;"><img src="<?php echo base_url(); ?>images/newmalani.gif"  /></td><td style="height:95px;  background-color:#d4e6fb; background-image:url(<?php echo base_url(); ?>images/newmalanihbg.gif); background-repeat:repeat-x; border:0px;">&nbsp;


</td></tr>


<tr><td colspan="2"  style="background-color:#fde5c3; height:28px;"> 


<table style="margin-top:-2px;">
<tr >

<td align="center" class="mainnavlink" ><a href='<?php echo base_url(); ?>index.php/branch/branch_orders'  >Order Management</a></td>
<td align="center" class="mainnavlink" ><a href='<?php echo base_url(); ?>index.php/branch/branch_orders/allreports'  >Reports</a></td>
<td align="center" class="mainnavlink" ><a href='<?php echo base_url(); ?>index.php/login/logout'  >Logout</a></td>
</tr></table></td></tr>

<tr><td colspan="2">
<table height="450" width=100% cellpadding="0" cellspacing="0" bgcolor="#fff6ed">
<tr><td align="right" style="padding-top:20px; padding-right:80px;" bgcolor="#fff6ed"><a href="javascript:history.back()"><img src="<?php echo base_url(); ?>images/bbb.gif" style="border:none;"></a></td></tr>
<tr><td  width=100% style="padding-left:50px;">
<table id="list5" class=scroll cellpadding=0 cellspacing=0></table>
<div id="pager5" class=scroll style='text-align:center;'></div>

<div id="dialog_message"></div>
</td></tr>


</table>
</td></tr>

<tr><td colspan="2"><br /></td></tr>
<tr><td colspan="2" style="background-color:#ffdc90; height:25px; padding-top:10px;"></td></tr>
</table>

<div class="msgmodal admin_shipping_win" id="add_admin_shipping">
	<!--[if lte IE 8]>
        <div class="S_l_t_corner"></div>
        <div class="S_t_tile"></div>
        <div class="S_r_t_corner"></div>
        <div class="S_l_tile"></div>
        <div class="S_r_tile"></div>
        <div class="S_l_b_corner"></div>
        <div class="S_b_tile"></div>
        <div class="S_r_b_corner"></div>
    <![endif]-->
    <div class="closeme"></div>
    <div class="msg_bg">
        <h3 class="modal_title"></h3>
        <div id="ext_form" style="padding-left: 10px; margin-top: 10px;">
		
        	 <div class="frmholder">
			 </div>
           
        </div>			
    </div>
</div>

<div class="msgmodal admin_shipping_win" id="add_admin_shipping1">
	<!--[if lte IE 8]>
        <div class="S_l_t_corner"></div>
        <div class="S_t_tile"></div>
        <div class="S_r_t_corner"></div>
        <div class="S_l_tile"></div>
        <div class="S_r_tile"></div>
        <div class="S_l_b_corner"></div>
        <div class="S_b_tile"></div>
        <div class="S_r_b_corner"></div>
    <![endif]-->
    <div class="closeme"></div>
    <div class="msg_bg">
        <h3 class="modal_title"></h3>
        <div id="ext_form" style="padding-left: 10px; margin-top: 10px;">
		
        	 <div class="frmholder">
			 </div>
           
        </div>			
    </div>
</div>

</body>
</html>
