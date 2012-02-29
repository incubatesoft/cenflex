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

<div style="overflow:auto;width:780px;height:430px;">
<div class=editpane align="justify" >


<fieldset style="border:1px solid #073c68;width:770px;"><legend><b>Order&nbsp;Details</b></legend>
<table  cellpadding="4" cellspacing="0" height="97%" width=100% border="0">






<?php 
$values=explode(":",$vars);
//echo $values[0];
//echo $values[1];
if(strpos($values[0],'%20')==true){ $value1=str_replace("%20"," ",$values[0]);} else {$value1=$values[0];}
if(strpos($values[1],'%20')==true){ $value2=str_replace("%20"," ",$values[1]);} else {$value2=$values[1];}
//echo $values[2];
if($values[2]=='Rolls')
{
$res_orders=mysql_query("select *from tbl_orders where density='".$value1."' and variety='".$value2."' and itemname='".$values[2]."' and remainingmtrs!=0");
//echo "select *from tbl_orders where density='".$value1."' and variety='".$value2."' and itemname='".$values[2]."' and remainingmtrs!=0";
}else{
$res_orders=mysql_query("select *from tbl_orders where density='".$value1."' and variety='".$value2."' and itemname='".$values[2]."' ");
}
echo "<tr><th style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;border-top:1px solid #073c68; border-left:1px solid #073c68'>Product Variety</th>
<th style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;border-top:1px solid #073c68;'>DO Num</th><th style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;border-top:1px solid #073c68;'>Party Name</th><th style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;border-top:1px solid #073c68;'>Product</th><th style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;border-top:1px solid #073c68;'>Order Date</th><th style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;border-top:1px solid #073c68;'>Size</th><th style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;border-top:1px solid #073c68;'>Bundles/Meters</th><th style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;border-top:1px solid #073c68;'>Delivery Time</th></tr>";
$rembunmtr=0;
while($row_order=mysql_fetch_array($res_orders))
{

$res=mysql_query("select *from tbl_order_master where donum='".$row_order['donum']."'");
$row=mysql_fetch_array($res);
$res2=mysql_query("select *from tbl_orders where donum='".$row_order['donum']."' and itemname='Rolls' ");
$row2=mysql_fetch_array($res2);

if($values[2]=='Rolls')
{
	//$rembunmtr=$row_order['remainingmtrs'];
$res_mtrs=mysql_query("select *from tbl_cuttinginstruction where orderid='".$row_order['id']."'  and donum='".$row_order['donum']."' and cancelstatus is null ");
$res_mtrs2=mysql_query("select *from tbl_cuttinginstruction where orderid='".$row_order['id']."'  and donum='".$row_order['donum']."' and cancelstatus is not null ");
//echo "select *from tbl_cuttinginstruction where orderid='".$row_order['id']."'  and donum='".$row_order['donum']."'";
//$totalbundles2=$totalbundles2+$s2['remainingbundles'];
//echo "select *from tbl_cuttinginstruction where orderid='".$s2['id']."' and donum='".$s2['donum']."'";
 $res_mtrscount=mysql_num_rows($res_mtrs);
 $res_mtrscount2=mysql_num_rows($res_mtrs2);
//echo "<br>";
$res_mtrsleft=mysql_fetch_array($res_mtrs);
if($res_mtrscount>0)
{$rembunmtr=$res_mtrsleft['remainingmtrs'];} 
else 
{$rembunmtr=$row2['remainingmtrs'];}
//echo $rembunmtr; echo "<br>";
if($rembunmtr>0 && $res_mtrscount2==0)
{
echo "<tr><td  style='border-bottom:1px solid #073c68; border-right:1px solid #073c68; border-left:1px solid #073c68' >".$value1." ".$value2."

</td>



<td  style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;'>".$row_order['donum']."</td>

<td  style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;'>".$row['orderby']."</td>

<td  style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;'>".$row_order['itemname']."</td>
<td  style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;'>".$row['orderdate']."</td>

<td  style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;'>".$row_order['height']."*".$row_order['width']."*".$row_order['thickness']."</td>
<td  style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;'>".$rembunmtr."</td>
<td  style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;'>".$row['priority']."</td>


</tr>";
}


	} else {
	//	$rembunmtr=$row_order['remainingbundles'];
	$res_bundles=mysql_query("select *from tbl_bundlelist where orderid='".$row_order['id']."' and status='Dispatched' and donum='".$row_order['donum']."'");
//echo "select *from tbl_bundlelist where orderid='".$s11['id']."' and status='Dispatched' and donum='".$s11['donum']."'";

$finishedbundles=mysql_num_rows($res_bundles);
$rembunmtr =$row_order['numbundles']-$finishedbundles-$row_order['cancelledbundles'];

if($rembunmtr>0)
{
echo "<tr><td  style='border-bottom:1px solid #073c68; border-right:1px solid #073c68; border-left:1px solid #073c68' >".$value1." ".$value2."

</td>



<td  style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;'>".$row_order['donum']."</td>

<td  style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;'>".$row['orderby']."</td>

<td  style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;'>".$row_order['itemname']."</td>
<td  style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;'>".$row['orderdate']."</td>

<td  style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;'>".$row_order['height']."*".$row_order['width']."*".$row_order['thickness']."</td>
<td  style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;'>".$rembunmtr."</td>
<td  style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;'>".$row['priority']."</td>


</tr>";

}



		}




}


?>





</table>
</fieldset>







</div></div><!--main div closed-->



</body>
</html>
