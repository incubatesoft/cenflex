<?php
class Factory_bundlegrid extends Controller 
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
	
	if( $fld =='donum' || $fld =='orderdate' || $fld =='orderby' || $fld =='itemname'||  $fld =='numbundles' || $fld =='density' || $fld =='width' || $fld =='height'  || $fld =='variety')
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


$result = mysql_query("SELECT COUNT(*) AS count FROM tbl_order_master a ,tbl_cuttinginstruction b where a.donum=b.donum and b.orderstatus='In Process' ".$wh);

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


$SQL = "select a.id,a.donum,a.numbundles,a.orderid,a.remainingmtrs,a.numbundles,a.mtrsleft,b.itemname,b.quantity,b.width,b.height,b.density,b.thickness,b.variety,b.packagetype,b.remarks,b.colorspecific,b.remainingbundles, b.remainingmtrs as remtrs from tbl_cuttinginstruction a,tbl_orders b where a.donum=b.donum and a.orderid=b.id  and a.cancelstatus is null and a.orderstatus!='Bundled'".$wh. " ORDER BY ".$sidx." ". $sord." LIMIT ".$start." , ".$limit;

//echo $SQL;
$result = mysql_query( $SQL ) or die("Couldn t execute query.".mysql_error());

// constructing a JSON
$responce->page = $page;
$responce->total = $total_pages;
$responce->records = $count;
$i=0;
$del='';

while($row = mysql_fetch_array($result,MYSQL_ASSOC))
 {
if($row['itemname']=='Rolls'){$height=$row['remainingmtrs'];}else{$height=$row['height'];} 
if($row['itemname']=='Rolls'){$qua=$row['mtrsleft'];}else{$qua=$row['remtrs'];} 
$res=mysql_query("select *from tbl_order_master where donum='".$row['donum']."' ");
$res1=mysql_fetch_array($res);  
    $responce->rows[$i]['id']=$row['id'];
	$responce->rows[$i]['cell']=array("<a onClick=order_details('$row[donum]')>".$row['donum']."
</a>",$res1['orderby'],$row['itemname'],$row['density'],$row['variety'],$height,$row['width'],$row['thickness'],$row['numbundles'],$qua,$row['packagetype'],$row['remarks'],$row['colorspecific'],"<button id='edit_idval'  class='ui-button ui-state-default ui-corner-all' style='height:18px; width:70px;' value='$row[orderid]' onClick=bundling('$row[id]:$row[orderid]')>Bundling
</button>");
    $i++;
}
// return the formated data
echo $json->encode($responce);
	}
	
	
}
?>