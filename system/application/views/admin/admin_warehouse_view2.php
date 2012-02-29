<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shree Malani Foams </title>

<link rel='stylesheet' href='<?php echo base_url(); ?>css/styleall.css' type='text/css' />
<style>

#pagination li a
{

color:#B2b2b2;

}

#pagination li a:hover
{

color:#DF3D82;
text-decoration:underline;

}
#loading { 
width: 100%; 
position: absolute;
}

#pagination
{
text-align:center;
margin-left:120px;

}
#pagination li{	
list-style: none; 
float: left; 
margin-right: 16px; 
padding:5px; 
border:solid 1px #dddddd;
color:#0063DC; 
}
#pagination li:hover
{ 
color:#FF0084; 
cursor: pointer; 
}

#pagination li:active{	
list-style: none; 
float: left; 
margin-right: 16px; 
padding:5px; 
border:solid 1px #dddddd;
color:#0063DC; 
}

#content, #add-content, #edit-content
{
margin-top:50px;
}



</style>
<script type="text/javascript" src='<?php echo base_url(); ?>js/jquery.js' language="javascript"></script>
<script type="text/javascript">
base_url = '<?= base_url();?>index.php/';

</script>
<script type="text/javascript">
	
	$(document).ready(function(){
		
	//Display Loading Image
	function Display_Load()
	{
	    $("#loading").fadeIn(900,0);
		$("#loading").html("<img src='<?= base_url();?>images/bigLoader.gif' />");
	}
	//Hide Loading Image
	function Hide_Load()
	{
		$("#loading").fadeOut('slow');
	};
	

   //Default Starting Page Results
   
	//$("#pagination li:first").css({'color' : '#FF0084'}).css({'border' : 'none'});
	
//	Display_Load();
	
	$("#content").load(base_url+"admin/admin_warehousetable");



	//Pagination Click
	$("#pagination li").click(function(){
			
		//Display_Load();
		
		//CSS Styles
	//	$("#pagination li")
	//	.css({'border' : 'solid #dddddd 1px'})
	//	.css({'color' : '#0063DC'});
		
	//	$(this)
	//	.css({'color' : '#FF0084'})
	//	.css({'border' : 'none'});

		//Loading Data
		var pageNum = this.id;
		//alert(pageNum);
		$("#content").load("pagination_data_category.php?page=" + pageNum, Hide_Load());
	});
	
		
});


	</script>
