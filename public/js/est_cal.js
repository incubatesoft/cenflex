$(document).ready(function(){
	
	$(".exRate").livequery(function(){
		$(this).delayedObserver(function(){
			optionid=$.trim($("#show_my_options li a.active_nav").attr("estopt"));
			adjustedXrate(optionid);	
		});
	});
 });

//shipping calculations
$(".shippingPacking").live("change",function(){
	ShippingCal();									 
})


$(".ship_cal").livequery(function(){
	$(this).delayedObserver(function(){
			ShippingCal();
									 
		 });

});
function ShippingCal()
{

		
		var optionid=$("#show_my_options li a.active_nav").attr("estopt"); //remove h_tab
		var Quantity;
		($.trim($("#rfqEst_quantity_"+optionid).val())=="")?Quantity=0:Quantity=parseFloat($.trim($("#rfqEst_quantity_"+optionid).val()));
		var units;
		($.trim($("#shipping_unit_"+optionid).val())=="")?units=0:units=parseFloat($.trim($("#shipping_unit_"+optionid).val()));
		
		var width;
		($.trim($("#shipping_width_"+optionid).val())=="")?width=0:width=parseFloat($.trim($("#shipping_width_"+optionid).val()));
		var length;
		($.trim($("#shipping_length_"+optionid).val())=="")?length=0:length=parseFloat($.trim($("#shipping_length_"+optionid).val()));
		var height;
		($.trim($("#shipping_height_"+optionid).val())=="")?height=0:height=parseFloat($.trim($("#shipping_height_"+optionid).val()));
		var weight;
		($.trim($("#shipping_Cweight_"+optionid).val())=="")?weight=0:weight=parseFloat($.trim($("#shipping_Cweight_"+optionid).val()));
		
		var packin=$("#shipping_packedin_"+optionid +" option:selected").attr("rel");
		//alert(packin)
		/*var conSize;
		($.trim($("#shipping_ContinerSize_"+optionid).val())=="")?conSize=0:conSize=parseFloat($.trim($("#shipping_ContinerSize_"+optionid).val()));
		var approxUseable;
		($.trim($("#shipping_ApproxCBM_"+optionid).val())=="")?approxUseable=0:approxUseable=parseFloat($.trim($("#shipping_ApproxCBM_"+optionid).val()));*/
		//alert(Math.abs(units))
		if(Quantity && units >0)
		{
			var numCartons=Math.ceil((Quantity/units));
			$("#shipping_NoCartons_"+optionid).val(numCartons);
		}
		else
		{
			$("#shipping_NoCartons_"+optionid).val("");
		}
		if(width >0 && length >0 && height >0)
		{
			    var catVolume=getNumberDecmials(((width/1000)*(length/1000)*(height/1000)),3);
				$("#shipping_Cvolume_"+optionid).val(catVolume);
		}
		else
		{
			$("#shipping_Cvolume_"+optionid).val("");
		}
		if(numCartons && weight > 0)
		{
			var shipmentWeight=getNumberDecmials((weight*numCartons),3);
			$("#shipping_TCweight_"+optionid).val(shipmentWeight);
		}
		else
		{
			$("#shipping_TCweight_"+optionid).val("");
		}
		if(catVolume && numCartons)
		{
			if(packin==1)
			{
				var totalShipmentVol=getNumberDecmials((catVolume*numCartons*1.25),3);
				$("#shipping_TCvolume_"+optionid).val(totalShipmentVol);
				container_size();
				
				$("#shipping_TCvolume_"+optionid).attr("readonly","readonly").addClass("read_only");
			}
			else if(packin==2)
			{
				var totalShipmentVol=getNumberDecmials((catVolume*numCartons),3);
				$("#shipping_TCvolume_"+optionid).val(totalShipmentVol);
				container_size();
				
				$("#shipping_TCvolume_"+optionid).attr("readonly","readonly").addClass("read_only");
			}
			else if(packin==3)
			{

				if($("#shipping_TCvolume_"+optionid).attr("readonly")){
					$("#shipping_TCvolume_"+optionid).val("");
					$("#shipping_TCvolume_"+optionid).attr("readonly","").removeClass("read_only");
					$("#shipping_NoContainers_"+optionid).val("");
				}

				
				
			}
		}
		else
		{	
			$("#shipping_TCvolume_"+optionid).val("");
			container_size();
		}
		
		
	 	
}
$(".ship_calCustom").livequery(function(){
	$(this).delayedObserver(function(){
		container_size();
			 })
})
//end of shipping calculations 



