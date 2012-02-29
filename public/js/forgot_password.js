// JavaScript Document

function forgot_password()
{
	
	//var email=document.getElementById('email').value;
	var email=$("#facebox input[type='text']").val();
	
	var ajaxRequest;  // The variable that makes Ajax possible!
	
	try{
		// Opera 8.0+, Firefox, Safari
		ajaxRequest = new XMLHttpRequest();
	} catch (e){
		// Internet Explorer Browsers
		try{
			ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try{
				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e){
				// Something went wrong
				alert("Your browser broke!");
				return false;
			}
		}
	}
	
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
	alert(ajaxRequest.responseText);
		var ajaxDisplay = document.getElementById('log');
		var status=ajaxRequest.responseText.split("---");
		
			if($.trim(status[0])=="No")
			{ 
			
			//$(".forg_pass");
			$("#facebox input[type='text']:first").focus();
				$(".err").html(status[1]).slideDown();
			}
			else if($.trim(status[0])=="Yes")
			{	
				$(".forg_pass").slideUp();
				$("#facebox .err").html(status[1]).slideDown();	
				
			}
		}
	}
	
	//document.getElementById('log').style.display='block';
	
		var queryString="email="+email;
		var url=base_url+"index.php/login/forgotpassword";
	//alert(url);
	ajaxRequest.open("POST", url, true);
	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajaxRequest.setRequestHeader("Content-length", queryString.length);
    ajaxRequest.setRequestHeader("Connection", "close");
	ajaxRequest.send(queryString);
	//alert("srinu");	

}


function validateLogin(){
	//alert("ssssssssssss");
	user = document.userlogin.login_username;
	password = document.userlogin.login_password;
	
	if(!IsEmailValid(user)){
		return false;
	}
	if(!isEmpty(password)){
		jQuery.facebox("Please Enter a Password");
		$('#facebox').css("top", "23%");
		setTimeout("jQuery(document).trigger('close.facebox');", 1500);
		return false;
	}
	
	/**/
	loginBtn = document.userlogin.submit_submit;
	
	if(!$(".spin_login").show())
		$(".spin_login").show();
	//alert('l');
	$("input[rel=login]").addClass("disable");
	$(loginBtn).addClass("disabled");
	
	$("input[rel=login]").disabled = true;
	$(loginBtn).disabled = true;
	/**/
	//alert('Login success');
}

function isEmpty(str)
{
	var retval=true;
	var count=0;
	if (str.value=="")
		{
			str.focus();
			retval=false;
		}
	else
		{
			for(i=0;i<str.value.length;i++)
			{
				if(str.value.charAt(i)==" ")
				count++;
			}
			if (count==str.value.length)
			{
				str.focus();
				retval=false;
			}
		}
	return retval;
}

function IsEmailValid(str)
{
	//alert(str)
	var retval=true;
	var AtSym=str.value.indexOf('@');				
	var Period=str.value.lastIndexOf('.');		
	var Space=str.value.indexOf(' ');				
	var Length=str.value.length-1;
	var index = str.value.indexOf('@');
    var substr = str.value.substring(index+1);
    var index2 = substr.indexOf('@');
	var count=0;
	if (str.value=="")
		{
			jQuery.facebox("Please Enter User Name");
			$('#facebox').css("top", "23%");
			setTimeout("jQuery(document).trigger('close.facebox'); $('#login li:first input').focus();", 1500);
			//alert("Please enter Email");
			//str.focus();
			retval=false;
		}
	else
		{
			for(i=0;i<str.value.length;i++)
			{
				if(str.value.charAt(i)==" ")
				count++;
			}
			if (count==str.value.length)
			{
				jQuery.facebox("Please Enter User Name");
				$('#facebox').css("top", "23%");
				setTimeout("jQuery(document).trigger('close.facebox'); $('#login li:first input').focus();", 1500);
				//alert("Please enter Email");
				//str.focus();
				retval=false;
			}
			else if((AtSym<1)||(str.value.charAt(0)=='_')||(str.value.charAt(Length)=="_")||	//'@' can't be in first position
		(str.value.indexOf("_")==AtSym+1)||(str.value.charAt(AtSym-1)=="_")||
		(Period<=AtSym+1)||					//Must be atleast one valid char between '@' and '.'
		(Period==Length)||					//Must be atleast one valid char after '.'
		((Space>0) && (Space!=Length))||
		(index2 != -1))                       //No empty spaces permitted
		{
			jQuery.facebox("Please Enter Valid User Name");
			$('#facebox').css("top", "23%");
			setTimeout("jQuery(document).trigger('close.facebox'); $('#login li:first input').focus();", 1500);
			//alert(name);
			//str.focus();
			retval=false; 
		}
	}
return retval;
}
