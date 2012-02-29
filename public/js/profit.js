var rows=new Array();
var srows=new Array();
var erows=new Array();
var mrows=new Array();
var execution_handel=true;
var press_shipping=new Array();
press_shipping[0]=0
press_shipping[1]=0
rows[0]=0;
rows[1]=1;

var lastColumn;
$(document).ready(function(){
$(".add_delete").live("click", function(){
requset_type=$(this).attr('id').split('_')
if(requset_type[0]=='a')
setColumn(requset_type[1])
if(requset_type[0]=='r')
dropColumn(requset_type[1])});
});

function setColumn(curID){
$("#changesMade").addClass("changed");	
val=$('#e_'+curID).val()
sval=$('#s_'+curID).val()
margin=$('#m_'+curID).val()

c_e_value=val.replace(/^\s+|\s+$/, '');
if(c_e_value.length==0){
message='Value should be equal or more to '+sval
highliteTheField(curID,message,2)
return false
}
if(parseInt(sval)>parseInt(val)){
//alert('s')
message='please enter value more than highlighted field';
highliteTheField(curID,message,1)
$('#e_'+curID).val('')
return false
}
margin_value=margin.replace(/^\s+|\s+$/, '');
if(margin_value.length==0){
message='Please enter the value in highlighted field';
highliteTheField(curID,message,3)
return false
}

lastColumn=curID
lastColumn++;
rows[lastColumn]=lastColumn;
mrows[lastColumn]=$('#m_'+curID).val();
addrow="<div id='row_"+lastColumn+"'><ul class='cols_3'><li><input type='text' id='s_"+lastColumn+"'  class='hidden_txt' style='text-align:right' readonly='readonly'  ></li><li>to</li><li><input type='text' id='e_"+lastColumn+"' onchange='setter(this,"+lastColumn+")' style='text-align:right' maxlength='9' /></li><li>=</li><li><input type='text' id='m_"+lastColumn+"'   class='text number per' onchange='set_margin(this,"+lastColumn+")'/> %</li><li class='v_est_l add_rem_sec'><img src='"+ base_s_images +"spacer.gif' class='add_v_est plus_ico add_delete' id='a_"+lastColumn+"' /><img src='"+ base_s_images +"spacer.gif' class='rem_v_est delete_ico add_delete' id='r_"+lastColumn+"'/></li></ul></div>";
$("#estimates").append(addrow)
$('#m_'+lastColumn).focus();
$('#s_'+lastColumn).val(parseInt($('#e_'+curID).val())+1);
$('#a_'+curID).hide();
$('#rows').val(rows)
currval=parseInt($('#s_'+lastColumn).val());
$('#e_'+lastColumn).val(currval)
$('#final').val(currval)

settextvalue()}
function dropColumn(curID){
$("#changesMade").addClass("changed");	
rows[curID]=0;
$('#rows').val(rows)

/*arrlen=getLen()
lcol=getLsatcol();
if(parseInt(lastColumn)==parseInt(curID) || arrlen==1 || lcol==2){
$('#row_'+curID).prev().find('img').show()
lastColumn--;
}*/

thisCol=parseInt(curID)

if($('#row_'+thisCol).next().attr('id') && $('#row_'+thisCol).next().attr('id')){
prev_id=$('#row_'+thisCol).prev().attr('id').split('_');
next_id=$('#row_'+thisCol).next().attr('id').split('_');

prev_id_temp=prev_id[1];
next_id_temp=next_id[1];

$('#s_'+next_id_temp).val(parseInt($('#e_'+prev_id_temp).val())+1)
}

lcol=getLsatcol();
if($('#e_'+lcol).val().length!=0)
$('#final').val($('#e_'+lcol).val())
else
$('#final').val($('#s_'+lcol).val())

$('#row_'+curID).remove();
$('#row_'+lcol).find('img').show()

settextvalue()}
function setter(thisid,column){
$("#changesMade").addClass("changed");		
round_val=Math.abs((Math.round(thisid.value)))
$('#e_'+column).val(round_val)
val=$('#e_'+column).val()
setvalidation(val,column)
//setvalidation(thisid.value,column)
return true}
function settextvalue(){
srows[0]=0;
erows[0]=0;
mrows[0]=0;

for(i=0;i<rows.length;i++){
if(rows[i]!=0){
srows[i]=$('#s_'+i).val();
erows[i]=$('#e_'+i).val();
mrows[i]=$('#m_'+i).val();
}}
$('#rows').val(rows)
$('#srows').val(srows)
$('#erows').val(erows)
$('#mrows').val(mrows)}
function settext_null_value(){
srows[0]=0;
erows[0]=0;
mrows[0]=0;

for(i=0;i<rows.length;i++){
rows.pop();
srows.pop();
erows.pop();
mrows.pop();
}
rows[1]=1;

}
function getLen(){
len=0;
for(i=0;i<rows.length;i++){
if(rows[i]!=0)
len++;
}
return len}
function getLsatcol(){
len=1;
for(i=0;i<rows.length;i++){
if(rows[i]!=0)
len=rows[i];
}
return len}
function setvalidation(val,current_col){

var next_id_temp;
//val=$('#e_'+current_col).val((Math.floor(val)))

current_eval=parseInt(val);
current_sval=parseInt($('#s_'+current_col).val());
thisColumn=parseInt(current_col)

////////////////////////////validation lines for on change/////////////////

//1) feld entry for illegal chars
if(isNaN(val)){
if(erows[current_col])
$('#e_'+current_col).val(erows[current_col])
else
$('#e_'+current_col).val('')
if($('#row_'+current_col).next().attr('id')){
next_id=$('#row_'+current_col).next().attr('id').split('_');
$('#s_'+next_id[1]).val(parseInt(erows[current_col])+1)
return false;
}
}

//2)check the length of field for null entry
c_e_value=val.replace(/^\s+|\s+$/, '');
if(c_e_value.length==0){
message=0
highliteTheField(current_col,message)
$('#e_'+current_col).val(erows[current_col])
return false;}
//3)checking val is higher than it's prev
if(current_sval>current_eval ){
message='Value should be equal or more than to '+current_sval
highliteTheField(current_col,message,2)
$('#e_'+current_col).val(erows[current_col])
return false}
////////////////////////////validation lines/////////////////

//validation for first column
if(thisColumn==1 && rows.length-1>1){//first row
if($('#row_'+current_col).next().attr('id')){
next_id=$('#row_'+current_col).next().attr('id').split('_');
next_id_temp=next_id[1];
next_to_current_sval=parseInt($('#s_'+next_id_temp).val());
next_to_current_eval=parseInt($('#e_'+next_id_temp).val());

if(current_eval>=next_to_current_eval){
message='Value should be less than '+next_to_current_eval
highliteTheField(next_id_temp,message,2)
$('#e_'+current_col).val(erows[current_col])
}
else if(current_eval<next_to_current_eval || $('#e_'+next_id_temp).val()=='' ){
$('#s_'+next_id_temp).val(current_eval+1)
}}else{
$('#final').val(current_eval+1)
}
}

//validation for last column
if(thisColumn!=1 && thisColumn==rows.length-1){
erows[thisColumn]=current_eval;
if(current_eval<current_sval){
message='Please enter more than highlighted field'//not executing line
highliteTheField(current_col,message,1)
$('#e_'+thisColumn).val('')
}}

//validation for between colums
if($('#row_'+current_col).prev().attr('id') && $('#row_'+current_col).next().attr('id')){
prev_id=$('#row_'+current_col).prev().attr('id').split('_');
next_id=$('#row_'+current_col).next().attr('id').split('_');

prev_id_temp=prev_id[1];
next_id_temp=next_id[1];

prev_to_current_sval=parseInt($('#s_'+prev_id_temp).val());
prev_to_current_eval=parseInt($('#e_'+prev_id_temp).val());

next_to_current_sval=parseInt($('#s_'+next_id_temp).val());
next_to_current_eval=parseInt($('#e_'+next_id_temp).val());



//conditon --one--down flow
var flag=0;
if(current_eval <= prev_to_current_eval){
message="Enter value is more than highlighted field";//not executing line
highliteTheField(prev_id_temp,message,2)
$('#e_'+current_col).val(erows[current_col])
return false
}
else if(current_eval>prev_to_current_eval && current_eval <  next_to_current_eval){
$('#s_'+next_id_temp).val(parseInt(current_eval)+1)
flag=1;

}

if(current_eval >=  next_to_current_eval ){
message='Value should be less than '+next_to_current_eval
highliteTheField(current_col,message,2)
$('#e_'+current_col).val(erows[current_col])

}
else if(current_eval <  next_to_current_eval && current_eval>prev_to_current_eval){

$('#s_'+next_id_temp).val(parseInt(current_eval)+1)
}else if(thisColumn!=rows.length-1){

$('#s_'+next_id_temp).val(parseInt(current_eval)+1)
}}
//alert(getLsatcol())
lcol=getLsatcol();
if($('#e_'+lcol).val().length!=0)
$('#final').val($('#e_'+lcol).val())
else
$('#final').val($('#s_'+lcol).val())

settextvalue()}
function calltohide(position){
		execution_handel=true
		$("#messgage_succ").slideUp()
		$('li input').removeClass('errortext')
		$('td input').removeClass('errortext')
		$('#renamePname').removeClass('errortext')		
		$(position).focus();

}
function highliteTheField(curent_column,message,id){
	execution_handel=false;
	$("#messgage_succ").slideDown();
	$("#messgage_succ").html(message);
    
	$("#changesMade").addClass("changed")
	$("#notify_error").slideUp();
	
if(id==1)
position="#s_"+curent_column
if(id==2)
position="#e_"+curent_column
if(id==3)
position="#m_"+curent_column
if(id==4)
position='#'+curent_column

	$(position).addClass('errortext')
	setTimeout("calltohide(position)", 4500);
 	$("#messgage_succ").removeAttr("style")
	$("#messgage_succ").attr('style','block')
	  
//if(message!=0){
//id=parseInt(id)
//if(id==1)
//position="#s_"+curent_column
//if(id==2)
//position="#e_"+curent_column
//if(id==3)
//position="#m_"+curent_column
//alert(position)
//$(position).focus()
//alert(message)
//}
}
function set_margin(val,id){



$("#changesMade").addClass("changed");	
c_e_value=val.value.replace(/^\s+|\s+$/, '');
if(c_e_value.length==0){
$('#m_'+id).val(mrows[id])
}

$('#m_'+id).val(Math.abs(val.value))
val=$('#m_'+id).val();

if(parseInt(val)>1000){

message='Value should not be more than 1000'
highliteTheField(id,message,3)	
if(mrows[id])
$('#m_'+id).val(mrows[id])
else
$('#m_'+id).val('')
}

if(isNaN(val)){
if(mrows[id])
$('#m_'+id).val(mrows[id])
else
$('#m_'+id).val('')
return false
}


settextvalue()}
///ajax
function saveValues(){	
//$('#changesMade').removeClass('changed');			
			if(!execution_handel){	
			execution_handel=true
			return false;
			}
			pname=$('#renamePname').val();
			pname_len=pname.replace(/^\s+|\s+$/, '');
			
			if(pname_len.length==0){
			message='Please enter the Profit Name'
			highliteTheField('renamePname',message,4)
			return false
			}
			
			
			lcol=getLsatcol();
			lval=$('#m_'+lcol).val();
			evalue=$('#e_'+lcol).val();
			slval=$('#s_'+lcol).val();
			c_e_value=lval.replace(/^\s+|\s+$/, '');
			end_value=evalue.replace(/^\s+|\s+$/, '');
			
			if(end_value.length==0){
			message='Value should be equal or more to '+slval
			highliteTheField(lcol,message,2)
			return false
			}
			
			if(c_e_value.length==0){
			message="Please enter the value in highlighted field"
			highliteTheField(lcol,message,3)
			return false
			}
			
			fmargin=$('#final_margin').val();
			fmarginval=fmargin.replace(/^\s+|\s+$/, '');
			if(fmarginval.length==0){
			message='Please enter the value in highlighted field'
			highliteTheField('final_margin',message,4)
			return false
			}
			if(isNaN(fmargin)){
			message='Character are not allowed'
			highliteTheField('final_margin',message,4)
			$('#final_margin').val('')
			return false
			}


			press_val=$('#press').val()
			ppress=press_val.replace(/^\s+|\s+$/, '');
			if(ppress.length==0){
			message='Please enter the value in highlighted field'
			highliteTheField('press',message,4)
			return false
			}
			
			ship_val=$('#ship').val()
			pship=ship_val.replace(/^\s+|\s+$/, '');
			if(pship.length==0){
			message='Please enter the value in highlighted field'
			highliteTheField('ship',message,4)
			return false
			}
			
/*if(isNaN(press_val)){
message='Character are not allowed'
highliteTheField('press',message,4)
$('#press').val('')
return false
}

if(isNaN(ship_val)){
message='Character are not allowed'
highliteTheField('ship',message,4)
$('#ship').val('')
return false
}*/			
			//profitName=($('#active_heading').html())
			showUiblock("right_content","Saving "+pname)
			
			dataURL=$("form").serialize();
			$.ajax({
			type: "POST",
			url: base_url+'admin/adminlistview/saveprofitvalues',
			data: dataURL,
			beforeSend:function(){
			//$('#grid').html('Loading please wait...');
			},
			success: function(msg){
			//alert(msg)
			msg = jQuery.trim(msg);
			if(msg=='exist'){
			message='Profit name already exist'
			highliteTheField('renamePname',message,4)
			}else
			load_profits(msg);
			
			hideUiblock("right_content");
			}	
			});}
