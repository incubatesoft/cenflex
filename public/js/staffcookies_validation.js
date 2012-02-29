// JavaScript Document
function readCookie(name) {
	
	
    var nameEQ = name + "=";
    var ca = document.cookie.split(';'); 
    for(var i=0;i < ca.length;i++) {
		
        var c = ca[i];
		 //alert(c)
		//return 
      while (c.charAt(0)==' ') c = c.substring(1,c.length);
      if (c.indexOf(nameEQ) == 0) return unescape(c.substring(nameEQ.length,c.length));
    }
// return ca[2];
  return null;
 
}
function readCookie2(name) {
		
    var nameEQ = name + "=";
	var results = document.cookie.match ( '(^|;) ?' + name + '=([^;]*)(;|$)' );
	
	if ( results )
    return ( unescape ( results[2] ) );
  else
    return null;
}
 

function showForm7ExistingCookies(a,b,c,d,e)
{
	 
 	showcustomerinfocookie(a);
	showproductinfoCookie(b);		 
	showShipcokeee(c);
	showHelppcokeee(d);
	showfeedbackCookie(e)
	
	
  
}
function setForm7MainCookies()
{
	 
 
	 
	  if(readCookie("staff_customer_info")==null)
	  setDefaultCustomerCookie();
	  else
	  showcustomerinfocookie(readCookie("staff_customer_info"));
 
	 if(readCookie("staff_project_overview_7")==null)
	 setDefaultProjectOverview7Cookie();
	 else
	 showproductinfoCookie(readCookie("staff_project_overview_7"));	
  
	  if(readCookie("staff_shipping_cokiee")==null)
 	  setDefaultShipCookie();
	  else
	  showShipcokeee(readCookie("staff_shipping_cokiee"));
 
	  if(readCookie("staff_help_cokiee")==null)
 	  setDefaultHelpCookie();
	  else
	  showHelppcokeee(readCookie("staff_help_cokiee"));
 
 	  if(readCookie("staff_feedback_cokiee")==null)
 	  setDefaultFeedbackCookie();
	  else
	  showfeedbackCookie(readCookie("staff_feedback_cokiee"))
 
 
}


function setForm3MainCookies()
{
 	  if(readCookie("staff_customer_info")==null)
	  setDefaultCustomerCookie();
	   else
	  showcustomerinfocookie(readCookie("staff_customer_info"));
 
	  if(readCookie("staff_project_overview_3")==null)
 	  setDefaultProjectOverview3Cookie();
	  else
	  showproductinfoCookie(readCookie("staff_project_overview_3"));	
	  
	  if(readCookie("staff_product_specification3")==null)
 	  setDefaultform3ProjectspecCookie();
	  else
	  showproductspecificationCookie_part1(readCookie("staff_product_specification3"));
 
 	  if(readCookie("staff_shipping_cokiee")==null)
 	  setDefaultShipCookie();
	  else
	  showShipcokeee(readCookie("staff_shipping_cokiee"));
 
	  if(readCookie("staff_help_cokiee")==null)
 	  setDefaultHelpCookie();
	  else
	  showHelppcokeee(readCookie("staff_help_cokiee"));
 
 	  if(readCookie("staff_feedback_cokiee")==null)
 	  setDefaultFeedbackCookie();
	  else
	  showfeedbackCookie(readCookie("staff_feedback_cokiee"))
}

function showForm3ExistingCookies(a,b,c,d,e,f)
{	 
	 
	showcustomerinfocookie(a);
	showproductinfoCookie(b);	
	showproductspecificationCookie_part1(c);	
	showShipcokeee(d);
	showHelppcokeee(e);
	showfeedbackCookie(f)	
}


function setForm5MainCookies()
{
	 
	  if(readCookie("staff_customer_info")==null)
	  setDefaultCustomerCookie();
	   else
	  showcustomerinfocookie(readCookie("staff_customer_info"));
 
	  if(readCookie("staff_project_overview_5")==null)
 	  setDefaultProjectOverview5Cookie();
	   else
	  showproductinfoCookie(readCookie("staff_project_overview_5"));	
	  
	  if(readCookie("staff_product_specification5")==null)
 	  setDefaultform5ProjectspecCookie();
	  else
	  showproductspecificationCookie_part1(readCookie("staff_product_specification5"));
 
 	  if(readCookie("staff_shipping_cokiee")==null)
 	  setDefaultShipCookie();
	  else
	  showShipcokeee(readCookie("staff_shipping_cokiee"));
 
	  if(readCookie("staff_help_cokiee")==null)
 	  setDefaultHelpCookie();
	  else
	  showHelppcokeee(readCookie("staff_help_cokiee"));
 
 	  if(readCookie("staff_feedback_cokiee")==null)
 	  setDefaultFeedbackCookie();
	  else
	  showfeedbackCookie(readCookie("staff_feedback_cokiee"))
}

function showForm5ExistingCookies(a,b,c,d,e,f)
{	 
	 
	showcustomerinfocookie(a);
	showproductinfoCookie(b);	
	showproductspecificationCookie_part1(c);	
	showShipcokeee(d);
	showHelppcokeee(e);
	showfeedbackCookie(f)	
}


function setForm6MainCookies()
{
	 
	  if(readCookie("staff_customer_info")==null)
	  setDefaultCustomerCookie();
	   else
	  showcustomerinfocookie(readCookie("staff_customer_info"));
 
	  if(readCookie("staff_project_overview_6")==null)
 	  setDefaultProjectOverviewCookie(6); 
	   else
	  showproductinfoCookie(readCookie("staff_project_overview_6"));
	  
	  if(readCookie("staff_product_specification6")==null)
 	  setDefaultform6ProjectspecCookie();
	   else
	  showproductspecificationCookie_part1(readCookie("staff_product_specification6"));
 
 	  if(readCookie("staff_shipping_cokiee")==null)
 	  setDefaultShipCookie();
	  else
	  showShipcokeee(readCookie("staff_shipping_cokiee"));
 
	  if(readCookie("staff_help_cokiee")==null)
 	  setDefaultHelpCookie();
	  else
	  showHelppcokeee(readCookie("staff_help_cokiee"));
 
 	  if(readCookie("staff_feedback_cokiee")==null)
 	  setDefaultFeedbackCookie();
	  else
	  showfeedbackCookie(readCookie("staff_feedback_cokiee"))
}

function showForm6ExistingCookies(a,b,c,d,e,f)
{	 
	 
	showcustomerinfocookie(a);
	showproductinfoCookie(b);	
	showproductspecificationCookie_part1(c);	
	showShipcokeee(d);
	showHelppcokeee(e);
	showfeedbackCookie(f)	
}

function setForm2MainCookies()
{
 
	  if(readCookie("staff_customer_info")==null)
	  setDefaultCustomerCookie();
	  else
	  showcustomerinfocookie(readCookie("staff_customer_info"));
 
	  if(readCookie("staff_project_overview_2")==null)
 	  setDefaultProjectOverviewCookie(2);
	  else
	  showproductinfoCookie(readCookie("staff_project_overview_2"));	
	  
	  if(readCookie2("staff_product_specification2")==null)
 	  setDefaultform2ProjectspecCookie();
	  else
	  {
		   //alert(readCookie2("staff_product_specification2"));
	  showproductspecificationCookie_part1(readCookie2("staff_product_specification2"));
	  }
 	  if(readCookie("staff_shipping_cokiee")==null)
 	  setDefaultShipCookie();
	  else
	  showShipcokeee(readCookie("staff_shipping_cokiee"));
 
	  if(readCookie("staff_help_cokiee")==null)
 	  setDefaultHelpCookie();
	  else
	  showHelppcokeee(readCookie("staff_help_cokiee"));
 
 	  if(readCookie("staff_feedback_cokiee")==null)
 	  setDefaultFeedbackCookie();
	  else
	  showfeedbackCookie(readCookie("staff_feedback_cokiee"))
}

