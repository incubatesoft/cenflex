
<?php

$vars_updated = str_replace("%20", " ", $vars);

$alltotaldispatched=0;
$alltotaldispatchedmtrs=0;
$alltotalpendingbundles=0;
$alltotalpendingmtrs=0;
$allfinaltotalbundles=0;
$allfinaltotalmtrs=0;
//$branches=mysql_query("select distinct(orderto) from tbl_order_master where status!='Dispatched' and orderto!=''");
//while($branchesrow=mysql_fetch_array($branches))
//{
$branchtotaldispatched=0;
$branchtotaldispatchedmtrs=0;
$branchtotalpendingbundles=0;
$branchtotalpendingmtrs=0;
$branchfinaltotalbundles=0;
$branchfinaltotalmtrs=0;
	echo "<tr><td colspan=8><hr></td></tr><tr><th colspan=8>".$vars_updated." Depot Orders</td></tr>
	<tr><td colspan=8><hr></td></tr>";
	
	$parties=mysql_query("select distinct(orderby) from tbl_order_master where status!='Dispatched' and orderto='".$vars_updated."'");
	while($partiesrow=mysql_fetch_array($parties))
	{
		
		$str=mysql_query("select * from tbl_order_master where status!='Dispatched' and orderby='".$partiesrow['orderby']."'  and orderto='".$vars_updated."'ORDER BY id desc");
		//echo "select * from tbl_order_master where status!='Dispatched' and orderby='".$partiesrow['orderby']."' ORDER BY id desc";
?>


<tr style='background-color: #9F1B4A;color:black; font-size:12px; font-weight:normal;border-bottom: 1px solid; border-right: 1px solid;	border-color: #e37e3d; background-image: url(<?php echo base_url(); ?>images/red.png); background-repeat: repeat-x;vertical-align:top;'><td><b>Party</b></td><td nowrap="nowrap"><b>DO No</b></td><td nowrap="nowrap"><b>Order Date</b></td><td nowrap="nowrap"><b>Total Bundles/Meters</b></td><td><b>Dispatched Bundles/Meters</b></td><td nowrap="nowrap"><b>Pending Bundles/Meters</b></td><td width=150 ><b>Status</b></td></tr>
</thead><tbody>
<?php


//echo "select * from tbl_oders where status='New' ORDER BY orderdate";

//echo "num of fields = ".$fc;
//echo "<br>";
//echo "<br>";

$totaldispatched=0;
$totaldispatchedmtrs=0;
$totalpendingbundles=0;
$totalpendingmtrs=0;
$finaltotalbundles=0;
$finaltotalmtrs=0;

while($row1=mysql_fetch_array($str))
{
$count=0;
$totalbundles=0;
$cancelledbundles=0;
$totalmtrs=0;
$cancelledmtrs=0;
//$totbundles=0;
//$totmtrs=0;
$dispatchedmtrs=0;
//echo $row1['donum'];
$res_orders=mysql_query("select *from tbl_orders where donum='".$row1['donum']."'");
//echo "select *from tbl_orders where donum='".$row1['donum']."'";

while($s1=mysql_fetch_array($res_orders))
{
					if($s1['itemname']== 'Sheets' || $s1['itemname']== 'Cushions' )
{$cancelledbundles=$cancelledbundles+$s1['cancelledbundles'];}
$totalbundles=$totalbundles+$s1['numbundles'];
$totbundles=$totalbundles-$cancelledbundles;

if($s1['itemname']== 'Rolls' && ($s1['variety']== 'Skin' || $s1['variety']== 'C Grade' || $s1['variety']== 'B Grade') ){
$cancelledbundles=$cancelledbundles+$s1['cancelledbundles'];	
$totalbundles=$totalbundles+$s1['height'];
$totbundles=$totalbundles-$cancelledbundles;}
else 
if($s1['itemname']== 'Rolls' && ($s1['variety']!= 'Skin' || $s1['variety']!= 'C Grade' || $s1['variety']!= 'B Grade') ){
$cancelledmtrs=$cancelledmtrs+$s1['cancelledbundles'];	
$totalmtrs=$totalmtrs+$s1['height'];
$totmtrs=$totalmtrs-$cancelledmtrs;} else { $cancelledmtrs=''; $totalmtrs=''; $totmtrs='';}



$res=mysql_query("select *from tbl_loadingadvice where donum='".$s1['donum']."' and orderid='".$s1['id']."'");
while($row=mysql_fetch_array($res))
{
	if($row['itemname']=='Sheets' || $row['itemname']=='Cushions' || ($row['itemname']=='Rolls' && ($row['variety']=='B Grade' || $row['variety']=='C Grade' || $row['variety']=='Skin')))
{$count++;} else
if($row['itemname']=='Rolls' && ($row['variety']!='B Grade' || $row['variety']!='C Grade' || $row['variety']!='Skin'))
{$dispatchedmtrs=$dispatchedmtrs+$row['quantity'];} else {$dispatchedmtrs=0;}

//$count++;
//$dispatchedmtrs=$dispatchedmtrs+$row['quantity'];
}


}
//echo $totalbundles;
$totaldispatched=$totaldispatched+$count;
$totaldispatchedmtrs=$totaldispatchedmtrs+$dispatchedmtrs;
$finaltotalbundles=$finaltotalbundles+$totbundles;
$finaltotalmtrs=$finaltotalmtrs+$totmtrs;
$dispatched=$count;
$pending=$totalbundles-$count-$cancelledbundles;
$pendingmtrs=$totalmtrs-$dispatchedmtrs-$cancelledmtrs;
$totalpendingbundles=$totalpendingbundles+$pending;
$totalpendingmtrs=$totalpendingmtrs+$pendingmtrs;


echo "<tr class=odd><td id='confirm-dialog' style='padding-left:10px;'>".$row1['orderby']."</td><td id='confirm-dialog'><a onClick=order_details('$row1[id]')>".$row1['donum']."</a></td><td id='confirm-dialog'>".$row1['orderdate']."</td><td id='confirm-dialog' >".$totbundles."/".$totmtrs."</td><td id='confirm-dialog' >".$dispatched."/".$dispatchedmtrs."</td><td id='confirm-dialog' >".$pending."/".number_format($pendingmtrs,2)."</td><td id='confirm-dialog' nowrap>".$row1['status']."</td></tr>";



}
echo"<tr class=even><td colspan=3 style='color:#960;' ><b>Total Bundles/Meters (".$partiesrow['orderby'].") </td><td style='color:#960;'><b>".$finaltotalbundles."/".$finaltotalmtrs."</b></td><td style='color:#960;'><b>".$totaldispatched."/".$totaldispatchedmtrs."</b></td><td style='color:#960;'><b>".$totalpendingbundles."/".number_format($totalpendingmtrs,2)."</b></td><td></td></tr>";

$branchfinaltotalbundles=$branchfinaltotalbundles+$finaltotalbundles;
$branchfinaltotalmtrs=$branchfinaltotalmtrs+$finaltotalmtrs;
$branchtotalpendingbundles=$branchtotalpendingbundles+$totalpendingbundles;
$branchtotalpendingmtrs=$branchtotalpendingmtrs+$totalpendingmtrs;
$branchtotaldispatched=$branchtotaldispatched+$totaldispatched;
$branchtotaldispatchedmtrs=$branchtotaldispatchedmtrs+$totaldispatchedmtrs;
	}
	
	
	echo"<tr class=odd><td colspan=3 style='color:red;'><b>Total Bundles/Meters (".$vars_updated." Depot) </td><td style='color:red;'><b>".$branchfinaltotalbundles."/".$branchfinaltotalmtrs."</b></td><td style='color:red;'><b>".$branchtotaldispatched."/".$branchtotaldispatchedmtrs."</b></td><td style='color:red;'><b>".$branchtotalpendingbundles."/".$branchtotalpendingmtrs."</b></td><td></td></tr>";

$allfinaltotalbundles=$allfinaltotalbundles+$branchfinaltotalbundles;
$allfinaltotalmtrs=$allfinaltotalmtrs+$branchfinaltotalmtrs;
$alltotaldispatched=$alltotaldispatched+$branchtotaldispatched;
$alltotaldispatchedmtrs=$alltotaldispatchedmtrs+$branchtotaldispatchedmtrs;
$alltotalpendingbundles=$alltotalpendingbundles+$branchtotalpendingbundles;
$alltotalpendingmtrs=$alltotalpendingmtrs+$branchtotalpendingmtrs;
//}
	
?>

