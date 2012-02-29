<?php
class Admin_vehiclegrid extends Controller 
{
	
	function __construct() 
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
		
function Strip($value)
{
	if(get_magic_quotes_gpc() != 0)
  	{
    	if(is_array($value))  
			if ( array_is_associative($value) )
			{
				foreach( $value as $k=>$v)
					$tmp_val[$k] = stripslashes($v);
				$value = $tmp_val; 
			}				
			else  
				for($j = 0; $j < sizeof($value); $j++)
        			$value[$j] = stripslashes($value[$j]);
		else
			$value = stripslashes($value);
	}
	return $value;
}
function array_is_associative ($array)
{
    if ( is_array($array) && ! empty($array) )
    {
        for ( $iterator = count($array) - 1; $iterator; $iterator-- )
        {
            if ( ! array_key_exists($iterator, $array) ) { return true; }
        }
        return ! array_key_exists(0, $array);
    }
    return false;
}
// Include the information needed for the connection to
// MySQL data base server. 

//include("dbconfig.php");
//since we want to use a JSON data we should include
//encoder and decoder for JSON notation
//If you use a php >= 5 this file is not needed
include('Services_JSON.php');
include('dbconfig.php');
// create a JSON service
$json = new Services_JSON();

// to the url parameter are added 4 parameter
// we shuld get these parameter to construct the needed query
// for the pager

// get the requested page
$page = $_REQUEST['page'];
// get how many rows we want to have into the grid
// rowNum parameter in the grid




$limit=$_REQUEST['rows'];

//echo $limit;
// get index row - i.e. user click to sort
// at first time sortname parameter - after that the index from colModel

$sidx = $_REQUEST['sidx'];
//echo $sidx;
// sorting order - at first time sortorder
$sord = $_REQUEST['sord']; 

//echo $sord;

// if we not pass at first time index use the first column for the index
if(!$sidx) $sidx =1;
$wh = "";
$searchOn = Strip($_REQUEST['_search']);

if($searchOn=='true') 
{
	$fld = Strip($_REQUEST['searchField']);
	
	if( $fld=='id' || $fld =='vehiclenum' || $fld =='drivernamename' || $fld =='mobilenumber' || $fid=='transportname') 
	{
		$fldata = Strip($_REQUEST['searchString']);
		$foper = Strip($_REQUEST['searchOper']);
		// costruct where
		$wh .= " AND ".$fld;
		switch ($foper) 
		{
			case "bw":
				$fldata .= "%";
				$wh .= " LIKE '".$fldata."'";
				break;
			case "eq":
				if(is_numeric($fldata)) 
				{
					$wh .= " = ".$fldata;
				} else {
					$wh .= " = '".$fldata."'";
				}
				break;
			case "ne":
				if(is_numeric($fldata)) {
					$wh .= " <> ".$fldata;
				} else {
					$wh .= " <> '".$fldata."'";
				}
				break;
			case "lt":
				if(is_numeric($fldata)) {
					$wh .= " < ".$fldata;
				} else {
					$wh .= " < '".$fldata."'";
				}
				break;
			case "le":
				if(is_numeric($fldata)) {
					$wh .= " <= ".$fldata;
				} else {
					$wh .= " <= '".$fldata."'";
				}
				break;
			case "gt":
				if(is_numeric($fldata)) {
					$wh .= " > ".$fldata;
				} else {
					$wh .= " > '".$fldata."'";
				}
				break;
			case "ge":
				if(is_numeric($fldata)) {
					$wh .= " >= ".$fldata;
				} else {
					$wh .= " >= '".$fldata."'";
				}
				break;
			case "ew":
				$wh .= " LIKE '%".$fldata."'";
				break;
			case "ew":
				$wh .= " LIKE '%".$fldata."%'";
				break;
			default :
				$wh = "";
		}
	}
}
// connect to the MySQL database server
$db = mysql_connect($dbhost, $dbuser, $dbpassword)
or die("Connection Error: " . mysql_error());

// select the database
mysql_select_db($database) or die("Error conecting to db.");

// calculate the number of rows for the query. We need this to paging the result


$result = mysql_query("SELECT COUNT(*) AS count FROM tbl_vehicles where id > 0".$wh);

$row = mysql_fetch_array($result,MYSQL_ASSOC);
$count = $row['count'];
if( $count >0 ) 
{
	$total_pages = round($count/$limit);
	$total=$total_pages+1;
	
//	$numrecords=$total*$limit;
	$actrecords=$total_pages*$limit;
	
	if($count > $actrecords )
	$total_pages=$total_pages+1;
	else
	$total_pages=$total_pages;
} else {
	$total_pages = 0;
}
// calculation of total pages for the query


// if for some reasons the requested page is greater than the total
// set the requested page to total page
if ($page > $total_pages) $page=$total_pages;

// calculate the starting position of the rows
$start = $limit*$page - $limit; // do not put $limit*($page - 1)
// if for some reasons start position is negative set it to 0
// typical case is that the user type 0 for the requested page
if($start <0) $start = 0;

// the actual query for the grid data


$SQL = "SELECT  id,vehiclenum,drivername,mobilenumber,transportname from tbl_vehicles where id > 0 ".$wh. " ORDER BY ".$sidx." ". $sord." LIMIT ".$start." , ".$limit;

//echo $SQL;
$result = mysql_query( $SQL ) or die("Couldn t execute query.".mysql_error());

// constructing a JSON
$responce->page = $page;
$responce->total = $total_pages;
$responce->records = $count;
$i=0;
while($row = mysql_fetch_array($result,MYSQL_ASSOC))
 {
    $responce->rows[$i]['id']=$row['id'];
    $responce->rows[$i]['cell']=array($row['id'],$row['vehiclenum'],$row['drivername'],$row['mobilenumber'],$row['transportname'],"<button id='edit_idval'  class='ui-button ui-state-default ui-corner-all' style='height:18px; width:70px;' value='$row[id]' onClick=edit_vehicle('$row[id]')>Edit
</button>","<button id='delete_idval'  class='ui-button ui-state-default ui-corner-all' style='height:18px; width:70px;' value='$row[id]' onClick=delete_vehicle('$row[id]')>Delete
</button>");
    $i++;
}
// return the formated data
echo $json->encode($responce);
	}
	
	
}
?>