function clearform2cookeis()
{
		 createCookie2('staff_customer_info',"",-1);
		   setDefaultProjectOverviewCookie(2);
 		   setDefaultform2ProjectspecCookie();
		    createCookie2('staff_shipping_cokiee',"",-1);
			 createCookie2('staff_help_cokiee',"",-1);
			  createCookie2('staff_feedback_cokiee',"",-1);
			   //createCookie2('FreakAuth',"",-1);
			   
}

function clearform3cookeis()
{
		 createCookie2('staff_customer_info',"",-1);
		   setDefaultProjectOverview3Cookie();
			setDefaultform3ProjectspecCookie();
		    createCookie2('staff_shipping_cokiee',"",-1);
			 createCookie2('staff_help_cokiee',"",-1);
			  createCookie2('staff_feedback_cokiee',"",-1);
			   //createCookie2('FreakAuth',"",-1);
			   
}
function clearform4cookeis()
{
		 createCookie2('staff_customer_info',"",-1);
		  setDefaultProjectOverviewCookie(4);
		  setDefaultform4ProjectspecCookie();
		    createCookie2('staff_shipping_cokiee',"",-1);
			 createCookie2('staff_help_cokiee',"",-1);
			  createCookie2('staff_feedback_cokiee',"",-1);
			   //createCookie2('FreakAuth',"",-1);
			   
}
function clearform5cookeis()
{
		 createCookie2('staff_customer_info',"",-1);
		 setDefaultProjectOverview5Cookie();
		 setDefaultform5ProjectspecCookie();
		    createCookie2('staff_shipping_cokiee',"",-1);
			 createCookie2('staff_help_cokiee',"",-1);
			  createCookie2('staff_feedback_cokiee',"",-1);
			   //createCookie2('FreakAuth',"",-1);
			   
}
function clearform6cookeis()
{
		 createCookie2('staff_customer_info',"",-1);
		 setDefaultProjectOverviewCookie(6);  
		 setDefaultform6ProjectspecCookie();
		  //createCookie3('staff_project_overview_6',"",-1,2025,12,12);
		 // createCookie3('staff_product_specification6',"",-1,2025,12,12);
		    createCookie2('staff_shipping_cokiee',"",-1);
			 createCookie2('staff_help_cokiee',"",-1);
			  createCookie2('staff_feedback_cokiee',"",-1);
			   //createCookie2('FreakAuth',"",-1);
			   
}
function clearform7cookeis()
{
		 createCookie2('staff_customer_info',"",-1);
		 setDefaultProjectOverview7Cookie();
		 createCookie2('staff_shipping_cokiee',"",-1);
		 createCookie2('staff_help_cokiee',"",-1);
	     createCookie2('staff_feedback_cokiee',"",-1);					   
}


function setForm4MainCookies()
{
	 
	  if(readCookie("staff_customer_info")==null)
	  setDefaultCustomerCookie();
	    else
	  showcustomerinfocookie(readCookie("staff_customer_info"));
 
	  if(readCookie("staff_project_overview_4")==null)
 	  setDefaultProjectOverviewCookie(4);
	   else
	  showproductinfoCookie(readCookie("staff_project_overview_4"));	
	  
	  if(readCookie("staff_product_specification4")==null)
 	  setDefaultform4ProjectspecCookie();
	   else
	  showproductspecificationCookie_part1(readCookie("staff_product_specification4"));
 
 	 if(readCookie("staff_shipping_cokiee")==null)
 	  setDefaultShipCookie();
	  else
	  showShipcokeee(readCookie("staff_shipping_cokiee"));
 
	  if(readCookie("staff_help_cokiee")==null)
 	  setDefaultHelpCookie();
	  else
	  showHelppcokeee(readCookie("staff_help_cokiee"));
 
 	  if(readCookie("staff_feedback_cokiee")==null)
 	  setDefaultFeedbackCookie();
	  else
	  showfeedbackCookie(readCookie("staff_feedback_cokiee"))
}


function showForm4ExistingCookies(a,b,c,d,e,f)
{
  
	showcustomerinfocookie(a);
	showproductinfoCookie(b);	
	showproductspecificationCookie_part1(c);	
	showShipcokeee(d);
	showHelppcokeee(e);
	showfeedbackCookie(f)		
}


function showForm2ExistingCookies(a,b,c,d,e,f)
{
	 
		  
	showcustomerinfocookie(a);
	showproductinfoCookie(b);	
	showproductspecificationCookie_part1(c);	
	showShipcokeee(d);
	showHelppcokeee(e);
	showfeedbackCookie(f)	
}
function setForm1MainCookies()
{
	 
 	  if(readCookie("staff_customer_info")==null)
	  setDefaultCustomerCookie();
	  else
	  showcustomerinfocookie(readCookie("staff_customer_info"));
 
	  if(readCookie("staff_project_overview_1")==null)
 	  setDefaultProjectOverviewCookie(1);
	  else
	  showproductinfoCookie(readCookie("staff_project_overview_1"));	
	  
	  if(readCookie("staff_product_specification_part2")==null)
 	  setDefaultProjectSpecsforform1Cookie();
	  else
	  {
			showproductspecificationCookie_part1(readCookie("staff_product_specification_part1"));
			showproductspecificationCookie_part2(readCookie("staff_product_specification_part2"));  
	  }
	  

 	  if(readCookie("staff_shipping_cokiee")==null)
 	  setDefaultShipCookie();
	  else
	  showShipcokeee(readCookie("staff_shipping_cokiee"));
 
	  if(readCookie("staff_help_cokiee")==null)
 	  setDefaultHelpCookie();
	  else
	  showHelppcokeee(readCookie("staff_help_cokiee"));
 
 	if(readCookie("staff_feedback_cokiee")==null)
 	  setDefaultFeedbackCookie();
	  else
	  showfeedbackCookie(readCookie("staff_feedback_cokiee"))
}

function showForm1ExistingCookies(a,b,c,d,e,f,g)
{	
 //alert(b)
 
    showcustomerinfocookie(a);
	showproductinfoCookie(b);	
	showproductspecificationCookie_part1(c);
	showproductspecificationCookie_part2(d);
	showShipcokeee(e);
	showHelppcokeee(f);
 	showfeedbackCookie(g) 
}

function setDefaultProjectOverview7Cookie()
{
	 
		 var project_overview_val = "Type_of_Product_Other::text^Project_Name_Number::text^chkFilm:1:cbbox^chkColor:1:cbbox^chkPrint::cbbox^chkShip:1:cbbox^chkShip4::cbbox^chkShip42::cbbox"  
     createCookie3("staff_project_overview_7",project_overview_val,2025,12,12,7);
}

function setDefaultProjectOverview3Cookie()
{
		 var project_overview_val = "Project_Name_Number::text^chkFilm:1:cbbox^chkColor:1:cbbox^chkPrint::cbbox^chkShip:1:cbbox^chkShip4::cbbox^chkShip42::cbbox"  
     createCookie3("staff_project_overview_3",project_overview_val,2025,12,12,3);
}

function setDefaultProjectOverview5Cookie()
{
		 var project_overview_val = "Project_Name_Number::text^chkFilm:1:cbbox^chkColor:1:cbbox^chkPrint::cbbox^chkShip:1:cbbox^chkShip4::cbbox^chkShip42::cbbox"  
     createCookie3("staff_project_overview_5",project_overview_val,2025,12,12,5);
}

function setDefaultCustomerCookie()
{
		 var staff_customer_info_val = "Company::text^Street_Address::text^Contact_Person::text^City::text^Telephone::text^State_Region::text^Fax::text^Postal_Code::text^Cell_Phone::text^Country::select-one^Email::text^Skype_Yahoo::text"    
	  
	  
     createCookie2("staff_customer_info",staff_customer_info_val,100);
}

