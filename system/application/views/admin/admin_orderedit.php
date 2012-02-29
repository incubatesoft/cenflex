<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<LINK REL="SHORTCUT ICON" HREF="<?php echo base_url(); ?>images/malinilogo.png">
<title>Shree Malani Foams </title>
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

<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.simplemodal.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/init.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.datepick.js"></script>
<script src="<?php echo base_url();?>public/js/utils.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo  base_url();?>ui/ui.core.js"></script>
	<script type="text/javascript" src="<?php echo  base_url();?>ui/ui.draggable.js"></script>
	<script type="text/javascript" src="<?php echo  base_url();?>ui/ui.resizable.js"></script>
	<script type="text/javascript" src="<?php echo  base_url();?>ui/ui.dialog.js"></script>
	<script type="text/javascript" src="<?php echo  base_url();?>ui/effects.core.js"></script>
	<script type="text/javascript" src="<?php echo  base_url();?>ui/effects.highlight.js"></script>
	<script type="text/javascript" src="<?php echo  base_url();?>themes/external/bgiframe/jquery.bgiframe.js"></script>
<link type="text/css" href="<?php echo base_url();?>css/jquery.datepick.css" rel="stylesheet" />
	
	<script type="text/javascript">
	$(function() 
	{
	//alert("hi");
		$('#odate').datepick({showOn: 'button', buttonImage: '<?php echo  base_url();?>images/calendar.gif', buttonImageOnly: true});
		$('#podate').datepick({showOn: 'button', buttonImage: '<?php echo  base_url();?>images/calendar.gif', buttonImageOnly: true});
		
		$('#dispatchdate').datepick({showOn: 'button', buttonImage: '<?php echo  base_url();?>images/calendar.gif', buttonImageOnly: true});
		
		$('#dispatchdate1').datepick({showOn: 'button', buttonImage: '<?php echo  base_url();?>images/calendar.gif', buttonImageOnly: true});
		
		});
	
	</script>
<style type="text/css">
#datepick-div{
	z-index:2300;
}

</style>
		
		
<script language="javascript">
base_url = '<?= base_url();?>index.php/';

$(document).ready(function()
{
	
	$('#orderEdit').submit(function(e) {

		register();
		e.preventDefault();
		
	});
	
});


function register()
{
//alert("hi");
	hideshow('loading',1);
	error(0);
	
	$.ajax({
		type: "POST",
		 url: base_url+'admin/admin_orders/orderupdate',
		data: $('#orderEdit').serialize(),
		
		success: function(msg)
		{
			//alert(msg);
		if(msg=="Order Updated Successfully.")
				{
		
				success(1,msg);
				$("#add_admin_shipping .frmholder").html("");
					
	 jQuery("#list5").setGridParam({page:1}).trigger("reloadGrid");

     $.unblockUI();
				}
				
			else
			error(1,msg);
			
			hideshow('loading',0);
		}
	});

}


function hideshow(el,act)
{
	if(act) $('#'+el).css('visibility','visible');
	else $('#'+el).css('visibility','hidden');
}

function error(act,txt)
{
	hideshow('error',act);
	if(txt) $('#error').html(txt);
}
function success(act,txt)
{
	hideshow('success',act);
	if(txt) $('#success').html(txt);
}

function showpriority()
{
	
	if(document.getElementById('proirity').selectedIndex==3)
	    document.getElementById('reqdate').style.display='';
		else
		 document.getElementById('reqdate').style.display='none';
		 document.getElementById('reqdate1').style.display='none';
}

