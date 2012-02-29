<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<LINK REL="SHORTCUT ICON" HREF="<?php echo base_url(); ?>images/malinilogo.png">
<title>Shree Malani Foams </title>
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
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.simplemodal.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/init.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.datepick.js"></script>
<link type="text/css" href="<?php echo base_url();?>css/jquery.datepick.css" rel="stylesheet" />

<link type="text/css" href="<?php echo  base_url();?>themes/base/ui.all.css" rel="stylesheet" />


<script type="text/javascript">
	$(function() 
	{
	//alert("hi");
		$('#odate').datepick({showOn: 'button', buttonImage: '<?php echo  base_url();?>images/calendar.gif', buttonImageOnly: true});
		$('#podate').datepick({showOn: 'button', buttonImage: '<?php echo  base_url();?>images/calendar.gif', buttonImageOnly: true});
		
		$('#dispatchdate').datepick({showOn: 'button', buttonImage: '<?php echo  base_url();?>images/calendar.gif', buttonImageOnly: true});
		
		});
		</script>
		
		
<script language="javascript">
base_url = '<?= base_url();?>index.php/';
$(document).ready(function(){
	
	$('#orderForm').submit(function(e) {

		register();
		e.preventDefault();
		
	});
	
});


function register()
{
//alert("hi");
	disablesubmit();
	hideshow('loading',1);
	error(0);
	
	$.ajax({
		type: "POST",
		 url: base_url+'admin/admin_orders/ordersubmit',
		data: $('#orderForm').serialize(),
		
		success: function(msg)
		{
			msg1=msg.split(".");
			alert(msg1[0]);
			enablesubmit();
			if(msg1[0]=='Order Created Successfully')
{
$( "#orderForm" )[ 0 ].reset();
}

				success(1,msg);
				
			
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
function disablesubmit()
	{
		$('#fsubmit').removeClass('mfsub');		
		$('#fsubmit').val('wait...');		
		$('#fsubmit').attr('disabled', 'disabled');
		
	}

	function enablesubmit()
	{
		$('#fsubmit').addClass('mfsub');		
		$('#fsubmit').removeAttr('disabled');		
		
	}


function showusers()
{ 

var customer=document.getElementById('customertype').options[document.getElementById('customertype').selectedIndex].text;
//var semester=document.getElementById('semesters').options[document.getElementById('semesters').selectedIndex].text;
var value=customer;
//alert(value);
xmlHttp=GetXmlHttpObject();
if (xmlHttp==null)
 {
 alert ("Browser does not support HTTP Request");
 return;
 }
var url=base_url+'admin/admin_orders/show_users/'+value;;
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
  var S =document.forms[0].elements['orderfrom'];
//alert(S);
while(S.options.length)
 {

S.options[0] = null;
}
document.getElementById("orderfrom").options[0]=new Option('Select User','Select User');
             var valu1=xmlHttp.responseText;
			//alert(valu1);
           if(valu1=='Other')
		   {
		   //alert('hi');
		   document.getElementById('textuser').style.display='';
		   document.getElementById('selectuser').style.display='none';
		   }
			else
			{
			var users_list1=valu1.split(",");
			// alert(users_list[0]);
			// alert(users_list.length);
			// document.getElementById("semesters").options[i]=new Option(users_list[i],users_list[i]);		
			for(var i=1;i<users_list1.length;i++)
			 {
			var j=i-1;
                document.getElementById('selectuser').style.display='';
			//var valu2=users_list1[j].split(":");
			//alert(valu2);
			//alert(valu2[j]);
    	        //document.getElementById("orderfrom").options[i]=new Option(valu2[1],valu2[0]);	
    	        document.getElementById("orderfrom").options[i]=new Option(users_list1[j],users_list1[j]);	
				   document.getElementById('textuser').style.display='none';	
    	        }
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

function getcity(f)
{
var v=f.value;
//alert(v);
//var s=v.split('-');
//alert(s[1]);
value=v;
xmlHttp=GetXmlHttpObject();
if (xmlHttp==null)
 {
 alert ("Browser does not support HTTP Request");
 return;
 }
var url=base_url+'admin/admin_orders/getcity/'+value;;

xmlHttp.onreadystatechange=stateChanged4;
xmlHttp.open("POST",url,true);
xmlHttp.send(null);

}

function stateChanged4() 
{ 

if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
 { 
 
 //alert(xmlHttp.responseText);  
document.getElementById('city').style.display='';
document.getElementById('cityname').readOnly="readonly";
document.getElementById('cityname').value=xmlHttp.responseText;
        
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


function showpriority()
{
	
	if(document.getElementById('proirity').selectedIndex==3)
	    document.getElementById('reqdate').style.display='';
		else
		 document.getElementById('reqdate').style.display='none';
}


function showden(variety,d,name)
{ 
var n=d.split('_');
//alert(n[1]);
var num=n[1];

	if(name=='Sheets')
	{
			if(variety=='B Grade' || variety=='C Grade' || variety=='Skin')
			{//alert('hi')
			//document.getElementById('slen_'+num).disabled='disabled';
			document.getElementById('slen_'+num).value='NA';
			//document.getElementById('slentype_'+num).disabled='disabled';
			document.getElementById('slentype_'+num).value='NA';
			//document.getElementById('swid_'+num).disabled='disabled';
			document.getElementById('swid_'+num).value='NA';
			//document.getElementById('swidtype_'+num).disabled='disabled';
			document.getElementById('swidtype_'+num).value='NA';
			//document.getElementById('sthi_'+num).disabled='disabled';
			document.getElementById('sthi_'+num).value='NA';
			//document.getElementById('sbun_'+num).disabled='disabled';
			document.getElementById('sbun_'+num).value='NA';
			//document.getElementById('scolor_'+num).disabled='disabled';
			document.getElementById('scolor_'+num).value='NA';
			}else
			{
			document.getElementById('slen_'+num).disabled='';document.getElementById('slen_'+num).value='';
			document.getElementById('slentype_'+num).disabled='';document.getElementById('slentype_'+num).value='';
			document.getElementById('swid_'+num).disabled='';document.getElementById('swid_'+num).value='';
			document.getElementById('swidtype_'+num).disabled='';document.getElementById('swidtype_'+num).value='';
			document.getElementById('sthi_'+num).disabled='';document.getElementById('sthi_'+num).value='';
			document.getElementById('sbun_'+num).disabled='';document.getElementById('sbun_'+num).value='';
			document.getElementById('scolor_'+num).disabled='';document.getElementById('scolor_'+num).value='';
			}
	}
	if(name=='Cushions')
	{
			if(variety=='B Grade' || variety=='C Grade' || variety=='Skin')
			{//alert('hi')
			//document.getElementById('clen_'+num).disabled='disabled';
			document.getElementById('clen_'+num).value='NA';
			//document.getElementById('clentype_'+num).disabled='disabled';
			document.getElementById('clentype_'+num).value='NA';
			//document.getElementById('cwid_'+num).disabled='disabled';
			document.getElementById('cwid_'+num).value='NA';
			//document.getElementById('cwidtype_'+num).disabled='disabled';
			document.getElementById('cwidtype_'+num).value='NA';
			//document.getElementById('cthi_'+num).disabled='disabled';
			document.getElementById('cthi_'+num).value='NA';
			//document.getElementById('cbun_'+num).disabled='disabled';
			document.getElementById('cbun_'+num).value='NA';
			//document.getElementById('ccolor_'+num).disabled='disabled';
			document.getElementById('ccolor_'+num).value='NA';
			}else
			{ //alert('hi');
			document.getElementById('clen_'+num).disabled='';document.getElementById('clen_'+num).value='';
			document.getElementById('clentype_'+num).disabled='';document.getElementById('clentype_'+num).value='';
			document.getElementById('cwid_'+num).disabled='';document.getElementById('cwid_'+num).value='';
			document.getElementById('cwidtype_'+num).disabled='';document.getElementById('cwidtype_'+num).value='';
			document.getElementById('cthi_'+num).disabled='';document.getElementById('cthi_'+num).value='';
			document.getElementById('cbun_'+num).disabled='';document.getElementById('cbun_'+num).value='';
			document.getElementById('ccolor_'+num).disabled='';document.getElementById('ccolor_'+num).value='';
			}
	}
	if(name=='Rolls')
	{
			if(variety=='B Grade' || variety=='C Grade' || variety=='Skin')
			{//alert('hi')
			//document.getElementById('rlen_'+num).disabled='disabled';
			//document.getElementById('rlen_'+num).value='NA';
			//document.getElementById('rlentype_'+num).disabled='disabled';
			document.getElementById('rlentype_'+num).value='NA';
			//document.getElementById('rwid_'+num).disabled='disabled';
			document.getElementById('rwid_'+num).value='NA';
			//document.getElementById('rwidtype_'+num).disabled='disabled';
			document.getElementById('rwidtype_'+num).value='NA';
			//document.getElementById('rthi_'+num).disabled='disabled';
			document.getElementById('rthi_'+num).value='NA';
			//document.getElementById('rcolor_'+num).disabled='disabled';
			document.getElementById('rcolor_'+num).value='NA';
			}else
			{
			//document.getElementById('rlen_'+num).disabled='';document.getElementById('rlen_'+num).value='';
			document.getElementById('rlentype_'+num).disabled='';document.getElementById('rlentype_'+num).value='';
			document.getElementById('rwid_'+num).disabled='';document.getElementById('rwid_'+num).value='';
			document.getElementById('rwidtype_'+num).disabled='';document.getElementById('rwidtype_'+num).value='';
			document.getElementById('rthi_'+num).disabled='';document.getElementById('rthi_'+num).value='';
			document.getElementById('rcolor_'+num).disabled='';document.getElementById('rcolor_'+num).value='';
			}
	}
	
if(name=='Sheets'){document.getElementById('sden_'+num).options.length = 0;}
if(name=='Cushions'){  document.getElementById('cden_'+num).options.length = 0;}
if(name=='Rolls'){document.getElementById('rden_'+num).options.length = 0;}
//alert('sden_'+num);
if(variety=='Select Variety' && name=='Sheets'){ 
document.getElementById('sden_'+num).options.length = 0;
//document.getElementById('sden_'+num).options[0]=new Option('','');
}
if(variety=='Select Variety' && name=='Cushions'){ 
document.getElementById('cden_'+num).options.length = 0;
//document.getElementById('cden_'+num).options[0]=new Option('','');
}
if(variety=='Select Variety' && name=='Rolls'){ 
document.getElementById('rden_'+num).options.length = 0;
//document.getElementById('rden_'+num).options[0]=new Option('','');
}
//alert(num);alert(variety);alert(name);
//var customer=document.getElementById('customertype').options[document.getElementById('customertype').selectedIndex].text;
//var semester=document.getElementById('semesters').options[document.getElementById('semesters').selectedIndex].text;
//var value=customer;
//alert(value);
var param=num+':'+variety+':'+name;
xmlHttp=GetXmlHttpObject();
if (xmlHttp==null)
 {
 alert ("Browser does not support HTTP Request");
 return;
 }
var url=base_url+'admin/admin_orders/show_densities/'+param;
//url=url+"&q="+str;

//alert(url);
/*url=url+"&sid="+Math.random()*/
xmlHttp.onreadystatechange=stateChanged2;
xmlHttp.open("POST",url,true);
xmlHttp.send(null);

//alert(count);
}
function stateChanged2() 
{ 
//alert(count);
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
 { 
 //alert("changed");
 //alert(xmlHttp.responseText);
  
//
             var valu1=xmlHttp.responseText;
			
           
			 var users_list1=valu1.split(",");
			//alert(users_list1[0]);
			 //alert(users_list.length);
			
			var cou=users_list1[0];
			var tex=users_list1[1];
		
			if(tex=='Sheets')
			{
			//document.getElementById("sden_"+cou).options[0]=new Option('Den','Den');
			// document.getElementById("semesters").options[i]=new Option(users_list[i],users_list[i]);		
			
			for(var i=3;i<users_list1.length;i++)
			 {
				 //alert(count);
			//alert(users_list1[i]);
			var j=i-1;
                //document.getElementById('selectuser').style.display='';
				
				
    	        document.getElementById("sden_"+cou).options[i-3]=new Option(users_list1[j],users_list1[j]);	
				
				  // document.getElementById('textuser').style.display='none';	
    	        }
			}
			
			if(tex=='Rolls')
			{
			
			//document.getElementById("sden_"+cou).options[0]=new Option('Den','Den');
			// document.getElementById("semesters").options[i]=new Option(users_list[i],users_list[i]);		
			
			for(var i=3;i<users_list1.length;i++)
			 {
				 //alert(count);
			//alert(users_list1[i]);
			var j=i-1;
                //document.getElementById('selectuser').style.display='';
				
				
    	        document.getElementById("rden_"+cou).options[i-3]=new Option(users_list1[j],users_list1[j]);	
				
				  // document.getElementById('textuser').style.display='none';	
    	        }
			}
			
			if(tex=='Cushions')
			{
			//document.getElementById("cden_"+cou).options[0]=new Option('Den','Den');
			// document.getElementById("semesters").options[i]=new Option(users_list[i],users_list[i]);		
			
			for(var i=3;i<users_list1.length;i++)
			 {
				 //alert(count);
			// alert(users_list[i]);
			var j=i-1;
                //document.getElementById('selectuser').style.display='';
    	        document.getElementById("cden_"+cou).options[i-3]=new Option(users_list1[j],users_list1[j]);	
				  // document.getElementById('textuser').style.display='none';	
    	        }
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


function blocksornot(b,h)
{
//	alert(b);
//alert(no);
var j=h.split('_');
var no=j[1];
	//<input type=text size=7 name=sremarks_".$j." id=sremarks_".$j." onkeyup=blocksornot(this.value) >
	//var if
	if(b =='blocks' || b == 'Blocks')
	{//alert('hi');
	//alert(document.getElementById('squa_'+no).value);
	var bun=document.getElementById('squa_'+no).value// interchanged for calculation dont confuse
	var qua=document.getElementById('sbun_'+no).value// interchanged for calculation dont confuse
	//alert(bun);
	//alert(qua);
	if(qua == '')
	document.getElementById('sbun_'+no).value=document.getElementById('squa_'+no).value// interchanged for calculation dont confuse
	if(bun == '')
	document.getElementById('squa_'+no).value=document.getElementById('sbun_'+no).value// interchanged for calculation dont confuse
	if(qua!=bun)
	document.getElementById('sbun_'+no).value=document.getElementById('squa_'+no).value// interchanged for calculation dont confuse
	
	}
	else 
	{//alert('hello');
	}
	
//	<td><input type=text size=5 name=squa_".$j." id=squa_".$j."  maxlength='6' onblur=numbundles(this.value,".$j.",'Sheets')></td>
//	<td ><input type=text size=5 name=sbun_".$j." id=sbun_".$j." maxlength='6' ></td>

}
function numbundles(num,nom,type)
{ 
var nn=nom.split('_');
var no=nn[1];
//alert(no);
//alert(num);
//var customer=document.getElementById('customertype').options[document.getElementById('customertype').selectedIndex].text;
//var semester=document.getElementById('semesters').options[document.getElementById('semesters').selectedIndex].text;
//var value=customer;
//alert(num);
//alert(type);
if(type=='Sheets')
{//alert('hello');
var w=document.getElementById('swid_'+no).value
//alert(w);
var wt=document.getElementById('swidtype_'+no).value
//alert(wt);
var t=document.getElementById('sthi_'+no).value
//alert(t);
}
/*if(type=='Cushions')
{//alert('hi');
var w=document.getElementById('cwid_'+no).value
//alert(w);
var wt=document.getElementById('cwidtype_'+no).value
//alert(wt);
var t=document.getElementById('cthi_'+no).value
//alert(t);
}*/
var param=num+':'+w+':'+wt+':'+no+':'+t+':'+type
xmlHttp=GetXmlHttpObject();
if (xmlHttp==null)
 {
 alert ("Browser does not support HTTP Request");
 return;
 }
var url=base_url+'admin/admin_orders/show_bundles/'+param;
//url=url+"&q="+str;
//alert(url);
//alert(url);
/*url=url+"&sid="+Math.random()*/
xmlHttp.onreadystatechange=stateChanged3;
xmlHttp.open("POST",url,true);
xmlHttp.send(null);

//alert(count);
}
function stateChanged3() 
{ 
//alert(count);
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
 { 
 //alert("changed");
// alert(xmlHttp.responseText);
  

             var valu1=xmlHttp.responseText;
             var valu2=valu1.split(':');
			var str=valu2[2];
			//alert(document.getElementById('sbun_'+valu2[1]).value);
			// var str=str.substring(1, str.l);
           //alert(str);
			if(str=='Sheets')
			{
				//alert('hi');
           document.getElementById('sbun_'+valu2[1]).value=valu2[0];
			}
/*			if(str=='Cushions')
			{
				//alert('hello');
				document.getElementById('cbun_'+valu2[1]).value=valu2[0];
			} */
			//alert(tex);
	
 
        
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


function numcushions(num,h)
{ 
var dd=h.split('_');
var no=dd[1];
	variety=document.getElementById('cvariety_'+no).value;
	if(variety== 'B Grade' || variety=='C Grade' || variety=='Skin')
	{//alert('hi');
	document.getElementById('cbun_'+no).value='NA';
	} else
	{
//alert(num);
res=num*50;
document.getElementById('cbun_'+no).value=res;
	}
}
	
		function digitsOnly(obj){
obj.value=obj.value.replace(/[^0-9.]/g,'')
  obj.value+=''
  obj.focus()
		}
			function allow_numeric(obj){
  if (/[^0-9.]/i.test(obj.value))
  obj.value=obj.value.replace(/[^0-9.]/g,'')
  obj.value+=''
  obj.focus()
}
</script>


<script type="text/javascript"> 
                        $(function(){ 
                                // start a counter for new row IDs 
                                // by setting it to the number 
                                // of existing rows 
                                var newRowNum = 0; 
								
 
                                // bind a click event to the "Add" link 
                                $('#addnew').click(function(){ 
                                        // increment the counter 
                                        newRowNum += 1; 
										var ss=document.getElementById('sheetcount').value;
										newRownn =ss ; 
										 newRownn++; 
                                     // alert(newRowNum);
									// alert(newRownn);
									 document.getElementById('sheetcount').value=newRownn;
                                        // get the entire "Add" row -- 
                                        // "this" refers to the clicked element 
                                        // and "parent" moves the selection up 
                                        // to the parent node in the DOM 
                                        var addRow = $(this).parent().parent(); 
 
                                        // copy the entire row from the DOM 
                                        // with "clone" 
                                        var newRow = addRow.clone(); 
 
                                        // set the values of the inputs 
                                        // in the "Add" row to empty strings 
//                                        $('input', addRow).val(''); 
 //                                       $('select', addRow).val(''); 
										//$('scolor_', addRow).val('Standard' + newRowNum); 
									
 
                                        // replace the HTML for the "Add" link  
                                        // with the new row number 
                                        $('td:first-child', newRow).html('<a href="" class="remove">Remove<\/a>'); 
                                        //$('td:first-child', newRow).html(''); 
										//$('td:second-child', newRow).html('onchange=showden(this.value,'newRownn',"Sheets")'); 
 
                                        // insert a remove link in the last cell 
                                        //$('td:last-child', newRow).html('<a href="" class="remove">Remove<\/a>'); 
 
                                        // loop through the inputs in the new row 
                                        // and update the ID and name attributes 
                                        $('input,select', newRow).each(function()
										{ 
										
										var text=$(this).attr('id',newID);
										//(text);
										text=text.split('_');
									      var num=parseInt(text[1])+newRowNum;
										 //alert(num);
                                                var newID =text[0]+ '_' + num; 
                                                $(this).attr('id',newID).attr('name',newID); 
												//$(this).attr('onchange=showden(this.value,'newRownn',"Sheets")'); 
										
												
												//document.getElementById('sheetcount').value=num;
												//alert(document.getElementById('sheetcount').value);
                                        }); 
 
 
                                        // loop through the inputs in the new row 
                                        // and update the ID and name attributes 
                                        
 
                                        // insert the new row into the table 
                                        // "before" the Add row 
                                       
 
                                        // add the remove function to the new row 
                                        $('a.remove', newRow).click(function()
										{ 		
												var scn=document.getElementById('sheetcount').value;
												document.getElementById('sheetcount').value=scn-1;
										        $(this).parent().parent().remove(); 
                                                return false;          
                  
                                        }); 
										
										
 
                                        // prevent the default click 
										//addRow.after(newRow); 
                                        addRow.before(newRow); 
										return false; 
                                }); 
								 
                        }); 
						
						
						$(function(){ 
                                // start a counter for new row IDs 
                                // by setting it to the number 
                                // of existing rows 
                                var newRowNum = 0; 
 
                                // bind a click event to the "Add" link 
                                $('#addnew1').click(function(){ 
                                        // increment the counter 
                                        newRowNum += 1; 
   										var cc=document.getElementById('cushionscount').value;
										newRownn =cc; 
										 newRownn++; 
                                     // alert(newRowNum);
									// alert(newRownn);
									 document.getElementById('cushionscount').value=newRownn;
                                        // get the entire "Add" row -- 
                                        // "this" refers to the clicked element 
                                        // and "parent" moves the selection up 
                                        // to the parent node in the DOM 
                                        var addRow = $(this).parent().parent(); 
 
                                        // copy the entire row from the DOM 
                                        // with "clone" 
                                        var newRow = addRow.clone(); 
 
                                        // set the values of the inputs 
                                        // in the "Add" row to empty strings 
   //                                    $('input', addRow).val(''); 
      //                                  $('select', addRow).val(''); 
									
 

                                        // replace the HTML for the "Add" link  
                                        // with the new row number 
                                        $('td:first-child', newRow).html('<a href="" class="remove">Remove<\/a>'); 
 
                                        // insert a remove link in the last cell 
                                        //$('td:last-child', newRow).html('<a href="" class="remove">Remove<\/a>'); 
 
                                        // loop through the inputs in the new row 
                                        // and update the ID and name attributes 
                                        /*$('input', newRow).each(function()
										{ 
										
										var text=$(this).attr('id',newID);
										//(text);
										text=text.split('_');
									      var num=parseInt(text[1])+newRowNum;
										// alert(num);
                                                var newID =text[0]+ '_' + num; 
                                                $(this).attr('id',newID).attr('name',newID); 
                                        }); 
 
 
                                        // loop through the inputs in the new row 
                                        // and update the ID and name attributes 
                                        $('select', newRow).each(function()
										{ 
										
										var text=($(this).attr('id'));
										text=text.split('_');
										 var num1=parseInt(text[1])+newRowNum;
                                                var newID =text[0]+ '_' + num1; 
                                                $(this).attr('id',newID).attr('name',newID); 

                                        }); */
 
                                        // insert the new row into the table 
                                        // "before" the Add row 
                                        //addRow.before(newRow); 
										$('input,select', newRow).each(function()
										{ 
										
										var text=$(this).attr('id',newID);
										//(text);
										text=text.split('_');
									      var num=parseInt(text[1])+newRowNum;
										 //alert(num);
                                                var newID =text[0]+ '_' + num; 
                                                $(this).attr('id',newID).attr('name',newID); 
												
										
												
												//document.getElementById('sheetcount').value=num;
												//alert(document.getElementById('sheetcount').value);
                                        }); 
 
                                        // add the remove function to the new row 
                                        $('a.remove', newRow).click(function()
										{ 		
												var scn=document.getElementById('cushionscount').value;
												document.getElementById('cushionscount').value=scn-1;
                                                $(this).parent().parent().remove(); 
                                                return false;                            
                                        }); 
 
                                        // prevent the default click 
										addRow.before(newRow);
                                        return false; 
                                }); 
                        }); 
						
						
						                       $(function(){ 
                                // start a counter for new row IDs 
                                // by setting it to the number 
                                // of existing rows 
                                var newRowNum = 0; 
 
                                // bind a click event to the "Add" link 
                                $('#addnew2').click(function(){ 
                                        // increment the counter 
                                        newRowNum += 1; 
										var rr=document.getElementById('rollscount').value;
										newRownn =rr; 
										 newRownn++; 
                                     // alert(newRowNum);
									// alert(newRownn);
									 document.getElementById('rollscount').value=newRownn;
                                     // alert(newRowNum);
                                        // get the entire "Add" row -- 
                                        // "this" refers to the clicked element 
                                        // and "parent" moves the selection up 
                                        // to the parent node in the DOM 
                                        var addRow = $(this).parent().parent(); 
 
                                        // copy the entire row from the DOM 
                                        // with "clone" 
                                        var newRow = addRow.clone(); 
 
                                        // set the values of the inputs 
                                        // in the "Add" row to empty strings 
 //                                       $('input', addRow).val(''); 
  //                                      $('select', addRow).val(''); 
									
 
                                        // replace the HTML for the "Add" link  
                                        // with the new row number 
                                        $('td:first-child', newRow).html('<a href="" class="remove">Remove<\/a>'); 
 
                                        // insert a remove link in the last cell 
                                        //$('td:last-child', newRow).html('<a href="" class="remove">Remove<\/a>'); 
 
                                        // loop through the inputs in the new row 
                                        // and update the ID and name attributes 
                                        $('input,select', newRow).each(function()
										{ 
										
										var text=$(this).attr('id',newID);
										//(text);
										text=text.split('_');
									      var num=parseInt(text[1])+newRowNum;
										 //alert(num);
                                                var newID =text[0]+ '_' + num; 
                                                $(this).attr('id',newID).attr('name',newID); 
												
										
												
												//document.getElementById('sheetcount').value=num;
												//alert(document.getElementById('sheetcount').value);
                                        }); 
 
 
                                        // loop through the inputs in the new row 
                                        // and update the ID and name attributes 
                                        
 
                                        // insert the new row into the table 
                                        // "before" the Add row 
                                       
 
                                        // add the remove function to the new row 
                                        $('a.remove', newRow).click(function()
										{ 
												var scn=document.getElementById('rollscount').value;
												document.getElementById('rollscount').value=scn-1;
                                                $(this).parent().parent().remove(); 
                                                return false;                            
                                        }); 
										
										
 
                                        // prevent the default click 
										//addRow.after(newRow); 
										addRow.before(newRow); 
                                        return false; 
                                }); 
								 
                        }); 
						

                        </script> 
</head>

<body marginwidth="0" marginheight="0" bgcolor="#e9f1fb" topmargin="0" leftmargin="0" rightmargin="0">


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
<table width=100% border="0">
<tr><td style="padding-left:10px;padding-top:5px;width:350px;" valign="top">
<table cellpadding="0" cellspacing="0">
<tr><td class="navhdr"><b>Order Management</b></td></tr>
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

<tr><td align="right" style="padding-right:20px; padding-top:20px;"><a href=" <?php echo base_url(); ?>index.php/admin/admin_orders/ordersview"><img src="<?php echo base_url(); ?>images/vvv.gif"  style="border:none"/></a></td></tr>

<tr><td class="success" id=success ></td></tr>
<tr><td>
<form name="orderForm" id="orderForm" action="" method="post">
<fieldset style="border:1px solid #073c68;witdh:500px; height:100%"><legend><b>Order&nbsp;Creation</b></legend>
<table  cellpadding="3" cellspacing="1" width="550" height="100%" border=0>
<tr><td>
<table width="70%" border=0>





<tr><td width="23%">Customer Type:</td>

<td style="padding-left:30px;" colspan=5><select name="customertype" id=customertype onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF;width:190px;" onchange="showusers()">
<option>Select Type</option>
<option>Wholesaler</option>
<option>Distributor</option>
<option>Dealers</option>
<option>Stockist</option>
<option>Branch</option>
<option>Industrial Customer</option>
<option>Others</option>
</select>
</td></tr>

<tr><td colspan=6>
<div name="selectuser" id="selectuser" style="display:none;">
<table border=0 width=100%>
<tr><td colspan="2" nowrap="nowrap" width="23%">Order From:</td><td style="padding-left:28px" colspan=5><select name="orderfrom" id=orderfrom onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF;width:190px;" onchange="getcity(this)">
<option>Select User</option>
</select></td></tr></table>
</div></td></tr>
<tr><td colspan=6>
<div name="textuser" id="textuser" style="display:none;">
<table width=100% border=0>
<tr><td colspan="2" nowrap="nowrap" width="23%">Order From:</td><td style="padding-left:28px" colspan=5><input type="text" name="txtorderfrom" id="txtorderfrom" style="width:185px;" />
</td></tr></table>
</div></td></tr>

<tr><td colspan=6>
<div name="city" id="city" style="display:none;">
<table width=100% border=0>
<tr><td colspan="2" nowrap="nowrap" width="23%">City:</td><td style="padding-left:28px" colspan=5><input type="text" name="cityname" id="cityname" style="width:185px;" />
</td></tr></table>
</div></td></tr>

<tr><td>Order Type:</td>

<td style="padding-left:30px;" colspan=5><select name="ordertype" id=ordertype onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF;width:190px;" >
<option>Select Type</option>
<option>Verbal</option>
<option>Fax</option>
<option>Mail</option>
<option>D.O</option>
</select>
</td></tr>

<tr><td>P.O Number:</td><td style="padding-left:30px" colspan=5><input type="text" size="26" name="ponum" id="ponum" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; " /></td></tr>


<tr><td>P.O Date:</td><td style="padding-left:30px" colspan=5><input type="text" size="26" name="podate" id="podate" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; " /></td></tr>

<tr><td>Billing Price List:</td><td style="padding-left:30px" colspan=5><input type="text" size="26" name="bplist" id="bplist" onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF; " /></td></tr>
<tr><td colspan="6">
<table>
<tr><td colspan=11><b>Sheets</b></td></tr>

<tr><td width=10></td><td>Variety</td><td>Density</td><td>Length</td><td>Width</td><td>Thick[mm]</td><td>Bundles</td><td>Quantity</td><td>Package</td><td >Remarks</td>
<td  >Color</td></tr> 
<tbody> 
<?php
	for($j=1;$j<=4;$j++)
	{
	echo "<tr>
	<td width=10></td>
<td>
<select name=svariety_".$j." id=svariety_".$j." style='width:100px;' onchange=showden(this.value,this.id,'Sheets')>
<option>Select Variety</option>";
$res=mysql_query("select distinct(variety) from tbl_item_varieties  where itemname='Sheets'");

while($row=mysql_fetch_array($res))
{
echo "<option>".$row['variety']."</option>";
}

echo "</select>
</td>

<td><select  name=sden_".$j." id=sden_".$j."  maxlength='6' value='56' ></td>



<td nowrap='nowrap'><input type=text size=5 name=slen_".$j." id=slen_".$j."  maxlength='6' onkeyup = 'digitsOnly(this)'>
<select name=slentype_".$j." id=slentype_".$j."><option>Inch</option><option>mm</option></select></td>



<td nowrap='nowrap'><input type=text size=5 name=swid_".$j." id=swid_".$j." maxlength='6' onkeyup = 'digitsOnly(this)'>
<select name=swidtype_".$j." id=swidtype_".$j."><option>Inch</option><option>mm</option></select></td>



<td><input type=text size=5 name=sthi_".$j." id=sthi_".$j." maxlength='6' onkeyup = 'digitsOnly(this)'></td>



<td><input type=text size=5 name=squa_".$j." id=squa_".$j."  maxlength='6'  onkeyup =digitsOnly(this);numbundles(this.value,this.id,'Sheets') onblur=numbundles(this.value,this.id,'Sheets') ></td>



<td ><input type=text size=5 name=sbun_".$j." id=sbun_".$j." maxlength='6' onkeyup = 'digitsOnly(this)' ></td>

<td ><select name=spack_".$j." id=spack_".$j." style='width:80px;'>
<option>Standard</option>
<option>Without Polythene with Stamping</option>
<option>Without Stamping with Polythene</option>
<option>Without Polythene and Stamping</option>
<option>B Grade HDPE</option></select>
</td>
<td ><input type=text size=7 name=sremarks_".$j." id=sremarks_".$j." onkeyup=blocksornot(this.value,this.id) onblur=blocksornot(this.value,this.id) ></td>
<td ><input type=text size=7 name=scolor_".$j." id=scolor_".$j."  value='Standard'></td>
 <td></td> 
</tr>";
	}

    ?>
   
   
    <tr>
<td idth=10><a id="addnew"  href="">Add</a><!--<a  href=<?php echo  base_url(); ?>index.php/admin/admin_orders/increasesheets/<?php echo $sj; ?>>Add</a>--></td> 
<td>
<select name=svariety_5 id=svariety_5  style='width:100px;' onchange=showden(this.value,this.id,'Sheets')>
<option>Select Variety</option>
<?php
$res=mysql_query("select distinct(variety) from tbl_item_varieties where itemname='Sheets'");

while($row=mysql_fetch_array($res))
{
echo "<option>".$row['variety']."</option>";
}
?>
</select>

</td>

<td><select  name=sden_5 id=sden_5  maxlength='6'></td>



<td><input type=text size=5 name=slen_5 id=slen_5 maxlength='6' onkeyup = 'digitsOnly(this)'>
<select name=slentype_5 id=slentype_5><option>Inch</option><option>mm</option></select></td>


<td><input type=text size=5 name=swid_5 id=swid_5 maxlength='6' onkeyup = 'digitsOnly(this)'>
<select name=swidtype_5 id=swidtype_5><option>Inch</option><option>mm</option></select></td>



<td><input type=text size=5 name=sthi_5 id=sthi_5 maxlength='6' onkeyup = 'digitsOnly(this)'></td>



<td><input type=text size=5 name=squa_5 id=squa_5 maxlength='6' onkeyup =digitsOnly(this);numbundles(this.value,this.id,'Sheets') onblur=numbundles(this.value,this.id,'Sheets')></td>



<td ><input type=text size=5 name=sbun_5 id=sbun_5 maxlength='6' onkeyup = 'digitsOnly(this)'></td>

<td ><select name=spack_5 id=spack_5 style='width:80px;'>
<option>Standard</option>
<option>Without Polythene with Stamping</option>
<option>Without Stamping with Polythene</option>
<option>Without Polythene and Stamping</option>
<option>B Grade HDPE</option></select>
</td>
<td ><input type=text size=7 name=sremarks_5 id=sremarks_5 onkeyup=blocksornot(this.value,this.id) onblur=blocksornot(this.value,this.id) ></td>
<td ><input type=text size=7 name=scolor_5 id=scolor_5 value='Standard' ></td>
 <td></td> 
</tr>
    </tbody>

</table></td></tr>

<tr><td colspan="6">
<table border=0>
<tr><td colspan=11><b>Cushions</b></td></tr>

<tr><td width=10></td><td>Variety</td><td>Density</td><td>Length</td><td>Width</td><td>Thick[mm]</td><td>Bundles</td><td>Quantity</td><td>Package</td><td >Remarks</td>
<td >Color</td></tr> 
<tbody> 
<?php
	for($i=1;$i<=4;$i++)
	{
	echo "<tr>
	<td width=30></td>
<td>
<select name=cvariety_".$i." id=cvariety_".$i." style='width:100px;' onchange=showden(this.value,this.id,'Cushions')>
<option>Select Variety</option>";
$res=mysql_query("select distinct(variety) from tbl_item_varieties where itemname='Cushions'");

while($row=mysql_fetch_array($res))
{
echo "<option>".$row['variety']."</option>";
}

echo "</select>
</td>

<td><select name=cden_".$i." id=cden_".$i." maxlength='6'></td>



<td nowrap='nowrap'><input type=text size=5 name=clen_".$i." id=clen_".$i." maxlength='6' onkeyup = 'digitsOnly(this)'><select name=clentype_".$i." id=clentype_".$i." ><option>Inch</option><option>mm</option></select></td>



<td nowrap='nowrap'><input type=text size=5 name=cwid_".$i." id=cwid_".$i." maxlength='6' onkeyup = 'digitsOnly(this)'><select name=cwidtype_".$i." id=cwidtype_".$i."><option>Inch</option><option>mm</option></select></td>



<td><input type=text size=5 name=cthi_".$i." id=cthi_".$i." maxlength='6' onkeyup = 'digitsOnly(this)'></td>



<td><input type=text size=5 name=cqua_".$i." id=cqua_".$i." maxlength='6' onkeyup =digitsOnly(this);numcushions(this.value,this.id) onblur=numcushions(this.value,".$i.")></td>



<td ><input type=text size=5 name=cbun_".$i." id=cbun_".$i." maxlength='6' onkeyup = 'digitsOnly(this)'></td>

<td ><select name=cpack_".$i." id=cpack_".$i." style='width:80px;'>
<option>Standard</option>
<option>Without Polythene with Stamping</option>
<option>Without Stamping with Polythene</option>
<option>Without Polythene and Stamping</option>
<option>B Grade HDPE</option></select>
</td>
<td ><input type=text size=7 name=cremarks_".$i." id=cremarks_".$ij."  ></td>
<td ><input type=text size=7 name=ccolor_".$i." id=ccolor_".$i."  value='Standard'></td>
 <td></td> 
</tr>";
	}

    ?>
   
    <tr>
<td idth=10><a id="addnew1" href="">Add</a></td> 
<td>
<select name=cvariety_5 id=cvariety_5 style='width:100px;' onchange=showden(this.value,this.id,'Cushions')> 
<option>Select Variety</option>
<?php
$res=mysql_query("select distinct(variety) from tbl_item_varieties where itemname='Cushions'");

while($row=mysql_fetch_array($res))
{
echo "<option>".$row['variety']."</option>";
}
?>
</select>

</td>

<td><select  name=cden_5 id=cden_5 maxlength='6'></td>



<td nowrap="nowrap">
<input type=text size=5 name=clen_5 id=clen_5 maxlength='6'  onkeyup='digitsOnly(this)' ><select name=clentype_5 id=clentype_5 ><option>Inch</option><option>mm</option></select></td>



<td nowrap="nowrap"><input type=text size=5 name=cwid_5 id=cwid_5 maxlength='6'  onkeyup = 'digitsOnly(this)'><select name=cwidtype_5 id=cwidtype_5 ><option>Inch</option><option>mm</option></select></td>



<td><input type=text size=5 name=cthi_5 id=cthi_5 maxlength='6'  onkeyup = 'digitsOnly(this)'></td>



<td><input type=text size=5 name=cqua_5 id=cqua_5 maxlength='6' onkeyup =digitsOnly(this);numcushions(this.value,this.id) onblur=numcushions(this.value,this.id)></td>



<td ><input type=text size=5 name=cbun_5 id=cbun_5 maxlength='6'  onkeyup = 'digitsOnly(this)'></td>

<td ><select name=cpack_5 id=cpack_5 style="width:80px;">
<option>Standard</option>
<option>Without Polythene with Stamping</option>
<option>Without Stamping with Polythene</option>
<option>Without Polythene and Stamping</option>
<option>B Grade HDPE</option></select>
</td>
<td ><input type=text size=7 name=cremarks_5 id=cremarks_5 ></td>
<td ><input type=text size=7 name=ccolor_5 id=ccolor_5  value='Standard'></td>
 <td></td> 
</tr>
    </tbody>

</table>
</td></tr>


<tr><td colspan="6">
<table>
<tr><td colspan=11><b>Rolls</b></td></tr>

<tr><td width=10></td><td>Variety</td><td>Density</td><td>Length</td><td>Width</td><td>Thick[mm]</td><td>Package</td><td >Remarks</td>
<td >Color</td></tr> 
<tbody> 
<?php
	for($j=1;$j<=4;$j++)
	{
		
	echo "<tr>
	<td width=10></td>
<td>
<select name=rvariety_".$j." id=rvariety_".$j." style='width:100px;' onchange=showden(this.value,this.id,'Rolls')>
<option>Select Variety</option>";
$res=mysql_query("select distinct(variety) from tbl_item_varieties where itemname='Rolls'");

while($row=mysql_fetch_array($res))
{
echo "<option>".$row['variety']."</option>";
}
echo "</select>
</td>

<td><select  name=rden_".$j." id=rden_".$j."  maxlength='6'  ></td>



<td nowrap='nowrap'><input type=text size=5 name=rlen_".$j." id=rlen_".$j."  maxlength='6' onkeyup = 'digitsOnly(this)'><select name=rlentype_".$j." id=rlentype_".$j."><option>Mtrs</option></select></td>



<td nowrap='nowrap'><input type=text size=5 name=rwid_".$j." id=rwid_".$j." maxlength='6' onkeyup = 'digitsOnly(this)'>
<select name=rwidtype_".$j." id=rwidtype_".$j."><option>Inch</option><option>mm</option></select></td>



<td><input type=text size=5 name=rthi_".$j." id=rthi_".$j." maxlength='6' onkeyup = 'digitsOnlyremoved(this)'></td>

<td ><select name=rpack_".$j." id=rpack_".$j." style='width:80px;'>
<option>Standard</option>
<option>Without Polythene Without HDPE</option>
<option>Without Polythene with HDPE</option>
<option>With Polythene With HDPE</option>
</select>
</td>
<td ><input type=text size=7 name=rremarks_".$j." id=rremarks_".$j." ></td>
<td ><input type=text size=7 name=rcolor_".$j." id=rcolor_".$j."  value='Standard'></td>
 <td></td> 
</tr>";
	}

    ?>
   
    <tr>
<td idth=10><a id="addnew2" href="">Add</a></td> 
<td>
<select name=rvariety_5 id=rvariety_5  style='width:100px;' onchange=showden(this.value,this.id,'Rolls')>
<option>Select Variety</option>
<?php
$res=mysql_query("select distinct(variety) from tbl_item_varieties where itemname='Rolls'");

while($row=mysql_fetch_array($res))
{
echo "<option>".$row['variety']."</option>";
}
?>
</select>

</td>

<td><select  name=rden_5 id=rden_5  maxlength='6'></td>



<td><input type=text size=5 name=rlen_5 id=rlen_5 maxlength='6' onkeyup = 'digitsOnly(this)'><select name=rlentype_5 id=rlentype_5><option>Mtrs</option></select></td>



<td><input type=text size=5 name=rwid_5 id=rwid_5 maxlength='6' onkeyup = 'digitsOnly(this)'><select name=rwidtype_5 id=rwidtype_5><option>Inch</option><option>mm</option></select></td>



<td><input type=text size=5 name=rthi_5 id=rthi_5 maxlength='6' onkeyup = 'digitsOnly(this)'></td>





<td ><select name=rpack_5 id=rpack_5 style='width:80px;'>
<option>Standard</option>
<option>Without Polythene with Stamping</option>
<option>Without Stamping with Polythene</option>
<option>Without Polythene and Stamping</option>
<option>B Grade HDPE</option></select>
</td>
<td ><input type=text size=7 name=rremarks_5 id=rremarks_5  title=""></td>
<td ><input type=text size=7 name=rcolor_5 id=rcolor_5 value='Standard' ></td>
 <td></td> 
</tr>
    </tbody>

</table></td></tr>


<tr><td>Reqd Dispatched Time:</td><td style="padding-left:30px" colspan=5><select name="proirity" id=proirity onfocus="this.style.background='#dce9fb'" onblur="this.style.background='#ffffff'" style="background-color:#FFFFFF;" onchange="showpriority()">

<option>Select Proirity</option>
<option>Immediate (Within 3 days)</option>
<option>Normal (Within 7 days)</option>
<option>Specify Date</option>
</select>
</td></tr>

<tr><td colspan=6>
<div name="reqdate" id="reqdate" style="display:none;">
<table width=100%><tr><td colspan="2" nowrap="nowrap" width=23%>Specify Date:</td>
<td style="padding-left:30px"><input type="text" name="dispatchdate" id="dispatchdate" style="width:160px;" />
</td></tr></table>
</div></td></tr>


<tr><td nowrap="nowrap">Remarks:</td><td style="padding-left:30px" colspan=5><textarea style="width:194px; height:71px; resize:none;" name="remarks" id=remarks></textarea></td></tr>

<tr><td><b>Authorised By</b></td></tr>

<tr><td nowrap="nowrap">Name:</td><td style="padding-left:30px" colspan=5><input type="text" name="oname" id="oname" />
</td></tr>
<tr><td nowrap="nowrap">Designation:</td><td style="padding-left:30px" colspan=5><input type="text" name="odesignation" id="odesignation" />
</td></tr>

<tr><td colspan="5" style="padding-left:50px;"><input type="submit" name="fsubmit" id="fsubmit" value="" class="mfsub" />&nbsp;&nbsp;<input type="reset" value="" class="mfclear" /></td></tr>
</table></td></tr>
</table>

</fieldset>

<input type="hidden" name="sheetcount" id="sheetcount"  value="5" />
<input type="hidden" name="cushionscount" id="cushionscount" value="5" />
<input type="hidden" name="rollscount" id="rollscount" value="5" />
</form>

</td></tr></table></td></tr></table>

</td></tr>

<tr><td colspan="2"><br /></td></tr>
<tr><td colspan="2" style="background-color:#ffdc90; height:25px; padding-top:10px;"></td></tr>

</table>




</body>
</html>

