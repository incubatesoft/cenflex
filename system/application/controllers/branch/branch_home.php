<?php
class Branch_home extends Controller 
{
	
	function Branch_home() 
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
		//$this->load->model("user_model");
	}
	
	function index() 
	{
		
		//load pagination class
		
		
		// load the view
		//echo "Hello user:". $this->db_session->userdata("uname")."<a href='".base_url()."index.php/welcome/logout'>Logout</a>";
		$this->load->view('branch/branch_home');
		
		
	}
	
	
	
	
	
}
?>