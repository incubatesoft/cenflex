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
		
		$("#add_admin_shipping1").width(800).height(500);
		
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

<tr><td class="heading" style="padding-top:30px;">Pending Orders</td>
<td align="right" style="padding-right:30px;"><a href=" <?php echo base_url(); ?>index.php/admin/admin_orders/pendingordersprintview/<?php echo $vars?>" target="_blank"><img src="<?php echo base_url(); ?>images/print.gif"  style="border:none"/></a> </td></tr>
<tr><td><br /></td></tr>
<tr><td class="success" id=success ></td></tr>
<tr><td colspan=2>

<table cellpadding="3" border=0 class="display KeyTable"  width=100%  style="border:solid 1px #960">

<?php
$alltotaldispatched=0;
$alltotaldispatchedmtrs=0;
$alltotalpendingbundles=0;
$alltotalpendingmtrs=0;
$allfinaltotalbundles=0;
$allfinaltotalmtrs=0;
$branches=mysql_query("select distinct(orderto) from tbl_order_master where status!='Dispatched' and status!='New' and orderto!=''");
while($branchesrow=mysql_fetch_array($branches))
{
	

$branchtotaldispatched=0;
$branchtotaldispatchedmtrs=0;
$branchtotalpendingbundles=0;
$branchtotalpendingmtrs=0;
$branchfinaltotalbundles=0;
$branchfinaltotalmtrs=0;
	echo "<tr><td colspan=8><hr></td></tr><tr><th colspan=8>".$branchesrow['orderto']." Depot Orders</td></tr>
	<tr><td colspan=8><hr></td></tr>";
	
	$parties=mysql_query("select distinct(orderby) from tbl_order_master where status!='Dispatched' and status!='New' and orderto='".$branchesrow['orderto']."'");
	while($partiesrow=mysql_fetch_array($parties))
	{
		
		$str=mysql_query("select * from tbl_order_master where status!='Dispatched' and status!='New' and orderby='".$partiesrow['orderby']."'  and orderto='".$branchesrow['orderto']."'ORDER BY id desc");
		//echo "select * from tbl_order_master where status!='Dispatched' and orderby='".$partiesrow['orderby']."' ORDER BY id desc";
?>


<tr style='background-color: #9F1B4A;color:black; font-size:12px; font-weight:normal;border-bottom: 1px solid; border-right: 1px solid;	border-color: #e37e3d; background-image: url(<?php echo base_url(); ?>images/red.png); background-repeat: repeat-x;vertical-align:top;'><td><b>Party</b></td><td nowrap="nowrap"><b>DO No</b></td><td nowrap="nowrap"><b>Order Date</b></td><td nowrap="nowrap"><b>Total Bundles/Meters</b></td><td><b>Dispatched Bundles/Meters</b></td><td nowrap="nowrap"><b>Pending Bundles/Meters</b></td><td width=150 ><b>Status</b></td></tr>
</thead><tbody>
<?php


//echo "select * from tbl_oders where status='New' ORDER BY orderdate";

//echo "num of fields = ".$fc;
//echo "<br>";
//echo "<br>";

$totaldispatched=0;
$totaldispatchedmtrs=0;
$totalpendingbundles=0;
$totalpendingmtrs=0;
$finaltotalbundles=0;
$finaltotalmtrs=0;

while($row1=mysql_fetch_array($str))
{
$count=0;
$totalbundles=0;
$cancelledbundles=0;
$totalmtrs=0;
$cancelledmtrs=0;
$dispatchedmtrs=0;
//echo $row1['donum'];
$res_orders=mysql_query("select *from tbl_orders where donum='".$row1['donum']."'");
//echo "select *from tbl_orders where donum='".$row1['donum']."'";

while($s1=mysql_fetch_array($res_orders))
{
								if($s1['itemname']== 'Sheets' || $s1['itemname']== 'Cushions' )
{$cancelledbundles=$cancelledbundles+$s1['cancelledbundles'];}
$totalbundles=$totalbundles+$s1['numbundles'];
$totbundles=$totalbundles-$cancelledbundles;

if($s1['itemname']== 'Rolls' && ($s1['variety']== 'Skin' || $s1['variety']== 'C Grade' || $s1['variety']== 'B Grade') ){
$cancelledbundles=$cancelledbundles+$s1['cancelledbundles'];	
$totalbundles=$totalbundles+$s1['height'];
$totbundles=$totalbundles-$cancelledbundles;}
else
if($s1['itemname']== 'Rolls' && ($s1['variety']!= 'Skin' || $s1['variety']!= 'C Grade' || $s1['variety']!= 'B Grade') ){
$cancelledmtrs=$cancelledmtrs+$s1['cancelledbundles'];	
$totalmtrs=$totalmtrs+$s1['height'];
$totmtrs=$totalmtrs-$cancelledmtrs;} else { $cancelledmtrs=''; $totalmtrs=''; $totmtrs='';}



$res=mysql_query("select *from tbl_loadingadvice where donum='".$s1['donum']."' and orderid='".$s1['id']."'");
while($row=mysql_fetch_array($res))
{
if($row['itemname']=='Sheets' || $row['itemname']=='Cushions' || ($row['itemname']=='Rolls' && ($row['variety']=='B Grade' || $row['variety']=='C Grade' || $row['variety']=='Skin')))
{$count++;} else
if($row['itemname']=='Rolls' && ($row['variety']!='B Grade' || $row['variety']!='C Grade' || $row['variety']!='Skin'))
{$dispatchedmtrs=$dispatchedmtrs+$row['quantity'];} else {$dispatchedmtrs=0;}
/*$count++;
$dispatchedmtrs=$dispatchedmtrs+$row['quantity'];*/
}


}
//echo $totalbundles;
$totaldispatched=$totaldispatched+$count;
$totaldispatchedmtrs=$totaldispatchedmtrs+$dispatchedmtrs;
$finaltotalbundles=$finaltotalbundles+$totbundles;
$finaltotalmtrs=$finaltotalmtrs+$totmtrs;
$dispatched=$count;
$pending=$totalbundles-$count-$cancelledbundles;
$pendingmtrs=$totalmtrs-$dispatchedmtrs-$cancelledmtrs;
$totalpendingbundles=$totalpendingbundles+$pending;
$totalpendingmtrs=$totalpendingmtrs+$pendingmtrs;



echo "<tr class=odd><td id='confirm-dialog' style='padding-left:10px;'>".$row1['orderby']."</td><td id='confirm-dialog'><a onClick=order_details('$row1[id]')>".$row1['donum']."</a></td><td id='confirm-dialog'>".$row1['orderdate']."</td><td id='confirm-dialog' >".$totbundles."/".$totmtrs."</td><td id='confirm-dialog' >".$dispatched."/".$dispatchedmtrs."</td><td id='confirm-dialog' >".$pending."/".number_format($pendingmtrs,2)."</td><td id='confirm-dialog' nowrap>".$row1['status']."</td></tr>";



}
echo"<tr class=even><td colspan=3 style='color:#960;'><b>Total Bundles/Meters (".$partiesrow['orderby'].") </td><td  style='color:#960;'><b>".$finaltotalbundles."/".$finaltotalmtrs."</b></td><td  style='color:#960;'><b>".$totaldispatched."/".$totaldispatchedmtrs."</b></td><td  style='color:#960;'><b>".$totalpendingbundles."/".number_format($totalpendingmtrs,2)."</b></td><td></td></tr>";

$branchfinaltotalbundles=$branchfinaltotalbundles+$finaltotalbundles;
$branchfinaltotalmtrs=$branchfinaltotalmtrs+$finaltotalmtrs;
$branchtotalpendingbundles=$branchtotalpendingbundles+$totalpendingbundles;
$branchtotalpendingmtrs=$branchtotalpendingmtrs+$totalpendingmtrs;
$branchtotaldispatched=$branchtotaldispatched+$totaldispatched;
$branchtotaldispatchedmtrs=$branchtotaldispatchedmtrs+$totaldispatchedmtrs;
	}
	
	
	echo"<tr class=odd><td colspan=3 style='color:red;'><b>Total Bundles/Meters (".$branchesrow['orderto']." Depot) </td><td  style='color:red;'><b>".$branchfinaltotalbundles."/".$branchfinaltotalmtrs."</b></td><td  style='color:red;'><b>".$branchtotaldispatched."/".$branchtotaldispatchedmtrs."</b></td><td  style='color:red;'><b>".$branchtotalpendingbundles."/".$branchtotalpendingmtrs."</b></td><td></td></tr>";

$allfinaltotalbundles=$allfinaltotalbundles+$branchfinaltotalbundles;
$allfinaltotalmtrs=$allfinaltotalmtrs+$branchfinaltotalmtrs;
$alltotaldispatched=$alltotaldispatched+$branchtotaldispatched;
$alltotaldispatchedmtrs=$alltotaldispatchedmtrs+$branchtotaldispatchedmtrs;
$alltotalpendingbundles=$alltotalpendingbundles+$branchtotalpendingbundles;
$alltotalpendingmtrs=$alltotalpendingmtrs+$branchtotalpendingmtrs;
}



