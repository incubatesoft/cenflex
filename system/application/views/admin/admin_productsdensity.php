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
	
	$('#productsdensityForm').submit(function(e) {

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
		 url: base_url+'admin/admin_modules/productsdensitysubmit',
		data: $('#productsdensityForm').serialize(),
		
		success: function(msg)
		{
			if(msg=='Product Density Registered Successfully.')
{
$( "#productsdensityForm" )[ 0 ].reset();
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


function productchange()
{ 

var product=document.getElementById('pname').options[document.getElementById('pname').selectedIndex].text;
//var semester=document.getElementById('semesters').options[document.getElementById('semesters').selectedIndex].text;

//alert(product);
xmlHttp=GetXmlHttpObject();
if (xmlHttp==null)
 {
 alert ("Browser does not support HTTP Request");
 return;
 }
var url=base_url+'admin/admin_modules/show_varieties/'+product;
//url=url+"&q="+str;
//alert(url);
//alert(url);
/*url=url+"&sid="+Math.random()*/
xmlHttp.onreadystatechange=stateChanged1;
xmlHttp.open("POST",url,true);
xmlHttp.send(null);
}
function stateChanged1() 
{ 

if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
 { 
 //alert("changed");
 //alert(xmlHttp.responseText);
  var S =document.forms[0].elements['pvariety'];
//alert(S);
while(S.options.length)
 {

S.options[0] = null;
}
document.getElementById("pvariety").options[0]=new Option('Select Variety','Select Variety');
             var valu1=xmlHttp.responseText;
			
			 var product_list1=valu1.split(",");
			// alert(users_list[0]);
			// alert(users_list.length);
			// document.getElementById("semesters").options[i]=new Option(users_list[i],users_list[i]);		
			for(var i=1;i<product_list1.length;i++)
			 {
			// alert(users_list[i]);
			var j=i-1;
               // document.getElementById('selectuser').style.display='';
    	        document.getElementById("pvariety").options[i]=new Option(product_list1[j],product_list1[j]);	
				   //document.getElementById('textuser').style.display='none';	
    	       
				}
    
        
 xmlHttp.responseText="";
 } 
}
function GetXmlHttpObject()
{
var xmlHttp=null;
try
 {
 
 // Firefox, Opera 8.0+, Safari
 xmlHttp=new XMLHttpRequest();
 }
catch (e)
 {
 //Internet Explorer
 try
  {
  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
  }
 catch (e)
  {
  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
 }
return xmlHttp;

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

<tr><td align="right" style="padding-right:100px; padding-top:20px;"><a href=" <?php echo base_url(); ?>index.php/admin/admin_modules/productdensityview"><img src="<?php echo base_url(); ?>images/vvv.gif"  style="border:none"/></a></td></tr>

<tr><td class="success" id=success ></td></tr>
<tr><td>
<form name="productsdensityForm" id="productsdensityForm" action="" method="post">
<fieldset style="border:1px solid #073c68;width:420px;"><legend><b>Product&nbsp;Density&nbsp;Registration</b></legend>
<table  cellpadding="3" cellspacing="1" height="100%">
<tr><td>Product Name:</td><td style="padding-left:30px"><select name="pname" id="pname" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; border:1px solid #073c68 " onchange="productchange()"/>
<option>Select Product</option>
<?php 
$str=mysql_query("select itemname from tbl_itemmaster");
$fc=mysql_num_fields($str);
while($row=mysql_fetch_row($str))
{
for($i=0;$i<$fc;$i++)
{
echo "<option>$row[$i]</option>";
}
}
 ?>
</select> </td></tr>


<tr><td>Product Variety:</td><td style="padding-left:30px"><select name="pvariety" id="pvariety" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; border:1px solid #073c68 " />
<option>Select Variety</option>
<?php 
$str=mysql_query("select itemname from tbl_itemmaster");
$fc=mysql_num_fields($str);
while($row=mysql_fetch_row($str))
{
for($i=0;$i<$fc;$i++)
{
//echo "<option>$row[$i]</option>";
}
}
 ?>
</select> </td></tr>
<tr><td>Density:</td><td style="padding-left:30px"><input type="text" size="30" name="pdensity" id="pdensity" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; border:1px solid #073c68" /></td></tr>

<!--<tr><td>Density:</td><td style="padding-left:30px"><input type="text" size="30" name="pvden" id="pvden" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; border:1px solid #073c68"/></td></tr>-->



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
