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
	
	$('#sendorderForm').submit(function(e) {

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
		 url: base_url+'factory/factory_orders/bundlingsubmit',
		data: $('#sendorderForm').serialize(),
		
		success: function(msg)
		{
		//alert(msg);	
		if(msg=="successfully changed status.")
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
$(function() {

$("#txt_order_wrap").hide();
	$("#step_2 input[type=radio]").each(function(){

		this.checked = false;
	});
$("#step_2 input[name=sendorder]").click(function()
	{
	//alert("hi");
		$.stepTwoComplete_one = "complete";
		//alert(($("#nccgroupyes:checked").val())); 
		if ($("#sendorderpartial:checked").val() == 'Partial') 
		{
			$("#txt_order_wrap").slideDown();
		} 
		else 
		{
			$("#txt_order_wrap").slideUp();
			//$("#txt_children_wrap").slideUp();
		};
		stepTwoTest();
	});
	});
	
	
	function checkbundles(count)
	{
	//alert('hi');
	if(document.getElementById('txt_bundles').value>count)
	{
	alert("Number of bundles should not be greater than"+ count);
	document.getElementById('txt_bundles').value=count;
	}
	}

</script>
</head>

<body >

<div style="overflow:auto;width:500px;height:320px;">
<div class=editpane align="justify" >

<?php
$vars=explode(":",$vars);
$res=mysql_query("select *from tbl_orders where id=".$vars[1]);
$row=mysql_fetch_array($res);
?>


<div id="success"  class="success">&nbsp;
</div>
<div id="error"  class="error">&nbsp;
</div>
<form name="sendorderForm" id="sendorderForm" action="" method="post">
<fieldset style="border:1px solid #073c68;width:450px;"><legend><b>Bundle Numbers</b></legend>
<table  cellpadding="3" cellspacing="1" height="100%">


<?php
$res=mysql_query("select *from tbl_cuttinginstruction where id='".$vars[0]."'");
$row=mysql_fetch_array($res);

$res_order=mysql_query("select *from tbl_orders where id='".$vars[0]."'");
$row_orders=mysql_fetch_array($res_order);

if($row_orders['variety']=="B Grade" || $row_orders['variety']=="C Grade" || $row_orders['remarks']=="Rolls" || $row_orders['remarks']=="rolls" || $row_orders['remarks']=="Blocks" || $row_orders['remarks']=="blocks")
{
	for($i=1;$i<=$row['numbundles'];$i++)
{
echo "<tr><td><div id='step_2'>Bundle Number : <input type='text' name=bundle".$i." id='sendorderfull' style='width:60px;'>
</div></td><td><div id='step_2'>Bundle Weight : <input type='text' name=weight".$i." id='sendorderfull' style='width:60px;'>
</div></td></tr>";
}

}
else
{
for($i=1;$i<=$row['numbundles'];$i++)
{
echo "<tr><td><div id='step_2'>Bundle Number : <input type='text' name=bundle".$i." id='sendorderfull' style='width:60px;'>
</div></td><td><div id='step_2'>Num of Pieces : <input type='text' name=pieces".$i." id='sendorderfull' style='width:60px;'>
</div></td></tr>";
}
}
?>

 

<tr><td colspan="4" style="padding-left:110px;"><input type="submit" name="fsubmit" id="fsubmit" value="" class="mfsub" />
 <input type="hidden" name="doid" id="doid" value="<?php echo $vars[0] ?>" >
  <input type="hidden" name="num" id="num" value="<?php echo $row['numbundles'] ?>" >
  
   <input type="hidden" name="variety" id="variety" value="<?php echo $row_orders['variety'] ?>" >
    <input type="hidden" name="reamrks" id="remarks" value="<?php echo $row_orders['remarks'] ?>" >
   </td></tr>
</table>
</fieldset>
</form>


</div><!--rightpane div closed-->

</div>
</body>
</html>
