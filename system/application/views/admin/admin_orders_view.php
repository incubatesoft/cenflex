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
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo  base_url();?>themes/ui-lightness/jquery-ui-1.8.custom" />
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
    url:base_url+'admin/admin_warehousegrid',
	
    // datatype parameter defines the format of data returned from the server
    // in this case we use a JSON data
    datatype: "json",
	mtype: "POST",
    // colNames parameter is a array in which we describe the names
    // in the columns. This is the text that apper in the head of the grid.
    colNames:['id','Factory Code','Contact Name','Mobile','Factoty Phone','Street1','Street2','City','State','Pin Code','Tin Number'],
    // colModel array describes the model of the column.
    // name is the name of the column,
    // index is the name passed to the server to sort data
    // note that we can pass here nubers too.
    // width is the width of the column
    // align is the align of the column (default is left)
    // sortable defines if this column can be sorted (default true)
    colModel:[
	    {name:'id',index:'id', width:40},
      
        {name:'factorycode',index:'factorycode', width:100,editable:true},
		 {name:'contactname',index:'contactname', width:100,editable:true},
		  {name:'mobile',index:'factorycode', width:80,editable:true},
		   {name:'factoryphone',index:'factorycode', width:100,editable:true},
		    {name:'street1',index:'factorycode', width:100,editable:true},
			 {name:'street2',index:'factorycode', width:100,editable:true},
			  {name:'city',index:'factorycode', width:80,editable:true},
			   {name:'state',index:'factorycode', width:80,editable:true},
			   {name:'pincode',index:'factorycode', width:80,editable:true},
			   {name:'tinnumber',index:'factorycode', width:80,editable:true},
		
    	
        	
    ],
	//var gr=jQuery("#pager5").getGridParam('selarrrow'); 
	//alert(gr);
	
    rowNum:10,
   	rowList:[10,20,30],
   	imgpath: base_url+'themes/steel/images',
   	pager: jQuery('#pager5'),
   	sortname: 'id',
    viewrecords: true,
    sortorder: "desc",
    caption:"Warehouses/Factories List",
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
					url: base_url+"superadmin/sadmin_cat/basicpt_delete/"+jQuery("#list5").getGridParam('selrow'),			 
					beforeSend: function()
					{
					  //alert('After='+$("#delete_idval").val()); 
					   },
					success: function(html)
					{   
					 //$("#delete_idval").val('');
					// alert('After='+$("#delete_idval").val());
				//	 alert(html);
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
		

function  delete_bpt(obj)
{
 		$(this).closest("td").unbind("click");
		// alert($(obj).attr("ship_no"));
		$("#game_idval").val($(obj).attr("id"));
		var msg="Are you sure you want to delete Basic pt Test "+obj + "?";
		$("#dialog_message").html(msg);
		$("#dialog_message").dialog("open",obj);

 
 }
 
 function  edit_hpt(obj)
 {
 		//alert('ffff');
		//alert($(obj).attr("ship_no"));
		
		$("#add_admin_shipping").width(430).height(380);
		
		//$(this).closest("td").unbind("click");
 		
		$.blockUI({message: $("#add_admin_shipping")});
		
		$("#add_admin_shipping .modal_title").html("Edit Higherpt");
		
		  var query_str = "";
		  	$.ajax({
			type: "POST",
			url: base_url+"superadmin/sadmin_cat/Editbasicpt/"+obj,
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
 	 
	$("#add_admin_shipping .frmholder").html("");
	 //jQuery("#list5").setGridParam({page:1}).trigger("reloadGrid");

	 $.unblockUI();
 
 });
 
 
</script>	

</head>

<body >

<div class="main">
<div class="header"  >
<img src="<?php echo base_url(); ?>images/newmalani.gif" style="padding-top:0px;" />
</div>

<div class="mainnav">
<table style="margin-top:-2px;">
<tr >
<td  align="center" class="mainnavlink"  ><a href='<?php echo base_url(); ?>index.php/admin/admin_home'  >Admin Registration</a></td>
<td align="center" class="mainnavlink" ><a href='<?php echo base_url(); ?>index.php/admin/admin_orders'  >Order Management</a></td>
<td align="center" class="mainnavlink" ><a href="<?php echo base_url(); ?>index.php/admin/admin_reports"  >Reports</a></td>
<td align="center" class="mainnavlink" ><a href='<?php echo base_url(); ?>index.php/login/logout'  >Logout</a></td>
</tr></table>
</div><!-- main nav closed-->
<div class="middle">

<table height="450" width=980 cellpadding="0" cellspacing="0">
<tr><td align="right" style="padding-top:20px;"><a href="javascript:history.back()"><img src="<?php echo base_url(); ?>images/bbb.gif" style="border:none;"></a></td></tr>
<tr><td  width=100% style="padding-left:20px;">
<table id="list5" class=scroll cellpadding=0 cellspacing=0></table>
<div id="pager5" class=scroll style='text-align:center;'></div>
</td></tr>
</table>
</div>


<div class="futr">
</div>
</div>



</body>
</html>
