<?php
class Admin_orders_model extends Model 
{
	
	function Admin_orders_model()
	{
		parent::Model();
	}
	
	 
	
	function add_order($val) 
	{
		error_reporting("E_ALL");
     extract($val);
	//print_r($val);
	if($customertype=="Select Type")
	echo "Select one Customer Type.";
	else
	if($customertype!="Others" && $orderfrom=="Select User")
	echo "Order From required.";
	else
	if($customertype=="Others" && $txtorderfrom=="")
	echo "Order From required.";
	else
	if($ordertype=="Select Type")
	echo "Order Type required.";
	else
	if($proirity=="Select Proirity")
	echo "Select Required dispatched Time.";
	else
	if($proirity=="Specify Date" && $dispatchdate=="")
	echo "Specify the Date.";
	else
	if($oname=="")
	echo "Authorised Person Name required.";
	
	else
	if($odesignation=="")
	echo "Authorised Person Designation required.";
	
	
	
	else
	{
	
	$sheetnum=0;
	$sheetcompletenum=0;
	$sheetcompletenum1=0;
	$sheethalfnum=0;
	$cushionnum=0;	
	$cushioncompletenum=0;
	$cushioncompletenum1=0;
	$cushionhalfnum=0;
	$rollsnum=0;
	$rollscompletenum=0;
	$rollscompletenum1=0;
	$rollshalfnum=0;
		//echo $sheetcount;
	for($i=1;$i<=$sheetcount;$i++)
	{
	$variety="svariety_".$i;
	$density="sden_".$i;
	$length="slen_".$i;
	$width="swid_".$i;
	$lengthtype="slentype_".$i;
	$widthtype="swidtype_".$i;
	$thickness="sthi_".$i;
	$quantity="squa_".$i;
	$bundles="sbun_".$i;
	$package="spack_".$i;
	$sremarks="sremarks_".$i;
	$color="scolor_".$i;

	if($$variety=="Select Variety" || $$density=="" || $$length=="" || $$width=="" || $$thickness=="" || ($$quantity=="" && $$bundles==""))
$sheetnum++;
 
 if($$variety!="Select Variety" && $$density!="" || $$length!="" || $$width!="" || $$thickness!="" || ($$quantity!="" && $$bundles!=""))
$sheetcompletenum++;
	
	else
	if($$variety=="Select Variety" && $$density=="" && $$length=="" && $$width=="" && $$thickness=="" && ($$quantity=="" && $$bundles==""))
$sheetcompletenum1++;
else

	$sheethalfnum++;
	}
	
	
	for($i=1;$i<=$cushionscount;$i++)
	{
	$cvariety="cvariety_".$i;
	$cdensity="cden_".$i;
	$clength="clen_".$i;
	$cwidth="cwid_".$i;
	$clengthtype="clentype_".$i;
	$cwidthtype="cwidtype_".$i;
	$cthickness="cthi_".$i;
	$cquantity="cqua_".$i;
	$cbundles="cbun_".$i;
	$cpackage="cpack_".$i;
	$cremarks="cremarks_".$i;
	$ccolor="ccolor_".$i;
	
	if($$cvariety=="Select Variety" || $$cdensity=="" || $$clength=="" || $$cwidth=="" || $$cthickness=="" || ($$cquantity=="" && $$cbundles==""))
$cushionnum++;

if($$cvariety!="Select Variety" && $$cdensity!="" || $$clength!="" || $$cwidth!="" || $$cthickness!="" || ($$cquantity!="" && $$cbundles!=""))
$cushioncompletenum++;
	
	else
	if($$cvariety=="Select Variety" && $$cdensity=="" && $$clength=="" && $$cwidth=="" && $$cthickness=="" && ($$cquantity=="" && $$cbundles==""))
$cushioncompletenum1++;
else

	$cushionhalfnum++;
	
	}
	
	
	for($i=1;$i<=$rollscount;$i++)
	{
	$rvariety="rvariety_".$i;
	$rdensity="rden_".$i;
	$rlength="rlen_".$i;
	$rwidth="rwid_".$i;
	$rlengthtype="rlentype_".$i;
	$rwidthtype="rwidtype_".$i;
	$rthickness="rthi_".$i;
	
	$rpackage="rpack_".$i;
	$rremarks="rremarks_".$i;
	$rcolor="rcolor_".$i;
	
	if($$rvariety=="Select Variety" || $$rdensity=="" || $$rlength=="" || $$rwidth=="" || $$rthickness=="")
$rollsnum++;
if($$rvariety!="Select Variety" && $$rdensity!="" || $$rlength!="" || $$rwidth!="" || $$rthickness!="")
$rollscompletenum++;
else
	if($$rvariety=="Select Variety" && $$rdensity=="" && $$rlength=="" && $$rwidth=="" && $$rthickness=="")
$rollscompletenum1++;
else
$rollshalfnum++;
	}
	//echo $rollshalfnum;
	//echo $rollscompletenum;
	//echo $rollsnum;

	if($sheetnum==$sheetcount && $cushionnum==$cushionscount && $rollsnum==$rollscount)
	echo "Please enter any one order or completely fill the order";
	else
	if($sheethalfnum!=0)
    echo "Please enter all the details for the order of Sheets.";
	else
	if($cushionhalfnum!=0)
    echo "Please enter all the details for the order of Cushions.";
	else
	if($rollshalfnum!=0)
    echo "Please enter all the details for the order of Rolls.";
	else
	{
	
	
	
	
	
	if($customertype=='Branch')
	{
	$user=$orderfrom;
	$orderto=$user;
	}
	
	if($proirity=="Specify Date")
	$proirity=$dispatchdate;
	
	if($customertype=="Others")
	$orderfr=$txtorderfrom;
	else
	$orderfr=$orderfrom;
	
	//echo "insert into tbl_order_master(donum,orderdate,orderby,usertype,priority,status,packagetype,active) values('".$orderno."','".$odate."','".$user."','".$customertype."','".$proirity."','New','".$packagetype."','Yes')";
	
	
$donum=0;
$res_orders=mysql_query("select max(donum) as donum from tbl_order_master");
//echo "select max(donum) as donum from tbl_order_master";
if(mysql_num_rows($res_orders)==0)
$donum=1;
else
{
$row=mysql_fetch_array($res_orders);
$donum=intval($row['donum'])+1;
}
//echo $donum;

$date=date('d/m/Y');

	mysql_query("insert into tbl_order_master(donum,orderdate,orderby,usertype,priority,status,packagetype,active,orderto,remarks,authorisedname,authoriseddesignation,ordertype,ponum,podate,billingprice) values('".$donum."','".$date."','".$orderfr."','".$customertype."','".$proirity."','New','".$packagetype."','Yes','".$orderto."','".$remarks."','".$oname."','".$odesignation."','".$ordertype."','".$ponum."','".$podate."','".$bplist."')");
	
	//echo "insert into tbl_order_master(donum,orderdate,orderby,usertype,priority,status,packagetype,active,orderto,remarks,authorisedname,authoriseddesignation,ordertype,ponum,podate,billingprice) values('".$donum."','".$date."','".$orderfr."','".$customertype."','".$proirity."','New','".$packagetype."','Yes','".$orderto."','".$remarks."','".$oname."','".$odesignation."','".$ordertype."','".$ponum."','".$podate."','".$bplist."')";
	
	//mysql_query("update tbl_order_master set orderdate='".$odate."',orderby='".$orderfrom."',usertype='".$customertype."',priority='".$proirity."',status='New',packagetype='".$packagetype."',active='Yes',orderto='".$orderto."',remarks='".$remarks."',authorisedname='".$oname."',authoriseddesignation='".$odesignation."',ordertype='".$ordertype."',ponum='".$ponum."',podate='".$podate."' where donum='".$orderno."'");
	//echo "update tbl_order_master set orderdate='".$odate."',orderby='".$orderfrom."',usertype='".$customertype."',priority='".$proirity."',status='New',packagetype='".$packagetype."',active='Yes',orderto='".$orderto."',remarks='".$remarks."',authorosedname='".$oname."',authoriseddesignation='".$odesignation."',ordertype='".$ordertype."',ponum='".$ponum."',podate='".$podate."' where donum='".$orderno."'";
	
	for($i=1;$i<=$sheetcompletenum;$i++)
	{
	$variety="svariety_".$i;
	$density="sden_".$i;
	$length="slen_".$i;
	$width="swid_".$i;
	$lengthtype="slentype_".$i;
	$widthtype="swidtype_".$i;
	$thickness="sthi_".$i;
	$quantity="squa_".$i;   //interchanged quantity and bundles for claculation in query dont confuse
	$bundles="sbun_".$i;	//interchanged quantity and bundles for claculation in query dont confuse
	$package="spack_".$i;
	$sremarks="sremarks_".$i;
	$color="scolor_".$i;
	
	if($$bundles=="")
	$$bundles=1;
	mysql_query("insert into tbl_orders(donum,itemname,quantity,numbundles,width,height,density,thickness,variety,remainingbundles,status,packagetype,remarks,colorspecific,widthtype,heighttype,remainingmtrs,cancelledbundles) values('".$donum."','Sheets','".$$bundles."','".$$quantity."','".$$width."','".$$length."','".$$density."','".$$thickness."','".$$variety."','".$$quantity."','New','".$$package."','".$$sremarks."','".$$color."','".$$widthtype."','".$$lengthtype."','".$$bundles."','0')");
//interchanged quantity and bundles for claculation in query dont confuse
//echo "insert into tbl_orders(donum,itemname,quantity,numbundles,width,height,density,thickness,variety,remainingbundles,status,packagetype,remarks,colorspecific,widthtype,heighttype,remainingmtrs,cancelledbundles) values('".$donum."','Sheets','".$$bundles."','".$$quantity."','".$$width."','".$$length."','".$$density."','".$$thickness."','".$$variety."','".$$quantity."','New','".$$package."','".$$sremarks."','".$$color."','".$$widthtype."','".$$lengthtype."','".$$bundles."','0')";
	}
	
	
	
	for($i=1;$i<=$cushioncompletenum;$i++)
	{
		//echo "hi";
	$cvariety="cvariety_".$i;
	$cdensity="cden_".$i;
	$clength="clen_".$i;
	$cwidth="cwid_".$i;
	$clengthtype="clentype_".$i;
	$cwidthtype="cwidtype_".$i;
	$cthickness="cthi_".$i;
	$cquantity="cqua_".$i;	
	$cbundles="cbun_".$i;	
	$cpackage="cpack_".$i;
	$cremarks="cremarks_".$i;
	$ccolor="ccolor_".$i;
	//echo $$cthickness;
	if($$cbundles=="")
	$$cbundles=1;
	mysql_query("insert into tbl_orders(donum,itemname,quantity,numbundles,width,height,density,thickness,variety,remainingbundles,status,packagetype,remarks,colorspecific,widthtype,heighttype,remainingmtrs,cancelledbundles) values('".$donum."','Cushions','".$$cbundles."','".$$cquantity."','".$$cwidth."','".$$clength."','".$$cdensity."','".$$cthickness."','".$$cvariety."','".$$cquantity."','New','".$$cpackage."','".$$cremarks."','".$$ccolor."','".$$cwidthtype."','".$$clengthtype."','".$$cbundles."','0')");
	
	}
	
	
	for($i=1;$i<=$rollscompletenum;$i++)
	{
		//echo "hi";
	$rvariety="rvariety_".$i;
	$rdensity="rden_".$i;
	$rlength="rlen_".$i;
	$rwidth="rwid_".$i;
	$rlengthtype="rlentype_".$i;
	$rwidthtype="rwidtype_".$i;
	$rthickness="rthi_".$i;
	
	$rpackage="rpack_".$i;
	$rremarks="rremarks_".$i;
	$rcolor="rcolor_".$i;
	//echo $$cthickness;
	
	mysql_query("insert into tbl_orders(donum,itemname,width,height,density,thickness,variety,status,packagetype,remarks,colorspecific,widthtype,heighttype,remainingmtrs,cancelledbundles) values('".$donum."','Rolls','".$$rwidth."','".$$rlength."','".$$rdensity."','".$$rthickness."','".$$rvariety."','New','".$$rpackage."','".$$rremarks."','".$$rcolor."','".$$rwidthtype."','".$$rlengthtype."','".$$rlength."','0')");

	
	}
	
	echo "Order Created Successfully. Your DO Number is <b>".$donum."</b>. Please Note this DO Number for Tracting the DO";
	}
	}
	}
	
	
	
