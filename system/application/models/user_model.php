<?php
class User_model extends Model 
{
	
	function User_model()
	{
		parent::Model();
	}
	
	 
	
	function isValidUser()
{
$user_obj = $this->db_session->userdata('u_name');

//echo $user_obj;

if(empty($user_obj))
{
return true;
}
else

return false;
}

function createuser($val)
{
			error_reporting("E_ALL");
	extract($val);
	 //echo $fcode;
	 
if($bcname=="")
	echo "Name required.";
	else
	if($bmobile=="")
	echo "Mobile Number required.";
	else
	if($bstreet1=="")
	echo "Address required.";
	else
	if($bcity=="")
	echo "City required.";
	else
	if($bstate=="")
	echo "State required.";
	else
	if($bpincode=="")
	echo "Pincode required.";
	else
	if($usermodule=="" && $order=="")
	echo "Check atleast one module";
	else
	if($order=='on' && $orderh=="" && $cutting=="" && $loading=="" && $package=="")
	echo "Check atleast one submodule";
	else
	if($usermodule=='on' && $orderc=="" && $userc=="" && $vehiclec=="")
	echo "Check atleast one submodule";
	else
	if($buser=="")
	echo "User Name required.";
	else
	if($bpass=="")
	echo "Password required.";
	else
	if($bcpass=="")
	echo "Confirm Password required.";
	else
	if($bpass!=$bcpass)
	echo "Passwords are not matched.";
	else
	{

	if($usermodule=='on')
	{
		$user="Yes";
	}
	else
	{
		$user="No";
	}
		if($userc=='on')
	{
		$userc='Yes';
		
	}
	else
	{
		$userc='No';
	}
		if($vehiclec=='on')
	{
		$vehiclec='Yes';
		
	}
	else
	{
		$vehiclec='No';
	}
		if($orderc=='on')
	{
		$orderc='Yes';
		
	}
	else
	{
		$orderc='No';
	}
	if($order=='on')
	{
		$order="Yes";
		
	}
	else
	{
		$order="No";
	}
	if($orderh=='on')
	{
		$orderho='Yes';
	}
	else
	{
		$orderho='No';
	}
	if($cutting=='on')
	{
		$cutting='Yes';
		
	}
	else
	{
		$cutting='No';
	}
	if($loading=='on')
	{
		$loading='Yes';
		
	}
	else
	{
		$loading='No';
	}
	if($package=='on')
	{
		$package='Yes';
		
	}
	else
	{
		$package='No';
	}
	
	$res_exist=mysql_query("select *from tbl_login where username='".$buser."'");
	if(mysql_num_rows($res_exist)==1)
	echo "Username already Exists.";
	else
	{
	mysql_query("insert into tbl_login(username,password,type) values('".$buser."','".$bpass."','Factory')");
	
	//echo "insert into tbl_factoryusers(name,mobile,street1,street2,city,state,username,password,pincode,user,order,orderho,cutting,loading,package) values('".$bcname."','".$bmobile."','".$bstreet1."','".$bstreet2."','".$bcity."','".$bstate."','".$buser."','".$bpass."','".$bpincode."','".$user."','".$order."','".$orderho."','".$cutting."','".$loading."','".$package."')";
	
	mysql_query("insert into tbl_factoryusers(name,mobile,street1,street2,city,state,username,password,pincode,user,orders,orderho,cutting,loading,package,ucreation,vcreation,ocreation) values('".$bcname."','".$bmobile."','".$bstreet1."','".$bstreet2."','".$bcity."','".$bstate."','".$buser."','".$bpass."','".$bpincode."','".$user."','".$order."','".$orderho."','".$cutting."','".$loading."','".$package."','".$userc."','".$vehiclec."','".$orderc."')");
	//echo "insert into tbl_factoryusers(name,mobile,street1,street2,city,state,username,password,pincode,user,orders,orderho,cutting,loading,package,ucreation,vcreation,ocreation) values('".$bcname."','".$bmobile."','".$bstreet1."','".$bstreet2."','".$bcity."','".$bstate."','".$buser."','".$bpass."','".$bpincode."','".$user."','".$order."','".$orderho."','".$cutting."','".$loading."','".$package."','".$userc."','".$vehiclec."','".$orderc."')";
	echo "User Registered Successfully.";
	}
	}
}
}
?>