<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<LINK REL="SHORTCUT ICON" HREF="<?php echo base_url(); ?>images/malinilogo.png">
<title>Shree Malini Foams </title>
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

<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.min.js"></script>
<script type="text/javascript" src='<?php echo base_url(); ?>js/jquery.js' language="javascript"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.simplemodal.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/init.js"></script>

<script language="javascript">
base_url = '<?= base_url();?>index.php/';
$(document).ready(function(){
	
	$('#vehicleForm').submit(function(e) {

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
		 url: base_url+'admin/admin_modules/vehiclesubmit',
		data: $('#vehicleForm').serialize(),
		
		success: function(msg)
		{
			if(msg=='Vehicle Added Successfully.')
{
$( "#vehicleForm" )[ 0 ].reset();
}
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

<body marginwidth="0" marginheight="0" bgcolor="#e9f1fb" topmargin="0" leftmargin="0" rightmargin="0">


<table width=100% cellpadding="0" cellspacing="0" border="0">
<tr><td style="padding-top:0px;"><img src="<?php echo base_url(); ?>images/newmalani.gif"  /></td><td  style="height:95px;  background-color:#d4e6fb; background-image:url(<?php echo base_url(); ?>images/newmalanihbg.gif); background-repeat:repeat-x; border:0px;">


</td></tr>


<tr><td colspan="2"  style="background-color:#fde5c3; height:28px;"> 


<table style="margin-top:-2px;">
<tr >
<td  align="center" class="mainnavlink"  ><a href='<?php echo base_url(); ?>index.php/admin/admin_home'  >Admin Registration</a></td>
<td align="center" class="mainnavlink" ><a href='<?php echo base_url(); ?>index.php/admin/admin_orders'  >Order Management</a></td>
<td align="center" class="mainnavlink" ><a href="<?php echo base_url(); ?>index.php/admin/admin_reports"  >Reports</a></td>
<td align="center" class="mainnavlink" ><a href='<?php echo base_url(); ?>index.php/login/logout'  >Logout</a></td>
</tr></table></td></tr>

<tr><td style="padding-left:10px;width:200px; padding-top:5px;" valign="top">

<table cellpadding="0" cellspacing="0">
<tr><td class="navhdr"><b>Registrations</b></td></tr>
<tr><td class="navcontbg1" ><a href=" <?php echo base_url(); ?>index.php/admin/admin_modules/warehouse">Warehouse</a></td></tr>
<tr><td class="navcontbg2" ><a href=" <?php echo base_url(); ?>index.php/admin/admin_modules/branch">Branch</a></td></tr>
<tr><td class="navcontbg1" ><a href=" <?php echo base_url(); ?>index.php/admin/admin_modules/distributor">Customers</a></td></tr>
<!--<tr><td class="navcontbg2" ><a href=" <?php echo base_url(); ?>index.php/admin/admin_modules/products">Products</a></td></tr>-->
<tr><td class="navcontbg2" ><a href=" <?php echo base_url(); ?>index.php/admin/admin_modules/productsvariety">Product Varieties</a>
<tr><td class="navcontbg1" ><a href=" <?php echo base_url(); ?>index.php/admin/admin_modules/productsdensity">Product Density</a>
<tr><td class="navcontbg2" ><a href=" <?php echo base_url(); ?>index.php/admin/admin_modules/vehicle">Vehicle</a></td></tr>
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


<td class="rightpane" valign="top" style="padding-top:50px;">


<table width="100%" cellpadding="0" cellspacing="0" border="0">

<tr><td align="right" style="padding-right:100px; padding-top:20px;"><a href=" <?php echo base_url(); ?>index.php/admin/admin_modules/vehicleview"><img src="<?php echo base_url(); ?>images/vvv.gif"  style="border:none"/></a></td></tr>

<tr><td class="success" id=success ></td></tr>
<tr><td valign="top">

<form name="vehicleForm" id="vehicleForm" action="" method="post">
<fieldset style="border:1px solid #073c68;width:400px;"><legend><b>Vehicle&nbsp;Registration</b></legend>
<table  cellpadding="3" cellspacing="1" height="100%">
<tr><td>Vehicle Number:</td><td style="padding-left:30px"><input type="text" size="30" name="vnumber" id="vnumber" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; border:1px solid #073c68 " /></td></tr>
<tr><td>Transport Name:</td><td style="padding-left:30px"><input type="text" size="30" name="transport" id="transport" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; border:1px solid #073c68 " /></td></tr>
<tr><td>Driver Name:</td><td style="padding-left:30px"><input type="text" size="30" name="dname" id="dname" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; border:1px solid #073c68" /></td></tr>

<tr><td>Mobile Number:</td><td style="padding-left:30px"><input type="text" size="30" name="mobile" id="mobile" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; border:1px solid #073c68"/></td></tr>



<tr><td colspan="2" style="padding-left:25px;"><input type="submit" name="fsubmit" id="fsubmit" value="" class="mfsub" />&nbsp;&nbsp;<input type="reset" value="" class="mfclear" /></td></tr>
</table>
</fieldset>
</form>


</td></tr></table>

</td></tr>

<tr><td colspan="2"><br /></td></tr>
<tr><td colspan="2" style="background-color:#ffdc90; height:25px; padding-top:10px;"></td></tr>

</table>




</body>
</html>