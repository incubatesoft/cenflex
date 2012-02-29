<?php
class Login extends Controller 
{
	
	function __construct() 
	{
		parent::Controller();
		$this->load->helper('url');
		$this->load->database();
	}
	
	function index() 
	{
		
		//load pagination class
		
		
		// load the view
		$this->load->view('login_view');
	}
	
	function check()
	{

	$user_name=htmlspecialchars($_POST['user_name'],ENT_QUOTES);
	//echo $user_name;
	$auth_error='';
    $pass=$_POST['password'];
    $role=$_POST['role']; 
	//echo $role;
//now validating the username and password
   // $this->load->model('user_model');
	//echo "SELECT username, password,type FROM tbl_login WHERE username='".$user_name."' and password='".$pass."' and type='".$role."'";
    $sql="SELECT username, password,type FROM tbl_login WHERE username='".$user_name."' and password='".$pass."' and type='".$role."'";
	//echo "SELECT username, password,type FROM tbl_login WHERE username='".$user_name."' and password='".$pass."' and type='".$role."'";
   //$data=array();
   $result=mysql_query($sql);
    //$data['results']=$this->user_model->get_user("user_name='".$user_name."'");
    $row=mysql_fetch_array($result);
//echo $data[results];
//if username exists
        
   if(mysql_num_rows($result)>0)
    {
	
	$this->db_session->set_userdata('u_name', $user_name);
	if($role=="Admin")
	echo 'adminyes';
	
	
	if($role=="Factory")
	echo 'factoryyes';
	
	if($role=="Branch")
	echo 'branchyes';
	//compare the password
	
}

	else
	$auth_error = '<div id="notification_error">The login info is not correct.</div>';

    echo $auth_error;
	//$this->db_session->set_userdata("urole",'superadmin');
	//$this->db_session->set_userdata("uname",'sadmin');
		
	}
	
	
	
	
	
	
	
	function view()
	{
	
		
		// load the view
		redirect("admin/admin_home");
	}
	
	function factoryview()
	{
	
		
		// load the view
		redirect("factory/factory_home");
	}
	
	function branchview()
	{
		// load the view
		redirect("branch/branch_home");
	}
	
	function logout()
	{
		$this->db_session->sess_destroy();
		redirect("login");
	}
	
	function loginsuggestion()
	{
		$this->load->view('loginsuggestion');
	}
}
?>