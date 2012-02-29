<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<LINK REL="SHORTCUT ICON" HREF="<?php echo base_url(); ?>images/malinilogo.png">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
	
	$('#userForm').submit(function(e) {

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
		 url: base_url+'factory/factory_users/usersubmit',
		data: $('#userForm').serialize(),
		
		success: function(msg)
		{
			
			if(msg=='User Registered Successfully.')
{
$( "#userForm" )[ 0 ].reset();
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

function showsub()
{
	//alert(document.getElementById('order').checked);
if(document.getElementById('order').checked==true)
{
document.getElementById('submod').style.display='';	
}
else
{
document.getElementById('submod').style.display='none';		
}

}

function showsub1()
{
	//alert(document.getElementById('order').checked);
if(document.getElementById('usermodule').checked==true)
{
document.getElementById('submod1').style.display='';	
}
else
{
document.getElementById('submod1').style.display='none';		
}

}
</script>
</head>


<body marginwidth="0" marginheight="0" bgcolor="#e9f1fb" topmargin="0" leftmargin="0" rightmargin="0">


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


<tr><td colspan="2">
<table width=100% border="0">
<tr><td style="padding-left:10px;padding-top:5px;width:350px;" valign="top">
<table cellpadding="0" cellspacing="0">
<tr><td class="navhdr"><b>Creation</b></td></tr>
<?php
 if($row['ucreation']=='Yes')
 {
echo "<tr><td class='navcontbg1' ><a href=".base_url()."index.php/factory/factory_users/usercreation>User Creation</a></td></tr>";
}
?>

<?php
 if($row['vcreation']=='Yes')
 {
echo "<tr><td class='navcontbg2' ><a href=".base_url()."index.php/factory/factory_users/vehicle>Vehicle Creation</a></td></tr>";
}
?>

<?php
 if($row['ocreation']=='Yes')
 {
echo "<tr><td class='navcontbg1' ><a href=".base_url()."index.php/factory/factory_users/ordercreate>Order Creation</a></td></tr>";
}
else
{
echo "<tr><td class=navcontbg1 ></td></tr>";	
}
?>

<tr><td class="navcontbg2" ></td></tr>
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

<tr><td align="right" style="padding-right:100px; padding-top:20px;"><a href=" <?php echo base_url(); ?>index.php/factory/factory_users/userview"><img src="<?php echo base_url(); ?>images/vvv.gif"  style="border:none"/></a></td></tr>

<tr><td class="success" id=success ></td></tr>
<tr><td>
<form name="userForm" id="userForm" action="" method="post">
<fieldset style="border:1px solid #073c68;width:420px;"><legend><b>User&nbsp;Registration</b></legend>
<table  cellpadding="3" cellspacing="1" height="100%">


<tr><td>Name:</td><td style="padding-left:30px"><input type="text" size="30" name="bcname" id="bcname" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; border:1px solid #073c68"/></td></tr>

<tr><td>Mobile:</td><td style="padding-left:30px"><input type="text" size="30" name="bmobile" id="bmobile" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; border:1px solid #073c68"/></td></tr>

<tr><td>Street1:</td><td style="padding-left:30px"><input type="text" size="30" name="bstreet1" id="bstreet1" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; border:1px solid #073c68"/></td></tr>

<tr><td>Street2:</td><td style="padding-left:30px"><input type="text" size="30" name="bstreet2" id="bstreet2" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; border:1px solid #073c68"/></td></tr>

<tr><td>Town/City:</td><td style="padding-left:30px"><input type="text" size="30" name="bcity" id="bcity" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; border:1px solid #073c68"/></td></tr>

<tr><td>State:</td><td style="padding-left:30px"><input type="text" size="30" name="bstate" id="bstate" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; border:1px solid #073c68"/></td></tr>

<tr><td>Pincode:</td><td style="padding-left:30px"><input type="text" size="30" name="bpincode" id="bpincode" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; border:1px solid #073c68"/></td></tr>

<tr><td>Module Allocation:</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="usermodule" id=usermodule onclick="showsub1()"/>Creation&nbsp;&nbsp;<input type="checkbox" name="order" id=order onclick="showsub()">Order Management</td></tr>


<tr><td colspan=4 align="right">
<div name=submod1 id=submod1 style="display:none;">
<table>
<tr><td colspn=4><input type="checkbox" name="userc" id=userc />User Creation&nbsp;&nbsp;<input type="checkbox" name="vehiclec" id=vehiclec />Vehicle Creation&nbsp;&nbsp;</td></tr>
<tr><td colspan="4">
<input type="checkbox" name="orderc" id=orderc />Order Creation&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr></table>
</div></td></tr>

<tr><td colspan=4 align="right" style=" padding-left:110px;">
<div name=submod id=submod style="display:none;">
<table>
<tr><td colspn=4><input type="checkbox" name="orderh" id=orderh />Orders From H.O&nbsp;&nbsp;<input type="checkbox" name="cutting" id=cutting />Cutting Instructions&nbsp;&nbsp;</td></tr>
<tr><td colspan="4">
<input type="checkbox" name="loading" id=loading />Loading Advice&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="package" id=package />Packaging List&nbsp;&nbsp;</td></tr></table>
</div></td></tr>


<tr><td>Username:</td><td style="padding-left:30px"><input type="text" size="30" name="buser" id="buser" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; border:1px solid #073c68"/></td></tr>

<tr><td>Password:</td><td style="padding-left:30px"><input type="password" size="30" name="bpass" id="bpass" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; border:1px solid #073c68"/></td></tr>

<tr><td>Confirm Password:</td><td style="padding-left:30px"><input type="password" size="30" name="bcpass" id="bcpass" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; border:1px solid #073c68"/></td></tr>

<tr><td colspan="2" style="padding-left:80px;"><input type="submit" name="fsubmit" id="fsubmit" value="" class="mfsub" />&nbsp;&nbsp;<input type="reset" value="" class="mfclear" /></td></tr>
</table>
</fieldset>
</form>

</td></tr></table></td></tr></table>

</td></tr>

<tr><td colspan="2"><br /></td></tr>
<tr><td colspan="2" style="background-color:#ffdc90; height:25px; padding-top:10px;"></td></tr>

</table>



</body>
</html>

