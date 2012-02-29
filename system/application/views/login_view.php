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
<script language="javascript">
alert

$(document).ready(function()
{
//alert('hi');
	$("#login").submit(function()
	{
	//alert('hello');
		//remove all the class add the messagebox classes and start fading
		$("#msgbox").removeClass().addClass('messagebox').text('Validating....').fadeIn(1000);
		//check the username exists or not from ajax
		
		$.post("<?php echo base_url(); ?>index.php/login/check",{ user_name:$("#user_name").val(),password:$("#password").val(),role:$("#role option:selected").text(),rand:Math.random() } ,function(data)
        {
		//alert(data);
		  if(data=='adminyes') //if correct login detail
		  {
		// alert("hi");
		  	$("#msgbox").fadeTo(200,0.1,function()  //start fading the messagebox
			{ 
			  //add message and change the class of the box and start fading
			  $(this).html('Logging in.....').addClass('messageboxok').fadeTo(900,1,
              function()
			  { 
			  	 //redirect to secure page
				 document.location='<?php echo base_url(); ?>index.php/login/view';
			  });
			  
			});
		  }
		  else
		   if(data=='branchyes') //if correct login detail
		  {
		// alert("hi");
		  	$("#msgbox").fadeTo(200,0.1,function()  //start fading the messagebox
			{ 
			  //add message and change the class of the box and start fading
			  $(this).html('Logging in.....').addClass('messageboxok').fadeTo(900,1,
              function()
			  { 
			  	  //redirect to secure page
				 document.location='<?php echo base_url(); ?>index.php/login/branchview';
			  });
			  
			});
		  }
		  
		  else
		   if(data=='factoryyes') //if correct login detail
		  {
		// alert("hi");
		  	$("#msgbox").fadeTo(200,0.1,function()  //start fading the messagebox
			{ 
			  //add message and change the class of the box and start fading
			  $(this).html('Logging in.....').addClass('messageboxok').fadeTo(900,1,
              function()
			  { 
			  	 //redirect to secure page
				 document.location='<?php echo base_url(); ?>index.php/login/factoryview';
			  });
			  
			});
		  }
		  else 
		  {
		  	$("#msgbox").fadeTo(200,0.1,function() //start fading the messagebox
			{ 
			  //add message and change the class of the box and start fading
			  $(this).html('Your login details failed...').addClass('messageboxerror').fadeTo(900,1);
			});		
          }
				
        });
 		return false; //not to post the  form physically
	});
	//now call the ajax also focus move from 
	$("#password").blur(function()
	{
		$("#login_form").trigger('submit');
	});
});
</script>

<style type="text/css">


</style>
</head>
<body marginwidth="0" marginheight="0" bgcolor="#fff6ed" topmargin="0" leftmargin="0" rightmargin="0">
<div style="height:106px;  background-color:#f7bd7d; background-image:url(<?php echo base_url(); ?>images/newmalanihbg.gif); background-repeat:repeat-x; border:0px;"> <div style="padding-top:0px; padding-left:10px;"><img src="<?php echo base_url(); ?>images/newmalani.gif" /></div></div>
<div style="border: solid 0px; width:400px; height:350px; margin:auto; margin-top:70px; background-image:url(<?php echo base_url(); ?>images/lgbg2.gif); background-repeat:no-repeat; padding-left:60px; padding-top:60px;">
<table border="0" cellpadding="0" cellspacing="0">


<form id="login">



<tr><td colspan="3" style="padding-top:0px; padding-left:60px;"><img src="<?php echo base_url(); ?>images/loghd.gif" /></td></tr>

<tr><td colspan="3" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#041f41;" align="left">Username</td></tr>
<tr><td colspan="3"><input type="text" size="30" name="user_name" id="user_name" /></td></tr>
<tr><td style="height:10px;"></td></tr>
<tr><td colspan="3" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#041f41;" align="left">Password</td></tr>
<tr><td colspan="3"><input type="password" size="30" name="password" id="password" /></td></tr>
<tr><td style="height:10px;"></td></tr>
<tr><td style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#041f41;">Login as&nbsp;&nbsp;&nbsp;<select style="width:90px;" name="role" id="role"><option>Admin</option><option>Factory</option><option>Branch</option></select></td><td><input type="submit"  value="" name="butsub" id="butsub" style="background:url(<?php echo base_url(); ?>images/login.gif); width:91px; height:24px; border:none" /></td></tr>
<tr><td style="height:20px; padding-left:30px; padding-top:0px;" colspan=2><span id="msgbox" style="display:none"></span></td></tr>

</form>




</table>
</div>
</body>
</html>