$(".calEst").livequery(function(){
	$(this).delayedObserver(function(){
		$(this).closest(".job_estimates").trigger("recalculate")
						 })
})

function getNumberDecmials(inputNumber,places)
{	
	if(inputNumber!=0)
	return inputNumber.toFixed(places);
	else 
	return inputNumber;
	
}
//Calculate Adjusted Xrate

$(".pm_manual").livequery(function(){
	$(this).delayedObserver(function(){
									 //alert("1111")
		var optionid=$("#show_my_options li a.active_nav").attr("estopt");
		 	adjustedXrate(optionid);
		})
})
function adjustedXrate(optionid){
	//alert(optionid);
	var exchangeRate;
		($.trim($("#exchangeRate_"+optionid).val())=="")?exchangeRate=0:exchangeRate=parseFloat($.trim($("#exchangeRate_"+optionid).val()));
	var vat;
		($.trim($("#vat_"+optionid).val())=="")?vat=0:vat=parseFloat($.trim($("#vat_"+optionid).val()));
	var vatBack;
		($.trim($("#vatback_"+optionid).val())=="")?vatBack=0:vatBack=parseFloat($.trim($("#vatback_"+optionid).val()));
	var exportFee;
		($.trim($("#exportfee_"+optionid).val())=="")?exportFee=0:exportFee=parseFloat($.trim($("#exportfee_"+optionid).val()));
		
		exchangeRate=getNumberDecmials(exchangeRate,2);
		vat=getNumberDecmials(vat,2);
		vatBack=getNumberDecmials(vatBack,2);
		exportFee=getNumberDecmials(exportFee,2);
//alert(exchangeRate)
		vat=vat/100;
		vatBack=vatBack/100;
		exportFee=exportFee/100;
		
		//var adjustXrate=((exchangeRate)*1.17)/(1+exportFee+vat-vatBack+0.02);
		 adjustXrate=((exchangeRate)*1.17)/(1+exportFee+vat-vatBack);
			adjustXrate=getNumberDecmials(adjustXrate,2);
		//alert("adjust:"+adjustXrate);
		
	
		if(exchangeRate > 0){
			updateXrate(optionid, adjustXrate);
		}
}

//Calculate Adjusted Xrate ends

