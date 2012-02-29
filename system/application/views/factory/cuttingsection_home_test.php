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
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>js/jquery.dataTables2.js"></script>

	<link rel="stylesheet" href="<?php echo base_url(); ?>css/demo_table_ci.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/demo_page_ci.css" type="text/css" />
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
				$('#example').dataTable({

				"aaSorting": [[ 0, "desc" ]]

				});
			} );


			 function  bundling(obj)
 {
 		//alert(obj1)
		//alert(obj2);
		//alert($(obj).attr("ship_no"));

		$("#add_admin_shipping").width(550).height(400);

		//$(this).closest("td").unbind("click");

		$.blockUI({message: $("#add_admin_shipping")});

		$("#add_admin_shipping .modal_title").html("Bundling");

		  var query_str = "";
		  	$.ajax({
			type: "POST",
			url: base_url+"factory/factory_orders/bundling/"+obj,
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
  function  order_details(obj)
 {
 		//alert(obj);
		//alert($(obj).attr("ship_no"));

		$("#add_admin_shipping1").width(720).height(500);

		//$(this).closest("td").unbind("click");

		$.blockUI({message: $("#add_admin_shipping1")});

		$("#add_admin_shipping1 .modal_title").html("Order Details");

		  var query_str = "";
		  	$.ajax({
			type: "POST",
			url: base_url+"factory/factory_orders/order_details_cutting/"+obj,
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

function    reloadtable()
{
   // alert('hi');
   // $("#demo").reload();
   // $("#demo").refresh(true);
  //  document.getElementById("demo").refresh(true);
 // $('#example').dataTable();


}

		</script>

</head>

<body marginwidth="0" marginheight="0" bgcolor="#e9f1fb" topmargin="0" leftmargin="0" rightmargin="0" id=dt_example>


<table width=100% cellpadding="0" cellspacing="0" border="0">
<tr><td style="padding-top:0px;width:200px;"><img src="<?php echo base_url(); ?>images/newmalani.gif"  /></td><td  style="height:95px;  background-color:#d4e6fb; background-image:url(<?php echo base_url(); ?>images/newmalanihbg.gif); background-repeat:repeat-x; border:0px;">&nbsp;


</td></tr>


<tr><td colspan="2"  style="background-color:#fde5c3; height:28px;">
<table style="margin-top:-2px;">
<tr >
<?php
$res=mysql_query("select *from tbl_factoryusers where username='".$this->db_session->userdata('u_name')."'");
$row=mysql_fetch_array($res);
if($row['user']=='Yes')
{
	echo "<td align='center' class='mainnavlink' ><a href=".base_url()."index.php/factory/factory_users>Creation</a></td>";
}
if($row['orders']=='Yes')
{
	echo "<td align='center' class='mainnavlink' ><a href=".base_url()."index.php/factory/factory_orders>Order Management</a></td>";
}
?>
<td align="center" class="mainnavlink" ><a href="<?php echo base_url(); ?>index.php/factory/factory_reports"  >Reports</a></td>
<td align="center" class="mainnavlink" ><a href='<?php echo base_url(); ?>index.php/login/logout'  >Logout</a></td>
</tr></table></td></tr>


<tr><td colspan="2" bgcolor="#fff6ed">
<table width=100%>
<tr><td style="padding-left:10px;padding-top:5px;" valign="top">
<table cellpadding="0" cellspacing="0">
<tr><td class="navhdr"><b>Quick Links</b></td></tr>
<?php
if($row['orderho']=='Yes')
{
echo "<tr><td class='navcontbg1' ><a href=".base_url()."index.php/factory/factory_orders/ho>Orders From H.O</a></td></tr>";
}

if($row['cutting']=='Yes')
{
echo "<tr><td class='navcontbg2' ><a href=".base_url()."index.php/factory/factory_orders/cuttingsection>Cutting Instructions</a></td></tr>";
}
if($row['loading']=='Yes')
{
echo "<tr><td class='navcontbg1' ><a href=".base_url()."index.php/factory/factory_orders/loadingadvice>Loading Advice</a></td></tr>";
}
if($row['package']=='Yes')
{
echo "<tr><td class='navcontbg2' ><a href=".base_url()."index.php/factory/factory_orders/packaginglist>Packaging List</a></td></tr>";
}
if($row['cutting']=='Yes')
{
echo "<tr><td class='navcontbg1' ><a href=".base_url()."index.php/factory/factory_orders/cuttingprint target='_blank'>Print</a></td></tr>";
}
?>
<tr><td class="navcontbg2" ></td></tr>
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

<td>

<div id="container">
	<div id="demo">
<table cellpadding="3"  class="display KeyTable" id="example" width=100% >
<thead style='background-color: #9F1B4A;color:black; font-size:12px; font-weight:normal;border-bottom: 1px solid; border-right: 1px solid;	border-color: #e37e3d; background-image: url(<?php echo base_url(); ?>images/red.png); background-repeat: repeat-x;vertical-align:top;'>
<tr><th nowrap="nowrap">DO No</th><th nowrap="nowrap">Party Name</th><th>Item</th><th nowrap="nowrap">Density</th><th>Variety</th><th nowrap="nowrap">Length</th><th width=150 align=center>Width</th><th width=150 align=center>Thickness</th>
<th width=150 align=center>Bundles</th><th width=150 align=center>Quantity</th><th width=150 align=center>Package Type</th><th width=150 align=center>Remarks</th><th width=150 align=center>Color</th><th width=150 align=center>Package</th></tr>
</thead><tbody>


<?php
$SQL = "select a.id,a.donum,a.numbundles,a.orderid,a.remainingmtrs,a.numbundles,a.mtrsleft,b.itemname,b.quantity,b.width,b.height,b.density,b.thickness,b.variety,b.packagetype,b.remarks,b.colorspecific,b.remainingbundles, b.remainingmtrs as remtrs from tbl_cuttinginstruction a,tbl_orders b where a.donum=b.donum and a.orderid=b.id  and a.cancelstatus is null and a.orderstatus!='Bundled'";
			$result = mysql_query( $SQL ) or die("Couldn t execute query.".mysql_error());


while($row = mysql_fetch_array($result,MYSQL_ASSOC))
{
if($row['itemname']=='Rolls'){$height=$row['remainingmtrs'];}else{$height=$row['height'];}
if($row['itemname']=='Rolls'){$qua=$row['mtrsleft'];}else{$qua=$row['remtrs'];}
	$res=mysql_query("select *from tbl_order_master where donum='".$row['donum']."' ");
	$res1=mysql_fetch_array($res);
echo "<tr><td><a onClick=order_details('$row[donum]')>".$row['donum']."
	</a></td><td>".$res1['orderby']."</td><td>".$row['itemname']."</td><td>".$row['density']."</td><td>".$row['variety']."</td><td>".$height."</td><td>".$row['width']."</td><td>".$row['thickness']."</td><td>".$row['numbundles']."</td><td>".$qua."</td><td>".$row['packagetype']."</td><td>".$row['remarks']."</td><td>".$row['colorspecific']."</td><td><button id='edit_idval'  class='ui-button ui-state-default ui-corner-all' style='height:18px; width:70px;' value='$row[orderid]' onClick=bundling('$row[id]:$row[orderid]')>Bundling
	</button></td></tr>";
}
?>

</tbody>
<tfoot>
<tr><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th width=150 align=center></th></tr></tfoot>


</table>
</div></div>
</td></tr></table>

</td></tr>


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
