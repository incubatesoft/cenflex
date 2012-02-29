function setDiv(id,tdid,labelid)
{
	document.getElementById(id).style.display = "none";	  	
	
	$("#"+tdid).removeClass("error");
	$("#"+labelid).removeClass("label_error");
}

function checkDiv(id)
{
	var f1=document.formx1;
	f1.Company.value = f1.Company.value.replace(/^\s+/,"");
	if(f1.Company.value=='')
	{
	 
	   $("#validation_error1").addClass("error");
	   $("#clerror").addClass("label_error");
	  document.getElementById("Companydiv").style.display = "block";	  
	  document.getElementById("Companydiv").innerHTML = "Enter Company Name";
	 
      return false;
	}
}
 
 
function checkstreetaddressDiv(id)
{
	var f1=document.formx1;
	f1.Street_Address.value = f1.Street_Address.value.replace(/^\s+/,"");
	if(f1.Street_Address.value=='')
	{
	 
	   $("#validation_error12").addClass("error");
	   $("#streetlablerror").addClass("label_error");
	  document.getElementById("streetaddressdiv").style.display = "block";	  
	  document.getElementById("streetaddressdiv").innerHTML = "Enter Street Address";
	 
      return false;
	}
}

function checkcpDiv(id)
{
	var f1=document.formx1;
	f1.Contact_Person.value = f1.Contact_Person.value.replace(/^\s+/,"");
	if(f1.Contact_Person.value=='')
	{
	 
	  $("#validation_error2").addClass("error");
	   $("#cperror").addClass("label_error");
   	  document.getElementById(id).style.display = "block";	  
	  document.getElementById(id).innerHTML = "Enter Contact Person";
	  
   //   f1.Contact_Person.focus();
     // f1.Contact_Person.select();
      return false;
	 }
}

function checkcityDiv(id)
{
	var f1=document.formx1;
	f1.City.value = f1.City.value.replace(/^\s+/,"");
	if(f1.City.value=='')
	{
	 
	   $("#validation_error13").addClass("error");
	   $("#citylablerror").addClass("label_error");
	  document.getElementById("citydiv").style.display = "block";	  
	  document.getElementById("citydiv").innerHTML = "Enter City";
	 
      return false;
	}
}

function checkteleDiv(id)
{
	var f1=document.formx1;
	f1.Telephone.value = f1.Telephone.value.replace(/^\s+/,"");
	if(f1.Telephone.value=='' || SplNumbers(f1.Telephone)==0)
	{
	 $("#validation_error3").addClass("error");
	  $("#teleerror").addClass("label_error");
	 document.getElementById("Telephonediv").style.display = "block";	  
	 document.getElementById("Telephonediv").innerHTML = "Enter Telephone";
	
   //   f1.Telephone.focus();
    //  f1.Telephone.select();
      return false;
	}
}


function checkQuantityDiv(id)
{
	 var f1=document.formx1;
	 document.getElementById("13").value = document.getElementById("13").value.replace(/^\s+/,"");
	 var numberexp=/^\d{1,}$/;
	 if(!numberexp.test(document.getElementById("13").value) || document.getElementById("13").value<=0)
	 //if(document.getElementById("13").value=='' ||  isNaN(document.getElementById("13").value))
	{
	 
	   $("#validation_quantity13error").addClass("error");
	   $("#quantity13error").addClass("label_error");
	   document.getElementById("quantity13").style.display = "block";	  
	   document.getElementById("quantity13").innerHTML = "Enter Valid Quantity";
	   document.getElementById("13").focus();
	   document.getElementById("13").select();
      return false;
	} 
}
//f1.Telephone.value = f1.Telephone.value.replace(/^\s+/,"");

function checkStateDiv(id)
{
	var f1=document.formx1;
	
	f1.State_Region.value = f1.State_Region.value.replace(/^\s+/,"");
	
	if(f1.State_Region.value=='')
	{
	 
	   $("#validation_error14").addClass("error");
	   $("#statelablerror").addClass("label_error");
	  document.getElementById("statediv").style.display = "block";	  
	  document.getElementById("statediv").innerHTML = "Enter State";
	 
      return false;
	}
}
function checkddDiv(id)
{
	var f1=document.formx1;
	
	f1.Delivery_Date.value = f1.Delivery_Date.value.replace(/^\s+/,"");
	
	 if(f1.Delivery_Date.value=='')
	{
	 // alert("Please Enter State");
	  $("#validation_error7").addClass("error");
	  $("#ddlerror").addClass("label_error");
	 document.getElementById("dddatediv").style.display = "block";	  
	 document.getElementById("dddatediv").innerHTML = "Select Delivery Date";
	 
      f1.Delivery_Date.focus();
      f1.Delivery_Date.select();
      return false;
	}
}