function updateXrate(optionid, adjustXrate){
		
		if(adjustXrate==0){
			adjustXrate=1;
		}
		
		//alert(adjustXrate)
	$("#job_estimates_" + optionid + " .edit_est_sec.editmode .estimates_section").each(function(index){
		var templateid=	$("#profit_margin_"+optionid+" option:selected").attr("value");																				
	
		var vendor_est_total_obj = $(this).children(".vendor_section").children(".footer_row").children("li.s_2").children(".vendor_cst_total");

	var vendor_est_cst=0	
	if(!isNaN(parseFloat($(vendor_est_total_obj).val())))
	vendor_est_cst = parseFloat($(vendor_est_total_obj).val());

	//alert(vendor_est_cst)
		if(vendor_est_cst!=0)
		{
		var ProfitMargin=0;
		
			if(index==1)
			ProfitMargin=$("#estRfqPrePressProfit_"+optionid).val();
			else if(index==3)
			ProfitMargin=$("#estRfqShippingProfit_"+optionid).val();
			else if(index==2)
			{
				if(templateid=='m')
				
				ProfitMargin=$("#estRfqProductionProfit_"+optionid).val();
				else
				ProfitMargin=getRangeMargin(templateid, optionid, vendor_est_cst);
			}
			//alert(ProfitMargin)
			
			
			//ProfitMargin=11;
			
			
			ProfitMargin=ProfitMargin/100;
			
			
			var resVal=(vendor_est_cst+(vendor_est_cst*ProfitMargin))/adjustXrate;
				resVal=getNumberDecmials(resVal,2);
				
			$(this).children(".default_estimates").children(".cols_3").children(".cost_area").children(".effective_est_field").val(resVal);
			$("#job_estimates_" +optionid).trigger("recalculate");
			
		}
		else
		{
		$(this).children(".default_estimates").children(".cols_3").children(".cost_area").children(".effective_est_field").val("");
		}
		
	});
	
	//$(".calEst").trigger("keyup");
	
		

}
//reCalculate Starts
function reCalculate(){
		//alert("grandtotal");
		var optionid=$("#show_my_options li a.active_nav").attr("estopt"); //remove h_tab
		var PrePressCost;
		($.trim($("#prePpressCost_"+optionid).val())=="")?PrePressCost=0:PrePressCost=parseFloat($.trim($("#prePpressCost_"+optionid).val()));
		var PrintingUnitCost;
		($.trim($("#printingUnitCost_"+optionid).val())=="")?PrintingUnitCost=0:PrintingUnitCost=parseFloat($.trim($("#printingUnitCost_"+optionid).val()));
		var PrintingCost;
		($.trim($("#printingCost_"+optionid).val())=="")?PrintingCost=0:PrintingCost=parseFloat($.trim($("#printingCost_"+optionid).val()));
		var ShippingCost;
		($.trim($("#shippingCost_"+optionid).val())=="")?ShippingCost=0:ShippingCost=parseFloat($.trim($("#shippingCost_"+optionid).val()));
		var FedexCost;
		($.trim($("#samplesFedexFee_"+optionid).val())=="")?FedexCost=0:FedexCost=parseFloat($.trim($("#samplesFedexFee_"+optionid).val()));
		var ImportDuty;
		($.trim($("#importDuty_"+optionid).val())=="")?ImportDuty=0:ImportDuty=parseFloat($.trim($("#importDuty_"+optionid).val()));
		/*var Insurance;
		($.trim($("#insurance_"+optionid).val())=="")?Insurance=0:Insurance=parseFloat($.trim($("#insurance_"+optionid).val()));*/
		var Quantity;
		($.trim($("#rfqEst_quantity_"+optionid).val())=="")?Quantity=0:Quantity=parseFloat($.trim($("#rfqEst_quantity_"+optionid).val()));
		
		var Insurance=0;
		
		
		PrePressCost=getNumberDecmials(PrePressCost,2);
		PrintingCost=getNumberDecmials(PrintingCost,2);
		ShippingCost=getNumberDecmials(ShippingCost,2);
		FedexCost=getNumberDecmials(FedexCost,2);
		ImportDuty=getNumberDecmials(ImportDuty,2);
	//	Insurance=getNumberDecmials(Insurance,2);
		
	/*	if(PrePressCost && PrintingCost && ShippingCost && FedexCost && ImportDuty && Insurance)
		{ 	
			$("#save_prv_est_"+optionid).addClass("smallactive smallmain_btn");
			$("#save_sub_"+optionid).addClass("smallactive smallmain_btn");
		} else{
			$("#save_prv_est_"+optionid).removeClass("smallactive smallmain_btn");
			$("#save_sub_"+optionid).removeClass("smallactive smallmain_btn");
		}*/
			//alert(PrePressCost+"--"+PrintingCost+"--"+ShippingCost+"--"+FedexCost+"--"+ImportDuty+"--"+Insurance)
		//if(PrePressCost && PrintingCost && ShippingCost && FedexCost && ImportDuty )
		//{ alert("ddd")
		
		
		
		//GrandTotal=GrandTotal.toFixed(2);
		//alert("a:"+ShippingCost);
						
						//$("#lableGT_"+optionid).val("$"+GrandTotal);
						//$("#grandTotal_"+optionid).val(GrandTotal);
						
	
				if(Quantity)
					{	
						//alert("Quantity:"+PrintingCost);
						//alert("PrintingCost:"+PrintingCost);
						
						//if(PrintingCost)
						//{
							var TotalCostPerUnitPrinting =PrintingCost/Quantity;
							TotalCostPerUnitPrinting=getNumberDecmials(TotalCostPerUnitPrinting,2);
							$("#printingUnitCost_"+optionid).val(TotalCostPerUnitPrinting);
						//}
						//if(PrePressCost && PrintingCost && ShippingCost && FedexCost)
						//{
						 Insurance=(parseFloat(PrePressCost)+parseFloat(PrintingCost)+parseFloat(ShippingCost)+parseFloat(FedexCost))*0.002;
						$("#insurance_"+optionid).val(getNumberDecmials(Insurance,2));
						//}
						
						//if(PrePressCost && PrintingCost && ShippingCost && FedexCost && ImportDuty && Insurance)
						//{
						var GrandTotal=parseFloat(PrePressCost)+parseFloat(PrintingCost)+parseFloat(ShippingCost)+parseFloat(FedexCost)+parseFloat(ImportDuty)+parseFloat(Insurance);
		
						GrandTotal=getNumberDecmials(GrandTotal,2);
						
						var TotalCostPerUnit = GrandTotal/Quantity;
						
						
						TotalCostPerUnit=getNumberDecmials(TotalCostPerUnit,2);
						$("#lableGT_"+optionid).val("$"+addCommas(GrandTotal));
						$("#grandTotal_"+optionid).val(GrandTotal);
						$("#TCPU_"+optionid).val(TotalCostPerUnit);
						$("#lableTCPU_"+optionid).val("$"+addCommas(TotalCostPerUnit));
						//alert("ssss")
						getProductionCost(optionid,Quantity,PrePressCost,PrintingCost,ShippingCost);
						//}
					
					}
				else
					{
						$("#lableGT_"+optionid).val("--");
						$("#printingCost_"+optionid).val("");
						$("#hprint_unit_cost_"+optionid).val("");
					}	
	//}
}

