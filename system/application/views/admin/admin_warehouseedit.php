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
base_url = '<?= base_url();?>index.php/';
$(document).ready(function(){
	
	$('#whrfrm').submit(function(e) {

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
		 url: base_url+'admin/admin_modules/warehouseupdate',
		data: $('#whrfrm').serialize(),
		
		success: function(msg)
		{
			
		if(msg=="Warehouse Updated Successfully.")
				{
				//alert(msg.txt);
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
</script>
</head>

<body >

<div style="overflow:auto;width:420px;height:330px;">
<div class=editpane align="justify" >

<?php
$res=mysql_query("select *from tbl_factory_master where id=".$vars);
$row=mysql_fetch_array($res);
?>


<div id="success"  class="success">&nbsp;
</div>
<form name="whfrm" id="whrfrm" action="" method="post">
<fieldset style="border:1px solid #073c68"><legend><b>Warehouse Details</b></legend>
<table  cellpadding="3" cellspacing="1" height="100%">
<tr><td>Factory Code:</td><td style="padding-left:30px"><input type="text" size="30" name="fcode" id="fcode" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; " value="<?php echo $row['factorycode'] ?>"></td></tr>
<tr><td>Contact Name:</td><td style="padding-left:30px"><input type="text" size="30" name="fcname" id="fcname" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF;" value="<?php echo $row['contactname'] ?>"></td></tr>
<tr><td>Mobile:</td><td style="padding-left:30px"><input type="text" size="30" name="fmobile" id="fmobile" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF;" value="<?php echo $row['mobile'] ?>"></td></tr>
<tr><td>Factory Phone:</td><td style="padding-left:30px"><input type="text" size="30" name="fphone" id="fphone" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF;" value="<?php echo $row['factoryphone'] ?>"></td></tr>
<tr><td>Street1:</td><td style="padding-left:30px"><input type="text" size="30" name="fstreet1" id="fstreet1" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF;" value="<?php echo $row['street1'] ?>"></td></tr>
<tr><td>Street2:</td><td style="padding-left:30px"><input type="text" size="30" name="fstreet2" id="fstreet2" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF;" value="<?php echo $row['street2'] ?>"></td></tr>
<tr><td>Town/City:</td><td style="padding-left:30px"><input type="text" size="30" name="fcity" id="fcity" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF;" value="<?php echo $row['city'] ?>"></td></tr>
<tr><td>State:</td><td style="padding-left:30px"><input type="text" size="30" name="fstate" id="fstate" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF;" value="<?php echo $row['state'] ?>"></td></tr>
<tr><td>Username:</td><td style="padding-left:30px"><input type="text" size="30" name="fuser" id="fuser" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF;" value="<?php echo $row['username'] ?>"></td></tr>
<tr><td>Password:</td><td style="padding-left:30px"><input type="text" size="30" name="fpass" id="fpass" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF;" value="<?php echo $row['password'] ?>"></td></tr>
<tr><td>Pincode:</td><td style="padding-left:30px"><input type="text" size="30" name="fpincode" id="fpincode" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF;" value="<?php echo $row['pincode'] ?>"></td></tr>

<tr><td>Tin Number:</td><td style="padding-left:30px"><input type="text" size="30" name="ftin" id="ftin" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF;" value="<?php echo $row['tinnumber'] ?>"></td></tr>
<tr><td></td><td><input type="submit" name="fsubmit" id="fsubmit" value=""  class="mfedit">
<input type="hidden" name="wid" id=wid value="<?php echo $vars; ?>" >
</td></tr>

</table>
</fieldset>
</form>


</div><!--rightpane div closed-->

</div>
</body>
</html>
