<?php
class Admin_orders extends Controller 
{
	
	function Admin_orders() 
	{
		parent::Controller();
		
		
	$this->load->model("user_model");
 
  
  if($this->user_model->isValidUser())
{
// echo $this->db_session->userdata('u_name');
echo "<script>window.location.href='".base_url()."index.php/login/loginsuggestion'</script>";
}
		$this->load->helper('url');
		$this->load->database();
		$this->load->model("admin_orders_model");
	}
	
	function index() 
	{
		
		$this->load->view('admin/admin_ordercreate');
	}
	
	function ordersubmit()
	{
	$this->admin_orders_model->add_order($_POST);
	}
		
	function editorder($val)
	{
	$this->load->view('admin/admin_orderedit',$val);
	}
	
	function orderupdate()
	{
	//echo 'hi';
	$this->admin_orders_model->edit_order($_POST);
	}
	
	function order_deactive($val)
	{
	//echo 'hi';
	$this->admin_orders_model->deactive_order($val);
	}
	
	
	function ordersview() 
	{
		
		$this->load->view('admin/admin_ordersview');
	}
	
	function sendtofactory() 
	{
		
		$this->load->view('admin/admin_orderstofactory');
	}
	
	function sendtofactorysubmit() 
	{
		
		$this->admin_orders_model->orderssendtofactory($_POST);
	}


    
	
		function order_details_report($val) 
	{
	
		$this->load->view('admin/order_details',$val);
		}
		
		
		function product_order_details_report($val) 
	   {
	   $this->load->view('admin/product_order_details',$val);
		}
		
		
		function printview($val) 
	{
	    //echo $val;
		$this->load->view('admin/order_details_print',$val);
		}
		
		function reportsprintview($val) 
	{
	    //echo $val;
		$this->load->view('admin/order_details_reportprint',$val);
		}
		
		
		function allordersprintview($val) 
	{
	    //echo $val;
		$this->load->view('admin/admin_allordersprint',$val);
		}
		
		
		function pendingordersprintview($val) 
	{
	    //echo $val;
		$this->load->view('admin/admin_pendingordersprint',$val);
		}
		
		
		
		function loadingordersprintview($val) 
	{
	    //echo $val;
		$this->load->view('admin/admin_loadingordersprint',$val);
		}
		
		
		function show_users($val)
		{
		//echo $val;
		if($val=='Wholesaler' || $val=='Distributor' || $val=='Dealers' || $val=='Stockist'  || $val=='Industrial%20Customer')
		{
		$distributors='';
		$ctype=strpos($val,'%20');if($ctype==true){$newval= str_replace("%20"," ",$val);}else{$newval=$val;}
		//echo $newval;
		//echo "select *from tbl_distributors where customertype='".$newval."'";
		$res_dis=mysql_query("select *from tbl_distributors where customertype='".$newval."'");
		while($row_dis=mysql_fetch_array($res_dis))
		{
		$distributors=$distributors."d-".$row_dis['id'].":".$row_dis['dname'].",";
		}
		echo $distributors;
		}
		else
		if($val=='Branch')
		{
	//echo 'hi';
		$branches='';
		$res_br=mysql_query("select *from tbl_branches");
		while($row_br=mysql_fetch_array($res_br))
		{
		$branches=$branches."b-".$row_br['id'].":".$row_br['branchname'].",";
		}
		echo $branches;
		}
		else
		{
		echo 'Other';
		}
		
		}

		function getcity($val)
		{
		echo $val;
		}



function dialyordersprintview($val) 
	{
	//print_r($val);
	 //$str=str_replace("/",":",$val);	
		$this->load->view('admin/admin_dialyordersprint',$val);
		}
		
		function weeklyordersprintview($val) 
	{
	//print_r($val);
	 //$str=str_replace("/",":",$val);	
		$this->load->view('admin/admin_weeklyordersprint',$val);
		}
		

function show_densities($val)
{
	
	$val=explode(":",$val);
	$densities='';
	$newval='';
	$value=$val[1];
	$space=strpos($value,'%20');if($space==true){$newval= str_replace("%20"," ",$value);}else{$newval=$value;}
	//echo $val[1];
	//echo $newval;
	//echo $value;
	//echo "select density from item_densities where variety='".$newval."' and itemname='".$val[2]."'";
	$res=mysql_query("select density from item_densities where variety='".$newval."' and itemname='".$val[2]."'");
	while($row=mysql_fetch_array($res))
	{
	$densities=$densities.$row['density'].",";	
	}
	$densities=$val[0].",".$val[2].",".$densities;
	echo $densities;
}


function show_bundles($val)
{

$val=explode(":",$val);
//print_r($val);
//echo $val[0];
if($val[2]=='mm')
{
$width=$val[2]/25.4;
}
else
$width=$val[1];
if($width<=48)
{
$bundels=800/$val[4];
$bundelsapp=round($bundels);
//$tbundle=round($val[0]/$bundels);
$tbundle=round($val[0]*$bundelsapp);
$tbundle=$tbundle.':'.$val[3].':'.$val[5];
echo $tbundle;
}
if($width>=49)
{
$bundels=600/$val[4];
$bundelsapp=round($bundels);
//$tbundle=round($val[0]/$bundels);
$tbundle=round($val[0]*$bundelsapp);
$tbundle=$tbundle.':'.$val[3].':'.$val[5];
echo $tbundle;
}
}


	
}
?>
