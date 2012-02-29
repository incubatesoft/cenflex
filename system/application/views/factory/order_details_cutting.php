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

</head>

<body>

<div style="overflow:auto;width:700px;height:430px;">
<div class=editpane align="justify" >

<?php
$di='';
$ic='';
$bd='';
$gc='';
$vh='';
$hi='';
$lo='';
$st='';
$wp='';
//echo "select *from tbl_orders where donum=".$vars;
$res_var=mysql_query("select *from tbl_order_master where donum='".$vars."'");
//echo "select *from tbl_order_master where id='".$vars."'";
//echo "select *from tbl_order_master where donum='".$vars."'";
$row_var=mysql_fetch_array($res_var);

?>
<div id="success"  class="success">&nbsp;
</div>
<form name="orderEdit" id="orderEdit" action="" method="post">
<fieldset style="border:1px solid #073c68;width:650px;"><legend><b>Order&nbsp;Details</b></legend>
<table  cellpadding="4" cellspacing="0" height="97%" width=100% border="0">

<tr><td nowrap="nowrap" colspan="4"><b>DO Number: </b><?php echo $row_var['donum'] ?></b> </td><td nowrap="nowrap" colspan="7"><b>Order Date: </b><?php echo $row_var['orderdate'] ?></b> </td></tr>

<tr><td nowrap="nowrap" colspan="4"><b>Customer Type: </b><?php echo $row_var['usertype'] ?></b> </td><td nowrap="nowrap" colspan="7"><b>Party Name: </b><?php echo $row_var['orderby'] ?></b> </td></tr>

<tr><td nowrap="nowrap" colspan="4"><b>Order Type: </b><?php echo $row_var['ordertype'] ?></b> </td><td nowrap="nowrap" colspan="7"><b>Dispatch Schedule: </b><?php echo $row_var['priority'] ?></b> </td></tr>

<tr><td nowrap="nowrap" colspan="4"><b>P.O Number: </b><?php echo $row_var['ponum'] ?></b> </td><td nowrap="nowrap" colspan="7"><b>P.O Date: </b><?php echo $row_var['podate'] ?></b> </td></tr>
<tr><td><br /></td></tr>
<tr><td colspan="2"><b>Sheets</b></td></tr>


<?php 
$res_order=mysql_query("select * from tbl_orders where donum='".$row_var['donum']."' and itemname='Sheets'");
$count=mysql_num_rows($res_order);
$res_order1=mysql_query("select * from tbl_orders where donum='".$row_var['donum']."' and itemname='Cushions'");
$count1=mysql_num_rows($res_order1);
$res_order2=mysql_query("select * from tbl_orders where donum='".$row_var['donum']."' and itemname='Rolls'");
$count2=mysql_num_rows($res_order2);
?>


<?php 
if($count!=0)
{

$i=0;
echo "<tr><th style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;border-top:1px solid #073c68; border-left:1px solid #073c68'>Variety</th><th style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;border-top:1px solid #073c68;'>Density</th>
<th style='border-bottom:1px solid #073c68;border-top:1px solid #073c68; border-right:1px solid #073c68'>Length</th>
<th style='border-bottom:1px solid #073c68;border-top:1px solid #073c68; border-right:1px solid #073c68' >Width</th>
<th style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;border-top:1px solid #073c68;'>Thickness</th>
<th style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;border-top:1px solid #073c68;'>Quantity</th>
<th style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;border-top:1px solid #073c68;'>Bundles</th>
<th style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;border-top:1px solid #073c68;' width=100>Package</th>
<th style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;border-top:1px solid #073c68;'>Color</th>
<th style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;border-top:1px solid #073c68;'>Remarks</th></tr>";
while($row_order=mysql_fetch_array($res_order))
{
$i++;
echo "<tr><td style='border-bottom:1px solid #073c68; border-right:1px solid #073c68; border-left:1px solid #073c68' >".$row_order['variety']."

</td>
<td style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;'>".$row_order['density']."</td>


<td style='border-bottom:1px solid #073c68; border-right:1px solid #073c68'>".$row_order['height']."</td>


<td style='border-bottom:1px solid #073c68; border-right:1px solid #073c68'>".$row_order['width']."</td>


<td style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;'>".$row_order['thickness']."</td>


<td style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;'>".$row_order['quantity']."</td>


<td style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;' >".$row_order['numbundles']."</td>
<td style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;'>".$row_order['packagetype']."</td>
<td style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;'>".$row_order['colorspecific']."</td>
<td style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;'>".$row_order['remarks']."</td></tr>";
}

}
?>

