<?php
class Admin_warehousetable extends Controller 
{
	
	function Admin_warehousetable() 
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
		
	
		$per_page = 5; 
      
		$page=1;
		
//get table contents
$start = ($page-1)*$per_page;
$sql = "SELECT  id,factorycode,contactname,mobile,factoryphone,street1,street2,city,state,username,password,pincode,tinnumber from tbl_factory_master where id>0  LIMIT ".$start." , ".$per_page;
echo $sql;
$rsd = mysql_query($sql);


/*echo "
<div id='search'>
        <label for='filter'>Filter</label> <input type='text' name='filter' value='' id='filter' onkeyup=search(this.value) />
   </div>";*/

	echo "<table width='800px' id=opentable style='font-family:Arial'>
		<thead>
		<tr><td colspan=15 style='border-bottom:1px solid #B3B3B3; font-weight:bold;color:#3B5998;'>Category<td></tr>
		<tr><td><td></tr>
		<tr style='color:#3B5998;'><td>Sno</td><td>factory code</td><td>Contact name</td><td>mobile</td><td>factoryphone</td><td>street1</td><td>street2</td><td>city</td><td>state</td><td>username</td><td>password</td><td>pincode</td><td>tinnumber</td><td>edit</td><td>delete</td></tr>
		<tr><td><td></tr>
			</thead>
			<tbody>";

		//Print the contents
		
		while($row = mysql_fetch_array($rsd))
		{
			
		

		echo "<tr><td style='color:#B2b2b2; padding-left:4px' width='30px'>$row[id]</td><td>$row[factorycode]</td>
<td>$row[contactname]</td><td>$row[mobile]</td><td>$row[factoryphone]</td><td>$row[street1]</td><td>$row[street2]</td><td>$row[city]</td><td>$row[state]</td><td>$row[username]</td><td>$row[password]</td><td>$row[pincode]</td><td>$row[tinnumber]</td><td>edit</td><td>delete</td></tr>";
		}
		echo "</tbody>
	</table>";


	}
	
	function pagination()
	{
			$per_page = 5; 
      		$page= $this->uri->segment(4);
		
//get table contents
$start = ($page-1)*$per_page;
$sql = "SELECT  id,factorycode,contactname,mobile,factoryphone,street1,street2,city,state,username,password,pincode,tinnumber from tbl_factory_master where id>0  LIMIT ".$start." , ".$per_page;
echo $sql;
$rsd = mysql_query($sql);



/*echo "
<div id='search'>
        <label for='filter'>Filter</label> <input type='text' name='filter' value='' id='filter' onkeyup=search(this.value) />
   </div>";*/

	echo "<table width='800px' id=opentable style='font-family:Arial'>
		<thead>
		<tr><td colspan=15 style='border-bottom:1px solid #B3B3B3; font-weight:bold;color:#3B5998;'>Category<td></tr>
		<tr><td><td></tr>
		<tr style='color:#3B5998;'><td>Sno</td><td>factory code</td><td>Contact name</td><td>mobile</td><td>factoryphone</td><td>street1</td><td>street2</td><td>city</td><td>state</td><td>username</td><td>password</td><td>pincode</td><td>tinnumber</td><td>edit</td><td>delete</td></tr>
		<tr><td><td></tr>
			</thead>
			<tbody>";

		//Print the contents
		
		while($row = mysql_fetch_array($rsd))
		{
			
		

		echo "<tr><td style='color:#B2b2b2; padding-left:4px' width='30px'>$row[id]</td><td>$row[factorycode]</td>
<td>$row[contactname]</td><td>$row[mobile]</td><td>$row[factoryphone]</td><td>$row[street1]</td><td>$row[street2]</td><td>$row[city]</td><td>$row[state]</td><td>$row[username]</td><td>$row[password]</td><td>$row[pincode]</td><td>$row[tinnumber]</td><td>edit</td><td>delete</td></tr>";
		}
		echo "</tbody>
	</table>";

	}
	
	function search()
	{
			
		$sql = "SELECT  id,factorycode,contactname,mobile,factoryphone,street1,street2,city,state,username,password,pincode,tinnumber from tbl_factory_master where id='".$this->uri->segment(4)."' ";
		//echo $sql;
		$rsd = mysql_query($sql);
				
			echo "<tbody>";
		
				//Print the contents
		
		while($row = mysql_fetch_array($rsd))
		{
				echo "<tr><td style='color:#B2b2b2; padding-left:4px' width='30px'>$row[id]</td><td>$row[factorycode]</td>
<td>$row[contactname]</td><td>$row[mobile]</td><td>$row[factoryphone]</td><td>$row[street1]</td><td>$row[street2]</td><td>$row[city]</td><td>$row[state]</td><td>$row[username]</td><td>$row[password]</td><td>$row[pincode]</td><td>$row[tinnumber]</td><td>edit</td><td>delete</td></tr>";
		}		
		
		echo "</tbody>";
	}

}	
?>