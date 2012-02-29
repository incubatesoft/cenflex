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
<link rel="stylesheet" href="<?php echo base_url(); ?>css/styleall.css" type="text/css" />
<?php
}
?>
<script type="text/javascript" src='<?php echo base_url(); ?>js/jquery.js' language="javascript"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>js/application.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo base_url(); ?>js/application2.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.simplemodal.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/init.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.datepick.js"></script>
<link type="text/css" href="<?php echo base_url();?>css/jquery.datepick.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/demo_table.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/demo_page.css" type="text/css" />
<link type="text/css" href="<?php echo  base_url();?>themes/base/ui.all.css" rel="stylesheet" />

<script type="text/javascript">
	$(function() 
	{
	//alert("hi");
		$('#loaddate').datepick({showOn: 'button', buttonImage: '<?php echo  base_url();?>images/calendar.gif', buttonImageOnly: true});
		
		});
		</script>

		
<script language="javascript">
base_url = '<?= base_url();?>index.php/';
$(document).ready(function()
{
	//alert("hi");
	$('#frmLoadingAdvice').submit(function(e) {

		register();
		e.preventDefault();
		
	});
	
});


function register()
{
//alert("hi");
	disablesubmit();
	hideshow('loading',1);
	error(0);
	
	$.ajax({
		type: "POST",
		 url: base_url+'factory/factory_orders/loadingsubmit',
		data: $('#frmLoadingAdvice').serialize(),
		
		success: function(msg)
		{
			alert(msg);
			enablesubmit();
			if(msg=="Loading Advice Finished Successfully.")
			{
				
				window.location.reload();
				success(1,msg);
					window.open(base_url+'factory/factory_orders/packaging_list','_blank');
				
			}
				else
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
function disablesubmit()
	{
		$('#fsubmit').removeClass('mfsub');		
		$('#fsubmit').val('wait...');		
		$('#fsubmit').attr('disabled', 'disabled');
		
	}

	function enablesubmit()
	{
		$('#fsubmit').addClass('mfsub');		
		$('#fsubmit').removeAttr('disabled');		
		
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
<table>
<tr><td style="padding-left:10px;width:270px; padding-top:5px;" valign="top">

<table cellpadding="0" cellspacing="0">

<tr><td class="navhdr"><b>Quick Links</b></td></tr>
<?php
if($row['orderho']=='Yes')
{
echo "<tr><td class='navcontbg1' ><a href=".base_url()."index.php/factory/factory_orders/ho>Orders From H.O</a></td></tr>";
}

if($row['cutting']=='Yes')
{
echo "<tr><td class='navcontbg2' ><a href=".base_url()."index.php/factory/factory_orders/cuttingsection>Cutting Instructions</a></td></tr>";
}
if($row['loading']=='Yes')
{
echo "<tr><td class='navcontbg1' ><a href=".base_url()."index.php/factory/factory_orders/loadingadvice>Loading Advice</a></td></tr>";
}
if($row['package']=='Yes')
{
echo "<tr><td class='navcontbg2' ><a href=".base_url()."index.php/factory/factory_orders/packaginglist>Packaging List</a></td></tr>";
}
?>
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




<table>
<tr><td><br /></td></tr>
<tr><td><br /></td></tr>
<tr><td class="success" id=success ></td><td></td></tr>
<tr><td >


<form name="frmLoadingAdvice" id="frmLoadingAdvice" action="" method="post">
        <label for="filter"><b>Loading Date:</b></label>&nbsp;&nbsp;<?php $timezone = "Asia/Kolkata";
if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);  echo date('d/m/Y'); ?> <!--<input type="text" name="loaddate" value="" id="loaddate" />-->&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for="filter"><b>Vehicle Number:</b></label>
		<select name="vehiclenum" id='vehiclenum'>
		<option>Select Vehicle</option>
		
		<?php
$str=mysql_query("select * from tbl_vehicles");

while($row=mysql_fetch_array($str))
{
echo "<option>".$row['vehiclenum']."</option>";

}
?>
</select>		 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<b>Transporter Name:<input type="text" name="transname" id="transname" /></b>
</td></tr>

<tr>
<td style="padding-top:15px;">


<fieldset style="border:1px solid #073c68"><legend><b>Loading Advice</b></legend>


<table cellpadding="3" style="width:800px; font-size:12px" border="0" id="openTable">
<div id="search" style="float:left; position:absolute;">
        <label for="filter">Filter</label> <input type="text" name="filter" value="" id="filter" />
      </div>
      <div id="search2" align="right">
        <label for="filter">Bundle no</label> <input type="text" name="filter2" value="" id="filter2" />
      </div>
<?php
//echo $vars;
$branches=mysql_query("select distinct(orderto) from tbl_order_master where  orderto!=''");
while($branchesrow=mysql_fetch_array($branches))
{

//if($vars!="H.O"){ //echo "hi";

	echo "<thead><tr><td colspan=9><hr></td></tr>
	<tr><th colspan=8>".$branchesrow['orderto']." Depot Bundles</th></tr>
	<tr><td colspan=9><hr></td></tr>
     <tr style='background-color: #9F1B4A;color:black; font-size:12px; font-weight:normal;border-bottom: 1px solid; border-right: 1px solid;	border-color: #e37e3d; background-image: url(".base_url()."images/red.png); background-repeat: repeat-x;vertical-align:top;'><th>Select</th><th>Bundle Number</th><th>DO Number</th><th>Party Name</th><th>Density</th><th>Variety</th><th>Size</th><th>Bundle Date</th><th>Quantity</th></tr></thead>";


$str=mysql_query("select * from tbl_order_master where orderto='".$branchesrow['orderto']."' ORDER BY id desc");
//echo "select * from tbl_order_master where orderto='".$branchesrow['orderto']."' ORDER BY id desc";
//echo "select * from tbl_order_master where orderto!='' ORDER BY id desc";
//echo "select * from tbl_order_master where   orderto='".$branchesrow['orderto']."' ODER BY id desc";
	
while($row1=mysql_fetch_array($str))
{


$str1=mysql_query("select * from tbl_bundlelist where status='Bundled' and donum='".$row1['donum']."'");
if(mysql_num_rows($str)!=0)
{
//echo "hi";
//echo $row1['donum'];

while($s1=mysql_fetch_array($str1))
{
	//echo "select *from tbl_orders where donum='".$s1['donum']."' and id='".$s1['orderid']."'";
$res=mysql_query("select *from tbl_orders where donum='".$s1['donum']."' and id='".$s1['orderid']."'");
$row=mysql_fetch_array($res);
$size=$row['height']." * ". $row['width']." * ". $row['thickness'];

echo  "<tbody>";
//echo $row['itemname']; 

if($row['itemname']=='Rolls')
$quantity=$s1['meters']." Mtrs";
else if($row['remarks']=='blocks' || $row['remarks']=='Blocks')
{//$quantity=$s1['bundleweight']. " Nos/Kgs";
$quantity= "1 Block";}
else if($row['variety']=='B Grade' || $row['variety']=='C Grade' || $row['variety']=='Skin')
{$quantity=$s1['bundleweight']. " Nos";}
else
{$quantity=$s1['nopieces']. " Nos";}
echo "<tr class=odd><td id='confirm-dialog'><input type=checkbox name=chk".$s1['bundlenumber']."></td><td id='confirm-dialog' class='bundleno' align=center>".$s1['bundlenumber']."</td><td id='confirm-dialog' align=center>".$s1['donum']."</td><td id='confirm-dialog' align=center>".$row1['orderby']."</td><td id='confirm-dialog' align=center>".$row['density']."</td><td id='confirm-dialog' align=center>".$row['variety']."</td><td id='confirm-dialog' align=center>".$size."</td><td id='confirm-dialog' align=center>".$s1['bundledate']."</td><td id='confirm-dialog' align=center>".$quantity."</td></td>";

echo "</tbody>";

}
	}
	}

} 
 

//echo "ho";
	echo  "<thead><tr><td colspan=10><hr></td></tr><tr><th colspan=8>From H.O Bundles</td></tr>
	<tr ><td colspan=10><hr></td></tr>";
	

echo "<tr style='background-color: #9F1B4A;color:black; font-size:12px; font-weight:normal;border-bottom: 1px solid; border-right: 1px solid;	border-color: #e37e3d; background-image: url(".base_url()."images/red.png); background-repeat: repeat-x;vertical-align:top;'><th>Select</th><th>Bundle Number</th><th>DO Number</th><th>Party Name</th><th>Density</th><th>Variety</th><th>Size</th><th>Bundle Date</th><th>Quantity</th></tr></thead>";
	
	$parties=mysql_query("select distinct(orderby) from tbl_order_master where orderto=''");
	//echo "select distinct(orderby) from tbl_order_master where orderto=''";
	while($partiesrow=mysql_fetch_array($parties))
	{
		
		$str=mysql_query("select * from tbl_order_master where  orderby='".$partiesrow['orderby']."' and orderto='' ORDER BY id desc");
		//echo "select * from tbl_order_master where  orderby='".$partiesrow['orderby']."' ORDER BY id desc";
		//echo "select * from tbl_order_master where status!='Dispatched' and orderby='".$partiesrow['orderby']."' ORDER BY id desc";

		while($row1=mysql_fetch_array($str))
{


$str1=mysql_query("select * from tbl_bundlelist where status='Bundled' and donum='".$row1['donum']."' ORDER BY bundledate");
//echo "select * from tbl_bundlelist where status='Bundled' and donum='".$row1['donum']."' ORDER BY bundledate";

if(mysql_num_rows($str1)!=0)
{
	




echo  "<tr ><td colspan=13 style='border-top:1px solid'></td></tr>";
while($s1=mysql_fetch_array($str1))
{
	//echo "select *from tbl_orders where donum='".$s1['donum']."' and id='".$s1['orderid']."'";
$res=mysql_query("select *from tbl_orders where donum='".$s1['donum']."' and id='".$s1['orderid']."'");
$row=mysql_fetch_array($res);
$size=$row['height']." * ". $row['width']." * ". $row['thickness'];

echo  "<tbody >";

if($row['itemname']=='Rolls')
$quantity=$s1['meters']." Mtrs";
else if($row['remarks']=='blocks' || $row['remarks']=='Blocks')
{//$quantity=$s1['bundleweight']. " Nos/Kgs";
$quantity="1 Block";}
else if($row['variety']=='B Grade' || $row['variety']=='C Grade' || $row['variety']=='Skin')
{$quantity=$s1['bundleweight']. " Nos";}
else
$quantity=$s1['nopieces']. " Nos";
echo "<tr class=odd><td id='confirm-dialog' ><input type=checkbox name=chk".$s1['bundlenumber']."></td><td id='confirm-dialog' class='bundleno' align=center>".$s1['bundlenumber']."</td><td id='confirm-dialog' align=center>".$s1['donum']."</td><td id='confirm-dialog' align=center>".$row1['orderby']."</td><td id='confirm-dialog' align=center>".$row['density']."</td><td id='confirm-dialog' align=center>".$row['variety']."</td><td id='confirm-dialog' align=center>".$size."</td><td id='confirm-dialog' align=center>".$s1['bundledate']."</td><td id='confirm-dialog' align=center>".$quantity."</td></tr>";

echo "</tbody>";

}
	}}
}



?>

</table>
</fieldset>

<div style="padding-top:20px; padding-left:350px;">
<input type="submit" name="fsubmit" id="fsubmit" value="" class="mfsub" /></div>
</td></tr></table></td></tr>

<tr><td colspan="2"><br /></td></tr>
<tr><td colspan="2" style="background-color:#ffdc90; height:25px; padding-top:10px;"></td></tr>

</table>
