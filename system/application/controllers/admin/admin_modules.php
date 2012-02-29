<?php
class Admin_modules extends Controller 
{
	
	function Admin_modules() 
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
		$this->load->model("admin_warehouse_model");
		$this->load->model("admin_branch_model");
		$this->load->model("admin_products_model");
		$this->load->model("admin_productsvariety_model");
		$this->load->model("admin_orders_model");
	}
	
	function index() 
	{
		$this->load->view('admin/admin_home');
		
	}
	
	function warehouse() 
	{
		
		
		$this->load->view('admin/admin_warehouse');
		
		
	}
	
	function warehousesubmit()
	{
	$this->admin_warehouse_model->add_warehouse($_POST);
	}
	
	function warehouseview()
	{
	$this->load->view('admin/admin_warehouse_view');
	}
	
	function warehouseedit($val)
{
$this->load->view('admin/admin_warehouseedit',$val);
}

function warehouseupdate()
{

$this->admin_warehouse_model->edit_warehouse($_POST);
}

function warehouse_delete($val)
{

$this->admin_warehouse_model->delete_warehouse($val);
}
 
 
 
	
	function branch() 
	{
		
		$this->load->view('admin/admin_branch');
		
	}
	
	function branchsubmit()
	{
	$this->admin_branch_model->add_branch($_POST);
	}
	
	function branchview()
	{
	$this->load->view('admin/admin_branch_view');
	}
	
	function Editbranch($val)
{
$this->load->view('admin/admin_branchedit',$val);
}

function branchupdate()
{

$this->admin_branch_model->edit_branch($_POST);
}

function branch_delete($val)
{

$this->admin_branch_model->delete_branch($val);
}
 
 
 function distributor() 
	{
		
		$this->load->view('admin/admin_distributor');
		
	}
	
	function distributorsubmit()
	{
	$this->admin_branch_model->add_distributor($_POST);
	}
	
	
	function distributorsview()
	{
	$this->load->view('admin/admin_distributors_view');
	}
	
	function editdistributor($val)
{
$this->load->view('admin/admin_distributoredit',$val);
}

function distributorupdate()
{

$this->admin_branch_model->edit_distributor($_POST);
}

function distributors_delete($val)
{

$this->admin_branch_model->delete_distributor($val);
}
 
	
	
	function products() 
	{
	$this->load->view('admin/admin_products');
	}
	
	function productssubmit()
	{
	//echo "hi";
	$this->admin_products_model->add_products($_POST);
	}
	
	
	function productview()
	{
	$this->load->view('admin/admin_product_view');
	}
	
	function Editproduct($val)
{
$this->load->view('admin/admin_productedit',$val);
}

function productsupdate()
{

$this->admin_products_model->edit_products($_POST);
}

function product_delete($val)
{

$this->admin_products_model->delete_product($val);
}
 	
	
	
	function show_varieties($val)
	{
		$products="";
		$res_dis=mysql_query("select *from tbl_item_varieties where itemname='".$val."'");
		while($row_dis=mysql_fetch_array($res_dis))
		{
		$products=$products.$row_dis['variety'].",";
		}
		echo $products;
	}
	function productsvariety() 
	{
	$this->load->view('admin/admin_productsvariety');
	}
	
	function productsdensity() 
	{
	$this->load->view('admin/admin_productsdensity');
	}
	
	function productsvarietysubmit()
	{
	//echo "hi";
	$this->admin_productsvariety_model->add_productsvariety($_POST);
	}
	
	function productsdensitysubmit()
	{
	//echo "hi";
	$this->admin_productsvariety_model->add_productsdensity($_POST);
	}
	
	
	function productvarietyview() 
	{
	$this->load->view('admin/admin_productvarietyview');
	}
	
	function productdensityview() 
	{
	$this->load->view('admin/admin_productdensityview');
	}
	
	
	function Editproductvariety($val)
{
$this->load->view('admin/admin_productvarietyedit',$val);
}

function productsvarietyupdate()
	{
	//echo "hi";
	$this->admin_productsvariety_model->edit_productsvariety($_POST);
	}
	
	function pvariety_delete($val)
{
//	echo "hi";
$this->admin_productsvariety_model->delete_productsvariety($val);
}

	function Editproductdensity($val)
{
$this->load->view('admin/admin_productdensityedit',$val);
}

function productsdensityupdate()
	{
	//echo "hi";
	$this->admin_productsvariety_model->edit_productsdensity($_POST);
	}
	

	function density_delete($val)
{
//	echo "hi";
$this->admin_productsvariety_model->delete_productsdensity($val);
}


function vehicle()
{
$this->load->view('admin/admin_vehicleadd');
}
	
	function vehiclesubmit()
	{
	//echo "hi";
	$this->admin_products_model->add_vehicle($_POST);
	}
	
	function vehicleview()
	{
	$this->load->view('admin/admin_vehicle_view');
	}
	
	function editvehicle($val)
{
$this->load->view('admin/admin_vehicleedit',$val);
}
	
	
	function vehicleupdate()
{
//echo "hi";
$this->admin_products_model->edit_vehicle($_POST);
}
	
	function vehicle_delete($val)
{

$this->admin_products_model->delete_vehicle($val);
}
	
	
	function order_remove($val)
{
	//echo($val);
$this->admin_orders_model->remove_order($val);	


}
}
?>
