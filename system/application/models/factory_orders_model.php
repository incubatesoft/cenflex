<?php
class Factory_orders_model extends Model 
{
	
	function Factory_orders_model()
	{
		parent::Model();
	}
	
	 
	function orderstocutting($val)
	{
	$date=date('d/m/Y');
	$bundles='';
	$stat='';
	extract($val);
	error_reporting("E_ALL");
	//print_r($val);
	if(!isset($_POST['sendorder']))
	{
	echo "Please choose one option";
	}
	else
     {
	$res=mysql_query("select *from tbl_order_master where id=".$doid);
	$row=mysql_fetch_array($res);
	
	
	if($_POST['sendorder']=='Full')
	{
	//$bundles=$row['remainingbundles'];
	$stat='Full';
	$remainingbundles=0;
	
	
	mysql_query("update tbl_order_master set status='In Process',bundlestatus='".$stat."',remainingbundles='".$remainingbundles."' where id=".$doid);
	
	mysql_query("update tbl_orders_factory set status='In Process',bundlestatus='".$stat."' where donum='".$row['donum']."'");
	
	
	$res_orders=mysql_query("select *from tbl_orders where donum='".$row['donum']."'");
	//echo "select *from tbl_orders where donum='".$row['donum']."'";
	while($row_orders=mysql_fetch_array($res_orders))
	{
	
	if($row_orders['itemname']!="Rolls")
	{
	$bundles=$row_orders['numbundles'];
		if($row_orders['remainingbundles']<$row_orders['numbundles'])
		{
	mysql_query("insert into tbl_cuttinginstruction(donum,bundlestatus,numbundles,remainingbundles,orderstatus,date,orderid) values('".$row['donum']."','".$stat."','".$row_orders['remainingbundles']."','".$remainingbundles."','In Process','".$date."','".$row_orders['id']."')");//mtrsleft value for quantity checking
		}else
		{
	mysql_query("insert into tbl_cuttinginstruction(donum,bundlestatus,numbundles,remainingbundles,orderstatus,date,orderid) values('".$row['donum']."','".$stat."','".$bundles."','".$remainingbundles."','In Process','".$date."','".$row_orders['id']."')");//mtrsleft value for quantity checking
		}
	}
	else
	{
		//$mtrs=$row_orders['totalmtrs'];
		$mtrs=$row_orders['remainingmtrs'];
	//echo $mtrs;
	mysql_query("insert into tbl_cuttinginstruction(donum,bundlestatus,totalmtrs,remainingmtrs,mtrsleft,orderstatus,date,orderid) values('".$row['donum']."','".$stat."','".$mtrs."','".$mtrs."','".$mtrs."','In Process','".$date."','".$row_orders['id']."')");
//		mysql_query("insert into tbl_cuttinginstruction(donum,bundlestatus,totalmtrs,remainingmtrs,mtrsleft,orderstatus,date,orderid) values('".$row['donum']."','".$status."','".$$meters."','".$$meters."','".$remainingmeters."','In Process','".$date."','".$row_orders['id']."')");
	}
	
	}
	mysql_query("update tbl_orders set status='In Process',bundlestatus='".$stat."',remainingbundles=0 where donum='".$row['donum']."'");
	}
	
	if($_POST['sendorder']=='Partial')
	{
	//$bundles=$row['remainingbundles'];
	$stat='Partial';
	//$remainingbundles=0;
	
	$totalbundles=0;
	$totalmeters=0;
	$actualbundles=0;
	$actualmeters=0;
	
	$res_orders=mysql_query("select *from tbl_orders where donum='".$row['donum']."'");
	//echo "select *from tbl_orders where donum='".$row['donum']."'";
	//echo "select *from tbl_orders where donum='".$row['donum']."'";
	while($row_orders=mysql_fetch_array($res_orders))
	{
	
	if($row_orders['itemname']!='Rolls')
	{
	$totalbundles=$row_orders['numbundles']+$totalbundles;
	$orderno="chk".$row['donum']."id".$row_orders['id'];
	//echo $orderno;
	//echo $$orderno;
	if($$orderno=="on")
	{
	$finishedbundles=0;
	$bundles="txt".$row['donum']."id".$row_orders['id'];
	//$bundles=$row_orders['numbundles'];
	$res_cut=mysql_query("select *from tbl_cuttinginstruction where orderid='".$row_orders['id']."'");
	//echo "select *from tbl_cuttinginstrcution where orderid='".$row_orders['id']."'";
	while($row_cut=mysql_fetch_array($res_cut))
	{
	$finishedbundles=$finishedbundles+$row_cut['numbundles'];
	}
	$finishedbundles=$finishedbundles+$$bundles;
	//echo $finishedbundles;
	$remainingbundles=$row_orders['numbundles']-$finishedbundles;
	//echo $remainingbundles;
	if($remainingbundles==0)
	$status="Full";
	else
	$status="Partial";
	mysql_query("insert into tbl_cuttinginstruction(donum,bundlestatus,numbundles,remainingbundles,orderstatus,date,orderid) values('".$row['donum']."','".$status."','".$$bundles."','".$remainingbundles."','In Process','".$date."','".$row_orders['id']."')");
	//echo "insert into tbl_cuttinginstruction(donum,bundlestatus,numbundles,remainingbundles,orderstatus,date,orderid) values('".$row['donum']."','".$status."','".$$bundles."','".$remainingbundles."','In Process','".$date."','".$row_orders['id']."')";
	mysql_query("update tbl_orders set status='In Process',bundlestatus='".$status."',remainingbundles='".$remainingbundles."' where donum='".$row['donum']."' and id='".$row_orders['id']."'");
	//echo "update tbl_orders set status='In Process',bundlestatus='".$status."',remainingbundles='".$remainingbundles."' where donum='".$row['donum']."' and id='".$row_orders['id']."'";
	
	}
	
	
	}// rolls condition close
	
	
	if($row_orders['itemname']=='Rolls')
	{
	$totalmeters=$row_orders['height']+$totalmeters;
	$orderno="chk".$row['donum']."id".$row_orders['id'];
	//echo $orderno;
	//echo $$orderno;
	if($$orderno=="on")
	{
	$finishedmeters=0;
	$meters="txt".$row['donum']."id".$row_orders['id'];
	//$bundles=$row_orders['numbundles'];
	$res_cut=mysql_query("select *from tbl_cuttinginstruction where orderid='".$row_orders['id']."'");
	//echo "select *from tbl_cuttinginstrcution where orderid='".$row_orders['id']."'";
	while($row_cut=mysql_fetch_array($res_cut))
	{
	$finishedmeters=$finishedmeters+$row_cut['totalmtrss'];
	}
	$finishedmeters=$finishedmeters+$$meters;
	//echo $finishedbundles;
	
	if($row_orders['remainingmtrs']<$row_orders['height'])
	$remainingmeters=$row_orders['remainingmtrs']-$finishedmeters;
	else
	$remainingmeters=$row_orders['height']-$finishedmeters;
	//echo $remainingbundles;
	if($remainingmeters==0)
	$status="Full";
	else
	$status="Partial";
	mysql_query("insert into tbl_cuttinginstruction(donum,bundlestatus,totalmtrs,remainingmtrs,mtrsleft,orderstatus,date,orderid) values('".$row['donum']."','".$status."','".$$meters."','".$$meters."','".$remainingmeters."','In Process','".$date."','".$row_orders['id']."')");
	//echo "insert into tbl_cuttinginstruction(donum,bundlestatus,totalmtrs,remainingmtrs,orderstatus,date,orderid) values('".$row['donum']."','".$status."','".$$meters."','".$remainingmeters."','In Process','".$date."','".$row_orders['id']."')";
	//echo "insert into tbl_cuttinginstruction(donum,bundlestatus,numbundles,remainingbundles,orderstatus,date,orderid) values('".$row['donum']."','".$status."','".$$bundles."','".$remainingbundles."','In Process','".$date."','".$row_orders['id']."')";
	mysql_query("update tbl_orders set status='In Process',bundlestatus='".$status."',remainingmtrs='".$remainingmeters."' where donum='".$row['donum']."' and id='".$row_orders['id']."'");
	//echo "update tbl_orders set status='In Process',bundlestatus='".$status."',remainingbundles='".$remainingbundles."' where donum='".$row['donum']."' and id='".$row_orders['id']."'";
	
	}
	
	
	}// rolls condition close
	
	}// while closde
	
	
	$actualbundles=0;
	$actualmeters=0;
	$res_cut=mysql_query("select *from tbl_cuttinginstruction where donum='".$row['donum']."'");
	//echo "select *from tbl_cuttinginstruction where donum='".$row['donum']."'";
	while($row_cut=mysql_fetch_array($res_cut))
	{
	$actualbundles=$actualbundles+$row_cut['numbundles'];
	$actualmeters=$actualmeters+$row_cut['totalmtrs'];
	}
	$actualremainingbundles=$totalbundles-$actualbundles;
	$actualremainingmeters=$totalmeters-$actualmeters;
	//echo $actualremainingbundles;
	//echo $totalbundles;
	//echo $actualbundles;
	if($actualremainingbundles==0 && $actualremainingmeters==0)
	$stat="Full";
	else
	$stat="Partial";
	$date=date('d/m/Y');
	
	mysql_query("update tbl_order_master set status='In Process',bundlestatus='".$stat."',remainingbundles='".$actualremainingbundles."' where id=".$doid);
	
	mysql_query("update tbl_orders_factory set status='In Process',bundlestatus='".$stat."' where donum='".$row['donum']."'");
	
	
	
	}
	
	echo "successfully changed status.";
	}
	
	
	
	}
	

