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
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>js/jquery.dataTables.js"></script>
<link type="text/css" href="<?php echo  base_url();?>themes/base/ui.all.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/demo_table.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/demo_page.css" type="text/css" />
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
	$('#example').dataTable();
	//alert("hi");
	$('#frmLoadingAdvice').submit(function(e) {

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
		 url: base_url+'factory/factory_orders/loadingsubmit',
		data: $('#frmLoadingAdvice').serialize(),
		
		success: function(msg)
		{
			//alert(msg);
			if(msg=="Loading Advice Finished Successfully.")
			{
			
		
				success(1,msg);
					window.open('packaging_list','_blank');
				
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
</script>
</head>


<body marginwidth="0" marginheight="0" bgcolor="#e9f1fb" topmargin="0" leftmargin="0" rightmargin="0">


<table width=100% cellpadding="0" cellspacing="0" border="0">
<tr><td style="padding-top:0px;width:200px;"><img src="<?php echo base_url(); ?>images/newmalani.gif"  /></td><td  style="height:95px;  background-color:#d4e6fb; background-image:url(<?php echo base_url(); ?>images/newmalanihbg.gif); background-repeat:repeat-x; border:0px;">&nbsp;


</td></tr>


<tr><td colspan="2"  style="background-color:#fde5c3; height:28px;"> 
<table style="margin-top:-2px;">
<tr >

<td align="center" class="mainnavlink" ><a href='<?php echo base_url(); ?>index.php/factory/factory_orders'  >Order Management</a></td>
<td align="center" class="mainnavlink" ><a href="<?php echo base_url(); ?>index.php/factory/factory_reports"  >Reports</a></td>
<td align="center" class="mainnavlink" ><a href='<?php echo base_url(); ?>index.php/login/logout'  >Logout</a></td>
</tr></table></td></tr>

<tr><td colspan="2">
<table>
<tr><td style="padding-left:10px;width:270px; padding-top:5px;" valign="top">

<table cellpadding="0" cellspacing="0">

<tr><td class="navhdr"><b>Order Management</b></td></tr>
<tr><td class="navcontbg1" ><a href=" <?php echo base_url(); ?>index.php/factory/factory_orders">Orders From H.O</a></td></tr>
<tr><td class="navcontbg2" ><a href=" <?php echo base_url(); ?>index.php/factory/factory_orders/cuttingsection">Cutting Instructions</a></td></tr>
<tr><td class="navcontbg1" ><a href=" <?php echo base_url(); ?>index.php/factory/factory_orders/loadingadvice">Loading Advice</a></td>
<tr><td class="navcontbg2" ><a href=" <?php echo base_url(); ?>index.php/factory/factory_orders/packaginglist">Packaging List</a></td></tr>
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


<td class="rightpane" valign="top">

<table>
<form name="frmLoadingAdvice" id="frmLoadingAdvice" action="" method="post">

<tr><td><br /></td></tr>
<tr><td><br /></td></tr>
<tr><td class="success" id=success ></td></tr>

<tr><td >


        <label for="filter"><b>Loading Date:</b></label> <input type="text" name="loaddate" value="" id="loaddate" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for="filter"><b>Vehicle Number:</b></label>
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

</td></tr>

<tr>
<td style="padding-top:15px;">



<table cellpadding="3"  class="display KeyTable" id="example" width=100%  border="0">
<thead style='background-color: #9F1B4A;color:black; font-size:12px; font-weight:normal;border-bottom: 1px solid; border-right: 1px solid;	border-color: #e37e3d; background-image: url(<?php echo base_url(); ?>images/red.png); background-repeat: repeat-x;vertical-align:top;'>
<tr><th nowrap="nowrap">Select</th><th nowrap="nowrap">DO Number</th><th>Density</th><th nowrap="nowrap">Variety</th><th >Size</th><th nowrap="nowrap">Bundle Date</th><th width=150 align=center nowrap>Bundle Number</th><th width=150 align=center>Quantity</th></tr>
</thead><tbody>
<?php
$str=mysql_query("select * from tbl_bundlelist where status='Bundled' ORDER BY bundledate");
//echo "select * from tbl_bundlelist where status='' ORDER BY bundledate";
//echo "select * from tbl_oders where status='New' ORDER BY orderdate";

//echo "num of fields = ".$fc;
//echo "<br>";
//echo "<br>";
while($s1=mysql_fetch_array($str))
{
$res=mysql_query("select *from tbl_orders where donum='".$s1['donum']."'");
$row=mysql_fetch_array($res);
$size=$row['height']." * ". $row['width']." * ". $row['thickness'];


echo "<tr><td id='confirm-dialog'><input type=checkbox name=chk".$s1['bundlenumber']."></td><td id='confirm-dialog' align=center>".$s1['donum']."</td><td id='confirm-dialog' align=center>".$row['density']."</td><td id='confirm-dialog' align=center>".$row['variety']."</td><td id='confirm-dialog' align=center nowrap>".$size."</td><td id='confirm-dialog' align=center>".$s1['bundledate']."</td><td id='confirm-dialog' align=center>".$s1['bundlenumber']."</td><td id='confirm-dialog' align=center>".$s1['nopieces']." Nos</td></tr>";


}
?>

</tbody>

<tfoot>
<tr><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th width=150 align=center></th></tr></tfoot>


</table>

</td></tr>
<tr><td colspan="8" style="padding-left:310px;"><input type="submit" name="fsubmit" id="fsubmit" value="" class="mfsub" /></td></tr>
</form>
</table>


</td></tr>



</table>

</td></tr>



<tr><td colspan="2"><br /></td></tr>
<tr><td colspan="2" style="background-color:#ffdc90; height:25px; padding-top:10px;"></td></tr>

</table>