//reCalculate ends
function getProductionCost(optionid,Quantity,PrePressCost,PrintingCost,ShippingCost)
{ 
	
	var ProductionMargin=getNumberDecmials(parseFloat(PrePressCost)+parseFloat(PrintingCost)+parseFloat(ShippingCost),2);

	var Production=0;
	$("#job_estimates_" +optionid + " .readonly.editmode .estimates_section").each(function(index){
																							
		var vendor_est_total_obj = $(this).children(".vendor_section").children(".footer_row").children("li.s_2").children(".vendor_cst_total");																					
		var vendor_est_cst=0	
		if(!isNaN(parseFloat($(vendor_est_total_obj).val())))
		vendor_est_cst = parseFloat($(vendor_est_total_obj).val());
		
		if(vendor_est_cst!=0)
		{
		//alert(Production+"-----"+vendor_est_cst)
		
			
			Production= parseFloat(Production)+parseFloat(vendor_est_cst/adjustXrate);
			//alert(Production)
			
		}
		
		
  });
	//alert(ProductionMargin+"---"+getNumberDecmials(Production,2));
	var Profit=ProductionMargin-getNumberDecmials(Production,2);
	$("#TPC_"+optionid).val("$"+getNumberDecmials(Production,2));
	$("#PCPU_"+optionid).val("$"+getNumberDecmials((Production/Quantity),2))
	
	$("#TPrC_"+optionid).val("$"+getNumberDecmials(Profit,2));
	$("#PrCPU_"+optionid).val("$"+getNumberDecmials(Profit/Quantity,2))
	
}