div_proft_name=''			
function openToEdit(id, name){
	//$('#openText').html("<input type='text' name='renamePname'   id='renamePname' value='"+name+"' size='8' onkeyup='renameProftName("+id+",this.value)'   />")
	div_proft_name = name;
	$('#openText').html("<input type='text' name='renamePname' id='renamePname' value='"+name+"' onchange='renameProftName("+id+")' />");
	//setTimeout('renameProftName('+id+')', 20000);	
}

function renameProftName(id,div_name){

name_new=$('#renamePname').val()
name_new_test=name_new.replace(/^\s+|\s+$/, '');

if(name_new_test.length==0){
message='Please enter the name value in highlighted field'
highliteTheField('renamePname',message,4)
return false;
}
//$("#estimates").blur( function () { alert("Hello World!"); } );


showUiblock("right_content","Renaming to "+name_new)


					$.ajax({
					type: "POST",
					url: base_url+'admin/adminlistview/renameProftName/'+id+'/'+name_new,
				  	beforeSend: function(){
					 },
				   	success: function(msg){
				  	msg = jQuery.trim(msg);
					if(msg=='exist'){
					$('#openText').html(div_proft_name)
					message='Profit name already exist'
					highliteTheField('mrows',message,4)
					}
					else
					load_profits(id);
					hideUiblock("right_content");
					//callProfits(id,'yes')
			
					}
				 });
}