function checkzipDiv(id)
{
	var f1=document.formx1;
	f1.Postal_Code.value = f1.Postal_Code.value.replace(/^\s+/,"");
	
	if(f1.Postal_Code.value=='')
	{
	  $("#validation_error4").addClass("error");
	   $("#poslablerror").addClass("label_error");
		 document.getElementById("zipdiv").style.display = "block";	  
		 document.getElementById("zipdiv").innerHTML = "Enter Postal Code";
    //  f1.Postal_Code.focus();
     // f1.Postal_Code.select();
      return false;
	}
}

function checkcuntryDiv(id)
{
	var f1=document.formx1;
	
	f1.Country.value = f1.Country.value.replace(/^\s+/,"");
	
	if(f1.Country.value==0)
	{
	  $("#ctlablerror").addClass("label_error");
	 $("#validation_error5").addClass("error");
	 	 document.getElementById("countrydiv").style.display = "block";	  
		 document.getElementById("countrydiv").innerHTML = "Select Country";
     // f1.Country.focus();     
      return false;
	}
}

function checkDelivery_Location_new()
{
	eraseCookie("Deliver_to_postal_code");
	document.getElementById("Deliver_to_postal_code").value="";
	document.getElementById("Deliver_to_postal_code").setAttribute('readonly','readonly');
	
}
function checkemailDiv(id)
{	
	var f1=document.formx1;
	
	f1.Email.value = f1.Email.value.replace(/^\s+/,"");
	
//	var email_reg=/^\w+([\.-_]?\w+)*@\w+([\.-_]?\w+)*(\.\w{2,3})+$/;
var email_reg=/^\w+([\.-_]?\w+)*@\w+([\.-_]?\w+)*(\.\w+)+$/;
	if (!email_reg.test(f1.Email.value))
		{
		  $("#emaillablerror").addClass("label_error");
		 $("#validation_error6").addClass("error");
			 document.getElementById("emaildiv").style.display = "block";	  
			 document.getElementById("emaildiv").innerHTML = "Enter Valid Email";
		//  f1.Email.focus();
		//  f1.Email.select();
		  return false;
		}
}

 function checknewzipdiv(id)
{
 document.getElementById("Deliver_to_postal_code").removeAttribute('readonly','readonly');
 document.getElementById("Deliver_to_postal_code").select();
 document.getElementById("Deliver_to_postal_code").focus();
  } 
   
 function SplNumbers(Val)
 {
  var alp = "0123456789+-(). ";
 
  for (var i=0;i<Val.value.length;i++){
   temp=Val.value.substring(i,i+1);
   if (alp.indexOf(temp)==-1){
    
    Val.focus();
    return 0;
   }
  } // closing the for loop
 
 }
   
