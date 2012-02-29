<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<LINK REL="SHORTCUT ICON" HREF="<?php echo base_url(); ?>images/malinilogo.png">
<title>Shree Malini Foams </title>
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

<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.min.js"></script>
<script type="text/javascript" src='<?php echo base_url(); ?>js/jquery.js' language="javascript"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.simplemodal.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/init.js"></script>

<script language="javascript">
base_url = '<?= base_url();?>index.php/';
$(document).ready(function(){
	
	$('#distributorForm').submit(function(e) {

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
		 url: base_url+'admin/admin_modules/distributorsubmit',
		data: $('#distributorForm').serialize(),
		
		success: function(msg)
		{
			
			
				if(msg=='Distributor Registered Successfully.')
{
$( "#distributorForm" )[ 0 ].reset();
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


<td class="rightpane">


<table width="100%" cellpadding="0" cellspacing="0" border="0">

<tr><td align="right" style="padding-right:100px; padding-top:20px;"><a href=" <?php echo base_url(); ?>index.php/admin/admin_modules/distributorsview"><img src="<?php echo base_url(); ?>images/vvv.gif"  style="border:none"/></a></td></tr>

<tr><td class="success" id=success ></td></tr>
<tr><td>
<form name="distributorForm" id="distributorForm" action="" method="post">
<fieldset style="border:1px solid #073c68;width:450px;"><legend><b>Customer &nbsp;Registration</b></legend>
<table  cellpadding="3" cellspacing="1" height="100%">
<tr><td>Customer Type:</td><td style="padding-left:30px"><select name="customertype" id=customertype onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF;width:190px; border:1px solid #073c68" ><option>Select Type</option>
<option>Distributor</option>
<option>Wholesaler</option>
<option>Dealers</option>
<option>Stockist</option>
<option>Industrial Customer</option>
<!--<option>Others</option>-->
</select></td></tr>
<tr><td>Customer Code:</td><td style="padding-left:30px"><input type="text" size="30" name="dcode" id="dcode" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; border:1px solid #073c68" /></td></tr>
<tr><td>Firm Name:</td><td style="padding-left:30px"><input type="text" size="30" name="dname" id="dname" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; border:1px solid #073c68 " /></td></tr>

<tr><td>Contact Name:</td><td style="padding-left:30px"><input type="text" size="30" name="dcname" id="dcname" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; border:1px solid #073c68"/></td></tr>

<tr><td>Mobile:</td><td style="padding-left:30px"><input type="text" size="30" name="dmobile" id="dmobile" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; border:1px solid #073c68"/></td></tr>

<tr><td>Landline Phone:</td><td style="padding-left:30px"><input type="text" size="30" name="dphone" id="dphone" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; border:1px solid #073c68"/></td></tr>

<tr><td>Street1:</td><td style="padding-left:30px"><input type="text" size="30" name="dstreet1" id="dstreet1" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; border:1px solid #073c68"/></td></tr>

<tr><td>Street2:</td><td style="padding-left:30px"><input type="text" size="30" name="dstreet2" id="dstreet2" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; border:1px solid #073c68"/></td></tr>

<tr><td>Town/City:</td><td style="padding-left:30px"><input type="text" size="30" name="dcity" id="dcity" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; border:1px solid #073c68"/></td></tr>

<tr><td>State:</td><td style="padding-left:30px"><input type="text" size="30" name="dstate" id="dstate" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; border:1px solid #073c68"/></td></tr>

<tr><td>Pincode:</td><td style="padding-left:30px"><input type="text" size="30" name="dpincode" id="dpincode" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; border:1px solid #073c68"/></td></tr>
<!--
<tr><td>Username:</td><td style="padding-left:30px"><input type="text" size="30" name="duser" id="duser" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; border:1px solid #073c68"/></td></tr>

<tr><td>Password:</td><td style="padding-left:30px"><input type="password" size="30" name="dpass" id="dpass" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; border:1px solid #073c68"/></td></tr>
-->
<tr><td>ECC:</td><td style="padding-left:30px"><input type="text" size="30" name="decc" id="decc" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; border:1px solid #073c68"/></td></tr>

<tr><td>CST:</td><td style="padding-left:30px"><input type="text" size="30" name="dcst" id="dcst" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; border:1px solid #073c68"/></td></tr>

<tr><td>Tin Number:</td><td style="padding-left:30px"><input type="text" size="30" name="dtin" id="dtin" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; border:1px solid #073c68"/></td></tr>

<tr><td colspan="2" style="padding-left:80px;"><input type="submit" name="fsubmit" id="fsubmit" value="" class="mfsub" />&nbsp;&nbsp;<input type="reset" value="" class="mfclear" /></td></tr>
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