  function bundlingsubmit($val)
  {
  extract($val);
//  print_r($val);
//echo $reamrks;
  $date=date('d/m/Y');
  $res=mysql_query("select *from tbl_cuttinginstruction where id='".$doid."'");
  $row=mysql_fetch_array($res);
  $count=0;
  $bundlecount=0;

if($variety=="B Grade" || $variety=="C Grade" || $variety=="Skin" ||  $reamrks=="Blocks" || $reamrks=="blocks")
{
	if($itemname=='Rolls')
   	{
	   for($i=1;$i<=$mtr;$i++)
  		{
  		$bundle="bundle".$i;
		if($$bundle!="")
		$count++;
  		}
    } 
	else
	{
		for($i=1;$i<=$num;$i++)
  		{
  		$bundle="bundle".$i;
		if($$bundle!="")
		$count++;
  		}
	}
}
   else if($itemname=='Rolls')
   	{
 		  for($i=1;$i<=5;$i++)
  			{
			  $bundle="bundle".$i;
			  if($$bundle!="")
			  $count++;
  			}
   }
   else
   {
	   for($i=1;$i<=$num;$i++)
  		{
		  $bundle="bundle".$i;
		  if($$bundle!="")
	  	  $count++;
  		}

   }
 //echo $count;
  if($count!=0)
  {
  
  for($i=1;$i<=$count;$i++)
  {
  $bundle="bundle".$i;
 $res=mysql_query("select *from tbl_bundlelist where bundlenumber='".$$bundle."'");
 if(mysql_num_rows($res)>0)
 {
 $bundlecount++;
 echo "Bundle Number ".$$bundle." Existing.";
 
 }
  }
  
  $j='';
  $count1=0;
   for($i=1;$i<=$count1;$i++)
  {
	
  $bundle="bundle".$i;
 //$res=mysql_query("select *from tbl_bundlelist where bundlenumber='".$$bundle."'");
 if($$bundle==$j)
 {
// $bundlecount++;
$count1++;
 }
 $j=$$bundle;
  }
  
  if($count1>0)
  {echo "Duplicate Bundle numbers are not allowed.";}
  
  if($bundlecount==0 && $count1==0)
{
  
  if($variety=="B Grade" || $variety=="C Grade" || $variety=="Skin" ||  $reamrks=="Blocks" || $reamrks=="blocks")
  {
 		 for($i=1;$i<=$count;$i++)
		  {
 			 $bundle="bundle".$i;
 			 $quantity="weight".$i;
			 $q1=0;
			 $q2=0;
 			 if($$quantity==""){ echo "Please  enter weight.".$$quantity."";}
		
 		 if($itemname=='Rolls'){$num2=$mtr;} else{$num2=$num;}
  		if($count==$num2)
  		{ 
   			 if($$quantity=="")
 			{ echo "";}
 			 else
			{				
    			    if($itemname=='Rolls')
					{	
 			$s= mysql_query("select * from tbl_cuttinginstruction where id=".$doid);
			 $ss=mysql_fetch_array($s);
			 $odrmtr=$ss['orderedmtrs']+1;
			 $remmtr=$ss['remainingmtrs']-1;
						$q1= mysql_query("insert into tbl_bundlelist(donum,bundlenumber,bundledate,status,meters,orderid) values ('".$row['donum']."','".$$bundle."','".$date."','Bundled','".$$quantity."','".$row['orderid']."')");
		$q2=mysql_query("update tbl_cuttinginstruction set orderedmtrs='".$odrmtr."',orderstatus='Bundled', remainingmtrs='".$remmtr."'  where id=".$doid);
					}
					else
					{
		$q1= mysql_query("insert into tbl_bundlelist(donum,bundlenumber,bundledate,status,bundleweight,orderid) values ('".$row['donum']."','".$$bundle."','".$date."','Bundled','".$$quantity."','".$row['orderid']."')");
		$q2=mysql_query("update tbl_cuttinginstruction set orderstatus='Bundled' where id=".$doid);
					}
			}      
 	    }
  		else
   		{		
			 
  			 $remaining=$row['numbundles']-$count;
			 $s= mysql_query("select * from tbl_cuttinginstruction where id=".$doid);
			 $ss=mysql_fetch_array($s);
			 $odrmtr=$ss['orderedmtrs']+1;
			 $remmtr=$ss['remainingmtrs']-1;
    		// echo "hi3";
	    	if($$quantity=="")
			{echo "";}
			else
			{	
					 if($itemname=='Rolls')
					{
						$q1= mysql_query("insert into tbl_bundlelist(donum,bundlenumber,bundledate,status,meters,orderid) values ('".$row['donum']."','".$$bundle."','".$date."','Bundled','".$$quantity."','".$row['orderid']."')");
		$q2=mysql_query("update tbl_cuttinginstruction set orderedmtrs='".$odrmtr."',remainingmtrs='".$remmtr."'  where id=".$doid);

					}
					else
					{
	 $q1=mysql_query("insert into tbl_bundlelist(donum,bundlenumber,bundledate,status,bundleweight,orderid) values ('".$row['donum']."','".$$bundle."','".$date."','Bundled','".$$quantity."','".$row['orderid']."')");
	$q2=mysql_query("update tbl_cuttinginstruction set numbundles=".$remaining." where id=".$doid);	
					}
			}
 // echo "hi";
   	    }
  
   }//for loop close
   if($q1>0 & $q2>0 )
 {echo "successfully changed status.";}
  
  }
  else  if($itemname=='Rolls')
   {
	 $out=0;
	  $length="length".$i;
	if($$length=="")
  {echo "Please enter no of meters.";} 
//  if($$length!="")  {echo "Please do enter no of meters.";} 
for($i=1;$i<=5;$i++)
  {
  $bundle="bundle".$i;
  $length="length".$i;
 		 if($$bundle!="" && $$length!="" )
 	 		{
$s= mysql_query("select max(remainingmtrs) as remainingmtrs from tbl_cuttinginstruction where orderid='".$row['orderid']."'");
$ss=mysql_fetch_array($s);
if($ss['remainingmtrs']<$$length)
{
	echo " ".$ss['remainingmtrs']." meters is available.";
	}
 else if($ss['remainingmtrs']>=$$length)
		{
		
$out= mysql_query("insert into tbl_bundlelist(donum,bundlenumber,bundledate,status,meters,orderid) values ('".$row['donum']."','".$$bundle."','".$date."','Bundled','".$$length."','".$row['orderid']."')");
// echo "insert into tbl_bundlelist(donum,bundlenumber,bundledate,status,meters,orderid) values ('".$row['donum']."','".$$bundle."','".$date."','Bundled','".$$length."','".$row['orderid']."')";
//  $totallength=$$length[0]+$$length[1]+$$length[2]+$$length[3]+$$length[4]+$$length[5];

//echo $ss['remainingmtrs'];
$now=$ss['remainingmtrs'] - $$length;
//mysql_query("update remaining mtr");
//echo 
$$length;//ordered meters
//echo
$now;//remaining meters
//echo
$tmt=$$length+$now;//total meters
//if($now=='0'){$now='ZERO';}
//echo "update tbl_orders set remainingmtrs='".$now."' where id='".$row['orderid']."'";
//mysql_query("update tbl_orders set remainingmtrs='".$now."' where id='".$row['orderid']."'");
if($now==0)
{
mysql_query("update tbl_cuttinginstruction set orderedmtrs='".$$length."' , orderstatus='Bundled', remainingmtrs='".$now."' , totalmtrs= '".$tmt."' where id='".$row['id']."'");	
	} 
mysql_query("update tbl_cuttinginstruction set orderedmtrs='".$$length."' , remainingmtrs='".$now."' , totalmtrs= '".$tmt."' where id='".$row['id']."'");
//echo "insert into tbl_bundlelist(donum,bundlenumber,bundledate,status,bundleweight,orderid) values ('".$row['donum']."','".$$bundle."','".$date."','Bundled','".$$quantity."','".$row['orderid']."')";
	
		} else { echo " ".$ss['remainingmtrs']." meters is left. Please enter a value equal to or below ".$ss['remainingmtrs'].". ";}
 
			}
  } //for loop close

  
  if($out>0 )
  {echo "successfully changed status.";}
   
  }
  else
  {
  for($i=1;$i<=$count;$i++)
  {
  $bundle="bundle".$i;
  $quantity="pieces".$i;
  $q1=0;
  $q2=0;
  $q3=0;
  //echo "hi1";
  if($$quantity==""){ echo "Please enter  no.of pieces.";}
  
  //echo "hello";
 /* if($itemname=='Sheets' || $itemname=='Cushions'  )
  {   //echo $row['mtrsleft'];  */
 // echo $count;
  //echo $num;
  if($count==$num)
  { 

	$rmq=mysql_query("select * from tbl_orders where id='".$row['orderid']."'");
	//echo "select * from tbl_orders where id='".$row['orderid']."'";
	$rmqtd=mysql_fetch_array($rmq);
   $rowmtrsleft=$rmqtd['remainingmtrs'];
   $remqua=$rowmtrsleft-$$quantity;	   
   //echo $remqua;
	if($$quantity=="")
  echo "";
  else
{				
    
				if($rowmtrsleft>=$$quantity)
				{ 

				$q1=mysql_query("insert into tbl_bundlelist(donum,bundlenumber,bundledate,status,nopieces,orderid) values ('".$row['donum']."','".$$bundle."','".$date."','Bundled','".$$quantity."','".$row['orderid']."')");
				$q2=mysql_query("update tbl_orders set remainingmtrs='".$remqua."' where id='".$row['orderid']."'");
				$q3=mysql_query("update tbl_cuttinginstruction set orderstatus='Bundled' where id=".$doid);
				}
				else
				{
					echo $rmqtd['remainingmtrs']." quantity is left.";
				}
				
}      
  }
  else
   {
   $remaining=$row['numbundles']-$count;
	$rmq=mysql_query("select * from tbl_orders where id='".$row['orderid']."'");
	//echo "select * from tbl_orders where id='".$row['orderid']."'";
	$rmqtd=mysql_fetch_array($rmq);
   $rowmtrsleft=$rmqtd['remainingmtrs'];
   $remqua=$rowmtrsleft-$$quantity;	   
   //echo $remqua;
	// echo "hi3";
	    if($$quantity=="")
  echo "";
  else
{	
			if($rowmtrsleft>=$$quantity )
				{
					//echo "hs"; echo $remqua;
				$q1=mysql_query("insert into tbl_bundlelist(donum,bundlenumber,bundledate,status,nopieces,orderid) values ('".$row['donum']."','".$$bundle."','".$date."','Bundled','".$$quantity."','".$row['orderid']."')");
				$q2=mysql_query("update tbl_orders set remainingmtrs='".$remqua."' where id='".$row['orderid']."'");
				//echo "update tbl_orders set remainingmtrs='".$remqua."' where id='".$row['orderid']."'";
				$q3=mysql_query("update tbl_cuttinginstruction set numbundles=".$remaining." where id=".$doid);
				}
				else
				{
					echo $rmqtd['remainingmtrs']." quantity  is left.";
				}
				
}
 // echo "hi";
   }
 // }
  //echo "successfully changed status.";
  }//for loop close
         if($q1>0 & $q2>0 & $q3>0 )
		 {echo "successfully changed status.";}
  }//else close
  
} 
  }//first if close
  else
  {
  echo "Please enter atleast one bundle number.";
  }
  
  }//function close


