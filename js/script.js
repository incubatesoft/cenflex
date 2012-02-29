

$(document).ready(function()
						   {
							   //alert("hi");
	
	$('#regForm').submit(function(e) 
								  {
alert("hi");
		register();
		e.preventDefault();
		
	});
	
});


function register()
{
	//alert("in register");
	hideshow('loading',1);
	error(0);
	
	$.ajax({
		type: "POST",
		url: 'index.php/superadmin/platoon_add/submit',		
		data: $('#regForm').serialize(),
		dataType: "json",
		success: function(msg){
			
			if(parseInt(msg.status)==1)
			{
				window.location=msg.txt;
			}
			else if(parseInt(msg.status)==0)
			{
				error(1,msg.txt);
			}
			
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