<script type="text/javascript" language="javascript">
		 function  searchres(obj)
 		{
 		//alert(obj);
 		
 			//$("#content").load(base_url+"admin/admin_warehousetable");
		
		  var query_str = "";
		  	$.ajax({
			type: "POST",
			 url: base_url+"admin/admin_warehousetable/search/"+obj,
		 //	data: query_str,
			beforeSend: function(){
			  
			// alert(obj);
			if(obj=='')
			{
				$("#content").load(base_url+"admin/admin_warehousetable");
			}
				
			   },
			success: function(html)
			{   
			 	//alert(html);
			 	//alert(html.indexOf('<tr>'));
			 	if(html.indexOf('<tr>')== 7)
				 $('#opentable tbody').replaceWith(html)
				  
			}
		}); 
		
		   
 }
	</script>

	<script type="text/javascript">
	$(document).ready(function(){
	
		$(".next").attr('id','2');
		$(".prev").attr('id','1');
		$(".current").attr('id','1');
			
			$(".next").click(function(){
				
				
				n=($(".next").attr('id'));
				pg=($(".pages").val());
				c=($(".current").attr('id'));
				if(parseInt(n)<parseInt(pg))
				{ 
	 			c=($(".current").attr('id'));
	 			cr=parseInt(c)+1;
	 			$(".current").attr('id',cr);
				n=($(".next").attr('id'));
				nx=parseInt(n)+1;
				$(".next").attr('id',nx);
				p=parseInt(nx)-1;
				$(".prev").attr('id',p);
				
				var pageNum=n;
				//alert(n);
				//alert(base_url+"admin/admin_warehousetable/pagination/" + pageNum);
			$("#content").load(base_url+"admin/admin_warehousetable/pagination/" + pageNum);
				} else if(parseInt(n)==parseInt(pg) && parseInt(c)<parseInt(n))
				{
					
				c=($(".current").attr('id'))
	 			cr=parseInt(c)+1;
	 			$(".current").attr('id',cr);
	 			n=($(".next").attr('id'))
	 			var pageNum=n;
				//alert(n);
			$("#content").load(base_url+"admin/admin_warehousetable/pagination/" + pageNum);
						
				} 
					});
	
			$(".prev").click(function(){
	
				p=($(".prev").attr('id'))
				n=($(".next").attr('id'))
				pg=($(".pages").val())
				c=($(".current").attr('id'))
				if(parseInt(p)>1 && parseInt(c)!=parseInt(n))
				{
				c=($(".current").attr('id'))
				cr=parseInt(c)-1;
				$(".current").attr('id',cr);
				n=($(".next").attr('id'))
				nx=parseInt(n)-1;
				$(".next").attr('id',nx);
				p=($(".prev").attr('id'))
				pr=parseInt(p)-1;
				$(".prev").attr('id',pr);
				
				var pageNum=pr;
				//alert(n);
			$("#content").load(base_url+"admin/admin_warehousetable/pagination/" + pageNum);	
				} else if(parseInt(n)==parseInt(c))
				{ 
					c=($(".current").attr('id'))
					cr=parseInt(c)-1;
					$(".current").attr('id',cr);
					
					
				var pageNum=cr;
				//alert(n);
			$("#content").load(base_url+"admin/admin_warehousetable/pagination/" + pageNum);	
				}
	
				
	
					});
	
			$(".first").click(function(){
	
				
				$(".current").attr('id','1');
				
				$(".next").attr('id','2');
				
				$(".prev").attr('id','1');
				
				
				var pageNum=1;
				//alert(n);
			$("#content").load(base_url+"admin/admin_warehousetable/pagination/" + pageNum);	
					});
			
			$(".last").click(function(){
	
				l=($(".last").attr('id'))
				lt=parseInt(l)-1;
				$(".current").attr('id',l);
				
				$(".next").attr('id',l);
				
				$(".prev").attr('id',lt);
				
				var pageNum=l;
				//alert(n);
			$("#content").load(base_url+"admin/admin_warehousetable/pagination/" + pageNum);	
					});
			
	
	});
	
	
	
</script>
	
</head>

<body marginwidth="0" marginheight="0" bgcolor="#e9f1fb" topmargin="0" leftmargin="0" rightmargin="0">



<table width=100% cellpadding="0" cellspacing="0" border="0">
<?php
$this->load->view('admin/admin_header');
$per_page = 5; 

//getting number of rows and calculating no of pages
$sql = "SELECT  id,factorycode,contactname,mobile,factoryphone,street1,street2,city,state,username,password,pincode,tinnumber from tbl_factory_master where id>0";
$rsd = mysql_query($sql);
$count = mysql_num_rows($rsd);
$pages = ceil($count/$per_page)

?>

<tr><td colspan="2">
<table height="450" width=100% cellpadding="0" cellspacing="0" bgcolor="#fff6ed">
<tr><td align="right" class="viewbtn"><a href="javascript:history.back()"><img src="<?php echo base_url(); ?>images/bbb.gif" style="border:none;"></a></td></tr>
<tr><td colspan=2>
	<div id='search'>
        <label for='filter'>Filter</label> <input type='text' name='filter' value='' id='filter' onkeyup=searchres(this.value) />
   </div>
	<div id="loading" ></div>
	<div id="content" ></div>
</td></tr>
	<tr><td colspan=2><table width="800px">
		
	<tr><Td><input type=hidden  name="current" class="current">
<input type=hidden  name="crent" class="pages" value="<?=$pages?>">
			<ul id="pagination">
				
					<li class="first" id=1>First</li>
					<li class="prev" >Prev</li>
					<li class="next" >Next</li>
					<li class="last" id=<?=$pages?>>Last</li>
	</ul>	
	</Td></tr></table></td></tr>			

</table>
</td></tr>

<tr><td colspan="2"><br /></td></tr>
<tr><td colspan="2" class="futer"></td></tr>

</table>





</body>
</html>
