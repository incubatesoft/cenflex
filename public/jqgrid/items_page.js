
function selectEventId(id) {
//alert(id);
//alert(base_url);

    
    
	 
	
	//new Ajax.Updater ('items_new_dispaly', base_url+'items/set_event_id_new/'+id, {method:'get'});
	
	//new Effect.Appear('items_new_dispaly');
	/*$("#existing_items")
         .tablesorter({widthFixed: true})
         .tablesorterPager({container: $("#pager")});*/
		 
		 
		 var dpath = base_url+'items/set_event_id_new/'+id;
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
					 
					if(ajaxRequest.readyState == 4)
					{ 
					
					
					 
	
						   
				 
					document.getElementById("items_new_dispaly").innerHTML=ajaxRequest.responseText;
					}
else
					{
					document.getElementById("items_new_dispaly").innerHTML="<font color='red'><b>Loading.........</b></font>";
					}
				}
				
				 
				//var queryString = "?zipcode=" + document.getElementById("zip").value;
				ajaxRequest.open("GET",dpath , true);
				ajaxRequest.send(null); 	
}


  