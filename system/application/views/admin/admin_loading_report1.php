<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<LINK REL="SHORTCUT ICON" HREF="<?php echo base_url(); ?>images/malinilogo.png">
<title>Shree Malani Foams </title>
 <script type="text/javascript">
base_url = '<?= base_url();?>index.php/';
base_img=	'<?= base_url();?>public/images';
base_js_url = '<?= base_url();?>';
base_spinner = '<?= base_url();?>public/styles/images/spinner.gif';
gridimgpath = '<?= base_url();?>public/themes/basic/images';
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

var customer=document.getElementById('rdate').value
//var semester=document.getElementById('semesters').options[document.getElementById('semesters').selectedIndex].text;
var value=customer.split('/');
//alert(value);
if(value!='')
var da=value[0]+":"+value[1]+":"+value[2];
else
da=='';
//alert(da);
xmlHttp=GetXmlHttpObject();
if (xmlHttp==null)
 {
 alert ("Browser does not support HTTP Request");
 return;
 }
 

var url=base_url+'admin/admin_reports/loadingreports/'+da;
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
//alert(dat[0]);

var dat1=dat[0]+":"+dat[1]+":"+dat[2];
//document.getElementById('data').style.display='';	
document.getElementById('error').innerHTML='';
//document.getElementById('dt').value=valu;
//document.cookie="dat="+valu;
//alert(dat1);
window.location.href=base_url+'admin/admin_reports/loadingreportview/'+dat1;
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


		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() 
			{
				$('#example').dataTable();
			} );
			
			
			function  order_details(obj)
 {
 		//alert(obj);
		//alert($(obj).attr("ship_no"));
		
		$("#add_admin_shipping1").width(800).height(500);
		
		//$(this).closest("td").unbind("click");
 		
		$.blockUI({message: $("#add_admin_shipping1")});
		
		$("#add_admin_shipping1 .modal_title").html("Order Details");
		
		  var query_str = "";
		  	$.ajax({
			type: "POST",
			url: base_url+"admin/admin_orders/order_details_report/"+obj,
		 //	data: query_str,
			beforeSend: function(){
			  
			 $("#add_admin_shipping1 .frmholder").html($(".spinner").clone());
				
			   },
			success: function(html)
			{   
			 	//alert(html);
				 $("#add_admin_shipping1 .frmholder").html(html);
				  bind_datepicker();
				  $("#project_number").select();			  
				  $("#project_number").focus();
			}
		}); 
		
		   
 }
 
 $(".closeme, .close_inco_terms").live("click", function()
 {
 	 
	$("#add_admin_shipping .frmholder").html("");
	 //jQuery("#list5").setGridParam({page:1}).trigger("reloadGrid");

	 $.unblockUI();
 
 });
 
 $(function() 
	{
	//alert("hi");
	$('#rdate').datepick({showOn: 'button', buttonImage: '<?php echo  base_url();?>images/calendar.gif', buttonImageOnly: true});
		
		
		});
 
		</script>

</head>

<body marginwidth="0" marginheight="0" bgcolor="#e9f1fb" topmargin="0" leftmargin="0" rightmargin="0" id=dt_example>


<table width=100% cellpadding="0" cellspacing="0" border="0">
<tr><td style="padding-top:0px;width:200px;"><img src="<?php echo base_url(); ?>images/newmalani.gif"  /></td><td  style="height:95px;  background-color:#d4e6fb; background-image:url(<?php echo base_url(); ?>images/newmalanihbg.gif); background-repeat:repeat-x; border:0px;">&nbsp;


</td></tr>


<tr><td colspan="2"  style="background-color:#fde5c3; height:28px;"> 


<table style="margin-top:-2px;">
<tr >
<td  align="center" class="mainnavlink"  ><a href='<?php echo base_url(); ?>index.php/admin/admin_home'  >Admin Registration</a></td>
<td align="center" class="mainnavlink" ><a href='<?php echo base_url(); ?>index.php/admin/admin_orders'  >Order Management</a></td>
<td align="center" class="mainnavlink" ><a href="<?php echo base_url(); ?>index.php/admin/admin_reports"  >Reports</a></td>
<td align="center" class="mainnavlink" ><a href='<?php echo base_url(); ?>index.php/login/logout'  >Logout</a></td>
</tr></table></td></tr>


<tr><td colspan="2" bgcolor="#fff6ed">
<table width=100%>
<tr><td style="padding-left:10px;padding-top:5px;" valign="top">
<table cellpadding="0" cellspacing="0">
<tr><td class="navhdr"><b>Reports</b></td></tr>
<tr><td class="navcontbg1" ><a href=" <?php echo base_url(); ?>index.php/admin/admin_reports">All Orders</a></td></tr>
<tr><td class="navcontbg2" ><a href=" <?php echo base_url(); ?>index.php/admin/admin_reports/pending">Pending Orders</a></td></tr>
<tr><td class="navcontbg1" ><a href=" <?php echo base_url(); ?>index.php/admin/admin_reports/branchwise">Branch wise Orders</a></td></tr>
<tr><td class="navcontbg2" ><a href=" <?php echo base_url(); ?>index.php/admin/admin_reports/loading">Loading Reports</a></td></tr>
<tr><td class="navcontbg1" ><a href=" <?php echo base_url(); ?>index.php/admin/admin_reports/productwise">Productwise Pending Reports</a></td></tr>
<tr><td class="navcontbg2" ><a href=" <?php echo base_url(); ?>index.php/admin/admin_reports/dialy">Day wise Orders Received</a></td></tr>

