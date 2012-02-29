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
	
	$('#productsdensityForm').submit(function(e) {
	//alert(e);

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
		 url: base_url+'admin/admin_modules/productsdensityupdate',
		data: $('#productsdensityForm').serialize(),
		
		success: function(msg)
		{
		//alert(msg);	
		if(msg=="Product density Updated Successfully.")
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
</script>
</head>

<body >

<div style="overflow:auto;width:440px;height:330px;">
<div class=editpane align="justify" >

<?php
$res_var=mysql_query("select *from item_densities where id=".$vars);
$row_var=mysql_fetch_array($res_var);
?>


<div id="success"  class="success">&nbsp;
</div>
<form name="productsdensityForm" id="productsdensityForm" action="" method="post">
<fieldset style="border:1px solid #073c68"><legend><b>Product&nbsp;Densities&nbsp;Registration</b></legend>
<table  cellpadding="3" cellspacing="1" height="100%">
<tr><td>Product Name:</td><td style="  padding-left:30px;" ><?php echo $row_var['itemname'] ?></td></tr>
<tr><td>Product Variety:</td><td style="padding-left:30px;"><?php echo $row_var['variety']?></td></tr>
<tr><td>Product Density:</td><td style="padding-left:30px"><input type="text" size="30" name="pvname" id="pvname" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; border:1px solid #073c68" value="<?php echo $row_var['density']?>"></td></tr>






<tr><td></td><td><input type="submit" name="fsubmit" id="fsubmit" value=""  class="mfedit">
<input type="hidden" name="vid" id=vid value="<?php echo $vars; ?>" >
</td></tr>

</table></fieldset></form>

</div><!--rightpane div closed-->

</div>
</body>
</html>