  function cancelbundle($val)
  {
  extract($val);
//  print_r($val);
//echo $reamrks;
//  $date=date('d/m/Y');
$ress=mysql_query("select * from tbl_cuttinginstruction where id='".$doid."'");
$res_s=mysql_fetch_array($ress);
if($itemname=='Sheets' || $itemname=='Cushions')
{$num=$res_s['numbundles'];} else {$num=$res_s['remainingmtrs'];}
//echo $res_s['numbundles'];
//echo $itemname;
//echo $res_s[''];
//echo $res_s['orderid'];
$res2=mysql_query("update tbl_orders set cancelledbundles='".$num."' where id='".$res_s['orderid']."' ");
$res=mysql_query("update tbl_cuttinginstruction set cancelstatus='cancelled' where id='".$doid."'");
if($res>0 & $res2>0)
echo "cancelled";
//echo $doid;
  
  	$res=mysql_query("select *from tbl_order_master where status='In Process' and bundlestatus='Full'");
	
	while($row=mysql_fetch_array($res))
	{
	
	$totalbundles=0;
	$totalmeters=0;
	$totalmtrs=0;
	$count=0;
	$countmtrs=0;
	$dispatchedmeters=0;
	$res_orders=mysql_query("select *from tbl_orders where donum='".$row['donum']."'");
	while($row_orders=mysql_fetch_array($res_orders))
	{
	$bundles=0;
	$numbundles=0;
	$nummeters=0;
	$nummtrs=0;
	
	if($row_orders['itemname']=='Sheets' ||  $row_orders['itemname']=='Cushions')
	{
		$numbundles=$row_orders['numbundles']-$row_orders['cancelledbundles'];
		$totalbundles=$totalbundles+$numbundles;
	$res_bundle1=mysql_query("select *from tbl_bundlelist where donum='".$row['donum']."' and orderid='".$row_orders['id']."'");
	while($row_bundle1=mysql_fetch_array($res_bundle1))
	{
	
	if($row_bundle1['status']=="Dispatched")
	$count++;
	}// inner while close
		
	} else if($row_orders['itemname']== 'Rolls' && ($row_orders['variety']!= 'Skin' && $row_orders['variety']!= 'C Grade' && $row_orders['variety']!= 'B Grade') ){
		//echo 'hi';
		$nummeters=$row_orders['height']-$row_orders['cancelledbundles'];
		$totalmeters=$totalmeters+$nummeters;
	$res_bundle2=mysql_query("select *from tbl_bundlelist where donum='".$row['donum']."' and orderid='".$row_orders['id']."'");
	while($row_bundle2=mysql_fetch_array($res_bundle2))
	{
	
	$dispatchedmeters=$dispatchedmeters+$row_bundle2['meters'];
	
	}// inner while close
		
		} //else if close
		else  if($row_orders['itemname']== 'Rolls' && ($row_orders['variety']== 'Skin' || $row_orders['variety']== 'C Grade' || $row_orders['variety']== 'B Grade') ){
			  // echo 'hello';
						$nummtrs=$row_orders['height']-$row_orders['cancelledbundles'];
						$totalmtrs=$totalmtrs+$nummtrs;
	$res_bundle3=mysql_query("select *from tbl_bundlelist where donum='".$row['donum']."' and orderid='".$row_orders['id']."'");
						while($row_bundle3=mysql_fetch_array($res_bundle3))
						{
	
						if($row_bundle3['status']=="Dispatched")
						$countmtrs++;
						}// inner while close
		}
	
	
	} //echo "count:".$count."totalbundles:".$totalbundles."dispatchedmeters:".$dispatchedmeters."totalmeters:".$totalmeters."countmtrs:".$countmtrs."totalmtrs:".$totalmtrs;
//	echo "<br>";
//	mysql_num_rows($res_bundle1)!=0 &&
	if( $count==$totalbundles && $dispatchedmeters==$totalmeters && $countmtrs==$totalmtrs)
	{
	mysql_query("update tbl_order_master set status='Dispatched' where donum='".$row['donum']."'");
	//echo "update tbl_order_master set status='Dispatched' where donum='".$row['donum']."'";
	mysql_query("update tbl_orders_factory set status='Dispatched' where donum='".$row['donum']."'");
	//echo "update tbl_orders_factory set status='Dispatched' where donum='".$row['donum']."'";
	//mysql_query("update tbl_cuttinginstruction set status='Dispatched' where donum='".$row['donum']."'");
	}//if close
	}// exter while close
  
  
  }

