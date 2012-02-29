<?php
class Branch_orders_model extends Model 
{
	
	function Branch_orders_model()
	{
		parent::Model();
	}
	
	 
	 
	 function add_order($val) 
	{
		error_reporting("E_ALL");
     extract($val);
	
	if($customertype=="Select Type")
	echo "Select one Customer Type.";
	else
	if($customertype!="Others" && $orderfrom=="Select User")
	echo "Order From required.";
	else
	if($customertype=="Others" && $txtorderfrom=="")
	echo "Order From required.";
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
	
	if($sheetnum==$sheetcount && $cushionnum==$cushionscount && $rollsnum==5)
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
	
	
	
	if($proirity=="Specify Date")
	$proirity=$dispatchdate;
	
	if($customertype=="Others")
	$orderfr=$txtorderfrom;
	else
	$orderfr=$orderfrom;
	
	//echo "insert into tbl_order_master(donum,orderdate,orderby,usertype,priority,status,packagetype,active) values('".$orderno."','".$odate."','".$user."','".$customertype."','".$proirity."','New','".$packagetype."','Yes')";
	//echo "select *from tbl_branches where username='".$this->db_session->userdata('u_name')."'";
	$res=mysql_query("select *from tbl_branches where username='".$this->db_session->userdata('u_name')."'");
       $row=mysql_fetch_array($res);
	   
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

$date=date('d/m/Y');
$res_branch=mysql_query("select *from tbl_branches where username='".$this->db_session->userdata('u_name')."'");
$row_branch=mysql_fetch_array($res_branch);
//echo "insert into tbl_order_master(donum,orderdate,orderby,usertype,priority,status,packagetype,active,orderto,remarks,authorisedname,authoriseddesignation,ordertype,ponum,podate) values('".$donum."','".$date."','".$orderfr."','".$customertype."','".$proirity."','New','".$packagetype."','Yes','".$row['branchname']."','".$remarks."','".$oname."','".$odesignation."','".$ordertype."','".$ponum."','".$podate."')";
	
	mysql_query("insert into tbl_order_master(donum,orderdate,orderby,usertype,priority,status,packagetype,active,orderto,remarks,authorisedname,authoriseddesignation,ordertype,ponum,podate) values('".$donum."','".$date."','".$orderfr."','".$customertype."','".$proirity."','New','".$$packagetype."','Yes','".$row_branch['branchname']."','".$remarks."','".$oname."','".$odesignation."','".$ordertype."','".$ponum."','".$podate."')");
	
	//echo "insert into tbl_order_master(donum,orderdate,orderby,usertype,priority,status,packagetype,active,orderto,remarks,authorisedname,authoriseddesignation,ordertype,ponum,podate) values('".$orderno."','".$odate."','".$orderfr."','".$customertype."','".$proirity."','New','".$packagetype."','Yes','".$row['branchname']."','".$remarks."','".$oname."','".$odesignation."','".$ordertype."','".$ponum."','".$podate."')";
	
	
	for($i=1;$i<=$sheetcompletenum;$i++)
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
	
	if($$bundles=="")
	$$bundles=1;
	mysql_query("insert into tbl_orders(donum,itemname,quantity,numbundles,width,height,density,thickness,variety,remainingbundles,status,packagetype,remarks,colorspecific,widthtype,heighttype,remainingmtrs,cancelledbundles) values('".$donum."','Sheets','".$$bundles."','".$$quantity."','".$$width."','".$$length."','".$$density."','".$$thickness."','".$$variety."','".$$quantity."','New','".$$package."','".$$sremarks."','".$$color."','".$$widthtype."','".$$lengthtype."','".$$bundles."','0')");
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
	mysql_query("insert into tbl_orders(donum,itemname,quantity,numbundles,width,height,density,thickness,variety,remainingbundles,status,packagetype,remarks,colorspecific,widthtype,heighttype,remainingmtrs,cancelledbundles) values('".$donum."','Cushions','".$$cbundles."','".$$cquantity."','".$$cwidth."','".$$clength."','".$$cdensity."','".$$cthickness."','".$$cvariety."','".$$cquantity."','New','".$$packagetype."','".$$cremarks."','".$$ccolor."','".$$cwidthtype."','".$$clengthtype."','".$$cbundles."','0')");

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
	
	mysql_query("insert into tbl_orders(donum,itemname,width,height,density,thickness,variety,status,packagetype,remarks,colorspecific,widthtype,heighttype,remainingmtrs,cancelledbundles) values('".$donum."','Rolls','".$$rwidth."','".$$rlength."','".$$rdensity."','".$$rthickness."','".$$rvariety."','Sent to Factory','".$$rpackage."','".$$rremarks."','".$$rcolor."','".$$rwidthtype."','".$$rlengthtype."','".$$rlength."','0')");

	
	}	
	
	echo "Order Created Successfully. Your DO Number is <b>".$donum."</b>. Please Note this DO Number for Tracting the DO";
	}
	
	}
	}
	
	
	
	
	function orderssendtofactory($val)
	{
	error_reporting("E_ALL");
	extract($val);
	//echo $sizeof($val);
	//print_r($val);
	if(sizeof($val)==1)
 {
 echo "Please select atleast one Order to Send.";
 }	

else
{
$str=mysql_query("select * from tbl_orders where status='New' ORDER BY orderdate");
while($row=mysql_fetch_array($str))
{
$val= "chk".$row['donum'];
if((isset($val)) && $$val=="on")
{
mysql_query("update tbl_orders set status='Sent to Factory' where donum='".$row['donum']."'");
mysql_query("insert into tbl_orders_factory(donum,date,status,orderfrom) values('".$row['donum']."','".date('d-m-Y')."','New','".$row['orderby']."')");
//echo "insert into tbl_orders_factory values('".$row['donum']."','".date('d-m-Y')."','New','".$row['orderby']."')";
}


}

echo "Orders Sent to Factory Successfully.";
}
	
	
	}
	 
	 
}
?>