$branchtotaldispatched=0;
$branchtotaldispatchedmtrs=0;
$branchtotalpendingbundles=0;
$branchtotalpendingmtrs=0;
$branchfinaltotalbundles=0;
$branchfinaltotalmtrs=0;
	echo "<tr><td colspan=8><hr></td></tr><tr><th colspan=8>Others (H.O) Orders</td></tr>
	<tr><td colspan=8><hr></td></tr>";
	
	$parties=mysql_query("select distinct(orderby) from tbl_order_master where status!='Dispatched' and status!='New' and orderto=''");
	while($partiesrow=mysql_fetch_array($parties))
	{
		
		$str=mysql_query("select * from tbl_order_master where status!='Dispatched' and status!='New' and orderby='".$partiesrow['orderby']."'  and orderto='' ORDER BY id desc");
		//echo "select * from tbl_order_master where status!='Dispatched' and orderby='".$partiesrow['orderby']."' ORDER BY id desc";
?>


<tr style='background-color: #9F1B4A;color:black; font-size:12px; font-weight:normal;border-bottom: 1px solid; border-right: 1px solid;	border-color: #e37e3d; background-image: url(<?php echo base_url(); ?>images/red.png); background-repeat: repeat-x;vertical-align:top;'><td><b>Party</b></td><td nowrap="nowrap"><b>DO No</b></td><td nowrap="nowrap"><b>Order Date</b></td><td nowrap="nowrap"><b>Total Bundles/Meters</b></td><td><b>Dispatched Bundles/Meters</b></td><td nowrap="nowrap"><b>Pending Bundles/Meters</b></td><td width=150 ><b>Status</b></td></tr>
</thead><tbody>
<?php


//echo "select * from tbl_oders where status='New' ORDER BY orderdate";

//echo "num of fields = ".$fc;
//echo "<br>";
//echo "<br>";



$totaldispatched=0;
$totaldispatchedmtrs=0;
$totalpendingbundles=0;
$totalpendingmtrs=0;
$finaltotalbundles=0;
$finaltotalmtrs=0;

while($row1=mysql_fetch_array($str))
{
$count=0;
$totalbundles=0;
$cancelledbundles=0;
$totalmtrs=0;
$cancelledmtrs=0;
$dispatchedmtrs=0;
//echo $row1['donum'];
$res_orders=mysql_query("select *from tbl_orders where donum='".$row1['donum']."'");
//echo "select *from tbl_orders where donum='".$row1['donum']."'";

while($s1=mysql_fetch_array($res_orders))
{
				if($s1['itemname']== 'Sheets' || $s1['itemname']== 'Cushions' )
{$cancelledbundles=$cancelledbundles+$s1['cancelledbundles'];}
$totalbundles=$totalbundles+$s1['numbundles'];
$totbundles=$totalbundles-$cancelledbundles;

if($s1['itemname']== 'Rolls' && ($s1['variety']== 'Skin' || $s1['variety']== 'C Grade' || $s1['variety']== 'B Grade') ){
$cancelledbundles=$cancelledbundles+$s1['cancelledbundles'];	
$totalbundles=$totalbundles+$s1['height'];
$totbundles=$totalbundles-$cancelledbundles;}
else
if($s1['itemname']== 'Rolls' && ($s1['variety']!= 'Skin' || $s1['variety']!= 'C Grade' || $s1['variety']!= 'B Grade') ){
$cancelledmtrs=$cancelledmtrs+$s1['cancelledbundles'];	
$totalmtrs=$totalmtrs+$s1['height'];
$totmtrs=$totalmtrs-$cancelledmtrs;} else { $cancelledmtrs=''; $totalmtrs=''; $totmtrs='';}


$res=mysql_query("select *from tbl_loadingadvice where donum='".$s1['donum']."' and orderid='".$s1['id']."'");
while($row=mysql_fetch_array($res))
{
if($row['itemname']=='Sheets' || $row['itemname']=='Cushions' || ($row['itemname']=='Rolls' && ($row['variety']=='B Grade' || $row['variety']=='C Grade' || $row['variety']=='Skin')))
{$count++;} else
if($row['itemname']=='Rolls' && ($row['variety']!='B Grade' || $row['variety']!='C Grade' || $row['variety']!='Skin'))
{$dispatchedmtrs=$dispatchedmtrs+$row['quantity'];} else {$dispatchedmtrs=0;}
/*$count++;
$dispatchedmtrs=$dispatchedmtrs+$row['quantity'];*/
}


}
//echo $totalbundles;
$totaldispatched=$totaldispatched+$count;
$totaldispatchedmtrs=$totaldispatchedmtrs+$dispatchedmtrs;
$finaltotalbundles=$finaltotalbundles+$totbundles;
$finaltotalmtrs=$finaltotalmtrs+$totmtrs;
$dispatched=$count;
$pending=$totalbundles-$count-$cancelledbundles;
$pendingmtrs=$totalmtrs-$dispatchedmtrs-$cancelledmtrs;
$totalpendingbundles=$totalpendingbundles+$pending;
$totalpendingmtrs=$totalpendingmtrs+$pendingmtrs;



echo "<tr class=odd><td id='confirm-dialog' style='padding-left:10px;'>".$row1['orderby']."</td><td id='confirm-dialog'><a onClick=order_details('$row1[id]')>".$row1['donum']."</a></td><td id='confirm-dialog'>".$row1['orderdate']."</td><td id='confirm-dialog' >".$totalbundles."/".$totmtrs."</td><td id='confirm-dialog' >".$dispatched."/".$dispatchedmtrs."</td><td id='confirm-dialog' >".$pending."/".number_format($pendingmtrs,2)."</td><td id='confirm-dialog' nowrap>".$row1['status']."</td></tr>";



}
echo"<tr class=even><td colspan=3  style='color:#960;'><b>Total Bundles/Meters (".$partiesrow['orderby'].") </td><td  style='color:#960;'><b>".$finaltotalbundles."/".$finaltotalmtrs."</b></td><td  style='color:#960;'><b>".$totaldispatched."/".$totaldispatchedmtrs."</b></td><td  style='color:#960;'><b>".$totalpendingbundles."/".number_format($totalpendingmtrs,2)."</b></td><td></td></tr>";
$branchfinaltotalbundles=$branchfinaltotalbundles+$finaltotalbundles;
$branchfinaltotalmtrs=$branchfinaltotalmtrs+$finaltotalmtrs;
$branchtotalpendingbundles=$branchtotalpendingbundles+$totalpendingbundles;
$branchtotalpendingmtrs=$branchtotalpendingmtrs+$totalpendingmtrs;
$branchtotaldispatched=$branchtotaldispatched+$totaldispatched;
$branchtotaldispatchedmtrs=$branchtotaldispatchedmtrs+$totaldispatchedmtrs;

	}
	