function setDefaultProjectOverviewCookie(id)
{
		var pro_over_name = "staff_project_overview_"+id;
		 var project_overview_val = "Type_of_Product::selectbox^Type_of_Product_Other::text^Project_Name_Number::text^chkFilm:1:cbbox^chkColor:1:cbbox^chkPrint::cbbox^chkShip:1:cbbox^chkShip4::cbbox^chkShip42::cbbox"  
     createCookie3(pro_over_name,project_overview_val,2025,12,12,id);
}
function setDefaultform2ProjectspecCookie()
{
	 
	   var product_specs_valspart = "";
	   	  
	   with(window.document.formx1)
       {
			 totalElements = elements.length;
			 for(i = 0; i < totalElements; i++)
			 {     
			 	if(elements[i].name>0 ) 
				{
					 
						product_specs_valspart  += elements[i].id+"::"+elements[i].type+"^"
					 
				}
			 }
	  }
	  
     createCookie3("staff_product_specification2",product_specs_valspart,2025,12,12,2);	
}


function setDefaultform4ProjectspecCookie()
{
	 
	   var product_specs_valspart = "";
	   	  
	   with(window.document.formx1)
       {
			 totalElements = elements.length;
			 for(i = 0; i < totalElements; i++)
			 {     
			 	if(elements[i].name>0 ) 
				{
					 
						product_specs_valspart  += elements[i].id+"::"+elements[i].type+"^"
					 
				}
			 }
	  }
	  
     createCookie3("staff_product_specification4",product_specs_valspart,2025,12,12,4);
}

function setDefaultform5ProjectspecCookie()
{
	 
	   var product_specs_valspart = "";
	   	  
	   with(window.document.formx1)
       {
			 totalElements = elements.length;
			 for(i = 0; i < totalElements; i++)
			 {     
			 	if(elements[i].name>0 ) 
				{
					 
						product_specs_valspart  += elements[i].id+"::"+elements[i].type+"^"
					 
				}
			 }
	  }
	  
     createCookie3("staff_product_specification5",product_specs_valspart,2025,12,12,5);	
}

function setDefaultform6ProjectspecCookie()
{
	 
	   var product_specs_valspart = "";
	   	  
	   with(window.document.formx1)
       {
			 totalElements = elements.length;
			 for(i = 0; i < totalElements; i++)
			 {     
			 	if(elements[i].name>0 ) 
				{
					 
						product_specs_valspart  += elements[i].id+"::"+elements[i].type+"^"
					 
				}
			 }
	  }
	  
     createCookie3("staff_product_specification6",product_specs_valspart,2025,12,12,6);	
}

function setDefaultform3ProjectspecCookie()
{
	 
	   var product_specs_valspart = "";
	   	  
	   with(window.document.formx1)
       {
			 totalElements = elements.length;
			 for(i = 0; i < totalElements; i++)
			 {     
			 	if(elements[i].id>0 ) 
				{
					 
						product_specs_valspart  += elements[i].id+"::"+elements[i].type+"^"
					 
				}
			 }
	  }
	  
     createCookie3("staff_product_specification3",product_specs_valspart,2025,12,12,3);	
}

function setDefaultProjectSpecsforform1Cookie()
{
	   var product_specs_valspart1 = "";
	   var product_specs_valspart2 = "";
	   	  
	  with(window.document.formx1)
       {
			 totalElements = elements.length;
			 for(i = 0; i < totalElements; i++)
			 {     
			 	if(elements[i].name>0 ) 
				{
					if(elements[i].name<30 )
					{						 
						 product_specs_valspart1 += elements[i].id+"::"+elements[i].type+"^"
					}else
					{	
						if(elements[i].type=="radio" )
						{
							//alert(product_specs_valspart2)
							if(elements[i].id=="180_396")
							{
								product_specs_valspart2 += elements[i].name+":396:"+elements[i].type+"^"
							}else
							{
								product_specs_valspart2 += elements[i].name+"::"+elements[i].type+"^"	
							}
						}
						else
						{
							product_specs_valspart2 += elements[i].id+"::"+elements[i].type+"^"
						}
					}
				}
			 }
	  }
	  
	  
     createCookie3("createstaffproductspecificationCookie","",2025,12,12,1);
	  
  	 createCookie3("staff_product_specification_part1",product_specs_valspart1,2025,12,12,1);
	 createCookie3("staff_product_specification_part2",product_specs_valspart2,2025,12,12,1);
}
function createCookie3 ( name, value, exp_y, exp_m, exp_d, form_id,path2, domain, secure )
{

path = cookie_path + "create_form"+form_id;
//alert(path);
  var cookie_string = name + "=" + escape ( value );

  if ( exp_y )
  {
    var expires = new Date ( exp_y, exp_m, exp_d );
    cookie_string += "; expires=" + expires.toGMTString();
  }

  if ( path )
        cookie_string += "; path=/" + escape ( path );

  if ( domain )
        cookie_string += "; domain=" + escape ( domain );
  
  if ( secure )
        cookie_string += "; secure";
  
//alert(cookie_string);
  document.cookie = cookie_string;
}

function createCookie2(name,value,days) { 

 //alert(name);
  /*  if (days) {
        var date = new Date();
        date.setTime(date.getTime()+(days*24*60*60*1000));
        var expires = "; expires="+date.toGMTString();
    }
    else var expires = "";
	
    document.cookie = name+"="+escape(value)+expires+"; path=/";
*/

//alert(cookie_path);

path = cookie_path;
exp_y = 2025;
exp_m = 12;
exp_d = 31;

  var cookie_string = name + "=" + escape ( value );

  if ( exp_y )
  {
    var expires = new Date ( exp_y, exp_m, exp_d );
    cookie_string += "; expires=" + expires.toGMTString();
  }

  if ( path )
        cookie_string += "; path=/" + escape ( path );

  
   
  
//alert(cookie_string);
  document.cookie = cookie_string;
}


function setDefaultShipCookie()
{
	  var shipcook_info_val = "Delivery_Terms::selectbox^Delivery_Terms_Other::text^Delivery_Location::radio^Deliver_to_postal_code::text^Delivery_Date::text^Product_Use::radio^Packing_Preference1:1:cbbox^Packing_Preference2::cbbox^Packing_Preference3::cbbox"    
     createCookie2("staff_shipping_cokiee",shipcook_info_val,100);
}

function setDefaultHelpCookie()
{
	  var helpcook_info_val = "141::radio^142::cbbox^143::cbbox^144::cbbox^145::cbbox^146::cbbox"  
		
     createCookie2("staff_help_cokiee",helpcook_info_val,100);
}

function setDefaultFeedbackCookie()
{
	 createCookie2("Staff_other_comments","",100);
	 
	 
      var fbkcook_info_val ="question1::selectbox^question2::radio^question3::selectbox^question4::selectbox^question5::selectbox^question6::selectbox"  ;
     createCookie2("staff_feedback_cokiee",fbkcook_info_val,100);	
}



 
function createfeedbackCookie(name,value,str)
{
 
	 var other_ele_str = "";
	 var cbid =  value;
	 
	 	var inputstr = "";
   //alert(readCookie("project_overview"));
   if(readCookie("staff_shipping_cokiee")!=null)
   {
	   
	 	inputstr = readCookie("staff_feedback_cokiee");  
   }else
   {
	   inputstr = str;
	}
	 
	var feedbkcokee_info_ckvals = inputstr.split( '^' );
	for ( i = 0; i < feedbkcokee_info_ckvals.length; i++ )
    {       
	
		
		 var isradiovalid = 0;
		 
        a_temp_cookie_pair = feedbkcokee_info_ckvals[i].split( ':' );	 
		a_temp_cookie_name =  rtrim(a_temp_cookie_pair[0],',');
		a_temp_cookie_val = a_temp_cookie_pair[1];
		a_temp_cookie_type = a_temp_cookie_pair[2];
		if(a_temp_cookie_name !="")
		{
	 
			if(name==a_temp_cookie_name)
			{ 
				
				    if(a_temp_cookie_type=="radio")
					{
						 //alert(value);
						//if(document.getElementById(value).checked==true)
						a_temp_cookie_val = document.getElementById(cbid).value;
						 
				 	
					}
					 if(a_temp_cookie_type=="selectbox")
					{
				   		
						//if(document.getElementById(elmid).checked==true)
						a_temp_cookie_val = value;
						//else
					   //a_temp_cookie_val = 0;
						
					
					} 
			}
			
	 
			  
			  other_ele_str += a_temp_cookie_name+":"+a_temp_cookie_val+":"+a_temp_cookie_type+"^"	
	 
		}
	}	
   //alert(other_ele_str);
 	 createCookie2("staff_feedback_cokiee",other_ele_str,100);
 
}


