// JavaScript Document
jQuery.extend(
	$.expr[":"].containsNoCase = function(el, i, m) {
		var search = m[3];    
		if (!search) 
		return false;    
		return eval("/" + search + "/i").test($(el).text());
	}
			  );

function allTicketsAjax()
{
	
	
		//var queryString="limit_min="+limit_min+"&limit_max="+limit_max+"&search_val="+search_val;
		//if(search_val=="0"||search_val ==$(".search").val()){
		$.ajax({
				   type: "POST",
				   url: base_url+'listview/show_allRfq2',
				  // data: queryString,
				   beforeSend: function(){
					   $("#overlay").show().fadeTo(100, 0.3);
					   //$("#active_content").block();
				   },
				   success: function(html){
					  var ajaxDisplay = document.getElementById('active_content');
						ajaxDisplay.innerHTML = html;
						/*if(search_val!=0){
							$("#table_status").html("<span class='search_ico'></span>Search Results for <strong>" + search_val + "</strong>");
						}*/
						dataReady();
						
					},
					complete: function(){
						setTimeout('$("#overlay").fadeOut()', 500);
						}
				 });//}
}