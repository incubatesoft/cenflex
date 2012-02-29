<?php
class Factory_orders extends Controller 
{
	
	function Factory_orders() 
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
		$this->load->model("factory_orders_model");
	}
	
	function index() 
	{
	
		$this->load->view('factory/factory_home');
		
		
	}
	function ho() 
	{
	
		$this->load->view('factory/factory_orders');
		
		
	}
	
	function orderstocutting()
	{
	$this->factory_orders_model->orderstocutting($_POST);
	}
	
	function Sendorder($val) 
	{
	
		$this->load->view('factory/send_order',$val);
		}
		
		function order_details($val) 
	{
	
		$this->load->view('factory/order_details',$val);
		}
		
		function order_details_cutting($val) 
	{
	
		$this->load->view('factory/order_details_cutting',$val);
		}
		
		function cuttingsection()
	{
	$this->load->view('factory/cuttingsection_home');
	}
		function cuttingprint()
	{
	$this->load->view('factory/cuttingprint');
	}
	
		function cuttingsearch($val)
	{
		//echo $val;
		
	$SQL = "select a.id,a.donum,a.numbundles,a.orderid,a.remainingmtrs,a.numbundles,a.mtrsleft,b.itemname,b.quantity,b.width,b.height,b.density,b.thickness,b.variety,b.packagetype,b.remarks,b.colorspecific,b.remainingbundles, b.remainingmtrs as remtrs from tbl_cuttinginstruction a,tbl_orders b where a.donum=b.donum and a.orderid=b.id   and a.cancelstatus is null and a.orderstatus!='Bundled' ORDER BY a.donum DESC";

//echo $SQL;
$result = mysql_query( $SQL ) or die("Couldn t execute query.".mysql_error());
while($res=mysql_fetch_array($result))
{
	if($res['donum']==$val)
		{
if($res['itemname']=='Rolls'){$height=$res['remainingmtrs'];}else{$height=$res['height'];} 
if($res['itemname']=='Rolls'){$qua=$res['mtrsleft'];}else{$qua=$res['remtrs'];} 
$parties=mysql_query("select * from tbl_order_master where donum='".$res['donum']."' ");
$partyname=mysql_fetch_array($parties);
$party=$partyname['orderby'];
echo "<tr class='bundleno'><td style='font-family:Verdana, Geneva, sans-serif; font-size:12px; border-bottom:1px solid #000; border-right:1px solid #000'   align=center>".$res['donum']."</td>
<td  style='font-family:Verdana, Geneva, sans-serif; font-size:12px; border-bottom:1px solid #000; border-right:1px solid #000'  align=center>".$party."</td>
<td  style='font-family:Verdana, Geneva, sans-serif; font-size:12px; border-bottom:1px solid #000; border-right:1px solid #000'  align=center>".$res['itemname']."</td>
<td  style='font-family:Verdana, Geneva, sans-serif; font-size:12px; border-bottom:1px solid #000; border-right:1px solid #000'  align=center>".$res['density']."</td>
<td  style='font-family:Verdana, Geneva, sans-serif; font-size:12px; border-bottom:1px solid #000; border-right:1px solid #000'  align=center>".$res['variety']."</td>
<td  style='font-family:Verdana, Geneva, sans-serif; font-size:12px; border-bottom:1px solid #000; border-right:1px solid #000'  align=center>".$height."</td>
<td  style='font-family:Verdana, Geneva, sans-serif; font-size:12px; border-bottom:1px solid #000; border-right:1px solid #000'  align=center>".$res['width']."</td>
<td  style='font-family:Verdana, Geneva, sans-serif; font-size:12px; border-bottom:1px solid #000; border-right:1px solid #000'  align=center>".$res['thickness']."</td>
<td  style='font-family:Verdana, Geneva, sans-serif; font-size:12px; border-bottom:1px solid #000; border-right:1px solid #000'  align=center>".$res['numbundles']."</td>
<td  style='font-family:Verdana, Geneva, sans-serif; font-size:12px; border-bottom:1px solid #000; border-right:1px solid #000'  align=center>".$qua."</td>
<td  style='font-family:Verdana, Geneva, sans-serif; font-size:12px; border-bottom:1px solid #000; border-right:1px solid #000'  align=center>".$res['packagetype']."</td>
<td  style='font-family:Verdana, Geneva, sans-serif; font-size:12px; border-bottom:1px solid #000; border-right:1px solid #000'  align=center>".$res['remarks']."</td>
<td  style='font-family:Verdana, Geneva, sans-serif; font-size:12px; border-bottom:1px solid #000;'  align=center>".$res['colorspecific']."</td></tr>";
		} 
		
	}

}
		
		function bundling($val) 
	{
	
		$this->load->view('factory/order_bundling',$val);
		}
		
	function bundlingsubmit()
	{
	//echo "hi";
	$this->factory_orders_model->bundlingsubmit($_POST);
	}
	function cancelbundle()
	{
	//echo "hi";
	$this->factory_orders_model->cancelbundle($_POST);
	}
	
	function loadingadvice()
	{
	$this->load->view('factory/loadingadvice_home_view');
	}
	
	/*function loadingadviceview($s)
	{
	$this->load->view('factory/loadingadvice_home_view',$s);
	}*/
	
	function loadingsubmit()
	{
	$this->factory_orders_model->loadingsubmit($_POST);
	}
	
	
	function packaginglist()
	{
	$this->load->view('factory/packaging_home');
	}
	
	
	function packaging_list() 
	{
	mysql_query("update tbl_packaginglist set status='Old'");
	$d=date('d-m-y');
	$year=date('Y');
	$veh=mysql_query("SELECT a.vehiclenumber,a.donum,a.orderid,a.status,a.transporter,a.partyname,b.donum,b.id FROM tbl_loadingadvice a, tbl_orders b where a.status='New' and a.donum=b.donum and a.orderid=b.id");
	$vehno=mysql_fetch_array($veh);
	$partyid=$vehno['partyname'];
	$pardet=mysql_query("select * from tbl_distributors where dname='".$partyid."' ");
	if(mysql_num_rows($pardet)>0)
	{
	$pdetails=mysql_fetch_array($pardet);

	$partydetails="
	<tr><td style='font-family:arial;font-size:12px;'>Party Name: ".$pdetails['dname']."</td></tr>
	<tr><td style='font-family:arial;font-size:12px;'>Address: ".$pdetails['street1'].$pdetails['street2']."</td></tr>

	<tr><td style='font-family:arial;font-size:12px;'>City: ".$pdetails['city']."</td></tr>
	<tr><td style='font-family:arial;font-size:12px;'>State: ".$pdetails['state']."</td></tr>
	<tr><td style='font-family:arial;font-size:12px;'>Phone: ".$pdetails['phone']." Mobile: ".$pdetails['mobile']."</td></tr>
	<tr><td style='font-family:arial;font-size:12px;'>TIN Number: ".$pdetails['tinnumber']."</td></tr>
	<tr><td style='font-family:arial;font-size:12px;'>ECC: ".$pdetails['ecc']." CST: ".$pdetails['cst']."</td></tr>";
	
	} else 
	{
	$pardet=mysql_query("select * from tbl_branches where branchname='".$partyid."' ");
	$pdetails=mysql_fetch_array($pardet);
	
	$partydetails="
	<tr><td style='font-family:arial;font-size:12px;'>Party Name: ".$pdetails['branchname']."</td></tr>
	<tr><td style='font-family:arial;font-size:12px;'>City: ".$pdetails['city']."</td></tr>";
	}

	$rndpckno=mysql_query("SELECT max(id) as id FROM tbl_packaginglist t");
	$rpn=mysql_fetch_array($rndpckno);
	$rpnum=$rpn['id']+1;
	$tab="<table width=100% cellpadding=0 cellspacing=0>
	<tr><td style='font-family:arial;font-size:15px; lineheight:2px;' colspan=2 align=center><b>Shree Malani Foams Pvt Ltd</b><br>
	Survey No 306,310-313,<br>
	Shankarampet(R), village & Mandal,<br>
	via chegunta, Medak Dist.<br>
	A.P - 502248, India.</td></tr>
	<tr><td style='font-family:arial;font-size:12px;'>No:".$rpnum."/".$year."</td><td></td></tr>
	".$partydetails."
	<tr><td style='font-family:arial;font-size:12px;'>Vehicle No:".$vehno['vehiclenumber']."</td><td></td></tr>
	<tr><td style='font-family:arial;font-size:12px;'>Transporter Name:".$vehno['transporter']."</td><td></td></tr>
	<tr><td colspan=2 style=height:15px;padding-right:5px; align=right>Date:".$d."</td></tr>
	<tr><td colspan=2>
	<fieldset style='border:1px solid #073c68'><legend style='font-family:arial;font-size:13px;'><b>Packaging List</b></legend>

	<table cellpadding='3' style='width:100%; font-size:12px' border=0>
	<tr><thead><th style='font-family:arial;font-size:13px;padding:3px;' width=3%>Sno</th>
	<th style='font-family:arial;font-size:13px;padding:3px;' width=3%>DO Num</th><th style='font-family:arial;font-size:13px; padding:3px;' width=5%>Bundle No</th><th style='font-family:arial;font-size:13px;padding:3px;' width=5%>Length</th><th style='font-family:arial;font-size:13px;padding:3px;' width=5%>width</th><th style='font-family:arial;font-size:13px;padding:3px;' width=5%>Thickness</th><th style='font-family:arial;font-size:13px;padding:3px;' width=5%>Density</th><th style='font-family:arial;font-size:13px;padding:3px;' width=10% align=left>Varaity</th><th style='font-family:arial;font-size:13px;padding:3px;' width=10% align=left>Length</th><th style='font-family:arial;font-size:13px;padding:3px;' width=10% align=left>Width</th><th style='font-family:arial;font-size:13px;padding:3px;' width=10% align=left>Thickness</th><th style='font-family:arial;font-size:14px;padding:3px;' width=10% align=left>Unit.wt(Kgs)</th><th style='font-family:arial;font-size:13px;padding:3px;' width=10% align=left>Qty</th><th style='font-family:arial;font-size:13px;padding:3px;' width=10% align=left>Total.wt(Kgs)</th></thead></tr>
	<tr ><td colspan=14 ><hr></hr></td></tr>";
	
	$res=mysql_query("select b.itemname,b.height,b.width,b.density,b.thickness,b.variety,b.remarks,b.widthtype,b.heighttype,a.bundlenum,a.quantity,a.donum,a.orderid from tbl_loadingadvice a,tbl_orders b where a.status='New' and a.donum=b.donum and a.orderid=b.id");
	
	
	
	$i=0;
	$ttwt=0;
	$dt=date('d-m-Y');

	while($row=mysql_fetch_array($res))
	{
	$i++;
	//$lenm=round($row['height']*25.4/1000,2);
	if($row['widthtype']=="mm")
	{
		if($row['variety']=="B Grade" ||$row['variety']=="C Grade" || $row['variety']=="Skin"  )
		{$widtm='-';} else
		{$widtm=round($row['width']/1000,3);}
	}
	else
	{
		if($row['variety']=="B Grade" ||$row['variety']=="C Grade" || $row['variety']=="Skin"  )
		{$widtm='-';} else
		{$widtm=round($row['width']*25.4/1000,3);}
	}
	
	if($row['variety']=="B Grade" ||$row['variety']=="C Grade" || $row['variety']=="Skin"  )
	{$thickm='-';} else
	{$thickm=round($row['thickness']/1000,4);}
	
	if($row['density']=="LD" || $row['density']=="ld")
	$density=11;
	else
	$density=$row['density'];
	if($row['itemname']=='Rolls')
	{
		$lenhght=$row['quantity'];
		$lenm=$row['quantity'];
		$ewt=round($lenm*$widtm*$thickm*$density,3);
		$totwt=$ewt;	
	}
	else	if($row['remarks']=='Blocks' || $row['remarks']=='blocks' )
	{	
		$lenhght=$row['height'];
		if($row['heighttype']=="mm")
		{$lenm=round($row['height']/1000,3);}
		else
		{$lenm=round($row['height']*25.4/1000,3);}
		//$ewt=round($lenm*$widtm*$thickm*$density,2);
		$ewt=$row['quantity'];
		$totwt=$row['quantity'];	
	} 
	else if($row['variety']=='B Grade' || $row['variety']=='C Grade' || $row['variety']=='Skin'  )
	{
	$lenhght='-';
	$lenm='-';
	$ewt='-';
	
	}
	else
	{
		$lenhght=$row['height'];
		if($row['heighttype']=="mm")
		{$lenm=round($row['height']/1000,3);}
		else
		{$lenm=round($row['height']*25.4/1000,3);}
		$ewt=round($lenm*$widtm*$thickm*$density,3);
		$totwt=round($lenm*$widtm*$thickm*$density*$row['quantity'],2);
	}
	
	
	//echo $row['itemname'];
	

if($row['itemname']=='Rolls')
{
//$quantity=$row['quantity']." Mtrs";
$quantity="1 Roll";
$qtype="Roll";
}
else if($row['remarks']=='Blocks' || $row['remarks']=='blocks' )
{
$quantity= "1 Block";
$qtype="Block";
}
else  if($row['variety']=="B Grade" ||$row['variety']=="C Grade" || $row['variety']=="Skin"  )
{
$quantity='-';
$qtype='Grades';
}
else
{
$quantity=$row['quantity']. " Nos";
$qtype="Nos";
}


 if($row['variety']=="B Grade" ||$row['variety']=="C Grade" || $row['variety']=="Skin"  )
	{
	$width='-';
	$thickness='-';
	$totwt=$row['quantity'];
	}
	else
	{
		$width=$row['width'];
		$thickness=$row['thickness'];
	}
	
	$ttwt=$ttwt+$totwt;

	$tab=$tab."<tr><tbody><td style='font-family:arial;font-size:12px;padding:4px;'>".$i."</td>
	<td style=font-family:arial;font-size:12px;padding:4px;>".$row['donum']."</td><td style=font-family:arial;font-size:12px;padding:4px;>".$row['bundlenum']."</td><td style='font-family:arial;font-size:12px;padding:4px;'>".$lenhght."</td><td style='font-family:arial;font-size:12px;padding:4px;'>".$width."</td><td style='font-family:arial;font-size:12px;padding:4px;'>".$thickness."</td><td style='font-family:arial;font-size:12px;padding:4px;'>".$row['density']."</td><td style='font-family:arial;font-size:12px;padding:4px;'>".$row['variety']."</td><td style='font-family:arial;font-size:12px;padding:4px;'>".$lenm."</td><td style='font-family:arial;font-size:12px;padding:4px;'>".$widtm."</td><td style='font-family:arial;font-size:12px;padding:4px;'>".$thickm."</td><td style='font-family:arial;font-size:12px;padding:4px;'>".$ewt."</td><td style='font-family:arial;font-size:12px;padding:4px;'>".$quantity."</td><td style='font-family:arial;font-size:12px;padding:4px;'>".$totwt."</td></tr><tr><td colspan=2 style=height:10px;></td></tbody></tr>";
	
	//echo "insert into tbl_packaginglist(donum,bundlenum,quantity,lengthinmm,widthinmm,thicknessinmm,eachpieceweight,tptalweight,date) values('".$row['donum']."','".$row['bundlenum']."','".$row['quantity']."','".$lenm."','".$widtm."','".$thickm."','".$ewt."','".$totwt."','".$dt."')";
	$res_chk=mysql_query("select *from tbl_packaginglist where bundlenum='".$row['bundlenum']."'");
	if(mysql_num_rows($res_chk)==0)
	{
	//echo "insert into tbl_packaginglist(donum,bundlenum,quantity,lengthinmm,widthinmm,thicknessinmm,eachpieceweight,totalweight,date,status,orderid,packid) values('".$row['donum']."','".$row['bundlenum']."','".$row['quantity']."','".$lenm."','".$widtm."','".$thickm."','".$ewt."','".$totwt."','".$dt."','New','".$row['orderid']."','".$packid."')";
	mysql_query("insert into tbl_packaginglist(donum,bundlenum,quantity,lengthinmm,widthinmm,thicknessinmm,eachpieceweight,totalweight,date,status,orderid,variety,density,qtype) values('".$row['donum']."','".$row['bundlenum']."','".$quantity."','".$lenm."','".$widtm."','".$thickm."','".$ewt."','".$totwt."','".$dt."','New','".$row['orderid']."','".$row['variety']."','".$row['density']."','".$qtype."')");
	}
	
	}
$tab=$tab."<tr ><td colspan=14 ><hr></hr></td></tr><tr><td></td><td style='font-family:arial;font-size:12px;padding:4px;'><b>Total Bundles </b></td><td style='font-family:arial;font-size:12px;padding:4px;'>".$i."</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td style='font-family:arial;font-size:12px;padding:4px; padding-right:50px;' colspan=4 align=right><b>Total Bundles weight </b>: ".$ttwt."</td></tr></fieldset></td></tr></table>";





	$tab=$tab."<tr><td width=300 align=center colspan=2 style=padding-top:60px;>
	<fieldset style='border:1px solid #073c68;width:400px;'  align=center><legend style='font-family:arial;font-size:13px;'><b>Summary</b></legend>

	<table cellpadding='3' style='width:400px; font-size:12px' border=0 align=center>
	<tr><thead><th style='font-family:arial;font-size:13px;padding:3px;' width=3%>Description</th><th style='font-family:arial;font-size:13px; padding:3px;' width=5%>No.of bundles</th><th style='font-family:arial;font-size:13px;padding:3px;' width=5%>Total.wt(Kgs)</th></thead></tr>
	<tr><td colspan=3><hr></hr></td></tr>";
	$totnum=0;
	$totwei=0;
	
	$res_load=mysql_query("select distinct variety,density from tbl_loadingadvice where status='New'");
	while($row_load=mysql_fetch_array($res_load))
	{
	$totno=0;
	$totwt=0;
	
	$res_pack=mysql_query("select *from tbl_packaginglist where variety='".$row_load['variety']."' and density='".$row_load['density']."' and status='New' and qtype='Roll' ");
		if(mysql_num_rows($res_pack)>0)
		{
		while($row_pack=mysql_fetch_array($res_pack))
		{
		$totno++;
		$totwt=$totwt+$row_pack['totalweight'];
						
		}
		
		$tab=$tab."<tr><td style='font-family:arial;font-size:12px;padding:4px;'>".$row_load['density']."&nbsp;&nbsp;&nbsp;".$row_load['variety']."</td><td style='font-family:arial;font-size:12px;padding:4px;'>".$totno." Roll(s)</td><td style='font-family:arial;font-size:12px;padding:4px;'>".$totwt."</td></tr>";
		}
		$totno_blocks=0;
		$totwt_blocks=0;
	   $res_pack=mysql_query("select *from tbl_packaginglist where variety='".$row_load['variety']."' and density='".$row_load['density']."' and status='New' and qtype='Block'");
		if(mysql_num_rows($res_pack)>0)
		{
		while($row_pack=mysql_fetch_array($res_pack))
		{
		$totno_blocks++;
		$totwt_blocks=$totwt_blocks+$row_pack['totalweight'];
		}
		
		$tab=$tab."<tr><td style='font-family:arial;font-size:12px;padding:4px;'>".$row_load['density']."&nbsp;&nbsp;&nbsp;".$row_load['variety']."</td><td style='font-family:arial;font-size:12px;padding:4px;'>".$totno_blocks." Block(s)</td><td style='font-family:arial;font-size:12px;padding:4px;'>".$totwt_blocks."</td></tr>";
		}
		$totno_nos=0;
		$totwt_nos=0;
		$res_pack=mysql_query("select *from tbl_packaginglist where variety='".$row_load['variety']."' and density='".$row_load['density']."' and status='New' and qtype='Nos' ");
		if(mysql_num_rows($res_pack)>0)
		{
		while($row_pack=mysql_fetch_array($res_pack))
		{
		$totno_nos++;
		$totwt_nos=$totwt_nos+$row_pack['totalweight'];		
		}
				
		$tab=$tab."<tr><td style='font-family:arial;font-size:12px;padding:4px;'>".$row_load['density']."&nbsp;&nbsp;&nbsp;".$row_load['variety']."</td><td style='font-family:arial;font-size:12px;padding:4px;'>".$totno_nos." Nos</td><td style='font-family:arial;font-size:12px;padding:4px;'>".$totwt_nos."</td></tr>";
		}
		$totno_gds=0;
		$totwt_gds=0;
	 $res_pack=mysql_query("select *from tbl_packaginglist where variety='".$row_load['variety']."' and density='".$row_load['density']."' and status='New' and qtype='Grades' ");
		if(mysql_num_rows($res_pack)>0)
		{
		while($row_pack=mysql_fetch_array($res_pack))
		{
		$totno_gds++;
		$totwt_gds=$totwt_gds+$row_pack['totalweight'];		
		}
				
		$tab=$tab."<tr><td style='font-family:arial;font-size:12px;padding:4px;' width=10%>".$row_load['density']."&nbsp;&nbsp;&nbsp;".$row_load['variety']."</td><td style='font-family:arial;font-size:12px;padding:4px;'>".$totno_gds." Nos</td><td style='font-family:arial;font-size:12px;padding:4px;'>".$totwt_gds."</td></tr>";
		}
		 $totnum=$totnum+$totno+$totno_blocks+$totno_nos+$totno_gds;
		 $totwei=$totwei+$totwt+$totwt_blocks+$totwt_nos+$totwt_gds;
		
	}

	
	$tab=$tab."<tr><td colspan=3><hr></hr></td></tr>
	<tr><td style='font-family:arial;font-size:12px;padding:4px;'>Total</td><td style='font-family:arial;font-size:12px;padding:4px;'>".$totnum."</td>
	<td style='font-family:arial;font-size:12px;padding:4px;'>".$totwei."</td></tr></table></fieldset></td></tr></table>";
	
	echo $tab;
	



	$tab1="<table width=97% cellpadding=0 cellspacing=0>
	<tr><td style='font-family:arial;font-size:15px; lineheight:2px;' colspan=2 align=center><b>Shree Malani Foams Pvt Ltd</b><br>
	Survey No 306,310-313,<br>
	Shankarampet(R), village & Mandal,<br>
	via chegunta, Medak Dist.<br>
	A.P - 502248, India.</td></tr>
	<tr><td style='font-family:arial;font-size:12px;'>No:".$rpnum."/".$year."</td><td></td></tr>
	".$partydetails."
	<tr><td style='font-family:arial;font-size:12px;'>Vehicle No:".$vehno['vehiclenumber']."</td><td></td></tr>
	<tr><td style='font-family:arial;font-size:12px;'>Transporter Name:".$vehno['transporter']."</td><td></td></tr>
	<tr><td colspan=2 style=height:15px;padding-right:5px; align=right>Date:".$d."</td></tr>
	<tr><td colspan=2>
	

	<table cellpadding='3' style='width:100%; font-size:12px' border=0>
	<tr><th style='font-family:arial;font-size:13px;padding:3px;' width=3%>Sno</th>
	<th style='font-family:arial;font-size:13px;padding:3px;' width=3%>DO Num</th>
	<th style='font-family:arial;font-size:13px; padding:3px;' width=5%>Bundle No</th>
	<th style='font-family:arial;font-size:13px;padding:3px;' width=5%>Length</th>
	<th style='font-family:arial;font-size:13px;padding:3px;' width=5%>width</th>
	<th style='font-family:arial;font-size:13px;padding:3px;' width=5%>Thickness</th>
	<th style='font-family:arial;font-size:13px;padding:3px;' width=5%>Density</th>
	<th style='font-family:arial;font-size:13px;padding:3px;' width=8% align=left>Variety</th>
	<th style='font-family:arial;font-size:13px;padding:3px;' width=8% align=left>Length</th>
	<th style='font-family:arial;font-size:13px;padding:3px;' width=8% align=left>Width</th>
	<th style='font-family:arial;font-size:13px;padding:3px;' width=10% align=left>Thickness</th>
	<th style='font-family:arial;font-size:14px;padding:3px;' width=10% align=left>Unit.wt(Kgs)</th>
	<th style='font-family:arial;font-size:13px;padding:3px;' width=10% align=left>Qty</th>
	<th style='font-family:arial;font-size:13px;padding:1px;' width=10% align=left>Total.wt(Kgs)</th></tr>
	<tr ><td colspan=14 ><hr></hr></td></tr>";
	
	$res=mysql_query("select b.itemname,b.height,b.width,b.density,b.thickness,b.variety,b.remarks,b.widthtype,b.heighttype,a.bundlenum,a.quantity,a.donum,a.orderid from tbl_loadingadvice a,tbl_orders b where a.status='New' and a.donum=b.donum and a.orderid=b.id");
	

	
	$i=0;
	$ttwt=0;
	$dt=date('d-m-Y');

	while($row=mysql_fetch_array($res))
	{
	$i++;
	//$lenm=round($row['height']*25.4/1000,2);
	if($row['widthtype']=="mm")
	{
		if($row['variety']=="B Grade" ||$row['variety']=="C Grade" || $row['variety']=="Skin"  )
		{$widtm='-';} else
		{$widtm=round($row['width']/1000,3);}
	}
	else
	{
		if($row['variety']=="B Grade" ||$row['variety']=="C Grade" || $row['variety']=="Skin"  )
		{$widtm='-';} else
		{$widtm=round($row['width']*25.4/1000,3);}
	}
	if($row['variety']=="B Grade" ||$row['variety']=="C Grade" || $row['variety']=="Skin"  )
	{$thickm='-';} else
	{$thickm=round($row['thickness']/1000,4);}

	
	
	
	if($row['density']=="LD" || $row['density']=="ld")
	$density=11;
	else
	$density=$row['density'];
		if($row['itemname']=='Rolls')
	{		$lenhght=$row['quantity'];
			$lenm=$row['quantity'];
			$ewt=round($lenm*$widtm*$thickm*$density,3);
			$totwt=$ewt;
		} 
	else if($row['remarks']=='Blocks' || $row['remarks']=='blocks' )
	{	$lenhght=$row['height'];
		if($row['heighttype']=="mm")
		{$lenm=round($row['height']/1000,3);}
		else
		{$lenm=round($row['height']*25.4/1000,3);}
		//$ewt=round($lenm*$widtm*$thickm*$density,2);
		$ewt=$row['quantity'];
		$totwt=$row['quantity'];	
		} 	 
	else if($row['variety']=='B Grade' ||$row['variety']=='C Grade' || $row['variety']=='Skin'  )
	{
	$lenhght='-';
	$lenm='-';
	$ewt='-';

	}
	else
	{
		$lenhght=$row['height'];
		if($row['heighttype']=="mm")
		{$lenm=round($row['height']/1000,3);}
		else
		{$lenm=round($row['height']*25.4/1000,3);}
		$ewt=round($lenm*$widtm*$thickm*$density,3);
		$totwt=round($lenm*$widtm*$thickm*$density*$row['quantity'],2);
	}
	
		
		
	


if($row['itemname']=='Rolls')
	
{//$quantity=$row['quantity']." Mtrs";
$quantity="1 Roll";}
else if($row['remarks']=='Blocks' || $row['remarks']=='blocks' )
{$quantity= "1 Block";}
else  if($row['variety']=="B Grade" ||$row['variety']=="C Grade" || $row['variety']=="Skin"  )
	{$quantity='-';	}
else
{$quantity=$row['quantity']. " Nos";
}


 if($row['variety']=="B Grade" ||$row['variety']=="C Grade" || $row['variety']=="Skin"  )
	{
	$width='-';
	$thickness='-';
	$totwt=$row['quantity'];
	}
	else
	{
		$width=$row['width'];
		$thickness=$row['thickness'];
	}
	
	$ttwt=$ttwt+$totwt;	
	
	$tab1=$tab1."<tr><td style='font-family:arial;font-size:12px;padding:4px;'>".$i."</td>
	<td style=font-family:arial;font-size:12px;padding:4px;>".$row['donum']."</td><td style=font-family:arial;font-size:12px;padding:4px;>".$row['bundlenum']."</td><td style='font-family:arial;font-size:12px;padding:4px;'>".$lenhght."</td><td style='font-family:arial;font-size:12px;padding:4px;'>".$width."</td><td style='font-family:arial;font-size:12px;padding:4px;'>".$thickness."</td><td style='font-family:arial;font-size:12px;padding:4px;'>".$row['density']."</td><td style='font-family:arial;font-size:12px;padding:4px;'>".$row['variety']."</td><td style='font-family:arial;font-size:12px;padding:4px;'>".$lenm."</td><td style='font-family:arial;font-size:12px;padding:4px;'>".$widtm."</td><td style='font-family:arial;font-size:12px;padding:4px;'>".$thickm."</td><td style='font-family:arial;font-size:12px;padding:4px;'>".$ewt."</td><td style='font-family:arial;font-size:12px;padding:4px;'>".$quantity."</td><td style='font-family:arial;font-size:12px;padding:4px;'>".$totwt."</td></tr>";
	
	//echo "insert into tbl_packaginglist(donum,bundlenum,quantity,lengthinmm,widthinmm,thicknessinmm,eachpieceweight,tptalweight,date) values('".$row['donum']."','".$row['bundlenum']."','".$row['quantity']."','".$lenm."','".$widtm."','".$thickm."','".$ewt."','".$totwt."','".$dt."')";

	}
$tab1=$tab1."<tr ><td colspan=14 ><hr></hr></td></tr><tr><td></td><td style='font-family:arial;font-size:12px;padding:4px;'><b>Total Bundles </b></td><td style='font-family:arial;font-size:12px;padding:4px;'>".$i."</td><td></td><td></td><td></td><td></td><td></td><td></td><td style='font-family:arial;font-size:12px;padding:4px; padding-right:50px;' colspan=4 align=right><b>Total Bundles weight </b>: ".$ttwt."</td></tr></td></tr></table>";





	$tab1=$tab1."<tr><td width=100% align=center colspan=2 style=padding-top:60px; >
	<b>Summary</b>

	<table cellpadding='3' style='width:400px; font-size:12px' border=0 align=center>
	<tr><th style='font-family:arial;font-size:13px;padding:3px;' width=3%>Description</th><th style='font-family:arial;font-size:13px; padding:3px;' width=5%>No.of bundles</th><th style='font-family:arial;font-size:13px;padding:3px;' width=5%>Total.wt(Kgs)</th></tr>
	<tr><td colspan=3><hr></hr></td></tr>";
	$totnum=0;
	$totwei=0;
		
	$res_load=mysql_query("select distinct variety,density from tbl_loadingadvice where status='New'");
	while($row_load=mysql_fetch_array($res_load))
	{
	$totno=0;
	$totwt=0;
	
	$res_pack=mysql_query("select *from tbl_packaginglist where variety='".$row_load['variety']."' and density='".$row_load['density']."' and status='New' and qtype='Roll' ");
		if(mysql_num_rows($res_pack)>0)
		{
		while($row_pack=mysql_fetch_array($res_pack))
		{
		$totno++;
		$totwt=$totwt+$row_pack['totalweight'];
						
		}
		
		$tab1=$tab1."<tr><td style='font-family:arial;font-size:12px;padding:4px;'>".$row_load['density']."&nbsp;&nbsp;&nbsp;".$row_load['variety']."</td><td style='font-family:arial;font-size:12px;padding:4px;'>".$totno." Roll(s)</td><td style='font-family:arial;font-size:12px;padding:4px;'>".$totwt."</td></tr>";
		}
		$totno_blocks=0;
		$totwt_blocks=0;
	   $res_pack=mysql_query("select *from tbl_packaginglist where variety='".$row_load['variety']."' and density='".$row_load['density']."' and status='New' and qtype='Block'");
		if(mysql_num_rows($res_pack)>0)
		{
		while($row_pack=mysql_fetch_array($res_pack))
		{
		$totno_blocks++;
		$totwt_blocks=$totwt_blocks+$row_pack['totalweight'];
		}
		
		$tab1=$tab1."<tr><td style='font-family:arial;font-size:12px;padding:4px;'>".$row_load['density']."&nbsp;&nbsp;&nbsp;".$row_load['variety']."</td><td style='font-family:arial;font-size:12px;padding:4px;'>".$totno_blocks." Block(s)</td><td style='font-family:arial;font-size:12px;padding:4px;'>".$totwt_blocks."</td></tr>";
		}
		$totno_nos=0;
		$totwt_nos=0;
		$res_pack=mysql_query("select *from tbl_packaginglist where variety='".$row_load['variety']."' and density='".$row_load['density']."' and status='New' and qtype='Nos' ");
		if(mysql_num_rows($res_pack)>0)
		{
		while($row_pack=mysql_fetch_array($res_pack))
		{
		$totno_nos++;
		$totwt_nos=$totwt_nos+$row_pack['totalweight'];		
		}
				
		$tab1=$tab1."<tr><td style='font-family:arial;font-size:12px;padding:4px;'>".$row_load['density']."&nbsp;&nbsp;&nbsp;".$row_load['variety']."</td><td style='font-family:arial;font-size:12px;padding:4px;'>".$totno_nos." Nos</td><td style='font-family:arial;font-size:12px;padding:4px;'>".$totwt_nos."</td></tr>";
		}
		$totno_gds=0;
		$totwt_gds=0;
	 $res_pack=mysql_query("select *from tbl_packaginglist where variety='".$row_load['variety']."' and density='".$row_load['density']."' and status='New' and qtype='Grades' ");
		if(mysql_num_rows($res_pack)>0)
		{
		while($row_pack=mysql_fetch_array($res_pack))
		{
		$totno_gds++;
		$totwt_gds=$totwt_gds+$row_pack['totalweight'];		
		}
				
		$tab1=$tab1."<tr><td style='font-family:arial;font-size:12px;padding:4px;' width=10%>".$row_load['density']."&nbsp;&nbsp;&nbsp;".$row_load['variety']."</td><td style='font-family:arial;font-size:12px;padding:4px;'>".$totno_gds." Nos</td><td style='font-family:arial;font-size:12px;padding:4px;'>".$totwt_gds."</td></tr>";
		}
		 $totnum=$totnum+$totno+$totno_blocks+$totno_nos+$totno_gds;
		 $totwei=$totwei+$totwt+$totwt_blocks+$totwt_nos+$totwt_gds;
		
	}

	



	$tab1=$tab1."<tr><td colspan=3><hr></hr></td></tr>
	<tr><td style='font-family:arial;font-size:12px;padding:4px;'>Total</td><td style='font-family:arial;font-size:12px;padding:4px;'>".$totnum."</td>
	<td style='font-family:arial;font-size:12px;padding:4px;'>".$totwei."</td></tr></td></tr></table></table>";
		
		
	

		$this->load->plugin('to_pdf');
//$data['mydata'] = "mydata";
$html = $tab1;

$fname = "Packaging_".$row['donum']."_".time('d-m-Y:H-M-S');

pdf_createest($html, $fname);




	$path="pdf/".$fname.".pdf";
	
	mysql_query("update tbl_packaginglist set pdfpath='".$path."' where status='New'");
	
		}
	
	

	
	
	
}
?>