function validation()
{

//alert('hii');

	//var email_reg=/^\w+([\.-_]?\w+)*@\w+([\.-_]?\w+)*(\.\w{2,3})+$/;
	var email_reg=/^\w+([\.-_]?\w+)*@\w+([\.-_]?\w+)*(\.\w+)+$/;
	 
	 var errorstatus = 0;
	 
	 var companyerror = 0;
	 var contactpersonerror = 0;
	 var telephoneerror = 0;
	 var postalcodeerror = 0;
	 var countryerror = 0;
	 var emailerror = 0;
	 var locationerror = 0;
	 var deliverydateerror = 0;
	 var strretaddresserror = 0;
	 var cityerror = 0;
	 var stateerror = 0;
	  var qunatityerror = 0;
	 
	var f1=document.formx1;
	
	f1.Company.value = f1.Company.value.replace(/^\s+/,"");
	
	if(f1.Company.value=='')
	{
	 
	  $("#validation_error1").addClass("error");
	  $("#clerror").addClass("label_error");
	  
	  document.getElementById("Companydiv").style.display = "block";	  
	  document.getElementById("Companydiv").innerHTML = "Enter Company Name";
	   
     /* f1.Company.focus();
      f1.Company.select();*/
    //  return false;
	companyerror++;
	errorstatus++;
	
	}
	
	
	f1.Street_Address.value = f1.Street_Address.value.replace(/^\s+/,"");
	
	if(f1.Street_Address.value=='')
	{
	 
	  $("#validation_error12").addClass("error");
	  $("#streetlablerror").addClass("label_error");
	  
	  document.getElementById("streetaddressdiv").style.display = "block";	  
	  document.getElementById("streetaddressdiv").innerHTML = "Enter Street Address";
	   
     /* f1.Company.focus();
      f1.Company.select();*/
    //  return false;
	strretaddresserror++;
	errorstatus++;
	
	}
	
	f1.Contact_Person.value = f1.Contact_Person.value.replace(/^\s+/,"");
	
	if(f1.Contact_Person.value=='')
	{
	   	  
	   $("#validation_error2").addClass("error");
	   $("#cperror").addClass("label_error");
	  document.getElementById("Contact_Persondiv").style.display = "block";	  
	  document.getElementById("Contact_Persondiv").innerHTML = "Enter Contact Person";
	  
   /*   f1.Contact_Person.focus();
      f1.Contact_Person.select();*/
    //  return false;
	contactpersonerror++;
	errorstatus++;
	}
	
	
	f1.City.value = f1.City.value.replace(/^\s+/,"");
	
	if(f1.City.value=='')
	{
	   	  
	   $("#validation_error13").addClass("error");
	   $("#citylablerror").addClass("label_error");
	  document.getElementById("citydiv").style.display = "block";	  
	  document.getElementById("citydiv").innerHTML = "Enter City";
 
	cityerror++;
	errorstatus++;
	}
	
	f1.Telephone.value = f1.Telephone.value.replace(/^\s+/,"");
	
	if(f1.Telephone.value=='' || SplNumbers(f1.Telephone)==0)
	{
	  $("#validation_error3").addClass("error");
	  $("#teleerror").addClass("label_error");
	 document.getElementById("Telephonediv").style.display = "block";	  
	 document.getElementById("Telephonediv").innerHTML = "Enter Telephone";
	
    /*  f1.Telephone.focus();
      f1.Telephone.select();*/
    //  return false;
	telephoneerror++;
	errorstatus++;
	}
	
	f1.State_Region.value = f1.State_Region.value.replace(/^\s+/,"");
	
	 if(f1.State_Region.value=='')
	{
	   	  
	   $("#validation_error14").addClass("error");
	   $("#statelablerror").addClass("label_error");
	  document.getElementById("statediv").style.display = "block";	  
	  document.getElementById("statediv").innerHTML = "Enter State";
 
	stateerror++;
	errorstatus++;
	}
	
	f1.Postal_Code.value = f1.Postal_Code.value.replace(/^\s+/,"");
	
	if(f1.Postal_Code.value=='')
	{
	  $("#poslablerror").addClass("label_error");
	 $("#validation_error4").addClass("error");
	 	 document.getElementById("zipdiv").style.display = "block";	  
		 document.getElementById("zipdiv").innerHTML = "Enter Postal Code";
     /* f1.Postal_Code.focus();
      f1.Postal_Code.select();*/
     // return false;
	 postalcodeerror++;
	 errorstatus++;
	}
	
	f1.Country.value = f1.Country.value.replace(/^\s+/,"");
	
	if(f1.Country.value==0)
	{
	  $("#ctlablerror").addClass("label_error");
	$("#validation_error5").addClass("error");
	 	 document.getElementById("countrydiv").style.display = "block";	  
		 document.getElementById("countrydiv").innerHTML = "Select Country";
    //  f1.Country.focus();     
     // return false;
	 countryerror++;
	 errorstatus++;
	}
	
	f1.Email.value = f1.Email.value.replace(/^\s+/,"");
	
	if (!email_reg.test(f1.Email.value))
    {
	   $("#emaillablerror").addClass("label_error");
       $("#validation_error6").addClass("error");
		 document.getElementById("emaildiv").style.display = "block";	  
		 document.getElementById("emaildiv").innerHTML = "Enter Valid Email";
    /*  f1.Email.focus();
      f1.Email.select();*/
    //  return false;
	
	emailerror++;
	errorstatus++;
    }
	
	 var numberexp=/^\d{1,}$/;
	 document.getElementById("13").value = document.getElementById("13").value.replace(/^\s+/,"");
	 
	 if(!numberexp.test(document.getElementById("13").value) || document.getElementById("13").value<=0)
	 //if(document.getElementById("13").value=='' ||  isNaN(document.getElementById("13").value))
	{
	 
	   $("#validation_quantity13error").addClass("error");
	   $("#quantity13error").addClass("label_error");
	   document.getElementById("quantity13").style.display = "block";	  
	   document.getElementById("quantity13").innerHTML = "Enter Valid Quantity";
	 qunatityerror++;
      errorstatus++;
	} 
 
	
	if (f1.Delivery_Location_new.checked==false && f1.Delivery_Location_same.checked==false)
    {
      f1.Delivery_Location_same.checked = true;
      
    }	 
	
	
	if(f1.Delivery_Location_new.checked==true)
	{
		 f1.Deliver_to_postal_code.value = f1.Deliver_to_postal_code.value.replace(/^\s+/,"");
		
		 if(f1.Deliver_to_postal_code.value=='')
		 {
					 $("#validation_error8").addClass("error");
					 $("#dpclerror").addClass("label_error");
					 document.getElementById("newzipdiv").style.display = "block";	  
					 document.getElementById("newzipdiv").innerHTML = "Enter New Postal Code";
					 
					locationerror++;
					errorstatus++;
		 } 
				
    } 
   
    f1.Delivery_Date.value = f1.Delivery_Date.value.replace(/^\s+/,"");
   
   if(f1.Delivery_Date.value=='')
	{
	  $("#validation_error7").addClass("error");
	 $("#ddlerror").addClass("label_error");
	 document.getElementById("dddatediv").style.display = "block";	  
	 document.getElementById("dddatediv").innerHTML = "Select Delivery Date";
	 
  
	deliverydateerror++;
	errorstatus++;
	}
  
   //alert('ddd');
  
   if(errorstatus==0)
   {
    //alert(errorstatus);
   //	settestval();
   //	return true;
     //  settestval();
       /* var actions = base_url + 'fillRfq/preview_form'+form_id+'#preview';	 
	 	document.formx1.action=actions;
	 	document.formx1.submit();*/
		return true;
	 
   }else
   {
   // alert(errorstatus);
   		if(companyerror == 1)
		{
		  f1.Company.focus();
		  f1.Company.select();
		  return false;
		}
		
		if(strretaddresserror == 1)
		{
		  f1.Street_Address.focus();
		  f1.Street_Address.select();
		  return false;
		}
		
		if(contactpersonerror == 1)
		{
		  f1.Contact_Person.focus();
		  f1.Contact_Person.select();
		  return false;
		}
		if(cityerror == 1)
		{
		  f1.City.focus();
		  f1.City.select();
		  return false;
		}
		
		if(telephoneerror == 1)
		{
		  f1.Telephone.focus();
		  f1.Telephone.select();
		  return false;
		}
		
		if(stateerror == 1)
		{
		  f1.State_Region.focus();
		  f1.State_Region.select();
		  return false;
		}
		
		
		if(postalcodeerror == 1)
		{
		  f1.Postal_Code.focus();
		  f1.Postal_Code.select();
		  return false;
		}
		
		if(countryerror == 1)
		{
		  f1.Country.focus();
		   return false;
		}
		
		if(emailerror == 1)
		{
		  f1.Email.focus();
		  f1.Email.select();
		  return false;
		}
		
		if(qunatityerror == 1)
		{
		  document.getElementById("13").focus();
		  document.getElementById("13").select();
		  return false;
		}
		
		if(locationerror == 1)
		{
		  f1.Deliver_to_postal_code.focus();
		  f1.Deliver_to_postal_code.select();
		  return false;
		}
		
		if(deliverydateerror == 1)
		{
		  f1.Delivery_Date.focus();
		  f1.Delivery_Date.select();
		  return false;
		}
		
		
	   
   		
   }
   
    	/*var actions = base_url + 'fillRfq/preview_form';	 
	 	document.formx1.action=actions;
	 	document.formx1.submit();*/
	
	 
 }