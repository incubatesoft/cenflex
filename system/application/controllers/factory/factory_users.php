<?php
class Factory_users extends Controller 
{
	
	function Factory_users() 
	{
		parent::Controller();
		
		
	
		$this->load->helper('url');
		$this->load->database();
		$this->load->model("user_model");
		$this->load->model("factory_orders_model");
	}
	
	function index() 
	{
		
		//load pagination class
		
		
		// load the view
		//echo "Hello user:". $this->db_session->userdata("uname")."<a href='".base_url()."index.php/welcome/logout'>Logout</a>";
		$this->load->view('factory/factory');
		
		
	}

    function usercreation()
    {
        $this->load->view('factory/factory_users');
    }
	
	function usersubmit()
	{
	$this->user_model->createuser($_POST);
	}
	
	function userview()
	{
		$this->load->view("factory/factory_usersview");
	}
	function deleteuser($val)
	{
//		echo $val;
$user=mysql_query("select * from tbl_factoryusers where id='".$val."'");
$uname=mysql_fetch_array($user);
mysql_query("delete from tbl_login where username='".$uname['username']."' "); 
$res=mysql_query("delete from tbl_factoryusers where id='".$val."'");
if($res>0)
{echo "deleted";}else { echo "not";}
	}
	
	
function vehicle()
{
$this->load->view('factory/factory_vehicleadd');
}
	
	function vehiclesubmit()
	{
	//echo "hi";
	$this->admin_products_model->add_vehicle($_POST);
	}
	
	function vehicleview()
	{
	$this->load->view('factory/factory_vehicle_view');
	}
	
function ordercreate() 
	{
		
		$this->load->view('factory/factory_ordercreate');
		
		
	}
	
	function ordersubmit()
	{
	$this->factory_orders_model->add_order($_POST);
	}
	
	function ordersview() 
	{
		
		$this->load->view('factory/factory_ordersview');
	}
	
	
	
	
}
?>