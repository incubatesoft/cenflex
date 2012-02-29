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

<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.min.js"></script>
<script type="text/javascript" src='<?php echo base_url(); ?>js/jquery.js' language="javascript"></script>
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
		 url: base_url+'admin/admin_modules/warehousesubmit',
		data: $('#whrfrm').serialize(),
		
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
</script>
</head>

<body >
<div class="main">
<div class="header"  >
<img src="<?php echo base_url(); ?>images/newmalani.gif" style="padding-top:0px;" />
</div>

<div class="mainnav">
<table style="margin-top:-2px;">
<tr >

<td align="center" class="mainnavlink" ><a href='<?php echo base_url(); ?>index.php/factory/factory_orders'  >Order Management</a></td>
<td align="center" class="mainnavlink" ><a href="<?php echo base_url(); ?>index.php/factory/factory_reports"  >Reports</a></td>
<td align="center" class="mainnavlink" ><a href='<?php echo base_url(); ?>index.php/login/logout'  >Logout</a></td>
</tr></table>
</div><!-- main nav closed-->
<div class="middle">
<div class="leftnav">
<table cellpadding="0" cellspacing="0">
<tr><td class="navhdr"><b>Reports</b></td></tr>
<tr><td class="navcontbg1" ><a href=" <?php echo base_url(); ?>index.php/factory/factory_reports">All Orders</a></td></tr>
<tr><td class="navcontbg2" ><a href=" <?php echo base_url(); ?>index.php/factory/factory_reports/pending">Pending Orders</a></td></tr>
<tr><td class="navcontbg1" ><a href=" <?php echo base_url(); ?>index.php/factory/factory_reports/branchwise">Branch wise Orders</a></td></tr>

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
</table>
<div style="height:100px;"></div>
</div>

<div class="rightpane" align="justify" style=" margin-left:20px;" >

<form name="frmFactoryOrders" id=frmFactoryOrders action="" method="post">

<div id="search">
        <label for="filter"><b>Search:</b></label> <input type="text" name="filter" value="" id="filter" />
</div><br />
<div id="success"  class="success" style="width:800px;">&nbsp;
</div>
<fieldset style="border:1px solid #073c68"><legend><b>Pending Orders Reports</b></legend>
<table cellpadding="3" style="width:800px; font-size:12px">
<?php
$str=mysql_query("select * from tbl_orders  where status!='Loaded' ORDER BY orderdate");
//echo "select * from tbl_oders where status='New' ORDER BY orderdate";

//echo "num of fields = ".$fc;
//echo "<br>";
//echo "<br>";
echo  "<tr>";
echo  "<thead>
<th>DO Number</th><th>Order Date</th><th>Order From</th><th>Total Bundles/Qunatity</th><th>Dispatched</th><th>Pending Bundles</th><th width=150 align=center>Status</th>";

echo  "</thead>";
echo  "</tr>";
echo  "<tr ><td colspan=13 style='border-top:1px solid'></td></tr>";

while($s1=mysql_fetch_array($str))
{
$count=0;
$res=mysql_query("select *from tbl_loadingadvice where donum='".$s1['donum']."'");
while($row=mysql_fetch_array($res))
{
$count++;
}

$dispatched=$count;
$pending=$s1['numbundles']-$count;
echo  "<tr>";
echo  "<tbody>";

echo "<td id='confirm-dialog'>".$s1['donum']."</td><td id='confirm-dialog'>".$s1['orderdate']."</td><td id='confirm-dialog' style='padding-left:10px;'>".$s1['orderby']."</td><td id='confirm-dialog' align=center>".$s1['numbundles']."</td><td id='confirm-dialog' align=center>".$dispatched."</td><td id='confirm-dialog' align=center>".$pending."</td><td id='confirm-dialog'>".$s1['status']."</td>";

echo "</tbody>";
echo "</tr>";
}
?>

</table>
</fieldset>

<div style="height:105px"></div>
</form>
</div><!--rightpane div closed-->

</div><!--middle div closed-->

<div class="futr">
</div>



</div><!--main div closed-->


</body>
</html>
