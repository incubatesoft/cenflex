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





</td></tr></table>

</td></tr>

<tr><td colspan="2"><br /></td></tr>
<tr><td colspan="2" style="background-color:#ffdc90; height:25px; padding-top:10px;"></td></tr>

</table>



</body>
</html>

