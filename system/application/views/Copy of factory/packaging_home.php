<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
<?php
//echo ($_SERVER['HTTP_USER_AGENT']);
include "dbconfig.php";
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

<script type="text/javascript" src='<?php echo base_url(); ?>js/jquery.js' language="javascript"></script>
<script src="<?php echo base_url(); ?>js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script src="<?= base_url();?>js/library.js" type="text/javascript"></script>
<script src="<?=base_url();?>js/utils.js" type="text/javascript"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>js/jquery.dataTables.js"></script>

	<link rel="stylesheet" href="<?php echo base_url(); ?>css/demo_table.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/demo_page.css" type="text/css" />
	<link href="<?php echo base_url();?>public/styles/components.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>public/css/ship.css" rel="stylesheet" type="text/css" />
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

		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() 
			{
				$('#example').dataTable();
			} );
			
			
			function  order_details(obj)
 {
 		//alert(obj);
		//alert($(obj).attr("ship_no"));
		
		$("#add_admin_shipping1").width(600).height(500);
		
		//$(this).closest("td").unbind("click");
 		
		$.blockUI({message: $("#add_admin_shipping1")});
		
		$("#add_admin_shipping1 .modal_title").html("Order Details");
		
		  var query_str = "";
		  	$.ajax({
			type: "POST",
			url: base_url+"admin/admin_orders/order_details_report/"+obj,
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
 
 $(".closeme, .close_inco_terms").live("click", function()
 {
 	 
	$("#add_admin_shipping .frmholder").html("");
	 //jQuery("#list5").setGridParam({page:1}).trigger("reloadGrid");

	 $.unblockUI();
 
 });
 
		</script>

</head>

<body marginwidth="0" marginheight="0" bgcolor="#e9f1fb" topmargin="0" leftmargin="0" rightmargin="0" id=dt_example>


<table width=100% cellpadding="0" cellspacing="0" border="0">
<tr><td style="padding-top:0px;width:200px;"><img src="<?php echo base_url(); ?>images/newmalani.gif"  /></td><td  style="height:95px;  background-color:#d4e6fb; background-image:url(<?php echo base_url(); ?>images/newmalanihbg.gif); background-repeat:repeat-x; border:0px;">&nbsp;


</td></tr>


<tr><td colspan="2"  style="background-color:#fde5c3; height:28px;"> 
<table style="margin-top:-2px;">
<tr >

<td align="center" class="mainnavlink" ><a href='<?php echo base_url(); ?>index.php/factory/factory_orders'  >Order Management</a></td>
<td align="center" class="mainnavlink" ><a href="<?php echo base_url(); ?>index.php/factory/factory_reports"  >Reports</a></td>
<td align="center" class="mainnavlink" ><a href='<?php echo base_url(); ?>index.php/login/logout'  >Logout</a></td>
</tr></table></td></tr>


<tr><td colspan="2" bgcolor="#fff6ed">
<table width=100%>
<tr><td style="padding-left:10px;padding-top:5px;" valign="top">
<table cellpadding="0" cellspacing="0">
<tr><td class="navhdr"><b>Order Management</b></td></tr>
<tr><td class="navcontbg1" ><a href=" <?php echo base_url(); ?>index.php/factory/factory_orders">Orders From H.O</a></td></tr>
<tr><td class="navcontbg2" ><a href=" <?php echo base_url(); ?>index.php/factory/factory_orders/cuttingsection">Cutting Instructions</a></td></tr>
<tr><td class="navcontbg1" ><a href=" <?php echo base_url(); ?>index.php/factory/factory_orders/loadingadvice">Loading Advice</a></td>
<tr><td class="navcontbg2" ><a href=" <?php echo base_url(); ?>index.php/factory/factory_orders/packaginglist">Packaging List View</a></td></tr>
<tr><td class="navcontbg1" ></td></tr>
<tr><td class="navcontbg2" ></td></tr>
<tr><td class="navcontbg2" ></td></tr>
<tr><td class="navcontbg2" ></td></tr>
<tr><td class="navcontbg2" ></td></tr>
<tr><td class="navcontbg2" ></td></tr>
<tr><td class="navcontbg2" ></td></tr>
<tr><td class="navcontbg2" ></td></tr>
<tr><td class="navcontbg2" ></td></tr>
<tr><td class="navfutr" ></td></tr>
</table></td>


<td class="rightpane">


<table width="100%" cellpadding="0" cellspacing="0" border="0">

<tr><td class="heading" style="padding-top:30px;">Packaging List</td></tr>
<tr><td class="success" id=success ></td></tr>
<tr><td>
<div id="container">
	<div id="demo">
   
<table cellpadding="3"  class="display KeyTable" id="example" width=100%>

<thead>
<tr><th nowrap="nowrap">S No</th><th nowrap="nowrap">Date</th><th>View</th></tr>
</thead><tbody>
<?php
$str=mysql_query("select distinct(pdfpath) from tbl_packaginglist");
//echo "select * from tbl_oders where status='New' ORDER BY orderdate";

//echo "num of fields = ".$fc;
//echo "<br>";
//echo "<br>";
$i=0;



while($row1=mysql_fetch_array($str))
{
$i++;
$res_date=mysql_query("select date,donum from tbl_packaginglist where pdfpath='".$row1['pdfpath']."'");
//echo "select *from tbl_orders where donum='".$row1['donum']."'";

$s1=mysql_fetch_array($res_date);


echo "<tr><td id='confirm-dialog'>".$i."</td><td id='confirm-dialog' style='padding-left:10px;'>".$s1['date']."</td><td id='confirm-dialog'><a href='".base_url().$row1['pdfpath']."' target=_new style=color:black;text-decoration:underline>Details</a></td></tr>";



}
?>
</tbody>
<tfoot>
<tr><th></th><th></th><th></th></tr></tfoot>


</table>
</div></div>
</td></tr></table></td></tr></table>

</td></tr>

<tr><td colspan="2"><br /></td></tr>
<tr><td colspan="2" style="background-color:#ffdc90; height:25px; padding-top:10px;"></td></tr>

</table>


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