function showfeedbackCookie(str)
{
	var feedbkcokee_info_ckvals = str.split( '^' );
	for ( i = 0; i < feedbkcokee_info_ckvals.length; i++ )
    {        
        a_temp_cookie_pair = feedbkcokee_info_ckvals[i].split( ':' );	 
		a_temp_cookie_name =  rtrim(a_temp_cookie_pair[0],',');
		a_temp_cookie_val = a_temp_cookie_pair[1];
		a_temp_cookie_type = a_temp_cookie_pair[2];
		 
					
					if(a_temp_cookie_type=="selectbox")
					{
						document.getElementById(a_temp_cookie_name).selectedIndex = a_temp_cookie_val;
					}else if(a_temp_cookie_type=="radio")
					{
					 
						 if(a_temp_cookie_val !="")
						{
						var radid = a_temp_cookie_name+"_"+a_temp_cookie_val;
						//alert(radid);
						//if(document.getElementById(a_temp_cookie_name).value == a_temp_cookie_val )
						document.getElementById(radid).checked=true;					
						 
						}
					} 
			
			 
	 
	}	
}

function createTextAreaCookie()
{
//alert('dd');
	var content = document.getElementById("Other_comments").value;
	// alert(content);
//	var other_info_val="Other_comments:"+content+"^";
	//alert(other_info_val);
    createCookie2("comments_cokiee",content,100);
}

function showTextAreaCookie()
{
	 var textcookee_info_ckvals = readCookie("comments_cokiee");
	 alert(textcookee_info_ckvals);
	 document.getElementById("Other_comments").value=textcookee_info_ckvals;
}


//added on 13th dec 08 by surya
function find_Cookie( check_name )
{
// alert(check_name);
	
    // first we'll split this cookie up into name/value pairs
    // note: document.cookie only returns name=value, not the other components
    var a_all_cookies = document.cookie.split( ';' );
    var a_temp_cookie = '';
    var cookie_name = '';
    var cookie_value = '';
    var b_cookie_found = false; // set boolean t/f default f

    for ( i = 0; i < a_all_cookies.length; i++ )
    {
        // now we'll split apart each name=value pair
        a_temp_cookie = a_all_cookies[i].split( '=' );


        // and trim left/right whitespace while we're at it
        cookie_name = a_temp_cookie[0].replace(/^\s+|\s+$/g, '');

        // if the extracted name matches passed check_name
        if ( cookie_name == check_name )
        {
            b_cookie_found = true;
            // we need to handle case where cookie has no value but exists (no = sign, that is):
            if ( a_temp_cookie.length > 1 )
            {
                cookie_value = unescape( a_temp_cookie[1].replace(/^\s+|\s+$/g, '') );
            }
            // note that in cases where cookie is initialized but no value, null is returned
            //return cookie_value;
            return true;
            break;
        }
        a_temp_cookie = null;
        cookie_name = '';
    }
    if ( !b_cookie_found )
    {
        //return null;
        return false;
    }
}

function rtrim(str, chars) {
	
    chars = chars || "\\s";
    return str.replace(new RegExp("[" + chars + "]+$", "g"), "");
}

function createHelpcokeee(name,elmid,str)
{
	 var mainstr = "";
	 var elemname = name;
	 
	 var other_ele_str = "";
		var inputstr = "";
   //alert(readCookie("project_overview"));
   if(readCookie("staff_help_cokiee")!=null)
   {
	   
	 	inputstr = readCookie("staff_help_cokiee");  
   }else
   {
	   inputstr = str;
	}
		
	var shipcokee_info_ckvals = inputstr.split( '^' );
	for ( i = 0; i < shipcokee_info_ckvals.length; i++ )
    {       
	
		
		 var isradiovalid = 0;
		 
        a_temp_cookie_pair = shipcokee_info_ckvals[i].split( ':' );	 
		a_temp_cookie_name =  rtrim(a_temp_cookie_pair[0],',');
		a_temp_cookie_val = a_temp_cookie_pair[1];
		a_temp_cookie_type = a_temp_cookie_pair[2];
		if(a_temp_cookie_name !="")
		{
	 
			if(name==a_temp_cookie_name)
			{ 
				
				    if(a_temp_cookie_type=="radio")
					{
						//alert(elmid);
						if(document.getElementById(elmid).checked==true)
						a_temp_cookie_val = document.getElementById(elmid).value;
						else
						a_temp_cookie_val = document.getElementById(elmid).value;
				 	
					}
					 if(a_temp_cookie_type=="cbbox")
					{
				   		
						if(document.getElementById(elmid).checked==true)
						a_temp_cookie_val = 1;
						else
						a_temp_cookie_val = 0;
						
					
					} 
			}
			
	 
			  
			  other_ele_str += a_temp_cookie_name+":"+a_temp_cookie_val+":"+a_temp_cookie_type+"^"	
	 
		}
	}	
	// alert(other_ele_str);
 	 createCookie2("staff_help_cokiee",other_ele_str,100);
 
}

function showHelppcokeee(str)
{
   var mainstr = "";
  //alert(readCookie("staff_help_cokiee"))
	var shipcokee_info_ckvals =  str.split( '^' );
	for ( i = 0; i < shipcokee_info_ckvals.length; i++ )
    {        
        a_temp_cookie_pair = shipcokee_info_ckvals[i].split( ':' );	 
		a_temp_cookie_name =  rtrim(a_temp_cookie_pair[0],',');
		a_temp_cookie_val = a_temp_cookie_pair[1];
		a_temp_cookie_type = a_temp_cookie_pair[2];
		 //alert(a_temp_cookie_val)
		 //if(a_temp_cookie_name !="")
	//	{
		//  alert(a_temp_cookie_name)
					
					  if(a_temp_cookie_type=="radio")
					{
						if(a_temp_cookie_val !="")
						{
						var radid = a_temp_cookie_name+"_"+a_temp_cookie_val;
						//if(document.getElementById(a_temp_cookie_name).value == a_temp_cookie_val )
						document.getElementById(radid).checked=true;
						
						 
						}
					}else if(a_temp_cookie_type=="cbbox")
					{
						if(a_temp_cookie_name !="")
						{
						if(a_temp_cookie_val == 1)
						document.getElementById(a_temp_cookie_name).checked=true;
						
						else
						document.getElementById(a_temp_cookie_name).checked=false;
						}
					} 
			 
			
			 
		 //}
	}	
	
	 
}

