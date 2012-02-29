<tbody>
<tr style="background-color: #9F1B4A;color:black; font-size:12px; font-weight:bold;border-bottom: 1px solid; border-right: 1px solid;	border-color: #e37e3d; background-image: url(http://localhost/cenflex/images/red.png); background-repeat: repeat-x;vertical-align:top;"><td nowrap="nowrap">DO No</td><td nowrap="nowrap">Order Date</td><td>Party</td><td nowrap="nowrap">Total Bundles/Meters</td><td width=180>Dispatched Bundles/Meters</td><td nowrap="nowrap">Pending Bundles/Meters</td><td  align=center>Status</td></tr>
<?php
$start = $vars;

$str=mysql_query("select * from tbl_order_master where status!='New' ORDER BY id desc limit ".$start.", 10 ");
//echo "select * from tbl_oders where status='New' ORDER BY orderdate";

//echo "num of fields = ".$fc;
//echo "<br>";
//echo "<br>";




while($row1=mysql_fetch_array($str))
{
$count=0;
$totalbundles=0;
$cancelledbundles=0;
$totalmtrs=0;
$cancelledmtrs=0;
$dispatchedmtrs=0;
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
/*$count++;
$dispatchedmtrs=$dispatchedmtrs+$row['quantity'];*/
}



}
//echo $totalbundles;
//echo $dispatchedmtrs."/";
$dispatched=$count;
$pending=$totalbundles-$count-$cancelledbundles;
$pendingmtrs=$totalmtrs-$dispatchedmtrs-$cancelledmtrs;



echo "<tr class='odd'><td id='confirm-dialog'><a onClick=order_details('$row1[id]')>".$row1['donum']."</a></td><td id='confirm-dialog'>".$row1['orderdate']."</td><td id='confirm-dialog' style='padding-left:10px;'>".$row1['orderby']."</td><td id='confirm-dialog' align=center>".$totbundles."/".$totmtrs."</td><td id='confirm-dialog' align=center>".$dispatched."/".$dispatchedmtrs."</td><td id='confirm-dialog' align=center>".$pending."/".number_format($pendingmtrs,2)."</td><td id='confirm-dialog' nowrap>".$row1['status']."</td></tr>";



}
?>

</tbody>
<tfoot>
<tr><th></th><th></th><th></th><th></th><th></th><th></th><th width=150 align=center></th></tr></tfoot>
