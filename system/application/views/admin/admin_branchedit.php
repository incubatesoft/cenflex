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
	
	$('#branchForm').submit(function(e) {

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
		 url: base_url+'admin/admin_modules/branchupdate',
		data: $('#branchForm').serialize(),
		
		success: function(msg)
		{
		//alert(msg);	
		if(msg=="Branch Updated Successfully.")
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

<div style="overflow:auto;width:440px;height:330px;">
<div class=editpane align="justify" >

<?php
$res=mysql_query("select *from tbl_branches where id=".$vars);
$row=mysql_fetch_array($res);
?>


<div id="success"  class="success">&nbsp;
</div>
<div id="error"  class="error">&nbsp;
</div>
<form name="branchForm" id="branchForm" action="" method="post">
<fieldset style="border:1px solid #073c68"><legend><b>Branch&nbsp;Registration</b></legend>
<table  cellpadding="3" cellspacing="1" height="100%">
<tr><td>Branch Code:</td><td style="padding-left:30px"><input type="text" size="30" name="bcode" id="bcode" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; border:1px solid #073c68" value="<?php echo $row['branchcode'] ?>" disabled="disabled"></td></tr>

<tr><td>Branch/Firm Name:</td><td style="padding-left:30px"><input type="text" size="30" name="bname" id="bname" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; border:1px solid #073c68 " value="<?php echo $row['branchname'] ?>" disabled="disabled"></td></tr>

<tr><td>Contact Name:</td><td style="padding-left:30px"><input type="text" size="30" name="bcname" id="bcname" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; border:1px solid #073c68" value="<?php echo $row['name'] ?>" ></td></tr>

<tr><td>Mobile:</td><td style="padding-left:30px"><input type="text" size="30" name="bmobile" id="bmobile" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; border:1px solid #073c68" value="<?php echo $row['mobile'] ?>" ></td></tr>

<tr><td>Landline Phone:</td><td style="padding-left:30px"><input type="text" size="30" name="bphone" id="bphone" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; border:1px solid #073c68" value="<?php echo $row['phone'] ?>" ></td></tr>

<tr><td>Street1:</td><td style="padding-left:30px"><input type="text" size="30" name="bstreet1" id="bstreet1" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; border:1px solid #073c68" value="<?php echo $row['street1'] ?>" ></td></tr>

<tr><td>Street2:</td><td style="padding-left:30px"><input type="text" size="30" name="bstreet2" id="bstreet2" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; border:1px solid #073c68" value="<?php echo $row['street2'] ?>" ></td></tr>

<tr><td>Town/City:</td><td style="padding-left:30px"><input type="text" size="30" name="bcity" id="bcity" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; border:1px solid #073c68" value="<?php echo $row['city'] ?>" ></td></tr>

<tr><td>State:</td><td style="padding-left:30px"><input type="text" size="30" name="bstate" id="bstate" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; border:1px solid #073c68" value="<?php echo $row['state'] ?>" ></td></tr>

<tr><td>Pincode:</td><td style="padding-left:30px"><input type="text" size="30" name="bpincode" id="bpincode" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; border:1px solid #073c68" value="<?php echo $row['pincode'] ?>" ></td></tr>

<tr><td>Username:</td><td style="padding-left:30px"><input type="text" size="30" name="busername" id="busername" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; border:1px solid #073c68" value="<?php echo $row['username'] ?>" ></td></tr>

<tr><td>Password:</td><td style="padding-left:30px"><input type="text" size="30" name="bpassword" id="bpassword" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; border:1px solid #073c68" value="<?php echo $row['password'] ?>" ></td></tr>

<tr><td>Tin Number:</td><td style="padding-left:30px"><input type="text" size="30" name="btin" id="btin" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; border:1px solid #073c68" value="<?php echo $row['tinnumber'] ?>" ></td></tr>

<tr><td>ECC:</td><td style="padding-left:30px"><input type="text" size="30" name="becc" id="becc" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; border:1px solid #073c68" value="<?php echo $row['ecc'] ?>" ></td></tr>

<tr><td>CST:</td><td style="padding-left:30px"><input type="text" size="30" name="bcst" id="bcst" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; border:1px solid #073c68" value="<?php echo $row['cst'] ?>" ></td></tr>

<tr><td></td><td><input type="submit" name="fsubmit" id="fsubmit" value=""  class="mfedit">
<input type="hidden" name="bid" id=bid value="<?php echo $vars; ?>" >
</td></tr>

</table>
</fieldset>
</form>


</div><!--rightpane div closed-->

</div>
</body>
</html>
