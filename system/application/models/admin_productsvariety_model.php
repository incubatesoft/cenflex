<?php
class Admin_productsvariety_model extends Model 
{
	
	function Admin_productsvariety_model()
	{
		parent::Model();
	}
	
	 
	
	function add_productsvariety($val) 
	{
     extract($val);
	 //echo $fcode;

    if($pname=="Select Product")
	echo "Product Name required.";
	else
	 if($pvname=="")
	echo "Product Variety Name required.";
	//else
	 //if($pvden=="")
	//echo "Product Density required.";
	else
	{
	$res_exist=mysql_query("select * from tbl_item_varieties where itemname='".$pname."' and variety='".$pvname."'");
	if(mysql_num_rows($res_exist)==1)
	echo "Product variety already Exists.";
	else
	{
	mysql_query("insert into tbl_item_varieties(itemname,variety) values('".$pname."','".$pvname."')");
	echo "Product variety Registered Successfully.";
	}
	}
	}
	
	function add_productsdensity($val) 
	{
     extract($val);
	 //echo $fcode;

    if($pname=="Select Product")
	echo "Product Name required.";
	else
	 if($pvariety=="")
	echo "Product Variety Name required.";
	else
	 if($pdensity=="")
	echo "Product Density required.";
	else
	{
	$res_exist=mysql_query("select * from item_densities where itemname='".$pname."' and variety='".$pvariety."' and density='".$pdensity."'");
	//echo "select * from item_densities where itemname='".$pname."' and variety='".$pvariety."' and density='".$pdensity."'";
	if(mysql_num_rows($res_exist)==1)
	echo "Product Density already Exists.";
	else
	{
	mysql_query("insert into item_densities(itemname,variety,density) values('".$pname."','".$pvariety."','".$pdensity."')");
	echo "Product Density Registered Successfully.";
	}
	}
	}
	
	function edit_productsvariety($val) 
	{
     extract($val);
	 //echo $fcode;

	 if($pvname=="")
	echo "Product Variety Name required.";
	/*else
	 if($pvden=="")
	echo "Product Density required.";*/
	
	else
	{
	
	//echo $vid;
	mysql_query("update tbl_item_varieties set variety='".$pvname."' where id=".$vid);
	echo "Product variety Updated Successfully.";
	}
	}
	
	
function delete_productsvariety($val)	
{
//echo $val;
$we=mysql_query("delete from tbl_item_varieties where id=".$val);
	if($we>0)
	{
	echo "Product variety Deleted Successfully.";
	} 	
}

	function edit_productsdensity($val) 
	{
     extract($val);
	 //echo $fcode;

	 if($pvname=="")
	echo "Product Density Name required.";
	/*else
	 if($pvden=="")
	echo "Product Density required.";*/
	
	else
	{	
	//echo $vid;
	$wd=mysql_query("update item_densities set density='".$pvname."' where id=".$vid);
	if($wd>0)
	{echo "Product density Updated Successfully.";}
	
	}
	}
	
function delete_productsdensity($val)	
{
//echo $val;
$wef=mysql_query("delete from item_densities where id=".$val);
	if($wef>0)
	{
	echo "Product density Deleted Successfully.";
	} 	
}
	 
}
?>