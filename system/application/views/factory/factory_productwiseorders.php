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

	

		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() 
			{
				$('#example').dataTable();
			} );
			
			
			function  order_details(obj)
 {
 		//alert(obj);
		//alert($(obj).attr("ship_no"));
		
		$("#add_admin_shipping1").width(800).height(500);
		
		//$(this).closest("td").unbind("click");
 		
		$.blockUI({message: $("#add_admin_shipping1")});
		
		$("#add_admin_shipping1 .modal_title").html("Order Details");
		
		  var query_str = "";
		  	$.ajax({
			type: "POST",
			url: base_url+"admin/admin_orders/product_order_details_report/"+obj,
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


<tr>
<td colspan="2"  style="background-color:#fde5c3; height:28px;"> 


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
<tr><td class="navhdr"><b>Reports</b></td></tr>
<tr><td class="navcontbg1" ><a href=" <?php echo base_url(); ?>index.php/factory/factory_reports">All Orders</a></td></tr>
<tr><td class="navcontbg2" ><a href=" <?php echo base_url(); ?>index.php/factory/factory_reports/pending">Pending Orders</a></td></tr>
<tr><td class="navcontbg1" ><a href=" <?php echo base_url(); ?>index.php/factory/factory_reports/branchwise">Branch wise Orders</a></td></tr>
<tr><td class="navcontbg2" ><a href=" <?php echo base_url(); ?>index.php/factory/factory_reports/loading">Loading Reports</a></td></tr>
<tr><td class="navcontbg1" ><a href=" <?php echo base_url(); ?>index.php/factory/factory_reports/productwise">Productwise Pending Reports</a></td></tr>
<tr><td class="navcontbg2" ><a href=" <?php echo base_url(); ?>index.php/factory/factory_reports/dialy">Day wise Orders Received</a></td></tr>

<tr><td class="navcontbg1" ><a href=" <?php echo base_url(); ?>index.php/factory/factory_reports/weekly">Weekly Orders Received</a></td></tr>
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

<td class="rightpane">


<table width="100%" cellpadding="0" cellspacing="0" border="0">

<tr><td class="heading" style="padding-top:30px;">Productwise Pending Orders ( Till Date )</td>
<td align="right" style="padding-right:25px;"><a href=" <?php echo base_url(); ?>index.php/admin/admin_orders/allordersprintview/<?php echo $vars?>" target="_blank"><img src="<?php echo base_url(); ?>images/print.gif"  style="border:none"/></a></td></tr>

<tr><td class="success" id=success ></td></tr>
<tr><td colspan=2>
<div id="container">
	<div id="demo">
   
<table cellpadding="3"  class="display KeyTable" id="example" width=100% style='border: 1px solid #8A0A37;'>

<thead style='background-color: #9F1B4A;color:black; font-size:12px; font-weight:normal;border-bottom: 1px solid; border-right: 1px solid;	border-color: #e37e3d; background-image: url(<?php echo base_url(); ?>images/red.png); background-repeat: repeat-x;vertical-align:top;'>

<tr><th nowrap="nowrap">Product Variety</th><th nowrap="nowrap">Item</th><th nowrap="nowrap">Pending Bundles/Meters</th><th nowrap="nowrap">Full Details</th></tr>
</thead><tbody>
<?php

$totalpendingbundles=0;
$totalpendingmtrs=0;
$finaltotalbundles=0;
$finaltotalmtrs=0;
$str=mysql_query("select distinct density,variety from tbl_orders where status!='New'");


while($row1=mysql_fetch_array($str))
{
$count=0;
$totalbundles=0;
$totalmtrs=0;
$totalbundles1=0;
$totaldispatched=0;
$totaldispatchedmtrs=0;
//echo $row1['donum'];
$res_orders=mysql_query("select *from tbl_orders where density='".$row1['density']."' and variety='".$row1['variety']."' and itemname='Sheets' ");
//echo "select *from tbl_orders where density='32' and variety='Premium' and itemname='Sheets' and bundlestatus!='Full'";
//echo "select *from tbl_orders where density='".$row1['density']."' and variety='".$row1['variety']."' where bundlestatus!='Full'";
//echo "select *from tbl_orders where donum='".$row1['donum']."'";

/*while($s1=mysql_fetch_array($res_orders))
{
$totalbundles=$totalbundles+$s1['remainingbundles'];
}*/
$pending=0;
$pendings=0;
while($s1=mysql_fetch_array($res_orders))
{
$res_bundles=mysql_query("select *from tbl_bundlelist where orderid='".$s1['id']."' and status='Dispatched' and donum='".$s1['donum']."'");
//echo "select *from tbl_bundlelist where orderid='".$s1['id']."' and status='Dispatched' and donum='".$s1['donum']."'";
$finishedbundles=mysql_num_rows($res_bundles);
$pending =$s1['numbundles']-$finishedbundles-$s1['cancelledbundles'];
$pendings=$pendings+$pending;
}

if(strpos($row1['variety'],' ')==true){ $variety=str_replace(" ","%20",$row1['variety']);} else {$variety=$row1['variety'];}
if(strpos($row1['density'],' ')==true){ $density=str_replace(" ","%20",$row1['density']);} else {$density=$row1['density'];}

if($pendings!=0)
echo "<tr><td id='confirm-dialog'><a >".$row1['density']." ".$row1['variety']."</a></td><td id='confirm-dialog'>Sheets</td><td id='confirm-dialog' align=center>".$pendings."</td><td id='confirm-dialog' align=center><a onClick=order_details('$density:$variety:Sheets')>Details</a></td></tr>";


$res_orders1=mysql_query("select *from tbl_orders where density='".$row1['density']."' and variety='".$row1['variety']."' and itemname='Cushions' ");
//echo "select *from tbl_orders where density='32' and variety='Premium' and itemname='Sheets' and bundlestatus!='Full'";
//echo "select *from tbl_orders where density='".$row1['density']."' and variety='".$row1['variety']."' where bundlestatus!='Full'";
//echo "select *from tbl_orders where donum='".$row1['donum']."'";

/*while($s11=mysql_fetch_array($res_orders1))
{
$totalbundles1=$totalbundles1+$s11['remainingbundles'];
}*/
$pending1=0;
$pendingc=0;
while($s11=mysql_fetch_array($res_orders1))
{
$res_bundles1=mysql_query("select *from tbl_bundlelist where orderid='".$s11['id']."' and status='Dispatched' and donum='".$s11['donum']."'");
//echo "select *from tbl_bundlelist where orderid='".$s11['id']."' and status='Dispatched' and donum='".$s11['donum']."'";

$finishedbundles1=mysql_num_rows($res_bundles1);
$pending1 =$s11['numbundles']-$finishedbundles1-$s11['cancelledbundles'];
$pendingc=$pendingc+$pending1;
}
if(strpos($row1['variety'],' ')==true){ $variety=str_replace(" ","%20",$row1['variety']);} else {$variety=$row1['variety'];}
if(strpos($row1['density'],' ')==true){ $density=str_replace(" ","%20",$row1['density']);} else {$density=$row1['density'];}

if($pendingc!=0)
echo "<tr><td id='confirm-dialog'><a >".$row1['density']." ".$row1['variety']."</a></td><td id='confirm-dialog'>Cushions</td><td id='confirm-dialog' align=center>".$pendingc."</td><td id='confirm-dialog' align=center><a onClick=order_details('$density:$variety:Cushions')>Details</a></td></tr>";
//echo $totalbundles;

$res_orders2=mysql_query("select *from tbl_orders where density='".$row1['density']."' and variety='".$row1['variety']."' and itemname='Rolls'  and remainingmtrs!=0");
//echo "select *from tbl_orders where density='".$row1['density']."' and variety='".$row1['variety']."' and itemname='Rolls'  and remainingmtrs!=0";
//echo "select *from tbl_orders where density='32' and variety='Premium' and itemname='Sheets' and bundlestatus!='Full'";
//echo "select *from tbl_orders where donum='".$row1['donum']."'";

while($s2=mysql_fetch_array($res_orders2))
{
	$res_mtrs=mysql_query("select *from tbl_cuttinginstruction where orderid='".$s2['id']."'  and donum='".$s2['donum']."'");
//$totalbundles2=$totalbundles2+$s2['remainingbundles'];
//echo "select *from tbl_cuttinginstruction where orderid='".$s2['id']."' and donum='".$s2['donum']."'";
if(mysql_num_rows($res_mtrs)>0)
{
$res_mtrsleft=mysql_fetch_array($res_mtrs);
//echo $s2['remainingmtrs'];
$totalmtrs=$totalmtrs+$res_mtrsleft['remainingmtrs']-$s2['cancelledbundles'];
//echo $s2['cancelledbundles'];
//echo "<br>";
} else {
$res_mtrsleft=mysql_fetch_array($res_mtrs);
//echo $s2['remainingmtrs'];
$totalmtrs=$totalmtrs+$s2['remainingmtrs']-$s2['cancelledbundles'];
//echo $totalmtrs;//echo $s2['cancelledbundles'];
//echo "<br>";
} 
/*$res_mtrsleft=mysql_fetch_array($res_mtrs);
$totalmtrs=$totalmtrs+$res_mtrsleft['remainingmtrs']-$s2['cancelledbundles'];*/

}

if($row1['variety']=='Skin' || $row1['variety']=='B Grade' || $row1['variety']=='C Grade')
{$totalbunmtr=$totalmtrs;} else {$totalbunmtr=$totalmtrs." Mtrs";}

if(strpos($row1['variety'],' ')==true){ $variety=str_replace(" ","%20",$row1['variety']);} else {$variety=$row1['variety'];}
if(strpos($row1['density'],' ')==true){ $density=str_replace(" ","%20",$row1['density']);} else {$density=$row1['density'];}

if($totalmtrs!=0)
echo "<tr><td id='confirm-dialog'><a >".$row1['density']." ".$row1['variety']."</a></td><td id='confirm-dialog'>Rolls</td><td id='confirm-dialog' align=center>".$totalbunmtr."</td><td id='confirm-dialog' align=center><a onClick=order_details('$density:$variety:Rolls')>Details</a></td></tr>";
//echo $totalbundles;



}
?>

</tbody>
<tr><th colspan="7"><hr /></hr></th></tr>

<tfoot>

</tfoot>


</table>
</div></div>
</td></tr></table></td></tr></table>

</td></tr>


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