function createShipcokeee(name,value2,str)
{
	
	//alert(name)
	
	var value = escape(value2);
		var mainstr = "";
		var cid = value;
		
		
		var inputstr = "";
   //alert(readCookie("project_overview"));
   if(readCookie("staff_shipping_cokiee")!=null)
   {
	   
	 	inputstr = readCookie("staff_shipping_cokiee");  
   }else
   {
	   inputstr = str;
	}
		
		 //alert(name)
  // alert(readCookie("staff_shipping_cokiee"))
	var shipcokee_info_ckvals = inputstr.split( '^' );
	for ( i = 0; i < shipcokee_info_ckvals.length; i++ )
    {       
	
		
		 
        a_temp_cookie_pair = shipcokee_info_ckvals[i].split( ':' );	 
		a_temp_cookie_name =  rtrim(a_temp_cookie_pair[0],',');
		a_temp_cookie_val = a_temp_cookie_pair[1];
		a_temp_cookie_type = a_temp_cookie_pair[2];
		if(a_temp_cookie_name !="")
		{
			if(name==a_temp_cookie_name)
			{ 
				//alert(cid);	
					if(a_temp_cookie_type=="selectbox")
					{
					//alert(document.getElementById(a_temp_cookie_name).selectedIndex)
						a_temp_cookie_val = document.getElementById(a_temp_cookie_name).selectedIndex;
					}else if(a_temp_cookie_type=="radio")
					{ 
						
						if(document.getElementById(cid).checked==true)
						a_temp_cookie_val = document.getElementById(cid).value;						 
						
					}else if(a_temp_cookie_type=="cbbox")
					{
						if(document.getElementById(a_temp_cookie_name).checked==true)
						a_temp_cookie_val = 1;
						else
						a_temp_cookie_val = 0;
					}else
					{
						a_temp_cookie_val = value;
			 		}
			}
			
			mainstr += a_temp_cookie_name+":"+a_temp_cookie_val+":"+a_temp_cookie_type+"^"		
		}
	}	
	
	// alert(mainstr);
	 createCookie2("staff_shipping_cokiee",mainstr,100);
}




function showShipcokeee(str)
{
		 
 
	var shipcokee_info_ckvals = str.split( '^' );
	for ( i = 0; i < shipcokee_info_ckvals.length; i++ )
    {        
        a_temp_cookie_pair = shipcokee_info_ckvals[i].split( ':' );	 
		a_temp_cookie_name =  rtrim(a_temp_cookie_pair[0],',');
		a_temp_cookie_val = a_temp_cookie_pair[1];
		a_temp_cookie_type = a_temp_cookie_pair[2];
		 
					
					if(a_temp_cookie_type=="selectbox")
					{
						document.getElementById(a_temp_cookie_name).selectedIndex = a_temp_cookie_val;
					}else if(a_temp_cookie_type=="radio")
					{
					 
						 if(a_temp_cookie_val !="")
						{
						var radid = a_temp_cookie_name+"_"+a_temp_cookie_val;
						//alert(radid);
						//if(document.getElementById(a_temp_cookie_name).value == a_temp_cookie_val )
						document.getElementById(radid).checked=true;					
						 
						}
					}else if(a_temp_cookie_type=="cbbox")
					{
						if(a_temp_cookie_val == 1)
						document.getElementById(a_temp_cookie_name).checked=true;
						
						else
						document.getElementById(a_temp_cookie_name).checked=false;
					}else
					{
						if(a_temp_cookie_name!='')
						document.getElementById(a_temp_cookie_name).value = unescape(a_temp_cookie_val);
			 		}
			 
			
			 
	 
	}	
	
	 
}

function createstaffproductspecificationCookie_form4(name,id,value2,part1)
{
	
 //alert(name+id)
var value = escape(value2);
var mainstr = "";

 //alert(part1);

var inputstr = "";
 //  alert(readCookie("project_overview"));
   if(readCookie2("staff_product_specification4")!=null)
   {
	   
	 	inputstr = readCookie2("staff_product_specification4");  
   }else
   {
	   inputstr = part1;
	}


var radio_replace_array = Array();
var radio_find_array = Array();
    //alert(readCookie("project_overview"))
	var pf_info_ckvals = inputstr.split( '^' );
	for ( i = 0; i < pf_info_ckvals.length; i++ )
    {        
        a_temp_cookie_pair = pf_info_ckvals[i].split( ':' );	 
		a_temp_cookie_name =  rtrim(a_temp_cookie_pair[0],',');
		a_temp_cookie_val = a_temp_cookie_pair[1];
		a_temp_cookie_type = a_temp_cookie_pair[2];
		
		//alert(a_temp_cookie_type);
		
		if(a_temp_cookie_name !="")
		{
			if(id==a_temp_cookie_name)
			{ 
					 
					if(a_temp_cookie_type=="checkbox")
					{	
						if(document.getElementById(a_temp_cookie_name).checked==true)
						a_temp_cookie_val = 1;
						else
						a_temp_cookie_val = 0;
					}else if(a_temp_cookie_type == "radio")
					{
    				 

						if(document.getElementById(a_temp_cookie_name).checked==true)
						{
						    //alert(a_temp_cookie_name);
							a_temp_cookie_val = 1;
						}
						else
						{
							//alert("in false"+a_temp_cookie_name);
							a_temp_cookie_val = 0;
						}
					 }
							
							 
					 else if(a_temp_cookie_type == "select-one")
					{
						a_temp_cookie_val = value;
					}else
					{
						a_temp_cookie_val = value;
					}
			
			}
			 
			 mainstr += a_temp_cookie_name+":"+a_temp_cookie_val+":"+a_temp_cookie_type+"^"		
		}
	}	
	
 // alert(mainstr);
  //document.write(mainstr);
	 createCookie3("staff_product_specification4",mainstr,2025,12,12,4);
	 
}

function createstaffproductspecificationCookie_form3(name,id,value2,part1)
{
	var value = escape(value2);
//alert(name+id)
var mainstr = "";

 //alert(part1);

var inputstr = "";
 //  alert(readCookie("project_overview"));
   if(readCookie2("staff_product_specification3")!=null)
   {
	   
	 	inputstr = readCookie2("staff_product_specification3");  
   }else
   {
	   inputstr = part1;
	}


var radio_replace_array = Array();
var radio_find_array = Array();
    //alert(readCookie("project_overview"))
	var pf_info_ckvals = inputstr.split( '^' );
	for ( i = 0; i < pf_info_ckvals.length; i++ )
    {        
        a_temp_cookie_pair = pf_info_ckvals[i].split( ':' );	 
		a_temp_cookie_name =  rtrim(a_temp_cookie_pair[0],',');
		a_temp_cookie_val = a_temp_cookie_pair[1];
		a_temp_cookie_type = a_temp_cookie_pair[2];
		
		//alert(a_temp_cookie_type);
		
		if(a_temp_cookie_name !="")
		{
			if(id==a_temp_cookie_name)
			{ 
					 
					if(a_temp_cookie_type=="checkbox")
					{	
						if(document.getElementById(a_temp_cookie_name).checked==true)
						a_temp_cookie_val = 1;
						else
						a_temp_cookie_val = 0;
					}else if(a_temp_cookie_type == "radio")
					{
    				 

						if(document.getElementById(a_temp_cookie_name).checked==true)
						{
						    //alert(a_temp_cookie_name);
							a_temp_cookie_val = 1;
						}
						else
						{
							//alert("in false"+a_temp_cookie_name);
							a_temp_cookie_val = 0;
						}
					 }
							
							 
					 else if(a_temp_cookie_type == "select-one")
					{
						a_temp_cookie_val = value;
					}else
					{
						a_temp_cookie_val = value;
					}
			
			}
			 
			 mainstr += a_temp_cookie_name+":"+a_temp_cookie_val+":"+a_temp_cookie_type+"^"		
		}
	}	
	
 // alert(mainstr);
  //document.write(mainstr);
	 createCookie3("staff_product_specification3",mainstr,2025,12,12,3);
	 
}

