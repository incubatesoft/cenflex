<?php
class Admin_reports extends Controller 
{
	
	function Admin_reports() 
	{
		parent::Controller();
		
		
			
  $this->load->model("user_model");
 
  
  if($this->user_model->isValidUser())
{
// echo $this->db_session->userdata('u_name');
echo "<script>window.location.href='".base_url()."index.php/login/loginsuggestion'</script>";
}
	    $this->load->helper('cookie');
		$this->load->helper('url');
		$this->load->database();
		$this->load->model("admin_orders_model");
	}
	
	function index() 
	{
		
		$this->load->view('admin/admin_allorders2');		
		
	}
	
	
	function all_reports($val) 
	{
		
		$this->load->view('admin/admin_allorders3',$val);		
		
	}
	
	
	function all_ho_reports() 
	{
		
		$this->load->view('admin/admin_allorders4');		
		
	}
	
	function pending() 
	{
		
		$this->load->view('admin/admin_pendingorder_report2');		
		
	}
	
	function pendingwise_report($val) 
	{
		
		$this->load->view('admin/admin_pendingorder_report3',$val);		
		
	}
	
	function pendingwise_other_ho_report() 
	{
		
		$this->load->view('admin/admin_pendingorder_report4');		
		
	}
	
	function branchwise() 
	{
		
		$this->load->view('admin/admin_branchorder_report2');	
		
	}
	
	function branchwise_report($val) 
	{
		
		$this->load->view('admin/admin_branchorder_report3',$val);	
		
	}
	
	function loading() 
	{
		
		$this->load->view('admin/admin_loading_report');
		
		
	}
	
	function productwise() 
	{
		
		$this->load->view('admin/admin_productwiseorders');
		
		
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
		$this->load->view('admin/admin_dialy_report');
		
		
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
		
		$this->load->view('admin/admin_dialy_report1',$str);
		
		
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
		$this->load->view('admin/admin_weekly_report');
		
		
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
		$this->load->view('admin/admin_weekly_report1',$str);
		
		
	}	
	
	
	function loadingreports($val)
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


}


}


function loadingreportview($val)
{
//echo $val;
$str=str_replace(":","/",$val);
//echo $_REQUEST['dat1'];

$this->load->view('admin/admin_loading_report1',$str);


}

function loadingreportfactoryview($val)
{
//echo $val;
$str=str_replace(":","/",$val);
//echo $_REQUEST['dat1'];

$this->load->view('factory/factory_loading_report1',$str);


}

		
	
}
?>