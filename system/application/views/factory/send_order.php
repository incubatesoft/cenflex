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

<script language="javascript">
function check(str1,str2,str3)
{
	if(str2>str3)
	{
	alert("Sending bundles should not more than actual bundles.");
	
	}
}
</script>
<script language="javascript">
base_url = '<?= base_url();?>index.php/';

$(document).ready(function(){
	
	$('#sendorderForm').submit(function(e) {

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
		 url: base_url+'factory/factory_orders/orderstocutting',
		data: $('#sendorderForm').serialize(),
		
		success: function(msg)
		{
		//alert(msg);	
		if(msg=="successfully changed status.")
				{
				//alert(msg);
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
$(function() {

$("#txt_order_wrap").hide();
	$("#step_2 input[type=radio]").each(function(){

		this.checked = false;
	});
$("#step_2 input[name=sendorder]").click(function()
	{
	//alert("hi");
		$.stepTwoComplete_one = "complete";
		//alert(($("#nccgroupyes:checked").val())); 
		if ($("#sendorderpartial:checked").val() == 'Partial') 
		{
			$("#txt_order_wrap").slideDown();
		} 
		else 
		{
			$("#txt_order_wrap").slideUp();
			//$("#txt_children_wrap").slideUp();
		};
		stepTwoTest();
	});
	});
	
	
	function checkbundles(count)
	{
	//alert('hi');
	if(document.getElementById('txt_bundles').value>count)
	{
	alert("Number of bundles should not be greater than"+ count);
	document.getElementById('txt_bundles').value=count;
	}
	}

	function digitsOnly(obj){
	obj.value=obj.value.replace(/[^\d]/g,'');
		}

</script>
</head>

<body >

<div style="overflow:auto;width:580px;height:400px;">
<div class=editpane align="justify" >

<?php
$res=mysql_query("select *from tbl_order_master where id=".$vars);
$row=mysql_fetch_array($res);
?>


<div id="success"  class="success">&nbsp;
</div>
<form name="sendorderForm" id="sendorderForm" action="" method="post">
<fieldset style="border:1px solid #073c68;width:550px;"><legend><b>Sending Order</b></legend>
<table  cellpadding="3" cellspacing="1" height="100%">
<?php // $res_ro=mysql_query("select * from tbl_orders where donum='".$row['donum']."'"); $row_ro=mysql_fetch_array($res_ro); echo $row_ro['itemname']?>
<tr><td><div id="step_2"><input type="radio" name="sendorder" id="sendorderfull" value="Full">Full Order
<input type="radio" name="sendorder" id="sendorderpartial" value="Partial">Partial Order</div></td></tr>

<tr><td>
 <div id="txt_order_wrap">
 <table  cellpadding="4" cellspacing="0" height="97%" width=100% border="0">

<tr><td nowrap="nowrap" colspan="8"><b>Order Number / DO Number: </b><?php echo $row['donum'] ?></b> </td></tr>

<tr><td nowrap="nowrap" colspan="8"><b>Select the Orders and click on Submit to send the Orders to Cutting Section.</b> </td></tr>

<tr><td><br /></td></tr>
<tr><td><b>Sheets</b></td></tr>


<?php 
$res_order=mysql_query("select * from tbl_orders where donum='".$row['donum']."' and itemname='Sheets' and (status='Sent to Factory'  or bundlestatus='Partial')");
$count=mysql_num_rows($res_order);
$res_order1=mysql_query("select * from tbl_orders where donum='".$row['donum']."' and itemname='Cushions' and (status='Sent to Factory' or bundlestatus='Partial')");
$count1=mysql_num_rows($res_order1);
$res_order2=mysql_query("select * from tbl_orders where donum='".$row['donum']."' and itemname='Rolls' and (status='Sent to Factory' or bundlestatus='Partial')");
$count2=mysql_num_rows($res_order2);
?>


<?php 
if($count!=0)
{

$i=0;
echo "<tr><th  style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;border-top:1px solid #073c68; border-left:1px solid #073c68'>Select</th>
<th style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;border-top:1px solid #073c68;'>Variety</th>
<th style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;border-top:1px solid #073c68;'>Density</th>
<th style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;border-top:1px solid #073c68;'>Length</th>
<th style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;border-top:1px solid #073c68;'>Width</th>
<th style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;border-top:1px solid #073c68;'>Thickness</th>
<th style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;border-top:1px solid #073c68;'>Quantity</th>
<th style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;border-top:1px solid #073c68;'>Remarks</th>
<th style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;border-top:1px solid #073c68;'>Bundles</th></tr>";
while($row_order=mysql_fetch_array($res_order))
{
$i++;
echo "<tr><td  style='border-bottom:1px solid #073c68; border-right:1px solid #073c68; border-left:1px solid #073c68'><input type=checkbox name=chk".$row['donum']."id".$row_order['id']." id=chk".$row['donum']."id".$row_order['id']."></td>
<td style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;'>".$row_order['variety']."

</td>
<td style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;'>".$row_order['density']."</td>


<td style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;'>".$row_order['height']."</td>


<td style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;'>".$row_order['width']."</td>


<td style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;'>".$row_order['thickness']."</td>


<td style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;'>".$row_order['quantity']."</td>
<td style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;'>".$row_order['remarks']."</td>


<td style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;'><input type=text name=txt".$row['donum']."id".$row_order['id']." value=".$row_order['remainingbundles']." style='width:40px;' onkeyup = 'digitsOnly(this)' onblur=javascript:check(this.name,this.value,".$row_order['remainingbundles'].")></td></tr>";
}

}
?>

<tr><td><br /></td></tr>
<tr><td colspan="6"><b>Cushions</b></td></tr>

<?php 
if($count1!=0)
{
$j=0;
echo "<tr><th  style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;border-top:1px solid #073c68; border-left:1px solid #073c68'>Select</th>
<th  style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;border-top:1px solid #073c68;'>Variety</th>
<th  style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;border-top:1px solid #073c68;'>Density</th>
<th  style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;border-top:1px solid #073c68;'>Length</th>
<th  style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;border-top:1px solid #073c68;'>Width</th>
<th  style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;border-top:1px solid #073c68;'>Thickness</th>
<th  style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;border-top:1px solid #073c68;'>Quantity</th>
<th  style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;border-top:1px solid #073c68;'>Remarks</th>
<th  style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;border-top:1px solid #073c68;'>Bundles</th></tr>";
while($row_order1=mysql_fetch_array($res_order1))
{
$j++;
echo "<tr>
<td   style='border-bottom:1px solid #073c68; border-right:1px solid #073c68; border-left:1px solid #073c68'><input type=checkbox name=chk".$row['donum']."id".$row_order1['id']." id=chk".$row['donum']."id".$row_order1['id']."></td>
<td style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;'>".$row_order1['variety']."

</td>
<td style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;'>".$row_order1['density']."</td>


<td style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;'>".$row_order1['height']."</td>


<td style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;'>".$row_order1['width']."</td>


<td style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;'>".$row_order1['thickness']."</td>


<td style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;'>".$row_order1['quantity']."</td>
<td style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;'>".$row_order1['remarks']."</td>

<td style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;' ><input type=text name=txt".$row['donum']."id".$row_order1['id']." value=".$row_order1['remainingbundles']." style='width:40px;' onkeyup = 'digitsOnly(this)' onblur=javascript:check(this.name,this.value,".$row_order1['remainingbundles'].")></td></tr>";
}

}
?>



<tr><td><br /></td></tr>
<tr><td colspan="6"><b>Rolls</b></td></tr>

<?php 
if($count2!=0)
{
$j=0;
echo "<tr><th  style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;border-top:1px solid #073c68; border-left:1px solid #073c68'>Select</th>
<th  style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;border-top:1px solid #073c68;'>Variety</th>
<th  style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;border-top:1px solid #073c68;'>Density</th>
<th  style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;border-top:1px solid #073c68;'>Length</th>
<th  style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;border-top:1px solid #073c68;' >Width</th>
<th  style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;border-top:1px solid #073c68;'>Thickness</th>
<th  style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;border-top:1px solid #073c68;'>Remarks</th>
<th  style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;border-top:1px solid #073c68;'>Length (Mtrs)</th></tr>";
while($row_order2=mysql_fetch_array($res_order2))
{
$j++;
echo "<tr>
<td   style='border-bottom:1px solid #073c68; border-right:1px solid #073c68; border-left:1px solid #073c68'><input type=checkbox name=chk".$row['donum']."id".$row_order2['id']." id=chk".$row['donum']."id".$row_order2['id']."></td>
<td style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;'>".$row_order2['variety']."

</td>
<td style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;'>".$row_order2['density']."</td>


<td style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;'>".$row_order2['height']."</td>


<td style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;'>".$row_order2['width']."</td>


<td style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;'>".$row_order2['thickness']."</td>



<td style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;'>".$row_order2['remarks']."</td>

<td style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;'><input type=text name=txt".$row['donum']."id".$row_order2['id']." value=".$row_order2['remainingmtrs']." style='width:40px;' onkeyup = 'digitsOnly(this)' onblur=javascript:check(this.name,this.value,".$row_order2['remainingmtrs'].")></td></tr>";
}

}
?>




</table>


</div></td></tr>
<tr><td colspan="2" style="padding-left:80px;"><input type="submit" name="fsubmit" id="fsubmit" value="" class="mfsub" />
 <input type="hidden" name="doid" id="doid" value="<?php echo $vars ?>" ></td></tr>
</table>
</fieldset>
</form>


</div><!--rightpane div closed-->

</div>
</body>
</html>
