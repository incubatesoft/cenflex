<?php
class Admin_products_model extends Model 
{
	
	function Admin_products_model()
	{
		parent::Model();
	}
	
	 
	
	function add_products($val) 
	{
     extract($val);
	 //echo $fcode;

    if($pcode=="")
	echo "Product Code required.";
	else
	 if($pname=="")
	echo "Product Name required.";
	else
	 if($punit=="")
	echo "Product Units required.";
	else
	{
	$res_exist=mysql_query("select * from tbl_itemmaster where itemname='".$pname."'");
	if(mysql_num_rows($res_exist)==1)
	echo "Product already Exists.";
	else
	{
	mysql_query("insert into tbl_itemmaster(itemcode,itemname,unit) values('".$pcode."','".$pname."','".$punit."')");
	echo "Product Registered Successfully.";
	}
	}
	}
	
	function edit_products($val) 
	{
     extract($val);
	 //echo $fcode;

    
	 if($pname=="")
	echo "Product Name required.";
	else
	 if($punit=="")
	echo "Product Units required.";
	
	else
	{
	mysql_query("update tbl_itemmaster set itemname='".$pname."',unit='".$punit."' where id=".$pid);
	echo "Product Updated Successfully.";
	
	}
	}
	
	
function delete_product($val)	
{
$res=mysql_query("select itemname from tbl_itemmaster where id=".$val);
$row=mysql_fetch_array($res);

$res_itemv=mysql_query("select *from tbl_item_varieties where itemname='".$row['itemname']."'");
if(mysql_num_rows($res_itemv)==0)
{
mysql_query("delete from tbl_itemmaster where id=".$val);

echo "Product Deleted Successfully.";
}
else
echo "Items exsist under this Product.";
} 	
	
	
	function add_vehicle($val)
	{
	extract($val);
	mysql_query("insert into tbl_vehicles(vehiclenum,drivername,mobilenumber,transportname) values('".$vnumber."','".$dname."','".$mobile."','".$transport."')");
	echo "Vehicle Added Successfully.";
	}
	
	
	function edit_vehicle($val) 
	{
     extract($val);
	 //echo $fcode;
//print_r($val);
    
	 if($vnumber=="")
	echo "Vehicle Number required.";
	else
	 if($transport=="")
	echo "Transport Name required.";
	else
	 if($dname=="")
	echo "Driver Name required.";
	
	else
	 if($mobile=="")
	echo "Mobile Number required.";
	
	else
	{
	mysql_query("update tbl_vehicles set vehiclenum='".$vnumber."',drivername='".$dname."',mobilenumber='".$mobile."',transportname='".$transport."' where id=".$pid);
	echo "Vehicle Updated Successfully.";
	
	}
	}
	 
	 
	 
	 function delete_vehicle($val)	
{

mysql_query("delete from tbl_vehicles where id=".$val);

echo "Vehicle Deleted Successfully.";
}
}
?>