function createstaffproductspecificationCookie_form5(name,id,value,part1)
{
	 //alert(id);
	
	
//alert(name+id)
var mainstr = "";

 //alert(part1);

var inputstr = "";
 //  alert(readCookie("project_overview"));
   if(readCookie2("staff_product_specification5")!=null)
   {
	   
	 	inputstr = readCookie2("staff_product_specification5");  
   }else
   {
	   inputstr = part1;
	}


var radio_replace_array = Array();
var radio_find_array = Array();
    //alert(readCookie("project_overview"))
	var pf_info_ckvals = inputstr.split( '^' );
	for ( i = 0; i < pf_info_ckvals.length; i++ )
    {        
        a_temp_cookie_pair = pf_info_ckvals[i].split( ':' );	 
		a_temp_cookie_name =  rtrim(a_temp_cookie_pair[0],',');
		a_temp_cookie_val = a_temp_cookie_pair[1];
		a_temp_cookie_type = a_temp_cookie_pair[2];
		
		//alert(a_temp_cookie_type);
		
		if(a_temp_cookie_name !="")
		{
			if(id==a_temp_cookie_name)
			{ 
					 
					if(a_temp_cookie_type=="checkbox")
					{	
						if(document.getElementById(a_temp_cookie_name).checked==true)
						a_temp_cookie_val = 1;
						else
						a_temp_cookie_val = 0;
					}else if(a_temp_cookie_type == "radio")
					{
    				 
  					//	alert(a_temp_cookie_name);
						if(document.getElementById(a_temp_cookie_name).checked==true)
						{
						  //  alert(a_temp_cookie_name);
							a_temp_cookie_val = 1;
						}
						else
						{
							//alert("in false"+a_temp_cookie_name);
							a_temp_cookie_val = 0;
						}
					 }
							
							 
					 else if(a_temp_cookie_type == "select-one")
					{
						a_temp_cookie_val = value;
					}else
					{
						a_temp_cookie_val = value;
					}
			
			}
			 
			 mainstr += a_temp_cookie_name+":"+a_temp_cookie_val+":"+a_temp_cookie_type+"^"		
		}
	}	
	
 // alert(mainstr);
  //document.write(mainstr);
	 createCookie3("staff_product_specification5",mainstr,2025,12,12,5);
	 
}
function createstaffproductspecificationCookie_form6(name,id,value2,part1)
{
	 //alert(id);
	var value = escape(value2);
	
//alert(name+id)
var mainstr = "";

 //alert(part1);

var inputstr = "";
 //  alert(readCookie("project_overview"));
   if(readCookie2("staff_product_specification6")!=null)
   {
	   
	 	inputstr = readCookie2("staff_product_specification6");  
   }else
   {
	   inputstr = part1;
	}


var radio_replace_array = Array();
var radio_find_array = Array();
    //alert(readCookie("project_overview"))
	var pf_info_ckvals = inputstr.split( '^' );
	for ( i = 0; i < pf_info_ckvals.length; i++ )
    {        
        a_temp_cookie_pair = pf_info_ckvals[i].split( ':' );	 
		a_temp_cookie_name =  rtrim(a_temp_cookie_pair[0],',');
		a_temp_cookie_val = a_temp_cookie_pair[1];
		a_temp_cookie_type = a_temp_cookie_pair[2];
		
		//alert(a_temp_cookie_type);
		
		if(a_temp_cookie_name !="")
		{
			if(id==a_temp_cookie_name)
			{ 
					 
					if(a_temp_cookie_type=="checkbox")
					{	
						if(document.getElementById(a_temp_cookie_name).checked==true)
						a_temp_cookie_val = 1;
						else
						a_temp_cookie_val = 0;
					}else if(a_temp_cookie_type == "radio")
					{
    				 
  						//alert(a_temp_cookie_name);
						if(document.getElementById(a_temp_cookie_name).checked==true)
						{
						   // alert(a_temp_cookie_name);
							a_temp_cookie_val = 1;
						}
						else
						{
							//alert("in false"+a_temp_cookie_name);
							a_temp_cookie_val = 0;
						}
					 }
							
							 
					 else if(a_temp_cookie_type == "select-one")
					{
						a_temp_cookie_val = value;
					}else
					{
						a_temp_cookie_val = value;
					}
			
			}
			 
			 mainstr += a_temp_cookie_name+":"+a_temp_cookie_val+":"+a_temp_cookie_type+"^"		
		}
	}	
	
 // alert(mainstr);
  //document.write(mainstr);
	 createCookie3("staff_product_specification6",mainstr,2025,12,12,6);
	 
}

function createstaffproductspecificationCookie(name,id,value2,part1,part2)
{

  //alert(name )
var value = escape(value2);
if(name<30)
createstaffproductspecificationCookie1(id,value,part1)
else
createstaffproductspecificationCookie2(name,value,part2,id)
	
}
function createstaffproductspecificationCookie_form2(name,id,value2,part1,part2)
{

var value = escape(value2);

//alert(name+id)
var mainstr = "";

 //alert(part1);

var inputstr = "";
 //  alert(readCookie("project_overview"));
   if(readCookie2("staff_product_specification2")!=null)
   {
	   
	 	inputstr = readCookie2("staff_product_specification2");  
   }else
   {
	   inputstr = part1;
	}

//alert(inputstr);
var radio_replace_array = Array();
var radio_find_array = Array();
    //alert(readCookie("project_overview"))
	var pf_info_ckvals = inputstr.split( '^' );
	for ( i = 0; i < pf_info_ckvals.length; i++ )
    {        
        a_temp_cookie_pair = pf_info_ckvals[i].split( ':' );	 
		a_temp_cookie_name =  rtrim(a_temp_cookie_pair[0],',');
		a_temp_cookie_val = a_temp_cookie_pair[1];
		a_temp_cookie_type = a_temp_cookie_pair[2];
		
		//alert(a_temp_cookie_type);
		
		if(a_temp_cookie_name !="")
		{
			if(id==a_temp_cookie_name)
			{ 
					 
					if(a_temp_cookie_type=="checkbox")
					{	
						if(document.getElementById(a_temp_cookie_name).checked==true)
						a_temp_cookie_val = 1;
						else
						a_temp_cookie_val = 0;
					}else if(a_temp_cookie_type == "radio")
					{
    				 

						if(document.getElementById(a_temp_cookie_name).checked==true)
						{
						    //alert(a_temp_cookie_name);
							a_temp_cookie_val = 1;
						}
						else
						{
							//alert("in false"+a_temp_cookie_name);
							a_temp_cookie_val = 0;
						}
					 }
							
							 
					 else if(a_temp_cookie_type == "select-one")
					{
						a_temp_cookie_val = value;
					}else
					{
						a_temp_cookie_val = value;
					}
			
			}
			 
			 mainstr += a_temp_cookie_name+":"+a_temp_cookie_val+":"+a_temp_cookie_type+"^"		
		}
	}	
	
 // alert(mainstr);
  //document.write(mainstr);
	 createCookie3("staff_product_specification2",mainstr,2025,12,12,2);
	 
}

