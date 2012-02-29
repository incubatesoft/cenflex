function allTicketsAjax(id){
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
	
	
	// Create a function that will receive data sent from the server
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
			alert(ajaxRequest.responseText);
			var ajaxDisplay = document.getElementById('bodycontent');
			ajaxDisplay.innerHTML = ajaxRequest.responseText;
			yh= parseInt($(window).height())-parseInt(220);
			$("#scroltabl").height(yh);
			
			$("#srctable").corner("5px")
			var w = 0;
			jQuery.each($("#hdng div"), function(){
				w = parseInt(w)+parseInt($(this).width());
			});
			x = parseInt(w)+parseInt(120);
			$(".row").width(x);
			y = x + 19;
			$("#srctable").css({maxWidth:y});
			$("#scroltabl").scroll(function(){
				var xh = 0-parseInt($(this).scrollLeft());
				$("#hdng").css({marginLeft:xh});
			});
			
			$("#hdng .jobno").resizable({ handles: "e,w", transparent: true,   resize: function(e, ui) { 
				$(".jobno").width($(this).width());
				w = 0;
				jQuery.each($("#hdng div"), function(){
					w = parseInt(w)+parseInt($(this).width());
				});
				x = parseInt(w)+120;
				$(".row").width(x);
			}  });
			
			interactions();
			$("#inform").unblock();			
			
		}
		else
		{
		$('#ticketlist').block({  
		message: '<img src="'+base_img+'/ajaxload.gif">',css: { border: 'none', background:"none" },  overlayCSS:  { backgroundColor:'#ccc', opacity: '0.3'}  
		}); 
		}
	
	}
	var queryString="id="+id;
	ajaxRequest.open("POST", base_url+"listview/getAjaxShippingDetails", true);
	ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajaxRequest.setRequestHeader("Content-length", queryString.length);
	ajaxRequest.setRequestHeader("Connection", "close");
	ajaxRequest.send(queryString);
}