<tr><td><br /></td></tr>
<tr><td colspan="8"><b>Cushions</b></td></tr>

<?php 
if($count1!=0)
{
$j=0;
echo "<tr><th style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;border-top:1px solid #073c68; border-left:1px solid #073c68'>Variety</th><th style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;border-top:1px solid #073c68;'>Density</th>
<th style='border-bottom:1px solid #073c68;border-top:1px solid #073c68; border-right:1px solid #073c68'>Length</th>
<th style='border-bottom:1px solid #073c68;border-top:1px solid #073c68; border-right:1px solid #073c68' >Width</th>
<th style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;border-top:1px solid #073c68;'>Thickness</th>
<th style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;border-top:1px solid #073c68;'>Quantity</th>
<th style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;border-top:1px solid #073c68;'>Bundles</th>
<th style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;border-top:1px solid #073c68;' width=100>Package</th>
<th style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;border-top:1px solid #073c68;'>Color</th>
<th style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;border-top:1px solid #073c68;'>Remarks</th></tr>";
while($row_order1=mysql_fetch_array($res_order1))
{
$j++;
echo "<tr><td style='border-bottom:1px solid #073c68; border-right:1px solid #073c68; border-left:1px solid #073c68' >".$row_order1['variety']."</td>

<td style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;'>".$row_order1['density']."</td>


<td style='border-bottom:1px solid #073c68; border-right:1px solid #073c68'>".$row_order1['height']."</td>


<td style='border-bottom:1px solid #073c68; border-right:1px solid #073c68'>".$row_order1['width']."</td>


<td style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;'>".$row_order1['thickness']."</td>


<td style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;'>".$row_order1['quantity']."</td>


<td style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;' >".$row_order1['numbundles']."</td>
<td style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;'>".$row_order1['packagetype']."</td>
<td style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;'>".$row_order1['colorspecific']."</td>
<td style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;'>".$row_order1['remarks']."</td></tr>";

}

}
?>


<tr><td><br /></td></tr>
<tr><td colspan="8"><b>Rolls</b></td></tr>

<?php 
if($count2!=0)
{
$j=0;
echo "<tr><th style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;border-top:1px solid #073c68; border-left:1px solid #073c68'>Variety</th><th style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;border-top:1px solid #073c68;'>Density</th>
<th style='border-bottom:1px solid #073c68;border-top:1px solid #073c68; border-right:1px solid #073c68'>Length</th>
<th style='border-bottom:1px solid #073c68;border-top:1px solid #073c68; border-right:1px solid #073c68' >Width</th>
<th style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;border-top:1px solid #073c68;'>Thickness</th>
<th style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;border-top:1px solid #073c68;' width=100>Package</th>
<th style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;border-top:1px solid #073c68;'>Color</th>
<th style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;border-top:1px solid #073c68;'>Remarks</th></tr>";
while($row_order2=mysql_fetch_array($res_order2))
{
$j++;
echo "<tr><td style='border-bottom:1px solid #073c68; border-right:1px solid #073c68; border-left:1px solid #073c68' >".$row_order2['variety']."</td>

<td style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;'>".$row_order2['density']."</td>


<td style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;'>".$row_order2['height']."</td>


<td style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;'>".$row_order2['width']."</td>


<td style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;'>".$row_order2['thickness']."</td>



<td style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;' >".$row_order2['packagetype']."</td>
<td style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;' >".$row_order2['colorspecific']."</td>
<td style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;' >".$row_order2['remarks']."</td></tr>";

}

}
?>

<tr><td nowrap="nowrap" colspan="11"><hr /></td></tr>
<tr><td nowrap="nowrap" colspan="11"><b>Remarks: </b><?php echo $row_var['remarks'] ?></b> </td></tr>
<tr><td nowrap="nowrap" colspan="11"><b>Authorised Person: </b><?php echo $row_var['authorisedname'] ?></b> </td></tr>
<tr><td nowrap="nowrap" colspan="11"><b>Designation: </b><?php echo $row_var['authoriseddesignation'] ?></b> </td></tr>



</table>
</fieldset>
</form>






</div><!--main div closed-->


</body>
</html>
