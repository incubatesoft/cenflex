<?php
class Admin_warehouse_model extends Model 
{
	
	function Admin_warehouse_model()
	{
		parent::Model();
	}
	
	 
	
	function add_warehouse($val) 
	{
     extract($val);
	 //echo $fcode;

    if($fcode=="")
	echo "Factory Code required.";
	else
	 if($fcname=="")
	echo "Contact Person Name required.";
	else
	if($fmobile=="")
	echo "Mobile Number required.";
	else
	if($fphone=="")
	echo "Factory Phone Number required.";
	else
	if($fstreet1=="")
	echo "Address required.";
	else
	if($fcity=="")
	echo "City required.";
	else
	if($fstate=="")
	echo "State required.";
	else
	if($fpincode=="")
	echo "Pincode required.";
	else
	if($fuser=="")
	echo "User Name required.";
	else
	if($fpass=="")
	echo "Password required.";
	else
	{
	$res_exist=mysql_query("select *from tbl_login where username='".$fuser."'");
	if(mysql_num_rows($res_exist)==1)
	echo "Username already Exists.";
	else
	{
	mysql_query("insert into tbl_login(username,password,type) values('".$fuser."','".$fpass."','Factory')");
	mysql_query("insert into tbl_factory_master(factorycode,contactname,mobile,factoryphone,street1,street2,city,state,username,password,tinnumber,pincode) values('".$fcode."','".$fcname."','".$fmobile."','".$fphone."','".$fstreet1."','".$fstreet2."','".$fcity."','".$fstate."','".$fuser."','".$fpass."','".$ftin."','".$fpincode."')");
	echo "Factory Registered Successfully.";	
	mysql_query("insert into tbl_factoryusers(name,mobile,street1,street2,city,state,username,password,pincode,user,orders,orderho,cutting,loading,package) values('".$fcname."','".$fmobile."','".$fstreet1."','".$fstreet2."','".$fcity."','".$fstate."','".$fuser."','".$fpass."','".$fpincode."','Yes','Yes','Yes','Yes','Yes','Yes')");
	echo "Factory Registered Successfully.";
	}
	}
	}
	
	function warehouseupdate()
{

$this->admin_warehouse_model->edit_warehouse($_POST);
}
function edit_warehouse($val)
{
extract($val);
//echo $fcode;

if($fcode=="")
echo "Factory Code required.";
else
if($fcname=="")
echo "Contact Person Name required.";
else
if($fmobile=="")
echo "Mobile Number required.";
else
if($fphone=="")
echo "Land Phone Number required.";
else
if($fstreet1=="")
echo "Address required.";
else
if($fcity=="")
echo "City required.";
else
if($fstate=="")
echo "State required.";
else
if($fuser=="")
echo "Username required.";
else
if($fpass=="")
echo "Password required.";
else
if($fpincode=="")
echo "Pincode required.";
else
if($ftin=="")
echo "Tin number required.";

else
{
//echo "update tbl_factory_master set factorycode='".$fcode."',contactname='".$fcname."',mobile='".$fmobile."',factoryphone='".$fphone."',street1='".$fstreet1."',street2='".$fstreet2."',city='".$fcity."',state='".$fstate."',tinnumber='".$ftin."',pincode='".$fpincode."' where id=".$wid;

mysql_query("update tbl_factory_master set factorycode='".$fcode."',contactname='".$fcname."',mobile='".$fmobile."',factoryphone='".$fphone."',street1='".$fstreet1."',street2='".$fstreet2."',city='".$fcity."',state='".$fstate."',username='".$fuser."',password='".$fpass."',tinnumber='".$ftin."',pincode='".$fpincode."' where id=".$wid);

echo "Warehouse Updated Successfully.";

}
}

function delete_warehouse($val)	
{


mysql_query("delete from tbl_factory_master where id=".$val);

echo "Warehouse Deleted Successfully.";
} 
	 
}
?>