<?php
class Factory_reports extends Controller 
{
	
	function Factory_reports() 
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
		
		$this->load->view('factory/factory_allorders2');
		
		
	}
	
	function allorders_paginate($val) 
	{
		
		$this->load->view('factory/factory_allorders3',$val);
		
		
	}
	
	function pending() 
	{
		
		$this->load->view('factory/factory_pendingorder_report2');
			
	}
	
	function pending_wise_report($val) 
	{
		
		$this->load->view('factory/factory_pendingorder_report3', $val);
			
	}
	
	function pending_wise_ho_report() 
	{
		
		$this->load->view('factory/factory_pendingorder_report4');
			
	}
	
	
	
	function branchwise() 
	{
		
		$this->load->view('factory/factory_branchorder_report2');
		
		
	}
	
	
	function branchwise_report($val) 
	{
		
		$this->load->view('factory/factory_branchorder_report3',$val);		
		
	}
	
	function loading() 
	{
		
		$this->load->view('factory/factory_loading_report');
		
		
	}
	
	
	function productwise() 
	{
		
		$this->load->view('factory/factory_productwiseorders');
		
		
	}
	
	
		function dialy() 
	{
//echo $val;
		//echo $_REQUEST['dat1'];
		if($this->user_model->isValidUser())
{
// echo $this->db_session->userdata('u_name');
echo "<script>window.location.href='".base_url()."index.php/login/loginsuggestion'</script>";
}
	//$str=str_replace(":","/",$val);		
		$this->load->view('factory/factory_dialy_report');
		
		
	}	
	
function dialyreports($val) 
	{
		
if($val=='undefined')
{
	echo 'No';

}
else
{
//session_destroy();
$str=str_replace(":","/",$val);	
echo $str;	

//session_start();
//$_SESSION['dat'] = $str;
//$this->load->view('admin/admin_dialy_report',$str);
}


}		
	

function dialyreportview($val) 
	{
//echo $val;
$str=str_replace(":","/",$val);	
		//echo $_REQUEST['dat1'];
		
		$this->load->view('factory/factory_dialy_report1',$str);
		
		
	}	
	
	
	
	function weekly() 
	{
//echo $val;
		//echo $_REQUEST['dat1'];
		if($this->user_model->isValidUser())
{
// echo $this->db_session->userdata('u_name');
echo "<script>window.location.href='".base_url()."index.php/login/loginsuggestion'</script>";
}
	//$str=str_replace(":","/",$val);		
		$this->load->view('factory/factory_weekly_report');
		
		
	}	
	
	
	function weeklyreports($val) 
	{
		
if($val=='undefined')
{
	echo 'No';

}
else
{
//session_destroy();

$str=str_replace(":","/",$val);	
echo $str;	

//session_start();
//$_SESSION['dat'] = $str;
//$this->load->view('admin/admin_dialy_report',$str);
}


		}	
		
		function weeklyreportview($val) 
	{
//echo $val;
$str=str_replace(":","/",$val);	
		//echo $_REQUEST['dat1'];
		if($this->user_model->isValidUser())
{
// echo $this->db_session->userdata('u_name');
echo "<script>window.location.href='".base_url()."index.php/login/loginsuggestion'</script>";
}
	//$str=str_replace(":","/",$val);		
		$this->load->view('factory/factory_weekly_report1',$str);
		
		
	}			
	
}
?>