	function orderssendtofactory($val)
	{
	extract($val);
	//echo $sizeof($val);
	//print_r($val);
	error_reporting("E_ALL");
	if(sizeof($val)==0)
 {
 echo "Please select atleast one Order to Send.";
 }	

else
{
$str=mysql_query("select * from tbl_order_master where status='New' ORDER BY orderdate");
while($row=mysql_fetch_array($str))
{
$val= "chk".$row['donum'];
if((isset($val)) && $$val=="on")
{
mysql_query("update tbl_order_master set status='Sent to Factory' where donum='".$row['donum']."'");
mysql_query("update tbl_orders set status='Sent to Factory' where donum='".$row['donum']."'");
mysql_query("insert into tbl_orders_factory(donum,date,status,orderfrom) values('".$row['donum']."','".date('d-m-Y')."','New','".$row['orderby']."')");
//echo "insert into tbl_orders_factory values('".$row['donum']."','".date('d-m-Y')."','New','".$row['orderby']."')";
}


}

echo "Orders Sent to Factory Successfully.";
}
	
	
	}
	
	
	
	function deactive_order($val)
	{
  //echo "select active from tbl_order_master where donum=".$val;
	$res=mysql_query("select active from tbl_order_master where donum=".$val);
	$row=mysql_fetch_array($res);
	if($row['active']=='Yes')
	{
	echo "update tbl_orders set active='No' where id=".$val;
	mysql_query("update tbl_order_master set active='No' where donum=".$val);
	}
	
	if($row['active']=='No')
	{
	//echo "update tbl_order_master set active='Yes' where donum=".$val;
	mysql_query("update tbl_order_master set active='Yes' where donum=".$val);
	}
	
	} 
	
	
	function edit_order($val) 
	{
  
     error_reporting("E_ALL");
     extract($val);
	 //echo $fcode;
   // print_r($val);
	//echo $sheetcount;
    
	 if($odate=="")
	echo "Order Date required.";
	else
	if($customertype==" ")
	echo "Customer Type required.";
	else
	if($orderfrom=="Select User")
	echo "Order From required.";
	else
	if($customertype=="Others" && $txtorderfrom=="")
	echo "Order From required.";
	else
	if($proirity=="Select Proirity")
	echo "Select Required dispatched Time.";
	
	else
	if($proirity=="Specify Date" && $dispatchdate1=="")
	echo "Specify the Date.";
	else
	if($oname=="")
	echo "Authorised Person Name required.";
	
	else
	if($odesignation=="")
	echo "Authorised Person Designation required.";
	
	else
	{
	
	$sheetnum=0;
	$sheetcompletenum=0;
	$sheetcompletenum1=0;
	$sheethalfnum=0;
	$cushionnum=0;	
	$cushioncompletenum=0;
	$cushioncompletenum1=0;
	$cushionhalfnum=0;
	$rollnum=0;
	$rollshalfnum=0;
	$rollscompletenum=0;
	$rollscompletenum1=0;
	for($i=1;$i<=$sheetcount;$i++)
	{
	$variety="svariety_".$i;
	$density="sden_".$i;
	$length="slen_".$i;
	$width="swid_".$i;
	$thickness="sthi_".$i;
	$quantity="squa_".$i;
	$bundles="sbun_".$i;
	$package="spack_".$i;
	$sremarks="sremarks_".$i;
	$color="scolor_".$i;
	
	if($$variety=="Select Variety" || $$density=="" || $$length=="" || $$width=="" || $$thickness=="" || ($$quantity=="" && $$bundles==""))
$sheetnum++;

 
 if($$variety!="Select Variety" && $$density!="" || $$length!="" || $$width!="" || $$thickness!="" || ($$quantity!="" && $$bundles!=""))
$sheetcompletenum++;
	
	else
	if($$variety=="Select Variety" && $$density=="" && $$length=="" && $$width=="" && $$thickness=="" && ($$quantity=="" && $$bundles==""))
$sheetcompletenum1++;
else

	$sheethalfnum++;

	}
	
	
	for($i=1;$i<=$cushionscount;$i++)
	{
	$cvariety="cvariety_".$i;
	$cdensity="cden_".$i;
	$clength="clen_".$i;
	$cwidth="cwid_".$i;
	$cthickness="cthi_".$i;
	$cquantity="cqua_".$i;
	$cbundles="cbun_".$i;
	$cpackage="cpack_".$i;
	$cremarks="cremarks_".$i;
	$ccolor="ccolor_".$i;
	
	if($$cvariety=="Select Variety" || $$cdensity=="" || $$clength=="" || $$cwidth=="" || $$cthickness=="" || ($$cquantity=="" && $$cbundles==""))
$cushionnum++;

if($$cvariety!="Select Variety" && $$cdensity!="" || $$clength!="" || $$cwidth!="" || $$cthickness!="" || ($$cquantity!="" && $$cbundles!=""))
$cushioncompletenum++;
	
	else
	if($$cvariety=="Select Variety" && $$cdensity=="" && $$clength=="" && $$cwidth=="" && $$cthickness=="" && ($$cquantity=="" && $$cbundles==""))
$cushioncompletenum1++;
else

	$cushionhalfnum++;
	
	}
	
	for($i=1;$i<=$rollscount;$i++)
	{
	$rvariety="rvariety_".$i;
	$rdensity="rden_".$i;
	$rlength="rlen_".$i;
	$rwidth="rwid_".$i;
	$rlengthtype="rlentype_".$i;
	$rwidthtype="rwidtype_".$i;
	$rthickness="rthi_".$i;
	
	$rpackage="rpack_".$i;
	$rremarks="rremarks_".$i;
	$rcolor="rcolor_".$i;
	
	if($$rvariety=="Select Variety" || $$rdensity=="" || $$rlength=="" || $$rwidth=="" || $$rthickness=="")
$rollsnum++;
if($$rvariety!="Select Variety" && $$rdensity!="" || $$rlength!="" || $$rwidth!="" || $$rthickness!="")
$rollscompletenum++;
else
	if($$rvariety=="Select Variety" && $$rdensity=="" && $$rlength=="" && $$rwidth=="" && $$rthickness=="")
$rollscompletenum1++;
else
$rollshalfnum++;
	}

	if($sheetnum==$sheetcount && $cushionnum==$cushionscount && $rollsnum==$rollscount)
	echo "Please enter any one order or completely fill the order";
	else
	if($sheethalfnum!=0)
    echo "Please enter all the details for the order of Sheets.";
	else
	if($cushionhalfnum!=0)
    echo "Please enter all the details for the order of Cushions.";
	
	
	else
	{
	
	
	
	if($customertype=='Branch')
	{
	$user=$orderfrom;
	$orderto=$user;
	}
	
	if($proirity=="Specify Date")
$proirity=$dispatchdate1;
	
	
	mysql_query("update tbl_order_master set orderdate='".$odate."',orderby='".$orderfrom."',usertype='".$customertype."',priority='".$proirity."',packagetype='".$packagetype."',orderto='".$orderto."',remarks='".$remarks."',authorisedname='".$oname."',authoriseddesignation='".$odesignation."',ordertype='".$ordertype."',ponum='".$ponum."',podate='".$podate."',billingprice='".$bplist."' where donum=".$don);
	
	
	
	$res_id=mysql_query("select id from tbl_orders where itemname='Sheets' and donum='".$don."'");
	$res_idc=mysql_query("select id from tbl_orders where itemname='Cushions' and donum='".$don."'");
	$res_idr=mysql_query("select id from tbl_orders where itemname='Rolls' and donum='".$don."'");
	for($i=1;$i<=$sheetcompletenum;$i++)
	{
	
	$row_id=mysql_fetch_array($res_id);
	 $id=$row_id['id'];
	$variety="svariety_".$i;
	$density="sden_".$i;
	$length="slen_".$i;
	$width="swid_".$i;
	$thickness="sthi_".$i;
	$quantity="squa_".$i;
	$bundles="sbun_".$i;
	$package="spack_".$i;
	$sremarks="sremarks_".$i;
	$color="scolor_".$i;
	
	if($$bundles=="")
	$$bundles=1;
	mysql_query("update tbl_orders set quantity='".$$quantity."',numbundles='".$$bundles."',width='".$$width."',height='".$$length."',density='".$$density."',thickness='".$$thickness."',variety='".$$variety."',remainingbundles='".$$bundles."',packagetype='".$$package."',remarks='".$$sremarks."',colorspecific='".$$color."',remainingmtrs='".$$quantity."' where donum='".$don."' and id=".$id);
	}
	
	
	
	for($i=1;$i<=$cushioncompletenum;$i++)
	{
		//echo "hi";
    $row_idc=mysql_fetch_array($res_idc);
	$idc=$row_idc['id'];
	$cvariety="cvariety_".$i;
	$cdensity="cden_".$i;
	$clength="clen_".$i;
	$cwidth="cwid_".$i;
	$cthickness="cthi_".$i;
	$cquantity="cqua_".$i;
	$cbundles="cbun_".$i;
	$cpackage="cpack_".$i;
	$cremarks="cremarks_".$i;
	$ccolor="ccolor_".$i;
	//echo $$cthickness;
	if($$cbundles=="")
	$$cbundles=0;
	
	
	
	mysql_query("update tbl_orders set quantity='".$$cquantity."',numbundles='".$$cbundles."',width='".$$cwidth."',height='".$$clength."',density='".$$cdensity."',thickness='".$$cthickness."',variety='".$$cvariety."',remainingbundles='".$$cbundles."',packagetype='".$$cpackage."',remarks='".$$cremarks."',colorspecific='".$$ccolor."',remainingmtrs='".$$cquantity."' where donum='".$don."' and id=".$idc) or die(mysql_error());

	
	}
		for($i=1;$i<=$rollscompletenum;$i++)
	{
		//echo "hi";
    $row_idr=mysql_fetch_array($res_idr);
	$idr=$row_idr['id'];
	$rvariety="rvariety_".$i;
	$rdensity="rden_".$i;
	$rlength="rlen_".$i;
	$rwidth="rwid_".$i;
	$rthickness="rthi_".$i;
	$rpackage="rpack_".$i;
	$rremarks="rremarks_".$i;
	$rcolor="rcolor_".$i;
	//echo $$cthickness;

	mysql_query("update tbl_orders set width='".$$rwidth."',height='".$$rlength."',density='".$$rdensity."',thickness='".$$rthickness."',variety='".$$rvariety."',remainingmtrs='".$$rlength."',packagetype='".$$rpackage."',remarks='".$$rremarks."',colorspecific='".$$rcolor."' where donum='".$don."' and id=".$idr);

	}

	echo "Order Updated Successfully.";
	}
	}
		
	}
	
	function remove_order($val)
	{
		
		//echo "hi";
		$res_cou=mysql_query("select donum from tbl_orders where id=".$val);
		$row_cou=mysql_fetch_array($res_cou);
		//echo "select *from tbl_orders where donum='".$row_cou['donum']."'";
		$res_num=mysql_query("select *from tbl_orders where donum='".$row_cou['donum']."'");
		if(mysql_num_rows($res_num)==1)
		{
		mysql_query("delete from tbl_order_master where donum='".$row_cou['donum']."'");
		echo "Order Deleted";	
		}
		else
		{
		echo $row_cou['donum'];
		}
		
		//echo "delete from tbl_orders where id=".$val;
		mysql_query("delete from tbl_orders where id=".$val);
		
		
	}
}
?>