function createstaffproductspecificationCookie1(name,value2,str)
{
	
/*	alert(name);
  alert(value2);
   alert(str);*/
  
var value = value2;
var mainstr = "";


var inputstr = "";
 //  alert(readCookie("project_overview"));
   if(readCookie2("staff_product_specification_part1")!=null)
   {
	   
	 	inputstr = readCookie2("staff_product_specification_part1");  
   }else
   {
	   inputstr = str;
	}
// alert(inputstr);

var radio_replace_array = Array();
var radio_find_array = Array();
    //alert(readCookie("project_overview"))
	var pf_info_ckvals = inputstr.split( '^' );
	for ( i = 0; i < pf_info_ckvals.length; i++ )
    {        
        a_temp_cookie_pair = pf_info_ckvals[i].split( ':' );	 
		a_temp_cookie_name =  rtrim(a_temp_cookie_pair[0],',');
		a_temp_cookie_val = a_temp_cookie_pair[1];
		a_temp_cookie_type = a_temp_cookie_pair[2];
		
		//alert(a_temp_cookie_name);
		
		 if(a_temp_cookie_name !="")
		{
			if(name==a_temp_cookie_name)
			{ 
					 
					if(a_temp_cookie_type=="checkbox")
					{	
						if(document.getElementById(a_temp_cookie_name).checked==true)
						a_temp_cookie_val = 1;
						else
						a_temp_cookie_val = 0;
					}else if(a_temp_cookie_type == "radio")
					{
    				 // alert(name);

						if(document.getElementById(name).checked==true)
						{
							//alert(a_temp_cookie_name);
							a_temp_cookie_val = 1;
						}
						else
						{
							//alert("in false"+a_temp_cookie_name);
							a_temp_cookie_val = 0;
						}
					 }
							
							 
					 else if(a_temp_cookie_type == "select-one")
					{
						a_temp_cookie_val = value;
					}else
					{
						a_temp_cookie_val = value;
					}
			
			}
			 
			 mainstr += a_temp_cookie_name+":"+a_temp_cookie_val+":"+a_temp_cookie_type+"^"		
		}
	}	
	
 //alert(mainstr);
  //document.write(mainstr);
	 createCookie3("staff_product_specification_part1",mainstr,2025,12,12,1);
	 
}	 
function createstaffproductspecificationCookie2(name,value2,str,name_id)
{
//	alert(name)
	//alert
var value = value2;
var mainstr = "";

 var inputstr = "";
  
   if(readCookie2("staff_product_specification_part2")!=null)
   {
	   
	 	inputstr = readCookie2("staff_product_specification_part2");  
   }else
   {
	   inputstr = str;
	}
//alert(inputstr);
    //alert(readCookie("project_overview"))
	var pf_info_ckvals = inputstr.split( '^' );
	for ( i = 0; i < pf_info_ckvals.length; i++ )
    {        
        a_temp_cookie_pair = pf_info_ckvals[i].split( ':' );	 
		a_temp_cookie_name =  rtrim(a_temp_cookie_pair[0],',');
		a_temp_cookie_val = a_temp_cookie_pair[1];
		a_temp_cookie_type = a_temp_cookie_pair[2];
		if(a_temp_cookie_name !="")
		{
			if(name==a_temp_cookie_name)
			{ 
			
					// alert(name);
					 
					 
					if(a_temp_cookie_type=="checkbox")
					{	
						if(document.getElementById(a_temp_cookie_name).checked==true)
						a_temp_cookie_val = 1;
						else
						a_temp_cookie_val = 0;
					}else if(a_temp_cookie_type == "radio")
					{ 
						// alert(a_temp_cookie_name);
						  
					 a_temp_cookie_val = document.getElementById(name_id).value;
					 }
							
							 
					 else if(a_temp_cookie_type == "select-one")
					{
						a_temp_cookie_val = value;
					}else
					{
						a_temp_cookie_val = value;
					}
			
			}
			//if(a_temp_cookie_type != "radio")
			 mainstr += a_temp_cookie_name+":"+a_temp_cookie_val+":"+a_temp_cookie_type+"^"		
		}
	}	
	
	 // alert(mainstr);
 // document.write(mainstr);
	 createCookie3("staff_product_specification_part2",mainstr,2025,12,12,1);
	 
}	 

function showproductspecificationCookie_part1(str)
{
 
 var pf_info_ckvals = str.split( '^' );
	for ( i = 0; i < pf_info_ckvals.length; i++ )
    {        
        a_temp_cookie_pair = pf_info_ckvals[i].split( ':' );	 
		a_temp_cookie_name =  rtrim(a_temp_cookie_pair[0],',');
		a_temp_cookie_val = a_temp_cookie_pair[1];
		a_temp_cookie_type = a_temp_cookie_pair[2];
			 
		if(a_temp_cookie_name !="")
		{
			  
			
					if(a_temp_cookie_type=="checkbox")
					{	
						
						if( unescape(a_temp_cookie_val) == 1)
						document.getElementById(a_temp_cookie_name).checked=true
						else
						document.getElementById(a_temp_cookie_name).checked=false
						
					}else if(a_temp_cookie_type == "radio")
					{
						//alert(a_temp_cookie_name+a_temp_cookie_val)
						
						//alert('dd'+radid)
						if(a_temp_cookie_val !="")
						{
							var radid = a_temp_cookie_name;
							//alert(radid)
							document.getElementById(radid).checked=true;
						}
						
					}else if(a_temp_cookie_type == "select-one")
					{
						if(a_temp_cookie_val!="")
						document.getElementById(a_temp_cookie_name).value =  a_temp_cookie_val;	 
					}else
					{
					    if(a_temp_cookie_val!="")
						document.getElementById(a_temp_cookie_name).value =  unescape(a_temp_cookie_val);	
					}
			 
			 
			
			 
		}
	}	
	
	
	 
}

function showproductspecificationCookie_part2(str)
{
 
 	var pf_info_ckvals = str.split( '^' );
	for ( i = 0; i < pf_info_ckvals.length; i++ )
    {        
        a_temp_cookie_pair = pf_info_ckvals[i].split( ':' );	 
		a_temp_cookie_name =  rtrim(a_temp_cookie_pair[0],',');
		a_temp_cookie_val = a_temp_cookie_pair[1];
		a_temp_cookie_type = a_temp_cookie_pair[2];
			 
		if(a_temp_cookie_name !="")
		{
			  
			
					if(a_temp_cookie_type=="checkbox")
					{	
						
						if( unescape(a_temp_cookie_val) == 1)
						document.getElementById(a_temp_cookie_name).checked=true
						else
						document.getElementById(a_temp_cookie_name).checked=false
						
					}else if(a_temp_cookie_type == "radio")
					{
						//alert(a_temp_cookie_name+a_temp_cookie_val)
						
						//alert('dd'+radid)
						if(a_temp_cookie_val !="")
						{
							var radid = a_temp_cookie_name+"_"+a_temp_cookie_val;
							 //alert(radid)
							document.getElementById(radid).checked=true;
						}
						
					}else if(a_temp_cookie_type == "select-one")
					{
						if(a_temp_cookie_val!="")
						document.getElementById(a_temp_cookie_name).value =  a_temp_cookie_val;	 
					}else
					{
					    if(a_temp_cookie_val!="")
						document.getElementById(a_temp_cookie_name).value =  unescape(a_temp_cookie_val);	
					}
			 
			 
			
			 
		}
	}	
	
	
	 
}


function createproductinfoCookie2(name,value2,str,formid)
{
	var value = escape(value2);
 //	alert(str);
   var cokkei_name = "staff_project_overview_"+formid
   //alert(cokkei_name);
   var inputstr = "";
   //alert(readCookie(cokkei_name));
   if(readCookie2(cokkei_name)!=null)
   {	   
	 	inputstr = readCookie2(cokkei_name);  
   }else
   {
	   
	   inputstr = str;
	}
   
 //  alert(inputstr);
   
	var mainstr = "";
     //alert(readCookie("project_overview"))
	//var pf_info_ckvals = readCookie("project_overview").split( '^' );
	var pf_info_ckvals = inputstr.split( '^' );
	for ( i = 0; i < pf_info_ckvals.length; i++ )
    {        
        a_temp_cookie_pair = pf_info_ckvals[i].split( ':' );	 
		a_temp_cookie_name =  rtrim(a_temp_cookie_pair[0],',');
		a_temp_cookie_val = a_temp_cookie_pair[1];
		a_temp_cookie_type = a_temp_cookie_pair[2];
		
		if(name==a_temp_cookie_name)
		{ 
				
				if(a_temp_cookie_type=="cbbox")
				{	
					if(document.getElementById(a_temp_cookie_name).checked==true)
					a_temp_cookie_val = 1;
					else
					a_temp_cookie_val = 0;
				}else
				{
					a_temp_cookie_val = value;
				}
		 
		}
		if(a_temp_cookie_name !="")
		mainstr += a_temp_cookie_name+":"+a_temp_cookie_val+":"+a_temp_cookie_type+"^"		
	}	
	
  //alert(mainstr);
	 createCookie3(cokkei_name,mainstr,2025,12,12,formid);
	 
   //setAjaxCookie("project_overview",mainstr)
	 
}
 


