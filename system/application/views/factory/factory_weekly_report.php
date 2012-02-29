<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<LINK REL="SHORTCUT ICON" HREF="<?php echo base_url(); ?>images/malinilogo.png">
<title>Shree Malani Foams </title>

<script type="text/javascript">
base_url = '<?php echo base_url();?>index.php/';
base_img=	'<?php echo base_url();?>public/images';
base_js_url = '<?php echo base_url();?>';
base_spinner = '<?php echo base_url();?>public/styles/images/spinner.gif';
gridimgpath = '<?php echo base_url();?>public/themes/basic/images';
</script>
<?php
//echo ($_SERVER['HTTP_USER_AGENT']);
include "dbconfig.php";
    if ( strpos($_SERVER['HTTP_USER_AGENT'], 'Gecko') && strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') || strpos($_SERVER['HTTP_USER_AGENT'], 'Gecko') && strpos($_SERVER['HTTP_USER_AGENT'], 'Safari') )
   {
  
    ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/stylechrome.css" type="text/css" />
<?php
}

 else if ( strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') || strpos($_SERVER['HTTP_USER_AGENT'], 'Presto') )
{
?>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/styleall.css" type="text/css" />
<?php
}
else
{
?>
<link rel='stylesheet' href='<?php echo base_url(); ?>css/styleall.css' type='text/css' />
<?php
}
?>

<script type="text/javascript" src='<?php echo base_url(); ?>js/jquery.js' language="javascript"></script>
<script src="<?php echo base_url(); ?>js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script src="<?= base_url();?>js/library.js" type="text/javascript"></script>
<script src="<?=base_url();?>js/utils.js" type="text/javascript"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>js/jquery.dataTables.js"></script>

	<link rel="stylesheet" href="<?php echo base_url(); ?>css/demo_table.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/demo_page.css" type="text/css" />

	<link href="<?php echo base_url();?>public/styles/components.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>public/css/ship.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url();?>public/js/blockUI.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>public/js/jqui.js" type="text/javascript"></script>

<script src="<?php echo base_url();?>public/js/utils.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo  base_url();?>ui/ui.core.js"></script>
	<script type="text/javascript" src="<?php echo  base_url();?>ui/ui.draggable.js"></script>
	<script type="text/javascript" src="<?php echo  base_url();?>ui/ui.resizable.js"></script>
	<script type="text/javascript" src="<?php echo  base_url();?>ui/ui.dialog.js"></script>
	<script type="text/javascript" src="<?php echo  base_url();?>ui/effects.core.js"></script>
	<script type="text/javascript" src="<?php echo  base_url();?>ui/effects.highlight.js"></script>
	<script type="text/javascript" src="<?php echo  base_url();?>themes/external/bgiframe/jquery.bgiframe.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>js/jquery.datepick.js"></script>
<link type="text/css" href="<?php echo base_url();?>css/jquery.datepick.css" rel="stylesheet" />

<link type="text/css" href="<?php echo  base_url();?>themes/base/ui.all.css" rel="stylesheet" />
<script type="text/javascript">
base_url = '<?= base_url();?>index.php/';
function showreports()
{ 
//alert('hi');

var customer=document.getElementById('fdate').value
var customer1=document.getElementById('tdate').value
//var semester=document.getElementById('semesters').options[document.getElementById('semesters').selectedIndex].text;
var value=customer.split('/');
var value1=customer1.split('/');
//alert(value);
if(value!='' && value1!='')
var da=value[0]+":"+value[1]+":"+value[2]+"-"+value1[0]+":"+value1[1]+":"+value1[2];
else
da=='';
//alert(da);
xmlHttp=GetXmlHttpObject();
if (xmlHttp==null)
 {
 alert ("Browser does not support HTTP Request");
 return;
 }
 

var url=base_url+'factory/factory_reports/weeklyreports/'+da;
//url=url+"&q="+str;
//alert(url);
//alert(url);
/*url=url+"&sid="+Math.random()*/
xmlHttp.onreadystatechange=stateChanged1;
xmlHttp.open("POST",url,true);
xmlHttp.send(null);

}
function stateChanged1() 
{ 

if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
 { 
 //alert("changed");
 //alert(xmlHttp.responseText);
//var node = document.getElementById('data' );  
//node.innerHTML = xmlHttp.responseText;
 
  var valu=xmlHttp.responseText;
  //alert(valu);
 if(valu=='No')
 {
document.getElementById('error').innerHTML="Date Required";
 }
else
{
	var dat=valu.split('/');
//alert(dat);

var dat1=dat[0]+":"+dat[1]+":"+dat[2]+":"+dat[3]+":"+dat[4];
//document.getElementById('data').style.display='';	
document.getElementById('error').innerHTML='';
//document.getElementById('dt').value=valu;
//document.cookie="dat="+valu;
//alert(dat1);
window.location.href=base_url+'factory/factory_reports/weeklyreportview/'+dat1;
//alert(document.cookie);  
//setcookie(dat);              


}
 xmlHttp.responseText="";


 } 
}
function GetXmlHttpObject()
{
var xmlHttp=null;
try
 {
 
 // Firefox, Opera 8.0+, Safari
 xmlHttp=new XMLHttpRequest();
 }
catch (e)
 {
 //Internet Explorer
 try
  {
  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
  }
 catch (e)
  {
  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
 }
return xmlHttp;

}
</script>

<script type="text/javascript">


	$(function() 
	{
	//alert("hi");
	$('#fdate').datepick({showOn: 'button', buttonImage: '<?php echo  base_url();?>images/calendar.gif', buttonImageOnly: true});
	$('#tdate').datepick({showOn: 'button', buttonImage: '<?php echo  base_url();?>images/calendar.gif', buttonImageOnly: true});	
		
		});
		
		$(document).ready(function() 
			{
				$('#example').dataTable();
			} );
		

		</script>	



</head>

<body marginwidth="0" marginheight="0" bgcolor="#e9f1fb" topmargin="0" leftmargin="0" rightmargin="0" id=dt_example>


<table width=100% cellpadding="0" cellspacing="0" border="0">
<tr><td style="padding-top:0px;width:200px;"><img src="<?php echo base_url(); ?>images/newmalani.gif"  /></td><td  style="height:95px;  background-color:#d4e6fb; background-image:url(<?php echo base_url(); ?>images/newmalanihbg.gif); background-repeat:repeat-x; border:0px;">&nbsp;


</td></tr>


<tr>
<td colspan="2"  style="background-color:#fde5c3; height:28px;"> 


<table style="margin-top:-2px;">
<tr >

<?php
$res=mysql_query("select *from tbl_factoryusers where username='".$this->db_session->userdata('u_name')."'");
$row=mysql_fetch_array($res);
if($row['user']=='Yes')
{
	echo "<td align='center' class='mainnavlink' ><a href=".base_url()."index.php/factory/factory_users>Creation</a></td>";
}
if($row['orders']=='Yes')
{
	echo "<td align='center' class='mainnavlink' ><a href=".base_url()."index.php/factory/factory_orders>Order Management</a></td>";
}
?>
<td align="center" class="mainnavlink" ><a href="<?php echo base_url(); ?>index.php/factory/factory_reports"  >Reports</a></td>
<td align="center" class="mainnavlink" ><a href='<?php echo base_url(); ?>index.php/login/logout'  >Logout</a></td>
</tr></table></td></tr>


<tr><td colspan="2" bgcolor="#fff6ed">
<table width=100%>
<tr><td style="padding-left:10px;padding-top:5px;" valign="top">
<table cellpadding="0" cellspacing="0">
<tr><td class="navhdr"><b>Reports</b></td></tr>
<tr><td class="navcontbg1" ><a href=" <?php echo base_url(); ?>index.php/factory/factory_reports">All Orders</a></td></tr>
<tr><td class="navcontbg2" ><a href=" <?php echo base_url(); ?>index.php/factory/factory_reports/pending">Pending Orders</a></td></tr>
<tr><td class="navcontbg1" ><a href=" <?php echo base_url(); ?>index.php/factory/factory_reports/branchwise">Branch wise Orders</a></td></tr>
<tr><td class="navcontbg2" ><a href=" <?php echo base_url(); ?>index.php/factory/factory_reports/loading">Loading Reports</a></td></tr>
<tr><td class="navcontbg1" ><a href=" <?php echo base_url(); ?>index.php/factory/factory_reports/productwise">Productwise Pending Reports</a></td></tr>
<tr><td class="navcontbg2" ><a href=" <?php echo base_url(); ?>index.php/factory/factory_reports/dialy">Day wise Orders Received</a></td></tr>

<tr><td class="navcontbg1" ><a href=" <?php echo base_url(); ?>index.php/factory/factory_reports/weekly">Weekly Orders Received</a></td></tr><tr><td class="navcontbg2" ></td></tr>
<tr><td class="navcontbg2" ></td></tr>
<tr><td class="navcontbg2" ></td></tr>
<tr><td class="navcontbg2" ></td></tr>
<tr><td class="navcontbg2" ></td></tr>
<tr><td class="navcontbg2" ></td></tr>
<tr><td class="navcontbg2" ></td></tr>
<tr><td class="navcontbg2" ></td></tr>
<tr><td class="navcontbg2" ></td></tr>
<tr><td class="navfutr" ></td></tr>
</table></td>

<td width="78%" align=left valign="top" class="rightpane">


<table width="100%" cellpadding="0" cellspacing="0" border="0" align=left>

<tr><td class="heading" style="padding-top:30px;" colspan="2">Weekly Report</td></tr>

<tr><td id=error align="center" style="font-family:Tahoma, Geneva, sans-serif; color:red;"></td></tr>

<tr><td align="center" style="padding-top:20px;" width="30%">From Date&nbsp;<input type="text" size="26" name="fdate" id="fdate" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; " value=''></td><td align="left" style="padding-top:20px; padding-left:10px;" >To Date&nbsp;<input type="text" size="26" name="tdate" id="tdate" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; " value=''></td></tr>


<tr><td colspan="5" style="padding-left:250px;padding-top:20px;">
<input type="submit" name="fsubmit" id="fsubmit" value="" class="mfsub" onclick="showreports()"></td></tr>

<tr><td colspan=2 >
<div id=data name=data style="display:none;">
<div id="container">
	<div id="demo">
   
<table cellpadding="3"  class="display KeyTable" id="example" width=100% style='border: 1px solid #8A0A37;'>

<thead style='background-color: #9F1B4A;color:black; font-size:12px; font-weight:normal;border-bottom: 1px solid; border-right: 1px solid;	border-color: #e37e3d; background-image: url(<?php echo base_url(); ?>images/red.png); background-repeat: repeat-x;vertical-align:top;'>

<tr><th nowrap="nowrap">DO No</th><th nowrap="nowrap">Order Date</th><th>Party</th><th nowrap="nowrap">Total Bundles</th><th>Dispatched</th><th nowrap="nowrap">Pending</th><th width=150 align=center>Status</th></tr>
</thead><tbody>
<?php
//$dat='';
//echo $_COOKIE[dat];
echo $vars;
$totaldispatched=0;
$totalpendingbundles=0;
$finaltotalbundles=0;
//$dat='';
//session_start();
// $_SESSION['dat'];
//echo "select * from tbl_order_master where orderdate='".$this->db_session->userdata('dat')."' ORDER BY id desc";
//echo "select * from tbl_order_master where orderdate='".$_COOKIE[dat]."' ORDER BY id desc";
$str=mysql_query("select * from tbl_order_master where orderdate='".$this->db_session->userdata('dat')."' and status!='New' ORDER BY id desc");
//echo "select * from tbl_oders where status='New' ORDER BY orderdate";

//echo "num of fields = ".$fc;
//echo "<br>";
//echo "<br>";




while($row1=mysql_fetch_array($str))
{
$count=0;
$totalbundles=0;
$cancelledbundles=0;
//echo $row1['donum'];
$res_orders=mysql_query("select *from tbl_orders where donum='".$row1['donum']."'");
//echo "select *from tbl_orders where donum='".$row1['donum']."'";

while($s1=mysql_fetch_array($res_orders))
{
							if($s1['itemname']== 'Sheets' || $s1['itemname']== 'Cushions' )
{$cancelledbundles=$cancelledbundles+$s1['cancelledbundles'];}
$totalbundles=$totalbundles+$s1['numbundles'];
$finaltotalbundles=$finaltotalbundles+$s1['numbundles'];
$res=mysql_query("select *from tbl_loadingadvice where donum='".$s1['donum']."' and orderid='".$s1['id']."'");
while($row=mysql_fetch_array($res))
{
$count++;
}



}
//echo $totalbundles;
$totaldispatched=$totaldispatched+$count;
$dispatched=$count;
$pending=$totalbundles-$count-$cancelledbundles;

$totalpendingbundles=$totalpendingbundles+$pending;
echo "<tr><td id='confirm-dialog'><a onClick=order_details('$row1[id]')>".$row1['donum']."</a></td><td id='confirm-dialog'>".$row1['orderdate']."</td><td id='confirm-dialog' style='padding-left:10px;'>".$row1['orderby']."</td><td id='confirm-dialog' align=center>".$totalbundles."</td><td id='confirm-dialog' align=center>".$dispatched."</td><td id='confirm-dialog' align=center>".$pending."</td><td id='confirm-dialog' nowrap>".$row1['status']."</td></tr>";


}

?>

</tbody>
<tr><th colspan="7"><hr /></hr></th></tr>
<tr><th colspan="3" style="font-size:12px; font-family:'Arial';">This page total Bundles</th><th align='center' id=ages name=ages style="font-size:12px;font-family:'Arial';"></th><th align='center' id=weights name=weights style="font-size:12px;font-family:'Arial';"></th><th align='center' id='benchpresses' name=benchpresses style="font-size:12px;font-family:'Arial';"></th><th></th></tr>
<tfoot>

</tfoot>


</table>
</div></div></div>
</td></tr></table></td></tr></table>

</td></tr>


<tr><td colspan="2" style="background-color:#ffdc90; height:25px; padding-top:10px;"></td></tr>

</table>


<div class="msgmodal admin_shipping_win" id="add_admin_shipping1">
	<!--[if lte IE 8]>
        <div class="S_l_t_corner"></div>
        <div class="S_t_tile"></div>
        <div class="S_r_t_corner"></div>
        <div class="S_l_tile"></div>
        <div class="S_r_tile"></div>
        <div class="S_l_b_corner"></div>
        <div class="S_b_tile"></div>
        <div class="S_r_b_corner"></div>
    <![endif]-->
    <div class="closeme"></div>
    <div class="msg_bg">
        <h3 class="modal_title"></h3>
        <div id="ext_form" style="padding-left: 10px; margin-top: 10px;">
		
        	 <div class="frmholder">
			 </div>
           
        </div>			
    </div>
</div>



</body>
</html>
