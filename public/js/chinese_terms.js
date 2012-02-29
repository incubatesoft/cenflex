// JavaScript Document

function allTicketsAjax(limit_min,limit_max,search_val)
{
	//alert(base_url);
	
		var queryString="limit_min="+limit_min+"&limit_max="+limit_max+"&search_val="+search_val;
		if(search_val=="0"||search_val ==$(".search").val()){
		$.ajax({
				   type: "POST",
				   url: base_url+'admin/chinese/show_china_terms',
				   data: queryString,
				   beforeSend: function(){
					   $("#overlay").show().fadeTo(100, 0.3);
					   //$("#active_content").block();
					   $(".loading_img").show();
				   },
				   success: function(html){
					  // alert(html)
					  var ajaxDisplay = document.getElementById('active_content');
						ajaxDisplay.innerHTML = html;
						if(search_val!=0){
							$("#table_status").html("<span class='search_ico'></span>Search Results for <strong>" + search_val + "</strong>");
						}
						dataReady();
						if($(".search").val()!="" && $(".search").val()!="Search..")
							$(".clear_search").show();
						else
							$(".clear_search").hide();
							
						$(".loading_img").hide();
					},
					complete: function(){
						setTimeout('$("#overlay").fadeOut()', 500);
						}
				 });}
}