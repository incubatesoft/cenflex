<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<LINK REL="SHORTCUT ICON" HREF="<?php echo base_url(); ?>images/malinilogo.png">
<title>Shree Malani Foams </title>
<script src="http://cenflex.in/js/jquery.min.js" type="text/javascript"></script>
<script src="http://cenflex.in/js/application4.js" type="text/javascript"></script>
<script type="text/javascript">
base_url = '<?= base_url();?>index.php/';
function search()
{
document.getElementById('responsedata').innerHTML='';
var obj=document.getElementById('filter').value;
if(obj=='')
{ alert('enter DO Number.');}
else {
 var query_str = "";
		  	$.ajax({
			type: "POST",
			url: base_url+"factory/factory_orders/cuttingsearch/"+obj,
		 //	data: query_str,
			beforeSend: function(){
			  
							
			   },
			success: function(html)
			{   
			 	//alert(html);
			 	if(html!='')
			 	{$("#responsedata").append(html);
			 	//document.getElementById('responsedata').innerHTML==html;
			 	}
			 	else
			 	{
			 	$("#responsedata").append("<tr><td colspan='13'>No Data Found.</td></tr>");
			 	//document.getElementById('responsedata').innerHTML=="<tr><td colspan='13'>No Data Found.</td></tr>";
			 	}
			 	
				
			}
		});
	}
} 
</script>


</head>

<body>




<div id="success"  class="success">&nbsp;
</div>

 <div id="search">
        <label for="filter">Enter DO Number:</label> <input type="text" name="filter" value="" id="filter"  />
        <input type=button value="search" onclick=search() />
      </div>

<form name="orderEdit" id="orderEdit" action="" method="post">
<table width=750 cellpadding="0" cellspacing="0" border="0"  >
<tr><td align="center" style="font-family:Arial, Helvetica, sans-serif; font-size:28px; font-weight:bold;">CenFlex</td></tr>
<tr><td align="center" style="font-family:Arial, Helvetica, sans-serif; font-size:14x; font-weight:bold;">Orders List / Cutting Instructions</td></tr>
<tr><td align="center" style="height:20px;"> </td></tr>
<tr><td >

<table  cellpadding="3" cellspacing="0" id="openTable"  width=100% border="0" style="font-family:Arial, Helvetica, sans-serif; border:solid 1px #003; line-height:20px;">
<thead>
<tr><th style='font-family:Verdana, Geneva, sans-serif; font-size:12px; border-bottom:1px solid #000; border-right:1px solid #000'  align=center>DO Number</th>
<th style='font-family:Verdana, Geneva, sans-serif; font-size:12px; border-bottom:1px solid #000; border-right:1px solid #000'  align=center>Party Name</th>
<th style='font-family:Verdana, Geneva, sans-serif; font-size:12px; border-bottom:1px solid #000; border-right:1px solid #000'  align=center>Item</th>
<th style='font-family:Verdana, Geneva, sans-serif; font-size:12px; border-bottom:1px solid #000; border-right:1px solid #000'  align=center>Density</th>
<th style='font-family:Verdana, Geneva, sans-serif; font-size:12px; border-bottom:1px solid #000; border-right:1px solid #000'  align=center>Variety</th>
<th style='font-family:Verdana, Geneva, sans-serif; font-size:12px; border-bottom:1px solid #000; border-right:1px solid #000'  align=center>Length</th>
<th style='font-family:Verdana, Geneva, sans-serif; font-size:12px; border-bottom:1px solid #000; border-right:1px solid #000'  align=center>Width</th>
<th style='font-family:Verdana, Geneva, sans-serif; font-size:12px; border-bottom:1px solid #000; border-right:1px solid #000'  align=center>Thickness</th>
<th style='font-family:Verdana, Geneva, sans-serif; font-size:12px; border-bottom:1px solid #000; border-right:1px solid #000'  align=center>Bundles</th>
<th style='font-family:Verdana, Geneva, sans-serif; font-size:12px; border-bottom:1px solid #000; border-right:1px solid #000'  align=center>Quantity</th>
<th style='font-family:Verdana, Geneva, sans-serif; font-size:12px; border-bottom:1px solid #000; border-right:1px solid #000'  align=center>Package Type</th>
<th style='font-family:Verdana, Geneva, sans-serif; font-size:12px; border-bottom:1px solid #000; border-right:1px solid #000'  align=center>Remarks</th>
<th style='font-family:Verdana, Geneva, sans-serif; font-size:12px; border-bottom:1px solid #000'  align=center>Color</th></tr>
</thead>
<tbody id="responsedata">

</tbody>
</table>
<tr><td colspan="13" style="height:50px;"></td></tr>
</td></tr></table>
</form>



</body>
</html>
