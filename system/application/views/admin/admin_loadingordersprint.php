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

<body >











	<?php
    $actdate="";
$dates=explode(":",$vars);
for($i=0;$i<sizeof($dates)-1;$i++)
$actdate=$actdate.$dates[$i]."/";
//echo $actdate;
$actdate=substr($actdate,0,strlen($actdate)-1);
//echo $actdate;
?>
   
<table cellpadding="3" cellspacing="2" border=0 width=800 align="center"  style="font-family:Verdana, Geneva, sans-serif; font-size:12px; border:solid 1px #003; line-height:20px;">

<thead>
<tr><td colspan="8" align="right"><a href="javascript:print()"><img src="<?php echo base_url(); ?>images/print.gif"  style="border:none"/></a></td></tr>
<tr><td colspan="8" style="background-image:url(../../../../images/newmalanihbg.gif)"><img src="<?php echo base_url(); ?>images/newmalani.gif" style="padding-top:0px;" /></td></tr>

</thead><tbody>
<?php

$alltotaldispatched=0;
$alltotalpendingbundles=0;
$allfinaltotalbundles=0;
//echo "select distinct(vehiclenumber) from tbl_loadingadvice where  dateofloading='".$vars."'";
$branches=mysql_query("select distinct(vehiclenumber) from tbl_loadingadvice where  dateofloading='".$actdate."'");
//echo "select distinct(vehiclenumber) from tbl_loadingadvice where  dateofloading='".$vars."'";
$numr=mysql_num_rows($branches);
if($numr==0)
{
	echo "<tr><td class=error>No Orders Dispatched On This Date</td></tr>";
}
else
{
while($branchesrow=mysql_fetch_array($branches))
{
	
$branchtotaldispatched=0;
$branchtotalpendingbundles=0;
$branchfinaltotalbundles=0;
	echo "<tr><td colspan=8><hr></td></tr><tr><th colspan=8>".$branchesrow['vehiclenumber']."  Orders</td></tr>
	<tr ><td colspan=8><hr></td></tr>";
	?>
	<tr style='background-color: #9F1B4A;color:black; font-size:12px; font-weight:normal;border-bottom: 1px solid; border-right: 1px solid;	border-color: #e37e3d; background-image: url(<?php echo base_url(); ?>images/red.png); background-repeat: repeat-x;vertical-align:top;'><th nowrap=nowrap>Bundle No</th><th nowrap=nowrap>DO No</th><th nowrap=nowrap>Order Date</th><th>Party</th><th nowrap=nowrap>Variety</th><th>Size</th></tr>
</thead>
	<?php
	$parties=mysql_query("select *from tbl_loadingadvice where vehiclenumber='".$branchesrow['vehiclenumber']."' and dateofloading='".$actdate."' order by id desc");
	//echo "select *from tbl_loadingadvice where vehiclenumber='".$branchesrow['vehiclenumber']."' and dateofloading='".$vars."' order by id desc";
	while($row=mysql_fetch_array($parties))
	{
		
		
		//echo "select * from tbl_order_master where status!='Dispatched' and orderby='".$partiesrow['orderby']."' ORDER BY id desc";
?>



<tbody>


<?php



$res_order=mysql_query("select *from tbl_order_master where donum='".$row['donum']."'");
$row_order=mysql_fetch_array($res_order);
$res_details=mysql_query("select *from tbl_orders where donum='".$row['donum']."' and id='".$row['orderid']."'");
$row_details=mysql_fetch_array($res_details);
$size=$row_details['height']." * " .$row_details['width']." * ".$row_details['thickness'];
echo "<tr class=odd><td id='confirm-dialog' align=center>".$row['bundlenum']."</td><td id='confirm-dialog'><a onClick=order_details('$row_order[id]')>".$row['donum']."</a></td><td id='confirm-dialog'>".$row_order['orderdate']."</td><td id='confirm-dialog' style='padding-left:10px;'>".$row_order['orderby']."</td><td id='confirm-dialog' align=center>".$row_details['variety']."</td><td id='confirm-dialog' align=center nowrap>".$size."</td></tr>";



}
}

}

?>

</tbody>
<tfoot>

<tr><td colspan="8" style="height:1px; background-color:#003"></td></tr>


</table>









</body>
</html>