function remove_order(str)
{
	//alert('hi');
var where_to= confirm("Do you really want Remove this Order??");
//alert(where_to);
 if (where_to==true)
 
 {
	 //alert("hi");
   $.ajax({
					type: "POST",
					url: base_url+"admin/admin_modules/order_remove/"+str,			 
					beforeSend: function()
					{
					//alert(str); 
					   },
					success: function(html)
					{   
					if(html=="Order Deleted")
					{
						alert("The complete Order Deleted Successfully.");
						$("#add_admin_shipping .frmholder").html("");
					
	 jQuery("#list5").setGridParam({page:1}).trigger("reloadGrid");

     $.unblockUI();
					}
					else
					{
			         $("#add_admin_shipping").width(860).height(500);
		
		//$(this).closest("td").unbind("click");
 		
		$.blockUI({message: $("#add_admin_shipping")});
		
		$("#add_admin_shipping .modal_title").html("Edit Order");
		
		  var query_str = "";
		  	$.ajax({
			type: "POST",
			url: base_url+"admin/admin_orders/editorder/"+html,
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

					}
				});
				
   
 }
 else
 {
  return false;
  }

}



</script>
</head>

<body>

<div style="overflow:auto;width:860px;height:430px;">
<div class=editpane align="justify" >

<?php
$di='';
$ic='';
$bd='';
$ot='';
$vh='';
$hi='';
$lo='';
$st='';
$wp='';
$ws='';
$wsp='';
$bgh='';
//echo "select *from tbl_orders where donum=".$vars;
$res_var=mysql_query("select *from tbl_order_master where donum=".$vars);
$row_var=mysql_fetch_array($res_var);


if($row_var['usertype']=='Distributor')
{
$di='selected';
}



if($row_var['usertype']=='Branch')
{
$bd='selected';
}
if($row_var['usertype']=='Others')
{
$ot='selected';
}
//echo $row_var['priority'];

if($row_var['priority']=='Immediate (Within 3 days)')
{
	//echo 'hello';
$vh='selected';
}

if($row_var['priority']=='Normal (Within 7 days)')
{
$hi='selected';
}

if($row_var['priority']!='Immediate (Within 3 days)' && $row_var['priority']!='Normal (Within 7 days)')
{
$lo='selected';
}


?>

<div id="success"  class="success">&nbsp;
</div>
<div id="error"  class="error">&nbsp;
</div>
<form name="orderEdit" id="orderEdit" action="" method="post">
<fieldset style="border:1px solid #073c68"><legend><b>Order&nbsp;Creation</b></legend>
<table  cellpadding="3" cellspacing="1" height="97%">

<tr><td nowrap="nowrap" width=23%>Order Number / DO Number:</td><td style="padding-left:30px"><input type="text" size="30" name="orderno" id="orderno" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; " value="<?php echo $row_var['donum']; ?>" disabled="disabled"></td></tr>

<tr><td>Order Date:</td><td style="padding-left:30px"><input name="odate" id="odate" type="text" value="<?php echo  $row_var['orderdate']; ?>"></td></tr>


<tr><td>Customer Type:</td><td style="padding-left:30px"><input type="text" name="customertype" id=customertype onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF;" value="<?php echo $row_var['usertype']; ?>">

</td></tr>

<?php
if($row_var['usertype']=='Distributor' || $row_var['usertype']=='Wholesaler' || $row_var['usertype']=='Dealers' || $row_var['usertype']=='Stockist'  || $row_var['usertype']=='Industrial Customer')
{ 
echo "<tr><td>Order From:</td>
<td style='padding-left:30px'><select name=orderfrom id=orderfrom>
<option>Select User</option>";
$res_dis=mysql_query("select *from tbl_distributors");
while($row_dis=mysql_fetch_array($res_dis))
{
	if($row_var['orderby']==$row_dis['dname'])
	{
		echo "<option selected=selected>".$row_dis['dname']."</option>";
	}
	else
	echo "<option>".$row_dis['dname']."</option>";
}


echo "</td></tr>";	
}
?>

<?php
if($row_var['usertype']=='Branch')
{
echo "<tr><td>Order From:</td>
<td style='padding-left:30px'><select name=orderfrom id=orderfrom>
<option>Select User</option>";
$res_dis=mysql_query("select *from tbl_branches");
while($row_dis=mysql_fetch_array($res_dis))
{
	if($row_var['orderby']==$row_dis['branchname'])
	{
		echo "<option selected=selected>".$row_dis['branchname']."</option>";
	}
	else
	echo "<option>".$row_dis['branchname']."</option>";
}


echo "</td></tr>";	
}
?>

<?php
if($row_var['usertype']=='Others')
{
echo "<tr><td>Order From:</td>
<td style='padding-left:30px'><input type=text name=orderfrom id=orderfrom value=".$row_var['orderby'].">
</td></tr>";	
}
?>



<tr><td>P.O Number:</td><td style="padding-left:30px" colspan=5><input type="text" size="26" name="ponum" id="ponum" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; " value="<?php echo $row_var['ponum'] ?>"></td></tr>


<tr><td>P.O Date:</td><td style="padding-left:30px" colspan=5><input type="text" size="26" name="podate" id="podate" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; " value="<?php echo $row_var['podate'] ?>"></td></tr>

<tr><td>Billing Price List:</td><td style="padding-left:30px" colspan=5><input type="text" size="26" name="bplist" id="bplist" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; " value="<?php echo $row_var['billingprice']; ?>" /></td></tr>


<?php 
$res_order=mysql_query("select * from tbl_orders where donum='".$vars."' and itemname='Sheets'");
$count=mysql_num_rows($res_order);
$res_order1=mysql_query("select * from tbl_orders where donum='".$vars."' and itemname='Cushions'");
$count1=mysql_num_rows($res_order1);
$res_order2=mysql_query("select * from tbl_orders where donum='".$vars."' and itemname='Rolls'");
$count2=mysql_num_rows($res_order2);
?>


<?php 
if($count!=0)
{
echo "<tr><td colspan='6'><b>Sheets</b></td></tr>";
$i=0;
echo "<tr><td colspan=5><table border=0 cellpadding=2 cellspacing=2><tr><td>Variety</td><td>Density</td><td>Length</td><td >Width</td><td>Thickness</td><td>Quantity</td><td>Bundles</td><td>Package</td><td >Remarks</td>
<td >Color</td><td >Remove</td></tr>";
while($row_order=mysql_fetch_array($res_order))
{ 
if($row_order['packagetype']=='Standard')
{
$st='selected';
}
if($row_order['packagetype']=='Without Polythene with Stamping')
{
$wp='selected';
}
if($row_order['packagetype']=='Without Stamping with Polythene')
{
$ws='selected';
}
if($row_order['packagetype']=='Without Polythene and Stamping')
{
$wsp='selected';
}
if($row_order['packagetype']=='B Grade HDPE')
{
$bgh='selected';
}	
	
$i++;
echo "<tr><td >

<select name=svariety_".$i." id=svariety_".$i." onfocus=this.style.background='#dce9fb' onblur=this.style.background='#ffffff' style=background-color:#FFFFFF;width:90px; >
<option>Select Variety</option>";

$res=mysql_query("select distinct(variety) from tbl_item_varieties");

while($row=mysql_fetch_array($res))
{
if($row_order['variety']==$row['variety'])
echo "<option selected>".$row['variety']."</option>";
else
echo "<option>".$row['variety']."</option>";
}

echo "</td>
<td><input type=text size=7 name=sden_".$i."  id=sden_".$i."  onfocus=this.style.background='#dce9fb' onblur=this.style.background='#ffffff' style=background-color:#FFFFFF; value=".$row_order['density']."></td>


<td><input type=text size=7 name=slen_".$i."  id=slen_".$i."  onfocus=this.style.background='#dce9fb' onblur=this.style.background='#ffffff' style=background-color:#FFFFFF; value=".$row_order['height']."></td>


<td><input type=text size=7 name=swid_".$i."  id=swid_".$i."  onfocus=this.style.background='#dce9fb' onblur=this.style.background='#ffffff' style=background-color:#FFFFFF; value=".$row_order['width']."></td>


<td><input type=text size=7 name=sthi_".$i."  id=sthi_".$i."  onfocus=this.style.background='#dce9fb' onblur=this.style.background='#ffffff' style=background-color:#FFFFFF; value=".$row_order['thickness']."></td>


<td><input type=text size=7 name=squa_".$i."  id=squa_".$i."  onfocus=this.style.background='#dce9fb' onblur=this.style.background='#ffffff' style=background-color:#FFFFFF; value=".$row_order['quantity']."></td>


<td ><input type=text size=7 name=sbun_".$i."  id=sbun_".$i."  onfocus=this.style.background='#dce9fb' onblur=this.style.background='#ffffff' style=background-color:#FFFFFF; value=".$row_order['numbundles']."></td>
<td ><select name=spack_".$i." id=spack_".$i." style='width:80px;'>
<option ".$st.">Standard</option>
<option ".$wp.">Without Polythene with Stamping</option>
<option ".$ws.">Without Stamping with Polythene</option>
<option ".$wsp.">Without Polythene and Stamping</option>
<option ".$bgh.">B Grade HDPE</option>
</select>
</td>

<td ><input type=text size=7 name=sremarks_".$i." id=sremarks_".$i." value=".$row_order['remarks']."></td>
<td ><input type=text size=7 name=scolor_".$i." id=scolor_".$i." value=".$row_order['colorspecific']."></td>
<td ><a href='#' onClick=remove_order('$row_order[id]')><img src=".base_url()."images/cancel_o.gif style=padding-top:0px;border:none;; width=60 ></a></td></tr>";
}
echo "</table></td></tr> ";
}
?>




<?php 
if($count1!=0)
{
echo "<tr><td colspan=6><b>Cushions</b></td></tr>";
	
$j=0;
echo "<tr><td colspan=5><table border=0 cellpadding=2 cellspacing=2><tr><td>Variety</td><td>Density</td><td>Length</td><td >Width</td><td>Thickness</td><td>Quantity</td><td>Bundles</td><td>Package</td><td >Remarks</td>
<td >Color</td><td >Remove</td></tr>";
while($row_order1=mysql_fetch_array($res_order1))
{
if($row_order1['packagetype']=='Standard')
{
$st='selected';
}
if($row_order1['packagetype']=='Without Polythene with Stamping')
{
$wp='selected';
}
if($row_order1['packagetype']=='Without Stamping with Polythene')
{
$ws='selected';
}
if($row_order1['packagetype']=='Without Polythene and Stamping')
{
$wsp='selected';
}
if($row_order1['packagetype']=='B Grade HDPE')
{
$bgh='selected';
}	
$j++;

echo "<tr><td>

<select name=cvariety_".$j." id=cvariety_".$j." onfocus=this.style.background='#dce9fb' onblur=this.style.background='#ffffff' style=background-color:#FFFFFF;width:90px; >
<option>Select Variety</option>";

$res=mysql_query("select distinct(variety) from tbl_item_varieties");

while($row=mysql_fetch_array($res))
{ 
if($row_order1['variety']==$row['variety'])
echo "<option selected>".$row['variety']."</option>";
else
echo "<option>".$row['variety']."</option>";
}

echo "</td>
<td><input type=text size=7 name=cden_".$j."  id=cden_".$j."  onfocus=this.style.background='#dce9fb' onblur=this.style.background='#ffffff' style=background-color:#FFFFFF; value=".$row_order1['density']."></td>


<td><input type=text size=7 name=clen_".$j."  id=clen_".$j."  onfocus=this.style.background='#dce9fb' onblur=this.style.background='#ffffff' style=background-color:#FFFFFF; value=".$row_order1['height']."></td>


<td><input type=text size=7 name=cwid_".$j."  id=cwid_".$j."  onfocus=this.style.background='#dce9fb' onblur=this.style.background='#ffffff' style=background-color:#FFFFFF; value=".$row_order1['width']."></td>


<td><input type=text size=7 name=cthi_".$j."  id=cthi_".$j."  onfocus=this.style.background='#dce9fb' onblur=this.style.background='#ffffff' style=background-color:#FFFFFF; value=".$row_order1['thickness']."></td>


<td><input type=text size=7 name=cqua_".$j."  id=cqua_".$j."  onfocus=this.style.background='#dce9fb' onblur=this.style.background='#ffffff' style=background-color:#FFFFFF; value=".$row_order1['quantity']."></td>


<td ><input type=text size=7 name=cbun_".$j."  id=cbun_".$j."  onfocus=this.style.background='#dce9fb' onblur=this.style.background='#ffffff' style=background-color:#FFFFFF; value=".$row_order1['numbundles']."></td>
<td ><select name=cpack_".$j." id=cpack_".$j." style='width:80px;'>
<option ".$st.">Standard</option>
<option ".$wp.">Without Polythene with Stamping</option>
<option ".$ws.">Without Stamping with Polythene</option>
<option ".$wsp.">Without Polythene and Stamping</option>
<option ".$bgh.">B Grade HDPE</option>
</select>
</td>
<td ><input type=text size=7 name=cremarks_".$j." id=cremarks_".$j." value=".$row_order1['remarks']."></td>
<td ><input type=text size=7 name=ccolor_".$j." id=ccolor_".$j." value=".$row_order1['colorspecific']."></td>
<td ><a href='#' onClick=remove_order('$row_order1[id]')> <img src=".base_url()."images/cancel_o.gif style=padding-top:0px;border:none;; width=60 ></a></td>
</tr>";
}
echo "</table></td></tr>";
}
?>



<?php 
if($count2!=0)
{
echo "<tr><td colspan=6><b>Rolls</b></td></tr>";
	
$k=0;
echo "<tr><td colspan=5><table border=0 cellpadding=2 cellspacing=2><tr><td>Variety</td><td>Density</td><td>Length</td><td >Width</td><td>Thickness</td><td>Package</td><td >Remarks</td>
<td >Color</td><td >Remove</td></tr>";
while($row_order2=mysql_fetch_array($res_order2))
{
if($row_order2['packagetype']=='Standard')
{
$st='selected';
}
if($row_order2['packagetype']=='Without Polythene Without HDPE')
{
$wp='selected';
}
if($row_order2['packagetype']=='Without Polythene with HDPE')
{
$ws='selected';
}
if($row_order2['packagetype']=='With Polythene With HDPE')
{
$wsp='selected';
}	
$k++;
echo "<tr><td>

<select name=rvariety_".$k." id=rvariety_".$k." onfocus=this.style.background='#dce9fb' onblur=this.style.background='#ffffff' style=background-color:#FFFFFF;width:90px; >
<option>Select Variety</option>";

$res=mysql_query("select distinct(variety) from tbl_item_varieties");

while($row=mysql_fetch_array($res))
{
if($row_order2['variety']==$row['variety'])
echo "<option selected>".$row['variety']."</option>";
else
echo "<option>".$row['variety']."</option>";
}

echo "</td>
<td><input type=text size=7 name=rden_".$k."  id=rden_".$k."  onfocus=this.style.background='#dce9fb' onblur=this.style.background='#ffffff' style=background-color:#FFFFFF; value=".$row_order2['density']."></td>


<td><input type=text size=7 name=rlen_".$k."  id=rlen_".$k."  onfocus=this.style.background='#dce9fb' onblur=this.style.background='#ffffff' style=background-color:#FFFFFF; value=".$row_order2['height']."></td>


<td><input type=text size=7 name=rwid_".$k."  id=rwid_".$k."  onfocus=this.style.background='#dce9fb' onblur=this.style.background='#ffffff' style=background-color:#FFFFFF; value=".$row_order2['width']."></td>


<td><input type=text size=7 name=rthi_".$k."  id=rthi_".$k."  onfocus=this.style.background='#dce9fb' onblur=this.style.background='#ffffff' style=background-color:#FFFFFF; value=".$row_order2['thickness']."></td>



<td ><select name=rpack_".$k." id=rpack_".$k." style='width:80px;'>
<option ".$st.">Standard</option>
<option ".$wp.">Without Polythene Without HDPE</option>
<option ".$ws.">Without Polythene with HDPE</option>
<option ".$wsp.">With Polythene With HDPE</option>
</select>
</td>
<td ><input type=text size=7 name=rremarks_".$k." id=rremarks_".$k." value=".$row_order2['remarks']."></td>
<td ><input type=text size=7 name=rcolor_".$k." id=rcolor_".$k." value=".$row_order2['colorspecific']."></td>
<td ><a href='#' onClick=remove_order('$row_order2[id]')> <img src=".base_url()."images/cancel_o.gif style=padding-top:0px;border:none;; width=60 ></a></td>
</tr>";
}
echo "</table></td></tr>";
}
?>


<tr><td>Reqd Dispatched Time:</td><td style="padding-left:30px" colspan=5><select name="proirity" id=proirity onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF;" onchange="showpriority()">

<option >Select Proirity</option>
<option <?php echo $vh ?>>Immediate (Within 3 days)</option>
<option <?php echo $hi ?>>Normal (Within 7 days)</option>
<option <?php echo $lo ?>>Specify Date</option>
</select>
</td></tr>

<tr><td colspan=6>
<div name='reqdate' id='reqdate' style='display:none;'>
<table width=100%><tr><td colspan='2' nowrap='nowrap' width=23%>Specify Date:</td>
<td style='padding-left:30px'> 
<input type='text' name='dispatchdate' id='dispatchdate' style='width:160px;' /></td></tr></table>
</div></td></tr>


<?php  
 if($lo=='selected')
 {
echo "<tr><td colspan=6>
<div name='reqdate1' id='reqdate1'>
<table width=100%><tr><td colspan='2' nowrap='nowrap' width=23%>Specify Date:</td>
<td style='padding-left:30px'><input type='text' name='dispatchdate1' id='dispatchdate1' style='width:160px;' value=".$row_var['priority'].">
</td></tr></table>
</div></td></tr>";
 }
?>
<tr><td nowrap="nowrap">Remarks:</td><td style="padding-left:30px" colspan=5><textarea name="remarks" id=remarks><?php echo $row_var['remarks'] ?></textarea></td></tr>

<tr><td><b>Authorised By</b></td></tr>

<tr><td nowrap="nowrap">Name:</td><td style="padding-left:30px" colspan=5><input type="text" name="oname" id="oname" value="<?php echo $row_var['authorisedname'] ?>">
</td></tr>
<tr><td nowrap="nowrap">Designation:</td><td style="padding-left:30px" colspan=5><input type="text" name="odesignation" id="odesignation" value="<?php echo $row_var['authoriseddesignation'] ?>" />
</td></tr>

<tr><td></td><td><input type="submit" name="fsubmit" id="fsubmit" value=""  class="mfedit">
<input type="hidden" name="don" id=don value="<?php echo $vars; ?>" >
<input type="hidden" name="sheetcount" id="sheetcount"  value="<?php echo $count; ?>" />
<input type="hidden" name="cushionscount" id=cushionscount value="<?php echo $count1; ?>" />
<input type="hidden" name="rollscount" id=rollscount value="<?php echo $count2; ?>" />
</td></tr>
</table>
</fieldset>
</form>

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




</div><!--main div closed-->


</body>
</html>