function showproductinfoCookie(str)
{

 //alert(str)
	 
 	  //alert(readCookie("project_overview"))
	// var pf_info_ckvals = readCookie("project_overview").split( '^' );
	var pf_info_ckvals = str.split( '^' );
	for (var i = 0; i < pf_info_ckvals.length; i++ )
    {        
        a_temp_cookie_pair = pf_info_ckvals[i].split( ':' );	 
		a_temp_cookie_name =  rtrim(a_temp_cookie_pair[0],',');
		a_temp_cookie_val = a_temp_cookie_pair[1];
		a_temp_cookie_type = a_temp_cookie_pair[2];
		
		 
		 if(a_temp_cookie_name!="")
		 {		
				if(a_temp_cookie_type=="cbbox")
				{					 
					if(a_temp_cookie_val==1)
					 document.getElementById(a_temp_cookie_name).checked=true;					 
					else
					 document.getElementById(a_temp_cookie_name).checked=false;
				}else if(a_temp_cookie_type=="selectbox")
				{
					// alert(a_temp_cookie_name);
					document.getElementById(a_temp_cookie_name).selectedIndex =  a_temp_cookie_val;	 
				}else
				{
				 	 if(a_temp_cookie_val!="")
					document.getElementById(a_temp_cookie_name).value =  unescape(a_temp_cookie_val);	 
				}
		 
		 }		
	}	
	
	 
}


function createcutomerinfoCookie(name,value2,str)
{
var value = escape(value2);
	var mainstr = "";
	
	   var inputstr = "";
  
   if(readCookie("staff_customer_info")!=null)
   {
	   
	 	inputstr = readCookie("staff_customer_info");  
   }else
   {
	   inputstr = str;
	}
   
	  
	var staff_customer_info_ckvals = inputstr.split( '^' );
	for ( i = 0; i < staff_customer_info_ckvals.length; i++ )
    {        
        a_temp_cookie_pair = staff_customer_info_ckvals[i].split( ':' );	 
		a_temp_cookie_name =  rtrim(a_temp_cookie_pair[0],',');
		a_temp_cookie_val = a_temp_cookie_pair[1];
		a_temp_cookie_type = a_temp_cookie_pair[2];
		if(name==a_temp_cookie_name)
		{ 
				a_temp_cookie_val = value;
		 
		}
		if(a_temp_cookie_name !="")
		mainstr += a_temp_cookie_name+":"+a_temp_cookie_val+":"+a_temp_cookie_type+"^"		
	}	
	
	//   alert(mainstr);
	 createCookie2("staff_customer_info",mainstr,100);
}
function eraseCookie(id)
{
	 createCookie2(id,"",-1);
	 document.getElementById(id).checked = false;
}
 
function showcustomerinfocookie(str)
{
	//alert(str);
   //alert(readCookie("staff_customer_info"));
	var staff_customer_info_ckvals = str.split( '^' );
	for ( i = 0; i < staff_customer_info_ckvals.length; i++ )
    {
        // now we'll split apart each name=value pair
        a_temp_cookie_pair = staff_customer_info_ckvals[i].split( ':' );
		a_temp_cookie_name =  rtrim(a_temp_cookie_pair[0],',');
		a_temp_cookie_val = a_temp_cookie_pair[1];
		a_temp_cookie_type = a_temp_cookie_pair[2];
		//alert(document.getElementById(a_temp_cookie_name).type);
		if(a_temp_cookie_name!='')
		{
			if(a_temp_cookie_type=="select-one")
			{
			 // alert(a_temp_cookie_val);
				document.getElementById(a_temp_cookie_name).value =  a_temp_cookie_val;	 
			}
			else
			{
				if(a_temp_cookie_val!='') 
				document.getElementById(a_temp_cookie_name).value =  unescape(a_temp_cookie_val);	 
			}
		}
		//alert(document.getElementById(a_temp_cookie_name).type);
	}	
}



function clearallcookeis()
{
     setDefaultCookies();
    
 
}

 
// for initilizing text area cookie
function createCookie(name) {

var value=""
var days=-1;
    if (days) {
        var date = new Date();
        date.setTime(date.getTime()+(days*24*60*60*1000));
        var expires = "; expires="+date.toGMTString();
    }
    else var expires = "";
    document.cookie = name+"="+escape(value)+expires+"; path=/";
}



//// clear cookies starts

function  setDefaultCookiesfor_form1()
{		 
	if(confirm('Are you sure do you want to clear cookies?'))
	{
		 setDefaultCustomerCookie();
		 setDefaultProjectOverviewCookie(1);
		 setDefaultProjectSpecsforform1Cookie();   
		 setDefaultShipCookie();
		 setDefaultHelpCookie();
		 setDefaultFeedbackCookie();
	}else
	{
	     return false;
	}
}

function setDefaultCookiesfor_form2()
{	
	if(confirm('Are you sure do you want to clear cookies?'))
	{
		 setDefaultCustomerCookie();
		 setDefaultProjectOverviewCookie(2);
		 setDefaultform2ProjectspecCookie();
		 setDefaultShipCookie();
		 setDefaultHelpCookie();
		 setDefaultFeedbackCookie();
	 }else
	{
	     return false;
	}
}

function setDefaultCookiesfor_form3()
{		
	if(confirm('Are you sure do you want to clear cookies?'))
	{
		 setDefaultCustomerCookie();
		 setDefaultProjectOverview3Cookie();
		 setDefaultform3ProjectspecCookie();
		 setDefaultShipCookie();
		 setDefaultHelpCookie();
		 setDefaultFeedbackCookie();
	 }else
	{
	     return false;
	}
}

function setDefaultCookiesfor_form4()
{	
	if(confirm('Are you sure do you want to clear cookies?'))
	{
		 setDefaultCustomerCookie();
		 setDefaultProjectOverviewCookie(4);
		 setDefaultform4ProjectspecCookie();
		 setDefaultShipCookie();
		 setDefaultHelpCookie();
		 setDefaultFeedbackCookie();
	}else
	{
	     return false;
	}
}

function setDefaultCookiesfor_form5()
{		 
	if(confirm('Are you sure do you want to clear cookies?'))
	{
		 setDefaultCustomerCookie();
		 setDefaultProjectOverview5Cookie();
		 setDefaultform5ProjectspecCookie();
		 setDefaultShipCookie();
		 setDefaultHelpCookie();
		 setDefaultFeedbackCookie();
	}else
	{
	     return false;
	}
}

function setDefaultCookiesfor_form6()
{	
	if(confirm('Are you sure do you want to clear cookies?'))
	{
		 setDefaultCustomerCookie();
		 setDefaultProjectOverviewCookie(6);  
		 setDefaultform6ProjectspecCookie();
		 setDefaultShipCookie();
		 setDefaultHelpCookie();
		 setDefaultFeedbackCookie();
	 }else
	{
	     return false;
	}
}



function  setDefaultCookiesfor_form7()
{	
 
	if(confirm('Are you sure do you want to clear cookies?'))
	{
		 setDefaultCustomerCookie();
		 setDefaultProjectOverview7Cookie();
		 setDefaultShipCookie();
		 setDefaultHelpCookie();
		 setDefaultFeedbackCookie();
	}else
	{
	     return false;
	}
}

// clear cookies code ends

