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
<script type="text/javascript" src='<?php echo base_url(); ?>js/jquery.js' language="javascript"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.simplemodal.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/init.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.datepick.js"></script>
<link type="text/css" href="<?php echo base_url();?>css/jquery.datepick.css" rel="stylesheet" />

<link type="text/css" href="<?php echo  base_url();?>themes/base/ui.all.css" rel="stylesheet" />


<script type="text/javascript">
	$(function() 
	{
	//alert("hi");
		$('#odate').datepick({showOn: 'button', buttonImage: '<?php echo  base_url();?>images/calendar.gif', buttonImageOnly: true});
		
		});
		</script>
		
		
<script language="javascript">
base_url = '<?= base_url();?>index.php/';
$(document).ready(function(){
	
	$('#orderForm').submit(function(e) {

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
		 url: base_url+'admin/admin_orders/ordersubmit',
		data: $('#orderForm').serialize(),
		
		success: function(msg)
		{
			
			
				//alert(msg.txt);
				success(1,msg);
				
			
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
<div class="leftnav">
<table cellpadding="0" cellspacing="0">
<tr><td class="navhdr"><b>Quick Links</b></td></tr>
<tr><td class="navcontbg1" ><a href=" <?php echo base_url(); ?>index.php/admin/admin_orders">Create Orders</a></td></tr>
<tr><td class="navcontbg2" ><a href=" <?php echo base_url(); ?>index.php/admin/admin_orders/sendtofactory">Sending Orders</a></td></tr>

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
</table>
<div style="height:150px;"></div>

</div>
<div class="rightpane" align="justify" >



<div id="success"  class="success">&nbsp;
</div>
<form name="orderForm" id="orderForm" action="" method="post">
<fieldset style="border:1px solid #073c68"><legend><b>Order&nbsp;Creation</b></legend>
<table  cellpadding="3" cellspacing="1" height="100%">

<tr><td nowrap="nowrap">Order Number / DO Number:</td><td style="padding-left:30px"><input type="text" size="30" name="orderno" id="orderno" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; " /></td></tr>

<tr><td>Order Date:</td><td style="padding-left:30px"><input type="text" size="26" name="odate" id="odate" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; " /></td></tr>

<tr><td>Order From:</td><td style="padding-left:30px"><input type="text" size="30" name="orderfrom" id="orderfrom" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF;"/></td></tr>

<tr><td>Customer Type:</td>
<td style="padding-left:30px;"><select name="customertype" id=customertype onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF;">
<option>Select Type</option>
<option>Distributor</option>
<option>Industrial Customer</option>
<option>Branch/Depot</option>
<option>General Customer</option>
</td></tr>

<tr><td>Item Name:</td><td style="padding-left:30px">

<select name="item" id="item" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF;">
<option>Select Item</option>
<?php 
$res=mysql_query("select *from tbl_itemmaster");

while($row=mysql_fetch_array($res))
{
echo "<option>".$row['itemname']."</option>";
}
?>
</select>
</td></tr>

<tr><td>Variety:</td><td style="padding-left:30px">

<select name="variety" id=variety onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF;">
<option>Select Variety</option>
<?php 
$res=mysql_query("select *from tbl_item_varieties");

while($row=mysql_fetch_array($res))
{
echo "<option>".$row['variety']."</option>";
}
?>

</td></tr>

<tr><td>Density:</td><td style="padding-left:30px"><input type="text" size="30" name="odensity" id="odensity" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF;"/></td></tr>

<tr><td>Length:</td><td style="padding-left:30px"><input type="text" size="30" name="olength" id="olength" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF;"/></td></tr>

<tr><td>Width:</td><td style="padding-left:30px"><input type="text" size="30" name="owidth" id="owidth" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF;"/></td></tr>

<tr><td>Thickness:</td><td style="padding-left:30px"><input type="text" size="30" name="othickness" id="othickness" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF;"/></td></tr>

<tr><td>Quantity:</td><td style="padding-left:30px"><input type="text" size="30" name="oquantity" id="oquantity" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF;"/></td></tr>

<tr><td>Bundles:</td><td style="padding-left:30px"><input type="text" size="30" name="obundles" id="obundles" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF;"/></td></tr>

<tr><td>Proirity:</td><td style="padding-left:30px"><select name="proirity" id=proirity onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF;">

<option>Select Proirity</option>
<option>Very High</option>
<option>High</option>
<option>Low</option>
</td></tr>

<tr><td>Package Type:</td><td style="padding-left:30px"><select name="packagetype" id=packagetype onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF;">

<option>Select Package</option>
<option>Standard</option>
<option>Without Polythin</option>

</td></tr>
<tr><td colspan="2" style="padding-left:100px;"><input type="submit" name="fsubmit" id="fsubmit" value="" class="mfsub" />&nbsp;&nbsp;<input type="reset" value="" class="mfclear" /></td></tr>
</table>
</fieldset>
</form>


</div><!--rightpane div closed-->

<div style="float:left;width:50px; margin-top:20px; margin-left:80px; font-family:Arial, Helvetica, sans-serif; font-size:13px;">
<a href=" <?php echo base_url(); ?>index.php/admin/admin_orders/ordersview"><img src="<?php echo base_url(); ?>images/vvv.gif"  style="border:none"/></a>
</div>
</div><!--middle div closed-->

<div class="futr">
</div>



</div><!--main div closed-->


</body>
</html>
