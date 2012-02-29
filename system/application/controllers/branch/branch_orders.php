<?php
class Branch_orders extends Controller 
{
	
	function Branch_orders() 
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
		$this->load->model("branch_orders_model");
	}
	
	function index() 
	{
		
			$this->load->view('branch/branch_home');
		
		
	}
	
	
	function ordersubmit()
	{
	$this->branch_orders_model->add_order($_POST);
	}
	
	
	function sendtofactory() 
	{
		
		$this->load->view('branch/branch_orderstofactory');
	}
	
	
	function branchordersview()
	{
	$this->load->view('branch/branch_orders');
	}
	
	function allreports()
	{
	$this->load->view('branch/branch_allorders_report2');
	}
	
	function allreports_paginate($val)
	{
	$this->load->view('branch/branch_allorders_report3',$val);
	}
	
	function pendingreports()
	{
	$this->load->view('branch/branch_pendingorders_report2');
	}
	
	function pendingreports_paginate($val)
	{
	$this->load->view('branch/branch_pendingorders_report3',$val);
	}
	
		function allordersprintview($val) 
	{
	    //echo $val;
		$this->load->view('branch/branch_allordersprint',$val);
		}
		
		function pendingordersprintview($val) 
	{
	    //echo $val;
		$this->load->view('branch/branch_pendingordersprint',$val);
		}
		
	
}
?>