<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-us" lang="en-us">
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

<script type="text/javascript" src='<?php echo base_url(); ?>js/jquery.js' language="javascript"></script>
<script src="<?php echo base_url(); ?>js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script src="<?= base_url();?>js/library.js" type="text/javascript"></script>
<script src="<?=base_url();?>js/utils.js" type="text/javascript"></script>		
<link type="text/css" href="<?= base_url();?>themes/base/ui.all.css" rel="stylesheet" />
<link type="text/css"  rel="stylesheet" href="<?php echo base_url(); ?>css/style.css"  />
<script src="<?=base_url();?>public/js/blockUI.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo  base_url();?>themes/ui-lightness/jquery-ui-1.8.custom.css" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo  base_url();?>themes/ui.jqgrid.css" />

<link href="<?php echo base_url();?>public/styles/components.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>public/css/ship.css" rel="stylesheet" type="text/css" />

<script src="<?php echo  base_url();?>jqgrid/jquery-ui-1.7.1.custom.min.js" type="text/javascript"></script>
<script src="<?php echo  base_url();?>jqgrid/jquery.layout.js" type="text/javascript"></script>
<script src="<?php echo  base_url();?>jqgrid/i18n/grid.locale-en.js" type="text/javascript"></script>


<script src="<?php echo base_url();?>jqgrid/jquery.jqGrid.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>jqgrid/jquery.tablednd.js" type="text/javascript"></script>
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

	<link type="text/css" href="<?= base_url();?>css/demos.css" rel="stylesheet" />
<?php
//echo ($_SERVER['HTTP_USER_AGENT']);

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




		
<script language="javascript">
base_url = '<?= base_url();?>index.php/';
$(document).ready(function()
{
	//alert("hi");
	$('#frmFactoryOrders').submit(function(e) {

		register();
		e.preventDefault();
		
	});
	
});


function register()
{
//alert("hi");
	hideshow('loading',1);
	error(0);
	
	$.ajax({
		type: "POST",
		 url: base_url+'admin/admin_orders/sendtofactorysubmit',
		data: $('#frmFactoryOrders').serialize(),
		
		success: function(msg)
		{
			//alert(msg);
			
				if(msg=='Orders Sent to Factory Successfully.')
                       {
						   alert("Orders Sent to Factory Successfully.");
                       $('#load_me').load(base_url+'admin/admin_orders/sendtofactory').fadeIn("fast");
                           success(1,msg);    
                       }
				
				//document.getElementById('success').innerHTML=msg;
			
			hideshow('loading',0);
		}
	});

}


function hideshow(el,act)
{
	if(act) $('#'+el).css('visibility','visible');
	else $('#'+el).css('visibility','hidden');
}

function error(act,txt)
{
	hideshow('error',act);
	if(txt) $('#error').html(txt);
}
function success(act,txt)
{
	hideshow('success',act);
	if(txt) $('#success').html(txt);
}

function  order_details(obj)
 {
 		//alert(obj);
		//alert($(obj).attr("ship_no"));
		
		$("#add_admin_shipping1").width(700).height(500);
		
		//$(this).closest("td").unbind("click");
 		
		$.blockUI({message: $("#add_admin_shipping1")});
		
		$("#add_admin_shipping1 .modal_title").html("Order Details");
		
		  var query_str = "";
		  	$.ajax({
			type: "POST",
			url: base_url+"factory/factory_orders/order_details/"+obj,
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
 
</script>
</head>

<body marginwidth="0" marginheight="0" bgcolor="#e9f1fb" topmargin="0" leftmargin="0" rightmargin="0" id=load_me>


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


<tr><td colspan="2">
<table width=100%>
<tr><td style="padding-left:10px;padding-top:5px;" valign="top">
<table cellpadding="0" cellspacing="0">
<tr><td class="navhdr"><b>Quick Links</b></td></tr>
<tr><td class="navcontbg1" ><a href=" <?php echo base_url(); ?>index.php/admin/admin_orders">Create Orders</a></td></tr>
<tr><td class="navcontbg2" ><a href=" <?php echo base_url(); ?>index.php/admin/admin_orders/sendtofactory">Sending Orders</a></td></tr>

<tr><td class="navcontbg1" ></td></tr>
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


<td class="rightpane">


<table width="100%" cellpadding="0" cellspacing="0" border="0">



<tr><td class="success" id=success ></td></tr>
<tr><td style="padding-top:40px;">
<form name="frmFactoryOrders" id=frmFactoryOrders action="" method="post">
<fieldset style="border:1px solid #073c68"><legend><b>Sending Orders to Factory</b></legend>
<table cellpadding="5" cellspacing="0" style="width:800px; font-size:12px" >

<?php
$str=mysql_query("select * from tbl_order_master where status='New' ORDER BY orderdate");
//echo "select * from tbl_oders where status='New' ORDER BY orderdate";

//echo "num of fields = ".$fc;
//echo "<br>";
//echo "<br>";
echo  "<tr>";
echo  "<thead>
<th>Select</th><th>DO Number</th><th>Order Date</th><th>Order From</th><th>Priority</th><th>Order Details</th>";

echo  "</thead>";
echo  "</tr>";
echo  "<tr ><td colspan=13 style='border-top:1px solid'></td></tr>";
while($s1=mysql_fetch_array($str))
{
$ordby='';
$of=explode("-",$s1['orderby']);
if($of[0]=='d')
{
$ob=mysql_query("select * from tbl_distributors where id='".$of[1]."'");
$orb=mysql_fetch_array($ob);
$ordby=$orb['dname'];
}
if($of[0]=='b')
{
$ob=mysql_query("select * from tbl_branches where id='".$of[1]."'");
$orb=mysql_fetch_array($ob);
$ordby=$orb['branchname'];
}



echo  "<tr>";
echo  "<tbody>";

echo "<td style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;' id='confirm-dialog'><input type=checkbox name=chk".$s1['donum']."></td>
<td style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;' id='confirm-dialog'>".$s1['donum']."</td>
<td style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;' id='confirm-dialog'>".$s1['orderdate']."</td>
<td style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;' id='confirm-dialog'>".$s1['orderby']."</td>
<td style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;' id='confirm-dialog'>".$s1['priority']."</td>
<td style='border-bottom:1px solid #073c68; border-right:1px solid #073c68;'><a onClick=order_details('$s1[id]')>Order Details</a></td>";

echo "</tbody>";
echo "</tr>";
}
?>

</table>
</fieldset>
<div style="padding-top:20px; padding-left:350px;">
<input type="submit" name="fsubmit" id="fsubmit" value="" class="mfsub" /></div>

</form>
</td></tr></table></td></tr></table>

</td></tr>

<tr><td colspan="2"><br /></td></tr>
<tr><td colspan="2"><br /></td></tr>
<tr><td colspan="2"><br /></td></tr>
<tr><td colspan="2"><br /></td></tr>
<tr><td colspan="2"><br /></td></tr>
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