function setpress_shipping(id,val){


$("#changesMade").addClass("changed");		

$('#'+id).val(Math.abs(val))
val=$('#'+id).val();

dual_val=val.replace(/^\s+|\s+$/, '');

				
if(id=='press'){
if(isNaN(val) || dual_val.length==0){
$('#press').val(press_shipping['0'])
return false
}}

if(id=='ship'){
if(isNaN(val) || dual_val.length==0){
$('#ship').val(press_shipping['1'])
return false
}}
if(id=='press')
press_shipping[0]=val
if(id=='ship')
press_shipping[1]=val
}


$('div').live("click", function(){
if($('#renamePname').val()){
if($(this).attr('id')!='openText')
$('#openText').html($('#renamePname').val())
}
});

function deleteProfit(id){
pname=$('#renamePname').val();
var response = confirm ("Are you sure want to delete the Profit Margin: "+pname)
if (response){
name_new=$('#renamePname').val()
showUiblock("right_content","Deleting "+name_new)



					$.ajax({
					type: "POST",
					url: base_url+'admin/adminlistview/deletingProfit/'+id,
				  	beforeSend: function(){
					 },
				   	success: function(){
				  	load_profits(0)					
					hideUiblock("right_content");
					//callProfits(id,'yes')
					
					}
				 });	
}

}
function setfun(msg){
$("#changesMade").addClass("changed");	
if(msg=='final_fun'){	
val=$('#final_margin').val()
$('#final_margin').val(Math.abs(val))
val=$('#final_margin').val();

if(parseInt(val)>1000){
message='Value should not be more than 1000'
highliteTheField('final_margin',message,4)
$('#final_margin').val('')
}

if(isNaN(val))
$('#final_margin').val('')
}

if(msg=='ppress'){
val=$('#ppress').val()
$('#ppress').val(Math.abs(val))
val=$('#ppress').val();
if(isNaN(val))
$('#ppress').val('')
}

if(msg=='shipping'){
val=$('#shipping').val()
$('#shipping').val(Math.abs(val))
val=$('#shipping').val();
if(isNaN(val))
$('#shipping').val('')

}
}
