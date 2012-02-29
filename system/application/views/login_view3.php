<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-us" lang="en-us">
<head>
<title>Shree Malani Foams Login</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link type='text/css' href='<?php echo base_url(); ?>css/stylesheet.css' rel='stylesheet' media='screen' />
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.min.js"></script>
<script type="text/javascript" src='<?php echo base_url(); ?>js/jquery.js' language="javascript"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.simplemodal.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/init.js"></script>
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
<script language="javascript">
base_url = '<?= base_url();?>index.php/';
$(document).ready(function(){
	
	$('#login').submit(function(e) {

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
		 url: '<?php echo base_url(); ?>index.php/login/check',
		data: $('#login').serialize(),
		
		success: function(msg)
		{
			
			//alert(msg);
			if(msg=='adminyes')
{
document.location='<?php echo base_url(); ?>index.php/login/view';
}

if(msg=='factoryyes')
{
 document.location='<?php echo base_url(); ?>index.php/login/factoryview';
}

if(msg=='branchyes')
{
 document.location='<?php echo base_url(); ?>index.php/login/branchview';
}

else

{
				success(1,msg);
				
			
			hideshow('loading',0);
}
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

<style type="text/css">


</style>
</head>
<body marginwidth="0" marginheight="0" bgcolor="#fff6ed" topmargin="0" leftmargin="0" rightmargin="0">
<div style="height:106px;  background-color:#f7bd7d; background-image:url(<?php echo base_url(); ?>images/newmalanihbg.gif); background-repeat:repeat-x; border:0px;"> <div style="padding-top:0px; padding-left:10px;"><img src="<?php echo base_url(); ?>images/newmalani.gif" /></div></div>

<div style="border: solid 0px; width:400px; height:350px; margin:auto; margin-top:70px; background-image:url(<?php echo base_url(); ?>images/lgbg2.gif); background-repeat:no-repeat; padding-left:60px; padding-top:60px;">
<table border="0" cellpadding="0" cellspacing="0">


<form id="login" name="login" action="" method="post">


<div id="success"  class="success">&nbsp;</div>
<tr><td colspan="3" style="padding-top:0px; padding-left:60px;"><img src="<?php echo base_url(); ?>images/loghd.gif" /></td></tr>

<tr><td colspan="3" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#041f41;" align="left">Username</td></tr>
<tr><td colspan="3"><input type="text" size="40" name="user_name" id="user_name" /></td></tr>
<tr><td style="height:10px;"></td></tr>
<tr><td colspan="3" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#041f41;" align="left">Password</td></tr>
<tr><td colspan="3"><input type="password" size="40" name="password" id="password" /></td></tr>
<tr><td style="height:10px;"></td></tr>
<tr><td style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#041f41;">Login as&nbsp;&nbsp;&nbsp;<select style="width:90px;" name="role" id="role"><option>Admin</option><option>Factory</option><option>Branch</option></select></td><td><input type="submit"  value="" name="butsub" id="butsub" style="background:url(<?php echo base_url(); ?>images/login.gif); width:91px; height:24px; border:none" /></td></tr>
<tr><td style="height:20px; padding-left:30px; padding-top:0px;" colspan=2><span id="msgbox" style="display:none"></span></td></tr>


</form>




</table>
</div>
</body>
</html>