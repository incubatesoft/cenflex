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
<script type="text/javascript" src='<?php echo base_url(); ?>js/jquery.js' language="javascript"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.simplemodal.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/init.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.datepick.js"></script>
<link type="text/css" href="<?php echo base_url();?>css/jquery.datepick.css" rel="stylesheet" />

<link type="text/css" href="<?php echo  base_url();?>themes/base/ui.all.css" rel="stylesheet" />


<script type="text/javascript">
	$(function() 
	{
	//alert("hi");
		$('#odate').datepick({showOn: 'button', buttonImage: '<?php echo  base_url();?>images/calendar.gif', buttonImageOnly: true});
		$('#podate').datepick({showOn: 'button', buttonImage: '<?php echo  base_url();?>images/calendar.gif', buttonImageOnly: true});
		
		$('#dispatchdate').datepick({showOn: 'button', buttonImage: '<?php echo  base_url();?>images/calendar.gif', buttonImageOnly: true});
		
		});
		</script>
		
		
<script language="javascript">
base_url = '<?= base_url();?>index.php/';
$(document).ready(function(){
	
	$('#orderForm').submit(function(e) {

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
		 url: base_url+'admin/admin_orders/ordersubmit',
		data: $('#orderForm').serialize(),
		
		success: function(msg)
		{
			
			
				//alert(msg.txt);
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

var xmlHttp
function getrows(str)
{ 

//alert('hi');
//alert(str);
num=document.getElementById('txt'+str).value;
num1=str+':'+num;
//alert(num);
rows=str;

//var val=(frmDemo.users.selectedIndex);
//alert(users);
xmlHttp=GetXmlHttpObject();
if (xmlHttp==null)
 {
 alert ("Browser does not support HTTP Request");
 return;
 }
var url=base_url+'admin/admin_orders/numberadd/'+num1;
//url=url+"&q="+str;
//alert(url);
//alert(url);
/*url=url+"&sid="+Math.random()*/
xmlHttp.onreadystatechange=stateChanged;
xmlHttp.open("POST",url,true);
xmlHttp.send(null);
}
function stateChanged() 
{ 
//alert(str);
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
 { 
 //alert(num1);
 //alert(document.getElementById('txt_'+str).value);
 //alert(xmlHttp.responseText);
 //alert(str);
			// alert(users_list[i]);
    	        document.getElementById(rows).innerHTML=xmlHttp.responseText;		
    	    
          
          // alert(xmlHttp.responseText);

 //document.getElementById("txtValue").value=xmlHttp.responseText ;
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


function showusers()
{ 

var customer=document.getElementById('customertype').options[document.getElementById('customertype').selectedIndex].text;
//var semester=document.getElementById('semesters').options[document.getElementById('semesters').selectedIndex].text;
var value=customer;
//alert(value);
xmlHttp=GetXmlHttpObject();
if (xmlHttp==null)
 {
 alert ("Browser does not support HTTP Request");
 return;
 }
var url=base_url+'admin/admin_orders/show_users/'+value;;
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
  var S =document.forms[0].elements['orderfrom'];
//alert(S);
while(S.options.length)
 {

S.options[0] = null;
}
document.getElementById("orderfrom").options[0]=new Option('Select User','Select User');
             var valu1=xmlHttp.responseText;
			//alert(valu1);
           if(valu1=='Other')
		   {
		   //alert('hi');
		   document.getElementById('textuser').style.display='';
		   document.getElementById('selectuser').style.display='none';
		   }
			else
			{
			 var users_list1=valu1.split(",");
			// alert(users_list[0]);
			// alert(users_list.length);
			// document.getElementById("semesters").options[i]=new Option(users_list[i],users_list[i]);		
			for(var i=1;i<users_list1.length;i++)
			 {
			// alert(users_list[i]);
			var j=i-1;
                document.getElementById('selectuser').style.display='';
    	        document.getElementById("orderfrom").options[i]=new Option(users_list1[j],users_list1[j]);	
				   document.getElementById('textuser').style.display='none';	
    	        }
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


function showpriority()
{
	
	if(document.getElementById('proirity').selectedIndex==3)
	    document.getElementById('reqdate').style.display='';
		else
		 document.getElementById('reqdate').style.display='none';
}

</script>
</head>

<body >
<div class="main">
<div class="header"  ><img src="<?php echo base_url(); ?>images/newmalani.gif" style="padding-top:0px;" /></div>

<div class="mainnav">
<table style="margin-top:-2px;">
<tr >
<td  align="center" class="mainnavlink"  ><a href='<?php echo base_url(); ?>index.php/admin/admin_home'  >Admin Registration</a></td>
<td align="center" class="mainnavlink" ><a href='<?php echo base_url(); ?>index.php/admin/admin_orders'  >Order Management</a></td>
<td align="center" class="mainnavlink" ><a href="<?php echo base_url(); ?>index.php/admin/admin_reports"  >Reports</a></td>
<td align="center" class="mainnavlink" ><a href='<?php echo base_url(); ?>index.php/login/logout'  >Logout</a></td>
</tr></table>
</div><!-- main nav closed-->
<div class="middle">
<div class="leftnav">
<table cellpadding="0" cellspacing="0">
<tr><td class="navhdr"><b>Quick Links</b></td></tr>
<tr><td class="navcontbg1" ><a href=" <?php echo base_url(); ?>index.php/admin/admin_orders">Create Orders</a></td></tr>
<tr><td class="navcontbg2" ><a href=" <?php echo base_url(); ?>index.php/admin/admin_orders/sendtofactory">Sending Orders</a></td></tr>

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
</table>
<div style="height:150px;"></div>

</div>
<div class="rightpane" align="justify" style=" margin-left:20px; width:520px; padding-bottom:40px;" >

<div style="height:100%">

<div id="success"  class="success">&nbsp;
</div>
<form name="orderForm" id="orderForm" action="" method="post">
<fieldset style="border:1px solid #073c68;witdh:500px; height:100%"><legend><b>Order&nbsp;Creation</b></legend>
<table  cellpadding="3" cellspacing="1" width="550" height="100%" border=0>
<tr><td>
<table width="70%">
<tr><td nowrap="nowrap">DO Number:</td><td style="padding-left:30px" colspan=5><input type="text" size="30" name="orderno" id="orderno" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; " /></td></tr>

<tr><td>Order Date:</td><td style="padding-left:30px" colspan=5><input type="text" size="26" name="odate" id="odate" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; " /></td></tr>
<tr><td>Customer Type:</td>

<td style="padding-left:30px;" colspan=5><select name="customertype" id=customertype onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF;width:190px;" onchange="showusers()">
<option>Select Type</option>
<option>Wholesaler</option>
<option>Branch</option>
<option>Others</option>
</select>
</td></tr>
<tr><td colspan=6>
<div name="selectuser" id="selectuser" style="display:none;">
<table border=0 width=100%><tr><td colspan="2" nowrap="nowrap">Order From:</td><td style="padding-left:110px"><select name="orderfrom" id=orderfrom onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF;width:190px;" onchange="selectuser()">
<option>Select User</option>
</select></td></tr></table>
</div></td></tr>
<tr><td colspan=6>
<div name="textuser" id="textuser" style="display:none;">
<table width=100%><tr><td colspan="2" nowrap="nowrap">Order From:</td><td style="padding-left:110px"><input type="text" name="txtorderfrom" id="txtorderfrom" style="width:180px;" />
</td></tr></table>
</div></td></tr>

<tr><td>Order Type:</td>

<td style="padding-left:30px;" colspan=5><select name="ordertype" id=ordertype onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF;width:190px;" >
<option>Select Type</option>
<option>Verbal</option>
<option>Fax</option>
<option>Mail</option>
<option>D.O</option>
</select>
</td></tr>

<tr><td>P.O Number:</td><td style="padding-left:30px" colspan=5><input type="text" size="26" name="ponum" id="ponum" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; " /></td></tr>


<tr><td>P.O Date:</td><td style="padding-left:30px" colspan=5><input type="text" size="26" name="podate" id="podate" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; " /></td></tr>

<tr><td><b>Sheets</b></td><td style='padding-left:30px' colspan=5><input type='text' size='20' name='txtsheets' id='txtsheets' onblur=getrows('sheets');></td></tr>


<tr><td colspan="6"><div id=sheets></div></td></tr>
 
<tr><td><b>Cushions</b></td><td style='padding-left:30px' colspan=5><input type='text' size='20' name='txtcushions' id='txtcushions' onblur=getrows('cushions');></td></tr>
<tr><td colspan=6><table width=100%>

</table></td></tr>

<tr><td id="cushions" name="cushions" colspan=6></td></tr>






<tr><td>Reqd Dispatched Time:</td><td style="padding-left:30px" colspan=5><select name="proirity" id=proirity onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF;" onchange="showpriority()">

<option>Select Proirity</option>
<option>Immediate (Within 3 days)</option>
<option>Normal (Within 7 days)</option>
<option>Specify Date</option>
</select>
</td></tr>

<tr><td colspan=6>
<div name="reqdate" id="reqdate" style="display:none;">
<table width=100%><tr><td colspan="2" nowrap="nowrap">Specify Date:</td><td style="padding-left:100px"><input type="text" name="dispatchdate" id="dispatchdate" style="width:160px;" />
</td></tr></table>
</div></td></tr>

<tr><td nowrap="nowrap">Remarks:</td><td style="padding-left:30px" colspan=5><textarea name="remarks" id=remarks></textarea></td></tr>

<tr><td><b>Authorised By</b></td></tr>

<tr><td nowrap="nowrap">Name:</td><td style="padding-left:30px" colspan=5><input type="text" name="oname" id="oname" />
</td></tr>
<tr><td nowrap="nowrap">Designation:</td><td style="padding-left:30px" colspan=5><input type="text" name="odesignation" id="odesignation" />
</td></tr>

<tr><td colspan="5" style="padding-left:50px;"><input type="submit" name="fsubmit" id="fsubmit" value="" class="mfsub" />&nbsp;&nbsp;<input type="reset" value="" class="mfclear" /></td></tr>
</table></td></tr>
</table>

</fieldset>
</form>

</div>
</div><!--rightpane div closed-->


</div><!--middle div closed-->

<div class="futr">
</div>



</div><!--main div closed-->


</body>
</html>