  function deleteuser($val)
  {
 /* extract($val);
  echo $val;
  echo $id;
  echo $val[0];*/
  echo "hi";
  /*
//  print_r($val);
//echo $reamrks;
//  $date=date('d/m/Y');
$ress=mysql_query("select * from tbl_cuttinginstruction where id='".$doid."'");
$res_s=mysql_fetch_array($ress);
if($itemname=='Sheets' || $itemname=='Cushions')
{$num=$res_s['numbundles'];} else {$num=$res_s['remainingmtrs'];}
//echo $res_s['numbundles'];
//echo $itemname;
//echo $res_s[''];
//echo $res_s['orderid'];
$res2=mysql_query("update tbl_orders set cancelledbundles='".$num."' where id='".$res_s['orderid']."' ");
$res=mysql_query("update tbl_cuttinginstruction set cancelstatus='cancelled' where id='".$doid."'");
if($res>0 & $res2>0)
echo "cancelled";
//echo $doid;
  
  */
  }


function loadingsubmit($val)
	{
	error_reporting("E_ALL");
	extract($val);
	//print_r($val);
	/*if($loaddate=="")
	echo "Loading Date Required.";
	else*/
	if($transname=="")
	{echo "Select Transporter Name";
	echo $transname;
	}
	else
	if($vehiclenum=="Select Vehicle")
	{echo "Select Vehicle";
	//echo sizeof($val);
	}
	else
	if(sizeof($val)==4)
	echo "Check At least one order for Loading Advice.";
	else
	{
	mysql_query("update tbl_loadingadvice set status='Old' where status='New'");
	$res=mysql_query("select *from tbl_bundlelist where status='Bundled'");
	while($row=mysql_fetch_array($res))
	{
	
	$bnumber="chk".$row['bundlenumber'];
	if($$bnumber=="on")
	{
	
	$res_bundle=mysql_query("select *from tbl_bundlelist where bundlenumber='".$row['bundlenumber']."'");
	$row_bundle=mysql_fetch_array($res_bundle);
	
	$res_order=mysql_query("select *from tbl_orders where id='".$row_bundle['orderid']."'");
	//echo "select *from tbl_orders where id='".$row_bundle['orderid']."'";
	$row_orders=mysql_fetch_array($res_order);
	//echo "insert into tbl_loadingadvice(donum,dateofloading,bundlenum,quantity,Status,orderid,vehiclenumber,density,variety) values('".$row_bundle['donum']."','".$loaddate."','".$row['bundlenumber']."','".$row_bundle['nopieces']."','New','".$row_bundle['orderid']."','".$vehiclenum."','".$row_orders['density']."','".$row_orders['variety']."')";
	
$party=mysql_query("select *from tbl_order_master where donum='".$row_orders['donum']."' ");
	$partyname=mysql_fetch_array($party);

	
	if($row_orders['itemname']=="Rolls")
	$quantity=$row_bundle['meters'];
else if($row_orders['remarks']=='Blocks' || $row_orders['remarks']=='blocks' )
$quantity=$row_bundle['bundleweight'];
else if($row_orders['variety']=='B Grade' || $row_orders['variety']=='C Grade'  || $row_orders['variety']=='Skin' )
$quantity=$row_bundle['bundleweight'];
else
$quantity=$row_bundle['nopieces'];
	mysql_query("insert into tbl_loadingadvice(donum,dateofloading,bundlenum,partyname,remarks,quantity,Status,orderid,vehiclenumber,transporter,density,variety,itemname) values('".$row_bundle['donum']."','".date('d/m/Y')."','".$row['bundlenumber']."','".$partyname['orderby']."','".$partyname['remarks']."','".$quantity."','New','".$row_bundle['orderid']."','".$vehiclenum."','".$transname."','".$row_orders['density']."','".$row_orders['variety']."','".$row_orders['itemname']."')");
	//echo "insert into tbl_loadingadvice(donum,dateofloading,bundlenum,quantity) values('".$row_bundle['donum']."','".$loaddate."','".$row['bundlenumber']."','".$row_bundle['nopieces']."')";
	mysql_query("update tbl_bundlelist set status='Dispatched' where bundlenumber='".$row['bundlenumber']."'");
	
	
	
	}//if close
	
	}//while close
	
	$res=mysql_query("select *from tbl_order_master where status='In Process' and bundlestatus='Full'");
	
	while($row=mysql_fetch_array($res))
	{
	
	$totalbundles=0;
	$totalmeters=0;
	$totalmtrs=0;
	$count=0;
	$countmtrs=0;
	$dispatchedmeters=0;
	$res_orders=mysql_query("select *from tbl_orders where donum='".$row['donum']."'");
	while($row_orders=mysql_fetch_array($res_orders))
	{
	$bundles=0;
	$numbundles=0;
	$nummeters=0;
	$nummtrs=0;
	
	if($row_orders['itemname']=='Sheets' ||  $row_orders['itemname']=='Cushions')
	{
		$numbundles=$row_orders['numbundles']-$row_orders['cancelledbundles'];
		$totalbundles=$totalbundles+$numbundles;
	$res_bundle1=mysql_query("select *from tbl_bundlelist where donum='".$row['donum']."' and orderid='".$row_orders['id']."'");
	while($row_bundle1=mysql_fetch_array($res_bundle1))
	{
	
	if($row_bundle1['status']=="Dispatched")
	$count++;
	}// inner while close
		
	} else if($row_orders['itemname']== 'Rolls' && ($row_orders['variety']!= 'Skin' && $row_orders['variety']!= 'C Grade' && $row_orders['variety']!= 'B Grade') ){
		//echo 'hi';
		$nummeters=$row_orders['height']-$row_orders['cancelledbundles'];
		$totalmeters=$totalmeters+$nummeters;
	$res_bundle2=mysql_query("select *from tbl_bundlelist where donum='".$row['donum']."' and orderid='".$row_orders['id']."'");
	while($row_bundle2=mysql_fetch_array($res_bundle2))
	{
	
	$dispatchedmeters=$dispatchedmeters+$row_bundle2['meters'];
	
	}// inner while close
		
		} //else if close
		else  if($row_orders['itemname']== 'Rolls' && ($row_orders['variety']== 'Skin' || $row_orders['variety']== 'C Grade' || $row_orders['variety']== 'B Grade') ){
			  // echo 'hello';
						$nummtrs=$row_orders['height']-$row_orders['cancelledbundles'];
						$totalmtrs=$totalmtrs+$nummtrs;
	$res_bundle3=mysql_query("select *from tbl_bundlelist where donum='".$row['donum']."' and orderid='".$row_orders['id']."'");
						while($row_bundle3=mysql_fetch_array($res_bundle3))
						{
	
						if($row_bundle3['status']=="Dispatched")
						$countmtrs++;
						}// inner while close
		}
	
	
	} //echo "count:".$count."totalbundles:".$totalbundles."dispatchedmeters:".$dispatchedmeters."totalmeters:".$totalmeters."countmtrs:".$countmtrs."totalmtrs:".$totalmtrs;
//	echo "<br>";
//	mysql_num_rows($res_bundle1)!=0 &&
	if( $count==$totalbundles && $dispatchedmeters==$totalmeters && $countmtrs==$totalmtrs)
	{
	mysql_query("update tbl_order_master set status='Dispatched' where donum='".$row['donum']."'");
	//echo "update tbl_order_master set status='Dispatched' where donum='".$row['donum']."'";
	mysql_query("update tbl_orders_factory set status='Dispatched' where donum='".$row['donum']."'");
	//echo "update tbl_orders_factory set status='Dispatched' where donum='".$row['donum']."'";
	//mysql_query("update tbl_cuttinginstruction set status='Dispatched' where donum='".$row['donum']."'");
	}//if close
	}// exter while close
	
	
	
	
	echo "Loading Advice Finished Successfully.";
	}//else block close
	
	}//function close 
	
	
	