<tr><td class="navcontbg1" ><a href=" <?php echo base_url(); ?>index.php/admin/admin_reports/weekly">Weekly Orders Received</a></td></tr>
<tr><td class="navcontbg2" ></td></tr>
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


<td class="rightpane" style="padding-right:60px;" valign="top">


<table width="100%" cellpadding="0" cellspacing="0" border="0">

<?php
$actdate="";
$dates=explode("/",$vars);
for($i=0;$i<sizeof($dates);$i++)
$actdate=$actdate.$dates[$i].":";
?>
<tr><td class="heading" style="padding-top:30px;">Loading Orders Report
<td align="right" style="padding-right:20px; padding-top:20px;"><a href=" <?php echo base_url(); ?>index.php/admin/admin_orders/loadingordersprintview/<?php echo $actdate?>" target="_blank"><img src="<?php echo base_url(); ?>images/print.gif"  style="border:none"/></a></td></tr>

<tr><td id=error align="center" style="font-family:Tahoma, Geneva, sans-serif; color:red;"></td></tr>
<tr><td  style="padding-top:20px; padding-left:180px;"> Select Date &nbsp;<input type="text" size="26" name="rdate" id="rdate" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; " value='<?php echo $vars ?>'></td></tr>

<tr><td colspan="5" style="padding-left:250px;padding-top:20px;">
<input type="submit" name="fsubmit" id="fsubmit" value="" class="mfsub" onclick="showreports()"></td></tr>

<tr><td colspan=2>

<table cellpadding="1" border=0 class="display KeyTable"  width=100%  style="border:solid 1px #960">

<?php

$alltotaldispatched=0;
$alltotalpendingbundles=0;
$allfinaltotalbundles=0;
//echo "select distinct(vehiclenumber) from tbl_loadingadvice where  dateofloading='".$vars."'";
$branches=mysql_query("select distinct(vehiclenumber) from tbl_loadingadvice where  dateofloading='".$vars."'");
//echo "select distinct(vehiclenumber) from tbl_loadingadvice where  dateofloading='".$vars."'";
$numr=mysql_num_rows($branches);
if($numr==0)
{
	echo "<tr><td class=error>No Orders Dispatched On This Date</td></tr>";
}
else
{
while($branchesrow=mysql_fetch_array($branches))
{
	
$branchtotaldispatched=0;
$branchtotalpendingbundles=0;
$branchfinaltotalbundles=0;
	echo "<tr><td colspan=8><hr></td></tr><tr><th colspan=8>".$branchesrow['vehiclenumber']."  Orders</td></tr>
	<tr ><td colspan=8><hr></td></tr>";
	?>
	<tr style='background-color: #9F1B4A;color:black; font-size:12px; font-weight:normal;border-bottom: 1px solid; border-right: 1px solid;	border-color: #e37e3d; background-image: url(<?php echo base_url(); ?>images/red.png); background-repeat: repeat-x;vertical-align:top;'><th nowrap=nowrap>Bundle No</th><th nowrap=nowrap>DO No</th><th nowrap=nowrap>Order Date</th><th>Party</th><th nowrap=nowrap>Variety</th><th>Size</th></tr>
</thead>
	<?php
	$parties=mysql_query("select *from tbl_loadingadvice where vehiclenumber='".$branchesrow['vehiclenumber']."' and dateofloading='".$vars."' order by id desc");
	//echo "select *from tbl_loadingadvice where vehiclenumber='".$branchesrow['vehiclenumber']."' and dateofloading='".$vars."' order by id desc";
	while($row=mysql_fetch_array($parties))
	{
		
		
		//echo "select * from tbl_order_master where status!='Dispatched' and orderby='".$partiesrow['orderby']."' ORDER BY id desc";
?>



<tbody>


<?php



$res_order=mysql_query("select *from tbl_order_master where donum='".$row['donum']."'");
$row_order=mysql_fetch_array($res_order);
$res_details=mysql_query("select *from tbl_orders where donum='".$row['donum']."' and id='".$row['orderid']."'");
$row_details=mysql_fetch_array($res_details);
$size=$row_details['height']." * " .$row_details['width']." * ".$row_details['thickness'];
echo "<tr class=odd><td id='confirm-dialog' align=center>".$row['bundlenum']."</td><td id='confirm-dialog'><a onClick=order_details('$row_order[id]')>".$row['donum']."</a></td><td id='confirm-dialog'>".$row_order['orderdate']."</td><td id='confirm-dialog' style='padding-left:10px;'>".$row_order['orderby']."</td><td id='confirm-dialog' align=center>".$row_details['variety']."</td><td id='confirm-dialog' align=center nowrap>".$size."</td></tr>";



}
}

}

?>

</tbody>


<tfoot>

</tfoot>


</table>

</td></tr></table></td></tr></table>

</td></tr>


<tr><td colspan=2>

<table cellpadding="3" border=0 class="display KeyTable"  width=100%  style="border:solid 1px #960">



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