//calculate unit printing cost
$(".CalRel").livequery(function(){
		$(this).delayedObserver(function(){
			//alert("printing unit cost");
			var optionid=$("#show_my_options li a.active_nav").attr("estopt"); //remove h_tab
			var PrintingUnitCost;
			($.trim($("#printingUnitCost_"+optionid).val())=="")?PrintingUnitCost=0:PrintingUnitCost=parseFloat($.trim($("#printingUnitCost_"+optionid).val()));
			
			var Quantity;
			($.trim($("#rfqEst_quantity_"+optionid).val())=="")?Quantity=0:Quantity=parseFloat($.trim($("#rfqEst_quantity_"+optionid).val()));
				
				PrintingUnitCost=getNumberDecmials(PrintingUnitCost,2);
					PrintingCost=PrintingUnitCost*Quantity;
					//alert(PrintingCost)
					$("#printingCost_"+optionid).val(PrintingCost)
					$("#job_estimates_" +optionid).trigger("recalculate");
			
			});
		
	});


function getRangeMargin(temp_id, optionid, vendor_est_cst){
	var valmargin = 1;
	
	if(vendor_est_cst=="")
		vendor_est_cst=0;
	//alert("temp_id:" + temp_id);
	$("#PmValues_" + optionid + " .estTemid[rel='"+ temp_id +"'] .estTemidval").each(function(){
	
		//alert($("#PmValues_" + optionid).children(".estTemid[rel='"+ temp_id +"']").children(".estTemidval").length);
		var range = $(this).find(".valRange").attr("rel").split("--");
		//alert(eval(range[0]) +"----"+eval(range[1]));
		if(eval(vendor_est_cst) >= eval(range[0]) && eval(vendor_est_cst) <= eval(range[1])){
			valmargin = $(this).find(".valRange").attr("margin_val");			
		}

	

	});
	//alert(valmargin);
	return valmargin;
}
function addCommas(nStr)
{
	nStr += '';
	x = nStr.split('.');
	x1 = x[0];
	x2 = x.length > 1 ? '.' + x[1] : '';
	var rgx = /(\d+)(\d{3})/;
	while (rgx.test(x1)) {
		x1 = x1.replace(rgx, '$1' + ',' + '$2');
	}
	return x1 + x2;
}

//end calculate unit printing cost



function container_size()
{
	//alert("sssss")
	var optionid=$("#show_my_options li a.active_nav").attr("estopt");
	var ddd = $("#shipping_ContinerSize_"+optionid+ " option:selected").attr("rel");
	var appx_cbm = $("#shipping_ContinerSize_"+optionid+ " option:selected").attr("app_CBM");
	
	//$("#shipping_ApproxCBM_" + optionid + " option[rel='"+ ddd +"']").attr("selected", true);
	$("#shipping_ApproxCBM_" + optionid).val(appx_cbm);

	
	var totalShipmentVol;
	($.trim($("#shipping_TCvolume_"+optionid).val())=="")?totalShipmentVol=0:totalShipmentVol=parseFloat($.trim($("#shipping_TCvolume_"+optionid).val()));
	var approxUseable=$("#shipping_ApproxCBM_"+optionid).val();
	//alert(approxUseable)	
	if(totalShipmentVol && approxUseable!=0)
	{ // alert("111")
		numberOfContainers=getNumberDecmials((totalShipmentVol/approxUseable),2);
		//numberOfContainers=totalShipmentVol/approxUseable;
		$("#shipping_NoContainers_"+optionid).val(numberOfContainers);
	}
	else
	{
	$("#shipping_NoContainers_"+optionid).val("");
	}
	
	//alert();
}