	function add_order($val) 
	{
		error_reporting("E_ALL");
     extract($val);
	
	if($customertype=="Select Type")
	echo "Select one Customer Type.";
	else
	if($customertype!="Others" && $orderfrom=="Select User")
	echo "Order From required.";
	else
	if($customertype=="Others" && $txtorderfrom=="")
	echo "Order From required.";
	else
	if($proirity=="Select Proirity")
	echo "Select Required dispatched Time.";
	
	else
	if($proirity=="Specify Date" && $dispatchdate=="")
	echo "Specify the Date.";
	else
	if($oname=="")
	echo "Authorised Person Name required.";
	
	else
	if($odesignation=="")
	echo "Authorised Person Designation required.";
	
	
	
	else
	{
	
	$sheetnum=0;
	$sheetcompletenum=0;
	$sheetcompletenum1=0;
	$sheethalfnum=0;
	$cushionnum=0;	
	$cushioncompletenum=0;
	$cushioncompletenum1=0;
	$cushionhalfnum=0;
	$rollsnum=0;
	$rollscompletenum=0;
	$rollscompletenum1=0;
	$rollshalfnum=0;
	for($i=1;$i<=$sheetcount;$i++)
	{
	$variety="svariety_".$i;
	$density="sden_".$i;
	$length="slen_".$i;
	$width="swid_".$i;
	$lengthtype="slentype_".$i;
	$widthtype="swidtype_".$i;
	$thickness="sthi_".$i;
	$quantity="squa_".$i;
	$bundles="sbun_".$i;
	$package="spack_".$i;
	$sremarks="sremarks_".$i;
	$color="scolor_".$i;
	
	if($$variety=="Select Variety" || $$density=="" || $$length=="" || $$width=="" || $$thickness=="" || ($$quantity=="" && $$bundles==""))
$sheetnum++;

 
 if($$variety!="Select Variety" && $$density!="" || $$length!="" || $$width!="" || $$thickness!="" || ($$quantity!="" && $$bundles!=""))
$sheetcompletenum++;
	
	else
	if($$variety=="Select Variety" && $$density=="" && $$length=="" && $$width=="" && $$thickness=="" && ($$quantity=="" && $$bundles==""))
$sheetcompletenum1++;
else

	$sheethalfnum++;
	}
	
	
	for($i=1;$i<=$cushionscount;$i++)
	{
	$cvariety="cvariety_".$i;
	$cdensity="cden_".$i;
	$clength="clen_".$i;
	$cwidth="cwid_".$i;
	$clengthtype="clentype_".$i;
	$cwidthtype="cwidtype_".$i;
	$cthickness="cthi_".$i;
	$cquantity="cqua_".$i;
	$cbundles="cbun_".$i;
	$cpackage="cpack_".$i;
	$cremarks="cremarks_".$i;
	$ccolor="ccolor_".$i;
	
	if($$cvariety=="Select Variety" || $$cdensity=="" || $$clength=="" || $$cwidth=="" || $$cthickness=="" || ($$cquantity=="" && $$cbundles==""))
$cushionnum++;

if($$cvariety!="Select Variety" && $$cdensity!="" || $$clength!="" || $$cwidth!="" || $$cthickness!="" || ($$cquantity!="" && $$cbundles!=""))
$cushioncompletenum++;
	
	else
	if($$cvariety=="Select Variety" && $$cdensity=="" && $$clength=="" && $$cwidth=="" && $$cthickness=="" && ($$cquantity=="" && $$cbundles==""))
$cushioncompletenum1++;
else

	$cushionhalfnum++;
	
	}
	
	for($i=1;$i<=$rollscount;$i++)
	{
	$rvariety="rvariety_".$i;
	$rdensity="rden_".$i;
	$rlength="rlen_".$i;
	$rwidth="rwid_".$i;
	$rlengthtype="rlentype_".$i;
	$rwidthtype="rwidtype_".$i;
	$rthickness="rthi_".$i;
	
	$rpackage="rpack_".$i;
	$rremarks="rremarks_".$i;
	$rcolor="rcolor_".$i;
	
	if($$rvariety=="Select Variety" || $$rdensity=="" || $$rlength=="" || $$rwidth=="" || $$rthickness=="")
$rollsnum++;
if($$rvariety!="Select Variety" && $$rdensity!="" || $$rlength!="" || $$rwidth!="" || $$rthickness!="")
$rollscompletenum++;
else
	if($$rvariety=="Select Variety" && $$rdensity=="" && $$rlength=="" && $$rwidth=="" && $$rthickness=="")
$rollscompletenum1++;
else
$rollshalfnum++;
	}
	//echo $rollshalfnum;
	//echo $rollscompletenum;
	//echo $rollsnum;
	
	if($sheetnum==$sheetcount && $cushionnum==$cushionscount && $rollsnum==5)
	echo "Please enter any one order or completely fill the order";
	else
	if($sheethalfnum!=0)
    echo "Please enter all the details for the order of Sheets.";
	else
	if($cushionhalfnum!=0)
    echo "Please enter all the details for the order of Cushions.";
	else
	if($rollshalfnum!=0)
    echo "Please enter all the details for the order of Rolls.";
	else
	{
	
	
	
	
	
	if($customertype=='Branch')
	{
	$user=$orderfrom;
	$orderto=$user;
	}
	
	if($proirity=="Specify Date")
	$proirity=$dispatchdate;
	
	if($customertype=="Others")
	$orderfr=$txtorderfrom;
	else
	$orderfr=$orderfrom;
	
	//echo "insert into tbl_order_master(donum,orderdate,orderby,usertype,priority,status,packagetype,active) values('".$orderno."','".$odate."','".$user."','".$customertype."','".$proirity."','New','".$packagetype."','Yes')";
	
	
$donum=0;
$res_orders=mysql_query("select max(donum) as donum from tbl_order_master");
//echo "select max(donum) as donum from tbl_order_master";
if(mysql_num_rows($res_orders)==0)
$donum=1;
else
{
$row=mysql_fetch_array($res_orders);
$donum=intval($row['donum'])+1;
}
//echo $donum;

$date=date('d/m/Y');

	mysql_query("insert into tbl_order_master(donum,orderdate,orderby,usertype,priority,status,packagetype,active,orderto,remarks,authorisedname,authoriseddesignation,ordertype,ponum,podate,billingprice) values('".$donum."','".$date."','".$orderfr."','".$customertype."','".$proirity."','Sent to Factory','".$packagetype."','Yes','Factory','".$remarks."','".$oname."','".$odesignation."','".$ordertype."','".$ponum."','".$podate."','".$bplist."')");
	
mysql_query("insert into tbl_orders_factory(donum,date,status,orderfrom) values('".$donum."','".date('d-m-Y')."','New','".$orderfrom."')");
			
	//mysql_query("update tbl_order_master set orderdate='".$odate."',orderby='".$orderfrom."',usertype='".$customertype."',priority='".$proirity."',status='New',packagetype='".$packagetype."',active='Yes',orderto='".$orderto."',remarks='".$remarks."',authorisedname='".$oname."',authoriseddesignation='".$odesignation."',ordertype='".$ordertype."',ponum='".$ponum."',podate='".$podate."' where donum='".$orderno."'");
	//echo "update tbl_order_master set orderdate='".$odate."',orderby='".$orderfrom."',usertype='".$customertype."',priority='".$proirity."',status='New',packagetype='".$packagetype."',active='Yes',orderto='".$orderto."',remarks='".$remarks."',authorosedname='".$oname."',authoriseddesignation='".$odesignation."',ordertype='".$ordertype."',ponum='".$ponum."',podate='".$podate."' where donum='".$orderno."'";
	
	for($i=1;$i<=$sheetcompletenum;$i++)
	{
	$variety="svariety_".$i;
	$density="sden_".$i;
	$length="slen_".$i;
	$width="swid_".$i;
	$lengthtype="slentype_".$i;
	$widthtype="swidtype_".$i;
	$thickness="sthi_".$i;
	$quantity="squa_".$i;
	$bundles="sbun_".$i;
	$package="spack_".$i;
	$sremarks="sremarks_".$i;
	$color="scolor_".$i;
	
	if($$bundles=="")
	$$bundles=1;
	mysql_query("insert into tbl_orders(donum,itemname,quantity,numbundles,width,height,density,thickness,variety,remainingbundles,status,packagetype,remarks,colorspecific,widthtype,heighttype,remainingmtrs,cancelledbundles) values('".$donum."','Sheets','".$$bundles."','".$$quantity."','".$$width."','".$$length."','".$$density."','".$$thickness."','".$$variety."','".$$quantity."','Sent to Factory','".$$package."','".$$sremarks."','".$$color."','".$$widthtype."','".$$lengthtype."','".$$bundles."','0')");
	}
	
	
	
	for($i=1;$i<=$cushioncompletenum;$i++)
	{
		//echo "hi";
	$cvariety="cvariety_".$i;
	$cdensity="cden_".$i;
	$clength="clen_".$i;
	$cwidth="cwid_".$i;
	$clengthtype="clentype_".$i;
	$cwidthtype="cwidtype_".$i;
	$cthickness="cthi_".$i;
	$cquantity="cqua_".$i;
	$cbundles="cbun_".$i;
	$cpackage="cpack_".$i;
	$cremarks="cremarks_".$i;
	$ccolor="ccolor_".$i;
	//echo $$cthickness;
	if($$cbundles=="")
	$$cbundles=1;
	mysql_query("insert into tbl_orders(donum,itemname,quantity,numbundles,width,height,density,thickness,variety,remainingbundles,status,packagetype,remarks,colorspecific,widthtype,heighttype,remainingmtrs,cancelledbundles) values('".$donum."','Cushions','".$$cbundles."','".$$cquantity."','".$$cwidth."','".$$clength."','".$$cdensity."','".$$cthickness."','".$$cvariety."','".$$cquantity."','Sent to Factory','".$$packagetype."','".$$cremarks."','".$$ccolor."','".$$cwidthtype."','".$$clengthtype."','".$$cbundles."','0')");

	}
		
	for($i=1;$i<=$rollscompletenum;$i++)
	{
		//echo "hi";
	$rvariety="rvariety_".$i;
	$rdensity="rden_".$i;
	$rlength="rlen_".$i;
	$rwidth="rwid_".$i;
	$rlengthtype="rlentype_".$i;
	$rwidthtype="rwidtype_".$i;
	$rthickness="rthi_".$i;
	
	$rpackage="rpack_".$i;
	$rremarks="rremarks_".$i;
	$rcolor="rcolor_".$i;
	//echo $$cthickness;
	
	mysql_query("insert into tbl_orders(donum,itemname,width,height,density,thickness,variety,status,packagetype,remarks,colorspecific,widthtype,heighttype,remainingmtrs,cancelledbundles) values('".$donum."','Rolls','".$$rwidth."','".$$rlength."','".$$rdensity."','".$$rthickness."','".$$rvariety."','Sent to Factory','".$$rpackage."','".$$rremarks."','".$$rcolor."','".$$rwidthtype."','".$$rlengthtype."','".$$rlength."','0')");

	
	}	
		
		
		
	echo "Order Created Successfully. Your DO Number is <b>".$donum."</b>. Please Note this DO Number for Tracking the DO";
	}
	}
	}
	 
}
?>