$allfinaltotalbundles=$allfinaltotalbundles+$branchfinaltotalbundles;
$allfinaltotalmtrs=$allfinaltotalmtrs+$branchfinaltotalmtrs;
$alltotaldispatched=$alltotaldispatched+$branchtotaldispatched;
$alltotaldispatchedmtrs=$alltotaldispatchedmtrs+$branchtotaldispatchedmtrs;
$alltotalpendingbundles=$alltotalpendingbundles+$branchtotalpendingbundles;
$alltotalpendingmtrs=$alltotalpendingmtrs+$branchtotalpendingmtrs;

	echo"<tr class=even><td colspan=3 style='color:red;'><b>Total Bundles/Meters from HO </td><td style='color:red;'><b>".$branchfinaltotalbundles."/".$branchfinaltotalmtrs."</b></td><td style='color:red;'><b>".$branchtotaldispatched."/".$branchtotaldispatchedmtrs."</b></td><td style='color:red;'><b>".$branchtotalpendingbundles."/".$branchtotalpendingmtrs."</b></td><td></td></tr>
	<tr class=odd><td colspan=3 style='color:#960;'><b>Total Bundles/Meters </td><td style='color:#960;'><b>".$allfinaltotalbundles."/".$allfinaltotalmtrs."</b></td><td style='color:#960;'><b>".$alltotaldispatched."/".$alltotaldispatchedmtrs."</b></td><td style='color:#960;'><b>".$alltotalpendingbundles."/".$alltotalpendingmtrs."</b></td><td></td></tr>";

	
?>

</tbody>


<tfoot>

</tfoot>


</table>

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
